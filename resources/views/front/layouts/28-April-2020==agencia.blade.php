<!DOCTYPE html>
<html lang="en">
	<head><meta charset="gb18030">
		<title>Escort Listing / Agency Dashboard Control</title>
		
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="{{URL::asset('public/front/css/bootstrap.min.css')}}">
		<link rel="stylesheet" type="text/css" href="{{URL::asset('public/front/css/style-lightpink3.css')}}">
		<link rel="stylesheet" type="text/css" href="{{URL::asset('public/front/css/performance.css')}}">
		<link rel="stylesheet" type="text/css" href="{{URL::asset('public/front/css/popupelement.css')}}">
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
					<?php if(Route::getCurrentRoute()->getActionMethod()=='profile' ||  Route::getCurrentRoute()->getActionMethod()=='profile_edit' ) {?>					
					<div class="navbar-brand regis-header" >Completa el formulario</div>
					<?php } ?>
					
					<?php if(!empty(session('agency_id'))){
					//echo "Route==".Route::getCurrentRoute()->getActionMethod();
					?>
					<div class="dasbuttons">
						<?php if((Route::getCurrentRoute()->getActionMethod()=='anuncios_activos' || Route::getCurrentRoute()->getActionMethod()=='zona_top' || Route::getCurrentRoute()->getActionMethod()=='subida_zone' || Route::getCurrentRoute()->getActionMethod()=='faq' || Route::getCurrentRoute()->getActionMethod()=='contact' || Route::getCurrentRoute()->getActionMethod()=='contrasena' || Route::getCurrentRoute()->getActionMethod()=='profile_agencia') && (!empty(session('agency_id')))){ ?>
						<a  href="{{url('/agencia/control')}}" class="btn btn-panel">Panel de control</a>
						<?php } ?>
						<a href="{{url('/agencia/faq')}}" class="btn btn-success" style="background-color:red !important; border-color:red !important;">FAQ</a>
						<a href="{{url('/agencia/contrasena')}}" class="btn btn-success" style="background-color:#28a745 !important; border-color:#28a745 !important;">Contraseña</a>
						<a href="{{url('/agencia/contact-us')}}" class="btn btn-success" style="background-color:#6f42c1 !important; border-color:#6f42c1 !important;">Contactar</a>
					</div>
					<?php } ?>
					<div class="icon-div alta-list">
						<ul class="das-ul">
						<?php if(!empty(session('agency_id'))){?>
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
							<?php }else{  ?>
									<li class="das-li"> 
								<a href="#" class="das-main-anchor"><i class="fas fa-list"></i></a>
								<ul class="das-subul">
									<li class="subli">
										<a href="{{url('/')}}" class="das-subanchor">Volver a la web</a>
									</li>
									<li class="subli">
										<a href="{{url('/members/control')}}" class="das-subanchor active">Panel de control</a>
									</li>
									<li class="subli">
										<a href="{{url('/members/privacy-policy')}}" class="das-subanchor">Textos Legales</a>
									</li>
									<li class="subli">
										<a href="{{url('/logout')}}" class="das-subanchor">Cerrar sesión</a>
									</li>
								</ul>
							</li>
							<?php } ?>
							
						</ul>
					</div>
					
				</div>
			</nav>
			
		</header>
		
		@yield('content')
				<!-- footer-start -->
		@include('front/layouts/footer')
					
		<script type="text/javascript" src="{{URL::asset('public/front/js/jquery.min.js')}}"></script>
		<script type="text/javascript" src="{{URL::asset('public/front/js/popper.min.js')}}"></script>
		<script type="text/javascript" src="{{URL::asset('public/front/js/bootstrap.min.js')}}"></script>
		
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">  
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
 <script>
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();   
});
</script>
	</body>
	</html>	