<?php $__env->startSection('content'); ?>

<link href="<?php echo e(URL::asset('public/front/css/performance.css')); ?>" rel="stylesheet"/>

<link href="<?php echo e(URL::asset('public/front/css/apexcharts.css')); ?>" rel="stylesheet"/>

<link href="<?php echo e(URL::asset('public/front/css/dash_1.css')); ?>" rel="stylesheet"/>
<?php if($data !=null){
?>
<input type="hidden" id="get_profile_id" value="<?php echo e($id); ?>"/>
<section class="main-pop-sec">
				
					  
					<div class="modal-dialog main-popup modal-xl">
						<div class="row">
							<div class="modal-content">

<?php $profile_ads_id = $data->id;?>


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

											<div id="anuncio_productos"><h4 style="text-transform:none !important;">Estadísticas de este anuncio</h4> 

											<span id="estadisticas_ver_mas" class="onclick enlace_antiguo" data-src="/estadisticas/8xwbj"><a href="<?php echo e(url('/estadisticas/'.$data->id.'')); ?>" class="btn btn-primary">  ver mas  </a>
											</span>
											</div>

											<div class="Estadísticas ">
										  <ul class="listado-ul">
										     	<li>
										     		<label>
										     			<span class="maintag"><strong><?php echo e(visualizacionesTotal($profile_ads_id)); ?></strong></span> <span class="simpleg">Veces en listado</span>
										     		</label>
										     	</li>
										     	<li>
										     		<label>
										     			<span class="maintag">€ <strong><?php echo e(piesepuertoTotal($profile_ads_id)); ?></strong></span> <span class="simpleg">Piesepuerto</span>
										     		</label>
										     	</li>
										     	<li>
										     		<label>
										     			<span class="maintag"><!--€ <strong><?php echo e(piesepuertoTotalTop($profile_ads_id)); ?> / --><strong><?php echo e(registrationAfterActiveTopAnuncio($profile_ads_id)); ?></strong></span> <span class="simpleg">Top Anuncios</span>
										     		</label>
										     	</li>
										     	<li>
										     		<label>
										     			<span class="maintag"><!--€ <strong><?php echo e(piesepuertoTotalSubida($profile_ads_id)); ?> / --><strong><?php echo e(registrationAfterGoneAutoSubida($profile_ads_id)); ?></strong></span> <span class="simpleg">Auto Subida</span>
										     		</label>
										     	</li>
										     	
										     </ul>
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

													<div class="justify-girl-detais"><h5> Edad  </h5> <span class="name2"><?php echo e($data->age); ?> years</span></div>

													<div class="justify-girl-detais"><h5>Nacionalidad</h5> <span class="name2"><?php echo e($data->nationality); ?></span></div>

												</div>

												<div class="main-justify-div">

													<div class="justify-girl-detais"><h5>Localidad  </h5> <span class="name2"><?php echo e($data->population); ?> </span></div>

													<div class="justify-girl-detais"><h5>Estatura </h5> <span class="name2"><?php echo e($data->height); ?> cm</span></div>

												</div>

												<div class="main-justify-div">

													<?php /*<div class="justify-girl-detais second-justi"><h5> Peso</h5> <span class="name2">{{$data->weight}} kg</span></div>*/?>

													<div class="justify-girl-detais second-justi"><h5>Cabello</h5><span class="name2"><?php echo e($data->hair); ?></span></div>

													<div class="justify-girl-detais second-justi"><h5>Ojos</h5><span class="name2"><?php echo e($data->eyes); ?></span></div>

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

													<a href="javascript:void(0);"><i  class="fa fa-heart favoritos<?php echo $profile_ads_id;?>"></i>  <span>Favoritos</span></a>

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

												<?php echo e($data->text); ?>


												</div> 												

											</div>

											

											<?php if(!empty(get_tariffs_list($data->id))){?>
											<div class="price-list common-div">
											<div class="price big">
											<h4>Tarifas</h4>
											<?php foreach(get_tariffs_list($data->id) as $tariffs){?><h6><span><?php echo e($tariffs['tariffs_description']); ?></span> <span><?php echo e($tariffs['tariffs_euro_price']); ?> €</span></h6><?php }?>
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

													<?php $__currentLoopData = $over_you; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $over_you_data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

													<span><?php echo e($over_you_data); ?></span>

													<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>;

													

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

													<?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $services_data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

													<span><?php echo e($services_data); ?></span>

													<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>;

													

												</div>

									</div>

											<?php } ?>

								

									

									

								</div><!-- modal-content -->

							</div><!-- modal-content -->

						</div><!-- row -->

					</div><!-- modal-dialog modal-xl container -->
					</div><!-- modal-dialog modal-xl container -->
					</section><!-- modal-dialog modal-xl container -->

				<script type="text/javascript" src="<?php echo e(URL::asset('public/front/js/jquery.min.js')); ?>"></script>
					<script>

 

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
    	    	$('.favoritos<?php echo $profile_ads_id;?>').css("color","#fd2c94");
			jQuery.noConflict(); 
			var profile_id = '<?php echo $profile_ads_id;?>';
			$.ajax({
				url: APP_URL+'/ajax/favoritos' ,
				type: "get",
				data: {'profile_id' : profile_id},
				success: function(result) {	
				if(result=='1'){	
				    
			    	$('.favoritos<?php echo $profile_ads_id;?>').css("color","#fd2c94");
				}else{				
				    $('.favoritos<?php echo $profile_ads_id;?>').css("color","#ff");
				} 
				
					
				},		
				
			});
			
				$.ajax({
				url: APP_URL+'/ajax/favoritosLoad' ,
				type: "get",
				data: {'profile_id' : profile_id},
				success: function( response ) {					
					$('.counter-sec .modal-body').html(response);							
					$('.counterone').text('<?php echo favoritos_count();?>');	
				},		
				
			});
			
			return false;
		

	});  





</script>















<script type="text/javascript" src="<?php echo e(URL::asset('public/front/js/apexcharts.min.js')); ?>"></script>

<script type="text/javascript" src="<?php echo e(URL::asset('public/front/js/dash_1.js')); ?>"></script>

<style>
    .main-pop-sec {
    position: relative;
    z-index: 999;
    background: #473f3fba;
}
</style>
<?php }else{?>
	<section class="subida-zone">
		<div class="container">
			<div class="row">
				<div class="col-md-10 col-lg-11 col-8">
					<div class="subida-header text-center">
						<h3><strong>No hay anuncio</strong></h3>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php }?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('front.layouts.frontlayout', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>