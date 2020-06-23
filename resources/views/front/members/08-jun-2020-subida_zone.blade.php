@extends('front.layouts.agencia')

@section('content')
<?php if($ads!=null){?>
	<?php $check_top_subida_profile_lists_sub = check_top_subida_profile_lists_sub($ads->id);
							if($check_top_subida_profile_lists_sub){?>
							<form  method="post"   action="{{url('/members/subida-zone-payment')}}" enctype="multipart/form-data">
@csrf
<section class="subida-zone">
	<div class="container">
			
		 <!-- Category -->
		<div class="row">		
			
			<div class="col-md-10 col-lg-12 col-1 offset-md-1">
				<div class="subida-header">
					<h3><span class="subida-head-span">Tu anuncio ya esta activo en</span> <strong>zona Auto Subida</strong></h3>
				</div>
			</div>
		</div><!-- row -->
		<div class="row img-row">
			<div class="col-md-11 offset-sm-1">
				<div class="row my-8">					
					<div class="col">						
						<div class="container-fluid">
							<div class="row row-cols-5">
							
							<?php //foreach($profile_ads as $ads){?>
							
							<?php $check_top_subida_profile_lists = check_top_subida_profile_lists_sub($ads->id);
							if($check_top_subida_profile_lists){?>
							<div class="col img-col">
								<label class="black-white-lab" title="">
								
								<img src="<?php if(!empty($ads->profile_pic)){  echo URL::asset('public/uploads/profile_ads/'.$ads->profile_pic); }?>" class="img-fluid black-white">
									<div  class="aut-subida-mark">
										Auto subida Activo
									<!-- <img src="{{URL::asset('public/front/images/aut-subida-mark.png')}}" class="img-fluid" alt=""> -->
									
									</div> 
								<div class="black-white-text black-trans induvisal">
								<h5> <span class="blak-block">Fecha de inicio {{date('d-m-Y',strtotime($check_top_subida_profile_lists->from_date))}}</span></h5> 
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
				
				 <h5><span style="color:#fff" class="blak-block">Dias restantes: <?php echo $totalleftdays;?> dias</span></h5>    
			 <?php } }?>
								</div> 
								<?php /*<div class="bootm-card"><h6>{{$ads->first_name}}</h6></div>*/?>


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
									
									<label class="image-checkbox image-checkbox-checked " title="">
										<img src="<?php if(!empty($ads->profile_pic)){  echo URL::asset('public/uploads/profile_ads/'.$ads->profile_pic); }?>" class="img-fluid" />
										<?php $check_top_subida_profile_lists_top = check_top_subida_profile_lists_top($ads->id);
							if($check_top_subida_profile_lists_top){?>
									<?php /*	<div  class="aut-subida-mark">
									<!-- <img src="{{URL::asset('public/front/images/top-icon-mark.png')}}" class="img-fluid" alt=""> -->
									Top Anuncio Activo
									
									</div>*/?>
							<?php }?>
										<div class="agencyess-logo"></div>
										<div class="black-white-text black-trans">
								<span class="blak-block"></span>
															
							<h5><span class="blak-block"></span></h5>    
															</div>
										
										<input checked type="checkbox" value="{{$ads->id}}" name="number_of_photo[]" />
									</label> 
									
								</div>
								<div class="image-ditails">
								
									<label> Name :  {{$ads->first_name}}</label>
									<label >Location : <?php echo province($ads->province);?></label>
									<label >Population : <?php echo ($ads->population);?></label>
									<label >Telephone : <?php echo ($ads->telephone);?></label>
								</div>
							<?php } ?>
							
								
							<?php //}?>	
							
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
								<form  method="post"   action="{{url('/members/subida-zone-payment')}}" enctype="multipart/form-data">
