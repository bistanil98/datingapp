@extends('front.layouts.frontlayout')

@section('content')
<section class="publish-sec">
	<div class="login container">
		<div class="row">
			<div class="col-md-5 m-auto d-block">
				<div class="popupheader">
					<h3>Agency Password Lost</h3>      
				</div>
			</div>
		</div>
		<div class="row">
			
			<div class="col-md-5 m-auto d-block">
			@if(Session::has('message'))
			<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
			@endif
				<form    method="post" action="{{url('/agencia-password-lost')}}">
					@csrf
					<div class="popup-form-div">		
						<div class="form-group">
							<input required name="email" type="email" class="form-control"  placeholder="Email">
						</div>
						
						<div class="form-group">
						<input id="send_form" type="submit" name="submit" class="btn btn-primary" value="Submit">
						</div>
						<div style="text-align: center;">														
								<p><br>
								<a href="{{url('/agencia-login')}}"><strong>» Back «</strong></a>								
							</p>
						</div>
					</div>
				</form>
			</div>
			
			
			
		</div>
	</div>
</section>



@endsection