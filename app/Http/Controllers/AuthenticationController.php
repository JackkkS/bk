<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AuthenticationController extends Controller
{
    public function contract(){
        return view('auth.register');
        }

    public function delete($id){
        $delete = User::find($id)-> delete();
        return redirect()->back()->with('success', "ลบข้อมูลเรียบร้อย");
        }
    
}
