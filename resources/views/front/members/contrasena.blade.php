@extends('front.layouts.agencia')


@section('content')
<div class="page">
	<div class="page-main page-faq change-password">
		
		<!-- CONTAINER -->
		<div class="container content-area relative content-are">
			
			<!-- PAGE-HEADER -->
			<div class="page-header">
				<h4 class="page-title">Contraseña</h4>
				<?php /*
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="#">Pages</a></li>
					<li class="breadcrumb-item active" aria-current="page">Contraseña</li>
				</ol>*/?>
			</div>
			<!-- PAGE-HEADER END -->
			
			<!-- ROW-1 OPEN -->
			
			<!-- CONTAINER CLOSED -->
		</div>
		<!-- login-seccccccc  -->
		<section class="login-sec contrsina-sec">
			<div class="container login-cont">				
				<form class="row"  method="post"action = "{{url('/members/contrasena')}}">
					@csrf
					<div class="col-md-12">
						<div class="header-text">
							<h4>Cambiar contraseña</h4>
							<p>Escoge una contraseña de 6 a 15 caracteres.</p>
							<!--   <p>Para publicar tu anuncio es necesario que te registres primero.</p>    -->
						</div>
					</div>
					<div class="col-md-6 m-auto d-block">
						@if(Session::has('message'))
						<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
						@endif
						<div class="left-login">
							<div class="form-group">
								<input value="{{ old('old_password') }}" required type="password" name="old_password" class="form-control" placeholder="Contraseña anterior">
								<span class="text-danger">{{ $errors->first('old_password') }}</span>
							</div>
							<div class="form-group">
								<input value="{{ old('new_password') }}"required type="password" name="new_password" class="form-control" placeholder="Nueva contraseña">
								<span class="text-danger">{{ $errors->first('new_password') }}</span>
							</div>
							<div class="form-group">
								<input value="{{ old('confirm_password') }}" required type="password" name="confirm_password" class="form-control" placeholder="Repetir contraseña">
								<span class="text-danger">{{ $errors->first('confirm_password') }}</span>
							</div>
							
							<input type="submit" name="submit" class="btn btn-danger" value="Entrar en mi panel">
						</div>
					</div>
					
					
					
				</form>
			</div>
		</section>
		
		
		
	</div>
</div>

@endsection