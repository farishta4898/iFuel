<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Session;
Session_start();

class BrandController extends Controller
{
    public function index(){
        $this->AdminAuthCheck();
        return view('admin.add_brand');
    }

    public function all_brand(){
        $this->AdminAuthCheck();
       $all_brand_info = DB::table('tbl_brand')->get();
       $manage_brand=view('admin.all_brand')
         ->with('all_brand_info', $all_brand_info);
       return view('admin_layout')
         ->with('all_brand', $manage_brand);
    }

    public function save_brand(Request $request){
        $this->AdminAuthCheck();
        $data=array();
            $data['brand_id']=$request->brand_id;
            $data['brand_name']=$request->brand_name;
            $data['brand_description']=$request->brand_description;
            $data['publication_status']=$request->publication_status;
            DB::table('tbl_brand')->insert($data);
            Session::put('message', 'Brand added successfully!');
            return Redirect::to('/add_brand');
    }


    public function unpublished_brand($brand_id){
        $this->AdminAuthCheck();
            DB::table('tbl_brand')
            ->where('brand_id', $brand_id)
            ->update(['publication_status'=>0]);
            Session::put('message', 'Brand unpublished successfully!');
            return Redirect::to('/all_brand');
}


public function published_brand($brand_id){
    $this->AdminAuthCheck();
  DB::table('tbl_brand')
  ->where('brand_id', $brand_id)
  ->update(['publication_status'=>1]);
  Session::put('message', 'Brand published successfully!');
  return Redirect::to('/all_brand');
}


public function edit_brand($brand_id){
    $this->AdminAuthCheck();
  $brand_info=DB::table('tbl_brand')
        ->where('brand_id', $brand_id)
        ->first();
        $brand_info=view('admin.edit_brand')
        ->with('brand_info', $brand_info);
      return view('admin_layout')
        ->with('all_brand', $brand_info);
}

public function update_brand(Request $request, $brand_id){
    $this->AdminAuthCheck();
  $data=array();
  $data['brand_name']=$request->brand_name;
  $data['brand_description']=$request->brand_description;
  DB::table('tbl_brand')
  ->where('brand_id', $brand_id)
  ->update($data);
  Session::get('message', 'Brand updated successfully!');
  return Redirect::to('/all_brand');
}

public function delete_brand($brand_id){
    $this->AdminAuthCheck();
  DB::table('tbl_brand')
  ->where('brand_id', $brand_id)
  ->delete();
  Session::get('message', 'Brand deleted successfully!');
  return Redirect::to('/all_brand');
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
