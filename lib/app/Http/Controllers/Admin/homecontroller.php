<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;



class homecontroller extends Controller
{
    public function gethome(){
        return view('admin.index');
    }
   public function getlogout(){
       Auth::logout();
       return redirect()->intended('login');
   }
 

  
}
