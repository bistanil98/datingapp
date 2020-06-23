@extends('front.layouts.frontlayout')

@section('content')
<section class="publish-sec">
	<div class="login container">
		<div class="row">
			<div class="col-md-6 m-auto d-block">
				<div class="popupheader">
					<h3>Independiente Password Reset</h3>   
					<p>Choose a password of 6 to 15 characters.</p>
				</div>
			</div>
		</div>
		<div class="row">
			
			<div class="col-md-6 m-auto d-block">
			@if(Session::has('message'))
			<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
			@endif
			
				<form  method="post"action = "{{url('/members/reset-password/')}}/{{$hash}}">
					@csrf
					<div class="popup-form-div">		
						<div class="form-group">
							<input value="{{ old('new_password') }}" required type="password" name="new_password" class="form-control"  placeholder="New Password">
							<span class="text-danger">{{ $errors->first('new_password') }}</span>
						</div>
						<div class="form-group">
							<input value="{{ old('confirm_password') }}" required type="password" name="confirm_password" class="form-control"  placeholder="Confirm Password">
							<span class="text-danger">{{ $errors->first('confirm_password') }}</span>
						</div>
						
						<div class="form-group">
						<input id="send_form" type="submit" name="submit" class="btn btn-primary" value="Submit">
						</div>
						
					</div>
				</form>
			</div>
			
			
			
		</div>
	</div>
</section>



@endsection