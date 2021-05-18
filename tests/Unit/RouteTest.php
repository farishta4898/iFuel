<?php

namespace Tests\Unit;

use Tests\TestCase;
use Session;
use DB;
use App\User;
use App\Admin;
use Auth;
use Illuminate\Http\Request;


class RouteTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */

//product
    public function test_addproduct()
    {
        $response = $this->get('/add_product');
        $response->assertStatus(200);
    }
    public function test_allproduct()
    {
        $response = $this->get('/all_product');
        $response->assertStatus(200);
    }
    public function test_saveproduct()
    {
            $response=$this->postJson('/save_product');
            $this->assertDatabaseHas('tbl_products', [
                'product_name'=> 'new fuel', 'product_id'=> 10,
            ]);
    }
    public function test_editproduct()
    {
        $response=$this->postJson('/edit_product/10', ['product_name' => 'edited']);
        $this->assertDatabaseHas('tbl_products', [
            'product_name'=> 'new fuel'
        ]);
    }
    public function test_updateproduct()
    {
        $response=$this->postJson('/update_product/10',  ['product_name' => 'edited']);
        $this->assertDatabaseHas('tbl_products', [
            'product_name'=> 'new fuel']);
    }
    public function test_deleteproduct()
    {
        $response = $this->get('/delete_product/{10}');
        $response->assertStatus(302);
    }
    public function test_unpublishedproduct()
    {
        $response = $this->get('/unpublished_product/{product_id}');
        $response->assertStatus(302);
    }
    public function test_pulishedproduct()
    {
        $response = $this->get('/published_product/{product_id}');
        $response->assertStatus(302);
    }

//category
    public function test_addcategory()
    {
        $response = $this->get('/add_category');
        $response->assertStatus(200);
    }
    public function test_allcategory()
    {
        $response = $this->get('/all_category');
        $response->assertStatus(200);
    }
    public function test_savecategory()
    {
            $response=$this->postJson('/save_category');
            $this->assertDatabaseHas('tbl_category', [
                'category_id'=> 4
            ]);
    }
    public function test_editcategory()
    {
        $response=$this->postJson('/edit_category/10', ['category_name' => 'edited']);
        $this->assertDatabaseHas('tbl_category', [
            'category_id'=> 4
        ]);
    }
    public function test_updatecategory()
    {
        $response=$this->postJson('/update_category/10',  ['category_name' => 'edited']);
        $this->assertDatabaseHas('tbl_category', [
            'category_id'=> 4
        ]);
    }
    public function test_deletecategory()
    {
        $response = $this->get('/delete_category/{10}');
        $response->assertStatus(302);
    }
    public function test_unpublishedcategory()
    {
        $response = $this->get('/unpublished_category/{category_id}');
        $response->assertStatus(302);
    }
    public function test_publishedcategory()
    {
        $response = $this->get('/published_category/{category_id}');
        $response->assertStatus(302);
    }


//brand
    public function test_addbrand()
    {
        $response = $this->get('/add_brand');
        $response->assertStatus(200);
    }
    public function test_allbrand()
    {
        $response = $this->get('/all_brand');
        $response->assertStatus(200);
    }
    public function test_savebrand()
    {
            $response=$this->postJson('/save_brand');
            $this->assertDatabaseHas('tbl_brand', [
                'brand_id'=> 3
            ]);
    }
    public function test_editbrand()
    {
        $response=$this->postJson('/edit_brand/10', ['brand_name' => 'edited']);
        $this->assertDatabaseHas('tbl_brand', [
            'brand_id'=> 3
        ]);
    }
    public function test_updatebrand()
    {
        $response=$this->postJson('/update_brand/10',  ['brand_name' => 'edited']);
        $this->assertDatabaseHas('tbl_brand', [
            'brand_id'=> 3]);
    }
    public function test_deletebrand()
    {
        $response = $this->get('/delete_brand/{10}');
        $response->assertStatus(302);
    }
    public function test_unpublishedbrand()
    {
        $response = $this->get('/unpublished_brand/{brand_id}');
        $response->assertStatus(302);
    }
    public function test_pulishedbrand()
    {
        $response = $this->get('/published_brand/{brand_id}');
        $response->assertStatus(302);
    }

}
