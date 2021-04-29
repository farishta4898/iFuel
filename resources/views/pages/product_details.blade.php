@extends('layout')

@section('content')

<section>
    <div class="container">
        <div class="row">
                <div class="left-sidebar">
                    <h2>Product Details</h2>
                    <div class="col-sm-9 padding-right">
                        <div class="product-details"><!--product-details-->
                            <div class="col-sm-5">
                                <div class="view-product">
                                    <img src="{{URL::to($product_by_details->product_image)}}" alt="" />
                                </div>
                        </div>
                        <div class="col-sm-7">
                            <div class="product-information"><!--/product-information-->
                                <img src="{{asset('frontend/images/product-details/new.jpg')}}" class="newarrival" alt="" />
                                <h3>{{$product_by_details->product_name}}</h3>
                                <p>{{$product_by_details->product_long_description}}</p>
                                <img src="{{asset('frontend/images/product-details/rating.png')}}" alt="" />
                                <span>
                            <span>{{$product_by_details->product_price}} BDT</span>
                                <form action="{{URL::to('/add_to_cart')}}" method="POST">
                                    {{ csrf_field() }}
                                    <label>Quantity:</label>
                                    <input name="quantity" type="text" value="1">
                                    <input type="hidden" name="product_id" value={{$product_by_details->product_id}}>
                                    <button type="submit" class="btn btn-fefault cart">
                                        <i class="fa fa-shopping-cart"></i>
                                        Add to cart
                                    </button>
                                </form>
                                </span>

                                <p><b>Availability:</b> In Stock</p>
                                <p><b>Category:</b> {{$product_by_details->category_name}}</p>
                                <p><b>Brand:</b> {{$product_by_details->brand_name}} </p>
                                <a href=""><img src="{{asset('images/product-details/share.png')}}" class="share img-responsive"  alt="" /></a>
                            </div>
                        </div>
                    </div>
                </div>
                        </div>
                    </section>

    @endsection
