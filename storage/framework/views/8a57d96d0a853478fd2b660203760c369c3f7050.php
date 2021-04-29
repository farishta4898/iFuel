<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>iFuel</title>
    <link href="<?php echo e(asset('frontend/css/bootstrap.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('frontend/css/font-awesome.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('frontend/css/prettyPhoto.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('frontend/css/price-range.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('frontend/css/animate.css')); ?>" rel="stylesheet">
	<link href="<?php echo e(asset('frontend/css/main.css')); ?>" rel="stylesheet">
	<link href="<?php echo e(asset('frontend/css/responsive.css')); ?>" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="<?php echo e(asset('frontend/js/html5shiv.js')); ?>"></script>
	<script src="<?php echo e(asset('frontend/js/respond.min.js')); ?>"></script>
    <![endif]-->
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo e(URL::to('frontend/images/ico/apple-touch-icon-144-precomposed.png')); ?>">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo e(URL::to('frontend/images/ico/apple-touch-icon-114-precomposed.png')); ?>">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo e(URL::to('frontend/images/ico/apple-touch-icon-72-precomposed.png')); ?>">
    <link rel="apple-touch-icon-precomposed" href="<?php echo e(URL::to('frontend/images/ico/apple-touch-icon-57-precomposed.png')); ?>">
</head><!--/head-->

<body>

	<header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href="#"><i class="fa fa-phone"></i> +2 95 01 88 821</a></li>
								<li><a href="#"><i class="fa fa-envelope"></i> info@domain.com</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
								<li><a href="#"><i class="fa fa-dribbble"></i></a></li>
								<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header_top-->

		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="clearfix col-md-4">
						<div class="logo pull-left">
							<h2><a href=<?php echo e(URL::to('/')); ?>><img src="<?php echo e(asset('frontend/images/fuel icon.png')); ?>" style="width: 50px; height:50px" alt="">
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
                                        <li><a href="<?php echo e(URL::to('/checkout')); ?>"><i class="fa fa-crosshairs"></i> Checkout</a></li>
                                    <?php } if($customer_id != null && $shipping_id != null) {?>
                                        <li><a href="<?php echo e(URL::to('/payment')); ?>"><i class="fa fa-crosshairs"></i> Checkout</a></li>
                                    <?php } else { ?>
                                        <li><a href="<?php echo e(URL::to('/login_check')); ?>"><i class="fa fa-crosshairs"></i> Checkout</a></li>
                                    <?php } ?>

                                    <li><a href="<?php echo e(URL::to('/show_cart')); ?>"><i class="fa fa-shopping-cart"></i> Cart</a></li>


                                    <?php $customer_id=Session::get('customer_id') ?>

                                    <?php if($customer_id != null){ ?>
                                    <li><a href="<?php echo e(URL::to('/login_check')); ?>"><i class="fa fa-lock"></i> Logout</a></li>
                                    <?php } else { ?>
                                    <li><a href="<?php echo e(URL::to('/login_check')); ?>"><i class="fa fa-lock"></i> Login</a></li>
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
                                    <li><a href=<?php echo e(URL::to('/')); ?> class="active">Home</a></li>
                                    <li><a href="About Us.html">About Us</a></li>
                                    <li class="dropdown"><a href="#">Shop<i class="fa fa-angle-down"></i></a>
                                        <ul role="menu" class="sub-menu">
                                            <li><a href="shop.html">Products</a></li>
                                            <li><a href="product-details.html">Product Details</a></li>
                                            <li><a href="<?php echo e(URL::to('/login_check')); ?>">Checkout</a></li>
                                            <li><a href="<?php echo e(URL::to('/show_cart')); ?>">Cart</a></li>
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




<section id="form"><!--form-->
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-sm-offset-1">
                <div class="login-form">

                    <h2>Login to your account</h2>
                    <form action="<?php echo e(URL::to('/customer_login')); ?>" method="post">
                        <?php echo e(csrf_field()); ?>

                        <input type="email" placeholder="Email" name="customer_email"/>
                        <input type="password" placeholder="Password" name="password"/>
                        <button type="submit" class="btn btn-default">Login</button>
                    </form>
                </div><!--/login form-->
            </div>


            <div class="col-sm-1">
                <h2 class="or">OR</h2>
            </div>


            <div class="col-sm-4">
                <div class="signup-form"><!--sign up form-->
                    <h2>New User Signup!</h2>
                    <form action="<?php echo e(URL::to('/customer_registration')); ?>" method="post">
                        <?php echo e(csrf_field()); ?>

                        <input type="text" placeholder="Full Name" name="customer_name"/>
                        <input type="email" placeholder="Email Address" name="customer_email"/>
                        <input type="password" placeholder="Password" name="password"/>
                        <input type="text" placeholder="mobile" name="mobile_number"/>
                        <button type="submit" class="btn btn-default">Signup</button>
                    </form>
                </div><!--/sign up form-->
            </div>
        </div>
    </div>
</section><!--/form-->







<footer id="footer"><!--Footer-->
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-sm-2">
                    <div class="companyinfo">
                        <h2><a href=<?php echo e(URL::to('/')); ?>><img src="<?php echo e(asset('frontend/images/fuel icon.png')); ?>" style="width: 50px; height:50px" alt="">
                            <span>i</span>Fuel</h2>
                        <p>Fuel at your doorstep!</p>
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
                            <p>Circle of Hands</p>
                            <h2>24 DEC 2014</h2>
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
                            <p>Circle of Hands</p>
                            <h2>24 DEC 2014</h2>
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
                            <p>Circle of Hands</p>
                            <h2>24 DEC 2014</h2>
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
                            <p>Circle of Hands</p>
                            <h2>24 DEC 2014</h2>
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



<script src="<?php echo e(asset('frontend/js/jquery.js')); ?>"></script>
<script src="<?php echo e(asset('frontend/js/bootstrap.min.js')); ?>"></script>
<script src="<?php echo e(asset('frontend/js/jquery.scrollUp.min.js')); ?>"></script>
<script src="<?php echo e(asset('frontend/js/price-range.js')); ?>"></script>
<script src="<?php echo e(asset('frontend/js/jquery.prettyPhoto.js')); ?>"></script>
<script src="<?php echo e(asset('frontend/js/main.js')); ?>"></script>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\elaravel\resources\views/pages/login.blade.php ENDPATH**/ ?>