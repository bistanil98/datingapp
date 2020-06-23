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
						<h4 class="page-title">{{ucwords($title)}}</h4>
						<ol class="breadcrumb">
							 <li class="breadcrumb-item"><a href="{{ url('/admin/home') }}">Home</a></li>
                             <li class="breadcrumb-item active">{{ucwords($title)}}</li>
						</ol>
					</div>
					<!-- PAGE-HEADER END -->

					<!-- ROW-1 OPEN -->
					<div class="row">
						<div class="col-md-12 col-lg-12">
							<div class="card">
								<div class="card-header">
									<?php /*<div class="card-title">Data Tables</div> &nbsp;*/?>
									<a href="{{ url('/admin/profile/add') }}" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Add New</a> 
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table id="examples1" class="table table-striped table-bordered text-nowrap w-100">
											<thead class="thead-light">
												<tr>
												<th>S.No</th>
												<th>Photo</th>												
												<th>Name</th>                      
												<th>Telephone</th>                      
												<th>Date</th>                      
												<th>Status</th>
												<th>Action</th>
												</tr>
											</thead>
											<tbody>
												<?php $i=1; ?> 
												@foreach($profile as $data)
												<tr>
													<td>{{ $i++ }}</td>
													<td> 
														<?php $profile =  profile_photo($data->id);
														if(!empty($profile)){?>
														<img src="<?php echo URL::asset('public/uploads/profile_ads/'.$profile);?>" class="avatar avatar-md rounded-circle">
														<?php }?>
														</td>																		
													<td>{{ $data->first_name }}</td>																		
													<td>{{ $data->telephone }}</td>																															
													<td>{{ $data->created_at }}</td>																		
													<td><?php 
													if($data->status==1){	?>
													<i data-toggle="tooltip" data-original-title="Active"  class="btn btn-sm btn-primary fa fa-check"></i>
													<?php }else{?>
													<i  data-toggle="tooltip" data-original-title="Deactive"   class="btn btn-sm btn-danger fa fa-times"></i>
													<?php } ?>
													</td>
													<td>													
													<a  data-toggle="tooltip" data-original-title="View" class="btn btn-sm btn-primary" href="{{url('/admin/profile/view/')}}/{{$data->id}}" ><i class="fa fa-search"></i> View</a>							
													<a  data-toggle="tooltip" data-original-title="Edit" class="btn btn-sm btn-primary" href="{{url('/admin/profile/edit/')}}/{{$data->id}}" ><i class="fa fa-edit"></i> Edit</a>							
													<a  data-id="{{$data->id}}"  data-location="profile_ads"    href="#" data-toggle="tooltip" data-original-title="Delete" class="btn btn-sm btn-danger sa-params"  ><i class="fa fa-trash"></i> Delete</a>
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