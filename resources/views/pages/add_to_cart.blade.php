@extends('layout')

@section('content')

<section id="cart_items">
    <div class="container col-sm-12">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
              <li><a href="{{URL::to('welcome')}}">Home</a></li>
              <li class="active">Shopping Cart</li>
            </ol>
        </div>
        <div class="table-responsive cart_info">

            <?php
            $contents=Cart::getContent();
            ?>
            <table class="table table-condensed">
                <thead>
                    <tr class="cart_menu">
                        <td class="image">Image</td>
                        <td class="description">Name</td>
                        <td class="price">Price (per unit)</td>
                        <td class="quantity">Quantity</td>
                        <td class="total">Total</td>
                        <td>Action</td>
                    </tr>
                </thead>
                <tbody>

                    <?php foreach($contents as $v_contents){
                       //echo"<pre>";
                           //print($contents);
                       //echo"</pre>";
                       //exit()
                        ?>


                    <tr>
                        <td class="cart_product">
                            <a href=""><img src="{{URL::to($v_contents->attributes->image)}}" style="height:100px; width:100px" alt=""></a>
                        </td>
                        <td class="cart_description">
                            <h4><a href="">{{ $v_contents->name }}</a></h4>
                            <p>Product ID: {{ $v_contents->id }}</p>
                        </td>
                        <td class="cart_price">
                            <p>{{ $v_contents->price }} BDT</p>
                        </td>
                        <td class="cart_quantity">
                            <div class="cart_quantity_button">
                            <form action="{{URL::to('/update_cart')}}" method="post">
                                {{ csrf_field() }}
                                <input class="cart_quantity_input" type="text" name="quantity" value="{{ $v_contents->quantity }}" autocomplete="off" size="2">
                                <input type="hidden" name="id" value="{{ $v_contents->id }}">
                                <input type="submit" name="submit" class="btn btn-sm" style="background-color: rgb(209, 75, 97); color: white" value="update">
                            </form>
                            </div>
                        </td>
                        <td class="cart_total">
                            <p class="cart_total_price">{{ $v_contents->getPriceSum() }}</p>
                        </td>
                        <td class="cart_delete">
                            <a class="cart_quantity_delete" href="{{URL::to('/delete_to_cart/'.$v_contents->id)}}"><i class="fa fa-times"></i></a>
                        </td>
                    </tr>
                    <?php }?>
                </tbody>
            </table>
        </div>
    </div>
</section> <!--/#cart_items-->


            <div class="col-sm-12">
                <div class="total_area">
                    <ul>
                        <li>Cart Sub Total <span>{{ Cart::getSubTotal() }} BDT</span></li>
                        <li>VAT <span> 0.00 </span></li>
                        <li>Shipping Cost <span>Free</span></li>
                        <li>Total <span>{{ Cart::getSubTotal() }} BDT</span></li>
                    </ul>
                    <?php $customer_id=Session::get('customer_id'); ?>
                    <?php if($customer_id != null){ ?>
                        <a class="btn btn-default check_out" href="{{ URL::to('/checkout') }}">Check Out</a>
                    <?php } else { ?>
                        <a class="btn btn-default check_out" href="{{ URL::to('/login_check') }}">Check Out</a>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</section><!--/#do_action-->

@endsection