@csrf
<section class="subida-zone">
	<div class="container">
			
		 <!-- Category -->
		<div class="row">		
			<div class="col-md-2 col-lg-1 col-4 img-col paso-col">
				<h4>paso 1</h4>
			</div>
			<div class="col-md-10 col-lg-11 col-8">
				<div class="subida-header">
					<h3><span class="subida-head-span">Clica en los anuncios que desea subir a la</span> <strong>zona Auto Subida</strong></h3>
				</div>
			</div>
		</div><!-- row -->
		<div class="row img-row">
			<div class="col-md-11 offset-sm-1">
				<div class="row my-8">					
					<div class="col">						
						<div class="container-fluid">
							<div class="row row-cols-5">
							
							<?php //foreach($profile_ads as $ads){?>
							
							<?php $check_top_subida_profile_lists = check_top_subida_profile_lists_sub($ads->id);
							if($check_top_subida_profile_lists){?>
							<div class="col img-col">
								<label class="black-white-lab" title="">
								
								<img src="<?php if(!empty($ads->profile_pic)){  echo URL::asset('public/uploads/profile_ads/'.$ads->profile_pic); }?>" class="img-fluid black-white">
									<div  class="aut-subida-mark">
										Auto subida Activo
									<!-- <img src="{{URL::asset('public/front/images/aut-subida-mark.png')}}" class="img-fluid" alt=""> -->
									
									</div> 
								<div class="black-white-text black-trans induvisal">
								<span class="blak-block">Start Date {{date('d-m-Y',strtotime($check_top_subida_profile_lists->from_date))}}</span>
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
				
				 <h5><span style="color:#fff" class="blak-block"><?php echo $totalleftdays;?> Days left</span></h5>    
			 <?php } }?>
								</div> 
								<?php /*<div class="bootm-card"><h6>{{$ads->first_name}}</h6></div>*/?>


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
									
									<label class="image-checkbox image-checkbox-checked " title="">
										<img src="<?php if(!empty($ads->profile_pic)){  echo URL::asset('public/uploads/profile_ads/'.$ads->profile_pic); }?>" class="img-fluid" />
										<?php $check_top_subida_profile_lists_top = check_top_subida_profile_lists_top($ads->id);
							if($check_top_subida_profile_lists_top){?>
										<?php /*<div  class="aut-subida-mark">
									<!-- <img src="{{URL::asset('public/front/images/top-icon-mark.png')}}" class="img-fluid" alt=""> -->
									Top Anuncio Activo
									
									</div>*/?>
							<?php }?>
										<?php /*<div class="agencyess-logo"></div>
										<div class="black-white-text black-trans">
								<span class="blak-block">Start Date 18-03-2020</span>
															
							<h5><span class="blak-block">11 Days left</span></h5>    
															</div>*/?>
										
										<input checked type="checkbox" value="{{$ads->id}}" name="number_of_photo[]" />
									</label> 
									
								</div>
								<div class="image-ditails">
								
									<label> Name :  {{$ads->first_name}}</label>
									<label >Location : <?php echo province($ads->province);?></label>
									<label >Population : <?php echo ($ads->population);?></label>
									<label >Telephone : <?php echo ($ads->telephone);?></label>
								</div>
							<?php } ?>
							
								
							<?php //}?>	
							
							</div>
							
						</div>
					</div>
				</div>
			</div>
		</div>
		
		
		<span class="filter">
		<div class="row img-row card-row">
			<div class="col-md-2 col-lg-1 col-4 img-col paso-col">
				<h4>paso 2</h4>
			</div>
			<div class="col-md-10 col-lg-11 col-8">
				<div class="peso-text">
					<h5>Escoge un plan de subidas.</h5>
				</div>
			</div>
			<div class="col-md-11 offset-md-1">
				<div class="table-div firt-table">
					<table id="myTable">
						<thead>
							<tr>
								<th class="my-radius-left"><h5>Anuncio</h5></th>
								<th><h5>Dias</h5></th>
								<th><h5>Subidas diarias
								</h5></th>
								<th class="my-radius-right"><h5>Precio</h5></th>
							</tr>
						</thead>
						<tbody>
							<tr>
								
								<td colspan="4">
									<h4><span class="td-span"> Please select escorts</span></h4>
								</td>
								
							</tr>    
						
							
						</tbody>
					</table>
				</div>
			</div> 
			
			
		</div>
		<div class="row img-row card-row">
			<div class="col-md-2 col-lg-1 col-4 img-col paso-col">
				<h4>paso 3</h4>
			</div>
			<div class="col-md-10 col-lg-11 col-8">
				<div class="peso-text">
					<h5> Configure la duracion de su plan de subidas</h5>
				</div>
			</div>
			<div class="col-md-11 offset-md-1">
				
					<div class="table-div subida">
						<table>
							<thead>
								<tr class="subida-tr">
									<th class="my-radius-left"></th>
									<th><h5>Primer día</h5></th>
									<th><h5>Último día</h5></th>
									<th><h5>Primera subida</h5></th>
									<th class="my-radius-right"><h5>Ultima Subida</h5></th>
								</tr>
							</thead>
							<tbody>
							<tr>
								
								<td colspan="5">
									<h4><span class="td-span"> Please select escorts</span></h4>
								</td>
								
							</tr> 
							</tbody>  
							
							
							
						</table>
					</div>
				
			</div> 
			
			
		</div>
		</span>
		<div class="row img-row card-row">
			<div class="col-md-2 col-lg-1 col-4 img-col paso-col">
				<h4>paso 4</h4>
			</div>
			<div class="col-md-10 col-lg-11 col-8">
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
					<input type="submit" name="" class="btn btn-danger" value="Pagar">
				</div>
			</div>
		</div>
		
	
		
		
	</div>
</section>
</form>

						
							<?php }?>

<script type="text/javascript" src="{{URL::asset('public/front/js/jquery.min.js')}}"></script>

	<script type="text/javascript">
    jQuery(function ($) {
		var APP_URL = {!! json_encode(url('/')) !!};
		$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
		});
        // sync the state to the input
			$(this).addClass('image-checkbox-checked');
			$('.image-checkbox-checked').find('input[type="checkbox"]').first().attr("checked", "checked");
			var numberOfChecked = $('.image-checkbox input:checkbox:checked').length;
			var numberOfCheckedAds = [];
			$('.image-checkbox input:checkbox:checked').each(function(i){
			numberOfCheckedAds[i] = $(this).val();
			});
			var category =  '<?php echo ($ads->category);?>';
			
			var provinces =  '<?php echo province($ads->province);?>';
			
			$.ajax({
				url: APP_URL+'/ajax/member_packages' ,
				type: "POST",
				data: {numberOfChecked:numberOfChecked,numberOfCheckedAds:numberOfCheckedAds,category:category,provinces:provinces},
				success: function( response ) {
				$('.filter').html(response);
			},
		});
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