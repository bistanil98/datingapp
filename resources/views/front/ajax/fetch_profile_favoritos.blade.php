<link href="{{URL::asset('public/front/css/performance.css')}}" rel="stylesheet"/>


<input type="hidden" id="get_profile_id" value="{{$profile_ads_id}}"/>
 
<?php $favoritos_list = (favoritos_list());?>
<?php foreach($favoritos_list as $favoritos){?>
<?php  $favoritos_ids[] = $favoritos->id; ?>

<?php }?>
<input value="<?php if(!empty($favoritos_ids)){ echo implode(",", $favoritos_ids);}?>" id="favoritos_ids" type="hidden" />
<div class="popupclick-button">

<?php //$top_previous_profile = top_previous_profile($profile_ads_id);?>

<?php //$top_next_profile = top_next_profile($profile_ads_id);?>



<?php //if(!empty($top_previous_profile)){?>

<button <?php /*data-id="{{$top_previous_profile}}" */?>  class="btn btn-danger left arrow-left-favoritos"><i class="fas fa-arrow-left"></i> </button>

<?php //} ?>

<?php //if(!empty($top_next_profile)){?>

<button <?php /*data-id="{{$top_next_profile}}"*/?> class="btn btn-danger right arrow-right-favoritos"><i class="fas fa-arrow-right"></i> </button>

<?php //} ?>

					</div> 



						<?php $photos = array();

if(!empty($data->selfie_1)){

$photos[] =  array(

'name'=>$data->selfie_1,

'type'=>'selfie',

);

}

if(!empty($data->selfie_2)){

$photos[] =  array(

'name'=>$data->selfie_2,

'type'=>'selfie',

);

}

if(!empty($data->selfie_3)){

$photos[] =  array(

'name'=>$data->selfie_3,

'type'=>'selfie',

);

}

if(!empty($data->selfie_4)){

$photos[] =  array(

'name'=>$data->selfie_4,

'type'=>'selfie',

);

}

if(!empty($data->gallery_1)){

$photos[] =  array(

'name'=>$data->gallery_1,

'type'=>'photo',

);

}

if(!empty($data->gallery_2)){

$photos[] =  array(

'name'=>$data->gallery_2,

'type'=>'photo',

);

}

if(!empty($data->gallery_3)){

$photos[] =  array(

'name'=>$data->gallery_3,

'type'=>'photo',

);

}

if(!empty($data->gallery_4)){

$photos[] =  array(

'name'=>$data->gallery_4,

'type'=>'photo',

);

}

if(!empty($data->gallery_5)){

$photos[] =  array(

'name'=>$data->gallery_5,

'type'=>'photo',

);

}

if(!empty($data->gallery_6)){

$photos[] =  array(

'name'=>$data->gallery_6,

'type'=>'photo',

);

}

if(!empty($data->gallery_7)){

$photos[] =  array(

'name'=>$data->gallery_7,

'type'=>'photo',

);

}

if(!empty($data->gallery_8)){

$photos[] =  array(

'name'=>$data->gallery_8,

'type'=>'photo',

);

}



?>

<div class="col-md-12">

									<div class="row">

										<div class="col-md-6">

											<div class="main-div-popup">

												<div class="top-pop-img common-left">

													<div class="profile-img-top">

													<?php 

														if(!empty($data->profile_pic)){?>

														<a class="example-image-link-top<?php echo $data->id ;?>" href="<?php echo URL::asset('public/uploads/profile_ads/'.$data->profile_pic);?>" data-lightbox="example-set-top<?php echo $data->id ;?>" ><img class="example-image-top<?php echo $data->id ;?>" src="<?php echo URL::asset('public/uploads/profile_ads/'.$data->profile_pic);?>" width="100%" height="100%"  /></a>

														<?php }?>

														

														<div class="profile-img-text">

															<a href="#photos"><i class="fa fa-image"></i> <?php echo  count($photos)+1;?> Pictures</a>

														</div>

														

													</div>

												</div>

												

											<div class="graf-img-main common-left">

											<div id="anuncio_productos"><h4>Estadísticas de este anuncio</h4> 
	<?php dd($data);die;?>
											<span id="estadisticas_ver_mas" class="onclick enlace_antiguo" ><a href="{{url('/estadisticas/'.$data->id.'')}}" class="btn btn-primary"> ver más </a>

											</span>

