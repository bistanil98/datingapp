<section class="video-grid-sec">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-6 offset-md-1  order-column-text">
				<div class="video-header-text">
					<h1><?php echo (seo($category)->h1_title); ?></h1>
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb">
							<li class="breadcrumb-item active" aria-current="page">España</li>
						</ol>
					</nav>
				</div>
				</div>
			<div class="col-md-5  order-column-icon">
				<div class="icon-div">
					<a href="#" class="alta-button favrote" data-toggle="modal" data-target="#counter"><i class="fas fa-heart" ></i><span class="counterone" id="total_favoritas">{{favoritos_count()}}</span> Favoritas</a>
					<a href="javascript:void(0);" data-toggle="modal" data-target="#escrot">Crear Anuncio</a>
					<a href="javascript:void(0);" class="alta-button" data-toggle="modal" data-target="#mi-cuenta-modal"><i class="fas fa-users"></i> Mi Cuenta</a>
					
				</div>
			</div>
			
			
		</div>
			<div class="row">
				<div class="col-md-6 offset-md-1  order-column-text">
				<?php echo (seo($category)->upper_description); ?>
				</div>
				</div>
		
		<div class="row gird-first">
			<div class="col-md-1 top-fix-main">
				<div class="top-fix-button">
					<h2 class="<?php if (isset($category) && $category=='travestis'){ echo 'orange-h2';}?><?php if (isset($category) && $category=='chaperos'){ echo 'blue-h2';}?>">TOP Anuncio</h2>
				</div>
			</div>
				<?php if(count($top_zona)>0 || count($subida)>0 || count($get_subida_going_address)>0){?>
			<div  class="col-md-11 masonry grid">
				<div class="grid-sizer"></div>
				<div class="gutter-sizer"></div>
				<span id="divID">
					<?php if(count($top_zona)>0){?>
						<?php $top_zona_ids = array(); ?>
						<?php foreach($top_zona as $data){ ?>
							<?php  $top_zona_ids[] = $data->id; ?>
							<?php //$data = profile($data->profile_ads_id,$category); ?>
							<?php if(!empty($data)){ ?>
								
								<div class="item video-image grid-item">
									<a href="javascript:void(0);"  >
										<div class="img-top">
											<img  src="<?php echo URL::asset('public/uploads/profile_ads/'.$data->profile_pic);?>" class="img-fluid " alt="" onclick="openpopup({{$data->id}}, {{$data->top_subida_profile_listsID}}, 'top')" >
											<div class="overlay">										
												<div class="text">
													<a onclick="favoritos({{$data->id}},'top_zona{{$data->id}}')" href="javascript:void(0)"    class="top_zona{{$data->id}} a1"><i class="fas fa-heart  <?php if(favoritos_check($data->id)>0){ echo 'favrotea1';}?>"></i></a>
													<a href="" class="a2"><i class="fas fa-check"></i></a>
													<a href="" class="a3"><i class="fas fa-play"></i></a>
													<?php 	if($data->role == 'Individual'){ ?>
											<a href="" class="a4"><i class="fas fa-info"></i></a>
											<?php } ?>
												</div>
											</div>
											<?php if(self_check($data->id)>0){?>
												<div class="self-icon">
													<img src="{{URL::asset('public/front/images/self.png')}}" class="img-fluid" alt="">
												</div>
											<?php } ?>
										</div>
										
										<?php 	if($data->role == 'Agency'){ ?>
							<?php 
							$check_ad_member_type =  check_ad_member_type($data->member_id);
							if(!empty($check_ad_member_type->upload_logo)){  ?>

							<a href="{{ url('/agencia/'.$data->member_id) }}">
							<div class="image-top-bottom">
							<img src="<?php echo URL::asset('public/uploads/profile_logo/'.$check_ad_member_type->upload_logo);?>" class="img-fluid" alt="">
							</div>
							</a>
							<?php }?>
							<?php } ?>
							
								</a>
									<a href="#">
										<div class="img-text <?php if (isset($category) && $category=='travestis'){ echo 'orange-bg';}?><?php if (isset($category) && $category=='chaperos'){ echo 'blue-bg';}?>">
											<div class="head-title-0">
												<a href="#" data-toggle="tooltip" title="{{province($data->province)}}" class="btn btn-dark">{{substr(province($data->province), 0, 9)}}</a>
												<a href="#" data-toggle="tooltip" title="{{$data->age}} años" class="btn btn-dark">{{$data->age}} años</a>
												<a href="#" data-toggle="tooltip" title="{{tariffs_price($data->id)}} €" class="btn btn-dark">{{tariffs_price($data->id)}} €</a>
												<span  data-toggle="tooltip" title="{{$data->nationality}}"><img src="{{URL::asset('public/front/images/flags-medium/'.nationality($data->nationality).'.png')}}" class="img-fluid"></span>
											</div>
											<p>{{$data->title}}</p>
										</div>
									</a>
								</div>						
								
							<?php } ?>
						<?php } ?>
						
						
					<?php }?>
				</span>
				
				<!---------------------------------------------------Subida Zona ads------>			
				<?php if(count($subida)>0){?>
					<?php /*<div  class="col-md-11 masonry offset-md-1">*/?>
					<?php $subida_ids = array(); ?>
					<?php foreach($subida as $data2){?>
						<?php  $subida_ids[] = $data2->id; ?>
						<?php //$data2 = profile($data2->profile_ads_id, $category); ?>
						<?php if(!empty($data2)){?>
							<div  class="item video-image grid-item">
								<a href="javascript:void(0);"  >
									<div class="img-top">
										<img onclick="openpopup({{$data2->id}}, {{$data2->top_subida_profile_listsID}}, 'subida')" src="<?php echo URL::asset('public/uploads/profile_ads/'.$data2->profile_pic);?>" class="img-fluid" alt="">
										<div class="overlay">
											<div class="text">
												<a onclick="favoritos({{$data2->id}},'subida{{$data2->id}}')" href="javascript:void(0)"    class="subida{{$data2->id}} a1 <?php if(favoritos_check($data2->id)>0){ echo 'favrotea1';}?>"><i class="fas fa-heart <?php if(favoritos_check($data2->id)>0){ echo 'favrotea1';}?>"></i></a>
												<a href="" class="a2"><i class="fas fa-check"></i></a>
												<a href="" class="a3"><i class="fas fa-play"></i></a>
													<?php 	if($data2->role == 'Individual'){ ?>
											<a href="" class="a4"><i class="fas fa-info"></i></a>
											<?php } ?>
											</div>
										</div>
										<?php if(self_check($data2->id)>0){?>
											<div class="self-icon">
												<img src="{{URL::asset('public/front/images/self.png')}}" class="img-fluid" alt="">
											</div>
										<?php } ?>
									</div>
									<?php 	if($data2->role == 'Agency'){ ?>
							<?php 
							$check_ad_member_type =  check_ad_member_type($data2->member_id);
							if(!empty($check_ad_member_type->upload_logo)){  ?>

							<a href="{{ url('/agencia/'.$data2->member_id) }}">
							<div class="image-top-bottom">
							<img src="<?php echo URL::asset('public/uploads/profile_logo/'.$check_ad_member_type->upload_logo);?>" class="img-fluid" alt="">
							</div>
							</a>
							<?php }?>
							<?php } ?>
									<div class="img-text white-bg">
										<a href="#" data-toggle="tooltip" title="{{province($data2->province)}}" class="btn btn-dark">{{substr(province($data2->province), 0, 9)}}</a>
										<a href="#" data-toggle="tooltip" title="{{$data2->age}} años" class="btn btn-dark">{{$data2->age}} años</a>
										<a href="#" data-toggle="tooltip" title="{{tariffs_price($data2->id)}} €" class="btn btn-dark">{{tariffs_price($data2->id)}} €</a>
										<span  data-toggle="tooltip" title="{{$data2->nationality}}"><img src="{{URL::asset('public/front/images/flags-medium/'.nationality($data2->nationality).'.png')}}" class="img-fluid"></span>
										<p>{{$data2->title}}</p>
									</div>
								</a>
							</div>
							
						<?php } ?>	
					<?php } ?>	
					<?php /*</div>*/?>
				<?php }?>
			
			<!-----Freee--------->
				<?php if(count($get_subida_going_address)>0){?>	
						<?php $get_subida_going_address_ids = array(); ?>
					<?php $subida_increment=1;
							foreach($get_subida_going_address as $data3){?>
						<?php if(!empty($data3)){?>
							<?php  $get_subida_going_address_ids[] = $data3->id; ?>
						<div  class="item video-image grid-item">
							<a href="javascript:void(0);"  >
								<div class="img-top">
								<?php if(!empty($data3->top_subida_profile_listsID)){ $top_subida_profile_listsID=$data3->top_subida_profile_listsID; }else{ $top_subida_profile_listsID=0;}?>
								<img src="<?php echo URL::asset('public/uploads/profile_ads/'.$data3->profile_pic);?>" class="img-fluid" alt="" onclick="openpopup({{$data3->id}}, {{$top_subida_profile_listsID}}, 'subida')" >
									
									<div class="overlay">
										<div class="text">
										<a onclick="favoritos({{$data3->id}},'subida_going{{$data3->id}}')" href="javascript:void(0)"    class="subida_going{{$data3->id}} a1 <?php if(favoritos_check($data3->id)>0){ echo 'favrotea1';}?>"><i class="fas fa-heart <?php if(favoritos_check($data3->id)>0){ echo 'favrotea1';}?>"></i></a>
											<a href="" class="a2"><i class="fas fa-check"></i></a>
											<a href="" class="a3"><i class="fas fa-play"></i></a>
												<?php 	if($data3->role == 'Individual'){ ?>
											<a href="" class="a4"><i class="fas fa-info"></i></a>
											<?php } ?>
										</div>
									</div>
									<?php if(self_check($data3->id)>0){?>
									<div class="self-icon">
									<img src="{{URL::asset('public/front/images/self.png')}}" class="img-fluid" alt="">
									</div>
									<?php } ?>
								</div>
										<?php 	if($data3->role == 'Agency'){ ?>
							<?php 
							$check_ad_member_type =  check_ad_member_type($data3->member_id);
							if(!empty($check_ad_member_type->upload_logo)){  ?>

							<a href="{{ url('/agencia/'.$data3->member_id) }}">
							<div class="image-top-bottom">
							<img src="<?php echo URL::asset('public/uploads/profile_logo/'.$check_ad_member_type->upload_logo);?>" class="img-fluid" alt="">
							</div>
							</a>
							<?php }?>
							<?php } ?>
								<div class="img-text white-bg">
									<a href="#" data-toggle="tooltip" title="{{province($data3->province)}}" class="btn btn-dark">{{substr(province($data3->province), 0, 9)}}</a>
									<a href="#" data-toggle="tooltip" title="{{$data3->age}} años" class="btn btn-dark">{{$data3->age}} años</a>
									<a href="#" data-toggle="tooltip" title="{{tariffs_price($data3->id)}} €" class="btn btn-dark">{{tariffs_price($data3->id)}} €</a>
									<span  data-toggle="tooltip" title="{{$data3->nationality}}"><img src="{{URL::asset('public/front/images/flags-medium/'.nationality($data3->nationality).'.png')}}" class="img-fluid"></span>
									<p>{{$data3->title}}</p>
								</div>
							</a>
						</div>
													
						<?php } ?>	
						<?php $subida_increment++; } ?>						
				<?php } ?>
			
			</div>
			<?php }else{?>
			<div  class="col-md-11" style="padding: 100px 0px 100px 0px;">
				<center><h1>No hay resultados para su búsqueda</h1></center>
			<div>
			<?php } ?>
		</div>
	</div>
	
	
