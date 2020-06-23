@extends('front.layouts.frontlayout')

@section('content')
		<section class="video-grid-sec">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-6 offset-md-1  order-column-text">
						<div class="video-header-text">
							<h1>Escorts y putas en España</h1>
							<nav aria-label="breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item active" aria-current="page">España</li>
								</ol>
							</nav>
						</div>
					</div>
					<div class="col-md-5  order-column-icon">
						<div class="icon-div">
							<a href="" data-toggle="modal" data-target="#escrot">Crear Anuncio</a>
							<a href="#" class="alta-button" data-toggle="modal" data-target="#register-modal"><i class="fas fa-users"></i> Mi Cuenta</a>
							
						</div>
					</div>
					
					
				</div>
				
				
				<div class="row gird-first">
					<div class="col-md-1 top-fix-main">
					<div class="top-fix-button">
					<h2 class="<?php if (isset($category) && $category=='travestis'){ echo 'orange-h2';}?><?php if (isset($category) && $category=='chaperos'){ echo 'blue-h2';}?>">TOP Anuncio</h2>
					</div>
					</div>
					<div class="col-md-11 masonry">
						<?php foreach($top_zona as $data){ //dd($ads);die;?>
						
						<?php //$data = profile($data->profile_ads_id,$category); ?>
						<?php if(!empty($data)){ ?>
						
						<div class="item video-image" data-toggle="modal" data-target="#girl_modals{{$data->id}}">
							<a href="#" >
								<div class="img-top">
									<img src="<?php echo URL::asset('public/uploads/profile_ads/'.$data->profile_pic);?>" class="img-fluid" alt="">
									<div class="overlay">
										
										<div class="text">
											<a href="#" class="a1"><i class="fas fa-heart"></i></a>
											<a href="" class="a2"><i class="fas fa-check"></i></a>
											<a href="" class="a3"><i class="fas fa-play"></i></a>
										<a href="" class="a4"><i class="fas fa-info"></i></a></div>
									</div>
								</div>
							</a>
							<a href="#">
								<div class="img-text <?php if (isset($category) && $category=='travestis'){ echo 'orange-bg';}?><?php if (isset($category) && $category=='chaperos'){ echo 'blue-bg';}?>">
									<a href="#" class="btn btn-dark">{{province($data->province)}}</a>
									<a href="#" class="btn btn-dark">{{$data->age}} años</a>
									<a href="#" class="btn btn-dark">150 €</a>
									<span><img src="{{URL::asset('public/front/images/united-kingdom.png')}}" class="img-fluid"></span>
									<p>{{$data->text}}</p>
								</div>
							</a>
						</div>						
						<!------Girl Popup----->
						@include('front/search.popup', ['data' => $data])
						<?php } ?>
						<?php } ?>
						
						</div>
						
				
				<!---------------------------------------------------Subida Zona ads------>			
						
					<div class="col-md-11 masonry offset-md-1">
					<?php foreach($subida as $data2){?>
						<?php //$data2 = profile($data2->profile_ads_id, $category); ?>
						<?php if(!empty($data2)){?>
						<div class="item video-image" data-toggle="modal" data-target="#girl_modals{{$data2->id}}">							
							<a href="#">
								<div class="img-top">
									<img src="<?php echo URL::asset('public/uploads/profile_ads/'.$data2->profile_pic);?>" class="img-fluid" alt="">
									<div class="overlay">
										<div class="text"><a href="#" class="a1"><i class="fas fa-heart"></i></a>
											<a href="" class="a2"><i class="fas fa-check"></i></a>
											<a href="" class="a3"><i class="fas fa-play"></i></a>
											<a href="" class="a4"><i class="fas fa-info"></i></a>
										</div>
									</div>
								</div>
								<div class="img-text white-bg">
									<a href="#" class="btn btn-dark">{{province($data->province)}}</a>
									<a href="#" class="btn btn-dark">{{$data2->age}} años</a>
									<a href="#" class="btn btn-dark">150 €</a>
									<span><img src="{{URL::asset('public/front/images/united-kingdom.png')}}" class="img-fluid"></span>
									<p>{{$data2->text}}</p>
								</div>
							</a>
						</div>
						<!------Girl Popup----->
						@include('front/search.popup', ['data' => $data2])
							
						<?php } ?>	
						<?php } ?>	
					</div>
				</div>
			</div>
			
			
		</section>

<!-- register popup-->

<div class="modal fade" id="register-modal">
	  
					<div class="modal-dialog login container">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
						<div class="modal-content">
							<div class="row">
								<div class="col-md-12">
									<div class="popupheader">
										<h3>Publicar anuncio</h3>
										<p>Para publicar tu anuncio es necesario que te registres primero.</p>
									</div>
								</div>
							</div>
							
								<div class="row">
								
									<div class="col-md-6">
									<form  id="login-form"  method="post" action="javascript:void(0)">
									@csrf
										<div class="popup-form-div border-popup">
											<h4>Ya estoy registrada</h4>
											
											
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
									
									
									
									<div class="col-md-6">
									<form  id="register-form"  method="post" action="javascript:void(0)">
									@csrf
										<div class="popup-form-div">
											<h4>Quiero registrarme</h4>
											
											<p>Debes indicarnos un email y te enviaremos un enlace para
												validarlo. Este email no será público, sólo se usará para
											gestionar tus anuncios.</p>
											
											
											<div class="form-group right">
												<input required type="email" class="form-control" name="email"  placeholder="Email">
												 <span class="text-danger">{{ $errors->first('email') }}</span>
											</div>
											<input id="register-form"  method="post" action="javascript:void(0)" type="submit" name="submit" class="btn btn-primary" value="Entrar en mi panel">
											
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
            <p>Regístrese ahora gratis y cree su anuncio. edite su perfil en cualquier momento.</p>
            <span>¿A qué esperas para anunciarte?</span>
            <button class="btn btn-danger register_modal" >+ info</butto>
          </div>
        </div>
         <div class="col-md-6">
          <div class="left-escort">
            <h4>Agencia de Escorts</h4>
            <p>Regístrese ahora gratis y puede editar y actualizar el paquete en cualquier momento.</p>
            <span class="right-span">¿Te podemos ayudar?</span>
            <a href="{{ action('AgencyController@plan_agencia')}}" class="btn btn-primary">+ info</a>
          </div>
        </div>
        </div>
      </div>
        
        
      </div>
    </div>
  </div><!-- escrot model-->				
@endsection