@extends('front.layouts.agencia')

@section('content')
<form  method="post"   action="{{url('/agencia/zona-top-payment')}}" enctype="multipart/form-data">
@csrf
<section class="subida-zone">
  <div class="container">
  <!-- Category -->
		<?php $agency_category = agency_category(session('agency_id'));
		  $categoriesSaved = explode(',',$agency_category); 
		 if(count($categoriesSaved)>1){
		?>
	  
		<div class="row">		
			
			<div class="col-md-3 m-auto d-block">			
				<select name="category" class="custom-select">
				<?php
				foreach($categoriesSaved as $categorydata){?>	
				<option <?php if($category==strtolower($categorydata)){ echo 'selected';}?>  value="{{strtolower($categorydata)}}">{{ucwords($categorydata)}}</option>
				<?php }?>
				</select>
			</div>
		</div>		
		 <?php }?>
		 <!-- Category -->
    <div class="row">
      <div class="col-md-1 img-col paso-col">
    <h4>paso 1</h4>
  </div>
      <div class="col-md-11">
        <div class="subida-header">
          <h3><span class="subida-head-span">Clica en los anuncios que desea subir a la</span> <strong>zona TOP</strong></h3>
        </div>
      </div>
    </div><!-- row -->
	<div class="row img-row">
			<div class="col-md-11 offset-sm-1">
				<div class="row my-8">					
					<div class="col">						
						<div class="container-fluid">
							<div class="row row-cols-5">
								<?php foreach($profile_ads as $ads){?>
							<?php $check_top_subida_profile_lists = check_top_subida_profile_lists_top($ads->id);
							if($check_top_subida_profile_lists){?>
								<div class="col img-col">
								<label class="black-white-lab" title="">
								<img src="<?php if(!empty($ads->profile_pic)){  echo URL::asset('public/uploads/profile_ads/'.$ads->profile_pic); }?>" class="img-fluid black-white">
								<div class="black-white-text">
								<span class="blak-block">Start Date {{date('d/m/Y',strtotime($check_top_subida_profile_lists->from_date))}}</span>
								<span class="blak-block">Expiry Date {{date('d/m/Y',strtotime($check_top_subida_profile_lists->to_date))}}</span>
								</div> 
								<div class="bootm-card"><h6>{{$ads->first_name}}</h6></div>


								</label>

								</div>
							<?php }else{ ?>
							
								<div class="col img-col">
									<label class="image-checkbox <?php if(!empty($ads->id==$id)){ echo 'image-checkbox-checked';}?> " title="">
										<img src="<?php if(!empty($ads->profile_pic)){  echo URL::asset('public/uploads/profile_ads/'.$ads->profile_pic); }?>" class="img-fluid" />
										<div class="bootm-card"><h6>{{$ads->first_name}}</h6></div>
										<input  <?php if(!empty($ads->id==$id)){ echo 'checked';}?> type="checkbox" value="{{$ads->id}}" name="number_of_photo[]" />
									</label>  
								</div>
							<?php } ?>
							<?php }?>	
							</div>
							
						</div>
					</div>
				</div>
			</div>
		</div>	

<div class="row img-row card-row">
   <div class="col-md-1 img-col paso-col">
    <h4>paso 2</h4>
  </div>
  <div class="col-md-11">
    <div class="peso-text">
      <h5>Elija el número de semanas que quiera anunciarse.</h5>
    </div>
  </div>
  <div class="col-md-11 offset-sm-1">

    <div class="row">
  <div class="col-md-3 col-sm-6">
    <label class="card-text-lab">
          
    <div class="card-vale card-blue card-input">
      <h5 class="blue-recom">anuncio top</h5>
      <h5 class="dios"><span class="numberOfChecked"> 0</span></h5>
    </div>
  </label>
  </div>
  
  <div class="col-md-3 col-sm-6">
    <label class="card-text-lab">
         
    
    <div class="card-vale card-blue card-input">
      <h5 class="blue-recom">semanas</h5>
      <h5 class="dios"><span>
		  <select required name="package" id="package" class="custom-select">
			<option value="">Select Package</option>
			<option value="1 semana">1 semana</option>
			<option value="2 semanas">2 semanas</option>
			<option value="1 mes">1 mes</option>
			<option value="3 meses">3 meses</option>
		  </select>
		  </span></h5>
    </div>
  </label>
  </div>