</section>
	<?php if(count($top_zona)>0 || count($subida)>0 || count($get_subida_going_address)>0){?>
<script src="{{URL::asset('public/front/js/masonry.pkgd-4.2.2.js')}}"></script>
<script type="text/javascript">
		$('.grid').masonry({
			itemSelector: '.grid-item',
			columnWidth: '.grid-sizer',
			gutter: '.gutter-sizer',
			horizontalOrder: true, // new!
			percentPosition: true,
		});      

	window.onresize = function() {
		var heights = window.innerHeight;
		document.getElementById("divID").style.height = heights -20 + "px";
	};
	$(function(){
		
		$(window).scroll(function() {
			//alert(height);
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
	
		var ads_list_ids  = $('#ads_list_ids').val();
			if(ads_list_ids==''){			
				$('.top-fix-button h2').css({"display": "none"});
			}
</script>
	<?php } ?>
<input value="<?php if(!empty($top_zona_ids)){ echo implode(",", $top_zona_ids);}?><?php if(!empty($subida_ids)){ echo ','.implode(",", $subida_ids);}?><?php if(!empty($line_16_ads_ids)){ echo ','.implode(",", $line_16_ads_ids);}?><?php if(!empty($get_subida_going_address_ids)){ echo ','.implode(",", $get_subida_going_address_ids);}?>" id="ads_list_ids" type="hidden" />
<input value="<?php if(!empty($top_zona_ids)){ echo implode(",", $top_zona_ids);}?>" id="top_ads_list_out" type="hidden" />
		<input value="<?php if(!empty($subida_ids)){ echo implode(",", $subida_ids);}?>" id="subida_ads_list_out" type="hidden" />
	<div class="row">
	<div class="col-md-6 offset-md-1  order-column-text">
	<?php echo (seo($category)->lower_description); ?>
	</div>
	</div>