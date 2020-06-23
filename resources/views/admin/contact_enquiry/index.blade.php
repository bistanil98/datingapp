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
						<h4 class="page-title">Messages</h4>
						<ol class="breadcrumb">
							 <li class="breadcrumb-item"><a href="{{ url('/admin/home') }}">Home</a></li>
                                <li class="breadcrumb-item active">Messages</li>
							
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
								<div class="card-body">
									<div class="table-responsive">
										<table id="packages" class="table table-striped table-bordered text-nowrap w-100">
											<thead class="thead-light">
												<tr>																								
												<th>Photo</th>
												<th>Name</th>
												<th>Email</th>                      
												<th>Mobile</th>                      
												<th>Comments</th>                      
												<th>Role</th>  												
												<th>Enquiry Date</th>
												<th>Action</th>
												</tr>
											</thead>
											<tbody>
												<?php $i=1; ?> 
												@foreach($agencies as $data)
												
												<tr>
													<td style="text-align: center;">
													<?php if($data->type=='agency'){?>
													<?php $AgencyLogo = AgencyLogo($data->id);?>
														<?php if(!empty($AgencyLogo)){?>
														
														<img src="<?php echo URL::asset('public/uploads/profile_logo/'.$AgencyLogo);?>" class="avatar avatar-md rounded-circle">
														<?php }else{?>
														<img src="<?php echo URL::asset('public/admin/assets/images/admin-image.png');?>" class="avatar avatar-md rounded-circle">
														<?php } ?>
													<?php }else{ ?>
														<?php $individualLogo = individualLogo($data->id);?>
														<?php if(!empty($individualLogo)){?>
														<img src="<?php echo URL::asset('public/uploads/profile_ads/'.$individualLogo);?>" class="avatar avatar-md rounded-circle">
														<?php }else{?>
														<img src="<?php echo URL::asset('public/admin/assets/images/admin-image.png');?>" class="avatar avatar-md rounded-circle">
														<?php } ?>
														<?php } ?>
													
													</td>
													<td>{{ $data->name }}</td>														
													<td>{{ $data->email }} </td>
													<td>{{ $data->telephone }} </td>
													<td>{{ $data->comments }} </td>
													<td>{{ $data->type }} </td>
													<td><?php  echo date('d-m-Y h:i:s A',strtotime($data->created_at));;?></td>
													<td>	
													<a  data-id="{{$data->id}}"  data-location="contact-enquiry"    href="javascript:void(0);" data-toggle="tooltip" data-original-title="Delete" class="btn btn-sm btn-danger sa-params"  ><i class="fa fa-trash"></i> Delete</a>													
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