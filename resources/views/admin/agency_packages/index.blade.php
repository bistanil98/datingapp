@extends('admin.layouts.frontlayout')
@section('content')
	<!-- Page Heading -->
	@if (Session::has('message'))
	<span class="alert-id-m-" id="sa-close" >{!! session('message') !!}</span>
	@endif 
	
<!-- CONTAINER -->
				<div class="container content-area relative">

				   <!-- PAGE-HEADER -->
					<div class="page-header">
						<h4 class="page-title">Agency Packages</h4>
						<ol class="breadcrumb">
							 <li class="breadcrumb-item"><a href="{{ url('/admin/home') }}">Home</a></li>
                                <li class="breadcrumb-item active">Agency Packages</li>
							
						</ol>
					</div>
					<!-- PAGE-HEADER END -->

					<!-- ROW-1 OPEN -->
					<div class="row">
						<div class="col-md-12 col-lg-12">
							<div class="card">
								<div class="card-header">
									<?php /*<div class="card-title">Data Tables</div> &nbsp;*/?>
									<a href="{{ url('/admin/agency-packages/add') }}" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Add Agency Packages</a> 
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table id="examples1" class="table table-striped table-bordered text-nowrap w-100">
											<thead class="thead-light">
												
												<th>Pack</th>                      
												<th>Advertisements</th>                      
												<th>Days</th>                      
												<th>Uploads</th>                      
												<th>Price(€)</th>                      												
												<th>Action</th>
												</tr>
											</thead>
											<tbody>
												<?php $i=1; ?> 
												@foreach($agency_packages as $data)
												<tr>													
													<td>
													<?php if($data->pack_number=='1'){
														 echo 'Agency pack 1';
														}else if($data->pack_number=='2'){
														 echo 'Agency pack 2';
														}else if($data->pack_number=='3'){
														 echo 'Agency pack 3';
														}
														?>
													</td>
													<td>{{ $data->advertisements }}</td>																		
													<td>{{ $data->days }}</td>
													<td>{{ $data->uploads }}</td>																		
													<td>{{ $data->price }}</td>
													<td>
													<a  data-toggle="tooltip" data-original-title="Edit" class="btn btn-sm btn-primary" href="{{url('/admin/agency-packages/edit/')}}/{{$data->id}}" ><i class="fa fa-edit"></i> Edit</a>							
													<?php /*<a  data-id="{{$data->id}}"  data-location="agency-packages"    href="#" data-toggle="tooltip" data-original-title="Delete" class="btn btn-sm btn-danger sa-params"  ><i class="fa fa-trash"></i> Delete</a>*/?>
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