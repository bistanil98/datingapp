@extends('front.layouts.agencia')

@section('content')
<?php if($subida!=null){?>
	
	
	<section class="member-view">
		<div class="container">
			<div class="row">
				<div class="col-md-4">
					<div class="member-main">
						<div class="left-img">
							<img src="<?php if(!empty($subida->profile_pic)){  echo URL::asset('public/uploads/profile_ads/'.$subida->profile_pic); }?>" class="img-fluid">
							<div class="overlay-text">
							<label>{{$subida->first_name}}</label>
							</div>	
						</div>
						

						




					</div>
				</div>
				<div class="col-md-5">
				<!-------Subida----->
				<?php  $check_top_subida_profile_lists = check_top_subida_profile_lists_sub($subida->id);?>	
				<?php if(check_free_profile_ads_type($subida->id,'subida')>0){?>
				<?php $top_subida_profile_lists_id = return_free_profile_ads_type($subida->id,'subida'); ?>
				<div class="col-md-12">
					<div class="main-textdiv">
						<h5>auto subida</h5>
						<div class="table-responsive auto-subida ">
							<table class="auto-table">
								<thead>
									<tr>
										<th>Fecha de inicio</th>
										<td>{{date('d-m-Y',strtotime($check_top_subida_profile_lists->from_date))}}</td>
									</tr>
									<tr>
										<th>Horario de subidas</th>
										<td>{{date('H:i',strtotime($check_top_subida_profile_lists->from_date_time))}} - {{date('H:i',strtotime($check_top_subida_profile_lists->to_date_time))}}</td>
									</tr>
									<tr>
										<th>Días Contratados</th>
										<td>{{$check_top_subida_profile_lists->seen_days}} dias</td>
										</tr>
									<tr>
										<th>Subidas diarias</th>
										<td>{{$check_top_subida_profile_lists->seen_daily}} </td>
									</tr>									
									<tr>
										<th>Dias restantes</th>
										<td>
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

											<h5 style="text-transform:none!important;"> <span style="color:#000;" class="blak-block"><?php echo $totalleftdays;?> dias</span></h5>    
											<?php } }?>
										</td>
									</tr>
								</thead>
							</table>
								<table class="auto-table bottom-tb">
									<thead>
										<tr>
											<th>
												<?php if($check_top_subida_profile_lists->from_date>date('Y-m-d')){ ?>
													<?php if($subida->user_status_subida==1){?>
														<h4><a href="javascript:void(0)"  class="icons-rt deactive-red disabled-btn auto-table bottom-tb"> Pausar Anuncio </a></h4>
														<?php }else{?>
														<h4><a href="javascript:void(0)"  class="icons-rt active-green disabled-btn auto-table bottom-tb"> Reactivar Anuncio </a> </h4>
													<?php }?>
													<?php }else{ ?>
													<?php if($subida->user_status_subida==1){?>
													<h4><a href="{{url('members/status/'.$subida->id.'/anuncios/'.$top_subida_profile_lists_id.'/subida')}}" onclick="return confirm('Are you sure want to change status this item?')" class="icons-rt deactive-red"> Pausar Anuncio </a></h4>
													<?php }else{?>
													<h4><a href="{{url('members/status/'.$subida->id.'/anuncios/'.$top_subida_profile_lists_id.'/subida')}}" onclick="return confirm('Are you sure want to change status this item?')" class="icons-rt active-green"> Reactivar Anuncio </a></h4>
													<?php } ?>
													
												<?php } ?>
											</th>
										</tr>
									</thead>
								</table>
							
						</div>
					</div>
				</div>
				
				<?php }else{?>
				
				<div class="col-md-12">
					<div class="main-textdiv">
						<h5>auto subida</h5>
						<div class="table-responsive auto-subida ">
							<table class="auto-table">
								<thead>
									<tr>
										<th>Fecha de inicio</th>
										<td></td>
									</tr>
									<tr>
										<th>Horario de subidas</th>
										<td></td>
									</tr>
									<tr>
										<th>Días Contratados</th>
										<td></td>
									</tr>
									<tr>
										<th>Subidas diarias</th>
										<td></td>
									</tr>
									<tr>
										<th>Dias restantes</th>
										<td></td>
									</tr>
								</thead>
							</table>

								<table class="auto-table bottom-tb">
									<thead>
										<tr>
											<th>
												 <a href="{{ url('/members/subida-zone') }}" >Contratar Auto Subida</a>
											</th>
										</tr>
									</thead>
								</table>
							
						</div>
					</div>
				</div>
				
				
				
				<?php } ?>
				<!-------END SUVIDAS----------->
				
				
				<!-------top anuncio----->
				<?php  $check_top_profile_lists = check_top_subida_profile_lists_top($subida->id);?>
				
				<?php if(check_free_profile_ads_type($subida->id,'top')>0){?>
				<?php $top_profile_lists_id = return_free_profile_ads_type($subida->id,'top'); ?>
				<div class="col-md-12">
					<div class="main-textdiv top-anuncotab">
						<h5 class="topa-h5">top anuncio</h5>
						<div class="table-responsive auto-subida blue">
							<table class="auto-table">
								<thead>
									<tr>
										<th>Fecha de inicio</th>
										<td>{{date('d-m-Y',strtotime($check_top_profile_lists->from_date))}}</td>
									</tr>
								
									<tr>
										<th>Dias contratados</th>
										<td>{{$check_top_profile_lists->seen_days}} dias</td>
									</tr>
									<tr>
										<th>Dias restantes</th>
										<td>
											<?php if($check_top_profile_lists->from_date>date('Y-m-d')){ ?>
											<h5><span style="color:red!important;" class="blak-block">Awaiting to Display</span></h5>            
											<?php }else{
											$from_date = \Carbon\Carbon::createFromFormat('Y-m-d', $check_top_profile_lists->from_date);
											$to_date = \Carbon\Carbon::createFromFormat('Y-m-d', $check_top_profile_lists->to_date);
											$start_expiry_days = $from_date->diffInDays($to_date);
											$start_date = \Carbon\Carbon::createFromFormat('Y-m-d', $check_top_profile_lists->from_date);
											$current_date = \Carbon\Carbon::createFromFormat('Y-m-d', date('Y-m-d'));
											$mindays = $from_date->diffInDays($current_date);
											$totalleftdays = $start_expiry_days-$mindays;
											if($totalleftdays>0){
											?>

											<h5 style="text-transform:none!important;"> <span style="color:#000;text-decoration:none;" class="blak-block"><?php echo $totalleftdays;?> dias</span></h5>    
											<?php } }?>
										</td>
									</tr>
								</thead>
								
							</table>
							<table class="auto-table bottom-tb">
									<thead>
										<tr>
											<th>
												<?php if($check_top_profile_lists->from_date>date('Y-m-d')){ ?>
													<?php if($subida->user_status==1){?>
														<h4><a href="javascript:void(0)"  class="icons-rt deactive-red disabled-btn auto-table bottom-tb"> Pausar Anuncio </a></h4>
														<?php }else{?>
														<h4><a href="javascript:void(0)"  class="icons-rt active-green disabled-btn auto-table bottom-tb"> Reactivar Anuncio </a> </h4>
													<?php }?>
													<?php }else{ ?>
													
													<?php if($subida->user_status==1){?>
													<h4><a href="{{url('members/status/'.$subida->id.'/anuncios/'.$top_profile_lists_id.'/top')}}" onclick="return confirm('Are you sure want to change status this item?')" class="icons-rt deactive-red"> Pausar Anuncio </a></h4>
													<?php }else{?>
													<h4><a href="{{url('members/status/'.$subida->id.'/anuncios/'.$top_profile_lists_id.'/top')}}" onclick="return confirm('Are you sure want to change status this item?')" class="icons-rt active-green"> Reactivar Anuncio </a></h4>
													
													<?php } ?>
													
												<?php } ?>
											</th>
										</tr>
									</thead>
								</table>
							
						</div>
					</div>
				</div>
				
				<?php }else{?>
					<div class="col-md-12">
					<div class="main-textdiv">
						<h5>top anuncio</h5>
						<div class="table-responsive auto-subida blue">
							<table class="auto-table">
								<thead>
									<tr>
										<th>Fecha de inicio</th>
										<td></td>
									</tr>
								
									<tr>
										<th>Dias contratados</th>
									<td></td>
									</tr>
									<tr>
										<th>Dias restantes</th>
										<td></td>
									</tr>
								</thead>
							</table>
														<table class="auto-table bottom-tb">
									<thead>
										<tr>
											<th>
												<p>
													<a href="{{ url('/members/zona-top') }}" >Contratar Top Anuncio</a>
												</p>
											</th>
										</tr>
									</thead>
								</table>
	
							
						</div>
					</div>
				</div>
				
			
				
				<?php } ?>
				<!-------END SUVIDAS----------->
				</div>
			</div>
		</div>
	</section>
	
	<?php }else{?>
	<section class="subida-zone">
		<div class="container">
			<div class="row">
				<div class="col-md-10 col-lg-11 col-8">
					<div class="subida-header text-center">
						<h3><strong>No hay anuncio</strong></h3>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php }?>
<style>
	.image-ditails label {    width: 325px;}
	section.member-view table.auto-table th, td {  text-transform: unset;}
	
	.member-anuncios i {
    font-size: 21px;
    vertical-align: middle;
    color: #28a745;
}

.member-anuncios, .member-anuncios:hover {
    background: #333;
    border: #333;
    padding: 3px 6px;
    font-size: 13px;
    font-weight: 600;    
    margin-bottom: 4px;
}

section.member-view table.auto-table span.blak-block {
    
    color: #000!important;
    
}
</style>
@endsection