<div class="col-md-3 col-sm-6">
  <label class="card-text-lab">
         
    <div class="card-vale card-blue card-input">
      <h5 class="blue-recom">Precio/Escort</h5>
      <h5 class="dios"><span> <span class="base_price">0</span> euro</span></h5>
    </div>
  </label>
  </div>
  
  <div class="col-md-3 col-sm-6">
   <label class="card-text-lab">
         
    <div class="card-vale card-blue card-pink card-input">
      <h5 class="blue-recom">total precio</h5>
      <h5 class="dios"><span> <span class="base_price_total">0</span> euro</span></h5>
    </div>
  </label>
  </div>


  </div>

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
      <input required type="checkbox" class="custom-control-input" id="customCheck" name="example1">
      <label class="custom-control-label" for="customCheck">Acepto los <strong class="strong-border">Términos y Condiciones.</strong></label>
    </div>
    </div>
    <div class="bottom-four submited-inpu">
      <input type="submit" class="btn btn-danger" onclick="check();" value="Pagar">
    </div>
    </div>
  </div>
  </div>
</section>
</form>
<script type="text/javascript" src="{{URL::asset('public/front/js/jquery.min.js')}}"></script>
<?php if(!empty($id)){?>
	<script type="text/javascript">
  jQuery(function ($) {
		var APP_URL = {!! json_encode(url('/')) !!};
		
        // sync the state to the input
		$(this).addClass('image-checkbox-checked');
		$(this).find('input[type="checkbox"]').first().attr("checked", "checked");
		var numberOfChecked = $('.image-checkbox input:checkbox:checked').length;
		$('.numberOfChecked').text(numberOfChecked);
		get_price();
		
		
		
	});
	
	

</script>

<?php }?>
<script type="text/javascript">
    jQuery(function ($) {
		var APP_URL = {!! json_encode(url('/')) !!};
		
        // sync the state to the input
        $(".image-checkbox").on("click", function (e) {
            if ($(this).hasClass('image-checkbox-checked')) {
                $(this).removeClass('image-checkbox-checked');
                $(this).find('input[type="checkbox"]').first().removeAttr("checked");
				 var numberOfChecked = $('.image-checkbox input:checkbox:checked').length;
				 $('.numberOfChecked').text(numberOfChecked);
				 get_price();
			}
            else {
                $(this).addClass('image-checkbox-checked');
                $(this).find('input[type="checkbox"]').first().attr("checked", "checked");
				var numberOfChecked = $('.image-checkbox input:checkbox:checked').length;
				$('.numberOfChecked').text(numberOfChecked);
				get_price();
			}
			
            e.preventDefault();
		});
		
		$("#package").on("click", function (e) {
			get_price();
            e.preventDefault();
		});
		
	});
	function get_price(){
	var APP_URL = {!! json_encode(url('/')) !!};
	var numberOfChecked = $('.image-checkbox input:checkbox:checked').length;
			var packageValue = $("#package").val();
			if(packageValue!=''){
			
			$.ajaxSetup({
			headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
			});
			$.ajax({
					url: APP_URL+'/ajax/top_escorts_agency_packages' ,
					type: "POST",
					data: {numberOfChecked:numberOfChecked,packageValue:packageValue},
					success: function( response ) {
						$('.base_price').html(response);
						$('.base_price_total').html(response);						
					},
				});
				}
		
	}

	function check(){
		var numberOfChecked = $('.image-checkbox input:checkbox:checked').length;
		if(numberOfChecked!=''){
			
		}else{
			alert('Please select escorts');
			return false;
		}
	}


</script>
<script type="text/javascript">
	jQuery(function ($) {
	$("select[name='category']").change(function(){
	var APP_URL = {!! json_encode(url('/')) !!};
	 var category = $(this).val();
	 window.location.href = APP_URL+'/agencia/zona-top/'+category;
	});
});
</script>
<?php /*
	  <div class="col img-col">
     <label class="black-white-lab" title="">
            <img src="{{URL::asset('public/front/images/model0001.jpg')}}" class="img-fluid black-white">
            <div class="black-white-text">
              <span class="blak-block">Start Date  12/15/2019</span>
               <span class="blak-block">Último        12/30/2019</span>
            </div> 
            <div class="bootm-card"><h6>mariya</h6></div>
           

        </label>

  </div>
 */?>

@endsection