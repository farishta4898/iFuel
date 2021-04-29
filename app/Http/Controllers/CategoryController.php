<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Session;
Session_start();

class CategoryController extends Controller
{
    public function index(){
        $this->AdminAuthCheck();
        return view('admin.add_category');
    }

    public function all_category(){
        $this->AdminAuthCheck();
       $all_category_info = DB::table('tbl_category')->get();
       $manage_category=view('admin.all_category')
         ->with('all_category_info', $all_category_info);
       return view('admin_layout')
         ->with('all_category', $manage_category);
    }

    public function save_category(Request $request){
        $this->AdminAuthCheck();
        $data=array();
            $data['category_id']=$request->category_id;
            $data['category_name']=$request->category_name;
            $data['category_description']=$request->category_description;
            $data['publication_status']=$request->publication_status;
            DB::table('tbl_category')->insert($data);
            Session::put('message', 'Category added successfully!');
            return Redirect::to('/add_category');
    }


    public function unpublished_category($category_id){
        $this->AdminAuthCheck();
            DB::table('tbl_category')
            ->where('category_id', $category_id)
            ->update(['publication_status'=>0]);
            Session::put('message', 'Category unpublished successfully!');
            return Redirect::to('/all_category');
}


public function published_category($category_id){
    $this->AdminAuthCheck();
  DB::table('tbl_category')
  ->where('category_id', $category_id)
  ->update(['publication_status'=>1]);
  Session::put('message', 'Category published successfully!');
  return Redirect::to('/all_category');
}


public function edit_category($category_id){
    $this->AdminAuthCheck();
  $category_info=DB::table('tbl_category')
        ->where('category_id', $category_id)
        ->first();
        $category_info=view('admin.edit_category')
        ->with('category_info', $category_info);
      return view('admin_layout')
        ->with('all_category', $category_info);
}

public function update_category(Request $request, $category_id){
    $this->AdminAuthCheck();
  $data=array();
  $data['category_name']=$request->category_name;
  $data['category_description']=$request->category_description;
  DB::table('tbl_category')
  ->where('category_id', $category_id)
  ->update($data);
  Session::get('message', 'Category updated successfully!');
  return Redirect::to('/all_category');

}

public function delete_category($category_id){
    $this->AdminAuthCheck();
  DB::table('tbl_category')
  ->where('category_id', $category_id)
  ->delete();
  Session::get('message', 'Category deleted successfully!');
  return Redirect::to('/all_category');

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
