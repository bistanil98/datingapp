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
        <h4>Nueva contrase&ntilde;a</h4>
        <p>Elija una contrase&ntilde;a de 6 a 15 caracteres.</p>
		
		<form   action = "{{url('/members/update-password/')}}/{{$hash}}" method="post">
		 @csrf
          <div class="form-group">
            <input value="{{ old('new_password') }}" required type="password" name="new_password" class="form-control"  placeholder="Nueva contrase&ntilde;a">
			<span class="text-white">{{ $errors->first('new_password') }}</span>
          </div>
          <div class="form-group">
            <input value="{{ old('confirm_password') }}" required type="password" name="confirm_password" class="form-control"  placeholder="Confirmar contrase&ntilde;a">
			<span class="text-white">{{ $errors->first('confirm_password') }}</span>
          </div>
          <button type="submit" class="btn btn-danger">Aceptar</button>

        </form>
       </div>
     </div>
   </div> 
  </div>
</section>
				
@endsection