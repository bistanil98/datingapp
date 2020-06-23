@extends('front.layouts.frontlayout')

@section('content')


<section class="new-passeord_sec email-sec">
  <div class="container">
   <div class="row">
     <div class="col-md-12 m-auto d-block">
       <?php /*<div class="new-password_column">
        <h4>E-mail sent</h4>
        <p>You will receive the validation email shortly.</p>
        <p>Just in case, check your spam folder.</p>
        <p>If you do not receive it after a few minutes, <a href="#">Contact Us</a></p>
       </div>*/?>
	   <div class="content content-fixed content-auth-alt email-sent">
      <div class="container ht-100p">
        <div class="ht-100p d-flex flex-column align-items-center justify-content-center">
          <div class="wd-150 wd-sm-250 mg-b-30"><img src="<?php  echo URL::asset('public/front/images/img17.png');?>" class="img-fluid" alt=""></div>
          <h4 class="tx-20 tx-sm-24">Verifique su dirección de correo electrónico</h4>
          <p class="tx-color-03 mg-b-40">Verifique su correo electrónico y haga clic en el botón o enlace para verificar su cuenta.</p>
          <div class="tx-13 tx-lg-14 mg-b-40">
            <a href="{{url('/agencia/resend/'.$id.'')}}" class="btn btn-brand-02 d-inline-flex align-items-center">Reenviar verificación</a>
            <a href="javascript:void(0);" data-toggle="modal" data-target="#contact-support-agecncy" class="btn btn-white d-inline-flex align-items-center mg-l-5">Contacta a Soporte</a>
          </div>
          
        </div>
      </div><!-- container -->
    </div>
	
     </div>
   </div> 
  </div>
</section>
	<section class="name-emailsec">
		<div class="container">
<div class="modal fade show" id="contact-support-agecncy" >
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title"> Contacto </h4>
          <button type="button" class="close" data-dismiss="modal">×</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
	<form  id="contact-support-agecncy-form"  method="post" action="javascript:void(0)">
	@csrf
  <div class="form-group">
    <label for="Name">Nombre Inserte Nombre <span style="color:red">*</span></label>
    <input type="text" class="form-control" placeholder="Inserte Nombre" name="name" required>
    <input value="agecncy" type="hidden" name="type">
    <input value="{{$id}}" type="hidden" name="agency_id">
  </div>
  <div class="form-group">
    <label for="email">Correo Electrónico <span style="color:red">*</span></label>
    <input type="email" class="form-control" placeholder="Enter email" name="email" required>
  </div>
   <div class="form-group">
    <label for="telephone">Teléfono</label>
    <input type="number" class="form-control" placeholder="Inserte Telefono" name="telephone">
  </div>
 
  <div class="form-group">
     <label for="comment">Mensaje  <span style="color:red">*</span></label>
  <textarea class="form-control" rows="4" name="comments" required></textarea>
  </div>
  
	<div class="form-group">
		<img src="{{URL::asset('public/front/images/captcha-image.png')}}" class="img-fluid" alt="">	
	<button type="submit" class="btn btn-primary">Enviar</button>
  </div>
  
</form>

        </div>
        
       
        
      </div>
    </div>
  </div>	
</div>
</section>									
  
@endsection