<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AddProductRequest;
use App\Mode\product;
use App\Mode\category;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\store;
use DB; 



class ProductController extends Controller
{
    public function getproduct(){
        $data['productlist']= DB::table('vp_products')->join('vp_categories','vp_products.pro_cate','=','vp_categories.cate_id')->orderBy('pro_id','desc')->get();
        return view("admin.product",$data);
    }

    public function getaddproduct(){
        $data['catelist'] = category::all();
        return view("admin.addproduct",$data);
    }

    public function postaddproduct(AddProductRequest $request){
        $filename =$request->img->getclientoriginalname();
        $product = new Product;
        $product->pro_name =$request->name;
        $product->pro_slug =str::slug($request-> name); 
        $product->pro_img =$filename;
        $product->pro_accessories =$request->accessories;  
        $product->pro_price =$request->price;  
        $product->pro_warranty =$request->warranty;  
        $product->pro_promotion =$request->promotion;
        $product->pro_coditison =$request->condition;
        $product->pro_status =$request->status;
        $product->pro_description =$request->description;
        $product->pro_cate =$request->cate;
        $product->pro_featured =$request->featured ;
        $product->save();
        $request->img->storeAs('avatar',$filename);
        return back();
    }

    public function geteditproduct($id){
        $data['product']= Product::find($id);
        $data['listcate'] =category::all();
        return view("admin.editproduct",$data);
    }
    
    public function posteditproduct(Request $request,$id){
        $product =new Product;
        $arr['pro_name'] = $request->name;
        $arr['pro_slug'] = Str::slug($request->name);
        $arr['pro_accessories']=$request->accessories;
        $arr['pro_price']=$request->price;
        $arr['pro_warranty']=$request->warranty;
        $arr['pro_promotion']=$request->promotion;
        $arr['pro_coditison']=$request->condition;
        $arr['pro_status']=$request->status;
        $arr['pro_description']=$request->description;
        $arr['pro_cate']=$request->cate;
        $arr['pro_featured']=$request->featured;
        if($request->hasfile('img'))
        {
            $img=$request->img->getclientoriginalname();
            $arr['pro_img']=$img;
            $request->img->storeAs('avatar,$img');
        }
        $product::where('pro_id',$id)->update($arr);
        return redirect('admin/product');

    }
    public function getdeleteproduct($id){
        Product::destroy($id);
        return back();
        
    }
 
}
