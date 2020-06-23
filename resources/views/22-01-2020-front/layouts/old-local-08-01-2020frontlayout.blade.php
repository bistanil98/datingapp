<!DOCTYPE html>
<html lang="en">
	<head>		
		<title>Escotlisting / Home</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="{{URL::asset('public/front/css/bootstrap.min.css')}}">
		<link rel="stylesheet" type="text/css" href="{{URL::asset('public/front/css/style-lightpink3.css')}}">
		<link rel="stylesheet" type="text/css" href="{{URL::asset('public/front/css/responsive.css')}}">
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
								<select name="category" class="custom-select form-control">
									<option value="escorts">Escorts</option>
									<option value="travestis">Travestis</option>
									<option value="chaperos">Chaperos</option>
								</select>
								<i class='fas fa-caret-down'></i>
								
							</div>
							<div class="input-group ">
								<input name="estas" type="text" class="form-control" placeholder="¿Dónde estás?">
								<div class="input-group-append">
									<span class="input-group-text map-icon-input"><i class="fas fa-map-marker-alt"></i></span>
								</div>
							</div>
							<div class="input-group ">
								<input name="buscas" type="text" class="form-control filtro" placeholder="¿Qué buscas?">
								<div class="input-group-append">
									<button class="btn btn-light input-group-text collapsed" type="button" data-toggle="collapse" data-target="#navs11">Filtros</button>
								</div>
							</div>
							<button class="btn btn-danger " type="submit"><i class="fas fa-search"></i> Buscar</button>
							<div class="input-group listing-arrow">
								<ul class="main-ul">
									<li class="main-li"><a href="#"><i class="fas fa-list"></i></a>
										<ul class="sub-li">
											<li><a href="">Volver a la web</a></li>
											<li><a href="">Panel de usuario</a></li>
											<li><a href="">Terminos legales</a></li>
											<li><a href="">Cerrar sesion</a></li>
										</ul>
									</li>
								</ul>
							</div> 
						</form>
					</div>
				</div>
				<div class="container-fluid">
<div class="row header-row">  
<div class="col-lg-11 offset-lg-1 col-md-12 header-11" >
<div class="serarch-nav search-res-sec collapse" id="navs11">
<ul class="search-ulmain">

<li class="search-mainli">
<div class="nav-icons">
<a href="#" class="left-text">nacionalidad</a>
<a href="#" class="right-icon"><i class="fas fa-chevron-circle-down"></i></a>
</div>
<ul class="sublist-ul">
<li class="sublist-li"><a href="#" class="heading-anchor">Ver Todas</a></li>
<li class="sublist-li"><a href="#"><span><img src="{{URL::asset('public/front/images/spain.png')}}"></span> <span>Argentina</span></a></li>
<li class="sublist-li"><a href="#"><span><img src="{{URL::asset('public/front/images/united-kingdom.png')}}"></span> <span>Bielorrusia</span></a></li>
<li class="sublist-li"><a href="#"><span><img src="{{URL::asset('public/front/images/brazilimg.png')}}"></span> <span>Brasil</span></a></li>
<li class="sublist-li"><a href="#"><span><img src="{{URL::asset('public/front/images/spain.png')}}"></span> <span> Bulgaria</span></a></li>
<li class="sublist-li"><a href="#"><span><img src="{{URL::asset('public/front/images/chile.png')}}"></span> <span>Chile</span></a></li>
<li class="sublist-li"><a href="#"><span><img src="{{URL::asset('public/front/images/china.png')}}"></span> <span>China</span></a></li>
<li class="sublist-li"><a href="#"><span><img src="{{URL::asset('public/front/images/colombia.png')}}"></span> <span>colombia</span></a></li>
<li class="sublist-li"><a href="#"><span><img src="{{URL::asset('public/front/images/costa-rica.png')}}"></span> <span>costa rica</span></a></li>
<li class="sublist-li"><a href="#"><span><img src="{{URL::asset('public/front/images/cuba.png')}}"></span> <span>cuba</span></a></li>
<li class="sublist-li"><a href="#"><span><img src="{{URL::asset('public/front/images/spain.png')}}"></span> <span>espana</span></a></li>
<li class="sublist-li"><a href="#"><span><img src="{{URL::asset('public/front/images/spain.png')}}"></span> <span>china</span></a></li>
<li class="sublist-li"><a href="#"><span><img src="{{URL::asset('public/front/images/spain.png')}}"></span> <span>frabcia</span></a></li>
<li class="sublist-li"><a href="#"><span><img src="{{URL::asset('public/front/images/hungary.png')}}"></span> <span>hungria</span></a></li>
<li class="sublist-li"><a href="#"><span><img src="{{URL::asset('public/front/images/italy.png')}}"></span> <span>italia</span></a></li>
<li class="sublist-li"><a href="#"><span><img src="{{URL::asset('public/front/images/japan.png')}}"></span> <span>japon</span></a></li>
<li class="sublist-li"><a href="#"><span><img src="{{URL::asset('public/front/images/spain.png')}}"></span> <span>paises bajos</span></a></li>
</ul>
</li>