<div class="Estadísticas ">
										     <ul class="listado-ul">
										     	<li>
										     		<label>
										     			<span class="maintag"><strong>{{visualizacionesTotal($profile_ads_id)}}</strong></span> <span class="simpleg">Veces en listado</span>
										     		</label>
										     	</li>
										     	<li>
										     		<label>
										     			<span class="maintag">€ <strong>{{piesepuertoTotal($profile_ads_id)}}</strong></span> <span class="simpleg">Piesepuerto</span>
										     		</label>
										     	</li>
										     	<li>
										     		<label>
										     			<span class="maintag">€ <strong>{{piesepuertoTotalTop($profile_ads_id)}} / {{registrationAfterActiveTopAnuncio($profile_ads_id)}}</strong></span> <span class="simpleg">Top Anuncios</span>
										     		</label>
										     	</li>
										     	<li>
										     		<label>
										     			<span class="maintag">€ <strong>{{piesepuertoTotalSubida($profile_ads_id)}} / {{registrationAfterGoneAutoSubida($profile_ads_id)}}</strong></span> <span class="simpleg">Auto Subida</span>
										     		</label>
										     	</li>
										     	
										     </ul>
											</div>
											</div>

											</div>

											

											

											

										</div><!-- main-div-popup -->

									</div><!-- col-md-6 -->

									

									

									

									<!-- right-div-start -->

									<div class="col-md-6">

										<div class="right-main-popup">

											<div class="girl-detais-div common-div">

												<h3 style="font-size: 18px; color: #d2d2d2;"><?php echo $data->title ;?></h3>

												<h3><span class="name-common"></span> <?php echo ucwords($data->first_name) ;?> </h3>

												<div class="main-justify-div">

													<div class="justify-girl-detais"><h5> Edad  </h5> <span class="name2">{{$data->age}} years</span></div>

													<div class="justify-girl-detais"><h5>Nacionalidad</h5> <span class="name2">{{$data->nationality}}</span></div>

												</div>

												<div class="main-justify-div">

													<div class="justify-girl-detais"><h5>Localidad  </h5> <span class="name2">{{$data->population}} </span></div>

													<div class="justify-girl-detais"><h5>Estatura </h5> <span class="name2">{{$data->height}} cm</span></div>

												</div>

												<div class="main-justify-div">

													<?php /*<div class="justify-girl-detais second-justi"><h5> Peso</h5> <span class="name2">{{$data->weight}} kg</span></div>*/?>

													<div class="justify-girl-detais second-justi"><h5>Cabello</h5><span class="name2">{{$data->hair}}</span></div>

													<div class="justify-girl-detais second-justi"><h5>Ojos</h5><span class="name2">{{$data->eyes}}</span></div>

												</div>

												<div class="main-justify-div">

													

													

													<?php if(!empty($data->chest)){?><div class="justify-girl-detais second-justi"><h5>Talla Pecho</h5> <span class="name2"><?php echo $data->chest ;?> </span></div><?php }?>

												</div>

												

												<div class="contact-link">

												<a href="tel:<?php echo $data->telephone ;?>" class="btn btn-primary"><i class="fas fa-phone-alt"></i> <span><?php echo $data->telephone ;?></span></a>

												<?php if($data->contact_me_by_whatsApp=='Yes'){?>

											<?php $line= $data->first_name.', te he visto en escorting y me gustaría quedar contigo.';

												$text = str_replace(' ', '%20',$line)?>

												<a target="_blank" href="https://api.whatsapp.com/send?phone=<?php echo $data->telephone;?>&text=<?php echo $text;?>" class="btn btn-success"><i class="fa fa-whatsapp"></i>

													<span>whatsapp</span>

												</a>

												<?php }else{?>

												<a href="javascript:void(0);" class="btn btn-danger"><i class="fa fa-whatsapp"></i>   <span>whatsapp</span></a>

												<?php } ?>

													

												</div>

												<div class="share-links">

													<a href="javascript:void(0);" data-toggle="collapse" data-target="#Compar" class="collapsed" aria-expanded="false"><i class="fas fa-share-alt"></i>  <span>Compartir</span></a>

													<a href="javascript:void(0);"><i  class="fa fa-heart favoritos<?php echo $profile_ads_id;?> <?php if(favoritos_check($profile_ads_id)>0){ echo 'favrotea1';}?>"></i>  <span>Favoritos</span></a>

													<a href="javascript:void(0);" data-toggle="modal" data-target="#contact-report"><i class="fa fa-bug"></i>  <span>Denunciar</span></a>

												</div>
												
												<?php
												
												$province = createSlug(province($data->province));
												$population = createSlug(($data->population));
												$first_name = createSlug(($data->first_name));
												$id = (($data->id));
												$url = url('escorts/'.$province.'/'.$population.'/'.$first_name.'/'.$id);
												$image = URL::asset('public/uploads/profile_ads/'.$data->profile_pic);																												
												$title = $data->first_name;		
												?>
												<?php 
												$about_me = substr($data->text,0,250);	
												$about_me = trim($about_me); // Trim String
												$about_me = strip_tags($about_me); //Unwanted:  {UPPERCASE} ; / ? : @ & = + $ , . ! ~ * ' ( )
												$about_me = createSlug($about_me);	
												$about_me = str_replace("-"," ",$about_me);
												$title = str_replace("-"," ",$title);
												?>
												<div id="Compar" class="sharecollapse collapse" style="">

												<a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $url;?>"><i class="fab fa-facebook-f"></i></a>
											<?php if($data->contact_me_by_whatsApp=='Yes'){?>

											

												<a target="_blank" href="https://api.whatsapp.com/send?phone=<?php echo $data->telephone;?>&text=<?php echo $text;?>" class=""><i class="fab fa-whatsapp"></i>

													

												</a>

												<?php }else{?>

												<a href="javascript:void(0);" class=""><i class="fab fa-whatsapp"></i></a>

												<?php } ?>
																								

												<a target="_blank" href="https://twitter.com/intent/tweet?url=<?php echo $url;?>&via=<?php echo $title;?>&image-src=<?php echo $image;?>&text=<?php echo $about_me;?>"><i class="fab fa-twitter"></i></a>

												</div>

											</div>  

										

			

				

											<div class="descreption common-div">

												<h4>Description</h4>

												<div class="comment more">  

												{{$data->text}}

												</div> 												

											</div>

											
	<?php if(!empty(get_tariffs_list($data->id))){?>
											<div class="price-list common-div">
											<div class="price big">
											<h4>Tarifas</h4>
											<?php foreach(get_tariffs_list($data->id) as $tariffs){?><h6><span>{{$tariffs['tariffs_description']}}</span> <span>{{$tariffs['tariffs_euro_price']}} €</span></h6><?php }?>
											</div>
											</div>
											<?php } ?>

										<div class="price-list list common-div">

												<div class="price big">

													  <h4>Horarios</h4>

														<?php if($data->schedule_status=='yes'){?>

														<h6><span style="text-transform:none !important;">Lunes a Domingo</span> <span style="text-transform:none !important;">
														<?php if(!empty(get_schedule_list($data->id))){											
																foreach(get_schedule_list($data->id) as $get_schedule_list){
																echo 'De las '. leadingZero($get_schedule_list['from_1']).':'.leadingZero($get_schedule_list['from_2']).' a las '.leadingZero($get_schedule_list['unit_1']).':'.leadingZero($get_schedule_list['unit_2']);
																}
														}
														?>

														</span></h6>
														<?php }else{?>
														
															<?php if(!empty(get_schedule_list($data->id))){											
																foreach(get_schedule_list($data->id) as $get_schedule_list){
																	echo '<h6><span>'.$get_schedule_list['days'].'</span> <span style="text-transform:none !important;">';
																	echo 'De las '. leadingZero($get_schedule_list['from_1']).':'.leadingZero($get_schedule_list['from_2']).' a las '.leadingZero($get_schedule_list['unit_1']).':'.leadingZero($get_schedule_list['unit_2']);
																	echo '</span></h6>';
																}
															}
														?>
														<?php }?>
												</div>

											</div>

										</div><!-- right-main-popup -->

									</div><!-- col-md-6 -->

									

																		<!-- phot0s-grid-section -->

									<div class="col-md-12">

									<div class="photos-left-div common-left" id="photos">

									<h4>photos</h4>

									</div>

									</div>



									<div class="images-div-grid">

									<?php $Iphoto = 1; foreach($photos as $photo){?>

									<div class="phtos-img-grid">



									<a class="example-image-link-top<?php echo $data->id ;?>" href="<?php echo URL::asset('public/uploads/profile_ads/'.$photo['name']);?>" data-lightbox="example-set-top<?php echo $data->id ;?>" ><img class="example-image-top<?php echo $data->id ;?>" src="<?php echo URL::asset('public/uploads/profile_ads/'.$photo['name']);?>" width="100%" height="100%"  />



									<div class="light-overlay">

                                          <div class="light-text"><i class="fa fa-search-plus" aria-hidden="true"></i></div>

                                         </div>

									</a>

								          

									<?php if($photo['type']=='selfie'){?>

									<div class="photo-selfie">

									<img src="<?php echo URL::asset('public/front/images/selfred.png') ;?>" class="img-fluid" alt="">

									</div>

									<?php } ?>



									</div>

									<?php $Iphoto++; }?>









									</div><!-- col-md-12 -->

									<!-- phot0s-grid-section-close -->



									

									<?php if(video_check($data->id)>0){?>

									<div class="col-md-12">

									

										<div class="photos-left-div common-left" id="photos"> 

											<h4>Video</h4>

										</div>

									</div>

											<div class="images-div-grid video-grid">

											<?php if(!empty($data->video_1)){?>

												<div class="phtos-img-grid">

												<?php /*<video id="videoID"  controlslist="nodownload" preload="none" poster="<?php echo URL::asset('public/front/images/model1video.png') ;?>" height="600" width="400"  class="">*/?>

													<video   width="100%" height="100%"  controls> 

													 <source src="<?php echo URL::asset('public/uploads/profile_ads/'.$data->video_1);?>" type="video/<?php echo pathinfo($data->video_1, PATHINFO_EXTENSION);?>">

													</video>

												</div>

											<?php }?>

											<?php if(!empty($data->video_2)){?>



												<div class="phtos-img-grid">

													<video   width="100%" height="100%"  controls> 

													 <source src="<?php echo URL::asset('public/uploads/profile_ads/'.$data->video_2);?>" type="video/<?php echo pathinfo($data->video_2, PATHINFO_EXTENSION);?>">

													</video>

												</div>

												<?php }?>

												<?php if(!empty($data->video_3)){?>



												<div class="phtos-img-grid">

													<video   width="100%" height="100%"  controls> 

													 <source src="<?php echo URL::asset('public/uploads/profile_ads/'.$data->video_3);?>" type="video/<?php echo pathinfo($data->video_3, PATHINFO_EXTENSION);?>">

													</video>

												</div>

												<?php }?>

												<?php if(!empty($data->video_4)){?>

												<div class="phtos-img-grid">

													<video   width="100%" height="100%"  controls> 

													 <source src="<?php echo URL::asset('public/uploads/profile_ads/'.$data->video_4);?>" type="video/<?php echo pathinfo($data->video_4, PATHINFO_EXTENSION);?>">

													</video>

												</div>

												<?php }?>

												

												

											</div>

											

									

									<?php }?>

									

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

				

					<script>



   



