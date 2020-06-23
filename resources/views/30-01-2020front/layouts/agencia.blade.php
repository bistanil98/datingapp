<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Escort Listing / Agency Dashboard Control</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="{{URL::asset('public/front/css/bootstrap.min.css')}}">
		<link rel="stylesheet" type="text/css" href="{{URL::asset('public/front/css/style-lightpink3.css')}}">
		<link rel="stylesheet" type="text/css" href="{{URL::asset('public/front/css/main.css')}}">
		<link rel="stylesheet" type="text/css" href="{{URL::asset('public/front/css/responsive.css')}}">
		<link rel="stylesheet" type="text/css" href="{{URL::asset('public/front/css/dashboard.css')}}">
		<link rel="stylesheet" type="text/css" href="{{URL::asset('public/front/fontawesome/css/all.min.css')}}">
		<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	</head>
	
	<body>
		<header>
			<nav class="navbar navbar-expand-lg  bg-light navbar-light listing-bar list-barss">
				<div class="container-fluid">
					<!-- Brand -->
					<a class="navbar-brand" href="{{url('/')}}"><!-- <img src="assets/images/header-logo.png" class="img-fluid" alt=""> -->Escort Listing</a>
					
					<div class="dasbuttons">
						<a href="{{url('/agencia/faq')}}" class="btn btn-success">FAQ</a>
						<a href="{{url('/agencia/contrasena')}}" class="btn btn-success">Contraseña</a>
						<a href="{{url('/agencia/contact-us')}}" class="btn btn-success">Contactar</a>
					</div>
					
					<div class="icon-div alta-list">
						<ul class="das-ul">
							<li class="das-li"> 
								<a href="#" class="das-main-anchor"><i class="fas fa-list"></i></a>
								<ul class="das-subul">
									<li class="subli">
										<a href="{{url('/')}}" class="das-subanchor">Volver a la web</a>
									</li>
									<li class="subli">
										<a href="{{url('/agencia/control')}}" class="das-subanchor active">Panel de control</a>
									</li>
									<li class="subli">
										<a href="{{url('/agencia/privacy-policy')}}" class="das-subanchor">Textos Legales</a>
									</li>
									<li class="subli">
										<a href="{{url('/agencia-logout')}}" class="das-subanchor">Cerrar sesión</a>
									</li>
								</ul>
							</li>
							
						</ul>
					</div>
					
				</div>
			</nav>
			
		</header>
		
		@yield('content')
		
		<script type="text/javascript" src="{{URL::asset('public/front/js/jquery.min.js')}}"></script>
		<script type="text/javascript" src="{{URL::asset('public/front/js/popper.min.js')}}"></script>
		<script type="text/javascript" src="{{URL::asset('public/front/js/bootstrap.min.js')}}"></script>
		<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>jQuery UI Datepicker - Default functionality</title>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">  
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
 
</head>
<body>
 

 
 
</body>
</html>
	
	</body>
	</html>	