<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Http\Request\editcaterequest;

use App\Mode\category;



class categorycontroller extends Controller
{
    public function getcate(){
        $data['catelist']=category::all();
        return view('admin.category',$data);
    }
    public function editcate($id){
        $data = category::find($id);
        return view('admin.editcategory', ['cate' => $data]);
    }
    public function posteditcate(editcaterequest $request, $id){
        $category =  category::find($id);
        $category->cate_name=$request->name;
        $category->cate_slug =str_shuffle($request->name);
        $category->save();
        return redirect()->intended('admin/category/');
    }
    
    public function postcate(Request $request){
        $category = new category;
        // $category =$category::find($id);

        $category->cate_name=$request->name;
        $category->cate_slug =str_shuffle($request->name);
        $category->save();
        return back();
        // return redirect()->intended('admin/category');

    }
    public function getdeletecate($id){
        category::destroy($id);
        return back();
       
    }
  
  
}
