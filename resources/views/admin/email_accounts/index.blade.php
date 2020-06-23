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
						<h4 class="page-title">Email Accounts</h4>
						<ol class="breadcrumb">
							 <li class="breadcrumb-item"><a href="{{ url('/admin/home') }}">Home</a></li>
                                <li class="breadcrumb-item active">Email Accounts</li>
							
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
								<button id="delete" type="button" class="btn btn-success" name="save">DELETE</button>
									<div class="table-responsive">
									<form  id="profile-ads"  method="post" action="{{url('/admin/email-accounts/multidelete')}}" enctype="multipart/form-data">
									@csrf
										<table id="packages" class="table table-striped table-bordered text-nowrap w-100">
											<thead class="thead-light">
												<tr>	
												<th><input type="checkbox" id="checkAl"> Select All</th>
												<th>Photo</th>												
												<th>Email</th>                      
												<th>Mobile</th>	
												<th>Role</th>  
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
												<td style="text-align: center;"> <input type="checkbox" id="checkItem" name="check[]" value="<?php echo $data->id; ?>"></td>
													<td style="text-align: center;"> 
														<?php 
														if(!empty($data->upload_logo)){?>
														<img src="<?php echo URL::asset('public/uploads/profile_logo/'.$data->upload_logo);?>" class="avatar avatar-md rounded-circle">
														<?php }else{?>
														<img src="<?php echo URL::asset('public/admin/assets/images/admin-image.png');?>" class="avatar avatar-md rounded-circle">
														<?php }?>
													</td>
													
													<td>{{ $data->email }} 
													<?php if( $data->is_email!=1){?>
														<i data-toggle="tooltip"  data-original-title="Unverified" style="color:#d93600;" class="fa fa-times"></i> 
													<?php }else{?>
														<i data-toggle="tooltip"  data-original-title="Verified" style="color:#00d96c;" class="fa fa-check"></i>																		
													<?php }?>
													</td>
															
														<td>{{ $data->mobile }} 
													<?php if($data->mobile!=''){?>
													<?php if($data->is_mobile!=1){?>
														<i data-toggle="tooltip" data-original-title="Unverified"  style="color:#d93600;" class="fa fa-times"></i> 
													<?php }else{?>
														<i data-toggle="tooltip"  data-original-title="Verified" style="color:#5cff26;" class="fa fa-check"></i>																		
													<?php }?>
													<?php }?>
													</td>	
														<td>
														{{$data->role}}
														</td>
														<td><span class="btn btn-sm btn-primary" style="width: 100%;background: #3B5998 !important;   border: #3B5998 !important;">{{$get_anuncios}}</span></td>
													
													<td><?php  echo date('d-m-Y h:i:s A',strtotime($data->created_at));;?>													
													</td>
													<td>	
													
													
													<a  data-id="{{$data->id}}"  data-location="email-accounts"    href="javascript:void(0);" data-toggle="tooltip" data-original-title="Delete" class="btn btn-sm btn-danger sa-params"  ><i class="fa fa-trash"></i> Delete</a>
													
													</td>
												</tr>
												@endforeach												
											</tbody>
										</table>
										</form>
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
		<script src="{{URL::asset('public/admin/assets/js/vendors/jquery-3.2.1.min.js')}}"></script>
		<script>
$("#checkAl").click(function () {
$('input:checkbox').not(this).prop('checked', this.checked);
});

$("#delete").click(function () {
var confirm1 = confirm('Are you sure to delete member? All information and Ads will be deleted for member account.');
  if (confirm1) {
    $("#profile-ads").submit();
  } else {    
	return false;
  }  
});
</script>
@endsection       