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
						<h4 class="page-title">Province</h4>
						<ol class="breadcrumb">
							 <li class="breadcrumb-item"><a href="{{ url('/admin/home') }}">Home</a></li>
                                <li class="breadcrumb-item active">Province</li>
							
						</ol>
					</div>
					<!-- PAGE-HEADER END -->

					<!-- ROW-1 OPEN -->
					<div class="row">
						<div class="col-md-12 col-lg-12">
							<div class="card">
								<div class="card-header">
									<?php /*<div class="card-title">Data Tables</div> &nbsp;*/?>
									<a href="{{ url('/admin/province/add') }}" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Add New</a> 
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table id="provinceTable" class="table table-striped table-bordered text-nowrap w-100">
											<thead class="thead-light">
												<tr>													
												<th>Province</th>                      
												<th>Meta Title</th>                      
												<th>Meta Decription</th>                      												
												<th>Status</th>
												<th>Action</th>
												</tr>
											</thead>
											<tbody>
												
												@foreach($province as $data)
												<tr>													
													<td>{{ $data->name }}</td>																		
													<td>{{ $data->meta_title }}</td>																		
													<td>{{ $data->meta_description }}</td>																		
													<td><?php 
													if($data->status==1){	?>
													<i data-toggle="tooltip" data-original-title="Active"  class="btn btn-sm btn-primary fa fa-check"></i>
													<?php }else{?>
													<i  data-toggle="tooltip" data-original-title="Deactive"   class="btn btn-sm btn-danger fa fa-times"></i>
													<?php } ?>
													</td>
													<td>													
													<a  data-toggle="tooltip" data-original-title="Edit" class="btn btn-sm btn-primary" href="{{url('/admin/province/edit/')}}/{{$data->id}}" ><i class="fa fa-edit"></i> Edit</a>							
													<a  data-id="{{$data->id}}"  data-location="province"    href="#" data-toggle="tooltip" data-original-title="Delete" class="btn btn-sm btn-danger sa-params"  ><i class="fa fa-trash"></i> Delete</a>
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
		<style>
		div.dataTables_wrapper div.dataTables_filter input {
 
    width: 346px;
}
</style>
@endsection       