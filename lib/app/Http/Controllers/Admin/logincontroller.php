<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class logincontroller extends Controller
{
    public function getlogin(){
        return view('backend.login');
    }
    public function postlogin(Request $request){
        $arr= ['email' => $request->email, 'password' => $request->password];
        if($request->remember='Remember Me'){
            $remember =true;
        }else{
            $remember=false;
        }
      
        if(Auth::attempt($arr,$remember)){   
        return redirect()->intended('admin/home');
        }
        else{
            // echo '21345';
           return back()->withInput()->with('errors','tài khoản bạn đã sai hoặc mật khẩu của bạn sai');
        }
    }
   
}
