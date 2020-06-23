@extends('front.layouts.member')

@section('content')
<!-- subida-zone-section -->
<form  method="post"   action="{{url('/members/subida-zone')}}" enctype="multipart/form-data">
@csrf
<section class="subida-zone subida-new-sec">
  <div class="container">
<div class="row img-row">
  <div class="col-md-2 m-auto d-block  img-col">
    <label class="image-checkbox image-checkbox-checked" title="">
            <img src="<?php if(!empty($ads->profile_pic)){  echo URL::asset('public/uploads/profile_ads/'.$ads->profile_pic); }?>" class="img-fluid">
            <div class="bootm-card"><h6>{{$ads->first_name}}</h6></div>
            <input type="checkbox" value="{{$ads->id}}" name="number_of_photo[]" checked="checked">
        </label>  
      </div>
</div><!-- row -->

   <div class="row img-row card-row">
   <div class="col-md-1 img-col paso-col">
    <h4>paso 1</h4>
  </div>
  <div class="col-md-11">
    <div class="peso-text">
      <h5>escoge un plan de subidas.</h5>
    </div>
  </div>
  <div class="col-md-11 offset-sm-1">
    <div class="row">	
		<?php $i=1; foreach($get_user as $data){?>
		<div class="col-md-4 col-sm-6 plan-image-checkbox">
		<label class="card-text-lab">        
		<div class="card-vale card-<?php if($i==2){ echo 'pink';}else{ echo 'blue';}?> card-input">
		<input name="UserSelected" data-id="<?php echo $data->days;?>"  type="radio" value="<?php echo $data->id;?>">
		<h5 style="<?php if($i==2){ echo 'background: #fd2c94;';}?>" class="blue-recom">contratar</h5>
		<h6>recomendado para tu ciudad</h6>
		<h5 class="dios"><span class="30das"> <?php echo $data->days;?> dias</span>	</h5>
		<span class="rate-spn"><h3><?php echo $data->price;?>.00 <span class="td-span">€</span> <span class="td-total">total</span></h3> </span>  
		</div>
		</label>
		</div><!-- col-close -->
		<?php $i++; }?>


	</div>
</div>
</div><!-- row-close -->
  


<div class="row img-row card-row">
  <div class="col-md-1 img-col paso-col">
    <h4>paso 2</h4>
  </div>
  <div class="col-md-11">
    <div class="peso-text">
      <h5>Configura cuando subir.</h5>
    </div>
  </div>
 <div class="col-md-4 offset-md-1 subida-forma">
   <div class="row form">
<div class="col-md-5 form-group">
    <label for="text">primer dia</label>
   </div>
   <div class="col-md-7 form-group">
    <input name="from_date[]" required dateformat="Y-m-d" placeholder="yy-mm-dd" autocomplete="off" min="{{date('Y-m-d')}}"  type="date" onchange="myFunction('1')"  class="form-control plan2startTime-1">
   </div>
   <div class="col-md-5 form-group">
    <label for="text">ultimo dia</label>
   </div>
   <div class="col-md-7 form-group">
    <input name="to_date[]" required style="background:#fff;" readonly placeholder="yy-mm-dd" autocomplete="off" min="{{date('Y-m-d')}}"    class="form-control plan2endTime-1">
   </div>
    <div class="col-md-5 form-group">
    <label for="text">las 24h del dia</label>
   </div>
   <div class="col-md-7 custom-control custom-checkbox mb-3">
      <input type="checkbox" class="custom-control-input" id="customCheck" name="example1">
      <label class="custom-control-label" for="customCheck"></label>
    </div>
    <div class="col-md-5 form-group">
    <label for="text">primera subida</label>
   </div>
   <div class="col-md-4 form-group">
      <select name="cars" class="custom-select">
    <option selected>Custom Select Menu</option>
    <option value="volvo">Volvo</option>
    <option value="fiat">Fiat</option>
    <option value="audi">Audi</option>
  </select>
   </div>
    <div class="col-md-5 form-group">
    <label for="text">ultima subida</label>
   </div>
   <div class="col-md-4 form-group">
      <select name="cars" class="custom-select">
    <option selected>Custom Select Menu</option>
    <option value="volvo">Volvo</option>
    <option value="fiat">Fiat</option>
    <option value="audi">Audi</option>
  </select>
   </div>

</div><!-- row --> 
</div><!-- column -->
</div><!-- main-row-close -->


<div class="row img-row card-row">
 <div class="col-md-1 img-col paso-col">
    <h4>paso 3</h4>
  </div>
  <div class="col-md-11">
    <div class="peso-text">
      <h5>Realizar pago.</h5>
    </div>
  </div>
   <div class="col-md-11 offset-md-1">
    <div class="visa-card">
      <table>
         <tbody>
          <tr>
          <td>
             <div class="custom-control custom-radio">
    <input checked type="radio" class="custom-control-input" id="customRadio" name="payment_type" value="credito">
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
    <input  type="radio" class="custom-control-input" id="customRadioss" name="payment_type" value="transferencia">
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
						<input required type="checkbox" class="custom-control-input" id="customCheck-2" name="example1">
						<label class="custom-control-label" for="customCheck-2">Acepto los <strong class="strong-border">Términos y Condiciones.</strong></label>
					</div>
				</div>
    <div class="bottom-four submited-inpu">
      <input type="submit" name="" class="btn btn-danger" value="Pagar">
    </div>
    </div>
  </div>


</div>
  </div>

</section>
</form>
<script type="text/javascript" src="{{URL::asset('public/front/js/jquery.min.js')}}"></script>
<script type="text/javascript">
   /*  jQuery(function ($) {        
        $(".plan-image-checkbox").on("click", function (e) {
		alert('h');
            if ($(this).hasClass('image-checkbox-checked')) {
                $(this).removeClass('image-checkbox-checked');
                $(this).find('input[type="checkbox"]').first().removeAttr("checked");
            }
            else {
                $(this).addClass('image-checkbox-checked');
                $(this).find('input[type="checkbox"]').first().attr("checked", "checked");
            }

            e.preventDefault();
        });
    }); */
</script>
<script type="text/javascript">
   $('.plan-image-checkbox').click(function() {
    $(this).addClass('shadow bg-white').siblings().removeClass('shadow bg-white');
     $(this).find('td input:radio').prop('checked', true);
 });
</script>
<script>
	function myFunction(number_of_class){	
	var ids = number_of_class;		
	$('body').on('change',".plan2startTime-"+ids+"", function(){		
	
	var plan = $('.subida-zone input:radio:checked').attr("data-id");	
	if(plan!='' && plan!=undefined){		
		var from_date = $(this).val();
		var date = new Date(from_date);
		date.setDate(date.getDate() + (+plan));
		var dd = date.getDate();
		var mm = date.getMonth() + 1;
		var y = date.getFullYear();
		var someFormattedDate = y + '-' + mm + '-' + dd;
		$(".plan2endTime-"+ids+"").val(someFormattedDate);
	}else{
		alert('Please select escort plans');
		return false;
	}
	});
	}
	</script>
@endsection