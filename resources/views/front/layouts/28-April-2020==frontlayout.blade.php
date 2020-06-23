<!DOCTYPE html>

<html lang="en">
	
	<head>		

		<title>Escotlisting / Home</title>

		<meta charset="utf-8">

		<meta name="viewport" content="width=device-width, initial-scale=1">

		<link rel="stylesheet" type="text/css" href="{{URL::asset('public/front/css/bootstrap.min.css')}}">

		<link rel="stylesheet" type="text/css" href="{{URL::asset('public/front/css/style-lightpink3.css')}}">

		<link rel="stylesheet" type="text/css" href="{{URL::asset('public/front/css/performance.css')}}">

		<link rel="stylesheet" type="text/css" href="{{URL::asset('public/front/css/popupelement.css')}}">

		<link rel="stylesheet" type="text/css" href="{{URL::asset('public/front/css/responsive.css')}}">

		<link rel="stylesheet" type="text/css" href="{{URL::asset('public/front/css/main.css')}}">

		<link rel="stylesheet" type="text/css" href="{{URL::asset('public/front/fontawesome/css/all.min.css')}}">

		<link rel="stylesheet" type="text/css" href="{{URL::asset('public/front/css/dashboard.css')}}">

		<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

		<style type="text/css">

			.modal-backdrop {

			z-index: 4 !important;

			} 

		</style>

		

		<link rel="stylesheet" type="text/css" href="{{URL::asset('public/front/plugin/price-range-slider/range-slider.css')}}">		

		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css" type="text/css" media="all" />

		<link rel="stylesheet" type="text/css" href="{{URL::asset('public/front/plugin/lightbox2/lightbox.min.css')}}">

	</head>

	

	<body>

	<input type="hidden" id="site_url" value="{{url('/')}}/"/>

		<header>

			<nav class="navbar navbar-expand-lg  bg-light navbar-light">

				<div class="container-fluid">

					<!-- Brand -->

					<a class="navbar-brand" href="{{url('/')}}"><!-- <img src="assets/images/header-logo.png" class="img-fluid" alt=""> -->Escort Listing</a>

					

					<!-- Toggler/collapsibe Button -->

					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">

						<span class="navbar-toggler-icon"></span>
						
					</button>

					

					<!-- Navbar links -->

					<div class="collapse navbar-collapse" id="collapsibleNavbar">

						<form autocomplete="off" class="form-inline" name="topsearch" method="get" action="{{ action('SearchController@index')}}" >

							<div class="input-group select-droup-down">

								<select id="category" name="category" class="custom-select form-control">

									<option <?php if(isset($category) && $category=='escorts'){ echo 'selected';}?> value="escorts">Escorts</option>

									<option <?php if(isset($category) && $category=='travestis'){ echo 'selected';}?> value="travestis">Travestis</option>

									<option <?php if(isset($category) && $category=='chaperos'){ echo 'selected';}?> value="chaperos">Chaperos</option>

								</select>

								<i class='fas fa-caret-down'></i>

								

							</div>

							<div class="input-group ">

								<input value="<?php if (isset($_GET['location']) &&!empty($_GET['location'])){ echo $_GET['location'];}?>" autocomplete="off" id="geocomplete" name="location" type="text" class="form-control" placeholder="¿Dónde estás?">

								<div class="input-group-append">

									<span class="input-group-text map-icon-input"><i class="fas fa-map-marker-alt"></i></span>

								</div>

							</div>

							<div class="input-group ">

								<input value="<?php if (isset($_GET['keywords']) &&!empty($_GET['keywords'])){ echo $_GET['keywords'];}?>" name="keywords" type="text" class="form-control filtro" placeholder="¿Qué buscas?">

								<div class="input-group-append">

									<button class="btn btn-light input-group-text collapsed" type="button" data-toggle="collapse" data-target="#navs11">Filtros</button>

								</div>

							</div>

							<button class="btn btn-danger <?php if (isset($category) && $category=='travestis'){ echo 'orange';}?><?php if (isset($category) && $category=='chaperos'){ echo 'blue';}?>" type="submit"><i class="fas fa-search"></i> Buscar</button>

							<div class="input-group listing-arrow">

								

								<ul class="main-ul">

									<li class="main-li"><a href="#"><i class="fas fa-list"></i></a>

										<ul class="sub-li">

											<?php if(!empty(session('agency_id'))){?>

												<li><a   href="{{ url('/') }}">Volver a la web</a></li>

												<li><a   href="{{ url('/agencia/control') }}">Panel de control</a></li>

												<li><a   href="{{ url('/agencia/privacy-policy') }}">Textos Legales</a></li>

												<li><a   href="{{ url('/agencia-logout') }}">Cerrar sesión</a></li>	

												

												<?php }else{  ?>

												<li><a   href="{{ url('/') }}">Volver a la web</a></li>

												<li><a   href="{{ url('/members/control') }}">Panel de control</a></li>

												<li><a   href="{{ url('/members/privacy-policy') }}">Textos Legales</a></li>

												<li><a   href="{{ url('/logout') }}">Cerrar sesión</a></li>	

											<?php } ?>

											

										</ul>

									</li>

								</ul>

							</div> 

						</form>

					</div>

				</div>

				<form  id="search-form"  method="post" action="javascript:void(0)">

					@csrf

					<div class="container-fluid">

						<div class="row header-row">

							<div class="col-lg-11 offset-lg-1 col-md-12 header-11" >

								<div class="serarch-nav search-res-sec collapse" id="navs11">

									<ul class="search-ulmain">

										<li class="search-mainli">

											<div class="nav-icons">

												<a href="javascript:void(0);" class="left-text">nacionalidad</a>

												<a href="javascript:void(0);" class="right-icon"><i class="fas fa-chevron-circle-down"></i></a>

												<input type="hidden" name="category"  value="<?php if(isset($category)){ echo $category;}?>" />					 

												<input value="<?php if (isset($_GET['keywords']) &&!empty($_GET['keywords'])){ echo $_GET['keywords'];}?>" name="keywords" type="hidden" >

												<input value="<?php if (isset($_GET['location']) &&!empty($_GET['location'])){ echo $_GET['location'];}?>"  name="location" type="hidden" >

												<input type="hidden" name="nationality" id="nationality" />					 

											</div>

											<ul id="countries" class="sublist-ul country-list">

												<li class="sublist-li"><a href="javascript:void(0);" value="all" class="heading-anchor">Ver Todas</a></li>

												<?php foreach(countries() as $countriesData){?>

													<li class="sublist-li country-flag"><a value="{{$countriesData->nationality}}" href="javascript:void(0);"><span class="countery-image"><img src="{{URL::asset('public/front/images/flags-medium/'.(strtolower($countriesData->alpha_2_code)).'.png')}}"></span> <span class="counter-name">{{$countriesData->nationality}}</span></a></li>

												<?php } ?>

											</ul>

										</li>

										<li class="search-mainli">

											<div class="nav-icons">

												<a href="#" class="left-text">servicios</a>

												<a href="#" class="right-icon"><i class="fas fa-chevron-circle-down"></i></a>

											</div>

											<ul id="services" class="sublist-ul">

												<?php foreach(services() as $servicesData){?>

													<li class="sublist-li firstcheckbox first_01">

														<label><input class="lesft-ab-check" type="checkbox" name="services[]" value="{{$servicesData->name}}"> <span>{{$servicesData->name}}</span></label>                        

													</li> 

												<?php } ?>

												

											</ul>

										</li>

										<li class="search-mainli">

											<div class="nav-icons">

												<a href="#" class="left-text">disponibilidad</a>

												<a href="#" class="right-icon"><i class="fas fa-chevron-circle-down"></i></a>

											</div>

											<ul class="sublist-ul horiyo-ul">

												<li class="sublist-li horiyo-price range-price">

													<label><span>Horario</span></label>

													<div id="slider-availability" class="price-filter-range" name="rangeInput"></div>

													<div class="input-range">

														<input name="min_availability" type="text" readonly   id="min-slider-availability" class="price-range-field left" />

														<input name="max_availability" type="text" readonly   id="max-slider-availability" class="price-range-field right" />

													</div>

												</li>

											</ul>

										</li>

										<li class="search-mainli">

											<div class="nav-icons">

												<a href="#" class="left-text">novedad</a>

												<a href="#" class="right-icon"><i class="fas fa-chevron-circle-down"></i></a>

											</div>

											<ul id="novedad" class="sublist-ul radio-ul">

												<li class="sublist-li firstcheckbox"><input type="radio" id="defaultRadio" value="0" name="novelty">

													<label class="radiolabel" for="defaultRadio">Cualquier fecha</label>

												</li>

												<li class="sublist-li firstcheckbox"><input type="radio" id="defaultRadio1" value="7" name="novelty">

													<label class="radiolabel" for="defaultRadio1">Últimos 7 días</label>

												</li>

												<li class="sublist-li firstcheckbox"><input type="radio" id="defaultRadio2" value="15" name="novelty">

													<label class="radiolabel" for="defaultRadio2">Últimos 15 días</label>

												</li>

												<li class="sublist-li firstcheckbox"><input type="radio" id="defaultRadio3" value="30" name="novelty">

													<label class="radiolabel" for="defaultRadio3">Últimos 30 días</label>

												</li>

											</ul>

										</li>

										<li class="search-mainli">

											<div class="nav-icons">

												<a href="#" class="left-text">tipo</a>

												<a href="#" class="right-icon"><i class="fas fa-chevron-circle-down"></i></a>

											</div>

											<ul id="tipo" class="sublist-ul tipo-ul">

												<li class="sublist-li firstcheckbox">

													<label><input type="checkbox" name="kind[]" value="individual"> <span>Independiente

													</span></label>

													

												</li>

												<li class="sublist-li firstcheckbox">

													<label><input type="checkbox" name="kind[]" value="agency"> <span>De agencia</span></label>

													

												</li>

												<li class="sublist-li firstcheckbox">

													<label><input type="checkbox" name="kind[]" value="videos"> <span>Anuncios con videos

													</span></label>

													

												</li>

												<li class="sublist-li firstcheckbox">

													<label><input type="checkbox" name="kind[]" value="telephone_verify"> <span>Perfil verificado

													</span></label>

													

												</li>

												

											</ul>

										</li>

										<li class="search-mainli">

											<div class="nav-icons">

												<a href="#" class="left-text">apariencia</a>

												<a href="#" class="right-icon"><i class="fas fa-chevron-circle-down"></i></a>

											</div>

											<ul id="pelo" class="sublist-ul horiyo-ul apariencia-ul">

												<li class="sublist-li horiyo-price range-price">

													<label><span>Edad</span></label>

													<div id="slider-age" class="price-filter-range" name="rangeInput"></div>

													<div class="input-range">

														<input type="text" readonly   id="min-slider-age" name="min_age" class="price-range-field left" />

														<input type="text" readonly   id="max-slider-age" name="max_age" class="price-range-field right" />

													</div>

												</li>

												<li class="sublist-li horiyo-price range-price">

													<label><span>Estatura</span></label>

													<div id="slider-height" class="price-filter-range" name="rangeInput"></div>

													<div class="input-range">

														<input type="text" readonly name="min_height"  id="min-slider-height" class="price-range-field left" />

														<input type="text" readonly name="max_height"  id="max-slider-height" class="price-range-field right" />

													</div>

												</li>

												<?php /*

													<li class="sublist-li horiyo-price range-price">

													<label><span>Peso</span></label>

													<div id="slider-weight" class="price-filter-range" name="rangeInput"></div>

													<div class="input-range">

													<input type="text" readonly name="min_weight"   id="min-slider-weight" class="price-range-field left" />

													<input type="text" readonly name="max_weight"  id="max-slider-weight" class="price-range-field right" />

													</div>

												</li>*/?>

												

												<li class="sublist-li horiyo-price range-price pelo-li"><label><span>Pelo</span></label>

													

													<li class="sublist-li firstcheckbox pelo-checkbox">

														<label><input type="checkbox" name="hair[]" value="Blonde"> <span>Blonde

														</span></label>

														

													</li>

													

													<li class="sublist-li firstcheckbox pelo-checkbox">

														<label><input type="checkbox" name="hair[]" value="Brunette"> <span>Brunette</span></label>

														

													</li>

													<li class="sublist-li firstcheckbox pelo-checkbox">

														<label><input type="checkbox" name="hair[]" value="Red Hair"> <span>Red Hair

														</span></label>

														

													</li>

													<li class="sublist-li firstcheckbox pelo-checkbox">

														<label><input type="checkbox" name="hair[]" value="Grey Hair"> <span>Grey Hair

														</span></label>

														

													</li>

													

												</form> </li>

										</ul>

									</li>

									<li class="search-mainli">

										<div class="nav-icons">

											<a href="#" class="left-text">tarifas</a>

											<a href="#" class="right-icon"><i class="fas fa-chevron-circle-down"></i></a>

										</div>

										<ul class="sublist-ul horiyo-ul last-price">

											<li class="sublist-li horiyo-price range-price">

												<label><span> Tarifas</span></label>

												<div id="slider-tarifas" class="price-filter-range" name="rangeInput"></div>

												<div class="input-range">

													<input type="text" readonly  name="min_tariffs"   id="min-slider-tarifas" class="price-range-field left last" />

													<input type="text" readonly name="max_tariffs"   oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" id="max-slider-tarifas" class="price-range-field right" />

												</div>

											</li>

										</ul>

									</li>

								</ul>

							</div>

							<!-- serarch-nav -->  

						</div>

						<!-- col-md-12 -->

					</div>

					<!-- row -->

				</div>

			</form>

		</nav>

	</header>

	

	@yield('content')		

	

	<!-- footer-start -->

	@include('front/layouts/footer')

	<section class="name-emailsec">

		<div class="container">

	<div class="modal fade show" id="contact-report" data-backdrop="static" data-keyboard="false">

    <div class="modal-dialog modal-lg">

      <div class="modal-content">

      

        <!-- Modal Header -->

        <div class="modal-header">

          <h4 class="modal-title"> Denunciar</h4>

          <button id="contact-report-close" type="button" class="close" data-dismiss="modal">×</button>

        </div>

        

        <!-- Modal body -->

        <div class="modal-body">

	<form  id="contact-report-form"  method="post" action="javascript:void(0)">

	@csrf

  <div class="form-group">

    <label for="Name">Name <span style="color:red">*</span></label>

    <input type="text" class="form-control" placeholder="Enter name" name="name" required>

    <input value="report" type="hidden" name="type">

    <input value="" type="hidden" id="report_ad_id" name="agency_id">

  </div>

  <div class="form-group">

    <label for="email">Email <span style="color:red">*</span></label>

    <input type="email" class="form-control" placeholder="Enter email" name="email" required>

  </div>

   <div class="form-group">

    <label for="telephone">Telephone</label>

    <input type="number" class="form-control" placeholder="Enter number" name="telephone">

  </div>

 

  <div class="form-group">

     <label for="comment">Message <span style="color:red">*</span></label>

  <textarea class="form-control" rows="4" name="comments" required></textarea>

  </div>

  

	<div class="form-group">

		<img src="{{URL::asset('public/front/images/captcha-image.png')}}" class="img-fluid" alt="">	

	 <button type="submit" class="btn btn-primary">Submit</button>

	</div>

 

