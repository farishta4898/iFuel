@extends('admin_layout')

@section('admin_content')


<div id="content" class="span10">
    <ul class="breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="index.html">Home</a>
            <i class="icon-angle-right"></i>
        </li>
        <li><a href="#">All Categories</a></li>
    </ul>


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



    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon user"></i><span class="break"></span>All Categories</h2>
            </div>



            <div class="box-content">
                <table class="table table-striped table-bordered bootstrap-datatable datatable">
                  <thead>
                      <tr>
                          <th>Brand ID</th>
                          <th>Brand Name</th>
                          <th>Brand Description</th>
                          <th>Status</th>
                          <th>Actions</th>
                      </tr>
                  </thead>


                  @foreach($all_brand_info as $v_brand)


                  <tbody>
                    <tr>
                        <td>{{ $v_brand->brand_id }}</td>
                        <td class="center">{{ $v_brand->brand_name }}</td>
                        <td class="center">{{ $v_brand->brand_description }}</td>
                    
                        <td class="center">
                        @if($v_brand->publication_status==1)
                            <span class="label label-success">Published</span>
                        </td>

                        @else
                        <span class="label label-danger">Unpublished</span>
                        </td>

                        @endif
                        <td class="center">


                        @if($v_brand->publication_status==1)

                            <a class="btn btn-danger" href="{{URL::to('/unpublished_brand', $v_brand->brand_id)}}">
                                <i class="halflings-icon white thumbs-down"></i>
                            </a>

                            @else
                            <a class="btn btn-success" href="{{URL::to('/published_brand', $v_brand->brand_id)}}">
                                <i class="halflings-icon white thumbs-up"></i>
                            </a>

                          @endif
                            <a class="btn btn-info" href="{{URL::to('/edit_brand', $v_brand->brand_id)}}">
                                <i class="halflings-icon white edit"></i>
                            </a>
                            <a class="btn btn-danger" href="{{URL::to('/delete_brand', $v_brand->brand_id)}}" id="delete">
                                <i class="halflings-icon white trash"></i>
                            </a>
                        </td>
                    </tr>
                  </tbody>

                  @endforeach

              </table>
            </div>
        </div><!--/span-->
    </div><!--/row-->

@endsection
