<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Session;
use Illuminate\Support\Str;
use Cart;
Session_start();

class CartController extends Controller
{
    public function add_to_cart(Request $request){

        $quantity=$request->quantity;
        $product_id=$request->product_id;
        $product_info=DB::table('tbl_products')
        ->where('product_id', $product_id)
        ->first();

        $data['quantity']=$quantity;
        $data['id']=$product_info->product_id;
        $data['name']=$product_info->product_name;
        $data['price']=$product_info->product_price;
        $data['image']=$product_info->product_id;
        $data['attributes']['image']=$product_info->product_image;

        Cart::add($data);
        return Redirect::to('/show_cart');
    }

    public function show_cart(){

        $all_published_category=DB::table('tbl_category')
            ->where('publication_status', 1)
            ->get();

            $manage_published_category=view('pages.add_to_cart')
            ->with('all_published_category', $all_published_category);
            return view('layout')
            ->with('pages.add_to_cart', $manage_published_category);
    }

    public function delete_to_cart($id){
        Cart::remove($id);
        return Redirect::to('/show_cart');
    }

    public function update_cart(Request $request){

        $quantity=$request->quantity;
        $product_id=$request->id;

        Cart::remove($product_id);

        $product_info=DB::table('tbl_products')
        ->where('product_id', $product_id)
        ->first();

        $data['quantity']=$quantity;
        $data['id']=$product_info->product_id;
        $data['name']=$product_info->product_name;
        $data['price']=$product_info->product_price;
        $data['image']=$product_info->product_id;
        $data['attributes']['image']=$product_info->product_image;

        Cart::add($data);
        return Redirect::to('/show_cart');

    }
}
