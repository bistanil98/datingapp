@extends('front.layouts.agencia')

@section('content')
<?php if($ads!=null){?>
	<?php $check_top_subida_profile_lists_top = check_top_subida_profile_lists_top($ads->id);
							if($check_top_subida_profile_lists_top){?>
							<form  method="post"   action="{{url('/members/zona-top-payment')}}" enctype="multipart/form-data">
@csrf
<section class="subida-zone">
  <div class="container">
  
    <div class="row">
     
      <div class="col-md-10 col-lg-12 col-1 offset-md-1">
        <div class="subida-header">
          <h3><span class="subida-head-span">Tu anuncio ya esta activo en</span> <strong>zona TOP</strong></h3>
        </div>
      </div>
    </div><!-- row -->
	<div class="row img-row">
			<div class="col-md-11 offset-sm-1">
				<div class="row my-8">					
					<div class="col">						
						<div class="container-fluid">
							<div class="row row-cols-5">
							<?php if($ads!=null){?>
								
							<?php $check_top_subida_profile_lists = check_top_subida_profile_lists_top($ads->id);
							if($check_top_subida_profile_lists){?>
								<div class="col img-col">
								<label class="black-white-lab" title="">
								<img src="<?php if(!empty($ads->profile_pic)){  echo URL::asset('public/uploads/profile_ads/'.$ads->profile_pic); }?>" class="img-fluid black-white">
								<div  class="aut-subida-mark">
									Top Anuncio Activo
								<!-- <img src="{{URL::asset('public/front/images/top-icon-mark.png')}}" class="img-fluid" alt=""> -->
								</div>
								<div class="black-white-text black-trans">
								<h5><span class="blak-block">Fecha de inicio {{date('d-m-Y',strtotime($check_top_subida_profile_lists->from_date))}}</span></h5> 
								<?php /*<span class="blak-block">Expiry Date {{date('d-m-Y',strtotime($check_top_subida_profile_lists->to_date))}}</span>
								*/?>
							<?php if($check_top_subida_profile_lists->from_date>date('Y-m-d')){ ?>
							<h5><span style="color:red!important;" class="blak-block">Awaiting to Display</span></h5>            
							<?php }else{
							$from_date = \Carbon\Carbon::createFromFormat('Y-m-d', $check_top_subida_profile_lists->from_date);
							$to_date = \Carbon\Carbon::createFromFormat('Y-m-d', $check_top_subida_profile_lists->to_date);
							$start_expiry_days = $from_date->diffInDays($to_date);
							$start_date = \Carbon\Carbon::createFromFormat('Y-m-d', $check_top_subida_profile_lists->from_date);
							$current_date = \Carbon\Carbon::createFromFormat('Y-m-d', date('Y-m-d'));
							$mindays = $from_date->diffInDays($current_date);
							$totalleftdays = $start_expiry_days-$mindays;
							if($totalleftdays>0){
							?>

							<h5><span class="blak-block">Dias restantes: <?php echo $totalleftdays;?> dias</span></h5>    
							<?php } }?>
								</div> 
							<?php /*	<div class="bootm-card"><h6>{{$ads->first_name}}</h6></div>*/?>


								</label>
								

								</div>
								<div class="image-ditails">
									<label> Name :  {{$ads->first_name}}</label>
									<label >Location : <?php echo province($ads->province);?></label>
									<label >Population : <?php echo ($ads->population);?></label>
									<label >Telephone : <?php echo ($ads->telephone);?></label>
								</div>
							<?php }else{ ?>
							
								<div class="col img-col">
									<label class="image-checkbox image-checkbox-checked" title="">
										<img src="<?php if(!empty($ads->profile_pic)){  echo URL::asset('public/uploads/profile_ads/'.$ads->profile_pic); }?>" class="img-fluid" />
									<?php /*	<div class="bootm-card"><h6>{{$ads->first_name}}</h6></div>*/?>
										<input  <?php if(!empty($ads->id==$id)){ echo 'checked';}?> type="checkbox" value="{{$ads->id}}" name="number_of_photo[]" />
									<?php /*<div  class="aut-subida-mark">
										Auto Subida Activo
								<!-- <img src="{{URL::asset('public/front/images/aut-subida-mark.png')}}" class="img-fluid" alt=""> -->
								</div>*/?>
									</label> 
									<?php $check_top_subida_profile_lists_top = check_top_subida_profile_lists_sub($ads->id);
							if($check_top_subida_profile_lists_top){?>
									

								
							<?php }?>
								</div>
								<div class="image-ditails">
									<label> Nombre :  {{$ads->first_name}}</label>
									<label >Ubicación : <?php echo province($ads->province);?></label>
									<label >Población : <?php echo ($ads->population);?></label>
									<label >Teléfono : <?php echo ($ads->telephone);?></label>
								</div>
							<?php } ?>
								
							<?php }?>	
							</div>
							
						</div>
					</div>
				</div>
			</div>
		</div>	

 </div>
</section>
</form>

							<?php }else{?>
							<form  method="post"   action="{{url('/members/zona-top-payment')}}" enctype="multipart/form-data">
@csrf
<section class="subida-zone">
  <div class="container">
  
    <div class="row">
      <div class="col-md-2 col-lg-1 col-4 img-col paso-col">
    <h4>paso 1</h4>
  </div>
      <div class="col-md-10 col-lg-11 col-8">
        <div class="subida-header">
          <h3><span class="subida-head-span">Has seleccionado este anuncio para subir a </span> <strong>zona TOP</strong></h3>
        </div>
      </div>
    </div><!-- row -->
	<div class="row img-row">
			<div class="col-md-11 offset-sm-1">
				<div class="row my-8">					
					<div class="col">						
						<div class="container-fluid">
							<div class="row row-cols-5">
							<?php if($ads!=null){?>
								
							<?php $check_top_subida_profile_lists = check_top_subida_profile_lists_top($ads->id);
							if($check_top_subida_profile_lists){?>
								<div class="col img-col">
								<label class="black-white-lab" title="">
								<img src="<?php if(!empty($ads->profile_pic)){  echo URL::asset('public/uploads/profile_ads/'.$ads->profile_pic); }?>" class="img-fluid black-white">
								<div  class="aut-subida-mark">
									Top Anuncio Activo
								<!-- <img src="{{URL::asset('public/front/images/top-icon-mark.png')}}" class="img-fluid" alt=""> -->
								</div>
								<div class="black-white-text black-trans">
								<span class="blak-block">Start Date {{date('d-m-Y',strtotime($check_top_subida_profile_lists->from_date))}}</span>
								<?php /*<span class="blak-block">Expiry Date {{date('d-m-Y',strtotime($check_top_subida_profile_lists->to_date))}}</span>
								*/?>
							<?php if($check_top_subida_profile_lists->from_date>date('Y-m-d')){ ?>
							<h5><span style="color:red!important;" class="blak-block">Awaiting to Display</span></h5>            
							<?php }else{
							$from_date = \Carbon\Carbon::createFromFormat('Y-m-d', $check_top_subida_profile_lists->from_date);
							$to_date = \Carbon\Carbon::createFromFormat('Y-m-d', $check_top_subida_profile_lists->to_date);
							$start_expiry_days = $from_date->diffInDays($to_date);
							$start_date = \Carbon\Carbon::createFromFormat('Y-m-d', $check_top_subida_profile_lists->from_date);
							$current_date = \Carbon\Carbon::createFromFormat('Y-m-d', date('Y-m-d'));
							$mindays = $from_date->diffInDays($current_date);
							$totalleftdays = $start_expiry_days-$mindays;
							if($totalleftdays>0){
							?>

							<h5><span class="blak-block"><?php echo $totalleftdays;?> Days left</span></h5>    
							<?php } }?>
								</div> 
							<?php /*	<div class="bootm-card"><h6>{{$ads->first_name}}</h6></div>*/?>


								</label>
								

								</div>
								<div class="image-ditails">
									<label> Nombre :  {{$ads->first_name}}</label>
									<label >Ubicación : <?php echo province($ads->province);?></label>
									<label >Población : <?php echo ($ads->population);?></label>
									<label >Teléfono : <?php echo ($ads->telephone);?></label>
								</div>
							<?php }else{ ?>
							
								<div class="col img-col">
									<label class="image-checkbox image-checkbox-checked" title="">
										<img src="<?php if(!empty($ads->profile_pic)){  echo URL::asset('public/uploads/profile_ads/'.$ads->profile_pic); }?>" class="img-fluid" />
									<?php /*	<div class="bootm-card"><h6>{{$ads->first_name}}</h6></div>*/?>
										<input  <?php if(!empty($ads->id==$id)){ echo 'checked';}?> type="checkbox" value="{{$ads->id}}" name="number_of_photo[]" />
								
										<?php $check_top_subida_profile_lists_top = check_top_subida_profile_lists_sub($ads->id);
							if($check_top_subida_profile_lists_top){?>
										<?php /*<div  class="aut-subida-mark">
Auto Subida Activo
								</div>*/?>
							<?php }?>
								<!-- <img src="{{URL::asset('public/front/images/aut-subida-mark.png')}}" class="img-fluid" alt=""> -->
								
									</label> 
									
								</div>
								<div class="image-ditails">
									<label> Nombre :  {{$ads->first_name}}</label>
									<label >Ubicación : <?php echo province($ads->province);?></label>
									<label >Población : <?php echo ($ads->population);?></label>
									<label >Teléfono : <?php echo ($ads->telephone);?></label>
								</div>
							<?php } ?>
								
							<?php }?>	
							</div>
							
						</div>
					</div>
				</div>
			</div>
		</div>	

<div class="row  img-row card-row">
   <div class="col-md-2 col-lg-1 col-4 img-col paso-col">
    <h4>paso 2</h4>
  </div>
  <div class="col-md-10 col-lg-11 col-8">
    <div class="peso-text">
      <h5>Elija el número de semanas que quiera anunciarse.</h5>
    </div>
  </div>
  <div class="col-md-11 offset-sm-1">

    <div class="row">
  <div class="col-md-3 col-sm-6" style="display:none;">
    <label class="card-text-lab">
          
    <div class="card-vale card-blue card-input">
      <h5 class="blue-recom">anuncio top</h5>
      <h5 style="display:none;" class="dios"><span class="numberOfChecked"> 0</span></h5>
    </div>
  </label>
  </div>
  
  <div class="col-md-3 col-sm-6">
    <label class="card-text-lab">
         
    
    <div class="card-vale card-blue card-input">
      <h5 class="blue-recom">semanas</h5>
      <h5 class="dios"><span>
		  <select required name="package" id="package" class="custom-select">
			<option value="">Escoja paquete</option>
			<option value="1 semana">7 dias</option>
			<option value="2 semanas">15 dias</option>
			<option value="1 mes">30 dias</option>
			<!--<option value="3 meses">3 meses</option>-->
		  </select>
		  
			
			
		
		  </span></h5>
    </div>
  </label>
  </div>

<div class="col-md-3 col-sm-6" style="display:none;">
  <label class="card-text-lab">
         
    <div class="card-vale card-blue card-input">
      <h5 class="blue-recom">Precio/Escort</h5>
      <h5 class="dios"><span> <span class="base_price">0</span> <span class="euro">euro</span></span></h5>
    </div>
  </label>
  </div>
  
  <div class="col-md-3 col-sm-6">
   <label class="card-text-lab">
         
    <div class="card-vale card-blue card-pink card-input">
      <h5 class="blue-recom">total precio</h5>
      <h5 class="dios"><span> <span class="base_price_total">0</span> <span class="euro">euro</span></span></h5>
    </div>
  </label>
  </div>


  </div>

</div>
</div>
<div class="row img-row card-row">
 <div class="col-md-2 col-lg-1 col-4 img-col paso-col">
   <h4>paso 3</h4>
  </div>
  <div class="col-md-10 col-lg-11 col-8">
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
        <h6>Tarjeta de Credito o Debito</h6>
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
      <h5>Transferencia bancaria </h5>
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
  <input type="hidden" value="<?php echo province($ads->province);?>"  name="provinces" />
		  <input type="hidden" value="<?php echo ($ads->category);?>"  name="category" />
</form>

							<?php } ?>
<script type="text/javascript" src="{{URL::asset('public/front/js/jquery.min.js')}}"></script>

	<script type="text/javascript">
  jQuery(function ($) {
		var APP_URL = {!! json_encode(url('/')) !!};
		
        // sync the state to the input
		$(this).addClass('image-checkbox-checked');
		$('.image-checkbox-checked').find('input[type="checkbox"]').first().attr("checked", "checked");
		var numberOfChecked = $('.image-checkbox input:checkbox:checked').length;
		$('.numberOfChecked').text(numberOfChecked);
		get_price();
		
		
		
	});
	
	

</script>


<script type="text/javascript">
 
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
			var category =  '<?php echo ($ads->category);?>';
			
			var provinces =  '<?php echo province($ads->province);?>';
			$.ajax({
					url: APP_URL+'/ajax/top_escorts_individual_packages' ,
					type: "POST",
					data: {numberOfChecked:numberOfChecked,packageValue:packageValue,category:category,provinces:provinces},
					success: function( response ) {
						if(response>0){
						$('.euro').text('euros');
						}					
						$('.base_price').html(response);
						//$('#price').val(response);
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
$("#package").on("change", function (e) {
			get_price();
            e.preventDefault();
		});
</script>
<?php }else{?>
<section class="subida-zone">
	<div class="container">
			<div class="row">
			<div class="col-md-10 col-lg-11 col-8">
				<div class="subida-header text-center">
					<h3><strong>No hay anuncios</strong></h3>
				</div>
			</div>
		</div>
		</div>
		</section>
<?php }?>
<style>.image-ditails label {    width: 325px;}</style>
@endsection