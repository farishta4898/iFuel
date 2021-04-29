<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>iFuel</title>
    <link href="{{asset('frontend/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/price-range.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/animate.css')}}" rel="stylesheet">
	<link href="{{asset('frontend/css/main.css')}}" rel="stylesheet">
	<link href="{{asset('frontend/css/responsive.css')}}" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="{{asset('frontend/js/html5shiv.js')}}"></script>
	<script src="{{asset('frontend/js/respond.min.js')}}"></script>
    <![endif]-->
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{URL::to('frontend/images/ico/apple-touch-icon-144-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{URL::to('frontend/images/ico/apple-touch-icon-114-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{URL::to('frontend/images/ico/apple-touch-icon-72-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" href="{{URL::to('frontend/images/ico/apple-touch-icon-57-precomposed.png')}}">
</head><!--/head-->

<body>


		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="clearfix col-md-4">
						<div class="logo pull-left">
							<h2><a href={{URL::to('/')}}><img src="{{asset('frontend/images/fuel icon.png')}}" style="width: 50px; height:50px" alt="">
                                <span>i</span>Fuel</h2>
                        </div>

                        </div>
                        <div class="clearfix col-md-8">
                            <div class="clearfix shop-menu pull-right">
                                <ul class="nav navbar-nav">
                                    <li><a href=""><i class="fa fa-user"></i> Account</a></li>
                                    <li><a href=""><i class="fa fa-star"></i> Wishlist</a></li>

                                    <?php $customer_id=Session::get('customer_id');
                                          $shipping_id=Session::get('shipping_id') ?>

                                    <?php if($customer_id != null && $shipping_id == null) { ?>
                                        <li><a href="{{ URL::to('/checkout') }}"><i class="fa fa-crosshairs"></i> Checkout</a></li>
                                    <?php } if($customer_id != null && $shipping_id != null) {?>
                                        <li><a href="{{ URL::to('/payment') }}"><i class="fa fa-crosshairs"></i> Checkout</a></li>
                                    <?php } else { ?>
                                        <li><a href="{{ URL::to('/login_check') }}"><i class="fa fa-crosshairs"></i> Checkout</a></li>
                                    <?php } ?>

                                    <li><a href="{{ URL::to('/show_cart')}}"><i class="fa fa-shopping-cart"></i> Cart</a></li>


                                    <?php $customer_id=Session::get('customer_id') ?>

                                    <?php if($customer_id != null){ ?>
                                    <li><a href="{{ URL::to('/login_check')}}"><i class="fa fa-lock"></i> Logout</a></li>
                                    <?php } else { ?>
                                    <li><a href="{{ URL::to('/login_check')}}"><i class="fa fa-lock"></i> Login</a></li>
                                    <?php } ?>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--/header-middle-->

            <div class="header-bottom"><!--header-bottom-->
                <div class="container">
                    <div class="row">
                        <div class="col-sm-9">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                            </div>
                            <div class="mainmenu pull-left">
                                <ul class="nav navbar-nav collapse navbar-collapse">
                                    <li><a href={{URL::to('/')}} class="active">Home</a></li>
                                    <li><a href="About Us.html">About Us</a></li>
                                    <li class="dropdown"><a href="#">Shop<i class="fa fa-angle-down"></i></a>
                                        <ul role="menu" class="sub-menu">
                                            <li><a href="shop.html">Products</a></li>
                                            <li><a href="product-details.html">Product Details</a></li>
                                            <li><a href="{{ URL::to('/login_check') }}">Checkout</a></li>
                                            <li><a href="{{ URL::to('/show_cart') }}">Cart</a></li>
                                            <li><a href="login.html">Login</a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown"><a href="#">Blog<i class="fa fa-angle-down"></i></a>
                                        <ul role="menu" class="sub-menu">
                                            <li><a href="blog.html">Blog List</a></li>
                                            <li><a href="blog-single.html">Blog Single</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="contact-us.html">Contact</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="search_box pull-right">
                                <input type="text" placeholder="Search"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--/header-bottom-->
        </header><!--/header-->


<div class="container">
<div class="review-payment">
    <h2>Review & Payment</h2>
</div>
<section id="cart_items">
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
</div>


<div class="col-sm-12">
        <div class="total_area">
            <ul>
                <li>Cart Sub Total <span>{{ Cart::getSubTotal() }} BDT</span></li>
                <li>VAT <span> 0.00 </span></li>
                <li>Shipping Cost <span>Free</span></li>
                <li>Total <span>{{ Cart::getSubTotal() }} BDT</span></li>
            </ul>
        </div>
</div>
</div>
</section>


<div class="container" style="padding-top:10px">
	<div class="row">
		<div class="paymentCont">
						<div class="headingWrap">
								<h2 class="text-center headingTop">Select Your Payment Method</h2>

						</div>
                        <form action="{{url('/order_place') }}" method="post">
                            {{ csrf_field() }}
						<div class="paymentWrap">
							<div class="btn-group paymentBtnGroup btn-group-justified" data-toggle="buttons">
					            <label class="btn paymentMethod active">
					            	<div class="method cash"></div>
					                <input type="radio" name="payment_method" value="cash" checked>
					            </label>
					            <label class="btn paymentMethod">
					            	<div class="method bkash"></div>
					                <input type="radio" name="payment_method" value="bkash">
					            </label>
					            <label class="btn paymentMethod">
				            		<div class="method visa"></div>
					                <input type="radio" name="payment_method" value="paypal">
					            </label>
					             <label class="btn paymentMethod">
				             		<div class="method mastercard"></div>
					                <input type="radio" name="payment_method" value="visa">
					            </label>
					            <label class="btn paymentMethod">
				            		<div class="method paypal"></div>
					                <input type="radio" name="payment_method" value="mastercard">
					            </label>
					        </div>
						</div>


						<div class="clearfix footerNavWrap">
                        <center>
							<input type="submit" value="submit" class="btn btn-success"></input>
                        </center>
						</div>
                    </form>
					</div>

	</div>
</div>


<footer id="footer"><!--Footer-->
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-sm-2">
                    <div class="companyinfo">
                        <h2><a href={{URL::to('/')}}><img src="{{asset('frontend/images/fuel icon.png')}}" style="width: 50px; height:50px" alt="">
                        <span>i</span>Fuel</h2>
                        <p>Get your fuel supply from our widest range... faster and safer, anywhere and aytime!</p>
                    </div>
                </div>
                <div class="col-sm-7">
                    <div class="col-sm-3">
                        <div class="text-center video-gallery">
                            <a href="#">
                                <div class="iframe-img">
                                    <img src="images/home/iframe1.png" alt="" />
                                </div>
                                <div class="overlay-icon">
                                    <i class="fa fa-play-circle-o"></i>
                                </div>
                            </a>

                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="text-center video-gallery">
                            <a href="#">
                                <div class="iframe-img">
                                    <img src="images/home/iframe2.png" alt="" />
                                </div>
                                <div class="overlay-icon">
                                    <i class="fa fa-play-circle-o"></i>
                                </div>
                            </a>

                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="text-center video-gallery">
                            <a href="#">
                                <div class="iframe-img">
                                    <img src="images/home/iframe3.png" alt="" />
                                </div>
                                <div class="overlay-icon">
                                    <i class="fa fa-play-circle-o"></i>
                                </div>
                            </a>

                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="text-center video-gallery">
                            <a href="#">
                                <div class="iframe-img">
                                    <img src="images/home/iframe4.png" alt="" />
                                </div>
                                <div class="overlay-icon">
                                    <i class="fa fa-play-circle-o"></i>
                                </div>
                            </a>

                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="address">
                        <img src="images/home/map.png" alt="" />
                        <p>505 S Atlantic Ave Virginia Beach, VA(Virginia)</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-widget">
        <div class="container">
            <div class="row">
                <div class="col-sm-2">
                    <div class="single-widget">
                        <h2>Service</h2>
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="#">Online Help</a></li>
                            <li><a href="#">Contact Us</a></li>
                            <li><a href="#">Order Status</a></li>
                            <li><a href="#">Change Location</a></li>
                            <li><a href="#">FAQ’s</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="single-widget">
                        <h2>Quick Shop</h2>
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="#">Solid: Natural</a></li>
                            <li><a href="#">Solid: Artificial</a></li>
                            <li><a href="#">Liquid: Natural</a></li>
                            <li><a href="#">Liquid: Artificial</a></li>
                            <li><a href="#">Gaseous: Natural</a></li>
                            <li><a href="#">Gaseous: Artificial</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="single-widget">
                        <h2>Policies</h2>
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="#">Terms of Use</a></li>
                            <li><a href="#">Privecy Policy</a></li>
                            <li><a href="#">Refund Policy</a></li>
                            <li><a href="#">Billing System</a></li>
                            <li><a href="#">Ticket System</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="single-widget">
                        <h2>About Shopper</h2>
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="#">Company Information</a></li>
                            <li><a href="#">Careers</a></li>
                            <li><a href="#">Store Location</a></li>
                            <li><a href="#">Affillate Program</a></li>
                            <li><a href="#">Copyright</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-3 col-sm-offset-1">
                    <div class="single-widget">
                        <h2>About Shopper</h2>
                        <form action="#" class="searchform">
                            <input type="text" placeholder="Your email address" />
                            <button type="submit" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i></button>
                            <p>Get the most recent updates from <br />our site and be updated your self...</p>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <p class="pull-left">Copyright © <script>document.write(new Date().getFullYear())</script> iFuel Ltd. All rights reserved.</p>
                <p class="pull-right">
            </div>
        </div>
    </div>

</footer><!--/Footer-->



<script src="{{asset('frontend/js/jquery.js')}}"></script>
<script src="{{asset('frontend/js/bootstrap.min.js')}}"></script>
<script src="{{asset('frontend/js/jquery.scrollUp.min.js')}}"></script>
<script src="{{asset('frontend/js/price-range.js')}}"></script>
<script src="{{asset('frontend/js/jquery.prettyPhoto.js')}}"></script>
<script src="{{asset('frontend/js/main.js')}}"></script>
<script src="{{asset('code.jquery.com/jquery-1.11.1.min.js')}}"></script>
</body>
</html>
