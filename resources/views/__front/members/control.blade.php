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
											<li><a class="menu_a" href="">{{ __('menu.go_back')}}</a></li>
											<li><a class="menu_a" href="">{{ __('menu.user_panel')}}</a></li>
											<li><a class="menu_a" href="">{{ __('menu.legal_terms')}}</a></li>
											<li><a class="menu_a" href="{{ url('/logout') }}">{{ __('menu.sign_off')}}</a></li>											
										</ul>
									</li>
								</ul> 
							</div>
					</div>
					
				</div>
			</nav>
		</header>
		
		<section class="listing-panel-sec">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						@if(Session::has('message'))

						<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
						@endif

						<div class="listing-div">
							<div class="row">
								<div class="col-md-12">
									<div class="listing-heading">
									
										<h2>Usuario: {{$members->email}}</h2>
									</div>
								</div>
								
								<div class="col-md-4">
									<a href="{{ action('MembersController@profile')}}">
										<div class="listing-icon-text icon-2">
											<!-- <i class="fas fa-meteor"></i> --><span class="icon-font">Publicar Anuncio</span>
										</div>
									</a>
								</div>
								<div class="col-md-4">
									<a href="#">
										<div class="listing-icon-text icon-3">
											<!-- <i class="fas fa-bullhorn"></i> --> <span>Top Anuncio</span>
										</div>
									</a>
								</div>
								<div class="col-md-4">
									<a href="#">
										<div class="listing-icon-text icon-4">
											<!-- <i class="fas fa-sync"></i> --> <span> Auto Subida</span>
										</div>
									</a>
								</div>
								<div class="col-md-4">
									<a href="#">
										<div class="listing-icon-text icon-1">
											<!-- <i class="fas fa-list"></i> --> <span>Mis Anuncios</span>
										</div>
									</a>
								</div>
								
								
								<div class="col-md-4">
									<a href="#">
										<div class="listing-icon-text common-div icon-5 ">
											<div class="fontawosme-div"><!-- <i class="fas fa-file-invoice-dollar"></i> --> <span>Consumo</span></div> 
											<div class="span-text-div"><span>Facturacion</span></div>
										</div>
									</a>
								</div>
								<div class="col-md-4">
									<a href="#">
										<div class="listing-icon-text common-div icon-6">
											<div class="fontawosme-div"><!-- <i class="fas fa-lock-open"></i> --><span>Contraseña</span></div> 
											<div class="span-text-div"><span>Contactar</span></div>
										</div>
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				
				<div class="row">
					<div class="col-md-12">
						<div class="row">
							<div class="col-md-3 m-auto d-block">
								<div class="listing-center-text">
									<p>Truvalia Global Classifieds OOD
									Iskar 4, 1000 Sofia, Bulgaria</p>
								</div>
							</div>
						</div>
					</div>
					
					
				</div>
				
			</div>
		</section>
		
		
		
		
		
		
		
		
		
		
		
		
		
		<script type="text/javascript" src="{{URL::asset('public/front/js/jquery.min.js')}}"></script>
		<script type="text/javascript" src="{{URL::asset('public/front/js/popper.min.js')}}"></script>
		<script type="text/javascript" src="{{URL::asset('public/front/js/bootstrap.min.js')}}"></script>
		
	</body>
</html>