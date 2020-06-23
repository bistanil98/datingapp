@extends('front.layouts.frontlayout')

@section('content')
<section class="new-passeord_sec">
  <div class="container">
   <div class="row">
     <div class="col-md-5 m-auto d-block">
		@if(Session::has('message'))
		<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
		@endif
       <div class="new-password_column">
        <h4>New Password</h4>
        <p>Choose a password of 6 to 15 characters.</p>
		
		<form   action = "{{url('/members/update-password/')}}/{{$hash}}" method="post">
		 @csrf
          <div class="form-group">
            <input value="{{ old('new_password') }}" required type="password" name="new_password" class="form-control"  placeholder="New Password">
			<span class="text-danger">{{ $errors->first('new_password') }}</span>
          </div>
          <div class="form-group">
            <input value="{{ old('confirm_password') }}" required type="password" name="confirm_password" class="form-control"  placeholder="Confirm Password">
			<span class="text-danger">{{ $errors->first('confirm_password') }}</span>
          </div>
          <button type="submit" class="btn btn-danger">to accept</button>

        </form>
       </div>
     </div>
   </div> 
  </div>
</section>
				
@endsection