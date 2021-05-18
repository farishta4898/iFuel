<?php

namespace Tests\Unit;

use Tests\TestCase;
use Session;
use DB;
use App\User;
use App\Admin;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\ProductController;
use Illuminate\Foundation\Testing\DatabaseTransactions;


class ProductTest extends TestCase
{

    /**
 * @test
 * @runInSeparateProcess
 */
use DatabaseTransactions;

    public function testAllproduct(){
        $this->Adminlogin(1);
        $prodCon = new ProductController;
        $products = $prodCon->all_product()['all_product']['all_product_info'][0];
        $this->assertEquals($products->brand_name,"Syndicate Coal Company Ltd");
    }

    public function testDelete_Product(){
        $this->Adminlogin(1);
        $prodCon = new ProductController;
        $product_id = 10;
        $products = $prodCon->delete_product($product_id);
        $this->assertDatabaseMissing('tbl_products', [
            'product_id'=>$product_id
        ]);

    }


    public function testUpdate_Product(){
        $this->Adminlogin(1);
        $prodCon = new ProductController;
        $product_id = 10;
        $request= new Request();
        $request->replace([
            'product_name'=>'TestProduct',
            'category_id'=> 1000,
            'brand_id' => 1000,
            'product_short_description'=> 'TestShortDescription',
            'product_long_description'=> 'TestLongDescription',
            'product_price'=> 1000,
            'product_image'=> "image/VDK3aKxmvGCF5u7UbzHYRhcp5EeD8UTHbG3RMZEH.jpg",
            'product_quantity'=> 1000
        ]);
        $products = $prodCon->update_product($request,$product_id);

        $this->assertDatabaseHas('tbl_products', [
        'product_name'=> 'TestProduct',
        ]);
        $this->assertDatabaseHas('tbl_products', [
        'product_short_description'=> 'TestShortDescription',
        ]);
        $this->assertDatabaseHas('tbl_products', [
        'product_long_description'=> 'TestLongDescription',
        ]);
        $this->assertDatabaseHas('tbl_products', [
        'product_price'=> 1000
        ]);
        $this->assertDatabaseHas('tbl_products', [
        'category_id'=> 1000
        ]);
        $this->assertDatabaseHas('tbl_products', [
        'brand_id' => 1000
        ]);
        $this->assertDatabaseHas('tbl_products', [
        'product_quantity'=> 1000
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
