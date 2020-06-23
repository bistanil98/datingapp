<?php  require app_path()."/constant/profile_values.php";?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Escotlisting / Crear Anuncio</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="{{URL::asset('public/front/css/bootstrap.min.css')}}">
		<link rel="stylesheet" type="text/css" href="{{URL::asset('public/front/css/style-lightpink2.css')}}">
		<link rel="stylesheet" type="text/css" href="{{URL::asset('public/front/css/responsive.css')}}">
		<link rel="stylesheet" type="text/css" href="{{URL::asset('public/front/fontawesome/css/all.min.css')}}">
		<link rel="stylesheet" href="{{URL::asset('public/front/css/dropify.css')}}">
		<link rel="stylesheet" href="{{URL::asset('public/front/css/main.css')}}">
		<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	</head>
	<body>
		
		<section class="registration-sec">
			<div class="regis-main-header">	
				<div class="escrot-icon">
					<a class="navbar-brand" href="{{ url('/') }}">Escort Listing</a>	
				</div>	
				<div class="regis-header">
					<h5>{{ __('registration.postad')}}<span class="regish5-span">{{ __('registration.postad_tag')}}</span></h5>
				</div>
				<div class="listing-arrow">
					<ul class="main-ul">
						<li class="main-li"><a href="#"><i class="fas fa-list"></i></a>
							<ul class="sub-li">
								<li><a href="">{{ __('menu.go_back')}}</a></li>
								<li><a href="">{{ __('menu.user_panel')}}</a></li>
								<li><a href="">{{ __('menu.legal_terms')}}</a></li>
								<li><a href="{{ url('/logout') }}">{{ __('menu.sign_off')}}</a></li>
							</ul>
						</li>
					</ul>	
				</div>
			</div>
			<form  id="profile-ads"  method="post" action="{{ action('MembersController@profile')}}" enctype="multipart/form-data">
			 @csrf
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-12">
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
													<input required type="file" name="profile" accept='image/*'  data-allowed-file-extensions="png jpg jpeg"  class="dropify">
												</div>
												
												
											</div>
											
											<div class="tarifs-input common-left">
												<div class="row">	
													<div class="col-md-12">	
														<h4>Tarifas (€)</h4>
														<div class="row">
															<div class="col-md-7">
																<div class="form-group">
																	<label for="usr">{{ __('registration.description')}}</label>
																	<input required value="1 hours" name="tariffs_description[]" type="text" class="form-control"  placeholder="{{ __('registration.description_placeholder')}}">
																</div>
															</div>
															<div class="col-md-5">
																<div class="form-group">
																	<label for="usr">{{ __('registration.price')}}</label>
																	<input required name="tariffs_euro_price[]" type="text" class="form-control" >
																</div>
															</div>
														</div>
													</div>
													<div class="col-md-12">	
														<div class="row">
															<div class="col-md-7">
																<div class="form-group">
																	<input name="tariffs_description[]" type="text" class="form-control" >
																</div>
															</div>
															<div class="col-md-5">
																<div class="form-group">
																	<input name="tariffs_euro_price[]" type="text" class="form-control" >
																</div>
															</div>
														</div>
													</div>
												</div>
												<div class="row collapse" id="addmore">
													<div class="col-md-12">	
														<div class="row">
															<div class="col-md-7">
																<div class="form-group">
																	<input name="tariffs_description[]" type="text" class="form-control" >
																</div>
															</div>
															<div class="col-md-5">
																<div class="form-group">
																	<input name="tariffs_euro_price[]" type="text" class="form-control" >
																</div>
															</div>
														</div>
													</div>
													<div class="col-md-12">	
														<div class="row">
															<div class="col-md-7">
																<div class="form-group">
																	<input name="tariffs_description[]" type="text" class="form-control" >
																</div>
															</div>
															<div class="col-md-5">
																<div class="form-group">
																	<input name="tariffs_euro_price[]" type="text" class="form-control" >
																</div>
															</div>
														</div>
													</div>
													<div class="col-md-12">	
														<div class="row">
															<div class="col-md-7">
																<div class="form-group">
																	<input name="tariffs_description[]" type="text" class="form-control" >
																</div>
															</div>
															<div class="col-md-5">
																<div class="form-group">
																	<input name="tariffs_euro_price[]" type="text" class="form-control" >
																</div>
															</div>
														</div>
													</div>
												</div>
												
												<div class="row">
													<div class="col-md-12">	
														<div class="add-more-div">
															<a href="#" class="btn btn-primary" id="read-more" data-toggle="collapse" data-target="#addmore">{{ __('registration.add_mode')}}</a>	
														</div>	
													</div>
																										
												</div><!--  tarifs-input-row -->
											</div> <!--  tarifs-input-close -->
											
											<div class="Horario-input common-right">
												<h4>{{ __('registration.schedule')}}</h4>
												
												<div class="row" id="schedule">
														<div class="col-md-6">														
														<div class="row select-row">
															<div class="col-md-4 select-column label-column">
															<input type="hidden"  name="full_days[]" value="full">
															<label for="">{{ __('registration.schedule_from')}}</label></div>
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
															<label for="">{{ __('registration.schedule_unit')}}</label></div>
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
												
												
												
												
												<div class="hidess" id="lunes">
													<?php foreach($days as $data){ ?>
												<div class="row">
													<div class="col-md-12 col-lg-8 col-sm-12">
														
														<div class="row select-row">
															<div class="col-md-12 col-lg-4 col-6  col-sm-12 select-column label-column">
																<input type="checkbox" value="{{$data}}" id="defaultCheck" name="days[]" style="vertical-align: middle;">
																<label class="" for="customCheck">{{$data}}</label></div>
															<div class="col-md-4 col-lg-3 col-6 col-sm-4 select-column label-column label-column2">
															<label for="customCheck">From the </label></div>
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
															<label for="">Until</label></div>
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
												
												
												
												
												<div class="row horario-checkbox">
													
													<div class="custom-control custom-radio custom-control-inline eddit-radios">
														<label for="">¿Mismo horario todos los días?</label>
													</div>
													<div class="custom-control custom-radio custom-control-inline si-radios">
														<input type="radio" class="custom-control-input" id="customRadio" checked="checked" name="schedule_status" value="yes" >
														<label class="custom-control-label" for="customRadio">Si</label>
													</div>
													<div class="custom-control custom-radio custom-control-inline">
														<input type="radio" class="custom-control-input" id="customRadio2" name="schedule_status" value="no" >
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
													Category
												</h4>
												<div class="row">
													<div class="form-group col-md-4">
														<select name="category" class="custom-select">
														<?php foreach($categories as $data){?>
															<option  value="{{strtolower($data->name)}}">{{$data->name}}</option>
															<?php }?>
														</select>
													</div>
												</div>
												<h4 class="telephone">
													Name
												</h4>
												<form>
													<div class="row">
														<div class="form-group col-md-12">
															<input type="text" name="first_name" required class="form-control" placeholder="Name">
														</div>
													</div>
												</form>
											</div>
											<div class="profile-register-div common-right">
												<div class="tekephone-tooptip">	
													<h4 class="telephone">
														Telephone
													</h4>
													<a href="#" data-toggle="tooltip" data-placement="top" title="Hooray!">
														?
													</a>
												</div>
												
													<div class="row">
														<div class="form-group col-md-6">
															<input type="text" name="telephone" class="form-control"  placeholder="telephone" required onkeypress="return isNumberKey(event)">
														</div>
														<div class="form-group verify-button col-md-6 ">
															<button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal-verify">Verify</button>
														</div>
													
												</div>   
											</div>  <!-- profile-div-close -->  
											
											<div class="profile-register-div detos-heading common-right">
												<h4>Ad Data</h4>
												
												<div class="row">
													
													
													<div class="col-md-6 justifty-profile">
														<div class="row">
															<div class="col-md-5 left-justify"><label for="Edad">Province</label></div>
															<div class="col-md-7 left-justify">
															<select name="province" class="custom-select" id="province" required>
																<option value="">Select a Province</option>
																<optgroup label="———————————"></optgroup>
																<?php foreach($province as $data){?>
																	<option value="{{$data->id}}">{{$data->name}}</option>
																<?php }?>
															</select>
															</div>
															
														</div>
													</div>
													
													<div class="col-md-6 justifty-profile">
														<div class="row">
															<div class="col-md-5 left-justify"><label for="Edad">Population</label></div>
															<div class="col-md-7 left-justify">
															<select name="population" class="custom-select" id="population" required>
																<option value="">Select Population</option>
															</select>
															</div>
															
														</div>
													</div>
													
													<div class="col-md-6 justifty-profile">
														<div class="row">
															<div class="col-md-5 left-justify"><label for="Edad">Zona   <span class="zona-span">(Opcional)</span></label></div>
															<div class="col-md-7 left-justify">
																<div class="form-group">
																	<input type="text" name="zone" value="" class="form-control" placeholder="Select a Zone">
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
														<div class="col-md-5 left-justify"><label for="Edad">Nationality</label></div>
														<div class="col-md-7 left-justify">
														<select name="nationality" class="custom-select" required>
															<option value="">Select Nationality</option>
															<?php foreach($countries as $data){?>
																	<option value="{{$data->nationality}}">{{$data->nationality}}</option>
																<?php }?>
														</select>
														</div>
														
													</div>
												</div>
												
												
												<div class="col-md-6 justifty-profile">
													<div class="row">
														<div class="col-md-5 left-justify"><label for="Edad">Age </label></div>
														<div class="col-md-7 left-justify">
														<select name="age" class="custom-select" required>
															<option value="">Select Age</option>
															<?php
															for($foot=18;$foot<=60;$foot++){ ?>															
																<option value='{{$foot}}'> {{$foot}} years </option>																									
															<?php }	?>
														</select>
														</div>
														
													</div>
												</div>
												
												<div class="col-md-6 justifty-profile">
													<div class="row">
														<div class="col-md-5 left-justify"><label for="Edad">Height </label></div>
														<div class="col-md-7 left-justify">
														<select name="height" class="custom-select" required>
															<option value="">Select Height</option>
															<?php for($height=90;$height<=250;$height++){?>
															<option value='{{$height}}'>{{$height}} cm</option>
															<?php } ?>
														</select>
														</div>
														
													</div>
												</div>
												
												<div class="col-md-6 justifty-profile">
													<div class="row">
														<div class="col-md-5 left-justify"><label for="Edad">Weight</label></div>
														<div class="col-md-7 left-justify">
														<select name="weight" class="custom-select" required>
															<option value="">Select Weight</option>
															<?php
															for($foot=40;$foot<=150;$foot++){															
																echo "<option value='$foot'> $foot kg </option>";																										
															}
															?>
														</select>
														</div>
														
													</div>
												</div>
												
												<div class="col-md-6 justifty-profile">
												<div class="row">
														<div class="col-md-5 left-justify"><label for="Edad">Eyes </label></div>
														<div class="col-md-7 left-justify">
														<select name="eyes" class="custom-select" required>
															<option value="">Select Eyes</option>
															<?php foreach($eye_types as $data){ ?>
															<option value="{{$data}}">{{$data}}</option>
															<?php }?>
														</select>
														</div>
														
													</div>
													
												</div>
												
												<div class="col-md-6 justifty-profile">
													<div class="row">
														<div class="col-md-5 left-justify"><label for="Edad">Hair</label></div>
														<div class="col-md-7 left-justify">
														<select name="hair" class="custom-select" required>
															<option value="">Select Hair</option>
															<?php foreach($hair_types as $data){ ?>
															<option value="{{$data}}">{{$data}}</option>
															<?php }?>
														</select>
														</div>
														
													</div>
												</div>
												
												<div class="col-md-6 justifty-profile chapeors_select_action">
													<div class="row">
														<div class="col-md-5 left-justify"><label for="Edad">Talla Pecho </label></div>
														<div class="col-md-7 left-justify">
														<select name="chest" class="custom-select" required>
															<option value="">Select Chest</option>
															<?php foreach($chest as $chestdata){ ?>
																<option  value="{{$chestdata}}">{{$chestdata}}</option>
															<?php } ?>														
														</select>
														</div>
														
													</div>
												</div>
												
											</div>  <!-- justify-row -->
											
											<div class="contact-register"> <!-- contact-register --> 
												<div class="row">
												
													<div class="col-md-12 yesno-radio">
														<div class="boxed">
															<div class="form-group yes-no">
																<label for="whatsapp" class="whatsapp"><i class="fa fa-whatsapp"></i>Can you contact me by WhatsApp?</label>
																<div class="yesnoss">
																	<input type="radio" id="android" name="contact_me_by_whatsApp" value="Yes">
																	<label for="android" class="yes-label">Yes</label>																	
																	<input type="radio" id="ios" name="contact_me_by_whatsApp" value="No">
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
												<label for="comment" class="short-label"><h4>Ad Title
													</h4> <a href="#" data-toggle="tooltip" data-placement="top" title="Hooray!">
													?
												</a></label>
												<textarea class="form-control short-text" rows="1" name="title" required="" ></textarea>
											</div>
											
											
											
											<div class="form-group">
												<label for="comment"><h4>Text</h4></label>
												<textarea name="text" class="form-control" rows="3" ></textarea>
											</div> 
										</div>
										
									</div> <!-- right-registration-close -->
								</div> <!-- col-md-6-close2 -->
								
								
								<!----------------------PHOTOS---------->
								<div class="col-md-12" id="photoss">
									<div class="main-uploding-div common-div">
										<div class="photos-div">
											<h4>Fotos</h4>
											<p class="photo-p1">En Slumi queremos que todos los anuncios tengan <strong>fotos reales</strong>. No esperamos a recibir una denuncia, constantemente comprobamos los anuncios y eliminamos los que usan fotos falsas. No pierdas tu tiempo publicando un anuncio con fotos que no sean tuyas, <strong>será eliminado inmediatamante.</strong></p>
											<p class="photo-p2">
												<strong>NO ESTÁN PERMITIDAS:</strong> fotos que sean <strong>fotomontajes o collage</strong> de otras fotos, fotos tipo flyer o banner, fotos con <strong>textos o adornos</strong>, fotos con <strong>marcos o bandas</strong> alrededor, fotos con <strong>marcas de agua</strong>.
											</p>
											
											<div class="row">
												<div class="col-md-3 imgUp">
													<input type="file" name="pic1" accept='image/*'  data-allowed-file-extensions="png jpg jpeg"  class="dropify">
												</div>
												
												<div class="col-md-3 imgUp">
													<input type="file" name="pic2" accept='image/*'  data-allowed-file-extensions="png jpg jpeg"  class="dropify">
												</div>
												<div class="col-md-3 imgUp">
													<input type="file" name="pic3" accept='image/*'  data-allowed-file-extensions="png jpg jpeg"  class="dropify">
												</div>
												
												<div class="col-md-3 imgUp">
													<input type="file" name="pic4" accept='image/*'  data-allowed-file-extensions="png jpg jpeg"  class="dropify">
												</div>
											</div>
											<div class="row " >
												<div class="collapse col-md-12" id="phtosss">
													<div class="row">
														<div class="col-md-3 imgUp">
															<input type="file" name="pic5" accept='image/*'  data-allowed-file-extensions="png jpg jpeg"  class="dropify">
														</div>
														<div class="col-md-3 imgUp">
															<input type="file" name="pic6" accept='image/*'  data-allowed-file-extensions="png jpg jpeg"  class="dropify">
														</div>
														<div class="col-md-3 imgUp">
															<input type="file" name="pic7" accept='image/*'  data-allowed-file-extensions="png jpg jpeg"  class="dropify">
														</div>
														<div class="col-md-3 imgUp">
															<input type="file" name="pic8" accept='image/*'  data-allowed-file-extensions="png jpg jpeg"  class="dropify">
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
														<h4>Selfie Fotos</h4>													
													</div>
												</div>
												<div class="col-md-3 imgUp">
													<input type="file" name="selfie1" accept='image/*'  data-allowed-file-extensions="png jpg jpeg"  class="dropify">
												</div>
												
												<div class="col-md-3 imgUp">
													<input type="file" name="selfie2" accept='image/*'  data-allowed-file-extensions="png jpg jpeg"  class="dropify">
												</div>
												<div class="col-md-3 imgUp">
													<input type="file" name="selfie3" accept='image/*'  data-allowed-file-extensions="png jpg jpeg"  class="dropify">
												</div>
												
												<div class="col-md-3 imgUp">
													<input type="file" name="selfie4"  accept='image/*'  data-allowed-file-extensions="png jpg jpeg"  class="dropify">
												</div>
											</div>
											
											
											
											
										</div> <!-- photos-div -->  
									</div> <!-- main-uploding-div -->
									<!---------------- VIDEO------------------>
									<div class="main-uploding-div common-div" id="videoss">
										<div class="photos-div">
											<h4>Vídeos</h4>
											<p class="photo-p2"><strong><label style="color: #999;">NO ESTÁN PERMITIDOS:</label> </strong> vídeos que <strong>sean una secuencia de fotos,</strong> vídeos que tengan <strong>marcas de agua.</strong></p>
											
											<div class="row">
												<div class="col-md-3 imgUp video">
													<input type="file" name="video1" accept='video/*'  data-allowed-file-extensions="mp4 x-m4v flv mpg mpeg swf"  class="dropify">
												</div>
												<div class="col-md-3 imgUp video">
													<input type="file" name="video2"  accept='video/*'  data-allowed-file-extensions="mp4 x-m4v flv mpg mpeg swf"  class="dropify">
												</div>
												<div class="col-md-3 imgUp video">
													<input type="file" name="video3"  accept='video/*'  data-allowed-file-extensions="mp4 x-m4v flv mpg mpeg swf"  class="dropify">
												</div>
												<div class="col-md-3 imgUp video">
													<input type="file" name="video4"  accept='video/*'  data-allowed-file-extensions="mp4 x-m4v flv mpg mpeg swf"  class="dropify">
												</div>
											</div>
											
											
										</div> <!-- photos-div -->  
									</div> <!-- main-uploding-div -->
								</div> <!-- col-md-12 -->
								<!-- About You -->
								<div class="col-md-6">
									<div class="Sobreti-div common-div">
										<h4>About You</h4>
										
										<div class="row">
										<?php foreach($over_you as $data){?>
											<div class="col-md-6 tag-column">
												<div class="form-group">
													<label><input value="{{$data->name}}" type="checkbox" name="over_you[]"><span class="form-control">{{$data->name}}</span></label>
												</div>
											</div>  
										<?php } ?>
											
										</div>
										
									</div> 
								</div><!-- col-md-6 -->
								<!-- Services -->
								<div class="col-md-6">
									<div class="Sobreti-div common-div">
										<h4>Services </h4>
										
										<div class="row">
											<?php foreach($services as $data){?>
											<div class="col-md-6 tag-column">
												<div class="form-group">
													<label><input value="{{$data->name}}" type="checkbox" name="services[]"><span class="form-control">{{$data->name}}</span></label>
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
											<h4 class="clientes">Experiencias de tus clientes <a href="#" data-toggle="tooltip" data-placement="top" title="Hooray!">?</a></h4>
											<p>Si tienes experiencias o reviews publicadas en foros de escorts como  <strong class="bold-font
											">Spalumi, SexoMercadoBCN, ForosX,</strong> etc. y quieres que las enlacemos desde tu anuncio, indica las direcciones web a continuación:</p>
											<p><strong>IMPORTANTE: </strong>Las Experiencias sólo se mostrarán en tu anuncio mientras tenga contratado un Subir Automático o un Top Anuncio.</p>
											
											<div class="form-group">
												<input type="url" name="customer_experiences" placeholder="http://" class="form-control" >
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
						</div><!--  col-md-12-close -->
						
					</div>
				</div>
				
			</form>
			
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
			
			
		</section>
		
		
		<script type="text/javascript" src="{{URL::asset('public/front/js/jquery.min.js')}}"></script>
		<script type="text/javascript" src="{{URL::asset('public/front/js/popper.min.js')}}"></script>
		<script type="text/javascript" src="{{URL::asset('public/front/js/bootstrap.min.js')}}"></script>
		<script src="{{URL::asset('public/front/js/dropify.js')}}"></script>
		
		
		<script type="text/javascript">
			$('.dropify').dropify({
				messages: {
					'default': 'Drag and drop a file here or click',
					'replace': 'Drag and drop or click to replace',
					'remove':  'Remove',
					'error':   'Ooops, something wrong happended.'
				}
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
				var add_more = '{{ __('registration.add_mode')}}';
				$('#read-more').text(add_more);
			});
			$('#addmore').on('shown.bs.collapse', function () {
				var less_more = '{{ __('registration.less_more')}}';
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
			weight: {
				required: true,   
			},
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
			weight: {
				required: "Required",        
			},
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
				rangelength: function(range, input) {
                                return [
                                    'charactaers length  ',
                                    range[0],
                                    ' - ',
                                    range[1],
                                    '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;',
                                    $(input).val().length,
                                    ' characters'                                
                                ].join('');

                            }     
			},

		},


		});

	}

</script>
<style>
	.Horario-input select.custom-select.cus-select.mb-3{
	    width: 60px;
	}
</style>
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
									'<option value="">Select Chest</option>'+
									'<?php foreach($chest as $chestdata){ ?>'+
									'<option  value="{{$chestdata}}">{{$chestdata}}</option>'+
									'<?php } ?>'+												
									'</select>'+
									'</div>'+
									'</div>'

		);
	}
});
</script>
	</body>
</html>
