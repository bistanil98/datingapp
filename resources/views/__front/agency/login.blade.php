@extends('front.layouts.frontlayout')

@section('content')
<section class="publish-sec">
	<div class="login container">
		<div class="row">
			<div class="col-md-5 m-auto d-block">
				<div class="popupheader">
					<h3>Agency Login</h3>      
				</div>
			</div>
		</div>
		<div class="row">
			
			<div class="col-md-5 m-auto d-block">
			@if(Session::has('message'))
			<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
			@endif
				<form    method="post" action="{{url('/agencia-login')}}">
					@csrf
					<div class="popup-form-div">		
						<div class="form-group">
							<input required name="email" type="email" class="form-control"  placeholder="Email">
							
								@if ($errors->has('email'))
								<div class="error">{{ $errors->first('email') }}</div>
								@endif
						</div>
						<div class="form-group">
							<input required name="password" type="password" class="form-control"  placeholder="Passowrd">
							@if ($errors->has('password'))
								<div class="error">{{ $errors->first('password') }}</div>
								@endif	
						</div>
						<div class="form-group">
						<input id="send_form" type="submit" name="submit" class="btn btn-primary" value="Login">
						</div>
						<div style="text-align: center;">														
								<p><br>You have no account?<br>
								<a href="{{url('/register-agencia')}}"><strong>» Register «</strong></a>
								<br><br>Password lost?<br><a href="{{url('/agencia-password-lost')}}"><strong>» Set a new password «</strong></a>
							</p>
						</div>
					</div>
				</form>
			</div>
			
			
			
		</div>
	</div>
</section>



@endsection