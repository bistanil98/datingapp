<!DOCTYPE html>
<html lang="en">
	<head><meta charset="windows-1252">
		<title>Escort Listing / Control</title>
		
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="{{URL::asset('public/front/css/bootstrap.min.css')}}">
		<link rel="stylesheet" type="text/css" href="{{URL::asset('public/front/css/style-lightpink2.css')}}">
		<link rel="stylesheet" type="text/css" href="{{URL::asset('public/front/css/responsive.css')}}">
		<link rel="stylesheet" type="text/css" href="{{URL::asset('public/front/css/popupelement.css')}}">
		<link rel="stylesheet" type="text/css" href="{{URL::asset('public/front/fontawesome/css/all.min.css')}}">	
	</head>
	
	<body>
	    <input type="hidden" id="site_url" value="{{url('/')}}/"/>
		<header>
			<nav class="navbar navbar-expand-lg  bg-light navbar-light listing-bar">
				<div class="container-fluid">
					<!-- Brand -->
					<a class="navbar-brand" href="{{ url('/') }}">Escort Listing</a>
					<?php //if(!empty($members->id)){
					//echo "Route==".Route::getCurrentRoute()->getActionMethod();
					?>
					<div class="dasbuttons">
					    <a  href="{{url('/members/control')}}" class="btn btn-panel">Panel de control</a>
						<a href="{{url('/members/faq')}}" class="btn btn-success" style="background-color:red !important; border-color:red !important;">FAQ</a>
						<a href="{{url('/members/contrasena')}}" class="btn btn-success" style="background-color:#28a745 !important; border-color:#28a745 !important;">Contrase&ntilde;a</a>
						<a href="{{url('/members/contact-us')}}" class="btn btn-success" style="background-color:#6f42c1 !important; border-color:#6f42c1 !important;">Contactar</a>
					</div>
					<?php //} ?>

					<div class="icon-div alta-list">
						<ul class="das-ul">
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
										<a href="{{url('/logout')}}" class="das-subanchor">Cerrar Secci&oacute;n</a>
									</li>
								</ul>
							</li>
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
		<script>
		
		$(".flagfooter a").on("click", function() {	
		jQuery.noConflict(); 
			var title = 	$(this).attr('title');			
			$('#flagfooter-title').text(title);
			$('#flagfooter')	.modal('show');
		});

		</script>

</body>

	</body>
</html>