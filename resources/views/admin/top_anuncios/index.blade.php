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
								<form  action="{{url('/admin/top_anuncios/index')}}" enctype="multipart/form-data" method="get" >								
								
									<div class="row">
										
									
										
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
												<th  class="text-center">Category</th>												
												<th  class="text-center">TELEPHONE</th>
												<th  class="text-center">Price</th>
													<th  class="text-center">Contracted for</th>
												<th  class="text-center">Left Days</th>
												<th  class="text-center">Start/Expire Date</th>
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
													<td>{{ $data->telephone }}</td>
													<td>{{ $data->total_price }} €</td>		
														<td>{{$data->seen_days}} dias</td>		
															<td>
												<?php 	$from_date = \Carbon\Carbon::createFromFormat('Y-m-d', $data->from_date);
													$to_date = \Carbon\Carbon::createFromFormat('Y-m-d', $data->to_date);
													$start_expiry_days = $from_date->diffInDays($to_date);
													$start_date = \Carbon\Carbon::createFromFormat('Y-m-d', $data->from_date);
													$current_date = \Carbon\Carbon::createFromFormat('Y-m-d', date('Y-m-d'));
													$mindays = $from_date->diffInDays($current_date);
													$totalleftdays = $start_expiry_days-$mindays;?>
													{{ $totalleftdays }} dias
														</td>	
													<td>
														{{  date('d-m-Y', strtotime($data->from_date)) }}/{{  date('d-m-Y', strtotime($data->to_date)) }}
														</td>
													<td>
													<a target="_blank"  data-toggle="tooltip" data-original-title="History" class="btn btn-sm btn-primary" href="{{url('/admin/top_anuncios/view/')}}/{{$data->top_subidaId}}" ><i class="fa fa-search"></i> History</a>	
													<a  traget="_blank"  data-toggle="tooltip" data-original-title="View" class="btn btn-sm btn-primary" href="{{url('/admin/profile/view/')}}/{{$data->id}}" ><i class="fa fa-search"></i> View</a>	
													<a  traget="_blank"  data-toggle="tooltip" data-original-title="Edit" class="btn btn-sm btn-primary" href="{{url('/admin/profile/edit/')}}/{{$data->id}}" ><i class="fa fa-edit"></i> Edit</a>																				
													<a traget="_blank"   data-location="profile" onclick="return confirm('Are you sure?')"    href="{{url('/admin/profile/delete/')}}/{{$data->id}}/{{$data->category}}" class="btn btn-sm btn-danger badge sa-params-old"  ><i class="fa fa-trash"></i> Delete</a>
														<?php if($data->status==1){	?>
													<a  traget="_blank"  onclick="return confirm('Are you sure want to block this profile?')"  data-toggle="tooltip" data-original-title="Block" class="btn btn-sm btn-danger" href="{{url('/admin/profile/status/')}}/{{$data->id}}/{{$data->category}}" ><i class="fa fa-times"></i> Block</a>
													<?php }else{?>
													
													<a  traget="_blank"  onclick="return confirm('Are you sure want to unblock this profile?')"  data-toggle="tooltip" data-original-title="Unblock" class="btn btn-sm btn-primary Unblock" href="{{url('/admin/profile/status/')}}/{{$data->id}}/{{$data->category}}" ><i class="fa fa-check"></i> Unblock</a>
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