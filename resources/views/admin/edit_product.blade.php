@extends('admin_layout')

@section('admin_content')

<div id="content" class="span10">
<ul class="breadcrumb">
    <li>
        <i class="icon-home"></i>
        <a href="index.html">Admin Dashboard</a>
        <i class="icon-angle-right"></i>
    </li>
    <li>
        <i class="icon-edit"></i>
        <a href="#">Update Product</a>
    </li>
</ul>


<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon edit"></i><span class="break"></span>Update Product</h2>
        </div>


            <p class="alert-success">
                <?php
                $message=Session::get('message');

                if($message)
                {
                    echo $message;
                    Session::put('message', null);
                }
                ?>
            </p>

        <div class="box-content">
            <form class="form-horizontal" action="{{url('/update_product', $product_info->product_id)}}" method="post">
              <fieldset>
                {{ @csrf_field() }}
                <div class="control-group">
                  <label class="control-label" for="textarea2">Product Name</label>
                  <div class="controls">
                    <input type="text" class="input-xlarge" name="product_name" value="{{$product_info->product_name}}">
                  </div>
                </div>

                <div class="control-group">
                    <label class="control-label" for="selectError3">Catgeory</label>
                    <div class="controls">
                      <select id="selectError3" name="category_id">
                          <option>Select Category</option>
            <?php $all_published_category = DB::table('tbl_category')
                                    ->where('publication_status', 1)
                                    ->get();
                foreach($all_published_category as $v_category){?>
                            <option value="{{$v_category -> category_id}}">{{$v_category -> category_name}}</option> <?php } ?>
                      </select>
                    </div>
                  </div>


                 <div class="control-group">
                    <label class="control-label" for="selectError3">Brand</label>
                    <div class="controls">
                      <select id="selectError3" name="brand_id">
                      <option>Select Brand</option>
            <?php $all_published_brand = DB::table('tbl_brand')
                                    ->where('publication_status', 1)
                                    ->get();
                foreach($all_published_brand as $v_brand){?>
                            <option value="{{$v_brand -> brand_id}}">{{$v_brand -> brand_name}}</option>
                <?php } ?>
                      </select>
                    </div>
                  </div>


    <div class="control-group hidden-phone">
      <label class="control-label" for="textarea2">Short Description</label>
      <div class="controls">
        <textarea class="cleditor" name="product_short_description" rows="3" value="{{$product_info->product_short_description}}"></textarea>
      </div>
    </div>

      <div class="control-group hidden-phone">
      <label class="control-label" for="textarea2">Long Description</label>
      <div class="controls">
        <textarea class="cleditor" name="product_long_description" rows="3" value="{{$product_info->product_long_description}}"></textarea>
      </div>
    </div>

    <div class="control-group">
      <label class="control-label" for="textarea2">Price</label>
      <div class="controls">
        <input type="text" class="input-xlarge" name="product_price" value="{{$product_info->product_price}}">
      </div>
    </div>

        <div class="control-group">
                  <label class="control-label" for="fileInput">Image</label>
                  <div class="controls">
                    <input class="input-file uniform_on" name="product_image" id="fileInput" type="file">
                  </div>
                </div>

    <div class="control-group">
      <label class="control-label" for="textarea2">Quantity</label>
      <div class="controls">
        <input type="text" class="input-xlarge" name="product_quantity" value="{{$product_info->product_quantity}}">
      </div>
    </div>

        <label class="control-label" for="textarea2">Publication Status</label>
      <div class="controls">
        <input type="checkbox" name="publication_status" value="1">
    </div>
    </div>


    <div class="form-actions">
      <button type="submit" class="btn btn-primary">Add Product</button>
      <button type="reset" class="btn">Cancel</button>
    </div>
  </fieldset>
</form>

</div>
</div><!--/span-->

</div><!--/row-->

@endsection
