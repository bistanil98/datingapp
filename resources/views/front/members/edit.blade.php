@extends('admin.layouts.frontlayout')
@section('content')

		<link rel="stylesheet" type="text/css" href="{{URL::asset('public/front/css/admin-style-lightpink2.css')}}">
		
		<link rel="stylesheet" href="{{URL::asset('public/front/css/dropify.css')}}">
		<link rel="stylesheet" href="{{URL::asset('public/front/css/main.css')}}">
	<!-- Page Heading -->
	@if (Session::has('message'))
	<span class="alert-id-m" id="sa-close" >{!! session('message') !!}</span>
	@endif 
	<?php  require app_path()."/constant/profile_values.php";?>
<!-- CONTAINER -->
				<div class="container content-area relative">

				   <!-- PAGE-HEADER -->
					<div class="page-header">
						<h4 class="page-title">Profile</h4>
						<ol class="breadcrumb">
							 <li class="breadcrumb-item"><a href="{{ url('/admin/home') }}">Home</a></li>
							 <li class="breadcrumb-item"><a href="{{ url('/admin/profile') }}">Profile</a></li>                                
								<li class="breadcrumb-item active">Add</li>
							
						</ol>
					</div>
					<!-- PAGE-HEADER END -->

					<!-- ROW-1 OPEN -->
					
						<div class="row">
					<div class="col-lg-12">
							<form  id="profile-ads"  method="post" action="{{url('/admin/profile/edit/')}}/{{$profile_ads->id}}" enctype="multipart/form-data">
							@csrf
								
							
								<div class="card-body">
			<section class="registration-sec">
			
				
						
							<div class="main-registration">
								<div class="row">
									<div class="col-md-6">
										<div class="left-registration">
											<div class="main-image-register">
												<div class="top-cover-img">
													<span class="cover-image">{{ __('registration.profile_photo')}}</span>
													<div class="img-top-icon">
														<img src="{{URL::asset('public/front/images/photo-camera.png')}}" class="img-fluid">
													</div>
													
													<input  data-allowed-formats="portrait" data-min-height="400" data-default-file="<?php if(!empty($profile_ads->profile_pic)){  echo URL::asset('public/uploads/profile_ads/'.$profile_ads->profile_pic); }?>" type="file" name="profile" accept='image/*'  data-allowed-file-extensions="png jpg jpeg"  class="dropify">
												</div>
												<span style="   color: #fff;   font-weight: 700;">Profile picture must have minimum height 400px of  Portrait Mode on mobile.</span>
												
											</div>
											
												<div class="tarifs-input common-left">
												<div class="row">	
													<div class="col-md-12">	
														<h4>Tarifas (€)</h4>
														<?php $edit_tariffs0 = get_tariffs_update($profile_ads->id,$nunber=0);?>
														<div class="row">
															<div class="col-md-7">
																<div class="form-group">
																	<input required value="@if(!empty($edit_tariffs0)) {{$edit_tariffs0['tariffs_description']}} @endif" name="tariffs_description[]" type="text" class="form-control" >
																</div>
															</div>
															<div class="col-md-5">
																<div class="form-group">
																	<input required value="@if(!empty($edit_tariffs0)) {{$edit_tariffs0['tariffs_euro_price']}} @endif" name="tariffs_euro_price[]" type="text" class="form-control" >
																</div>
																</div>
														</div>
													</div>
													
													<div class="col-md-12">	
													<?php $edit_tariffs1 = get_tariffs_update($profile_ads->id,$nunber=1);?>
														<div class="row">
															<div class="col-md-7">
																<div class="form-group">
																	<input value="@if(!empty($edit_tariffs1)) {{$edit_tariffs1['tariffs_description']}} @endif" name="tariffs_description[]" type="text" class="form-control" >
																</div>
															</div>
															<div class="col-md-5">
																<div class="form-group">
																	<input value="@if(!empty($edit_tariffs1)) {{$edit_tariffs1['tariffs_euro_price']}} @endif" name="tariffs_euro_price[]" type="text" class="form-control" >
																</div>
															</div>
														</div>
													</div>
												</div>
												<div class="row collapse" id="addmore">
													<div class="col-md-12">	
													<?php $edit_tariffs2 = get_tariffs_update($profile_ads->id,$nunber=2);?>
														<div class="row">
															<div class="col-md-7">
																<div class="form-group">
																	<input value="@if(!empty($edit_tariffs2)) {{$edit_tariffs2['tariffs_description']}} @endif" name="tariffs_description[]" type="text" class="form-control" >
																</div>
															</div>
															<div class="col-md-5">
																<div class="form-group">
																	<input value="@if(!empty($edit_tariffs2)) {{$edit_tariffs2['tariffs_euro_price']}} @endif" name="tariffs_euro_price[]" type="text" class="form-control" >
																</div>
															</div>
														</div>
													</div>
													<div class="col-md-12">	
													<?php $edit_tariffs3 = get_tariffs_update($profile_ads->id,$nunber=3);?>
														<div class="row">
															<div class="col-md-7">
																<div class="form-group">
																	<input value="@if(!empty($edit_tariffs3)) {{$edit_tariffs3['tariffs_description']}} @endif" name="tariffs_description[]" type="text" class="form-control" >
																</div>
															</div>
															<div class="col-md-5">
																<div class="form-group">
																	<input value="@if(!empty($edit_tariffs3)) {{$edit_tariffs3['tariffs_euro_price']}} @endif" name="tariffs_euro_price[]" type="text" class="form-control" >
																</div>
															</div>
														</div>
													</div>
													<div class="col-md-12">	
													<?php $edit_tariffs4 = get_tariffs_update($profile_ads->id,$nunber=4);?>
														<div class="row">
															<div class="col-md-7">
																<div class="form-group">
																	<input value="@if(!empty($edit_tariffs4)) {{$edit_tariffs4['tariffs_description']}} @endif" name="tariffs_description[]" type="text" class="form-control" >
																</div>
															</div>
															<div class="col-md-5">
																<div class="form-group">
																	<input value="@if(!empty($edit_tariffs4)) {{$edit_tariffs4['tariffs_euro_price']}} @endif" name="tariffs_euro_price[]" type="text" class="form-control" >
																</div>
															</div>
														</div>
													</div>
												</div>
												
												<div class="row">
													<div class="col-md-12">	
														<div class="add-more-div">
															<a href="#" class="btn btn-primary" id="read-more" data-toggle="collapse" data-target="#addmore">Ver mas</a>	
														</div>	
													</div>
																										
												</div><!--  tarifs-input-row -->
											</div> <!--  tarifs-input-close -->
											
											<div class="Horario-input common-right">
												<h4>Horario</h4>	
												<?php if($profile_ads->schedule_status=='yes'){?>
												<?php $get_schedule_update0 = get_schedule_update($profile_ads->id,$nunber=0);?>
												<div class="row" id="schedule">
													<div class="col-md-6">														
														<div class="row select-row">
															<div class="col-md-4 select-column label-column">
															<input type="hidden"  name="full_days[]" value="full">
															<label for="">Desde las</label></div>
															<div class="col-md-4 select-column">
																<select name="full_from_1[]" class="custom-select mb-3">
																	<option></option>
																	<?php foreach($schedule_from_1 as $data){ ?>
																		<option <?php if(!empty($get_schedule_update0 && $get_schedule_update0['from_1']==$data)){ echo 'selected';}?> value="{{$data}}">{{$data}}</option>
																	<?php } ?>
																</select>
															</div>
															<div class="col-md-4 select-column">
																<select name="full_from_2[]" class="custom-select mb-3">
																	<option></option>
																	<?php foreach($schedule_from_2 as $data){ ?>
																		<option <?php if(!empty($get_schedule_update0 && $get_schedule_update0['from_2']==$data)){ echo 'selected';}?> value="{{$data}}">{{$data}}</option>
																	<?php } ?>
																</select>
															</div>
														</div>  
													</div>
													
													<div class="col-md-6">
														
														<div class="row select-row">
															<div class="col-md-4 select-column label-column">
															<label for="">Hasta las</label></div>
															<div class="col-md-4 select-column">
																<select name="full_unit_1[]" class="custom-select mb-3">
																	<option></option>
																	<?php foreach($schedule_from_1 as $data){ ?>
																		<option <?php if(!empty($get_schedule_update0 && $get_schedule_update0['unit_1']==$data)){ echo 'selected';}?> value="{{$data}}">{{$data}}</option>
																	<?php } ?>
																</select>
															</div>
															<div class="col-md-4 select-column">
																<select name="full_unit_2[]" class="custom-select mb-3">
																	<option></option>
																	<?php foreach($schedule_from_2 as $data){ ?>
																		<option <?php if(!empty($get_schedule_update0 && $get_schedule_update0['unit_2']==$data)){ echo 'selected';}?> value="{{$data}}">{{$data}}</option>
																	<?php } ?>
																</select>
															</div>
														</div>  
													</div>
												</div>
												<?php }else{?>
												<div class="row" id="schedule" style="<?php if($profile_ads->schedule_status=='no'){ echo 'display:none'; }?>">
													<div class="col-md-6">														
														<div class="row select-row">
															<div class="col-md-4 select-column label-column">
															<input type="hidden"  name="full_days[]" value="full">
															<label for="">Desde las</label></div>
															<div class="col-md-4 select-column">
																<select name="full_from_1[]" class="custom-select mb-3">
																	<option></option>
																	<?php foreach($schedule_from_1 as $data){ ?>
																		<option  value="{{$data}}">{{$data}}</option>
																	<?php } ?>
																</select>
															</div>
															<div class="col-md-4 select-column">
																<select name="full_from_2[]" class="custom-select mb-3">
																	<option></option>
																	<?php foreach($schedule_from_2 as $data){ ?>
																		<option value="{{$data}}">{{$data}}</option>
																	<?php } ?>
																</select>
															</div>
														</div>  
													</div>
													
													<div class="col-md-6">
														
														<div class="row select-row">
															<div class="col-md-4 select-column label-column">
															<label for="">Hasta las</label></div>
															<div class="col-md-4 select-column">
																<select name="full_unit_1[]" class="custom-select mb-3">
																	<option></option>
																	<?php foreach($schedule_from_1 as $data){ ?>
																		<option value="{{$data}}">{{$data}}</option>
																	<?php } ?>
																</select>
															</div>
															<div class="col-md-4 select-column">
																<select name="full_unit_2[]" class="custom-select mb-3">
																	<option></option>
																	<?php foreach($schedule_from_2 as $data){ ?>
																		<option value="{{$data}}">{{$data}}</option>
																	<?php } ?>
																</select>
															</div>
														</div>  
													</div>
												</div>
												<?php } ?>
												
												<?php if($profile_ads->schedule_status=='no'){?>
													<div style="<?php if($profile_ads->schedule_status=='no'){ echo 'display:block'; }?>" class="hidess" id="lunes">
													<?php $i = 0;foreach($days as $data){ ?>
														<?php //$edit_schedule = edit_schedule($profile_ads->id,$data);?>
														<?php $get_schedule_update0 = get_schedule_update($profile_ads->id,$i);?>
												<div class="row">
													<div class="col-md-12 col-lg-8 col-sm-12">
														
														<div class="row select-row">
															<div class="col-md-12 col-lg-4 col-6  col-sm-12 select-column label-column">
																<input <?php if(!empty($get_schedule_update0 && $get_schedule_update0['days']==$data)){ echo 'checked';}?> type="checkbox" value="{{$data}}" id="defaultCheck" name="days[]" style="vertical-align: middle;">
																<label class="" for="customCheck">{{$data}}</label></div>
															<div class="col-md-4 col-lg-3 col-6 col-sm-4 select-column label-column label-column2">
															<label for="customCheck">Desde las </label></div>
															<div class="col-md-4 col-lg-2 col-6 col-sm-4 select-column2">
																<select name="from_1[]" class="custom-select cus-select mb-3">
																		<option></option>
																		<?php foreach($schedule_from_1 as $data){ ?>
																			<option <?php if(!empty($get_schedule_update0 && $get_schedule_update0['from_1']==$data)){ echo 'selected';}?> value="{{$data}}">{{$data}}</option>
																		<?php } ?>
																	</select>
															</div>
															<div class="col-md-4 col-lg-2 col-6 col-sm-4 select-column2">
																<select name="from_2[]" class="custom-select cus-select mb-3">
																		<option></option>
																		<?php foreach($schedule_from_2 as $data){ ?>
																			<option <?php if(!empty($get_schedule_update0 && $get_schedule_update0['from_2']==$data)){ echo 'selected';}?> value="{{$data}}">{{$data}}</option>
																		<?php } ?>
																	</select>
															</div>
														</div>  
													</div>
													
													<div class="col-md-12 col-lg-4 col-sm-12">
														
														<div class="row select-row">
															<div class="col-md-4 col-lg-3 col-sm-4 select-column label-column">
															<label for="">Until</label></div>
															<div class="col-md-4 col-lg-4 col-6 col-sm-4 select-column2">
																<select name="unit_1[]" class="custom-select cus-select mb-3">
																		<option></option>
																		<?php foreach($schedule_from_1 as $data){ ?>
																			<option <?php if(!empty($get_schedule_update0 && $get_schedule_update0['unit_1']==$data)){ echo 'selected';}?> value="{{$data}}">{{$data}}</option>
																		<?php } ?>
																	</select>
															</div>
															<div class="col-md-4 col-lg-4 col-6 col-sm-4 select-column2">
																<select name="unit_2[]" class="custom-select cus-select mb-3">
																		<option></option>
																		<?php foreach($schedule_from_2 as $data){ ?>
																			<option <?php if(!empty($get_schedule_update0 && $get_schedule_update0['unit_2']==$data)){ echo 'selected';}?> value="{{$data}}">{{$data}}</option>
																		<?php } ?>
																	</select>
															</div>
														</div>  
													</div>
												</div>
												<?php $i++; } ?>
												</div>
												<?php }else{?>
												<div class="hidess" id="lunes">
												<?php foreach($days as $data){ ?>														
												<div class="row">
													<div class="col-md-12 col-lg-8 col-sm-12">
														
														<div class="row select-row">
															<div class="col-md-12 col-lg-4 col-6  col-sm-12 select-column label-column">
																<input type="checkbox" value="{{$data}}" id="defaultCheck" name="days[]" style="vertical-align: middle;">
																<label class="" for="customCheck">{{$data}}</label></div>
															<div class="col-md-4 col-lg-3 col-6 col-sm-4 select-column label-column label-column2">
															<label for="customCheck">Desde las </label></div>
															<div class="col-md-4 col-lg-2 col-6 col-sm-4 select-column2">
																<select name="from_1[]" class="custom-select cus-select mb-3">
																		<option></option>
																		<?php foreach($schedule_from_1 as $data){ ?>
																			<option value="{{$data}}">{{$data}}</option>
																		<?php } ?>
																	</select>
															</div>
															<div class="col-md-4 col-lg-2 col-6 col-sm-4 select-column2">
																<select name="from_2[]" class="custom-select cus-select mb-3">
																		<option></option>
																		<?php foreach($schedule_from_2 as $data){ ?>
																			<option value="{{$data}}">{{$data}}</option>
																		<?php } ?>
																	</select>
															</div>
														</div>  
													</div>
													
													<div class="col-md-12 col-lg-4 col-sm-12">
														
														<div class="row select-row">
															<div class="col-md-4 col-lg-3 col-sm-4 select-column label-column">
															<label for="">Hasta las</label></div>
															<div class="col-md-4 col-lg-4 col-6 col-sm-4 select-column2">
																<select name="unit_1[]" class="custom-select cus-select mb-3">
																		<option></option>
																		<?php foreach($schedule_from_1 as $data){ ?>
																			<option value="{{$data}}">{{$data}}</option>
																		<?php } ?>
																	</select>
															</div>
															<div class="col-md-4 col-lg-4 col-6 col-sm-4 select-column2">
																<select name="unit_2[]" class="custom-select cus-select mb-3">
																		<option></option>
																		<?php foreach($schedule_from_2 as $data){ ?>
																			<option value="{{$data}}">{{$data}}</option>
																		<?php } ?>
																	</select>
															</div>
														</div>  
													</div>
												</div>
												<?php } ?>
												</div>
												<?php } ?>
												
												<div class="row horario-checkbox">
													
													<div class="custom-control custom-radio custom-control-inline eddit-radios">
														<label for="">¿Mismo horario todos los días?</label>
													</div>
													<div class="custom-control custom-radio custom-control-inline si-radios">
														<input type="radio" class="custom-control-input" id="customRadio"  name="schedule_status" value="yes"  <?php if($profile_ads->schedule_status=='yes'){ echo 'checked';}?>>
														<label class="custom-control-label" for="customRadio">Si</label>
													</div>
													<div class="custom-control custom-radio custom-control-inline">
														<input type="radio" class="custom-control-input" id="customRadio2"  name="schedule_status" value="no"  <?php if($profile_ads->schedule_status=='no'){ echo 'checked';}?>>
														<label class="custom-control-label" for="customRadio2">No</label>
													</div>
													
												</div> <!-- horario-checkbox-row -->
												
											</div>
									
										</div> <!-- left-registration -->
									</div><!--  col-md-6-left-close -->
									
									
									<div class="col-md-6 rigt-main-column">
										<div class="right-registration">
											<div class="profile-register-div common-right">
												<h4 class="telephone">
													Categoria
												</h4>
												<div class="row">
													<div class="form-group col-md-4">
														<select  name="category" class="custom-select">
														<option  value="{{strtolower($profile_ads->category)}}">{{ucfirst($profile_ads->category)}}</option>
														<?php /* foreach($categories as $data){?>
															<option <?php if($data->name==$profile_ads->category){ echo 'selected'; }?> value="{{strtolower($data->name)}}">{{$data->name}}</option>
															<?php } */?>
														</select>
													</div>
												</div>
												<h4 class="telephone">
													Nombre
												</h4>
												<form>
													<div class="row">
														<div class="form-group col-md-12">
															<input value="{{$profile_ads->first_name}}" type="text" name="first_name" required class="form-control" placeholder="Nombre">
														</div>
													</div>
												</form>
											</div>
											<div class="profile-register-div common-right">
												<div class="tekephone-tooptip">	
													<h4 class="telephone">
														Telefono
													</h4>
													<a href="#" data-toggle="tooltip" data-placement="top" title="Lotem Ipsum Lotem Ipsum Lotem Ipsum Lotem Ipsum">
													?
												</a>
												</div>
												
													<div class="row">
														<div class="form-group col-md-6">
															<input value="{{$profile_ads->telephone}}" type="text" name="telephone" class="form-control"  placeholder="Telefono" required onkeypress="return isNumberKey(event)">
														</div>
														<div class="form-group verify-button col-md-6 ">
															<button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal-verify">Verificar</button>
														</div>
													
												</div>   
											</div>  <!-- profile-div-close -->  
											
											<div class="profile-register-div detos-heading common-right">
												<h4>Selecciona la zona donde quieres publicar tu anuncio</h4>
												
												<div class="row">
													
													
													<div class="col-md-6 justifty-profile">
														<div class="row">
															<div class="col-md-5 left-justify"><label for="Edad">Provincia</label></div>
															<div class="col-md-7 left-justify">
															<select name="province" class="custom-select" id="province" required>
																<option value="">Escoja una Provincia</option>
																<optgroup label="———————————"></optgroup>
																<?php foreach($province as $data){?>
																	<option <?php if($data->id==$profile_ads->province){ echo 'selected'; }?> value="{{$data->id}}">{{$data->name}}</option>
																<?php }?>
															</select>
															</div>
															
														</div>
													</div>
													
													<div class="col-md-6 justifty-profile">
														<div class="row">
															<div class="col-md-5 left-justify"><label for="Edad">Poblacion</label></div>
															<div class="col-md-7 left-justify">
															<select name="population" class="custom-select" id="population" required>
																<option value="">Escoja una Poblacion</option>
																<?php foreach($population as $data){?>
																	<option <?php if($data->name==$profile_ads->population){ echo 'selected'; }?> value="{{$data->name}}">{{$data->name}}</option>
																<?php }?>
															</select>
															</div>
															
														</div>
													</div>
													
													<div class="col-md-6 justifty-profile">
														<div class="row">
															<div class="col-md-5 left-justify"><label for="Edad">Zona   <span class="zona-span">(Opcional)</span></label></div>
															<div class="col-md-7 left-justify">
																<div class="form-group">
																	<input value="{{$profile_ads->zone}}" type="text" name="zone" value="" class="form-control" placeholder="Escoja una Zona">
																</div>															
															</div>
														
													</div>
												</div>
												
											</div>  <!-- justify-row -->
											
											
										</div>
										
										
										
										
										
										<div class="profile-register-div common-right">
											
											<div class="row">
												
												<div class="col-md-6 justifty-profile">
													<div class="row">
														<div class="col-md-5 left-justify"><label for="Edad">Nacionalidad</label></div>
														<div class="col-md-7 left-justify">
														<select name="nationality" class="custom-select" required>
															<option value="">Nacionalidad</option>
															<?php foreach($countries as $data){?>
																	<option <?php if($data->nationality==$profile_ads->nationality){ echo 'selected'; }?> value="{{$data->nationality}}">{{$data->nationality}}</option>
																<?php }?>
														</select>
														</div>
														
													</div>
												</div>
												
												
												<div class="col-md-6 justifty-profile">
													<div class="row">
														<div class="col-md-5 left-justify"><label for="Edad">Edad </label></div>
														<div class="col-md-7 left-justify">
														<select name="age" class="custom-select" required>
															<option value="">Edad</option>
															<?php for($foot=18;$foot<=60;$foot++){		?>													
																<option <?php if($foot==$profile_ads->age){ echo 'selected'; }?> value='{{$foot}}'> {{$foot}} a&ntilde;os </option>																									
														<?php 	}
															?>	
														</select>
														</div>
														
													</div>
												</div>
												
												<div class="col-md-6 justifty-profile">
													<div class="row">
														<div class="col-md-5 left-justify"><label for="Edad">Altura </label></div>
														<div class="col-md-7 left-justify">
														<select name="height" class="custom-select" required>
															<option value="">Altura</option>
															<?php for($height=90;$height<=250;$height++){?>
															<option <?php if($height.' cm'==$profile_ads->height){ echo 'selected'; }?> value='{{$height}} cm'>{{$height}} cm</option>
															<?php } ?>
														</select>
														</div>
														
													</div>
												</div>
												
												<?php /*<div class="col-md-6 justifty-profile">
													<div class="row">
														<div class="col-md-5 left-justify"><label for="Edad">Weight</label></div>
														<div class="col-md-7 left-justify">
														<select name="weight" class="custom-select" required>
															<option value="">Select Weight</option>															
															<?php
															for($foot=40;$foot<=150;$foot++){		?>													
																<option <?php if($foot==$profile_ads->weight){ echo 'selected'; }?> value='{{$foot}} KG'> {{$foot}} KG </option>																									
														<?php 	}
															?>		
														</select>
														</div>
														
													</div>
												</div>*/?>
												
												<div class="col-md-6 justifty-profile">
												<div class="row">
														<div class="col-md-5 left-justify"><label for="Edad">Color de ojos </label></div>
														<div class="col-md-7 left-justify">
														<select name="eyes" class="custom-select" required>
															<option value="">Color Ojos</option>
															<?php foreach($eye_types as $data){ ?>
															<option <?php if($data==$profile_ads->eyes){ echo 'selected'; }?> value="{{$data}}">{{$data}}</option>
															<?php }?>
														</select>
														</div>
														
													</div>
												</div>
												
												<div class="col-md-6 justifty-profile">
													<div class="row">
														<div class="col-md-5 left-justify"><label for="Edad">Color de pelo</label></div>
														<div class="col-md-7 left-justify">
														<select name="hair" class="custom-select" required>
															<option value="">Color Pelo</option>
															<?php foreach($hair_types as $data){ ?>
															<option <?php if($data==$profile_ads->hair){ echo 'selected'; }?> value="{{$data}}">{{$data}}</option>
															<?php }?>
														</select>
														</div>
														
													</div>
												</div>
												
												<div class="col-md-6 justifty-profile chapeors_select_action">													
													<?php if($profile_ads->category=='chaperos'){?>
												<?php }else{?>
												 <div class="row">
														<div class="col-md-5 left-justify"><label for="Edad">Talla Pecho </label></div>
														<div class="col-md-7 left-justify">
														<select name="chest" class="custom-select" required>
															<option value="">Escoja Talla</option>
															<?php foreach($chest as $chestdata){ ?>
															<option <?php if($chestdata==$profile_ads->chest){ echo 'selected'; }?> value="{{$chestdata}}">{{$chestdata}}</option>
															<?php } ?>														
														</select>
														</div>
														
													</div>
												<?php } ?>
												</div>
												
											</div>  <!-- justify-row -->
											
											<div class="contact-register"> <!-- contact-register --> 
												<div class="row">
												
													<div class="col-md-12 yesno-radio">
														<div class="boxed">
															<div class="form-group yes-no">
																<label for="whatsapp" class="whatsapp"><i class="fa fa-whatsapp"></i>Puedes contáctarme por Whatapp?</label>
																<div class="yesnoss">
																	<input <?php if('Yes'==$profile_ads->contact_me_by_whatsApp){ echo 'checked'; }?> type="radio" id="android" name="contact_me_by_whatsApp" value="Yes">
																	<label for="android" class="yes-label">SI</label>																	
																	<input <?php if('No'==$profile_ads->contact_me_by_whatsApp){ echo 'checked'; }?> type="radio" id="ios" name="contact_me_by_whatsApp" value="No">
																	<label for="ios" class="yes-label no">No</label>
																</div>
															</div>
															
															
															
														</div>
													</div>
												</div> <!-- contact-register-row -->
											</div>
											
										</div>
										
																				
										<div class="description-regis detos-heading common-right">
											<div class="form-group short-from">
												<label for="comment" class="short-label"><h4>Añadir Titulo
													</h4> <a href="#" data-toggle="tooltip" data-placement="top" title="Este texto saldrá en el pie de la foto publicada en la página principal de Escort Listing">
													?
												</a></label>
												<input class="form-control short-text" rows="1" name="title" required="" value="{{$profile_ads->title}}" />
											</div>
											
											
											
											<div class="form-group">
												<label for="comment"><h4>Descripcion</h4></label>
												<textarea required name="text" class="form-control" rows="3" >{{$profile_ads->text}}</textarea>
												<span id="spnCharLeft"></span><span style="color:red">(500 caracteres max)</span>
											</div> 
										</div>
										
									</div> <!-- right-registration-close -->
								</div> <!-- col-md-6-close2 -->
								
								
								<!----------------------PHOTOS---------->
								<div class="col-md-12" id="photoss">
									<div class="main-uploding-div common-div">
										<div class="photos-div">
											<h4>Fotos</h4>
											<p class="photo-p1"><strong>En Escort </strong> Listing requerimos que el contenido de todos nuestros anuncios sean real. Eliminaremos todos aquellos que contienen fotos falsas sin esperar a recibir una denuncia.</p>
											<p class="photo-p2">
												<strong>No</strong> estan <strong>permitidas:</strong>fotos falsas, fotos con marcas de agua, fotos con marcos o foto collage.
											</p>
											
											<div class="row">
												<div class="col-md-3 imgUp">
													<input data-default-file="<?php if(!empty($profile_ads->gallery_1)){  echo URL::asset('public/uploads/profile_ads/'.$profile_ads->gallery_1); }?>"   type="file" name="pic1" accept='image/*'  data-allowed-file-extensions="png jpg jpeg"  class="dropify">
												</div>
												
												<div class="col-md-3 imgUp">
													<input data-default-file="<?php if(!empty($profile_ads->gallery_2)){  echo URL::asset('public/uploads/profile_ads/'.$profile_ads->gallery_2); }?>" type="file" name="pic2" accept='image/*'  data-allowed-file-extensions="png jpg jpeg"  class="dropify">
												</div>
												<div class="col-md-3 imgUp">
													<input data-default-file="<?php if(!empty($profile_ads->gallery_3)){  echo URL::asset('public/uploads/profile_ads/'.$profile_ads->gallery_3); }?>"type="file" name="pic3" accept='image/*'  data-allowed-file-extensions="png jpg jpeg"  class="dropify">
												</div>
												
												<div class="col-md-3 imgUp">
													<input data-default-file="<?php if(!empty($profile_ads->gallery_4)){  echo URL::asset('public/uploads/profile_ads/'.$profile_ads->gallery_4); }?>" type="file" name="pic4" accept='image/*'  data-allowed-file-extensions="png jpg jpeg"  class="dropify">
												</div>
											</div>
											<div class="row " >
												<div class="collapse col-md-12" id="phtosss">
													<div class="row">
														<div class="col-md-3 imgUp">
															<input data-default-file="<?php if(!empty($profile_ads->gallery_5)){  echo URL::asset('public/uploads/profile_ads/'.$profile_ads->gallery_5); }?>" type="file" name="pic5" accept='image/*'  data-allowed-file-extensions="png jpg jpeg"  class="dropify">
														</div>
														<div class="col-md-3 imgUp">
															<input data-default-file="<?php if(!empty($profile_ads->gallery_6)){  echo URL::asset('public/uploads/profile_ads/'.$profile_ads->gallery_6); }?>" type="file" name="pic6" accept='image/*'  data-allowed-file-extensions="png jpg jpeg"  class="dropify">
														</div>
														<div class="col-md-3 imgUp">
															<input data-default-file="<?php if(!empty($profile_ads->gallery_7)){  echo URL::asset('public/uploads/profile_ads/'.$profile_ads->gallery_7); }?>" type="file" name="pic7" accept='image/*'  data-allowed-file-extensions="png jpg jpeg"  class="dropify">
														</div>
														<div class="col-md-3 imgUp">
															<input data-default-file="<?php if(!empty($profile_ads->gallery_8)){  echo URL::asset('public/uploads/profile_ads/'.$profile_ads->gallery_8); }?>" type="file" name="pic8" accept='image/*'  data-allowed-file-extensions="png jpg jpeg"  class="dropify">
														</div></div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-12">
													<div class="photo-check">
														<a href="#" class="btn btn-primary" data-toggle="collapse" data-target="#phtosss">Añadir fotos</a>
													</div>
												</div>
											</div>
											<!---------------- Selfie------------------>	
											
											<div class="row">
												<div class="col-md-12">
													<div class="selfie-photos">	
														<h4>Fotos Selfie</h4>													
													</div>
												</div>
												
												<div class="col-md-3 imgUp">
													<input data-default-file="<?php if(!empty($profile_ads->selfie_1)){  echo URL::asset('public/uploads/profile_ads/'.$profile_ads->selfie_1); }?>" type="file" name="selfie1" accept='image/*'  data-allowed-file-extensions="png jpg jpeg"  class="dropify">
												</div>
												
												<div class="col-md-3 imgUp">
													<input data-default-file="<?php if(!empty($profile_ads->selfie_2)){  echo URL::asset('public/uploads/profile_ads/'.$profile_ads->selfie_2); }?>" type="file" name="selfie2" accept='image/*'  data-allowed-file-extensions="png jpg jpeg"  class="dropify">
												</div>
												<div class="col-md-3 imgUp">
													<input data-default-file="<?php if(!empty($profile_ads->selfie_3)){  echo URL::asset('public/uploads/profile_ads/'.$profile_ads->selfie_3); }?>" type="file" name="selfie3" accept='image/*'  data-allowed-file-extensions="png jpg jpeg"  class="dropify">
												</div>
												
												<div class="col-md-3 imgUp">
													<input data-default-file="<?php if(!empty($profile_ads->selfie_4)){  echo URL::asset('public/uploads/profile_ads/'.$profile_ads->selfie_4); }?>" type="file" name="selfie4"  accept='image/*'  data-allowed-file-extensions="png jpg jpeg"  class="dropify">
												</div>
											</div>
											
											
											
											
										</div> <!-- photos-div -->  
									</div> <!-- main-uploding-div -->
									<!---------------- VIDEO------------------>
									<div class="main-uploding-div common-div" id="videoss">
										<div class="photos-div">
											<h4>Vídeos</h4>
											<p class="photo-p2"><strong> No estan permitidos :</strong>videos con marcas de agua</p>
											
											<div class="row">
												<div class="col-md-3 imgUp video">
													<input data-default-file="<?php if(!empty($profile_ads->video_1)){  echo URL::asset('public/uploads/profile_ads/'.$profile_ads->video_1); }?>" type="file" name="video1" accept='video/*'  data-allowed-file-extensions="mp4 x-m4v flv mpg mpeg swf"  class="dropify">
												</div>
												<div class="col-md-3 imgUp video">
													<input data-default-file="<?php if(!empty($profile_ads->video_2)){  echo URL::asset('public/uploads/profile_ads/'.$profile_ads->video_2); }?>" type="file" name="video2"  accept='video/*'  data-allowed-file-extensions="mp4 x-m4v flv mpg mpeg swf"  class="dropify">
												</div>
												<div class="col-md-3 imgUp video">
													<input data-default-file="<?php if(!empty($profile_ads->video_3)){  echo URL::asset('public/uploads/profile_ads/'.$profile_ads->video_3); }?>"  type="file" name="video3"  accept='video/*'  data-allowed-file-extensions="mp4 x-m4v flv mpg mpeg swf"  class="dropify">
												</div>
												<div class="col-md-3 imgUp video">
													<input data-default-file="<?php if(!empty($profile_ads->video_4)){  echo URL::asset('public/uploads/profile_ads/'.$profile_ads->video_4); }?>" type="file" name="video4"  accept='video/*'  data-allowed-file-extensions="mp4 x-m4v flv mpg mpeg swf"  class="dropify">
												</div>
											</div>
											
											
										</div> <!-- photos-div -->  
									</div> <!-- main-uploding-div -->
								</div> <!-- col-md-12 -->
								<!-- Acerca de ti -->
								<div class="col-md-6">
									<div class="Sobreti-div common-div">
										<h4>Acerca de ti</h4>
										
										<div class="row">
										<?php foreach($over_you as $over_you_data){?>
											<div class="col-md-6 tag-column">
												<div class="form-group">
													<?php $checkover_you = checkover_you($profile_ads->id,$over_you_data->name);?>
													<label><input <?php if($checkover_you>0){ echo 'checked'; }?>  type="checkbox" name="over_you[]" value="{{$over_you_data->name}}"><span class="form-control">{{$over_you_data->name}}</span></label>
												</div>
											</div>  
										<?php } ?>
											
										</div>
										
									</div> 
								</div><!-- col-md-6 -->
								<!-- Services -->
								<div class="col-md-6">
									<div class="Sobreti-div common-div">
										<h4>Servicios </h4>
										
										<div class="row">
											<?php foreach($services as $services_data){?>
											<div class="col-md-6 tag-column">
												<div class="form-group">
													<?php $check_services = check_services($profile_ads->id,$services_data->name);?>
													<label><input <?php if($check_services>0){ echo 'checked'; }?>  type="checkbox" name="services[]" value="{{$services_data->name}}"><span class="form-control">{{$services_data->name}}</span></label>
												</div>
											</div>  
										  <?php } ?>
										</div>
											
											
											
										</div><!-- Sobreti-div common-div-row -->
										
									</div> <!-- Sobreti-div common-div --> 
								</div>
								
								
								<div class="col-md-12">
									
									<!-- photos-div --> 
									<!-- main-uploding-div -->
									
									<div class="map-div common-div">
										<div class="photos-div">
											<h4 class="clientes">Experiencias de tus clientes <a href="#" data-toggle="tooltip" data-placement="top" title="">?</a></h4>
											<p>Si tienes experiencias o reviews publicadas en foros de escorts como  <strong class="bold-font
											">Spalumi, SexoMercadoBCN, ForosX,</strong> etc. y quieres que las enlacemos desde tu anuncio, indica las direcciones web a continuación:</p>
											<p><strong>IMPORTANTE: </strong>Las Experiencias sólo se mostrarán en tu anuncio mientras tenga contratado un Subir Automático o un Top Anuncio.</p>
											
											<div class="form-group">
												<input value="{{$profile_ads->customer_experiences}}" type="url" name="customer_experiences" placeholder="http://" class="form-control" >
											</div>
											
											
										</div> <!-- photos-div -->  
									</div> <!-- main-uploding-div -->
									
									<div class="col-md-12">
										<div class="submit-from">
											<button type="submit" class="btn btn-danger">
												Publicar anuncio  <i class="fa fa-caret-right"></i>
											</button>
										</div>
										
										<!-- <div class="submit-from">
											<button type="submit" class="btn btn-danger">
											Publicar anuncio  <i class="fas fa-caret-right"></i>
											</button>
										</div> -->
										<!-- <div class="submit-form-text">
											<p>Truvalia Global Classifieds OOD
											Iskar 4, 1000 Sofia, Bulgaria</p>
										</div> -->
									</div>
									
									
									
									
								</div> <!-- col-md-12-row-close -->
							</div> <!-- main-registration-close -->
						
			
		</section>
		
								</div>
								
							</form>
						</div><!-- COL END -->
					</div>
					<!-- ROW-1 CLOSED -->
				</div>
				<!-- CONTAINER CLOSED -->
        </div>      
		<!-- verify-button-sec -->
			<section class="verify-popup-sec">
				<!-- The Modal -->
				<div class="modal fade" id="myModal-verify">
					<div class="modal-dialog modal-dialog-centered">
						<div class="modal-content">
							
							<!-- Modal Header -->
							<div class="modal-header">
								<h5 class="modal-title">Please Verify OTP On Your Mobile:</h5>
								<button type="button" class="close" data-dismiss="modal">&times;</button>
							</div>
							<!-- Modal body -->
							<div class="modal-body">
								
								<div class="input-group mb-3">
									<input type="text" class="form-control" placeholder="Enter OTP">
									<div class="input-group-append">
										<button class="btn btn-success" type="submit">Verify</button>
									</div>
								</div>
								
							</div>
							
							
						</div>
						</div>
				</div>
				
				
				
			</section>
			
		<script type="text/javascript" src="{{URL::asset('public/front/js/jquery.min.js')}}"></script>
		
		<script src="{{URL::asset('public/front/js/dropify.js')}}"></script>
		
		
		<script type="text/javascript">
	var drEvent = $('.dropify').dropify();

