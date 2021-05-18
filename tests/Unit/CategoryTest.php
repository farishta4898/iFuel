<?php

namespace Tests\Unit;

use Tests\TestCase;
use Session;
use DB;
use App\User;
use App\Admin;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\CategoryController;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CategoryTest extends TestCase
{

    /**
 * @test
 * @runInSeparateProcess
 */
use DatabaseTransactions;
    public function testAllcategory(){
        parent::setUp();
        $this->Adminlogin(1);
        $CategoryCon = new CategoryController;
        $category = $CategoryCon->all_category()['all_category']['all_category_info'][0];
        $this->assertEquals($category->category_name,"Solid: Natural");
    }

    public function testDelete_Category(){
        $this->Adminlogin(1);
        $prodCon = new CategoryController;
        $category_id = 10;
        $category = $prodCon->delete_category($category_id);
        $this->assertDatabaseMissing('tbl_category', [
            'category_id'=>$category_id
        ]);

    }


    public function testUpdate_Category(){
        $this->Adminlogin(1);
        $CategoryCon = new CategoryController;
        $category_id = 32;
        $request= new Request();
        $request->replace([
            'category_name'=>'TestCategory',
            'publication_status' => 1,
            'category_description'=> 'TestCategoryShortDescription',
        ]);
        $category = $CategoryCon->update_category($request,$category_id);
        $this->assertDatabaseHas('tbl_category', [
            'category_name'=>'TestCategory',

        ]);
        $this->assertDatabaseHas('tbl_category', [
            'publication_status' => 1,

        ]);
        $this->assertDatabaseHas('tbl_category', [
            'category_description'=> 'TestCategoryShortDescription',

        ]);
    }

    protected function Adminlogin($id){
        $result=DB::table('tbl_admin')
                ->where('admin_id', $id)
                ->first();

             if($result && empty(session_id())){
                Session::put('admin_name', $result->admin_name);
                Session::put('admin_id', $result->admin_id);
             }
     }
}
