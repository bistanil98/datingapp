@extends('admin.layouts.frontlayout')
@section('content')

<!-- Page Heading -->


<!-- CONTAINER -->
<div class="container content-area relative">
	
	<!-- PAGE-HEADER -->
	<div class="page-header">
		<h4 class="page-title">Auto Subidas Anuncios</h4>
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="{{ url('/admin/home') }}">Home</a></li>
			<li class="breadcrumb-item"><a href="{{ url('/admin/auto_subidas_anuncios') }}">Auto Subidas Anuncios</a></li>                                
			<li class="breadcrumb-item active">View History</li>
			
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
														<img width="100" class="" src="<?php echo URL::asset('public/uploads/profile_ads/'.$data->profile_pic);?>" alt="img" class="avatar avatar-md rounded-circle">													
													</div>
													<div class="user-wrap">
														<h4>{{$data->first_name}}</h4>
														<h6 class="text-muted mb-3">Create Date: {{  date('d-m-Y h:s:i', strtotime($data->created_at)) }}   
														</h6>
														
														<a class="btn btn-primary mt-1 mb-1" href="{{ url('/admin/auto_subidas_anuncios/index') }}"><i class="fa fa-arrow-left"></i> Back</a> 
														
													</div>
												</div>
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
													<table class="table card-table table-vcenter text-nowrap">
										<thead>
											<tr>
												<th>Start Date</th>
												<th>Expire Date</th>
												<th>Total Price</th>
												<th>Payment Type</th>
												
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>{{$data->from_date}}</td>
												<td> {{$data->to_date}}</td>
												<td>{{$data->total_price}} €</td>
												<td>{{$data->payment_type}}</td>
												
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
						</div><!-- COL-END -->
					</div>
	<!-- ROW-1 CLOSED -->
</div>
<!-- CONTAINER CLOSED -->
</div> 

	
@endsection       