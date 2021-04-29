@extends('admin_layout')

@section('admin_content')


<div id="content" class="span10">
    <ul class="breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="index.html">Home</a>
            <i class="icon-angle-right"></i>
        </li>
        <li><a href="#">Manage Orders</a></li>
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
                <h2><i class="halflings-icon user"></i><span class="break"></span>Manage Orders</h2>
            </div>



            <div class="box-content">
                <table class="table table-striped table-bordered bootstrap-datatable datatable">
                  <thead>
                      <tr>
                          <th>Order ID</th>
                          <th>Customer Name</th>
                          <th>Total</th>
                          <th>Status</th>
                          <th>Actions</th>
                      </tr>
                  </thead>


                  @foreach($all_order_info as $v_order)


                  <tbody>
                    <tr>
                        <td>{{ $v_order->order_id }}</td>
                        <td class="center">{{ $v_order->customer_name }}</td>
                        <td class="center">{{ $v_order->order_total }}</td>
                        <td class="center">{{ $v_order->order_status }}</td>


                       <td>
                        @if($v_order->order_status == "pending")

                            <a class="btn btn-danger" href="{{URL::to('/pending_order', $v_order->order_id)}}">
                                <i class="halflings-icon white thumbs-down"></i>
                            </a>

                            @else
                            <a class="btn btn-success" href="{{URL::to('/completed_order', $v_order->order_id)}}">
                                <i class="halflings-icon white thumbs-up"></i>
                            </a>

                           @endif
                            <a class="btn btn-info" href="{{URL::to('/view_order', $v_order->order_id)}}">
                                <i class="halflings-icon white edit"></i>
                            </a>
                            <a class="btn btn-danger" href="{{URL::to('/delete_order', $v_order->order_id)}}" id="delete">
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