$('.arrow-right-favoritos').click(function() {

   //window.history.pushState('obj', 'PageTitle', '/NewPage');   

   	$.ajaxSetup({

		headers: {

		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

		}

		

		});

		var profile_id = '<?php echo $profile_ads_id;?>';
		
		var ads_list_ids = $('#favoritos_ids').val();
	//		alert(ads_list_ids);
		var nameArr = ads_list_ids.split(',');
		var next = nameArr[($.inArray(profile_id, nameArr) + 1) % nameArr.length];
		pushUrl(next);
		$.ajax({

		url: remove_double_slash(APP_URL+'/ajax/next_fetch_profile_favoritos') ,

        type: "get",

         data: {'profile_id' : next, 'ads_list_ids' : ads_list_ids},

        success: function( response ) {		

			$('.main-pop-sec .modal-body').html(response);		

        },		

		

		});

	

   return false;

});



$('.arrow-left-favoritos').click(function() {

   //window.history.pushState('obj', 'PageTitle', '/NewPage');   

   	$.ajaxSetup({

		headers: {

		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

		}

		

		});

		//var profile_id = '<?php echo $profile_ads_id;?>';
		//var ads_list_ids = $('#ads_list_ids').val();
		var profile_id = '<?php echo $profile_ads_id;?>';
		var ads_list_ids = $('#favoritos_ids').val();
	//	alert(ads_list_ids);
		var nameArr = ads_list_ids.split(',');
		var prv = nameArr[($.inArray(profile_id, nameArr) - 1) % nameArr.length];
		pushUrl(prv);
		$.ajax({

		url: remove_double_slash(APP_URL+'/ajax/previous_fetch_profile_favoritos') ,

        type: "get",

        data: {'profile_id' : prv, 'ads_list_ids' : ads_list_ids},

        success: function( response ) {		

			$('.main-pop-sec .modal-body').html(response);		

        },		

		

		});

	

   return false;

});

 

