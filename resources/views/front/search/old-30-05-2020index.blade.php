@extends('front.layouts.frontlayout')

@section('content')
<div id="searchResult">
		<section class="video-grid-sec">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-6 offset-md-1  order-column-text">
						<div class="video-header-text">
							<h1><?php echo (seo($category)->h1_title); ?></h1>
							<nav aria-label="breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item active" aria-current="page">España</li>
									<?php if(isset($location) && !empty($location)){?>
										<li class="breadcrumb-item active" aria-current="page">{{ucwords($location)}}</li>
										<?php }?>
										
									<?php if(isset($keywords) && !empty($keywords)){?>
										<li class="breadcrumb-item active" aria-current="page">{{ucwords($keywords)}}</li>
										<?php }?>
											
									
								</ol>
							</nav>
						</div>
					</div>
					<div class="col-md-5  order-column-icon">
						<div class="icon-div">
							<a href="#" class="alta-button favrote" data-toggle="modal" data-target="#counter"><i class="fas fa-heart" ></i><span class="counterone" id="total_favoritas">{{favoritos_count()}}</span> Favoritas</a>
							<a href="javascript:void(0);" data-toggle="modal" data-target="#escrot">Anúnciate</a>
							<?php if(!empty(session('agency_id'))){?>									
									<a href="{{ url('/agencia/control') }}" class="alta-button"><i class="fas fa-users"></i> Iniciar Sesión</a>										
								<?php }else if(!empty(session('user_id'))){  ?>								
									<a href="{{ url('/members/control') }}" class="alta-button"><i class="fas fa-users"></i> Iniciar Sesión</a>
									<?php }else{?>
									<a href="javascript:void(0);" class="alta-button" data-toggle="modal" data-target="#mi-cuenta-modal"><i class="fas fa-users"></i> Iniciar Sesión</a>
									<?php 	} ?>
							
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
					<?php if(count($top_zona)>0){?>
					<div class="top-fix-button" >
					<h2 class="<?php if (isset($category) && $category=='travestis'){ echo 'orange-h2';}?><?php if (isset($category) && $category=='chaperos'){ echo 'blue-h2';}?>">TOP Anuncio</h2>
					</div>
					<?php } else if(count($subida)>0){ ?>
					<div class="top-fix-button" >
					<h2 style="font-size:30px, color:#333" class="<?php if (isset($category) && $category=='travestis'){ echo 'orange-h2';}?><?php if (isset($category) && $category=='chaperos'){ echo 'blue-h2';}?>">Auto Subida</h2>
					</div>
					<?php }?>
					</div>					
						<?php if(count($top_zona)>0 || count($subida)>0 || count($line_16_ads)>0 || count($get_subida_going_address)>0){?>
					<div  class="col-md-11 masonry grid">
					<div class="grid-sizer"></div>
                                            <div class="gutter-sizer"></div>
					<span id="divID">
					<?php if(count($top_zona)>0){?>
						<?php $top_zona_ids = array(); ?>
						<?php $top = 0; foreach($top_zona as $data){ ?>
						<?php  $top_zona_ids[] = $data->id; ?>
						<?php //$data = profile($data->profile_ads_id,$category); ?>
						<?php if(!empty($data)){ ?>
						
						<div class="item video-image grid-item">
							<a href="javascript:void(0);"  >
								<div class="img-top">
								<?php if($top>4){?>
								<img src="<?php echo URL::asset('public/uploads/profile_ads/'.$data->profile_pic);?>" class="img-fluid" alt="" onclick="openpopup({{$data->id}}, {{$data->top_subida_profile_listsID}}, 'top')" >
								<?php }else{ ?>
								<img src="<?php echo URL::asset('public/uploads/profile_ads/'.$data->profile_pic);?>" class="img-fluid" alt="" onclick="openpopup({{$data->id}}, {{$data->top_subida_profile_listsID}}, 'top')" >
									<?php } ?>
									
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
						<?php $top++;  } ?>
						
						
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
									<img   onclick="openpopup({{$data2->id}}, {{$data2->top_subida_profile_listsID}}, 'subida')" src="<?php echo URL::asset('public/uploads/profile_ads/'.$data2->profile_pic);?>" class="img-fluid" alt="">
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
				
				<!---------------------------------------------------Goning and free ads------>	
				
				<?php if(Route::getCurrentRoute()->getActionName()!='App\Http\Controllers\HomeController@agencia'){?>
				
					<?php if(count($line_16_ads)>0){?>	
					<?php $line_16_ads_ids = array(); ?>
					<?php $subida_increment=1;
							foreach($line_16_ads as $data3){?>
						<?php if(!empty($data3)){?>
							<?php  $line_16_ads_ids[] = $data3->id; ?>
						<div class="item video-image grid-item">
							<a href="javascript:void(0);"  >
								<div class="img-top">
								<?php if(!empty($data3->top_subida_profile_listsID)){ $top_subida_profile_listsID=$data3->top_subida_profile_listsID; }else{ $top_subida_profile_listsID=0;}?>
								<img src="<?php echo URL::asset('public/uploads/profile_ads/'.$data3->profile_pic);?>" class="img-fluid" alt="" onclick="openpopup({{$data3->id}}, {{$top_subida_profile_listsID}}, 'subida')" >
									
									<div class="overlay">
										<div class="text">
										<a onclick="favoritos({{$data3->id}},'subida_16{{$data3->id}}')" href="javascript:void(0)"    class="subida_16{{$data3->id}} a1"><i class="fas fa-heart <?php if(favoritos_check($data3->id)>0){ echo 'favrotea1';}?>"></i></a>
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
				<?php } ?>
				</div>
					<?php }else{?>
			<div  class="col-md-11" style="padding: 100px 0px 100px 0px;">
				<center><h1>No hay resultados para su búsqueda</h1></center>
			</div>
			<?php } ?>
				</div>
					<div class="row">
	<div class="col-md-6 offset-md-1  order-column-text">
	<?php echo (seo($category)->lower_description); ?>
	</div>
	</div>
			</div>
				
		</section>
		<input value="<?php if(!empty($top_zona_ids)){ echo implode(",", $top_zona_ids);}?><?php if(!empty($subida_ids)){ echo ','.implode(",", $subida_ids);}?><?php if(!empty($line_16_ads_ids)){ echo ','.implode(",", $line_16_ads_ids);}?><?php if(!empty($get_subida_going_address_ids)){ echo ','.implode(",", $get_subida_going_address_ids);}?>" id="ads_list_ids" type="hidden" />
		<input value="<?php if(!empty($top_zona_ids)){ echo implode(",", $top_zona_ids);}?>" id="top_ads_list_out" type="hidden" />
		<input value="<?php if(!empty($subida_ids)){ echo implode(",", $subida_ids);}?>" id="subida_ads_list_out" type="hidden" />

 </div>
<!-- register popup-->



<div class="modal fade Independiente-login" id="register-modal">
	  
					<div class="modal-dialog login container" style="max-width: auto;">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
						<div class="modal-content">
							<div class="row">
								<div class="col-md-12">
									<div class="popupheader">
										<h3>Registro Independiente</h3>
										<p>Para publicar tu anuncio es necesario que te registres primero.</p>
									</div>
								</div>
							</div>
							
								<div class="row">
								
									<!-- <div class="col-md-6">
									<form  id="login-form"  method="post" action="javascript:void(0)">
									@csrf
										<div class="popup-form-div border-popup">
											<h4>Escort Independiente Login</h4>
											
											
											<div class="form-group">
												<input required name="email" type="email" class="form-control"  placeholder="Email">
											</div>
											<div class="form-group">
												<input required name="password" type="password" class="form-control"  placeholder="Contraseña">
											</div>
											<div class="custom-control custom-checkbox">
												<input  type="checkbox" class="custom-control-input" id="rimember" name="rimember">
												<label class="custom-control-label" for="rimember">Recuérdame</label>
												<a href="{{url('/members/password-lost')}}" class="form-link">¿Has olvidado tu contraseña?</a>
											</div>
											<div class="alert alert-danger d-none" id="msg_div">
											<span id="res_message"></span>
											</div>
											<input id="send_form" type="submit" name="submit" class="btn btn-primary" value="Entrar en mi panel">
											
										</div>
										</form>
									</div>
									 -->
									
									
									<div class="col-md-12">
									<form  id="register-form"  method="post" action="javascript:void(0)">
									@csrf
										<div class="popup-form-div">
											<p>Debes proporcionarnos un email y te enviaremos un enlace para validarlo.</p>
											
											
											<div class="form-group right">
												<input required type="email" class="form-control" name="email"  placeholder="Email">
												 <span class="text-danger">{{ $errors->first('email') }}</span>
											</div>
											<input id="send_form_register"  method="post" action="javascript:void(0)" type="submit" name="submit" class="btn btn-primary" value="CONTINUAR">
											
										</div>
										</form>
									</div>
									
									
									
								</div>							
						</div>
					</div>
				</div>

<div class="modal fade" id="mi-cuenta-modal">
	  
					<div class="modal-dialog login container">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
						<div class="modal-content">
							<div class="row">
								<div class="col-md-12">
									<div class="popupheader">
										<h3>  Iniciar Sesión</h3>
										<p>Para publicar tu anuncio es necesario que te registres primero.</p>
									</div>
								</div>
							</div>
							
								<div class="row">
								
									<div class="col-md-6">
									<form  id="login-form_cuenta"  method="post" action="javascript:void(0)">
									@csrf
										<div class="popup-form-div border-popup">
											<h4>INDEPENDIENTES   </h4>
											
											
											<div class="form-group">
												<input required name="email" type="email" class="form-control"  placeholder="Email">
											</div>
											<div class="form-group">
												<input required name="password" type="password" class="form-control"  placeholder="Contraseña">
											</div>
											<div class="custom-control custom-checkbox">
												<input  type="checkbox" class="custom-control-input" id="rimember" name="rimember">
												<label class="custom-control-label" for="rimember">Recuérdame</label>
												<a href="{{url('/members/password-lost')}}" class="form-link">¿Has olvidado tu contraseña?</a>
											</div>
											<div class="alert alert-danger d-none" id="msg_div_cuenta">
											<span id="res_message_cuenta"></span>
											</div>
											<input id="send_form_cuenta" type="submit" name="submit" class="btn btn-primary" value="Entrar en mi cuenta">
											
										</div>
										</form>
									</div>
									
									
									
									<div class="col-md-6">
									<form  id="agency-form"  method="post" action="javascript:void(0)">
									@csrf
										<div class="popup-form-div primarii-div">
											<h4> AGENCIAS</h4>
											
											
											<div class="form-group">
												<input required name="email" type="email" class="form-control"  placeholder="Email">
											</div>
											<div class="form-group">
												<input required name="password" type="password" class="form-control"  placeholder="Contraseña">
											</div>
											<div class="custom-control custom-checkbox">
												<input  type="checkbox" class="custom-control-input" id="rimember2" name="rimember">
												<label class="custom-control-label" for="rimember2">Recuérdame</label>
												<a href="{{url('/agencia-password-lost')}}" class="form-link">¿Has olvidado tu contraseña?</a>
											</div>
											<div class="alert alert-danger d-none" id="msg_div_agency">
											<span id="res_message_agency"></span>
											</div>
											<input id="send_form_agency" type="submit" name="submit" class="btn btn-primary" value=" Entrar en mi cuenta ">
											
										</div>
										</form>
									
									</div>
									
									
									
								</div>							
						</div>
					</div>
				</div>
			
<!-------escort-popup------>
<div class="modal fade escort-model" id="escrot">
    <div class="modal-dialog modal-lg">
      <div class="modal-content row">
        <!-- Modal Header -->
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        
        <div class="col-md-12 main-escort-div">
          <div class="row">
        <div class="col-md-6" style="border-right: 1px solid #fd2c94;">
          <div class="left-escort">
            <h4>Escort Independiente</h4>
            <p>Registrate ahora y crea tu anuncio Gratis.<br><br>Nuestros usuarios desean conocerte, ¿a qué esperas para anunciarte?</p>
            <!-- <span>¿A qué esperas para anunciarte?</span> -->
            <button class="btn btn-danger register_modal" > CONTINUAR</butto>
          </div>
        </div>
         <div class="col-md-6">
          <div class="left-escort">
            <h4>Agencia de Escorts</h4>
            <p>Para todo tipo de agencias...<br>Registrate ahora GRATIS y disfruta de nuestros paquetes.</p>
            <!-- <span class="right-span">¿Te podemos ayudar?</span> -->
            <a href="{{ action('AgencyController@register_agencia')}}" class="btn btn-primary"> CONTINUAR</a>
          </div>
        </div>
        </div>
      </div>
        
        
      </div>
    </div>
  </div><!-- escrot model-->				
  
<!----OPEN POPUP-->  	
<section class="main-pop-sec">
<!-- The Modal -->
<div class="modal fade show" id="girl_modals">
<div class="modal-dialog main-popup modal-xl">
<div class="row">
<div class="modal-content">
	 <button type="button" class="close" data-dismiss="modal">&times;</button>
	  <div class="modal-body">
        
      </div>
</div><!-- row -->
</div><!-- modal-dialog modal-xl container -->
</div><!-- modal fade show -->
</div>  
</section>

@endsection