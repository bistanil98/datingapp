@extends('admin.layouts.frontlayout')
@section('content')

<!-- Page Heading -->


<!-- CONTAINER -->
<div class="container content-area relative">
	
	<!-- PAGE-HEADER -->
	<div class="page-header">
		<h4 class="page-title">Agencies</h4>
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="{{ url('/admin/home') }}">Home</a></li>
			<li class="breadcrumb-item"><a href="{{ url('/admin/agencies') }}">Agencies</a></li>                                
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
											<div class="col-lg-12 col-md-12">
												<div class="wideget-user-desc d-flex">
													<div class="wideget-user-img">
													<?php if(!empty($agencies->upload_logo)){?>
														<img class="" src="<?php if(!empty($agencies->upload_logo)){  echo URL::asset('public/uploads/profile_logo/'.$agencies->upload_logo); }?>" alt="img">
														<?php }?>
													</div>
												
													<div id="profile-log-switch">
												<?php /*
													<div class="media-heading">
														<h5 class="text-uppercase"><strong>Personal Information</strong></h5>
													</div>*/?>
													
													<div class="table-responsive ">
														<table class="table row table-borderless">
															<tbody class="col-lg-12 col-xl-6 p-0">
															 <tr>
																	<td><strong>Name :</strong> {{$agencies->name}}</td>
																</tr>
																<tr>
																	<td><strong>Member Since :</strong><?php  echo date('F, d Y',strtotime($agencies->created_at)); ?></td>
																</tr>
																
																
															</tbody>
															
															<tbody class="col-lg-12 col-xl-6 p-0">
															 <tr>
																	<td><strong>Email :</strong> {{$agencies->email}}</td>
																</tr>
																<tr>
																	<td><strong>Phone :</strong> {{$agencies->mobile}} </td>
																</tr>
																
																
															</tbody>
															<tbody class="col-lg-12 col-xl-6 p-0">
																<tr>
																	<td><strong>Provincia :</strong> <?php $province = province($agencies->provincia);
																	if(!empty($province)){
																	echo $province;
																	}
																		?></td>
																</tr>
																<tr>
																	<td><strong>Population :</strong> {{$agencies->population}}</td>
																</tr>
																<tr>
																	<td><strong>Zona :</strong> {{$agencies->zona}}</td>
																</tr>
															</tbody>
															
															<tbody class="col-lg-12 col-xl-6 p-0">
																<tr>
																	<td><strong>Whatsapp :</strong> {{$agencies->whatsapp}}</td>
																</tr>
																<tr>
																	<td><strong>Banner Link :</strong> {{$agencies->banner_link}}</td>
																</tr>
																<tr>
																	<td><strong>Founder Year :</strong> {{$agencies->founder_year}} </td>
																</tr>
															</tbody>
															<tbody class="col-lg-12 col-xl-6 p-0">
															<tr>
																	<td><strong>Category :</strong> {{$agencies->agency_category}}</td>
																</tr>
																<tr>
																	<td><strong>Website :</strong> {{$agencies->website}}</td>
																</tr>
																
																<tr>
																	<td>
																	<a   class="btn btn-primary mt-1 mb-1" href="{{url('/admin/agencies/edit/')}}/{{$agencies->id}}" ><i class="fa fa-edit"></i> Edit</a>							
														<a class="btn btn-primary mt-1 mb-1" href="{{ url('/admin/agencies') }}"><i class="fa fa-arrow-left"></i> Back</a> 
																	</td>
																</tr>																
															</tbody>
														</table>
													</div>
													</div>
													
												</div>
												
												
											</div>
										</div>
									</div>
								</div>
								
							</div>
						</div><!-- COL-END -->
					</div>
	<!-- ROW-1 CLOSED -->
	
	
		<!-- ROW-1 OPEN -->
					<div class="row">
						<div class="col-md-12 col-lg-12">						
							 
							 <div class="card">
							 <style> .card-header { display: block;padding: 1rem 0.5rem 0rem 2rem;}</style>
								
									
					
								<div class="card-body">
									<div class="table-responsive">
										<table id="packages" class="table table-striped table-bordered text-nowrap w-100">
											<thead class="thead-light">												
												<th  class="text-center">PHOTO</th>												
												<th  class="text-center">NAME</th>                      												
												<th  class="text-center">Category</th>
												<th  class="text-center">Email</th>
												<th  class="text-center">TELEPHONE</th>
												<th  class="text-center">Created Date</th>
												<th  class="text-center">ACTIONS</th>
												</tr>
											</thead>
											<tbody>
												
											@foreach($profile as $data)
												<tr>
													<td>
													<?php 
														if(!empty($data->profile_pic)){?>
														<img src="<?php echo URL::asset('public/uploads/profile_ads/'.$data->profile_pic);?>" class="avatar avatar-md rounded-circle">
														<?php }?>
														</td>
													<td>{{ $data->first_name }}</td>
													<td>{{ ucfirst($data->category) }}</td>
													<td>{{ get_email($data->member_id) }}</td>
													<td>{{ $data->telephone }}</td>
													<td>{{  date('d-m-Y h:i:s a', strtotime($data->created_at)) }}</td>
													<td>
													<a target="_blank"  data-toggle="tooltip" data-original-title="View" class="btn btn-sm btn-primary" href="{{url('/admin/profile/view/')}}/{{$data->id}}" ><i class="fa fa-search"></i> View</a>	
													<a target="_blank"  data-toggle="tooltip" data-original-title="Edit" class="btn btn-sm btn-primary" href="{{url('/admin/profile/edit/')}}/{{$data->id}}" ><i class="fa fa-edit"></i> Edit</a>																				
													<a target="_blank"   data-location="profile" onclick="return confirm('Are you sure?')"    href="{{url('/admin/profile/delete/')}}/{{$data->id}}/{{$data->category}}" class="btn btn-sm btn-danger badge sa-params-old"  ><i class="fa fa-trash"></i> Delete</a>
													<?php if($data->status==1){	?>
													<a target="_blank" onclick="return confirm('Are you sure want to block this profile?')"  data-toggle="tooltip" data-original-title="Block" class="btn btn-sm btn-danger" href="{{url('/admin/profile/status/')}}/{{$data->id}}/{{$data->category}}" ><i class="fa fa-times"></i> Block</a>
													<?php }else{?>
													
													<a target="_blank" onclick="return confirm('Are you sure want to unblock this profile?')"  data-toggle="tooltip" data-original-title="Unblock" class="btn btn-sm btn-primary Unblock" href="{{url('/admin/profile/status/')}}/{{$data->id}}/{{$data->category}}" ><i class="fa fa-check"></i> Unblock</a>
													<?php } ?>
													</td>
												</tr>
												@endforeach												
											</tbody>
										</table>
									</div>
								</div>
								<!-- TABLE WRAPPER -->
							</div>
							<!-- SECTION WRAPPER -->
						</div>
					</div>
					<!-- ROW-1 CLOSED -->
</div>
<!-- CONTAINER CLOSED -->
</div> 

	
@endsection       