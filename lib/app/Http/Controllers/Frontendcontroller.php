<?php

namespace App\Http\Controllers;



use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mode\product;
use App\Mode\category;
use App\Mode\commet;

class Frontendcontroller extends Controller
{
 
    public function gethome(){
        $data['featured'] = Product :: where('pro_featured',1)->orderBy('pro_id','desc')->take(8)->get();
        $data['new'] = Product ::orderBy('pro_id','desc')->take(8)->get();
      
        return view('frontend.home',$data);
    }
    public function getDetail($id){
        // $data['categories']=category::all();
        $data['item'] = Product::find($id); 
        $data['comments']=commet::where('com_pro', $id)->get();

        return view('frontend.details',$data);
    }
    public function getcategory($id){
        $data['cateName']=Category::find($id);
        $data['items']= Product::where('pro_cate',$id)->orderBy('pro_id','desc')->paginate(8);
        return view('frontend.category',$data);
    }
    public function postcommet(Request $request,$id){
        $comment = new commet;
        $comment -> com_name=$request->name;
        $comment -> com_email=$request->email;
        $comment -> com_content=$request->content;
        $comment -> com_pro=$id;
        $comment -> save();
        return back();
    }

    public function getsearch(Request $requet){
        $result =$requet->result;
        $data['keyword']=$result;
        $result =str_replace('','%',$result);
        $data['items']= Product::where('pro_name','like','%'.$result.'%')->get();
        return view('frontend.search',$data);
    }
}