drEvent.on('dropify.error.fileSize', function(event, element){
    alert('Filesize error message!');
});
drEvent.on('dropify.error.minWidth', function(event, element){
    alert('Min width error message!');
});
drEvent.on('dropify.error.maxWidth', function(event, element){
    alert('Max width error message!');
});
drEvent.on('dropify.error.minHeight', function(event, element){
    alert('Min height error message!');
});
drEvent.on('dropify.error.maxHeight', function(event, element){
    alert('Max height error message!');
});
drEvent.on('dropify.error.imageFormat', function(event, element){
    alert('Profile picture must have minimum height 400px of  Portrait Mode on mobile.');
});
drEvent.on('dropify.error.fileFormat', function(event, element){
    alert('Profile picture must have minimum height 400px of  Portrait Mode on mobile.');
});
		</script>
		<script type="text/javascript">
			/* function show(){
				if($(this).is(':checked')) {
				alert("it's checked"); 
				}
				//document.getElementById('lunes').style.display ='none';
				}
				function show2(){
				//document.getElementById('lunes').style.display = 'block';
			} */
			$('#customRadio2').click(function() {
				document.getElementById('lunes').style.display = 'block';
				document.getElementById('schedule').style.display = 'none';
			});
			$('#customRadio').click(function() {
				document.getElementById('schedule').style.display = 'flex';
				document.getElementById('lunes').style.display ='none';
			});
		</script>
		<script type="text/javascript">
			
			function isNumberKey(evt)
			{
				var charCode = (evt.which) ? evt.which : evt.keyCode;
				if (charCode != 46 && charCode > 31 
				&& (charCode < 48 || charCode > 57))
				return false;
				return true;
			}  
			
			
			function isNumericKey(evt)
			{
				var charCode = (evt.which) ? evt.which : evt.keyCode;
				if (charCode != 46 && charCode > 31 
				&& (charCode < 48 || charCode > 57))
				return true;
				return false;
			} 
		</script>
		<script>
			$('#addmore').on('hidden.bs.collapse', function () {
				var add_more = 'Ver mas';
				$('#read-more').text(add_more);
			});
			$('#addmore').on('shown.bs.collapse', function () {
				var less_more = 'Menos mas';
				$('#read-more').text(less_more);
			});
		</script>
		
		<script src="{{URL::asset('public/front/validate/jquery.js')}}"></script>  
		<script src="{{URL::asset('public/front/validate/jquery.validate.js')}}"></script>  
		<script src="{{URL::asset('public/front/validate/additional-methods.min.js')}}"></script>   
		<script>
			var APP_URL = {!! json_encode(url('/')) !!};
			if ($("#registration-form").length > 0) {
				$("#registration-form").validate({
					rules: {
						title: {
							required: true,
						},
						
					},
					
					messages: { 
						
						title: {
							required: "Please enter password",        
							
						},
						
					},
					
				})
				
			}
			
		</script>
		
