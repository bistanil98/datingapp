@extends('admin.layouts.frontlayout')
@section('content')

		
		<link rel="stylesheet" type="text/css" href="{{URL::asset('public/front/css/admin-style-lightpink2.css')}}">
		
		
	<!-- Page Heading -->
	@if (Session::has('message'))
	<span class="alert-id-m" id="sa-close" >{!! session('message') !!}</span>
	@endif 
	<?php  require app_path()."/constant/profile_values.php";?>
<!-- CONTAINER -->
				<div class="container content-area relative">

				   <!-- PAGE-HEADER -->
					<div class="page-header">
						<h4 class="page-title">Profile View</h4>
						<ol class="breadcrumb">
							 <li class="breadcrumb-item"><a href="{{ url('/admin/home') }}">Home</a></li>
							 <li class="breadcrumb-item"><a href="{{ url('/admin/profile/index/'.strtolower($data->category).'') }}">Profile</a></li>                                
								<li class="breadcrumb-item active">View</li>
							
						</ol>
					</div>
					<!-- PAGE-HEADER END -->

					<!-- ROW-1 OPEN -->
					
						<div class="row">
					<div class="col-lg-12">
							
							
								<div class="card-body">
							
<section class="main-pop-sec">
				<!-- The Modal -->
				<div >
					  
					<div class="modal-dialog main-popup modal-xl">
						<div class="row">
							<div class="modal-content">
								<!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
								<div class="col-md-12">
									<div class="row">
										<div class="col-md-6">
											<div class="main-div-popup">
												<div class="top-pop-img common-left">
													<div class="profile-img-top">
													<?php $profile =  profile_photo($data->id);
														if(!empty($profile)){?>
														<img src="<?php echo URL::asset('public/uploads/profile_ads/'.$profile);?>"  class="img-fluid" alt="" width="100%" height="100%" id="myImg">
														<?php }?>
														
														<div class="profile-img-text">
															<a href="#photos"><i class="fa fa-image"></i> 22 Pictures</a>
														</div>
														
														
														
														
													</div>
												</div>
												
												<div class="graf-img-main common-left">
													
													<div id="anuncio_productos"><h4>Statistics Of This Ad</h4> <span id="estadisticas_ver_mas" class="onclick enlace_antiguo" data-src="/estadisticas/8xwbj">ver más</span></span>
													<div class="producto_estadisticas">
														<div id="anuncio_estadisticas" style="padding-top: 0px;" class="chart"><div style="position: relative;"><div style="position: relative; width: 309px; height: 110px;" dir="ltr"><div style="position: absolute; left: 0px; top: 0px; width: 100%; height: 100%;" aria-label="Un gráfico."><svg width="309" height="110" style="overflow: hidden;" aria-label="Un gráfico."><defs id="defs"><clipPath id="_ABSTRACT_RENDERER_ID_1"><rect x="54" y="15" width="246" height="70"></rect></clipPath></defs><rect x="0" y="0" width="309" height="110" stroke="none" stroke-width="0" fill="#ffffff"></rect><g><rect x="54" y="15" width="246" height="70" stroke="none" stroke-width="0" fill-opacity="0" fill="#ffffff"></rect><g clip-path="url(https://www.slumi.com/escorts/barcelona/capital/pla%C3%A7a-espanya/la-escort-mas-complaciente-acabo-de-llegar-a-la-ciudad-id-8xwbj#_ABSTRACT_RENDERER_ID_1)"><g><rect x="54" y="84" width="246" height="1" stroke="none" stroke-width="0" fill="#cccccc"></rect><rect x="54" y="67" width="246" height="1" stroke="none" stroke-width="0" fill="#cccccc"></rect><rect x="54" y="50" width="246" height="1" stroke="none" stroke-width="0" fill="#cccccc"></rect><rect x="54" y="32" width="246" height="1" stroke="none" stroke-width="0" fill="#cccccc"></rect><rect x="54" y="15" width="246" height="1" stroke="none" stroke-width="0" fill="#cccccc"></rect></g><g><g><path d="M54.5,84.5L54.5,84.5L54.5,69.182L79,31.85875L103.5,34.60725L128,33.23875L152.5,33.54925L177,36.34375L201.5,31.163000000000004L226,25.125500000000002L250.5,56.13525L275,33.67575L299.5,66.629L299.5,84.5L299.5,84.5Z" stroke="none" stroke-width="0" fill-opacity="0.4" fill="#0072c6"></path></g></g><g><rect x="54" y="84" width="246" height="1" stroke="none" stroke-width="0" fill="#333333"></rect></g><g><path d="M54.5,69.182L79,31.85875L103.5,34.60725L128,33.23875L152.5,33.54925L177,36.34375L201.5,31.163000000000004L226,25.125500000000002L250.5,56.13525L275,33.67575L299.5,66.629" stroke="#0072c6" stroke-width="2" fill-opacity="1" fill="none"></path></g></g><g></g><g><g><text text-anchor="end" x="46.5" y="88.35" font-family="Verdana" font-size="11" stroke="none" stroke-width="0" fill="#444444">0</text></g><g><text text-anchor="end" x="46.5" y="71.1" font-family="Verdana" font-size="11" stroke="none" stroke-width="0" fill="#444444">3.000</text></g><g><text text-anchor="end" x="46.5" y="53.85" font-family="Verdana" font-size="11" stroke="none" stroke-width="0" fill="#444444">6.000</text></g><g><text text-anchor="end" x="46.5" y="36.6" font-family="Verdana" font-size="11" stroke="none" stroke-width="0" fill="#444444">9.000</text></g><g><text text-anchor="end" x="46.5" y="19.35" font-family="Verdana" font-size="11" stroke="none" stroke-width="0" fill="#444444">12.000</text></g></g></g><g><g><text text-anchor="middle" x="177" y="101.35" font-family="Verdana" font-size="11" stroke="none" stroke-width="0" fill="#222222">Veces en listado últimos 30 días</text><rect x="54" y="92" width="246" height="11" stroke="none" stroke-width="0" fill-opacity="0" fill="#ffffff"></rect></g></g><g></g></svg><div aria-label="Una representación tabular de los datos del gráfico." style="position: absolute; left: -10000px; top: auto; width: 1px; height: 1px; overflow: hidden;"><table><thead><tr><th>Dia</th><th>veces en listado</th></tr></thead><tbody><tr><td>Lunes, 28 de Octubre</td><td>2.664</td></tr><tr><td>Martes, 29 de Octubre</td><td>9.155</td></tr><tr><td>Miércoles, 30 de Octubre</td><td>8.677</td></tr><tr><td>Jueves, 31 de Octubre</td><td>8.915</td></tr><tr><td>Viernes, 1 de Noviembre</td><td>8.861</td></tr><tr><td>Sábado, 2 de Noviembre</td><td>8.375</td></tr><tr><td>Domingo, 3 de Noviembre</td><td>9.276</td></tr><tr><td>Lunes, 4 de Noviembre</td><td>10.326</td></tr><tr><td>Martes, 5 de Noviembre</td><td>4.933</td></tr><tr><td>Miércoles, 6 de Noviembre</td><td>8.839</td></tr><tr><td>Jueves, 7 de Noviembre</td><td>3.108</td></tr></tbody></table></div></div></div><div style="display: none; position: absolute; top: 120px; left: 319px; white-space: nowrap; font-family: Verdana; font-size: 11px;" aria-hidden="true">...</div><div></div></div></div>
														<div id="anuncio_estadisticas_valores">
															<div class="anuncio_info_listados veces_listado">
																<span class="anuncio-info-estadistica" id="anuncio_listado_total">83.129</span>
																<p>times listed</p>
																</div><div class="anuncio_info_listados veces_listado">
																<span class="anuncio-info-estadistica" id="anuncio_total">3.819</span>
																<p>they saw the phone</p>
																</div><div class="anuncio_info_listados subir_listado">
																<span class="anuncio-info-estadistica" id="anuncio_subir_total">0</span>
																<p>uploads</p>
																</div><div class="anuncio_info_listados subir_listado">
																<span class="anuncio-info-estadistica" id="anuncio_telefono_total">11</span>
																<p>top days</p>
															</div>
														</div>
													</div>
													
												</div>
												
												
											</div>
											
											
											
										</div><!-- main-div-popup -->
									</div><!-- col-md-6 -->
									
									
									
									<!-- right-div-start -->
									<div class="col-md-6">
										<div class="right-main-popup">
											<div class="girl-detais-div common-div">
												<h3>{{$data->first_name}}  |  {{$data->telephone}}</h3>
												<div class="main-justify-div">
													<div class="justify-girl-detais"><h5> Age  </h5> <span class="name2">{{$data->age}}</span></div>
													<div class="justify-girl-detais"><h5>Nationality</h5> <span class="name2">{{$data->nationality}}</span></div>
												</div>
												<div class="main-justify-div">
													<div class="justify-girl-detais"><h5>Location  </h5> <span class="name2">{{$data->province}} {{$data->population}} {{$data->zone}} </span></div>
													<div class="justify-girl-detais"><h5>Height </h5> <span class="name2">{{$data->height}}</span></div>
												</div>
												<div class="main-justify-div">
													<div class="justify-girl-detais second-justi"><h5> Weight</h5> <span class="name2">{{$data->weight}}</span></div>
													<div class="justify-girl-detais second-justi"><h5>Chest</h5> <span class="name2">{{$data->chest}}</span></div>
												</div>
												<div class="main-justify-div">
													<div class="justify-girl-detais second-justi"><h5>Hair</h5><<span class="name2">{{$data->hair}}</span></div>
													<div class="justify-girl-detais second-justi"><h5>Eyes</h5><<span class="name2">{{$data->eyes}}</span></div>
												</div>
												
												<div class="contact-link"><a href="#" class="btn btn-primary"><i class="fa fa-phone-alt"></i> <span>{{$data->telephone}}</span></a>
													<a href="#" class="btn btn-success"><i class="fa fa-whatsapp"></i>   <span>whatsapp</span></a>
												</div>
												<?php /*<div class="share-links">
													<a href="#"><i class="fa fa-share-alt"></i>  <span>Compartir</span></a>
													<a href="#"><i class="fa fa-heart"></i>  <span>Favoritos</span></a>
													<a href="#"><i class="fa fa-bug"></i>  <span>Denunciar</span></a>
												</div>*/?>
											</div>  
											
		
				
											<div class="descreption common-div">
												<h4>Description</h4>
												<div class="comment more">  
												{{$data->text}}
												</div> 
												
												
												
											</div>
											<?php if(!empty($profile_tariffs)){?>
											<div class="price-list common-div">
												<div class="price big">
													<h4>Tariffs</h4>
													
													@foreach($profile_tariffs as $tariffs)
													<h6><span>{{$tariffs->tariffs_description}}</span> <span>{{$tariffs->tariffs_euro_price}} €</span></h6>													
													@endforeach;
													
												</div>
											</div>
											<?php } ?>
											<div class="price-list list common-div">
												<div class="price big">
													<h4>Schedule</h4>
													<h6><span>Lunes a Domingo</span> <span>24 horas</span></h6>
													<h6><span>Lunes a Domingo</span> <span>24 horas</span></h6>
													<h6><span>Lunes a Domingo</span> <span>24 horas</span></h6>
												</div>
											</div>
											
											
											
										</div><!-- right-main-popup -->
									</div><!-- col-md-6 -->
									
									<div class="col-md-12">
										<div class="photos-left-div common-left" id="photos">
											<h4>Photos</h4>
											<div class="images-div">
												<?php $Iphoto = 1; foreach($profile_ads_files as $photos){?>
												<div class="phtos-img-grid"><img src="<?php echo URL::asset('public/uploads/profile_ads/'.$photos->upload_file);?>"  class="img-fluid btn2" alt="" onclick="openModal();currentSlide({{$Iphoto}})" class="hover-shadow cursor">
												<?php if($photos->type=='selfie'){?>
													<div class="photo-selfie">
														<img src="{{URL::asset('public/front/images/selfred.png')}}" class="img-fluid" alt="">
													</div>
													<?php } ?>
												</div>
												<?php $Iphoto++; }?>
											</div>
											
										</div>
										
										
										<div class="photos-left-div common-left" > 
											<h4>Video</h4>
											<div class="images-div">
											<?php  foreach($profile_ads_files_videos as $video){?>												
												<div class="phtos-img-grid">
													<video id="videoID"  controlslist="nodownload" preload="none" poster="{{URL::asset('public/front/images/model1video.png')}}" height="600" width="400"  class="">
													 <source src="<?php echo URL::asset('public/uploads/profile_ads/'.$video->upload_file);?>" type="video/mp4">
													
												</div>
												
												<?php }?>
												
												
											</div>
											
										</div>
									</div>
									
									<!-- services div-open -->
									<?php  if(!empty($data->over_you)){?>
											<div class="col-md-6">
										<div class="Sobre-tags common-left">
													<h4> Sobre Mi </h4>
													<?php 
													$over_you = explode(',', $data->over_you);

														?>
													@foreach($over_you as $over_you_data)
													<span>{{$over_you_data}}</span>
													@endforeach;
													
												</div>
									</div>
											<?php } ?>
											
											<?php  if(!empty($data->services)){?>
											<div class="col-md-6">
										<div class="Sobre-tags common-left">
													<h4> Servicios </h4>
													<?php 
													$services = explode(',', $data->services);

														?>
													@foreach($services as $services_data)
													<span>{{$services_data}}</span>
													@endforeach;
													
												</div>
									</div>
											<?php } ?>
								
									
									
								</div><!-- modal-content -->
							</div><!-- modal-content -->
						</div><!-- row -->
					</div><!-- modal-dialog modal-xl container -->
				</div><!-- modal fade show -->
				
				
				<!-- image-model-zomm -->
				<div id="myModalimg" class="modal image-model fade show">
					<span class="close image-close">&times;</span>
					<img class="modal-content image" id="img01">
				</div>
				<!-- image-model-zomm close-->
				
				
				<!-- gallery slider -->
				<div id="myModal-gallery" class="modal modal-gallery">
					<span class="close cursor" onclick="closeModal()">&times;</span>
					<div class="modal-content">						
						<?php $Iphoto = 1; foreach($profile_ads_files as $photos){?>
							<div class="mySlides">
							<div class="numbertext">1 / {{$Iphoto}}</div>
								<img src="<?php echo URL::asset('public/uploads/profile_ads/'.$photos->upload_file);?>">
							</div>
							<?php $Iphoto++; }?>
						
						<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
						<a class="next" onclick="plusSlides(1)">&#10095;</a>
					</div>
				</div>
				
			</section>
<!-- register popup-->


			
								</div>
								
							
						</div><!-- COL END -->
					</div>
					<!-- ROW-1 CLOSED -->
				</div>
				<!-- CONTAINER CLOSED -->
        </div>      
		<!-- verify-button-sec -->
			<section class="verify-popup-sec">
				<!-- The Modal -->
				<div class="modal fade" id="myModal-verify">
					<div class="modal-dialog modal-dialog-centered">
						<div class="modal-content">
							
							<!-- Modal Header -->
							<div class="modal-header">
								<h5 class="modal-title">Please Verify OTP On Your Mobile:</h5>
								<button type="button" class="close" data-dismiss="modal">&times;</button>
							</div>
							<!-- Modal body -->
							<div class="modal-body">
								
								<div class="input-group mb-3">
									<input type="text" class="form-control" placeholder="Enter OTP">
									<div class="input-group-append">
										<button class="btn btn-success" type="submit">Verify</button>
									</div>
								</div>
								
							</div>
							
							
						</div>
					</div>
				</div>
				
				
				
			</section>
			<script type="text/javascript" src="{{URL::asset('public/front/js/jquery.min.js')}}"></script>
		

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

</script>

@endsection       