@extends('front.layouts.frontlayout')

@section('content')
  <section class="publish-sec">
  	<div class="modal-dialog login container">
					
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
												<input  type="checkbox" class="custom-control-input" id="rimember2" name="rimember2">
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
	<?php /*			
<div class="login container">
  <div class="row">
  <div class="col-md-12">
    <div class="popupheader">
      <h3>Iniciar Sesión</h3>
      <p>Para publicar tu anuncio es necesario que te registres primero.</p>
    </div>
  </div>
</div>
<div class="row">
								
									<div class="col-md-6">
									<form  id="login-form"  method="post" action="javascript:void(0)">
									@csrf
										<div class="popup-form-div border-popup">
											<h4>INDEPENDIENTES</h4>
											
											
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
											<h4>AGENCIAS</h4>
											
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
</div>*/?>
</section>


				
@endsection