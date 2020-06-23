<!doctype html>
<html lang="en" dir="ltr">
  <head>
		<!-- Meta data -->
		<meta charset="UTF-8">
		<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
		
		<!--favicon -->
		<link rel="icon" href="{{URL::asset('public/admin/assets/images/brand/favicon.png')}}" type="image/png"/>

		<!-- TITLE -->
		<title>Escortlisting | Log in</title>

		<!-- DASHBOARD CSS -->
		<link href="{{URL::asset('public/admin/assets/css/dashboard.css')}}" rel="stylesheet"/>
		<link href="{{URL::asset('public/admin/assets/css/style-modes.css')}}" rel="stylesheet"/>

		<!-- HORIZONTAL-MENU CSS -->
		<link href="{{URL::asset('public/admin/assets/plugins/horizontal-menu/dropdown-effects/fade-down.css')}}" rel="stylesheet">
		<link href="{{URL::asset('public/admin/assets/plugins/horizontal-menu/horizontal-menu.css')}}" rel="stylesheet">

		<!-- SINGLE-PAGE CSS -->
		<link href="{{URL::asset('public/admin/assets/plugins/single-page/css/main.css')}}" rel="stylesheet" type="text/css">

		<!--C3.JS CHARTS PLUGIN -->
		<link href="{{URL::asset('public/admin/assets/plugins/charts-c3/c3-chart.css')}}" rel="stylesheet"/>

		<!-- CUSTOM SCROLL BAR CSS-->
		<link href="{{URL::asset('public/admin/assets/plugins/scroll-bar/jquery.mCustomScrollbar.css')}}" rel="stylesheet"/>

		<!--- FONT-ICONS CSS -->
		<link href="{{URL::asset('public/admin/assets/css/icons.css')}}" rel="stylesheet"/>

		<!-- Skin css-->
		<link href="{{URL::asset('public/admin/assets/skins/skins-modes/color1.css')}}"  id="theme" rel="stylesheet" type="text/css" media="all" />
		
		<!-- developer css-->
		<link href="{{URL::asset('public/admin/assets/css/main.css')}}" rel="stylesheet"/>
	</head>

	<body class="default-header">

		<!-- BACKGROUND-IMAGE -->
		<div class="login-img" >

			<!-- GLOABAL LOADER -->
			<div id="global-loader">
				<img src="{{URL::asset('public/admin/assets/images/svgs/loader.svg')}}" class="loader-img" alt="Loader">
			</div>

			<div class="page" style="background-size: contain;background-image:url({{URL::asset('public/admin/assets/images/background/registration-form-2.jpg)')}};">
				<div class="" >
				    <!-- CONTAINER OPEN -->
					<div class="col col-login mx-auto">
						<div class="text-center">
							<?php /* <img src="{{URL::asset('public/admin/assets/images/brand/header-logo.png')}}" class="header-brand-img" alt="">*/?>
							<h1 style="color:#fd2c94">Escort Listing</h1>
						</div>
					</div>
					<div class="container-login100">
						<div class="wrap-login100 p-6">
							<form class="login100-form validate-form"  method="post" action="{{url('/admin/login')}}">
							<input name="_token" type="hidden" value="{{ csrf_token() }}">
								<span class="login100-form-title">
									Admin Login
								</span>
								
								@if(Session::has('message'))
								<?php /*<p class="img-responsive model_img alert-id-m2" id="sa-close2">{{ Session::get('message') }}</p>*/?>
								<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
								@endif
								@if ($errors->has('email'))
								<div class="error">{{ $errors->first('email') }}</div>
								@endif
								@if ($errors->has('password'))
								<div class="error">{{ $errors->first('password') }}</div>
								@endif								
								<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">									
									<input value="{{ old('email') }}" name="email" class="input100" type="email"  placeholder="Email">
									<span class="focus-input100"></span>
									<span class="symbol-input100">
										<i class="zmdi zmdi-email" aria-hidden="true"></i>
									</span>
									
										
								</div>
								<div class="wrap-input100 validate-input" data-validate = "Password is required">
									<input value="{{ old('password') }}" name="password" class="input100" type="password"  placeholder="Password">
									<span class="focus-input100"></span>
									<span class="symbol-input100">
										<i class="zmdi zmdi-lock" aria-hidden="true"></i>
									</span>
									
								</div>
								
								<?php /*
								<div class="text-right pt-1">
									<p class="mb-0"><a href="forgot-password.html" class="text-primary ml-1">Forgot Password?</a></p>
								</div>*/?>
								<div class="container-login100-form-btn">
									<button class="login100-form-btn btn-primary" type="submit">Login</button>									
								</div>
								<?php /*
								<div class="text-center pt-3">
									<p class="text-dark mb-0">Not a member?<a href="register.html" class="text-primary ml-1">Sign UP now</a></p>
								</div>
								<div class=" flex-c-m text-center mt-3">
								    <p>Or</p>
									<div class="social-icons">
										<ul>
											<li><a class="btn  btn-social btn-block"><i class="fa fa-google-plus text-google-plus"></i> Sign up with Google</a></li>
											<li><a class="btn  btn-social btn-block mt-2"><i class="fa fa-facebook text-facebook"></i> Sign in with Facebook</a></li>
										</ul>
									</div>
								</div>
								*/?>
							</form>
						</div>
					</div>
					<!-- CONTAINER CLOSED -->
				</div>
			</div>
		</div>
		<!-- BACKGROUND-IMAGE CLOSED -->

		<!-- JQUERY SCRIPTS -->
		<script src="{{URL::asset('public/admin/assets/js/vendors/jquery-3.2.1.min.js')}}"></script>

		<!-- BOOTSTRAP SCRIPTS -->
		<script src="{{URL::asset('public/admin/assets/js/vendors/bootstrap.bundle.min.js')}}"></script>

		<!-- SPARKLINE -->
		<script src="{{URL::asset('public/admin/assets/js/vendors/jquery.sparkline.min.js')}}"></script>

		<!-- CHART-CIRCLE -->
		<script src="{{URL::asset('public/admin/assets/js/vendors/circle-progress.min.js')}}"></script>

		<!-- RATING STAR -->
		<script src="{{URL::asset('public/admin/assets/plugins/rating/jquery.rating-stars.js')}}"></script>

		<!-- INPUT MASK PLUGIN-->
		<script src="{{URL::asset('public/admin/assets/plugins/input-mask/jquery.mask.min.js')}}"></script>

		<!-- CUSTOM SCROLL BAR JS-->
		<script src="{{URL::asset('public/admin/assets/plugins/scroll-bar/jquery.mCustomScrollbar.concat.min.js')}}"></script>

		<!-- CUSTOM JS-->
		<script src="{{URL::asset('public/admin/assets/js/custom.js')}}"></script>

	</body>
</html>
