<?php

namespace App\Http\Controllers;
use App\Models\Guest;
use App\Models\Transaction;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class ReserveController extends Controller
{
    public function index(){
        $transaction = Transaction::all();
        return view('admin.reserve.index' ,compact('transaction'));
        }   

        public function delete($id)
        {
            $transaction = Transaction::find($id);
        
            if ($transaction->status == 'pending') {
                $latestTransaction = Transaction::where('field_id', $transaction->field_id)
                    ->where('checkin_time', $transaction->checkin_time)
                    ->where('status', 'รอการติดต่อเรื่องเวลาซ้ำ')
                    ->orderBy('created_at', 'asc')
                    ->first();
        
                if ($latestTransaction) {
                    $latestTransaction->status = 'pending';
                    $latestTransaction->save();
                }
            }
        
            $transaction->delete();
            return redirect()->back()->with('success', 'ลบข้อมูลเรียบร้อย');
        }
        
        
        
        
    public function checkin(){
        $transaction = Transaction::all();
        return view('admin.reserve.checkin' ,compact('transaction'));
        }

    public function confirmcheckin(Request $request){
        DB::transaction(function () use ($request) {
            $transaction = Transaction::find($request->id);
            $transaction->status = 'check in';
            $transaction->save();
            });
            return redirect()->route('checkin')->with('success', "บันทึก");
        }

    public function checkout(){
        $transaction = Transaction::all();
        return view('admin.reserve.checkout' ,compact('transaction'));
        }

    public function confirmcheckout(Request $request){
        $transaction = Transaction::find($request->id);
        return view('admin.reserve.confirmcheckout' ,compact('transaction'));
        }
    
    public function checkoutsuccess(Request $request){
        $request->validate([
            'expenses'=> 'required',
        ],
        [
            'expenses.required'=>"กรุณากรอกค่าใช่จ่ายเพิ่มเติม",
            
        ]);
        DB::transaction(function () use ($request) {
            $transaction = Transaction::find($request->id);
            $transaction->expenses = $request->expenses;
            $transaction->status = 'check out';
            $transaction->save();
            });
            return redirect()->route('checkout')->with('success', "บันทึก");
        }
}
