<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Escort Listing / Control</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="{{URL::asset('public/front/css/bootstrap.min.css')}}">
		<link rel="stylesheet" type="text/css" href="{{URL::asset('public/front/css/style-lightpink2.css')}}">
		<link rel="stylesheet" type="text/css" href="{{URL::asset('public/front/css/responsive.css')}}">
		<link rel="stylesheet" type="text/css" href="{{URL::asset('public/front/fontawesome/css/all.min.css')}}">	
	</head>
	
	<body>
		<header>
			<nav class="navbar navbar-expand-lg  bg-light navbar-light listing-bar">
				<div class="container-fluid">
					<!-- Brand -->
					<a class="navbar-brand" href="{{ url('/') }}"><!-- <img src="assets/images/header-logo.png" class="img-fluid" alt=""> -->Escort Listing</a>
					
					
					
					<div class="icon-div alta-list">
						
						<div class="input-group listing-arrow">
								<ul class="main-ul">
									<li class="main-li"><a class="menu_first" href="#"><i class="fas fa-list"></i></a>
										<ul class="sub-li">
											<li><a class="menu_a" href="{{ url('/') }}">{{ __('menu.go_back')}}</a></li>
											<li><a class="menu_a" href="{{ url('/members/control') }}">{{ __('menu.user_panel')}}</a></li>
											<li><a class="menu_a" href="{{ url('/members/privacy-policy') }}">{{ __('menu.legal_terms')}}</a></li>
											<li><a class="menu_a" href="{{ url('/logout') }}">{{ __('menu.sign_off')}}</a></li>											
										</ul>
									</li>
								</ul> 
							</div>
					</div>
					
				</div>
			</nav>
		</header>
		
		@yield('content')
		
				
		<script type="text/javascript" src="{{URL::asset('public/front/js/jquery.min.js')}}"></script>
		<script type="text/javascript" src="{{URL::asset('public/front/js/popper.min.js')}}"></script>
		<script type="text/javascript" src="{{URL::asset('public/front/js/bootstrap.min.js')}}"></script>
		
	</body>
</html>