<script>
$('#province').change(function(){
 $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }

      });
	// fetch data 
      var population = $(this).val();
	  
      $.ajax({
       url: APP_URL+'/ajax/population' ,
        type: "POST",
        data: {population:population},
        success: function( response ) {					
			$('#population').html(response);		
        },


      });
});
</script>

<script>

   var APP_URL = {!! json_encode(url('/')) !!};
	if ($("#profile-ads").length > 0) {
		$("#profile-ads").validate({
		error: function(label) {
     $(this).addClass("error");
   },
		rules: {
			first_name: {
				required: true,
			},
			telephone: {
				required: true,
			},
			province: {
				required: true,
			},
			population: {
				required: true,
			},
			nationality: {
				required: true,   
			},
			age: {
				required: true,   
			},
			height: {
				required: true,   
			},
			/* weight: {
				required: true,   
			}, */
			chest: {
				required: true,   
			},
			hair: {
				required: true,   
			},
			eyes: {
				required: true,   
			},
			text: {
				required: "Required",
				rangelength: [10, 500] 
			},

		},

		messages: {
			first_name: {
				required: "Please enter first name",        
			},
			
			telephone: {
				required: "Please enter telephone",        
			},
			
			province: {
				required: "Required",        
			},
			population: {
				required: "Required",        
			},
			nationality: {
				required: "Required",        
			},
			age: {
				required: "Required",        
			},
			height: {
				required: "Required",        
			},
			/* weight: {
				required: "Required",        
			}, */
			chest: {
				required: "Required",        
			},
			hair: {
				required: "Required",        
			},
			eyes: {
				required: "Required",        
			},
			text: {
			    required: "Please enter text", 
			    maxlength: "charactaers length only 500", 				    
			},

		},


		});

	}

