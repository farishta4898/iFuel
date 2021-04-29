<!DOCTYPE html>
<html lang="en">

<head>
	<!-- start: Meta -->
	<meta charset="utf-8">
	<title>Admin Login</title>
	<meta name="description" content="Metro Admin Template.">
	<meta name="author" content="Łukasz Holeczek">
	<meta name="keyword" content="Metro, Metro UI, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
	<!-- end: Meta -->

	<!-- start: Mobile Specific -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- end: Mobile Specific -->

	<!-- start: CSS -->
	<link id="bootstrap-style" href="{{asset('backend/css/bootstrap.min.css')}}" rel="stylesheet">
	<link href="{{asset('css/bootstrap-responsive.min.css')}}" rel="stylesheet">
	<link id="base-style" href="{{asset('backend/css/style.css')}}" rel="stylesheet">
	<link id="base-style-responsive" href="{{asset('backend/css/style-responsive.css')}}" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&amp;subset=latin,cyrillic-ext,latin-ext' rel='stylesheet' type='text/css'>
	<!-- end: CSS -->


	<!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	  	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<link id="ie-style" href="{{asset('backend/css/ie.css')}}" rel="stylesheet">
	<![endif]-->

	<!--[if IE 9]>
		<link id="ie9style" href="{{asset('backend/css/ie9.css')}}" rel="stylesheet">
	<![endif]-->

	<!-- start: Favicon -->
	<link rel="shortcut icon" href="{{URL::to('backend/img/favicon.ico')}}">
	<!-- end: Favicon -->

			<style type="text/css">
			body {
                background-image: url(frontend/slider_images/fuel-pump.png) !important;
                background-position: left;
                background-repeat: no-repeat;
                background-color:rgb(240, 228, 116)
            }
		</style>



</head>

<body>
		<div class="container-fluid-full" style="position: relative; left: 300px;">
		<div class="row-fluid">

			<div class="row-fluid">
				<div class="login-box"  style="width: 600px;">
					<div class="icons">
						<a href="index.html"><i class="halflings-icon home"></i></a>
						<a href="#"><i class="halflings-icon cog"></i></a>
					</div>

                    <p class="alert-danger">
                    <?php
                    $message=Session::get('message');
                        if($message){
                        echo $message;
                        Session::put('message', null);
                        }
                    ?>
                    </p>



				<center><h1 style="font-size: 2em; color: rgb(216, 90, 111)"><b>Login to your<br>Admin Account</h1></center>
					<form class="form-horizontal" action="{{url('/admin_dashboard')}}" method="post">

                        {{ csrf_field() }}
                        <fieldset>

							<div class="input-prepend" title="Username">
								<span class="add-on"><i class="halflings-icon user"></i></span>
								<input class="input-large span10" name="admin_email" type="text" placeholder="type username"/>
							</div>

							<div class="clearfix"></div>
							<div class="input-prepend" title="Password">
								<span class="add-on"><i class="halflings-icon lock"></i></span>
								<input class="input-large span10" name="admin_password" id="password" type="password" placeholder="type password"/>
							</div>
								<center><button type="submit" class="btn btn-primary" style="background-color: rgb(216, 90, 111); border: 0px; font-size: 20px">Login</button></center>
							<div class="clearfix"></div>
					</form>
					<hr>
				</div><!--/span-->
			</div><!--/row-->

	</div><!--/.fluid-container-->

		</div><!--/fluid-row-->

	<!-- start: JavaScript-->

		<script src="{{asset('backend/js/jquery-1.9.1.min.js')}}"></script>
	    <script src="{{asset('js/jquery-migrate-1.0.0.min.js')}}"></script>
		<script src="{{asset('backend/js/jquery-ui-1.10.0.custom.min.js')}}"></script>
		<script src="{{asset('backend/js/jquery.ui.touch-punch.js')}}"></script>
		<script src="{{asset('backend/js/modernizr.js')}}"></script>
		<script src="{{asset('backend/js/bootstrap.min.js')}}"></script>
		<script src="{{asset('backend/js/jquery.cookie.js')}}"></script>
		<script src='{{asset('backend/js/fullcalendar.min.js')}}'></script>
		<script src='{{asset('backend/js/jquery.dataTables.min.js')}}'></script>
		<script src="{{asset('backend/js/excanvas.js')}}"></script>
		<script src="{{asset('backend/js/jquery.uniform.min.js')}}"></script>
		<script src="{{asset('backend/js/custom.js')}}"></script>
	<!-- end: JavaScript-->

</body>
</html>