<li class="search-mainli">
<div class="nav-icons">
<a href="#" class="left-text">servicios</a>
<a href="#" class="right-icon"><i class="fas fa-chevron-circle-down"></i></a>
</div>
<ul class="sublist-ul">
<li class="sublist-li firstcheckbox"><form><label><input type="checkbox" name="vehicle1" value="Bike"> <span>Francés natural</span></label>
</form> </li>
<li class="sublist-li firstcheckbox"><form><label><input type="checkbox" name="vehicle1" value="Bike"> <span>Francés Completo</span></label>
</form> </li>
<li class="sublist-li firstcheckbox"><form><label><input type="checkbox" name="vehicle1" value="Bike"> <span>Francés Tragado</span></label>
</form> </li>
<li class="sublist-li firstcheckbox"><form><label><input type="checkbox" name="vehicle1" value="Bike"> <span>Garganta profunda
</span></label>
</form> </li>
<li class="sublist-li firstcheckbox"><form><label><input type="checkbox" name="vehicle1" value="Bike"> <span> Eyaculación facial
</span></label>
</form> </li>
<li class="sublist-li firstcheckbox"><form><label><input type="checkbox" name="vehicle1" value="Bike"> <span>Penetración
</span></label>
</form> </li>
<li class="sublist-li firstcheckbox"><form><label><input type="checkbox" name="vehicle1" value="Bike"> <span>Cubana
</span></label>
</form> </li>
<li class="sublist-li firstcheckbox"><form><label><input type="checkbox" name="vehicle1" value="Bike"> <span>Garganta profunda
</span></label>
</form> </li>
<li class="sublist-li firstcheckbox"><form><label><input type="checkbox" name="vehicle1" value="Bike"> <span> Eyaculación facial
</span></label>
</form> </li>
<li class="sublist-li firstcheckbox"><form><label><input type="checkbox" name="vehicle1" value="Bike"> <span>Penetración
</span></label>
</form> </li>
<li class="sublist-li firstcheckbox"><form><label><input type="checkbox" name="vehicle1" value="Bike"> <span>Cubana
</span></label>
</form> </li>
</ul>
</li>

<li class="search-mainli">
<div class="nav-icons">
<a href="#" class="left-text">disponibilidad</a>
<a href="#" class="right-icon"><i class="fas fa-chevron-circle-down"></i></a>
</div>
<ul class="sublist-ul horiyo-ul">
<li class="sublist-li horiyo-price range-price"><label><span>Horario</span></label>
  <div id="slider-range" class="price-filter-range" name="rangeInput"></div>
<div class="input-range">
<input type="number" min=0 max="9900" oninput="validity.valid||(value='0');" id="min_price" class="price-range-field" />
<input type="number" min=0 max="10000" oninput="validity.valid||(value='10000');" id="max_price" class="price-range-field" />
</div>
</li>
</ul>
</li>

<li class="search-mainli">
<div class="nav-icons">
<a href="#" class="left-text">novedad</a>
<a href="#" class="right-icon"><i class="fas fa-chevron-circle-down"></i></a>
</div>
<ul class="sublist-ul radio-ul">
<li class="sublist-li firstcheckbox"><input type="radio" id="defaultRadio" name="example2">
<label class="radiolabel" for="defaultRadio">Cualquier fecha</label></li>
<li class="sublist-li firstcheckbox"><input type="radio" id="defaultRadio1" name="example2">
<label class="radiolabel" for="defaultRadio1">Últimos 7 días</label></li>
<li class="sublist-li firstcheckbox"><input type="radio" id="defaultRadio2" name="example2">
<label class="radiolabel" for="defaultRadio2">Últimos 15 días</label></li>
<li class="sublist-li firstcheckbox"><input type="radio" id="defaultRadio3" name="example2">
<label class="radiolabel" for="defaultRadio3">Últimos 30 días</label></li>
</ul>
</li>

