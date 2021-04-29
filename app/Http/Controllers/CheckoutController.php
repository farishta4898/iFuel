<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Session;
use Cart;
use Darryldecode\Cart\Cart as CartCart;

session_start();

class CheckoutController extends Controller
{
    public function index(){

        return view('welcome');
    }
    public function login_check(){

        return view('pages.login');
    }

public function customer_registration(Request $request){

$data=array();
$data['customer_name']=$request->customer_name;
$data['customer_email']=$request->customer_email;
$data['password']=md5($request->password);
$data['mobile_number']=$request->mobile_number;

$customer_id=DB::table('tbl_customer')
               ->insertGetId($data);


            Session::put('customer_id', $customer_id);
            Session::put('customer_name', $request->customer_name);

            return Redirect::to('checkout');

}


public function customer_login(Request $request){

    $customer_email=$request->customer_email;
    $password=md5($request->password);
    $result=DB::table('tbl_customer')
            ->where('customer_email', $customer_email)
            ->where('password', $password)
            ->first();

         if($result){
            Session::put('customer_name', $result->customer_name);
            Session::put('customer_id', $result->customer_id);

            return Redirect::to('/');
         }
         else{
            Session::put('message', 'Invalid Email or Password');
            return Redirect::to('/login_check');
         }

}

public function customer_logout(){
    Session::flush();
    return Redirect::to('/');
}

public function checkout(){

    return view('pages.checkout');
}

public function save_shipping_details(Request $request){

$data=array();
$data['shipping_first_name']=$request->shipping_first_name;
$data['shipping_last_name']=$request->shipping_last_name;
$data['shipping_email']=$request->shipping_email;
$data['shipping_address']=$request->shipping_address;
$data['shipping_city']=$request->shipping_city;
$data['shipping_country']=$request->shipping_country;
$data['shipping_postal_code']=$request->shipping_postal_code;
$data['shipping_mobile']=$request->shipping_mobile;

$shipping_id=DB::table('tbl_shipping')
->insertGetId($data);

Session::put('shipping_id', $shipping_id);
return Redirect::to('/payment');
}

public function payment(){
    return view('pages.payment');
}

public function order_place(Request $request){

    $payment_method=$request->payment_method;

    $pdata=array();
    $pdata['payment_method']=$payment_method;
    $pdata['payment_status']='pending';

    $payment_id=DB::table('tbl_payment')
        ->insertGetId($pdata);

    $odata=array();
    $odata['customer_id']=Session::get('customer_id');
    $odata['shipping_id']=Session::get('shipping_id');
    $odata['payment_id']=$payment_id;
    $odata['order_total']=Cart::getSubTotal();
    $odata['order_status']='pending';
    $order_id=DB::table('tbl_order')
    ->insertGetId($odata);

    $contents=Cart::getContent();

    $oddata=array();

    foreach($contents as $v_contents){
        $oddata['order_id']=$order_id;
        $oddata['product_id']=$v_contents->id;
        $oddata['product_name']=$v_contents->name;
        $oddata['product_price']=$v_contents->price;
        $oddata['product_sales_quantity']=$v_contents->quantity;

        DB::table('tbl_order_details')
        ->insert($oddata);
    }

    if ($payment_method == 'cash'){

        Cart::clear();
         return view('pages.final');


    } elseif ($payment_method == 'bkash'){
        Cart::clear();
        return view('pages.final');


    }elseif ($payment_method == 'visa'){
        Cart::clear();
        return view('pages.final');


   }elseif ($payment_method == 'mastercard'){
    Cart::clear();
    return view('pages.final');


}elseif ($payment_method == 'paypal'){
    Cart::clear();
    return view('pages.final');

}else{
    echo "Payment method not selected!";
}
}
}

