@extends('admin.layouts.frontlayout')
@section('content')
	<!-- Page Heading -->
	@if (Session::has('message'))
	<span class="alert-id-m" id="sa-close" >{!! session('message') !!}</span>
	@endif 
	
<!-- CONTAINER -->
				<div class="container content-area relative">

				   <!-- PAGE-HEADER -->
					<div class="page-header">
						<h1 class="page-title">{{ucwords($title)}}</h1>
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="#">Members</a></li>
							<li class="breadcrumb-item active" aria-current="page">{{ucwords($title)}}</li>
						</ol>
					</div>
					<!-- PAGE-HEADER END -->

					<!-- ROW-1 OPEN -->
					<div class="row">
						<div class="col-md-12 col-lg-12">						
							 
							 <div class="card">
							 <style> .card-header { display: block;padding: 1rem 0.5rem 0rem 2rem;}</style>
								<div class="card-header">
								<form  action="{{url('/admin/profile_agency/index/')}}/{{$category}}" enctype="multipart/form-data" method="get" >								
								
									<div class="row">
										
										<?php if($title=='Blocked Ads'){?>
										<?php }else if($title=='Ads with Selfies'){?>
										<?php }else if($title=='Free AD agency'){?>
										
										<?php }else{ ?>
										<div class="col-md-2">
											<div class="form-group">
												
												<a style="   width: 100%;" href="{{ url('/admin/profile/add/'.strtolower($title).'') }}" class="btn btn-primary {{$category}}"><i class="fa fa-plus-circle"></i> Add New</a> 
												
												
											</div>
										</div>
											
										<?php 	} ?>
										
										<?php if($title=='Blocked Ads' || $title=='Ads with Selfies'|| $title=='Free AD agency'){?>
										<div class="col-md-2">
											<div class="form-group">
												
												<select name="category" class="form-control custom-select">
													<option value="">--Select Category--</option>
													<?php foreach($categories as $key=>$categoriesData){?>
														<option <?php if (isset($_GET['category']) &&!empty($_GET['category']) && $_GET['category']==strtolower($categoriesData->name)){ echo 'selected';}?>  value="{{strtolower($categoriesData->name)}}">{{$categoriesData->name}}</option>
														<?php }?>
												</select>
											</div>
										</div>
										<?php } ?>
										
										
										<div class="col-md-3">
											<div class="form-group">
												
												<select name="province" class="form-control custom-select">
													<option value="">--Select Province--</option>
													<?php foreach($province as $key=>$provinceData){?>
														<option <?php if (isset($_GET['province']) &&!empty($_GET['province']) && $_GET['province']==strtolower($provinceData->id)){ echo 'selected';}?>  value="{{($provinceData->id)}}">{{$provinceData->name}}</option>
														<?php }?>
												</select>
											</div>
										</div>
									
										
										<div class="col-md-3">
											<div class="form-group">
												
												<input placeholder="Name" class="form-control" value="<?php if (isset($_GET['name']) &&!empty($_GET['name'])){ echo $_GET['name'];}?>" type="text" name="name">
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group">
												
												<input placeholder="Email" class="form-control" value="<?php if (isset($_GET['email']) &&!empty($_GET['email'])){ echo $_GET['email'];}?>" type="text" name="email">
											</div>
										</div>
										
										<div class="col-md-2">
											<div class="form-group">
												
												<input placeholder="Telephone" class="form-control" value="<?php if (isset($_GET['mobile']) &&!empty($_GET['mobile'])){ echo $_GET['mobile'];}?>" type="text" name="mobile">
											</div>
										</div>
										
										<div class="col-md-2">
											<div class="form-group">
												
									<button type="submit" class="btn btn-primary">Search</button>
								
											</div>
										</div>
										
									</div>
								
								
							</form>
										
								</div>
									
					
								<div class="card-body">
									<div class="table-responsive">
										<table id="packages" class="table table-striped table-bordered text-nowrap w-100">
											<thead class="thead-light">												
												<th  class="text-center">PHOTO</th>												
												<th  class="text-center">NAME</th>                      												
												<?php if($title=='Blocked Ads' || $title=='Ads with Selfies' || $title=='Free AD agency'){?><th  class="text-center">Category</th><?php } ?>
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
													<?php  if($title=='Blocked Ads' || $title=='Ads with Selfies' || $title=='Free AD agency'){?><td>{{ ucfirst($data->category) }}</td><?php } ?>
													<td>{{ $data->email }} 
													<?php if($data->is_email!=1){?>
														<i data-toggle="tooltip"  data-original-title="Unverified" style="color:#d93600;" class="fa fa-times"></i> 
													<?php }else{?>
														<i data-toggle="tooltip"  data-original-title="Verified" style="color:#00d96c;" class="fa fa-check"></i>																		
													<?php }?>
													</td>
													<td>{{ $data->telephone}} 
													<?php if($data->telephone_verify!=1){?>
														<i data-toggle="tooltip" data-original-title="Unverified"  style="color:#d93600;" class="fa fa-times"></i> 
													<?php }else{?>
														<i data-toggle="tooltip"  data-original-title="Verified" style="color:#5cff26;" class="fa fa-check"></i>																		
													<?php }?>
													</td>	
													<td>{{  date('d-m-Y h:i:s a', strtotime($data->created_at)) }}</td>
													<td>
													<a  data-toggle="tooltip" data-original-title="View" class="btn btn-sm btn-primary" href="{{url('/admin/profile/view/')}}/{{$data->id}}" ><i class="fa fa-search"></i> View</a>	
													<a  data-toggle="tooltip" data-original-title="Edit" class="btn btn-sm btn-primary" href="{{url('/admin/profile/edit/')}}/{{$data->id}}" ><i class="fa fa-edit"></i> Edit</a>																				
													<a   data-location="profile" onclick="return confirm('Are you sure?')"    href="{{url('/admin/profile/delete/')}}/{{$data->id}}/{{$category}}" class="btn btn-sm btn-danger badge sa-params-old"  ><i class="fa fa-trash"></i> Delete</a>
													<?php if($data->status==1){	?>
													<a onclick="return confirm('Are you sure want to block this profile?')"  data-toggle="tooltip" data-original-title="Block" class="btn btn-sm btn-danger" href="{{url('/admin/profile/status/')}}/{{$data->id}}/{{$category}}" ><i class="fa fa-times"></i> Block</a>
													<?php }else{?>
													
													<a onclick="return confirm('Are you sure want to unblock this profile?')"  data-toggle="tooltip" data-original-title="Unblock" class="btn btn-sm btn-primary Unblock" href="{{url('/admin/profile/status/')}}/{{$data->id}}/{{$category}}" ><i class="fa fa-check"></i> Unblock</a>
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