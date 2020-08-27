<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Mode\product; 
use Cart;
use Mail;


class cartController extends Controller
{
 
  
  public function getAddcart($id){
  
    $product = Product::find($id);
    Cart::add(['id' => $id, 'name' => $product->pro_name, 'qty' => 1, 'price' =>  $product->pro_price, 'options' => ['img' => $product->pro_img]]);
    return redirect('cart/show');
  }
  public function getshowcart(){
    $data['total']=Cart::total();
    $data['items']= Cart::content();
    return view('frontend.cart',$data);
    
  }
  public function getdeletecart($id){
    if($id == 'all'){
      Cart::destroy();
    }
    else{
      Cart::remove($id);
    }
    return back();

  }
  public function getUpdateCart(Request $request){
    Cart::update($request->rowId,$request->qty);
  }
  public function postComplete(Request $request){
    $data['info'] =$request->all();
    $email=$request->email;
    $data['cart']=Cart::content();
    $data['total']=Cart::total();
    Mail::send('frontend.email', $data, function ($message) use($email){
        $message->from('ngocphung06012000@gmail.com', '0857580476');
        // $message->sender('john@johndoe.com', 'John Doe');
        $message->to($email, $email);

        $message->cc('ngocphung06012000@gmail.com', ' 0857580476');
        // $message->bcc('john@johndoe.com', 'John Doe');

        // $message->replyTo('john@johndoe.com', 'John Doe');
        $message->subject('Xác nhận hóa đơn mua hàng');

        // $message->priority(3);
        // $message->attach('pathToFile');
    });
    Cart::destroy();
    return redirect('complete');

  }
  public function getComplete(){
    return view('frontend.complete');
  }
}
