<?php

namespace Tests\Unit;

use Tests\TestCase;
use Session;
use DB;
use App\User;
use App\Admin;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\BrandController;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Redirect;

class BrandTest extends TestCase
{

    /**
 * @test
 * @runInSeparateProcess
 */
use DatabaseTransactions;
    public function testAllbrand(){
        $this->Adminlogin(1);
        $BrandCon = new BrandController;
        $brand = $BrandCon->all_brand()['all_brand']['all_brand_info'][0];
        $this->assertEquals($brand->brand_name,"Chevron Bangladesh");
    }

    public function testDelete_Brand(){
        $this->Adminlogin(1);
        $BrandCon= new BrandController;
        $brand_id = 10;
        $brand = $BrandCon->delete_brand($brand_id);
        $this->assertDatabaseMissing('tbl_brand', [
            'brand_id'=>$brand_id
        ]);

    }


    public function testUpdate_Brand(){
        $this->Adminlogin(1);
        $BrandCon = new BrandController;
        $brand_id = 10;
        $request= new Request();
        $request->replace([
            'brand_name'=>'TestBrand',
            'publication_status' => 1,
            'brand_description'=> 'TestBrandDescription',
        ]);
        $brand = $BrandCon->update_brand($request,$brand_id);
        $this->assertDatabaseHas('tbl_brand', [
            'brand_name'=>'TestBrand',

        ]);
        $this->assertDatabaseHas('tbl_brand', [
            'publication_status' => 1,

        ]);
        $this->assertDatabaseHas('tbl_brand', [
            'brand_description'=> 'TestBrandDescription',

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
