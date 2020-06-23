@extends('admin.layouts.frontlayout')
@section('content')
<link rel="stylesheet" href="{{URL::asset('public/front/css/admin-register.css')}}">
<link rel="stylesheet" type="text/css" href="{{URL::asset('public/front/fontawesome/css/all.min.css')}}">
<link rel="stylesheet" href="{{URL::asset('public/front/css/dropify.css')}}">
<div class="page-wrapper">
	
	<div class="container-fluid">
		
		<div class="row page-titles">
			<div class="col-md-5 align-self-center">
				<h4 class="text-themecolor">Add Members</h4>
			</div>
			<div class="col-md-7 align-self-center text-right">
				<div class="d-flex justify-content-end align-items-center">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="{{ url('/admin/home') }}">Home</a></li>
						<li class="breadcrumb-item"><a href="{{ url('/admin/province') }}">Members</a></li>
						<li class="breadcrumb-item active">Add</li>
					</ol>
					<a href="{{ url('/admin/members') }}" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-arrow-left"></i> Back</a>                            
				</div>
			</div>
		</div>
		
		<div class="row">
			<div class="col-sm-12">
				<div class="card">
					<div class="card-body">
						
						<section class="registration-sec">
							
										
										<div class="main-registration">
											<div class="row">
												<div class="col-md-6">
													<div class="left-registration">
														<div class="main-image-register">
															<div class="top-cover-img">
																<span class="cover-image">Foto Perfil</span>
																<div class="img-top-icon">
																	<img src="{{URL::asset('public/front/images/photo-camera.png')}}" class="img-fluid">
																</div>
																<input type="file" class="dropify">
															</div>
															
															
															
														</div>
														
														<div class="tarifs-input common-left">
															<div class="row">	
																<div class="col-md-12">	
																	<h4>Tarifas</h4>
																	<div class="row">
																		<div class="col-md-7">
																			<div class="form-group">
																				<label for="usr">Descripción</label>
																				<input type="text" class="form-control" id="usr" placeholder="1 hora">
																			</div>
																		</div>
																		<div class="col-md-5">
																			<div class="form-group">
																				<label for="usr">Precio euros</label>
																				<input type="text" class="form-control" id="usr">
																			</div>
																		</div>
																	</div>
																</div>
																<div class="col-md-12">	
																	<div class="row">
																		<div class="col-md-7">
																			<div class="form-group">
																				<input type="text" class="form-control" id="usr">
																			</div>
																		</div>
																		<div class="col-md-5">
																			<div class="form-group">
																				<input type="text" class="form-control" id="usr">
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
																				<input type="text" class="form-control" id="usr">
																			</div>
																		</div>
																		<div class="col-md-5">
																			<div class="form-group">
																				<input type="text" class="form-control" id="usr">
																			</div>
																		</div>
																	</div>
																</div>
																<div class="col-md-12">	
																	<div class="row">
																		<div class="col-md-7">
																			<div class="form-group">
																				<input type="text" class="form-control" id="usr">
																			</div>
																		</div>
																		<div class="col-md-5">
																			<div class="form-group">
																				<input type="text" class="form-control" id="usr">
																			</div>
																		</div>
																	</div>
																</div>
																<div class="col-md-12">	
																	<div class="row">
																		<div class="col-md-7">
																			<div class="form-group">
																				<input type="text" class="form-control" id="usr">
																			</div>
																		</div>
																		<div class="col-md-5">
																			<div class="form-group">
																				<input type="text" class="form-control" id="usr">
																			</div>
																		</div>
																	</div>
																</div>
															</div>
															
															<div class="row">
																<div class="col-md-12">	
																	<div class="add-more-div">
																		<a href="#" class="btn btn-primary" id="read-more" data-toggle="collapse" data-target="#addmore"> Ver mas</a>	
																	</div>	
																</div>
																
																
																
																
															</div><!--  tarifs-input-row -->
														</div> <!--  tarifs-input-close -->
														
														<div class="Horario-input common-right">
															<h4>Horario</h4>
															<form>
																<div class="row">
																	<div class="col-md-6">
																		
																		<div class="row select-row">
																			<div class="col-md-4 select-column label-column">
																			<label for="">Desde las </label></div>
																			<div class="col-md-4 select-column">
																				<select name="cars" class="custom-select mb-3">
																					<option selected="">Custom Select Menu</option>
																					<option value="volvo">Volvo</option>
																					<option value="fiat">Fiat</option>
																					<option value="audi">Audi</option>
																				</select>
																			</div>
																			<div class="col-md-4 select-column">
																				<select name="cars" class="custom-select mb-3">
																					<option selected="">Custom Select Menu</option>
																					<option value="volvo">Volvo</option>
																					<option value="fiat">Fiat</option>
																					<option value="audi">Audi</option>
																				</select>
																			</div>
																		</div>  
																	</div>
																	
																	<div class="col-md-6">
																		
																		<div class="row select-row">
																			<div class="col-md-4 select-column label-column">
																			<label for="">Hasta las  </label></div>
																			<div class="col-md-4 select-column">
																				<select name="cars" class="custom-select mb-3">
																					<option selected="">Custom Select Menu</option>
																					<option value="volvo">Volvo</option>
																					<option value="fiat">Fiat</option>
																					<option value="audi">Audi</option>
																				</select>
																			</div>
																			<div class="col-md-4 select-column">
																				<select name="cars" class="custom-select mb-3">
																					<option selected="">Custom Select Menu</option>
																					<option value="volvo">Volvo</option>
																					<option value="fiat">Fiat</option>
																					<option value="audi">Audi</option>
																				</select>
																			</div>
																		</div>  
																	</div>
																</div>
															</form>
															
															
															<form class="hidess" id="lunes">
																<div class="row">
																	<div class="col-md-7">
																		
																		<div class="row select-row">
																			<div class="col-md-3 select-column label-column">
																				<input type="checkbox" id="defaultCheck" name="example2" style="vertical-align: middle;">
																			<label class="" for="customCheck">Lunes</label></div>
																			<div class="col-md-3 select-column label-column">
																			<label for="customCheck">Desde las </label></div>
																			<div class="col-md-3 select-column">
																				<select name="cars" class="custom-select mb-3">
																					<option selected=""></option>
																					<option value="volvo">00</option>
																					<option value="fiat">01</option>
																					<option value="audi">02</option>
																				</select>
																			</div>
																			<div class="col-md-3 select-column">
																				<select name="cars" class="custom-select mb-3">
																					<option selected=""></option>
																					<option value="volvo">00</option>
																					<option value="fiat">01</option>
																					<option value="audi">02</option>
																				</select>
																			</div>
																		</div>  
																	</div>
																	
																	<div class="col-md-5">
																		
																		<div class="row select-row">
																			<div class="col-md-4 select-column label-column">
																			<label for="">Hasta las  </label></div>
																			<div class="col-md-4 select-column">
																				<select name="cars" class="custom-select mb-3">
																					<option selected=""></option>
																					<option value="volvo">00</option>
																					<option value="fiat">01</option>
																					<option value="audi">02</option>
																				</select>
																			</div>
																			<div class="col-md-4 select-column">
																				<select name="cars" class="custom-select mb-3">
																					<option selected=""></option>
																					<option value="volvo">00</option>
																					<option value="fiat">01</option>
																					<option value="audi">02</option>
																				</select>
																			</div>
																		</div>  
																	</div>
																</div>
																
																<div class="row">
																	<div class="col-md-7">
																		
																		<div class="row select-row">
																			<div class="col-md-3 select-column label-column">
																				<input type="checkbox" id="defaultCheck" name="example2" style="vertical-align: middle;">
																			<label class="" for="customCheck">Martes</label></div>
																			<div class="col-md-3 select-column label-column">
																			<label for="customCheck">Desde las </label></div>
																			<div class="col-md-3 select-column">
																				<select name="cars" class="custom-select mb-3">
																					<option selected=""></option>
																					<option value="volvo">00</option>
																					<option value="fiat">01</option>
																					<option value="audi">02</option>
																				</select>
																			</div>
																			<div class="col-md-3 select-column">
																				<select name="cars" class="custom-select mb-3">
																					<option selected=""></option>
																					<option value="volvo">00</option>
																					<option value="fiat">01</option>
																					<option value="audi">02</option>
																				</select>
																			</div>
																		</div>  
																	</div>
																	
																	<div class="col-md-5">
																		
																		<div class="row select-row">
																			<div class="col-md-4 select-column label-column">
																			<label for="">Hasta las  </label></div>
																			<div class="col-md-4 select-column">
																				<select name="cars" class="custom-select mb-3">
																					<option selected=""></option>
																					<option value="volvo">00</option>
																					<option value="fiat">01</option>
																					<option value="audi">02</option>
																				</select>
																			</div>
																			<div class="col-md-4 select-column">
																				<select name="cars" class="custom-select mb-3">
																					<option selected=""></option>
																					<option value="volvo">00</option>
																					<option value="fiat">01</option>
																					<option value="audi">02</option>
																				</select>
																			</div>
																		</div>  
																	</div>
																</div>
																
																<div class="row">
																	<div class="col-md-7">
																		
																		<div class="row select-row">
																			<div class="col-md-3 select-column label-column">
																				<input type="checkbox" id="defaultCheck" name="example2" style="vertical-align: middle;">
																			<label class="" for="customCheck">Miércoles</label></div>
																			<div class="col-md-3 select-column label-column">
																			<label for="customCheck">Desde las </label></div>
																			<div class="col-md-3 select-column">
																				<select name="cars" class="custom-select mb-3">
																					<option selected=""></option>
																					<option value="volvo">00</option>
																					<option value="fiat">01</option>
																					<option value="audi">02</option>
																				</select>
																			</div>
																			<div class="col-md-3 select-column">
																				<select name="cars" class="custom-select mb-3">
																					<option selected=""></option>
																					<option value="volvo">00</option>
																					<option value="fiat">01</option>
																					<option value="audi">02</option>
																				</select>
																			</div>
																		</div>  
																	</div>
																	
																	<div class="col-md-5">
																		
																		<div class="row select-row">
																			<div class="col-md-4 select-column label-column">
																			<label for="">Hasta las  </label></div>
																			<div class="col-md-4 select-column">
																				<select name="cars" class="custom-select mb-3">
																					<option selected=""></option>
																					<option value="volvo">00</option>
																					<option value="fiat">01</option>
																					<option value="audi">02</option>
																				</select>
																			</div>
																			<div class="col-md-4 select-column">
																				<select name="cars" class="custom-select mb-3">
																					<option selected=""></option>
																					<option value="volvo">00</option>
																					<option value="fiat">01</option>
																					<option value="audi">02</option>
																				</select>
																			</div>
																		</div>  
																	</div>
																</div>
																
																<div class="row">
																	<div class="col-md-7">
																		
																		<div class="row select-row">
																			<div class="col-md-3 select-column label-column">
																				<input type="checkbox" id="defaultCheck" name="example2" style="vertical-align: middle;">
																			<label class="" for="customCheck">Jueves</label></div>
																			<div class="col-md-3 select-column label-column">
																			<label for="customCheck">Desde las </label></div>
																			<div class="col-md-3 select-column">
																				<select name="cars" class="custom-select mb-3">
																					<option selected=""></option>
																					<option value="volvo">00</option>
																					<option value="fiat">01</option>
																					<option value="audi">02</option>
																				</select>
																			</div>
																			<div class="col-md-3 select-column">
																				<select name="cars" class="custom-select mb-3">
																					<option selected=""></option>
																					<option value="volvo">00</option>
																					<option value="fiat">01</option>
																					<option value="audi">02</option>
																				</select>
																			</div>
																		</div>  
																	</div>
																	
																	<div class="col-md-5">
																		
																		<div class="row select-row">
																			<div class="col-md-4 select-column label-column">
																			<label for="">Hasta las  </label></div>
																			<div class="col-md-4 select-column">
																				<select name="cars" class="custom-select mb-3">
																					<option selected=""></option>
																					<option value="volvo">00</option>
																					<option value="fiat">01</option>
																					<option value="audi">02</option>
																				</select>
																			</div>
																			<div class="col-md-4 select-column">
																				<select name="cars" class="custom-select mb-3">
																					<option selected=""></option>
																					<option value="volvo">00</option>
																					<option value="fiat">01</option>
																					<option value="audi">02</option>
																				</select>
																			</div>
																		</div>  
																	</div>
																</div>
																
																<div class="row">
																	<div class="col-md-7">
																		
																		<div class="row select-row">
																			<div class="col-md-3 select-column label-column">
																				<input type="checkbox" id="defaultCheck" name="example2" style="vertical-align: middle;">
																			<label class="" for="customCheck">Viernes</label></div>
																			<div class="col-md-3 select-column label-column">
																			<label for="customCheck">Desde las </label></div>
																			<div class="col-md-3 select-column">
																				<select name="cars" class="custom-select mb-3">
																					<option selected=""></option>
																					<option value="volvo">00</option>
																					<option value="fiat">01</option>
																					<option value="audi">02</option>
																				</select>
																			</div>
																			<div class="col-md-3 select-column">
																				<select name="cars" class="custom-select mb-3">
																					<option selected=""></option>
																					<option value="volvo">00</option>
																					<option value="fiat">01</option>
																					<option value="audi">02</option>
																				</select>
																			</div>
																		</div>  
																	</div>
																	
																	<div class="col-md-5">
																		
																		<div class="row select-row">
																			<div class="col-md-4 select-column label-column">
																			<label for="">Hasta las  </label></div>
																			<div class="col-md-4 select-column">
																				<select name="cars" class="custom-select mb-3">
																					<option selected=""></option>
																					<option value="volvo">00</option>
																					<option value="fiat">01</option>
																					<option value="audi">02</option>
																				</select>
																			</div>
																			<div class="col-md-4 select-column">
																				<select name="cars" class="custom-select mb-3">
																					<option selected=""></option>
																					<option value="volvo">00</option>
																					<option value="fiat">01</option>
																					<option value="audi">02</option>
																				</select>
																			</div>
																		</div>  
																	</div>
																</div>
																
																<div class="row">
																	<div class="col-md-7">
																		
																		<div class="row select-row">
																			<div class="col-md-3 select-column label-column">
																				<input type="checkbox" id="defaultCheck" name="example2" style="vertical-align: middle;">
																			<label class="" for="customCheck">Sábado</label></div>
																			<div class="col-md-3 select-column label-column">
																			<label for="customCheck">Desde las </label></div>
																			<div class="col-md-3 select-column">
																				<select name="cars" class="custom-select mb-3">
																					<option selected=""></option>
																					<option value="volvo">00</option>
																					<option value="fiat">01</option>
																					<option value="audi">02</option>
																				</select>
																			</div>
																			<div class="col-md-3 select-column">
																				<select name="cars" class="custom-select mb-3">
																					<option selected=""></option>
																					<option value="volvo">00</option>
																					<option value="fiat">01</option>
																					<option value="audi">02</option>
																				</select>
																			</div>
																		</div>  
																	</div>
																	
																	<div class="col-md-5">
																		
																		<div class="row select-row">
																			<div class="col-md-4 select-column label-column">
																			<label for="">Hasta las  </label></div>
																			<div class="col-md-4 select-column">
																				<select name="cars" class="custom-select mb-3">
																					<option selected=""></option>
																					<option value="volvo">00</option>
																					<option value="fiat">01</option>
																					<option value="audi">02</option>
																				</select>
																			</div>
																			<div class="col-md-4 select-column">
																				<select name="cars" class="custom-select mb-3">
																					<option selected=""></option>
																					<option value="volvo">00</option>
																					<option value="fiat">01</option>
																					<option value="audi">02</option>
																				</select>
																			</div>
																		</div>  
																	</div>
																</div>
																
																<div class="row">
																	<div class="col-md-7">
																		
																		<div class="row select-row">
																			<div class="col-md-3 select-column label-column">
																				<input type="checkbox" id="defaultCheck" name="example2" style="vertical-align: middle;">
																			<label class="" for="customCheck">Domingo</label></div>
																			<div class="col-md-3 select-column label-column">
																			<label for="customCheck">Desde las </label></div>
																			<div class="col-md-3 select-column">
																				<select name="cars" class="custom-select mb-3">
																					<option selected=""></option>
																					<option value="volvo">00</option>
																					<option value="fiat">01</option>
																					<option value="audi">02</option>
																				</select>
																			</div>
																			<div class="col-md-3 select-column">
																				<select name="cars" class="custom-select mb-3">
																					<option selected=""></option>
																					<option value="volvo">00</option>
																					<option value="fiat">01</option>
																					<option value="audi">02</option>
																				</select>
																			</div>
																		</div>  
																	</div>
																	
																	<div class="col-md-5">
																		
																		<div class="row select-row">
																			<div class="col-md-4 select-column label-column">
																			<label for="">Hasta las  </label></div>
																			<div class="col-md-4 select-column">
																				<select name="cars" class="custom-select mb-3">
																					<option selected=""></option>
																					<option value="volvo">00</option>
																					<option value="fiat">01</option>
																					<option value="audi">02</option>
																				</select>
																			</div>
																			<div class="col-md-4 select-column">
																				<select name="cars" class="custom-select mb-3">
																					<option selected=""></option>
																					<option value="volvo">00</option>
																					<option value="fiat">01</option>
																					<option value="audi">02</option>
																				</select>
																			</div>
																		</div>  
																	</div>
																</div>
																
															</form>
															
															
															
															<div class="row horario-checkbox">
																<form>
																	<div class="custom-control custom-radio custom-control-inline">
																		<label for="">¿Mismo horario todos los días?</label>
																	</div>
																	<div class="custom-control custom-radio custom-control-inline">
																		<input type="radio" class="custom-control-input" id="customRadio" checked="checked" name="tab" value="igotnone" onclick="show1();">
																		<label class="custom-control-label" for="customRadio">Si</label>
																	</div>
																	<div class="custom-control custom-radio custom-control-inline">
																		<input type="radio" class="custom-control-input" id="customRadio2" name="tab" value="igottwo" onclick="show2();">
																		<label class="custom-control-label" for="customRadio2">No</label>
																	</div>
																</form> 
															</div> <!-- horario-checkbox-row -->
															
														</div>
														
														
														
													</div> <!-- left-registration -->
												</div><!--  col-md-6-left-close -->
												
												
												<div class="col-md-6 rigt-main-column">
													<div class="right-registration">
														<div class="profile-register-div common-right">
															<h4 class="telephone">
																Nombre
															</h4>
															<form>
																<div class="row">
																	<div class="form-group col-md-12">
																		<input type="text" name="telephone" value="" class="form-control" placeholder="Nombre">
																	</div>
																</div>
															</form>
														</div>
														<div class="profile-register-div common-right">
															<h4 class="telephone">
																telephone
															</h4>
															<form>
																<div class="row">
																	<div class="form-group col-md-6">
																		<input type="text" name="telephone" value="" class="form-control"  placeholder="telephone" required="" onkeypress="return isNumberKey(event)">
																	</div>
																	<div class="form-group verify-button col-md-6 ">
																		<button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal-verify">Verify</button>
																	</div>
																</form>
															</div>   
														</div>  <!-- profile-div-close -->  
														
														<div class="profile-register-div detos-heading common-right">
															<h4>Datos del anuncio</h4>
															<form>
																<div class="row">
																	<div class="col-md-6 justifty-profile">
																		<div class="row">
																			<div class="col-md-5 left-justify"><label for="Edad">Categoría</label></div>
																			<div class="col-md-7 left-justify"><select name="cars" class="custom-select">
																				<option selected="">Escorts</option>
																				<option value="volvo">Travestis</option>
																				<option value="fiat">Chaperos</option>
																			</select>
																			</div>
																			
																		</div>
																	</div>
																	
																	<div class="col-md-6 justifty-profile">
																		<div class="row">
																			<div class="col-md-5 left-justify"><label for="Edad">Provincia</label></div>
																			<div class="col-md-7 left-justify"><select name="cars" class="custom-select">
																				<option selected="">Selecciona una provincia</option>
																				<option disabled="">———————————</option>
																				<option value="Madrid">Madrid</option>
																				<option value="Barcelona">Barcelona</option>
																				<option value="Valencia">Valencia</option>
																			</select>
																			</div>
																			
																		</div>
																	</div>
																	
																	<div class="col-md-6 justifty-profile">
																		<div class="row">
																			<div class="col-md-5 left-justify"><label for="Edad">Población</label></div>
																			<div class="col-md-7 left-justify"><select name="cars" class="custom-select">
																				<option selected="">Selecciona una provincia</option>
																			</select>
																			</div>
																			
																		</div>
																	</div>
																	
																	<div class="col-md-6 justifty-profile">
																		<div class="row">
																			<div class="col-md-5 left-justify"><label for="Edad">Zona   <span class="zona-span">(Opcional)</span></label></div>
																			<div class="col-md-7 left-justify"><div class="form-group">
																				<input type="text" name="zona" value="" class="form-control" placeholder="Selecciona una población">
																			</div>
																			</select>
																		</div>
																		
																	</div>
																</div>
																
															</div>  <!-- justify-row -->
															
														</form>
													</div>
													
													
													
													
													
													<div class="profile-register-div common-right">
														<!-- <form action="/action_page.php">
															<div class="form-group">
															<input type="text" class="form-control" id="name" placeholder="Enter title here">
															</div>
														</form> -->
														<form>
															<div class="row">
																
																<div class="col-md-6 justifty-profile">
																	<div class="row">
																		<div class="col-md-5 left-justify"><label for="Edad">Nacionalidad</label></div>
																		<div class="col-md-7 left-justify"><select name="cars" class="custom-select">
																			<option selected="">Custom Select Menu</option>
																			<option value="volvo">Volvo</option>
																			<option value="fiat">Fiat</option>
																			<option value="audi">Audi</option>
																		</select>
																		</div>
																		
																	</div>
																</div>
																
																
																<div class="col-md-6 justifty-profile">
																	<div class="row">
																		<div class="col-md-5 left-justify"><label for="Edad">Edad </label></div>
																		<div class="col-md-7 left-justify"><select name="cars" class="custom-select">
																			<option selected="">Custom Select Menu</option>
																			<option value="volvo">Volvo</option>
																			<option value="fiat">Fiat</option>
																			<option value="audi">Audi</option>
																		</select>
																		</div>
																		
																	</div>
																</div>
																
																<div class="col-md-6 justifty-profile">
																	<div class="row">
																		<div class="col-md-5 left-justify"><label for="Edad">Estatura </label></div>
																		<div class="col-md-7 left-justify"><select name="cars" class="custom-select">
																			<option selected="">Custom Select Menu</option>
																			<option value="volvo">Volvo</option>
																			<option value="fiat">Fiat</option>
																			<option value="audi">Audi</option>
																		</select>
																		</div>
																		
																	</div>
																</div>
																
																<div class="col-md-6 justifty-profile">
																	<div class="row">
																		<div class="col-md-5 left-justify"><label for="Edad">Peso</label></div>
																		<div class="col-md-7 left-justify"><select name="cars" class="custom-select">
																			<option selected="">Custom Select Menu</option>
																			<option value="volvo">Volvo</option>
																			<option value="fiat">Fiat</option>
																			<option value="audi">Audi</option>
																		</select>
																		</div>
																		
																	</div>
																</div>
																
																<div class="col-md-6 justifty-profile">
																	<div class="row">
																		<div class="col-md-5 left-justify"><label for="Edad">Pecho </label></div>
																		<div class="col-md-7 left-justify"><select name="cars" class="custom-select">
																			<option selected="">Custom Select Menu</option>
																			<option value="volvo">Volvo</option>
																			<option value="fiat">Fiat</option>
																			<option value="audi">Audi</option>
																		</select>
																		</div>
																		
																	</div>
																</div>
																
																<div class="col-md-6 justifty-profile">
																	<div class="row">
																		<div class="col-md-5 left-justify"><label for="Edad">Cabello</label></div>
																		<div class="col-md-7 left-justify"><select name="cars" class="custom-select">
																			<option selected="">Custom Select Menu</option>
																			<option value="volvo">Volvo</option>
																			<option value="fiat">Fiat</option>
																			<option value="audi">Audi</option>
																		</select>
																		</div>
																		
																	</div>
																</div>
																
																<div class="col-md-6 justifty-profile">
																	<div class="row">
																		<div class="col-md-5 left-justify"><label for="Edad">Ojos </label></div>
																		<div class="col-md-7 left-justify"><select name="cars" class="custom-select">
																			<option selected="">Custom Select Menu</option>
																			<option value="volvo">Volvo</option>
																			<option value="fiat">Fiat</option>
																			<option value="audi">Audi</option>
																		</select>
																		</div>
																		
																	</div>
																</div>
																
															</div>  <!-- justify-row -->
															
															<div class="contact-register"> <!-- contact-register --> 
																<div class="row">
																	<!-- <div class="col-md-6">
																		<div class="input-group">
																		<div class="input-group-append">
																		<button class="btn btn-primary" type="submit"><i class="fas fa-phone-alt"></i></button>  
																		</div>
																		<input type="text" class="form-control" placeholder="Number">
																		</div>
																		</div>
																		
																		<div class="col-md-6">
																		<div class="input-group">
																		<div class="input-group-append">
																		<button class="btn btn-success" type="submit"><i class="fab fa-whatsapp"></i></button>  
																		</div>
																		<input type="text" class="form-control" placeholder="whatsapp">
																		</div>
																		</div>
																		--><div class="col-md-12 yesno-radio">
																		<form class="boxed">
																			<div class="form-group yes-no">
																				<label for="whatsapp" class="whatsapp"><i class="fab fa-whatsapp"></i>Me pueden contactar por Whatsapp?</label>
																				<div class="yesnoss">
																					<input type="radio" id="android" name="skills" value="Android Development">
																					<label for="android" class="yes-label">Yes</label>
																					
																					<input type="radio" id="ios" name="skills" value="iOS Development">
																					<label for="ios" class="yes-label no">No</label>
																				</div>
																			</div>
																			
																			
																		</form>  
																	</div>
																</div> <!-- contact-register-row -->
															</div>
														</form>
													</div>
													
													
													
													
													
													
													
													
													
													<div class="description-regis detos-heading common-right">
														<div class="form-group short-from">
															<label for="comment"><h4>Titulo del anuncio
															</h4></label>
															<textarea class="form-control short-text" rows="1" id="comment"></textarea>
														</div>
														
														
														
														
														
														
														<div class="form-group">
															<label for="comment"><h4>Texto</h4></label>
															<textarea class="form-control" rows="3" id="comment"></textarea>
														</div> 
													</div>
													
												</div> <!-- right-registration-close -->
											</div> <!-- col-md-6-close2 -->
											
											
											
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
																<input type="file" class="dropify">
															</div>
															
															<div class="col-md-3 imgUp">
																<input type="file" class="dropify">
															</div>
															<div class="col-md-3 imgUp">
																<input type="file" class="dropify">
															</div>
															
															<div class="col-md-3 imgUp">
																<input type="file" class="dropify">
															</div>
														</div>
														<div class="row">
															<div class="col-md-3 imgUp">
																<input type="file" class="dropify">
															</div>
															
															<div class="col-md-3 imgUp">
																<input type="file" class="dropify">
															</div>
															
															<div class="col-md-3 imgUp">
																<input type="file" class="dropify">
															</div>
															
															<div class="col-md-3 imgUp">
																<input type="file" class="dropify">
															</div>
														</div>
														<div class="row " >
															<div class="collapse col-md-12" id="phtosss">
																<div class="row">
																	<div class="col-md-3 imgUp">
																		<input type="file" class="dropify">
																	</div>
																	<div class="col-md-3 imgUp">
																		<input type="file" class="dropify">
																	</div>
																	<div class="col-md-3 imgUp">
																		<input type="file" class="dropify">
																	</div>
																	<div class="col-md-3 imgUp">
																		<input type="file" class="dropify">
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
														
														
														
													</div> <!-- photos-div -->  
												</div> <!-- main-uploding-div -->
												
												<div class="main-uploding-div common-div" id="videoss">
													<div class="photos-div">
														<h4>Vídeos</h4>
														<p class="photo-p2"><strong><label style="color: #999;">NO ESTÁN PERMITIDOS:</label> </strong> vídeos que <strong>sean una secuencia de fotos,</strong> vídeos que tengan <strong>marcas de agua.</strong></p>
														
														<div class="row">
															<div class="col-md-3 imgUp video">
																<input type="file" class="dropify">
															</div>
															<div class="col-md-3 imgUp video">
																<input type="file" class="dropify">
															</div>
															<div class="col-md-3 imgUp video">
																<input type="file" class="dropify">
															</div>
															<div class="col-md-3 imgUp video">
																<input type="file" class="dropify">
															</div>
														</div>
														
														<!-- <div class="row">
															<div id="vidotoog" class="collapse col-md-12">
															<div class="row">
															<div class="col-md-3 imgUp video">
															<input type="file" class="dropify">
															</div>
															<div class="col-md-3 imgUp video">
															<input type="file" class="dropify">
															</div>
															<div class="col-md-3 imgUp video">
															<input type="file" class="dropify">
															</div>
															<div class="col-md-3 imgUp video">
															<input type="file" class="dropify">
															</div>
															</div>
															</div>
															</div>
															<div class="row">
															<div class="col-md-12">
															<div class="photo-check">
															<a href="#" class="btn btn-primary" data-toggle="collapse" data-target="#vidotoog">Añadir Videos</a>
															</div>
															</div>
														</div> -->
														
													</div> <!-- photos-div -->  
												</div> <!-- main-uploding-div -->
											</div> <!-- col-md-12 -->
											
											<div class="col-md-6">
												<div class="Sobreti-div common-div">
													<h4>Sobre ti</h4>
													<form action="/action_page.php">
														<div class="row">
															<div class="col-md-6 tag-column">
																<div class="form-group">
																	<label><input type="checkbox" name=""><span class="form-control">Altas</span></label>
																</div>
															</div>  
															<div class="col-md-6 tag-column">
																<div class="form-group">
																	<label><input type="checkbox" name=""><span class="form-control">Agencia</span></label>
																</div>
															</div>
															<div class="col-md-6 tag-column">
																<div class="form-group">
																	<label><input type="checkbox" name=""><span class="form-control">Atencion a parejas </span></label>
																</div>
															</div>
															<div class="col-md-6 tag-column">
																<div class="form-group">
																	<label><input type="checkbox" name=""><span class="form-control">Cachonda </span></label>
																</div>
															</div>
															<div class="col-md-6 tag-column">
																<div class="form-group">
																	<label><input type="checkbox" name=""><span class="form-control">Depiladas  </span></label>
																</div>
															</div>
															<div class="col-md-6 tag-column">
																<div class="form-group">
																	<label><input type="checkbox" name=""><span class="form-control"> Delgadas  </span></label>
																</div>
															</div>
															<div class="col-md-6 tag-column">
																<div class="form-group">
																	<label><input type="checkbox" name=""><span class="form-control">Independientes  </span></label>
																</div>
															</div>
															<div class="col-md-6 tag-column">
																<div class="form-group">
																	<label><input type="checkbox" name=""><span class="form-control">Morenas </span></label>
																</div>
															</div>
															<div class="col-md-6 tag-column">
																<div class="form-group">
																	<label><input type="checkbox" name=""><span class="form-control"> Pecho natural  </span></label>
																</div>
															</div>
															<div class="col-md-6 tag-column">
																<div class="form-group">
																	<label><input type="checkbox" name=""><span class="form-control"> Rellenitas </span></label>
																</div>
															</div>
															
															<div class="col-md-6 tag-column">
																<div class="form-group">
																	<label><input type="checkbox" name=""><span class="form-control">Rubias</span></label>
																</div>
															</div>
															<div class="col-md-6 tag-column">
																<div class="form-group">
																	<label><input type="checkbox" name=""><span class="form-control">Pechos grandes</span></label>
																</div>
															</div>
															<div class="col-md-6 tag-column">
																<div class="form-group">
																	<label><input type="checkbox" name=""><span class="form-control"> Silicona  </span></label>
																</div>
															</div>
															<div class="col-md-6 tag-column">
																<div class="form-group">
																	<label><input type="checkbox" name=""><span class="form-control">Telefono </span></label>
																</div>
															</div>
															<div class="col-md-6 tag-column">
																<div class="form-group">
																	<label><input type="checkbox" name=""><span class="form-control"> Squirting </span></label>
																</div>
															</div>
															<div class="col-md-6 tag-column">
																<div class="form-group">
																	<label><input type="checkbox" name=""><span class="form-control"> Whatsapp </span></label>
																</div>
															</div>
															
														</div>
													</form>  
												</div> 
											</div><!-- col-md-6 -->
											
											<div class="col-md-6">
												<div class="Sobreti-div common-div">
													<h4>Servicios </h4>
													<form action="/action_page.php">
														<div class="row">
															<div class="col-md-6 tag-column">
																<div class="form-group">
																	<label><input type="checkbox" name=""><span class="form-control">Lésbico, Dúplex </span></label>
																</div>
															</div>  
															<div class="col-md-6 tag-column">
																<div class="form-group">
																	<label><input type="checkbox" name=""><span class="form-control">Masajes eróticos </span></label>
																</div>
															</div>
															<div class="col-md-6 tag-column">
																<div class="form-group">
																	<label><input type="checkbox" name=""><span class="form-control"> Striptease  </span></label>
																</div>
															</div>
															<div class="col-md-6 tag-column">
																<div class="form-group">
																	<label><input type="checkbox" name=""><span class="form-control">Atención a parejas </span></label>
																</div>
															</div>
															<div class="col-md-6 tag-column">
																<div class="form-group">
																	<label><input type="checkbox" name=""><span class="form-control"> Despedidas de soltero  </span></label>
																</div>
															</div>
															<div class="col-md-6 tag-column">
																<div class="form-group">
																	<label><input type="checkbox" name=""><span class="form-control">  Juegos eróticos   </span></label>
																</div>
															</div>
															<div class="col-md-6 tag-column">
																<div class="form-group">
																	<label><input type="checkbox" name=""><span class="form-control">Masajes final feliz  </span></label>
																</div>
															</div>
															<div class="col-md-6 tag-column">
																<div class="form-group">
																	<label><input type="checkbox" name=""><span class="form-control"> Atención a mujeres  </span></label>
																</div>
															</div>
															<div class="col-md-6 tag-column">
																<div class="form-group">
																	<label><input type="checkbox" name=""><span class="form-control">  Posturas, Lluvia Dorada   </span></label>
																</div>
															</div>
															<div class="col-md-6 tag-column">
																<div class="form-group">
																	<label><input type="checkbox" name=""><span class="form-control"> Garganta profunda </span></label>
																</div>
															</div>
															
															<div class="col-md-6 tag-column">
																<div class="form-group">
																	<label><input type="checkbox" name=""><span class="form-control"> Eyaculación facial </span></label>
																</div>
															</div>
															<div class="col-md-6 tag-column">
																<div class="form-group">
																	<label><input type="checkbox" name=""><span class="form-control"> Consoladores</span></label>
																</div>
															</div>
															<div class="col-md-6 tag-column">
																<div class="form-group">
																	<label><input type="checkbox" name=""><span class="form-control">  Penetración </span></label>
																</div>
															</div>
															<div class="col-md-6 tag-column">
																<div class="form-group">
																	<label><input type="checkbox" name=""><span class="form-control"> Cubana </span></label>
																</div>
															</div>
															<div class="col-md-6 tag-column">
																<div class="form-group">
																	<label><input type="checkbox" name=""><span class="form-control">  Squirting</span></label>
																</div>
															</div>
															<div class="col-md-6 tag-column">
																<div class="form-group">
																	<label><input type="checkbox" name=""><span class="form-control">  Besos con lengua </span></label>
																</div>
															</div>
															<div class="col-md-6 tag-column">
																<div class="form-group">
																	<label><input type="checkbox" name=""><span class="form-control">  Luvia dorada </span></label>
																</div>
															</div>
															
															
															
														</div><!-- Sobreti-div common-div-row -->
													</form>  
												</div> <!-- Sobreti-div common-div --> 
											</div>
											
											
											
											<div class="col-md-12">
												
												
												<div class="map-div common-div">
													<div class="photos-div">
														<h4>Experiencias de tus clientes</h4>
														<p>Si tienes experiencias o reviews publicadas en foros de escorts como  <strong class="bold-font
														">Spalumi, SexoMercadoBCN, ForosX,</strong> etc. y quieres que las enlacemos desde tu anuncio, indica las direcciones web a continuación:</p>
														<p><strong>IMPORTANTE: </strong>Las Experiencias sólo se mostrarán en tu anuncio mientras tenga contratado un Subir Automático o un Top Anuncio.</p>
														<form>
															<div class="form-group">
																<input type="text" name="http" placeholder="http://" class="form-control" id="#">
															</div>
															
														</form>
													</div> <!-- photos-div -->  
												</div> <!-- main-uploding-div -->
												
												<div class="col-md-12">
													<div class="submit-from">
														<a href="imagecard.html" class="btn btn-danger">
															Publicar anuncio  <i class="fas fa-caret-right"></i>
														</a>
													</div>
													
												</div>
												
												
												
												
											</div> <!-- col-md-12-row-close -->
										</div> <!-- main-registration-close -->
									</div><!--  col-md-12-close -->
									
							
						
						
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- ============================================================== -->
	<!-- End Container fluid  -->
	<!-- ============================================================== -->
</div>   

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
	function show1(){
		document.getElementById('lunes').style.display ='none';
	}
	function show2(){
		document.getElementById('lunes').style.display = 'block';
	}
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
		$('#read-more').text(' Ver mas');
	});
    $('#addmore').on('shown.bs.collapse', function () {
		$('#read-more').text('Ver menos');
	});
</script>
@endsection       