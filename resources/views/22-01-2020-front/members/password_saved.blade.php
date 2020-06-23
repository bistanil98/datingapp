@extends('front.layouts.frontlayout')
@section('content')
<section class="new-passeord_sec Identify">
  <div class="container">
   <div class="row">
     <div class="col-md-5 m-auto d-block">
       <div class="new-password_column">
        <h4>New Password</h4>
        <p>Password saved successfully.</p>
          <a href="{{ url('/publish') }}" class="btn btn-danger Identify">Login</a>
       </div>
     </div>
   </div> 
  </div>
</section>
				
@endsection