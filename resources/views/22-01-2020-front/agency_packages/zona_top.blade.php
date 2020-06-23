@extends('front.layouts.frontlayout')

@section('content')
<section class="subida-zone">
  <div class="container">
    <div class="row">
      <div class="col-md-11 offset-sm-1">
        <div class="subida-header">
          <h3>escoja los anuncios para <strong>zona top</strong> !</h3>
        </div>
      </div>
    </div><!-- row -->
<div class="row img-row">
  <div class="col-md-1 img-col paso-col">
    <h4>paso 1</h4>
  </div>
  <div class="col img-col">
     <label class="image-checkbox" title="">
            <img src="{{URL::asset('public/front/images/model0001.jpg')}}" class="img-fluid"> 
            <div class="bootm-card"><h6>mariya</h6></div>
            <input type="checkbox" name="team[]">

        </label>

  </div>
  <div class="col img-col">
    <label class="image-checkbox" title="">
          <img src="{{URL::asset('public/front/images/model0002.jpg')}}" class="img-fluid">
            <div class="bootm-card"><h6>mariya</h6></div>
            <input type="checkbox" name="team[]">
        </label>
  </div>
  <div class="col img-col">
    <label class="image-checkbox" title="">
            <img src="{{URL::asset('public/front/images/model02.jpg')}}" class="img-fluid">
            <div class="bootm-card"><h6>mariya</h6></div>
            <input type="checkbox" name="team[]">
        </label>  
      </div>
  <div class="col img-col">
    <label class="image-checkbox" title="">
            <img src="{{URL::asset('public/front/images/model5.jpg')}}" class="img-fluid">
            <div class="bootm-card"><h6>mariya</h6></div>
            <input type="checkbox" name="team[]">
        </label>
  </div>
  <div class="col img-col">
    <label class="image-checkbox" title="">
            <img src="{{URL::asset('public/front/images/model4.jpg')}}" class="img-fluid">
            <div class="bootm-card"><h6>mariya</h6></div>
            <input type="checkbox" name="team[]">
        </label>
  </div>
</div>
<div class="row img-row">
  <div class="col offset-1 img-col">
     <label class="image-checkbox" title="">
            <img src="{{URL::asset('public/front/images/model11.jpg')}}" class="img-fluid">
            <div class="bootm-card"><h6>mariya</h6></div>
            <input type="checkbox" name="team[]">
        </label>
  </div>
  <div class="col img-col">
    <label class="image-checkbox" title="">
            <img src="{{URL::asset('public/front/images/model7.jpg')}}" class="img-fluid">
            <div class="bootm-card"><h6>mariya</h6></div>
            <input type="checkbox" name="team[]">
        </label>
  </div>
  <div class="col img-col">
    <label class="image-checkbox" title="">
            <img src="{{URL::asset('public/front/images/model8.jpg')}}" class="img-fluid">
            <div class="bootm-card"><h6>mariya</h6></div>
            <input type="checkbox" name="team[]">
        </label>  
      </div>
  <div class="col img-col">
    <label class="image-checkbox" title="">
            <img src="{{URL::asset('public/front/images/model9.jpg')}}" class="img-fluid">
            <div class="bootm-card"><h6>mariya</h6></div>
            <input type="checkbox" name="team[]">
        </label>
  </div>
  <div class="col img-col">
    <label class="image-checkbox" title="England">
            <img src="{{URL::asset('public/front/images/model3.jpg')}}" class="img-fluid">
            <div class="bootm-card"><h6>mariya</h6></div>
            <input type="checkbox" name="team[]">
        </label>
  </div>
</div>

<div class="row img-row card-row">
  <div class="col-md-1 img-col paso-col">
    <h4>paso 2</h4>
  </div>
  <div class="col">
    <label class="card-text-lab">
          
    <div class="card-vale card-blue card-input">
      <h5 class="blue-recom">anuncio top</h5>
      <h5 class="dios"><span> 1</span></h5>
    </div>
  </label>
  </div>
  <div class="col">
    <label class="card-text-lab">
         
    
    <div class="card-vale card-blue card-input">
      <h5 class="blue-recom">semanas</h5>
      <h5 class="dios"><span>1 week</span></h5>
    </div>
  </label>
  </div>
<div class="col">
  <label class="card-text-lab">
         
    <div class="card-vale card-blue card-input">
      <h5 class="blue-recom">precio</h5>
      <h5 class="dios"><span> 60 euro</span></h5>
    </div>
  </label>
  </div>
  <div class="col">
  <label class="card-text-lab">
         
    <div class="card-vale card-blue card-pink card-input">
      <h5 class="blue-recom">total precio</h5>
      <h5 class="dios">3 * 60 = 180 euro</h5>
    </div>
  </label>
  </div>
</div>
<div class="row img-row card-row">
 <div class="col-md-1 img-col paso-col">
    <h4>paso 3</h4>
  </div>
  <div class="col-md-11">
    <div class="peso-text">
      <h5>Realizar pago.</h5>
    </div>
  </div>
   <div class="col-md-11 offset-sm-1">
    <div class="visa-card">
      <table>
        <tbody>
          <tr>
          <td>
             <div class="custom-control custom-radio">
    <input type="radio" class="custom-control-input" id="customRadio" name="example1" value="customEx">
    <label class="custom-control-label" for="customRadio"></label>
  </div>
    </td>
      <td>
        <h6>Trasnfer de credito</h6>
        <span class="master-cards">
          <img src="{{URL::asset('public/front/images/visa.png')}}" class="img-fluid">
          <img src="{{URL::asset('public/front/images/visa2.png')}}" class="img-fluid">
          <img src="{{URL::asset('public/front/images/master.png')}}" class="img-fluid">
          <img src="{{URL::asset('public/front/images/master2.png')}}" class="img-fluid">
        </span>
      </td>
      <td>
            <div class="custom-control custom-radio">
    <input type="radio" class="custom-control-input" id="customRadioss" name="example1" value="customEx">
    <label class="custom-control-label" for="customRadioss"></label>
  </div>
    </td>
    <td>
      <h5>Transferencia </h5>
    </td>
    
          </tr>
        </tbody>
      </table>
    </div>
<div class="bottom-four">
<div class="custom-control custom-checkbox mb-3 mt-3">
      <input type="checkbox" class="custom-control-input" id="customCheck" name="example1">
      <label class="custom-control-label" for="customCheck">Acepto los <strong class="strong-border">Términos y Condiciones.</strong></label>
    </div>
    </div>
    <div class="bottom-four submited-inpu">
      <input type="submit" name="" class="btn btn-danger" value="Pagar">
    </div>
    </div>
  </div>
  </div>

</section>
<script type="text/javascript" src="{{URL::asset('public/front/js/jquery.min.js')}}"></script>
<script type="text/javascript">
    jQuery(function ($) {
        // init the state from the input
        $(".image-checkbox").each(function () {
            if ($(this).find('input[type="radio"]').first().attr("checked")) {
                $(this).addClass('image-checkbox-checked');
            }
            else {
                $(this).removeClass('image-checkbox-checked');
            }
        });

        // sync the state to the input
        $(".image-checkbox").on("click", function (e) {
            if ($(this).hasClass('image-checkbox-checked')) {
                $(this).removeClass('image-checkbox-checked');
                $(this).find('input[type="radio"]').first().removeAttr("checked");
            }
            else {
                $(this).addClass('image-checkbox-checked');
                $(this).find('input[type="radio"]').first().attr("checked", "checked");
            }

            e.preventDefault();
        });
    });
</script>
@endsection