</script>
<script>
$("select[name='category']").change(function(){
	var SelectCategory = $(this).val();
	if(SelectCategory=='chaperos'){
		$('.chapeors_select_action').empty();
	}else{
	$('.chapeors_select_action').empty();
		$('.chapeors_select_action').append(
									'<div class="row">'+
									'<div class="col-md-5 left-justify"><label for="Edad">Talla Pecho </label></div>'+
									'<div class="col-md-7 left-justify">'+
									'<select name="chest" class="custom-select" required>'+
									'<option value="">Escoja Talla</option>'+
									'<?php foreach($chest as $chestdata){ ?>'+
									'<option <?php if($chestdata==$profile_ads->chest){ echo 'selected'; }?> value="{{$chestdata}}">{{$chestdata}}</option>'+
									'<?php } ?>'+												
									'</select>'+
									'</div>'+
									'</div>'

		);
	}
});
</script>

 <script type='text/javascript'>
        $('#spnCharLeft').css('display', 'none');
        $('#spnCharLeft').css('color', '#fff');
        var maxLimit = 500;
        $(document).ready(function () {
            $('textarea[name="text"]').keyup(function () {
                var lengthCount = this.value.length;              
                if (lengthCount > maxLimit) {
                    this.value = this.value.substring(0, maxLimit);
                    var charactersLeft = maxLimit - lengthCount + 1;                   
                }
                else {                   
                    var charactersLeft = maxLimit - lengthCount;                   
                }
                $('#spnCharLeft').css("margin-right" , "10px" );
                $('#spnCharLeft').css('display', 'inline-block');
                $('#spnCharLeft').text('Quedan ' + charactersLeft + ' caracteres');
            });
        });
    </script>
	
@endsection       