</form>



        </div>

        

       

        

      </div>

    </div>

  </div>	

	</div>

</section>		

	<script type="text/javascript" src="{{URL::asset('public/front/js/jquery.min.js')}}"></script>

	<script type="text/javascript" src="{{URL::asset('public/front/js/popper.min.js')}}"></script>

	<script type="text/javascript" src="{{URL::asset('public/front/js/bootstrap.min.js')}}"></script>

	

	<script>

		$(function(){	

			$(".register_modal").click(function(){	

				jQuery.noConflict(); 

				$("#escrot").modal('hide');

				$("#register-modal").modal('show');

				

			});

			

		});

		

		$(function(){	

			$(".mi-cuenta-modal").click(function(){	

				jQuery.noConflict(); 

				$("#escrot").modal('hide');

				$("#register-modal").modal('show');

				

			});

			

		});

		function openpopup(profile_id,top_subida_profile_listsID,type_ad){												

			jQuery.noConflict(); 

			$('#report_ad_id').val(profile_id);

			$.ajaxSetup({

				headers: {

					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

				}

				

			});												

				$.ajax({	

				url: remove_double_slash(APP_URL+'/ajax/visualizaciones') ,
				type: "POST",
				data: {'profile_id' : profile_id, 'top_subida_profile_listsID' : top_subida_profile_listsID, 'type' : type_ad},

				success: function( response ) {
				},

				});
			
			$.ajax({

				url: remove_double_slash(APP_URL+'/ajax/previous_fetch_profile') ,

				type: "get",

				data: {'profile_id' : profile_id, 'top_subida_profile_listsID' : top_subida_profile_listsID, 'type' : type_ad},

				success: function( response ) {		

					$('.main-pop-sec .modal-body').html(response);		

					$('#girl_modals').modal('show');	

				},		

				

			});

			

			return false;

		}
		
			
	</script>

	

	<script>

		/* // Get the modal

			var modal = document.getElementById("myModalimg");

			

			// Get the image and insert it inside the modal - use its "alt" text as a caption

			var img = document.getElementById("myImg");

			var modalImg = document.getElementById("img01");

			var captionText = document.getElementById("caption");

			img.onclick = function(){

			modal.style.display = "block";

			modalImg.src = this.src;

			//captionText.innerHTML = this.alt;

			}

			

			// Get the <span> element that closes the modal

			var span = document.getElementsByClassName("close")[0];

			

			// When the user clicks on <span> (x), close the modal

			span.onclick = function() { 

			modal.style.display = "none";

		} */

	</script>

	<script type="text/javascript">

		function myFunction() {

			var dots = document.getElementById("dots");

			var moreText = document.getElementById("view-more");

			var btnText = document.getElementById("myBtn");

			

			if (dots.style.display === "none") {

				dots.style.display = "inline";

				btnText.innerHTML = "View more";

				moreText.style.display = "none";

				} else {

				dots.style.display = "none";

				btnText.innerHTML = "View less";

				moreText.style.display = "inline";

			}

		} 

	</script>

	

	<script>

		/* function openModal() {

			document.getElementById("myModal-gallery").style.display = "block";

			}

			

			function closeModal() {

			document.getElementById("myModal-gallery").style.display = "none";

			}

			

			var slideIndex = 1;

			showSlides(slideIndex);

			

			function plusSlides(n) {

			showSlides(slideIndex += n);

			}

			

			function currentSlide(n) {

			showSlides(slideIndex = n);

			}

			

			function showSlides(n) {

			var i;

			var slides = document.getElementsByClassName("mySlides");

			var dots = document.getElementsByClassName("demo");

			var captionText = document.getElementById("caption");

			if (n > slides.length) {slideIndex = 1}

			if (n < 1) {slideIndex = slides.length}

			for (i = 0; i < slides.length; i++) {

			slides[i].style.display = "none";

			}

			for (i = 0; i < dots.length; i++) {

			dots[i].className = dots[i].className.replace(" active", "");

			}

			slides[slideIndex-1].style.display = "block";

			//dots[slideIndex-1].className += " active";

			//captionText.innerHTML = dots[slideIndex-1].alt;

		} */

	</script>

	<script type="text/javascript">

		$(".btn2").click(function(){

			$("#myModal-gallery").fadeIn();

		});

		

		function resize()

		{

			var heights = window.innerHeight;

			document.getElementById("divID").style.height = heights -20 + "px";

		}

		resize();

		window.onresize = function() {

			resize();

		};

		$(function(){

			
	
			$(window).scroll(function() {
				
				if($(window).scrollTop() >= $('.gird-first').offset().top + $('.gird-first').outerHeight() - window.innerHeight) {
					$('.top-fix-button h2').css({"display": "none"});
				}else{
				$('.top-fix-button h2').css({"display": "block"});
				}

				if ($(this).scrollTop() >= $('#divID').height()) {

					

					$('.top-fix-button h2').css({"font-size": "30px", "color": "#333"});

					$('.top-fix-button h2').text('Auto Subida');

					}else{

					var category = $("#category").val();

					if(category=='escorts'){

						$('.top-fix-button h2').css({"font-size": "30px", "color": "#fd2c94"});

						}else if(category=='travestis'){

						$('.top-fix-button h2').css({"font-size": "30px", "color": "#fd5602"});

						}else if(category=='chaperos'){		

						$('.top-fix-button h2').css({"font-size": "30px", "color": "#00bef3"});

					}

					

					$('.top-fix-button h2').text('TOP Anuncio');

					

				}

			});

			

		});

		

		

	</script>

	<script src="{{URL::asset('public/front/validate/jquery.js')}}"></script>  

	<script src="{{URL::asset('public/front/validate/jquery.validate.js')}}"></script>  

	<script src="{{URL::asset('public/front/validate/additional-methods.min.js')}}"></script>   

	

	<style>

		.error{color:red}

	</style>
	
	<script>
    	var APP_URL = {!! json_encode(url('/')) !!};
		if ($("#register-form").length > 0) {
		    
		$("#register-form").validate({  
		rules: {
		email: {
		
		required: true,
		
		maxlength: 50,
		
		email: true,
		
		remote: {				
		
		url: (APP_URL+'/ajax/checkEmail'),
		
		type: "post",
		
		
		
		},
		
		},
		
		},
		
		messages: {
		email: {
		required: "Please enter valid email",
		email: "Please enter valid email",
		maxlength: "The email name should less than or equal to 50 characters",
		remote: "Email Address already exists"
        },
		
		},
		
		submitHandler: function(form) {
		$.ajaxSetup({
		headers: {
		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
		
		});
		
		$('#send_form_register').html('Sending..');
		$.ajax({
		url: remove_double_slash(APP_URL+'/ajax/register') ,
        type: "POST",
        data: $('#register-form').serialize(),
        success: function( response ) {
		if(response >0){
		//$('#res_message_register').html('Please check email on sent verification link');				
		window.location.href = APP_URL+'/members/email-password/'+response;
		}else{			
		$('#res_message_register').html('Please all inputs');
		}
        },
		
		
		});
		
		}
		
		})
		
		}
		
		</script>

	<script>

		

		var APP_URL = {!! json_encode(url('/')) !!};
	
		

		if ($("#login-form").length > 0) {

			

			$("#login-form").validate({

				

				

				

				rules: {

					

					password: {

						

						required: true,

						

						

						

					},

					

					

					

					email: {

						

						required: true,

						

						maxlength: 50,

						

						email: true,

						

					},    

					

				},

				

				messages: {

					

					

					

					password: {

						

						required: "Please enter password",        

						

					},

					

					

					

					email: {

						

						required: "Please enter valid email",

						

						email: "Please enter valid email",

						

						maxlength: "The email name should less than or equal to 50 characters",

						

					},

					

					

					

				},

				

				submitHandler: function(form) {

					

					$.ajaxSetup({

						

						headers: {

							

							'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

							

						}

						

					});

					

					$('#send_form').html('Sending..');

					

					$.ajax({

						

						url:  remove_double_slash(APP_URL+'/ajax/login') ,

						

						type: "POST",

						

						data: $('#login-form').serialize(),

						

						success: function( response ) {

							

							if(response==1){

								

								$(location).attr('href', APP_URL+'/members/control');

								

								}else{			

								$('#res_message').show();

								$('#send_form').html('Submit');

								

								$('#res_message').show();

								

								$('#res_message').html(response);

								

								$('#msg_div').removeClass('d-none'); 

								

								//document.getElementById("login-form").reset(); 

								

								setTimeout(function(){

									

									$('#res_message').hide();

									

									$('#msg_div').hide();

									

								},10000);

								

							}

							

							

							

						}

						

					});

					

				}

				

			})

			

		}

		

	</script>

	

	<script>

		

		var APP_URL = {!! json_encode(url('/')) !!};

		

		if ($("#login-form_cuenta").length > 0) {

			

			$("#login-form_cuenta").validate({

				

				

				

				rules: {

					

					password: {

						

						required: true,

						

						

						

					},

					

					

					

					email: {

						

						required: true,

						

						maxlength: 50,

						

						email: true,

						

					},    

					

				},

				

				messages: {

					

					

					

					password: {

						

						required: "Please enter password",        

						

					},

					

					

					

					email: {

						

						required: "Please enter valid email",

						

						email: "Please enter valid email",

						

						maxlength: "The email name should less than or equal to 50 characters",

						

					},

					

					

					

				},

				

				submitHandler: function(form) {

					

					$.ajaxSetup({

						

						headers: {

							

							'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

							

						}

						

					});

					

					$('#send_form').html('Sending..');

					

					$.ajax({

						

						url:  remove_double_slash(APP_URL+'/ajax/login') ,

						

						type: "POST",

						

						data: $('#login-form_cuenta').serialize(),

						

						success: function( response ) {

							

							if(response==1){

								

								$(location).attr('href', APP_URL+'/members/control');

								

								}else{			

								$('#res_messag_cuentae').show();

								$('#send_form_cuenta').html('Submit');

								

								$('#res_message_cuenta').show();

								

								$('#res_message_cuenta').html(response);

								

								$('#msg_div_cuenta').removeClass('d-none'); 

								

								//document.getElementById("login-form").reset(); 

								

								setTimeout(function(){

									

									$('#res_message_cuenta').hide();

									

									$('#msg_div_cuenta').hide();

									

								},10000);

								

							}

							

							

							

						}

						

					});

					

				}

				

			})

			

		}

		

	</script>

	

	<script>

		

		var APP_URL = {!! json_encode(url('/')) !!};

		

		if ($("#agency-form").length > 0) {

			

			$("#agency-form").validate({

				

				

				

				rules: {

					

					password: {

						

						required: true,

						

						

						

					},

					

					

					

					email: {

						

						required: true,

						

						maxlength: 50,

						

						email: true,

						

					},    

					

				},

				

				messages: {

					

					

					

					password: {

						

						required: "Please enter password",        

						

					},

					

					

					

					email: {

						

						required: "Please enter valid email",

						

						email: "Please enter valid email",

						

						maxlength: "The email name should less than or equal to 50 characters",

						

					},

					

					

					

				},

				

				submitHandler: function(form) {

					

					$.ajaxSetup({

						

						headers: {

							

							'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

							

						}

						

					});

					

					$('#send_form_agency').html('Sending..');

					

					$.ajax({

						

						url:  remove_double_slash(APP_URL+'/ajax/agency_login') ,

						

						type: "POST",

						

						data: $('#agency-form').serialize(),

						

						success: function( response ) {

							

							if(response==1){

								

								$(location).attr('href', APP_URL+'/agencia/control');

								

								}else{			

								$('#res_message_agency').show();

								$('#send_form_agency').html('Submit');

								

								$('#res_message_agency').show();

								

								$('#res_message_agency').html(response);

								

								$('#msg_div_agency').removeClass('d-none'); 

								

								//document.getElementById("agency-form").reset(); 

								

								setTimeout(function(){

									

									$('#res_message_agency').hide();

									

									$('#msg_div_agency').hide();

									

								},10000);

								

							}

							

							

							

						}

						

					});

					

				}

				

			})

			

		}

		

	</script>

	

	<script>

		if ($("#contact-support-agecncy-form").length > 0) {

			$("#contact-support-agecncy-form").validate({  

				rules: {

				

				},

				

				messages: {				

					

				},

				

				submitHandler: function(form) {

					$.ajaxSetup({

						headers: {

							'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

						}

						

					});

					

					$.ajax({

						url:  remove_double_slash(APP_URL+'/ajax/contact_support_agecncy') ,

						type: "POST",

						data: $('#contact-support-agecncy-form').serialize(),

						success: function( response ) {

							if(response>0){

								jQuery.noConflict();

								$('#contact-support-agecncy').modal('hide');								

								 $('#contact-support-agecncy-form').trigger('reset');							

								}else{			

								$('#res_message_register').html('Please all inputs');

							}

						},

						

						

					});

					

				}

				

			})

			

		}

		

	</script>

		

		

		<script>

		if ($("#contact-report-form").length > 0) {

			$("#contact-report-form").validate({  

				rules: {

				

				},

				

				messages: {				

					

				},

				

				submitHandler: function(form) {

					$.ajaxSetup({

						headers: {

							'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

						}

						

					});

					

					$.ajax({

						url:  remove_double_slash(APP_URL+'/ajax/contact_report') ,

						type: "POST",

						data: $('#contact-report-form').serialize(),

						success: function( response ) {

							if(response>0){

								jQuery.noConflict();

								$('#contact-report').modal('hide');								

								 $('#contact-report-form').trigger('reset');							

								}else{			

								//$('#contact-report_message_register').html('Please all inputs');

							}

						},

						

						

					});

					

				}

				

			})

			

		}

		

	</script>

	<script>

		$.noConflict();

	</script>

	<script src="{{URL::asset('public/front/plugin/lightbox2/lightbox-plus-jquery.min.js')}}"></script>

	

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" type="text/javascript"></script>

	<script type="text/javascript" src="{{URL::asset('public/front/plugin/price-range-slider/range-slider.js')}}"></script>	

	<script>

				

		$('.arrow-right').click(function() {

			//window.history.pushState('obj', 'PageTitle', '/NewPage');

			$.ajaxSetup({

				headers: {

					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

				}

				

			});

			var profile_id = $(this).data('id');

			

			$.ajax({

				url:  remove_double_slash(APP_URL+'/ajax/next_fetch_profile') ,

				type: "get",

				data: {'profile_id' : profile_id, 'top_subida_profile_listsID' : ''},

				success: function( response ) {		

					$('.main-pop-sec .modal-body').html(response);				

				},		

				

			});

			

			return false;

		});

		

		$('.arrow-left').click(function() {

			//window.history.pushState('obj', 'PageTitle', '/NewPage');

			$.ajaxSetup({

				headers: {

					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

				}

				

			});

			var profile_id = $(this).data('id');

			

			$.ajax({

				url:  remove_double_slash(APP_URL+'/ajax/previous_fetch_profile') ,

				type: "get",

				data: {'profile_id' : profile_id, 'top_subida_profile_listsID' : ''},

				success: function( response ) {	

					

					$('.main-pop-sec .modal-body').html(response);		

				},		

				

			});

			

			return false;

		});

		

		

		

	</script>

	

	<?php if (isset($category) && $category=='travestis'){ ?><style>.search-res-sec .ui-widget-header { background: #fd5602!important}</style><?php }?>

	<?php if (isset($category) && $category=='chaperos'){ ?><style>.search-res-sec .ui-widget-header { background: #00bef3!important}</style><?php }?>

	<?php if (isset($category) && $category=='escorts'){ ?><style>.search-res-sec .ui-widget-header { background: #fd2c94!important}</style><?php }?>

	

	<script type="text/javascript">

		$( "#geocomplete" ).on('keypress', function(e){

			$.ajaxSetup({

				headers: {

					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

				}

			});

			if($(this).val()!=''){

				$(this).autocomplete({      

					source: APP_URL+"/ajax/populationautocomplete?population=" + $(this).val(),		

					max:10,

					scroll:true,

					minLength:2

				});	

				}else{

				

			}

			

		});	

	</script>

	<style>

		.ui-autocomplete {

		max-height: 200px;

		overflow-y: auto;

		/* prevent horizontal scrollbar */

		overflow-x: hidden;

		/* add padding to account for vertical scrollbar */

		padding-right: 20px;

        } 

	</style>

	

	<script>

		//nationalitycountries novedad

		

		$('#pelo li input[name="hair[]"],#novedad li input,#tipo li input,#services li input,#slider-availability,#slider-age,#slider-height,#slider-weight,#slider-tarifas').on('click', function(){		

			

			$('#searchResult').empty();

			search();

		});

		

		

		$('#countries li a').on('click', function(){		

			value = $(this).attr('value');

			$('#nationality').val(value);

			$('#searchResult').empty();

			search();

		});

		

		

		

		function search(){

			var APP_URL = {!! json_encode(url('/')) !!};

			

			if ($("#search-form").length > 0) {

				$.ajaxSetup({

					headers: {

						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

					}

				});

				

				$.ajax({

					url:  remove_double_slash(APP_URL+'/ajax/search') ,

					type: "POST",

					data: $('#search-form').serialize(),

					success: function( response ) {				

						$('#searchResult').html(response);

					}

				});

			}

		}

		

	</script>

	

	

	<script src="{{URL::asset('public/front/js/masonry.pkgd-4.2.2.js')}}"></script>

	<script type="text/javascript">

		$(document).ready(function(){                                                                                                                   

			setTimeout(function() { masonry_go();}, 1000);                                                                    

		});     

		$(window).resize(function() 

		{

			// jQuery

			

			

			setTimeout(function() { masonry_go();}, 1000);                                                                    

		});                 

		function masonry_go(){

			$('.grid').masonry({

				itemSelector: '.grid-item',

				columnWidth: '.grid-sizer',

				gutter: '.gutter-sizer',

				horizontalOrder: true, // new!

				percentPosition: true

			});                         

		}       

		

	</script>

	<script>

		$(document).ready(function(){

			$('[data-toggle="tooltip"]').tooltip();

		});

		

		

		

	
	</script>

	

	

  	<script>

		

		var APP_URL = {!! json_encode(url('/')) !!};

		

		if ($("#agency-form").length > 0) {

			

			$("#agency-form").validate({

				

				

				

				rules: {

					

					password: {

						

						required: true,

						

						

						

					},

					

					

					

					email: {

						

						required: true,

						

						maxlength: 50,

						

						email: true,

						

					},    

					

				},

				

				messages: {

					

					

					

					password: {

						

						required: "Please enter password",        

						

					},

					

					

					

					email: {

						

						required: "Please enter valid email",

						

						email: "Please enter valid email",

						

						maxlength: "The email name should less than or equal to 50 characters",

						

					},

					

					

					

				},

				

				submitHandler: function(form) {

					

					$.ajaxSetup({

						

						headers: {

							

							'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

							

						}

						

					});

					

					$('#send_form_agency').html('Sending..');

					

					$.ajax({

						

						url:  remove_double_slash(APP_URL+'/ajax/agency_login') ,

						

						type: "POST",

						

						data: $('#agency-form').serialize(),

						

						success: function( response ) {

							

							if(response==1){

								

								$(location).attr('href', APP_URL+'/agencia/control');

								

								}else{			

								$('#res_message_agency').show();

								$('#send_form_agency').html('Submit');

								

								$('#res_message_agency').show();

								

								$('#res_message_agency').html(response);

								

								$('#msg_div_agency').removeClass('d-none'); 

								

								//document.getElementById("agency-form").reset(); 

								

								setTimeout(function(){

									

									$('#res_message_agency').hide();

									

									$('#msg_div_agency').hide();

									

								},10000);

								

							}

							

							

							

						}

						

					});

					

				}

				

			})

			

		}

		function remove_double_slash(temp){
			return temp.replace(/([^:]\/)\/+/g, "$1");
		}

	</script>

	



	<section class="counter-sec">

  

<div class="container-fluid">

  <!-- The Modal -->

  <div class="modal fade" id="counter" data-backdrop="static" data-keyboard="false"  aria-hidden="true">

    <div class="modal-dialog modal-xl">

      <div class="modal-content">

      

        <!-- Modal Header -->

        <div class="modal-header">

          <h4 class="modal-title">Favoritos</h4>

          <div class="delet-imgdiv">

  <span class="main-iconimg">

      <span class="love-icon"><i class="fas fa-heart"></i><span class="counterone">{{favoritos_count()}}</span></span>

      <span class="dele-icona">

		  <a href="javascript:void(0);" onclick="remove_favoritos();" ><i class="far fa-trash-alt"></i></a>

		  <?php /*<a href="javascript:void(0);" class="close" data-dismiss="modal"><i class="fas fa-backspace"></i></a>*/?>

	</span>

     





    </span>



  

</div>

          <button type="button" id="fav-modal-close" class="close" data-dismiss="modal">×</button>

        </div>

        

        <!-- Modal body -->

        <div class="modal-body">

         <div class="counter-images">

          <ul class="countul">

		   <?php $favoritos_list = (favoritos_list());?>

		  <?php if($favoritos_list->isNotEmpty()){?>
            	<?php $favoritos_ids = array(); ?>
			<?php foreach($favoritos_list as $favoritos){?>
			<?php  $favoritos_ids[] = $favoritos->id; ?>

		  <?php 
           $province = createSlug(province($favoritos->province));
												$population = createSlug(($favoritos->population));
												$first_name = createSlug(($favoritos->first_name));
												$id = (($favoritos->id));
												$url = url('escorts/'.$province.'/'.$population.'/'.$first_name.'/'.$id);
												?>

            <li>

          <div class="cunt-img">

          <a href="javascript:void(0);<?php //echo $url;?>" onclick="openpopupfavoritos({{$favoritos->id}})">

            <img src="<?php echo URL::asset('public/uploads/profile_ads/'.$favoritos->profile_pic);?>" alt="" class="img-fluid">
            <div class="dummy-overly">
            <div class="text"><a href="javascript:void(0);" onclick="remove_favoritos_single({{$favoritos->id}})"> <i class="fas fa-times"></i></a></div>
            </div>

            </a>

        </div>    

            </li>

		  <?php }?>

		  <?php }?>

          </ul>

          </div>

       



        </div><!-- body -->

        

      </div>

    </div>

  </div>

  

</div>

</section>
	
	<script>
			function remove_favoritos(){
			
			var APP_URL = {!! json_encode(url('/')) !!};

			var r = confirm('Are you sure to unfavorite Ad');

			if (r == true) {

			$.ajax({

			url:  remove_double_slash(APP_URL+'/ajax/remove_favoritos') ,

			type: "get",						

			success: function( response ) {				

			$('.counter-sec .modal-dialog').html(response);									
			
			setTimeout(function(){
				$('a.alta-button.favrote span#total_favoritas').text(0);	
				},
			1000);
			

			}

			});

			} 

			return false; 

				

		}
			
			function remove_favoritos_single(profile_id){
			
			var APP_URL = {!! json_encode(url('/')) !!};

			var r = confirm('Are you sure to unfavorite this Ad?');

			if (r == true) {

			$.ajax({
			url:  remove_double_slash(APP_URL+'/ajax/remove_favoritos_single') ,
			type: "get",						
			data: {'profile_id' : profile_id},
			success: function( response ) {
			//$('.counter-sec .modal-dialog').html(response);			
			setTimeout(function(){
				$('a.alta-button.favrote span#total_favoritas').text(response);	
				},
			1000);
			

			}

			});
			
			setTimeout(function(){
							$.ajax({
				url:  remove_double_slash(APP_URL+'/ajax/favoritosLoad') ,
				type: "get",
				data: {'profile_id' : profile_id},
				success: function( response ) {					
					$('.counter-sec .modal-dialog').html(response);		
					//alert('<?php echo favoritos_count();?>');
					//$('a.alta-button.favrote span#total_favoritas').text('<?php echo favoritos_count();?>');					
				},		
				
			});
					},
					1500);		
				

			} 

			return false; 

				

		}

				function favoritos(profile_id, class_name){	
				
				jQuery.noConflict(); 
			//$('a.'+class_name+'.a1 i').css("color","#fd2c94");
			$.ajax({
				url:  remove_double_slash(APP_URL+'/ajax/favoritos') ,
				type: "get",
				data: {'profile_id' : profile_id},
				success: function(result) {	
				if(result=='0'){
			    	$('a.'+class_name+'.a1 i').css("color","#fff");
				}else{	
					$('a.'+class_name+'.a1 i').css("color","#fd2c94");
					
				} 
				
					
				},		
				
			});
			setTimeout(function(){
							$.ajax({
				url:  remove_double_slash(APP_URL+'/ajax/favoritosLoad') ,
				type: "get",
				data: {'profile_id' : profile_id},
				success: function( response ) {					
					$('.counter-sec .modal-dialog').html(response);		
					//alert('<?php echo favoritos_count();?>');
					//$('a.alta-button.favrote span#total_favoritas').text('<?php echo favoritos_count();?>');					
				},		
				
			});
					},
					1500);		
					
					setTimeout(function(){
				$.ajax({
				url: remove_double_slash(APP_URL+'/ajax/favoritoTotal') ,
				type: "get",
				data: {'profile_id' : profile_id},
				success: function( response ) {					
					$('a.alta-button.favrote span#total_favoritas').text(response);	
				},		
				
			});
			},
					1500);	
			
			
			return false;
			

		}
		
		//$('#total_favoritas').append('500');	
		
				function openpopupfavoritos(profile_id){												

				jQuery.noConflict(); 

				
			
			$.ajax({

				url: remove_double_slash(APP_URL+'/ajax/previous_fetch_profile_favoritos') ,

				type: "get",

				data: {'profile_id' : profile_id},

				success: function( response ) {		

					$('.main-pop-sec .modal-body').html(response);		

					$('#girl_modals').modal('show');	

				},		

				

			});

			

			return false;

		}
        $('#fav-modal-close').click(function() {
           // alert('h');
            setTimeout(function(){ 
                $("body").addClass("modal-open");
            }, 500);

       
        });
        
        $('#contact-report-close').click(function() {
       // alert('h');
         setTimeout(function(){ 
                $("body").addClass("modal-open");
            }, 500);
        });
       
		</script>
		
		<script>
		$(".sublist-ul li").on("click", function() {		
	//	alert('h');
			$(".sublist-ul li").removeClass("active");
			$(this).addClass("active");
		});

		</script>
		<style>
		li.sublist-li.country-flag.active {
    background: #fff;
}
</style>
		 
</body>

</html>