$(document).ready(function() {

											var showChar = 250;

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



// favoritos

	var favoritos_check = '<?php echo favoritos_check($profile_ads_id);?>';
	if(favoritos_check>0){
	    
		$('.favoritos<?php echo $profile_ads_id;?>').css("color","#fd2c94");	
	}
	$('.favoritos<?php echo $profile_ads_id;?>').click(function(){
    	    //$('.favoritos<?php echo $profile_ads_id;?>').css("color","#fd2c94");
			jQuery.noConflict(); 
			var profile_id = '<?php echo $profile_ads_id;?>';
			$.ajax({
				url: remove_double_slash(APP_URL+'/ajax/favoritos') ,
				type: "get",
				data: {'profile_id' : profile_id},
				success: function(result) {	
				if(result=='0'){
				     $('.favoritos<?php echo $profile_ads_id;?>').css("color","#fff");					 
				}else{		
					$('.favoritos<?php echo $profile_ads_id;?>').css("color","#fd2c94");									  
				} 
				
					
				},		
				
			});
			setTimeout(function(){
				$.ajax({
				url: remove_double_slash(APP_URL+'/ajax/favoritosLoad') ,
				type: "get",
				data: {'profile_id' : profile_id},
				success: function( response ) {					
					$('.counter-sec .modal-dialog').html(response);	
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
		

	});  



	// every time open popup with next and pre save entery

	

// END

//// video section

											/* const vid = document.querySelector('#videoID');

											

											

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

											}); */
function remove_double_slash(temp){
			return temp.replace(/([^:]\/)\/+/g, "$1");
		}
		$(".main-pop-sec #girl_modals").on("hidden.bs.modal", function () {
		var response = '<?php echo url('/');?>';
		window.history.pushState('data', 'Title', response);
	});
</script>
