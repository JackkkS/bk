<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Field;
use App\Models\Guest;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class BkController extends Controller
{
        public function index(){
            return view('bk.welcome');
            }   

        public function about(){
            return view('bk.about');
            }
            
        public function contract(){
            return view('bk.contract');
            }
        
        public function reserve(){
            $field_reserve = Field::all();
            return view('bk.field',compact('field_reserve'));
            }

        public function payment(){
            $transaction = Transaction::all();
            return view('bk.payment',compact('transaction'));
            }
            
        public function paid(Request $request){
            $request->validate([
                'payment'=> 'required|mimes:jpeg,png,jpg',
            ],
            [
                'payment.required'=>"กรุณาแนบหลักฐานการชำระเงิน",
                'payment.mimes'=>"กรุณาใส่รูปภาพเป็นไฟล์ jpg,jpeg,png",
            ]);
        
            DB::transaction(function () use ($request) {
            
                //เข้ารหัสรูปภาพ
                $payment = $request->file('payment');
            
                // Gen ชื่อภาพ
                $name_gen = hexdec(uniqid());
            
                // นามสกุลไฟล์
                $img_ext = strtolower($payment->getClientOriginalExtension());
            
                //ชื่อไฟล์รูปภาพ
                $img_name = $name_gen.'.'.$img_ext;
            
                //อัพโหลดภาพ
                $upload_location = 'img/payment/';
                $full_path = $upload_location.$img_name;
            
                // save ชื่อไฟล์ภาพลงใน transaction
                $transaction = Transaction::find($request->id);
                $transaction->payment = $full_path;
                $transaction->save();
            
                // move รูปภาพไปยังโฟลเดอร์ที่กำหนด
                $payment->move($upload_location,$img_name);
            });
            
        
            return redirect()->route('thank')->with('success', "ชำระเงินสำเร็จ");
        }
            
        public function thank(){
            return view('bk.thank');
            }
            
        public function rule(){
            return view('bk.rule');
            }

        public function detail($id){
            $detail = Field::find($id);
            $transaction = Transaction::all();
            return view('bk.reserve',compact('detail','transaction'));
            }
           
        public function api(Request $request){
           
            $date = $request->input('date');

            $transactions = Transaction::where('status', 'check in')
                            ->where('checkin', $date)
                            ->get(['checkin_time', 'hour','field_id' ]);

            return response()->json($transactions);
            }


        public function store(Request $request){
            
            $request->validate([
                 'firstname'=>'required|max:255',
                 'lastname'=>'required|max:255',
                 'address'=>'required|max:255',
                 'contactno'=> 'required||max:10',
                ],
             [
                'firstname.required'=>"กรุณาป้อนชื่อผู้เข้าใช้บริการ",
                'firstname.max' => "ห้ามป้อนเกิน 255 ตัวอักษร",
                'lastname.required'=>"กรุณาป้อนนามสกุลผู้เข้าใช้บริการ",
                'lastname.max' => "ห้ามป้อนเกิน 255 ตัวอักษร",
                'address.required'=>"กรุณาที่ป้อนอยู่",
                'address.max'=>"ห้ามป้อนเกิน 255 ตัวอักษร",
                
                
                'contactno.required'=>"กรุณาใส่เบอร์ติดต่อ",
                'contactno.max'=>"ห้ามป้อนเกิน 10 ตัวอักษร",
                
             ]);
            //  dd($request->firstname,$request->lastname,$request->address,$request->contactno,$request->checkin,$request->checkin_time,$request->hour,);
            $now = Carbon::now();
            $date = $request->checkin;
            $time = $request->checkin_time;
            $hour = $request->hour;
            $datetime_start = Carbon::parse($date.' '.$time);
            if ($datetime_start->isBefore($now)) {
                return redirect()->back()->with('error', 'ขออภัย ไม่สามารถจองในเวลาดังกล่าวได้');
            }
            
            DB::transaction(function () use ($request, $datetime_start, $hour) {
                // ตรวจสอบการจองซ้ำที่มีวันและเวลาตรงกัน
                $datetime_end = $datetime_start->copy()->addHours($hour);
            
                $start_hour = $datetime_start->hour;
                $end_hour = $datetime_end->hour;
                $booking_hours = $end_hour - $start_hour; // จำนวนชั่วโมงที่ลูกค้าจอง
            
                $existingTransaction = Transaction::where('field_id', $request->id)
                    ->where(function ($query) use ($datetime_start, $start_hour, $end_hour) {
                        $query->where('checkin', '=', $datetime_start->format('Y-m-d'))
                            ->where('checkin_time', '=', $start_hour . ':00:00');
                    })
                    ->orWhere(function ($query) use ($datetime_start, $start_hour, $end_hour, $booking_hours) {
                        $query->where(function ($query) use ($datetime_start, $start_hour) {
                            $query->where('checkin', '<', $datetime_start->format('Y-m-d'))
                                ->orWhere(function ($query) use ($datetime_start, $start_hour) {
                                    $query->where('checkin', '=', $datetime_start->format('Y-m-d'))
                                        ->where('checkin_time', '<', $start_hour . ':00:00');
                                });
                        })
                            ->where(function ($query) use ($datetime_start, $end_hour, $booking_hours) {
                                $query->where('checkout', '>', $datetime_start->format('Y-m-d'))
                                    ->orWhere(function ($query) use ($datetime_start, $end_hour, $booking_hours) {
                                        $query->where('checkout', '=', $datetime_start->format('Y-m-d'))
                                            ->where('checkout_time', '>', ($end_hour - $booking_hours) . ':00:00');
                                    });
                            });
                    })
                    ->first();
                
                if ($existingTransaction) {
                    // ถ้ามีการจองซ้ำเกิดขึ้น
                    $status = 'รอการติดต่อเรื่องเวลาซ้ำ';
                } else {
                    $status = 'pending';
                }
            
                $guest = new Guest;
                $guest->firstname = $request->firstname;
                $guest->lastname = $request->lastname;
                $guest->address = $request->address;
                $guest->contactno = $request->contactno;
                $guest->save();
            
                $transaction = new Transaction;
                $transaction->field_id = $request->id;
                $transaction->guest_id = $guest->guest_id;
                $transaction->hour = $request->hour;
                $transaction->status = $status;
                $transaction->checkin = $request->checkin;
                $transaction->checkin_time = $request->checkin_time;
                $transaction->checkout = $request->checkin;
                $checkout_time = $datetime_start->addHours($request->hour)->format('H:i:s');
                $transaction->checkout_time = $checkout_time;
                $transaction->expensetype = "";
                $transaction->expenses = '0';
                $transaction->payment = 'ยังไม่ได้ชำระเงิน';
                $transaction->save();
            });
            
                return redirect()->route('payment')->with('success', "ทำการจองเรียบร้อยโปรดชำระค่าสนามกีฬา");
            }
                    
               
            
            // $guest = new Guest;
            // $guest->firstname = $request->firstname;
            // $guest->lastname = $request->lastname;
            // $guest->address = $request->address;
            // $guest->contactno = $request->contactno;
            // $guest->save();
            
            // $transaction = new Transaction;
            // $transaction->date = $request->date;
            // $transaction->checkin = $request->checkin;
            // $transaction->hour = $request->hour;
            // $transaction->save();
            // dd($request->firstname, $request->lastname, $request->address, $request->contactno, $request->date, $request->checkin, $request->hour);

            // return redirect()->back()->with('success', "บันทึก");
        
}
