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
						<h4 class="page-title"><?php if (isset($_GET['status']) && $_GET['status']==2){ echo 'Blocked Agencies';}else{ echo 'Agencies';}?> </h4>
						<ol class="breadcrumb">
							 <li class="breadcrumb-item"><a href="{{ url('/admin/home') }}">Home</a></li>
                                <li class="breadcrumb-item active"><?php if (isset($_GET['status']) && $_GET['status']==2){ echo 'Blocked Agencies';}else{ echo 'Agencies';}?></li>
							
						</ol>
					</div>
					<!-- PAGE-HEADER END -->

					<!-- ROW-1 OPEN -->
					<div class="row">
						<div class="col-md-12 col-lg-12">
							<div class="card">
															
								 <style>
								 .card-header { display: block;padding: 1rem 0.5rem 0rem 2rem;}
								 table.dataTable thead>tr>th.sorting_asc, table.dataTable thead>tr>th.sorting_desc, table.dataTable thead>tr>th.sorting, table.dataTable thead>tr>td.sorting_asc, table.dataTable thead>tr>td.sorting_desc, table.dataTable thead>tr>td.sorting {
    padding-right: 20px;
}
								 
									 </style>
									 <div class="card-header" id="agencies">
								<form  action="{{ action('Admin\AgenciesController@index')}}" enctype="multipart/form-data" method="get" >								
								
									<div class="row">
										<div class="col-md-2">
											<div class="form-group">
												
												<a style="   width: 100%;" href="{{ url('/admin/agencies/add') }}" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Add New</a> 
											</div>
										</div>
										
										<div class="col-md-3">
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
														<option <?php if (isset($_GET['province']) &&!empty($_GET['province']) && $_GET['province']==strtolower($provinceData->id)){ echo 'selected';}?>  value="{{(strtolower($provinceData->id))}}">{{$provinceData->name}}</option>
														<?php }?>
												</select>
											</div>
										</div>
										
										<div class="col-md-3">
											<div class="form-group">
												
												<input placeholder="Agency Name" class="form-control" value="<?php if (isset($_GET['name']) && !empty($_GET['name'])){ echo $_GET['name'];}?>" type="text" name="name">
												<input class="form-control" value="<?php if (isset($_GET['pending']) && !empty($_GET['pending'])){ echo $_GET['pending'];}?>" type="hidden" name="pending">
											</div>
										</div>
										
										
										
									</div>
								
									<div class="row">
										
										
										<div class="col-md-3">
											<div class="form-group">
												
												<input placeholder="Email" class="form-control" value="<?php if (isset($_GET['email']) &&!empty($_GET['email'])){ echo $_GET['email'];}?>" type="text" name="email">
											</div>
										</div>
										
										<div class="col-md-3">
											<div class="form-group">
												
												<input placeholder="Mobile" class="form-control" value="<?php if (isset($_GET['mobile']) &&!empty($_GET['mobile'])){ echo $_GET['mobile'];}?>" type="text" name="mobile">
											</div>
										</div>
										
										<div class="col-md-3">
											<div class="form-group">
												<?php 
													$status = array(
														'all'=>'All',
														'1'=>'Unblock',
														'2'=>'Block',
													);													
												?>
												<select name="status" class="form-control custom-select">
													<option value="">--Select Status--</option>
													<?php foreach($status as $key=>$statusData){?>
														<option <?php if (isset($_GET['status']) && $_GET['status']==$key){ echo 'selected';}?>  value="{{$key}}">{{$statusData}}</option>
														<?php }?>
												</select>
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
												<tr>																								
												<th>Photo</th>
												<th>Agency Name</th>
												<th>Email</th>                      
												<th>Mobile</th>                      
												<th>Ads</th>                      
												<th>Registration Date</th>
												<th>Action</th>
												</tr>
											</thead>
											<tbody>
												<?php $i=1; ?> 
												@foreach($agencies as $data)
												<?php $get_anuncios = get_anuncios($data->id);?>
												<tr>
													<td style="text-align: center;"> 
														<?php 
														if(!empty($data->upload_logo)){?>
														<img src="<?php echo URL::asset('public/uploads/profile_logo/'.$data->upload_logo);?>" class="avatar avatar-md rounded-circle">
														<?php }else{?>
														<img src="<?php echo URL::asset('public/admin/assets/images/admin-image.png');?>" class="avatar avatar-md rounded-circle">
														<?php }?>
													</td>
													<td>{{ $data->name }}</td>	
													
													<td>{{ $data->email }} 
													<?php if($data->is_email!=1){?>
														<i data-toggle="tooltip"  data-original-title="Unverified" style="color:#d93600;" class="fa fa-times"></i> 
													<?php }else{?>
														<i data-toggle="tooltip"  data-original-title="Verified" style="color:#00d96c;" class="fa fa-check"></i>																		
													<?php }?>
													</td>
													<td>{{ $data->mobile }} 
													<?php if($data->is_mobile!=1){?>
														<i data-toggle="tooltip" data-original-title="Unverified"  style="color:#d93600;" class="fa fa-times"></i> 
													<?php }else{?>
														<i data-toggle="tooltip"  data-original-title="Verified" style="color:#5cff26;" class="fa fa-check"></i>																		
													<?php }?>
													</td>													
													<td><span class="btn btn-sm btn-primary" style="width: 100%;background: #3B5998 !important;   border: #3B5998 !important;">{{$get_anuncios}}</span></td>
													<td><?php  echo date('d-m-Y h:i:s A',strtotime($data->created_at));;?>													
													</td>
													<td>	
													<a  data-toggle="tooltip" data-original-title="View" class="btn btn-sm btn-primary" href="{{url('/admin/agencies/view/')}}/{{$data->id}}" ><i class="fa fa-search"></i> View</a>	
													<a  data-toggle="tooltip" data-original-title="Edit" class="btn btn-sm btn-primary" href="{{url('/admin/agencies/edit/')}}/{{$data->id}}" ><i class="fa fa-edit"></i> Edit</a>																				
													<a  data-id="{{$data->id}}"  data-location="agencies"    href="javascript:void(0);" data-toggle="tooltip" data-original-title="Delete" class="btn btn-sm btn-danger sa-params"  ><i class="fa fa-trash"></i> Delete</a>
													<?php if($data->status==1){	?>
													<a onclick="return confirm('Are you sure want to block this agencies?')"  data-toggle="tooltip" data-original-title="Block" class="btn btn-sm btn-danger" href="{{url('/admin/agencies/status/')}}/{{$data->id}}" ><i class="fa fa-times"></i> Block</a>
													<?php }else{?>
													
													<a onclick="return confirm('Are you sure want to unblock this agencies?')"  data-toggle="tooltip" data-original-title="Unblock" class="btn btn-sm btn-primary Unblock" href="{{url('/admin/agencies/status/')}}/{{$data->id}}" ><i class="fa fa-check"></i> Unblock</a>
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