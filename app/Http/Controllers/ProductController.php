<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Session;
use Illuminate\Support\Str;
Session_start();


class ProductController extends Controller
{
    public function index(){
        $this->AdminAuthCheck();
        return view('admin.add_product');
    }

        public function all_product(){
        $this->AdminAuthCheck();
        $all_product_info = DB::table('tbl_products')
        ->join('tbl_category', 'tbl_products.category_id', '=', 'tbl_category.category_id')
        ->join('tbl_brand', 'tbl_products.brand_id', '=', 'tbl_brand.brand_id')
        ->select('tbl_products.*', 'tbl_category.category_name', 'tbl_brand.brand_name')
        ->get();
        $manage_product=view('admin.all_product')
          ->with('all_product_info', $all_product_info);
        return view('admin_layout')
          ->with('all_product', $manage_product);
     }


    public function save_product(Request $request){
        $this->AdminAuthCheck();
        $data=array();
        $data['product_id']=$request->product_id;
        $data['product_name']=$request->product_name;
        $data['category_id']=$request->category_id;
        $data['brand_id']=$request->brand_id;
        $data['product_short_description']=$request->product_short_description;
        $data['product_long_description']=$request->product_long_description;
        $data['product_price']=$request->product_price;
        $data['product_image']=$request->product_image;
        $data['product_quantity']=$request->product_quantity;
        $data['publication_status']=$request->publication_status;
        $image=$request->file('product_image');
        if($image){
            $image_name=Str::random(40);
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='image/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path, $image_full_name);

        if($success){
        $data['product_image']=$image_url;
        DB::table('tbl_products')->insert($data);
        Session::put('message', 'Product added successfully!');
        return Redirect::to('/add_product');
            }
        }

        $data['product_image']='';
        DB::table('tbl_products')->insert($data);
        Session::put('message', 'Product added successfully without image!');
        return Redirect::to('/add_product');
    }


        public function unpublished_product($product_id){
            $this->AdminAuthCheck();
        DB::table('tbl_products')
        ->where('product_id', $product_id)
        ->update(['publication_status'=>0]);
        Session::put('message', 'Product unpublished successfully!');
        return Redirect::to('/all_product');
    }


            public function published_product($product_id){
                $this->AdminAuthCheck();
            DB::table('tbl_products')
            ->where('product_id', $product_id)
            ->update(['publication_status'=>1]);
            Session::put('message', 'Product published successfully!');
            return Redirect::to('/all_product');
            }


            public function edit_product($product_id){
                $this->AdminAuthCheck();
            $product_info=DB::table('tbl_products')
                ->where('product_id', $product_id)
                ->first();
                $product_info=view('admin.edit_product')
                ->with('product_info', $product_info);
            return view('admin_layout')
                ->with('all_product', $product_info);
            }


            public function update_product(Request $request, $product_id){
                $this->AdminAuthCheck();
            $data=array();
            $data['product_name']=$request->product_name;
            $data['category_id']=$request->category_id;
            $data['brand_id']=$request->brand_id;
            $data['product_short_description']=$request->product_short_description;
            $data['product_long_description']=$request->product_long_description;
            $data['product_price']=$request->product_price;
            $data['product_image']=$request->product_image;
            $data['product_quantity']=$request->product_quantity;
            DB::table('tbl_products')
            ->where('product_id', $product_id)
            ->update($data);
            Session::get('message', 'Product updated successfully!');
            return Redirect::to('/all_product');
            }


            public function delete_product($product_id){
                $this->AdminAuthCheck();
            DB::table('tbl_products')
            ->where('product_id', $product_id)
            ->delete();
            Session::get('message', 'Product deleted successfully!');
            return Redirect::to('/all_product');
            }


            public function AdminAuthCheck(){
                $admin_id=Session::get('admin_id');
                if($admin_id){
                    return;
                }else{
                    return Redirect::to('/admin')->send();
                }
            }
}
