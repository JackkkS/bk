<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Field;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class FieldController extends Controller
    {
        public function index(){
            $fields = Field::paginate(5);
            return view('admin.fields.index', compact('fields'));
        }   
        
        public function add(){
            return view('admin.fields.add');
        }
        
        public function store(Request $request){
            $request->validate([
                 'field_name'=>'required|unique:fields|max:255',
                 'price'=>'required',
                 'photo1'=> 'required|mimes:jpeg,png,jpg',
                 'photo2'=> 'required|mimes:jpeg,png,jpg',
                 'photo3'=> 'required|mimes:jpeg,png,jpg',
                 'photo4'=> 'required|mimes:jpeg,png,jpg',
                ],
             [
                'field_name.required'=>"กรุณาป้อนชื่อสนาม",
                'field_name.max' => "ห้ามป้อนเกิน 255 ตัวอักษร",
                'field_name.unique'=>"มีข้อมูลชื่อสนามนี้อยู่แล้ว",
                'price.required'=>"กรุณาใส่ราคา",
                
                
                'photo1.required'=>"กรุณาใส่รูปภาพ",
                'photo2.required'=>"กรุณาใส่รูปภาพ",
                'photo3.required'=>"กรุณาใส่รูปภาพ",
                'photo4.required'=>"กรุณาใส่รูปภาพ",
                'photo1.mimes'=>"กรุณาใส่รูปภาพเป็นไฟล์ jpg,jpeg,png",
                'photo2.mimes'=>"กรุณาใส่รูปภาพเป็นไฟล์ jpg,jpeg,png",
                'photo3.mimes'=>"กรุณาใส่รูปภาพเป็นไฟล์ jpg,jpeg,png",
                'photo4.mimes'=>"กรุณาใส่รูปภาพเป็นไฟล์ jpg,jpeg,png",
                
             ]);

            //เข้ารหัสรูปภาพ
            $photo1 = $request->file('photo1');
            $photo2 = $request->file('photo2');
            $photo3 = $request->file('photo3');
            $photo4 = $request->file('photo4');

            // Gen ชื่อภาพ
            $name_gen = hexdec(uniqid());

            // นามสกุลไฟล์
            $img_ext1 = strtolower($photo1->getClientOriginalExtension());
            $img_ext2 = strtolower($photo2->getClientOriginalExtension());
            $img_ext3 = strtolower($photo3->getClientOriginalExtension());
            $img_ext4 = strtolower($photo4->getClientOriginalExtension());

            //ชื่อไฟล์รูปภาพ
            $img_name1 = $name_gen.'_1.'.$img_ext1;
            $img_name2 = $name_gen.'_2.'.$img_ext2;
            $img_name3 = $name_gen.'_3.'.$img_ext3;
            $img_name4 = $name_gen.'_4.'.$img_ext4;

            //อัพโหลดภาพ
            $upload_location = 'img/field/';
            $full_path1 = $upload_location.$img_name1;
            $full_path2 = $upload_location.$img_name2;
            $full_path3 = $upload_location.$img_name3;
            $full_path4 = $upload_location.$img_name4;

            // insert ข้อมูลลงฐานข้อมูล
            Field::insert([
                'field_name' =>$request->field_name,
                'field_type' =>$request->field_type,
                'price' =>$request->price,
                'photo1' =>$full_path1,
                'photo2' =>$full_path2,
                'photo3' =>$full_path3,
                'photo4' =>$full_path4,
                'field_status' =>'เปิดใช้งาน',
                'created_at'=>Carbon::now()
            ]);

            // move รูปภาพไปยังโฟลเดอร์ที่กำหนด
            $photo1->move($upload_location,$img_name1);
            $photo2->move($upload_location,$img_name2);
            $photo3->move($upload_location,$img_name3);
            $photo4->move($upload_location,$img_name4);
            return redirect()->route('fields')->with('success', 'บันทึกสำเร็จ');
        }
    
        public function edit($id){
            $field = Field::find($id);
            return view('admin.fields.edit', compact('field'));
        }
    
        public function delete($id){
            $field = Field::find($id);
            $img1 = $field->photo1;
            $img2 = $field->photo2;
            $img3 = $field->photo3;
            $img4 = $field->photo4;
            
            //ลบไฟล์ภาพ
            if (file_exists(public_path($img1))) {
                unlink(public_path($img1));
            }
            if (file_exists(public_path($img2))) {
                unlink(public_path($img2));
            }
            if (file_exists(public_path($img3))) {
                unlink(public_path($img3));
            }
            if (file_exists(public_path($img4))) {
                unlink(public_path($img4));
            }
            
            $field->delete();
            
            return redirect()->back()->with('success', 'ลบข้อมูลเรียบร้อย');
        }

        public function update(Request $request , $id){


            $request->validate([
                'field_name'=>'required|max:255',
                'price'=>'required',
                'photo1'=> 'mimes:jpeg,png,jpg',
                'photo2'=> 'mimes:jpeg,png,jpg',
                'photo3'=> 'mimes:jpeg,png,jpg',
                'photo4'=> 'mimes:jpeg,png,jpg',
               ],
            [
               'field_name.required'=>"กรุณาป้อนชื่อสนาม",
               'field_name.max' => "ห้ามป้อนเกิน 255 ตัวอักษร",
               'price.required'=>"กรุณาใส่ราคา",
               
               
               'photo1.mimes'=>"กรุณาใส่รูปภาพเป็นไฟล์ jpg,jpeg,png",
               'photo2.mimes'=>"กรุณาใส่รูปภาพเป็นไฟล์ jpg,jpeg,png",
               'photo3.mimes'=>"กรุณาใส่รูปภาพเป็นไฟล์ jpg,jpeg,png",
               'photo4.mimes'=>"กรุณาใส่รูปภาพเป็นไฟล์ jpg,jpeg,png",
               
            ]);
            
            $field = Field::findOrFail($id);

                $field->field_name = $request->input('field_name');
                $field->field_type = $request->input('field_type');
                $field->price = $request->input('price');

                // อัพโหลดรูปภาพและอัพเดทฟิลด์เมื่อมีการอัพโหลดรูปภาพ
                if ($request->hasFile('photo1')) {
                    $photo1 = $request->file('photo1');
                    $name_gen = hexdec(uniqid());
                    $img_ext = strtolower($photo1->getClientOriginalExtension());
                    $img_name = $name_gen . '.' . $img_ext;
                    $upload_location = 'img/field/';
                    $full_path1 = $upload_location . $img_name;
                    $photo1->move($upload_location, $img_name);
                    $field->photo1 = $full_path1;
                }

                if ($request->hasFile('photo2')) {
                    $photo2 = $request->file('photo2');
                    $name_gen = hexdec(uniqid());
                    $img_ext = strtolower($photo2->getClientOriginalExtension());
                    $img_name = $name_gen . '.' . $img_ext;
                    $upload_location = 'img/field/';
                    $full_path2 = $upload_location . $img_name;
                    $photo2->move($upload_location, $img_name);
                    $field->photo2 = $full_path2;
                }

                if ($request->hasFile('photo3')) {
                    $photo3 = $request->file('photo3');
                    $name_gen = hexdec(uniqid());
                    $img_ext = strtolower($photo3->getClientOriginalExtension());
                    $img_name = $name_gen . '.' . $img_ext;
                    $upload_location = 'img/field/';
                    $full_path3 = $upload_location . $img_name;
                    $photo3->move($upload_location, $img_name);
                    $field->photo3 = $full_path3;
                }

                if ($request->hasFile('photo4')) {
                    $photo4 = $request->file('photo4');
                    $name_gen = hexdec(uniqid());
                    $img_ext = strtolower($photo4->getClientOriginalExtension());
                    $img_name = $name_gen . '.' . $img_ext;
                    $upload_location = 'img/field/';
                    $full_path4 = $upload_location . $img_name;
                    $photo4->move($upload_location, $img_name);
                    $field->photo4 = $full_path4;
                }

                $field->updated_at = Carbon::now();
                $field->save();

                return redirect()->route('fields')->with('success', 'แก้ไขสำเร็จ');
           
        }

            public function updateStatus(Request $request, $id){
                $field = Field::find($id);
                $field->field_status = $request->status;
                $field->save();
                return redirect()->back()->with('success', "แก้ไขสถานะเรียบร้อย");
        }
    }