<li class="search-mainli">
<div class="nav-icons">
<a href="#" class="left-text">tipo</a>
<a href="#" class="right-icon"><i class="fas fa-chevron-circle-down"></i></a>
</div>
<ul class="sublist-ul tipo-ul">
<li class="sublist-li firstcheckbox"><form><label><input type="checkbox" name="vehicle1" value="Bike"> <span>Independiente
</span></label>
</form> </li>
<li class="sublist-li firstcheckbox"><form><label><input type="checkbox" name="vehicle1" value="Bike"> <span>De agencia</span></label>
</form> </li>
<li class="sublist-li firstcheckbox"><form><label><input type="checkbox" name="vehicle1" value="Bike"> <span>Francés Contiene vídeo
</span></label>
</form> </li>
<li class="sublist-li firstcheckbox"><form><label><input type="checkbox" name="vehicle1" value="Bike"> <span>Perfil verificado
</span></label>
</form> </li>
<li class="sublist-li firstcheckbox"><form><label><input type="checkbox" name="vehicle1" value="Bike"> <span> Contiene experiencias
</span></label>
</form> </li>
</ul>
</li>
<!-- <li class="search-mainli">
<div class="nav-icons">
<a href="#" class="left-text">lugar</a>
<a href="#" class="right-icon"><i class="fas fa-chevron-circle-down"></i></a>
</div>
<ul class="sublist-ul lugar-ul">
<li class="sublist-li firstcheckbox"><label><input type="checkbox" name="vehicle1" value="Bike"> <span>Apartamento
</span></label>
</li>
<li class="sublist-li firstcheckbox"><label><input type="checkbox" name="vehicle1" value="Bike"> <span>Hotel
</span></label>
</li>
<li class="sublist-li firstcheckbox"><label><input type="checkbox" name="vehicle1" value="Bike"> <span>Dirección del cliente
</span></label>
</li>
</ul>
</li>
 -->
<li class="search-mainli">
<div class="nav-icons">
<a href="#" class="left-text">apariencia</a>
<a href="#" class="right-icon"><i class="fas fa-chevron-circle-down"></i></a>
</div>
<ul class="sublist-ul horiyo-ul apariencia-ul">
<li class="sublist-li horiyo-price range-price"><label><span>Edad</span></label>
 <div id="slider-rangetwo" class="price-filter-range" name="rangeInput"></div>
<div class="input-range">
<input type="number" min=0 max="9900" oninput="validity.valid||(value='0');" id="min_pricetwo" class="price-range-field" />
<input type="number" min=0 max="10000" oninput="validity.valid||(value='10000');" id="max_pricetwo" class="price-range-field" />
</div>  
</li>
<li class="sublist-li horiyo-price range-price"><label><span>Estatura</span></label>
<div id="slider-rangethree" class="price-filter-range" name="rangeInput"></div>
<div class="input-range">
<input type="number" min=0 max="9900" oninput="validity.valid||(value='0');" id="min_pricethree" class="price-range-field" />
<input type="number" min=0 max="10000" oninput="validity.valid||(value='10000');" id="max_pricethree" class="price-range-field" />
</div>  
</li>
<li class="sublist-li horiyo-price range-price"><label><span>Peso</span></label>
 <div id="slider-rangefour" class="price-filter-range" name="rangeInput"></div>
<div class="input-range">
<input type="number" min=0 max="9900" oninput="validity.valid||(value='0');" id="min_pricefour" class="price-range-field" />
<input type="number" min=0 max="10000" oninput="validity.valid||(value='10000');" id="max_pricefour" class="price-range-field" />
</div> 
</li>
<li class="sublist-li horiyo-price range-price"><label><span>Pelo</span></label>
<div id="slider-rangefive" class="price-filter-range" name="rangeInput"></div>
<div class="input-range">
<input type="number" min=0 max="9900" oninput="validity.valid||(value='0');" id="min_pricefive" class="price-range-field" />
<input type="number" min=0 max="10000" oninput="validity.valid||(value='10000');" id="max_pricefive" class="price-range-field" />
</div>   
</li>
</ul>
</li>

<li class="search-mainli">
<div class="nav-icons">
<a href="#" class="left-text">tarifas</a>
<a href="#" class="right-icon"><i class="fas fa-chevron-circle-down"></i></a>
</div>
<ul class="sublist-ul horiyo-ul last-price">
<li class="sublist-li horiyo-price range-price"><label><span> Tarifas</span></label>
<div id="slider-rangesix" class="price-filter-range" name="rangeInput"></div>
<div class="input-range">
<input type="number" min=0 max="9900" oninput="validity.valid||(value='0');" id="min_pricesix" class="price-range-field" />
<input type="number" min=0 max="10000" oninput="validity.valid||(value='10000');" id="max_pricesix" class="price-range-field" />
</div>     
</li>
<li class="sublist-li firstcheckbox"><label><input type="checkbox" name="vehicle1" value="Bike"> <span>Apartamento
</span></label>
</li>
</ul>
</li>
 </ul> 

