@extends('admin.layouts.frontlayout')
@section('content')

<!-- Page Heading -->


<!-- CONTAINER -->
<div class="container content-area relative">
	
	<!-- PAGE-HEADER -->
	<div class="page-header">
		<h4 class="page-title">Individual</h4>
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="{{ url('/admin/home') }}">Home</a></li>
			<li class="breadcrumb-item"><a href="{{ url('/admin/individual') }}">Individual</a></li>                                
			<li class="breadcrumb-item active">View Agency</li>
			
		</ol>
	</div>
	<!-- PAGE-HEADER END -->
	
	<!-- ROW-1 OPEN -->
		<div class="row" id="user-profile">
						<div class="col-lg-12">
							<div class="card">
								<div class="card-body">
									<div class="wideget-user">
										<div class="row">
											<div class="col-lg-6 col-md-12">
												<div class="wideget-user-desc d-flex">
													<div class="wideget-user-img">
													<?php if(!empty($individual->upload_logo)){?>
														<img class="" src="<?php if(!empty($individual->upload_logo)){  echo URL::asset('public/uploads/profile_logo/'.$individual->upload_logo); }?>" alt="img">
														<?php }?>
													</div>
													<div class="user-wrap">
														<h4>{{$individual->name}}</h4>
														<h6 class="text-muted mb-3">Member Since: <?php  echo date('F, d Y',strtotime($individual->created_at)); ?>   
														</h6>
														<?php /*<a   class="btn btn-primary mt-1 mb-1" href="{{url('/admin/individual/edit/')}}/{{$individual->id}}" ><i class="fa fa-edit"></i> Edit</a>							*/?>
														<a class="btn btn-primary mt-1 mb-1" href="{{ url('/admin/individual') }}"><i class="fa fa-arrow-left"></i> Back</a> 
														
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="border-top">
									<div class="wideget-user-tab">
										<div class="tab-menu-heading">
											<div class="tabs-menu1">
												<ul class="nav">
													<li class=""><a href="#tab-51" class="active show" data-toggle="tab">Profile</a></li>
													<?php /*
													<li><a href="#tab-61" data-toggle="tab" class="">Friends</a></li>
													<li><a href="#tab-71" data-toggle="tab" class="">Gallery</a></li>
													<li><a href="#tab-81" data-toggle="tab" class="">Followers</a></li>
													<?php */?>
												</ul>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="card">
								<div class="card-body">
									<div class="border-0">
										<div class="tab-content">
											<div class="tab-pane active show" id="tab-51">											
												<div id="profile-log-switch">
												<?php /*
													<div class="media-heading">
														<h5 class="text-uppercase"><strong>Personal Information</strong></h5>
													</div>*/?>
													<hr class="m-0">
													<div class="table-responsive ">
														<table class="table row table-borderless">
															<tbody class="col-lg-12 col-xl-6 p-0">
															 <tr>
																	<td><strong>Email :</strong> {{$individual->email}}</td>
																</tr>
																<tr>
																	<td><strong>Phone :</strong> {{$individual->mobile}} </td>
																</tr>
																<tr>
																	<td><strong>Category :</strong> {{$individual->agency_category}}</td>
																</tr>
																
															</tbody>
															<tbody class="col-lg-12 col-xl-6 p-0">
																<tr>
																	<td><strong>Provincia :</strong> {{$individual->provincia}}</td>
																</tr>
																<tr>
																	<td><strong>Population :</strong> {{$individual->population}}</td>
																</tr>
																<tr>
																	<td><strong>Zona :</strong> {{$individual->zona}}</td>
																</tr>
															</tbody>
															
															<tbody class="col-lg-12 col-xl-6 p-0">
																<tr>
																	<td><strong>Whatsapp :</strong> {{$individual->whatsapp}}</td>
																</tr>
																<tr>
																	<td><strong>Banner Link :</strong> {{$individual->banner_link}}</td>
																</tr>
																<tr>
																	<td><strong>Founder Year :</strong> {{$individual->founder_year}} </td>
																</tr>
															</tbody>
															<tbody class="col-lg-12 col-xl-6 p-0">
																<tr>
																	<td><strong>Website :</strong> {{$individual->website}}</td>
																</tr>																
															</tbody>
														</table>
													</div>
													</div>
											</div>
											<?php /*
											<div class="tab-pane" id="tab-61">
												<ul class="widget-users row">
													<li class="col-lg-3  col-md-6 col-sm-12 col-12">
														<div class="card">
															<div class="card-body text-center">
																<span class="avatar avatar-xxl brround cover-image" data-image-src="../assets/images/users/male/25.jpg"></span>
																<h4 class="h4 mb-0 mt-3">James Thomas</h4>
																<p class="card-text">Web designer</p>
																<div class="socials text-center mt-3">
																	<a href="" class="btn btn-circle btn-primary "><i class="fa fa-facebook text-white"></i></a>
																	<a href="" class="btn btn-circle btn-danger "><i class="fa fa-google-plus text-white"></i></a>
																	<a href="" class="btn btn-circle btn-info "><i class="fa fa-twitter text-white"></i></a>
																	<a href="" class="btn btn-circle btn-warning "><i class="fa fa-envelope text-white"></i></a>
																</div>
															</div>
														</div>
													</li>
													<li class="col-lg-3 col-md-6 col-sm-12 col-12">
														<div class="card">
															<div class="card-body text-center">
																<span class="avatar avatar-xxl brround cover-image" data-image-src="../assets/images/users/female/19.jpg"></span>
																<h4 class="h4 mb-0 mt-3">George Clooney</h4>
																<p class="card-text">Web designer</p>
																<div class="socials text-center mt-3">
																	<a href="" class="btn btn-circle btn-primary "><i class="fa fa-facebook text-white"></i></a>
																	<a href="" class="btn btn-circle btn-danger "><i class="fa fa-google-plus text-white"></i></a>
																	<a href="" class="btn btn-circle btn-info "><i class="fa fa-twitter text-white"></i></a>
																	<a href="" class="btn btn-circle btn-warning "><i class="fa fa-envelope text-white"></i></a>
																</div>
															</div>
														</div>
													</li>
													<li class="col-lg-3 col-md-6 col-sm-12 col-12">
														<div class="card">
															<div class="card-body text-center">
																<span class="avatar avatar-xxl brround cover-image" data-image-src="../assets/images/users/male/20.jpg"></span>
																<h4 class="h4 mb-0 mt-3">Robert Downey Jr.</h4>
																<p class="card-text">Web designer</p>
																<div class="socials text-center mt-3">
																	<a href="" class="btn btn-circle btn-primary "><i class="fa fa-facebook text-white"></i></a>
																	<a href="" class="btn btn-circle btn-danger "><i class="fa fa-google-plus text-white"></i></a>
																	<a href="" class="btn btn-circle btn-info "><i class="fa fa-twitter text-white"></i></a>
																	<a href="" class="btn btn-circle btn-warning "><i class="fa fa-envelope text-white"></i></a>
																</div>
															</div>
														</div>
													</li>
													<li class="col-lg-3 col-md-6 col-sm-12 col-12">
														<div class="card mb-lg-0">
															<div class="card-body text-center">
																<span class="avatar avatar-xxl brround cover-image" data-image-src="../assets/images/users/female/12.jpg"></span>
																<h4 class="h4 mb-0 mt-3">Emma Watson</h4>
																<p class="card-text">Web designer</p>
																<div class="socials text-center mt-3">
																	<a href="" class="btn btn-circle btn-primary "><i class="fa fa-facebook text-white"></i></a>
																	<a href="" class="btn btn-circle btn-danger "><i class="fa fa-google-plus text-white"></i></a>
																	<a href="" class="btn btn-circle btn-info "><i class="fa fa-twitter text-white"></i></a>
																	<a href="" class="btn btn-circle btn-warning "><i class="fa fa-envelope text-white"></i></a>
																</div>
															</div>
														</div>
													</li>
													<li class="col-lg-3 col-md-6 col-sm-12 col-12">
														<div class="card mb-lg-0">
															<div class="card-body text-center">
																<span class="avatar avatar-xxl brround cover-image" data-image-src="../assets/images/users/male/24.jpg"></span>
																<h4 class="h4 mb-0 mt-3">Mila Kunis</h4>
																<p class="card-text">Web designer</p>
																<div class="socials text-center mt-3">
																	<a href="" class="btn btn-circle btn-primary "><i class="fa fa-facebook text-white"></i></a>
																	<a href="" class="btn btn-circle btn-danger "><i class="fa fa-google-plus text-white"></i></a>
																	<a href="" class="btn btn-circle btn-info "><i class="fa fa-twitter text-white"></i></a>
																	<a href="" class="btn btn-circle btn-warning "><i class="fa fa-envelope text-white"></i></a>
																</div>
															</div>
														</div>
													</li>
													<li class="col-lg-3 col-md-6 col-sm-12 col-12">
														<div class="card mb-0">
															<div class="card-body text-center">
																<span class="avatar avatar-xxl brround cover-image" data-image-src="../assets/images/users/male/26.jpg"></span>
																<h4 class="h4 mb-0 mt-3">Ryan Gossling</h4>
																<p class="card-text">Web designer</p>
																<div class="socials text-center mt-3">
																	<a href="" class="btn btn-circle btn-primary "><i class="fa fa-facebook text-white"></i></a>
																	<a href="" class="btn btn-circle btn-danger "><i class="fa fa-google-plus text-white"></i></a>
																	<a href="" class="btn btn-circle btn-info "><i class="fa fa-twitter text-white"></i></a>
																	<a href="" class="btn btn-circle btn-warning "><i class="fa fa-envelope text-white"></i></a>
																</div>
															</div>
														</div>
													</li>
													<li class="col-lg-3  col-md-6 col-sm-12 col-12">
														<div class="card">
															<div class="card-body text-center">
																<span class="avatar avatar-xxl brround cover-image" data-image-src="../assets/images/users/male/2.jpg"></span>
																<h4 class="h4 mb-0 mt-3">Dannie Plotkin</h4>
																<p class="card-text">Web designer</p>
																<div class="socials text-center mt-3">
																	<a href="" class="btn btn-circle btn-primary "><i class="fa fa-facebook text-white"></i></a>
																	<a href="" class="btn btn-circle btn-danger "><i class="fa fa-google-plus text-white"></i></a>
																	<a href="" class="btn btn-circle btn-info "><i class="fa fa-twitter text-white"></i></a>
																	<a href="" class="btn btn-circle btn-warning "><i class="fa fa-envelope text-white"></i></a>
																</div>
															</div>
														</div>
													</li>
													<li class="col-lg-3 col-md-6 col-sm-12 col-12">
														<div class="card">
															<div class="card-body text-center">
																<span class="avatar avatar-xxl brround cover-image" data-image-src="../assets/images/users/female/1.jpg"></span>
																<h4 class="h4 mb-0 mt-3">Jesica Benford</h4>
																<p class="card-text">Web designer</p>
																<div class="socials text-center mt-3">
																	<a href="" class="btn btn-circle btn-primary "><i class="fa fa-facebook text-white"></i></a>
																	<a href="" class="btn btn-circle btn-danger "><i class="fa fa-google-plus text-white"></i></a>
																	<a href="" class="btn btn-circle btn-info "><i class="fa fa-twitter text-white"></i></a>
																	<a href="" class="btn btn-circle btn-warning "><i class="fa fa-envelope text-white"></i></a>
																</div>
															</div>
														</div>
													</li>
													<li class="col-lg-3 col-md-6 col-sm-12 col-12">
														<div class="card">
															<div class="card-body text-center">
																<span class="avatar avatar-xxl brround cover-image" data-image-src="../assets/images/users/male/3.jpg"></span>
																<h4 class="h4 mb-0 mt-3">Sonny Dewolf</h4>
																<p class="card-text">Web designer</p>
																<div class="socials text-center mt-3">
																	<a href="" class="btn btn-circle btn-primary "><i class="fa fa-facebook text-white"></i></a>
																	<a href="" class="btn btn-circle btn-danger "><i class="fa fa-google-plus text-white"></i></a>
																	<a href="" class="btn btn-circle btn-info "><i class="fa fa-twitter text-white"></i></a>
																	<a href="" class="btn btn-circle btn-warning "><i class="fa fa-envelope text-white"></i></a>
																</div>
															</div>
														</div>
													</li>
													<li class="col-lg-3 col-md-6 col-sm-12 col-12">
														<div class="card mb-lg-0">
															<div class="card-body text-center">
																<span class="avatar avatar-xxl brround cover-image" data-image-src="../assets/images/users/female/2.jpg"></span>
																<h4 class="h4 mb-0 mt-3">Inge Coulter</h4>
																<p class="card-text">Web designer</p>
																<div class="socials text-center mt-3">
																	<a href="" class="btn btn-circle btn-primary "><i class="fa fa-facebook text-white"></i></a>
																	<a href="" class="btn btn-circle btn-danger "><i class="fa fa-google-plus text-white"></i></a>
																	<a href="" class="btn btn-circle btn-info "><i class="fa fa-twitter text-white"></i></a>
																	<a href="" class="btn btn-circle btn-warning "><i class="fa fa-envelope text-white"></i></a>
																</div>
															</div>
														</div>
													</li>
													<li class="col-lg-3 col-md-6 col-sm-12 col-12">
														<div class="card mb-lg-0">
															<div class="card-body text-center">
																<span class="avatar avatar-xxl brround cover-image" data-image-src="../assets/images/users/male/4.jpg"></span>
																<h4 class="h4 mb-0 mt-3">Jae Durazo</h4>
																<p class="card-text">Web designer</p>
																<div class="socials text-center mt-3">
																	<a href="" class="btn btn-circle btn-primary "><i class="fa fa-facebook text-white"></i></a>
																	<a href="" class="btn btn-circle btn-danger "><i class="fa fa-google-plus text-white"></i></a>
																	<a href="" class="btn btn-circle btn-info "><i class="fa fa-twitter text-white"></i></a>
																	<a href="" class="btn btn-circle btn-warning "><i class="fa fa-envelope text-white"></i></a>
																</div>
															</div>
														</div>
													</li>
													<li class="col-lg-3 col-md-6 col-sm-12 col-12">
														<div class="card mb-0">
															<div class="card-body text-center">
																<span class="avatar avatar-xxl brround cover-image" data-image-src="../assets/images/users/male/6.jpg"></span>
																<h4 class="h4 mb-0 mt-3">Noel Aguilar</h4>
																<p class="card-text">Web designer</p>
																<div class="socials text-center mt-3">
																	<a href="" class="btn btn-circle btn-primary "><i class="fa fa-facebook text-white"></i></a>
																	<a href="" class="btn btn-circle btn-danger "><i class="fa fa-google-plus text-white"></i></a>
																	<a href="" class="btn btn-circle btn-info "><i class="fa fa-twitter text-white"></i></a>
																	<a href="" class="btn btn-circle btn-warning "><i class="fa fa-envelope text-white"></i></a>
																</div>
															</div>
														</div>
													</li>
												</ul>
											</div>
											<div class="tab-pane" id="tab-71">
												<div class="row gallery">
													<div class="col-lg-3 col-md-6">
														<a href="../assets/images/photos/8.jpg" class="big">
															<img class="img-fluid rounded mb-5" src="../assets/images/photos/8.jpg " alt="banner image" title="Image 01">
														</a>
													</div>
													<div class="col-lg-3 col-md-6">
														<a href="../assets/images/photos/10.jpg" class="big">
															<img class="img-fluid rounded mb-5" src="../assets/images/photos/10.jpg" alt="banner image" title="Image 02">
														</a>
													</div>
													<div class="col-lg-3 col-md-6">
														<a href="../assets/images/photos/11.jpg" class="big">
															<img class="img-fluid rounded mb-5" src="../assets/images/photos/11.jpg" alt="banner image" title="Image 03">
														</a>
													</div>
													<div class="col-lg-3 col-md-6">
														<a href="../assets/images/photos/12.jpg" class="big">
															<img class="img-fluid rounded mb-5 " src="../assets/images/photos/12.jpg" alt="banner image" title="Image 04">
														</a>
													</div>
													<div class="col-lg-3 col-md-6">
														<a href="../assets/images/photos/13.jpg" class="big">
															<img class="img-fluid rounded mb-5" src="../assets/images/photos/13.jpg " alt="banner image" title="Image 05">
														</a>
													</div>
													<div class="col-lg-3 col-md-6">
														<a href="../assets/images/photos/14.jpg" class="big">
															<img class="img-fluid rounded mb-5" src="../assets/images/photos/14.jpg " alt="banner image" title="Image 06">
														</a>
													</div>
													<div class="col-lg-3 col-md-6">
														<a href="../assets/images/photos/15.jpg" class="big">
															<img class="img-fluid rounded mb-5" src="../assets/images/photos/15.jpg " alt="banner image" title="Image 07">
														</a>
													</div>
													<div class="col-lg-3 col-md-6">
														<a href="../assets/images/photos/16.jpg" class="big">
															<img class="img-fluid rounded mb-0" src="../assets/images/photos/16.jpg " alt="banner image" title="Image 08">
														</a>
													</div>
													<div class="col-lg-3 col-md-6">
														<a href="../assets/images/photos/17.jpg" class="big">
															<img class="img-fluid rounded mb-0" src="../assets/images/photos/17.jpg " alt="banner image" title="Image 09">
														</a>
													</div>
													<div class="col-lg-3 col-md-6">
														<a href="../assets/images/photos/18.jpg" class="big">
															<img class="img-fluid rounded mb-0" src="../assets/images/photos/18.jpg " alt="banner image" title="Image 10">
														</a>
													</div>
													<div class="col-lg-3 col-md-6">
														<a href="../assets/images/photos/19.jpg" class="big">
															<img class="img-fluid rounded mb-0" src="../assets/images/photos/19.jpg " alt="banner image" title="Image 11">
														</a>
													</div>
													<div class="col-lg-3 col-md-6">
														<a href="../assets/images/photos/20.jpg" class="big">
															<img class="img-fluid rounded" src="../assets/images/photos/20.jpg " alt="banner image" title="Image 12">
														</a>
													</div>
												</div>
											</div>
											<div class="tab-pane" id="tab-81">
												<div class="wideget-user-followers mb-0">
													<div class="row">
														<div class="col-xl-4 col-lg-6 col-md-12">
															<div class="card">
																<div class="card-body">
																	<div class="media  m-0 mt-0">
																		<img class="avatar brround avatar-md mr-3" src="../assets/images/users/male/18.jpg" alt="avatar-img">
																		<div class="media-body">
																			<a href="" class="text-dark font-weight-semibold">John Paige</a>
																			<p class="text-muted mb-0">johan@gmail.com</p>
																		</div>
																	</div>
																</div>
															</div>
														</div>
														<div class="col-xl-4 col-lg-6 col-md-12">
															<div class="card">
																<div class="card-body">
																	<div class="media m-0 mt-0">
																		<span class="avatar cover-image avatar-md brround bg-pink mr-3">LQ</span>
																		<div class="media-body">
																			<a href="" class="text-dark font-weight-semibold">Lillian Quinn</a>
																			<p class="text-muted mb-0">lilliangore@gmail.com</p>
																		</div>
																	</div>
																</div>
															</div>
														</div>
														<div class="col-xl-4 col-lg-6 col-md-12">
															<div class="card">
																<div class="card-body">
																	<div class="media m-0 mt-0">
																		<span class="avatar cover-image avatar-md brround mr-3">IH</span>
																		<div class="media-body">
																			<a href="" class="text-dark font-weight-semibold">Irene Harris</a>
																			<p class="text-muted mb-0">ireneharris@gmail.com</p>
																		</div>
																	</div>
																</div>
															</div>
														</div>
														<div class="col-xl-4 col-lg-6 col-md-12">
															<div class="card">
																<div class="card-body">
																	<div class="media m-0 mt-0">
																		<img class="avatar brround avatar-md mr-3" src="../assets/images/users/female/22.jpg" alt="avatar-img">
																		<div class="media-body">
																			<a href="" class="text-dark font-weight-semibold">Harry Fisher</a>
																			<p class="text-muted mb-0">harryuqt@gmail.com</p>
																		</div>
																	</div>
																</div>
															</div>
														</div>
														<div class="col-xl-4 col-lg-6 col-md-12">
															<div class="card">
																<div class="card-body">
																	<div class="media m-0 mt-0">
																		<img class="avatar brround avatar-md mr-3" src="../assets/images/users/male/8.jpg" alt="avatar-img">
																		<div class="media-body">
																			<a href="" class="text-dark font-weight-semibold">Eloy Tune</a>
																			<p class="text-muted mb-0">eloytune@gmail.com</p>
																		</div>
																	</div>
																</div>
															</div>
														</div>
														<div class="col-xl-4 col-lg-6 col-md-12">
															<div class="card">
																<div class="card-body">
																	<div class="media m-0 mt-0">
																		<span class="avatar cover-image avatar-md brround bg-pink mr-3">CA</span>
																		<div class="media-body">
																			<a href="" class="text-dark font-weight-semibold">Charlott Asher</a>
																			<p class="text-muted mb-0">charlottasher@gmail.com</p>
																		</div>
																	</div>
																</div>
															</div>
														</div>
														<div class="col-xl-4 col-lg-6 col-md-12">
															<div class="card">
																<div class="card-body">
																	<div class="media m-0 mt-0">
																		<span class="avatar cover-image avatar-md brround mr-3">MP</span>
																		<div class="media-body">
																			<a href="" class="text-dark font-weight-semibold">Mora Purser</a>
																			<p class="text-muted mb-0">morapurser@gmail.com</p>
																		</div>
																	</div>
																</div>
															</div>
														</div>
														<div class="col-xl-4 col-lg-6 col-md-12">
															<div class="card">
																<div class="card-body">
																	<div class="media m-0 mt-0">
																		<img class="avatar brround avatar-md mr-3" src="../assets/images/users/female/2.jpg" alt="avatar-img">
																		<div class="media-body">
																			<a href="" class="text-dark font-weight-semibold">Marna Berney</a>
																			<p class="text-muted mb-0">marnaberney@gmail.com</p>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
											*/?>
										</div>
									</div>
								</div>
							</div>
						</div><!-- COL-END -->
					</div>
	<!-- ROW-1 CLOSED -->
</div>
<!-- CONTAINER CLOSED -->
</div> 

	
@endsection       