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
        <a href="#">Update Brand</a>
    </li>
</ul>


<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon edit"></i><span class="break"></span>Update Brand</h2>
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
            <form class="form-horizontal" action="{{url('/update_brand', $brand_info->brand_id)}}" method="post">
              <fieldset>
                {{ @csrf_field() }}
                <div class="control-group">
                  <label class="control-label" for="textarea2">Brand Name</label>
                  <div class="controls">
                    <input type="text" class="input-xlarge" name="brand_name" value="{{$brand_info->brand_name}}">
                  </div>
                </div>

                <div class="control-group hidden-phone">
                  <label class="control-label" for="textarea2">Brand Description</label>
                  <div class="controls">
                    <textarea class="cleditor" name="brand_description" rows="3">{{$brand_info->brand_description}}</textarea>
                  </div>
                </div>


                <div class="form-actions">
                  <button type="submit" class="btn btn-primary">Save Info</button>
                  <button type="reset" class="btn">Cancel</button>
                </div>
              </fieldset>
            </form>

        </div>
    </div><!--/span-->

</div><!--/row-->

@endsection