</div><!-- serarch-nav -->  
</div><!-- col-md-12 -->
</div><!-- row -->

</div>
			</nav>
		</header>
		
		@yield('content')		
		
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
		</script>
		
		<script>
			// Get the modal
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
			}
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
			function openModal() {
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
		}
		</script>
		<script type="text/javascript">
		$(".btn2").click(function(){
		$("#myModal-gallery").fadeIn();
		});
		
		
		$(function(){
		
		$(window).scroll(function() {
		
        if ($(this).scrollTop() >= 1300) {
		$('.top-fix-button h2').css({"font-size": "30px", "color": "#333"});
		$('.top-fix-button h2').text('Auto Subida');
        }else{
		$('.top-fix-button h2').css({"font-size": "30px", "color": "#fd2c94"});
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
		
        url: APP_URL+'/ajax/login' ,
		
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
		if ($("#register-form").length > 0) {
		$("#register-form").validate({  
		rules: {
		email: {
		
		required: true,
		
		maxlength: 50,
		
		email: true,
		
		remote: {				
		
		url: APP_URL+'/ajax/checkEmail',
		
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
		url: APP_URL+'/ajax/register' ,
        type: "POST",
        data: $('#register-form').serialize(),
        success: function( response ) {
		if(response==1){
		//$('#res_message_register').html('Please check email on sent verification link');				
		window.location.href = APP_URL+'/members/email-password';
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
		$.noConflict();
		</script>
		<script src="{{URL::asset('public/front/plugin/lightbox2/lightbox-plus-jquery.min.js')}}"></script>
		
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" type="text/javascript"></script>
		<script type="text/javascript" src="{{URL::asset('public/front/plugin/price-range-slider/range-slider.js')}}"></script>	
				<script>
$(document).ready(function() {
    var showChar = 200;
    var ellipsestext = "...";
    var moretext = " View more";
    var lesstext = " View less";
    $('.more').each(function() {
        var content = $(this).html();
        if(content.length > showChar) {
		var c = content.substr(0, showChar);
		var h = content.substr(showChar-1, content.length-showChar);		
		var html = c + '<span class="moreellipses">' + ellipsestext+ '&nbsp;</span><span class="morecontent"><span>' + h + '</span>&nbsp;&nbsp;<a href="" class="morelink">' + moretext + '</a></span>';
            $(this).html(html);
        }

    });

    $(".morelink").click(function(){
        if($(this).hasClass("less")) {
            $(this).removeClass("less");
            $(this).html(moretext);
        } else {
            $(this).addClass("less");
            $(this).html(lesstext);
        }
        $(this).parent().prev().toggle();
        $(this).prev().toggle();
        return false;
    });
});


//// video section
const vid = document.querySelector('#videoID');
			 
  
 jQuery(document).on('click', '#videoID', function(){
        if (this.paused) {
            this.play();
			  $(this).addClass("playing");
			  $(this).attr('controls',true);


        } else {
            this.pause();
			 $(this).removeClass("playing");
			 $(this).attr('controls',false);			 
			 vid.load();  
        }
	vid.addEventListener('ended',function(){
			 vid.load(); 
			 $(this).attr('controls',false);	
			 
	});
});


$('.right').click(function() {
   //window.history.pushState('obj', 'PageTitle', '/NewPage');
   	$.ajaxSetup({
		headers: {
		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
		
		});
		var profile_id = $(this).data('id');
		
		$.ajax({
		url: APP_URL+'/ajax/next_fetch_profile' ,
        type: "get",
        data: {'profile_id' : profile_id},
        success: function( response ) {		
			$('.modal-content').html(response);		
        },		
		
		});
	
   return false;
});
 
 $('.left').click(function() {
   //window.history.pushState('obj', 'PageTitle', '/NewPage');
   	$.ajaxSetup({
		headers: {
		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
		
		});
		var profile_id = $(this).data('id');
		
		$.ajax({
		url: APP_URL+'/ajax/previous_fetch_profile' ,
        type: "get",
        data: {'profile_id' : profile_id},
        success: function( response ) {		
			$('.modal-content').html(response);		
        },		
		
		});
	
   return false;
});

</script>


</body>
</html>
				