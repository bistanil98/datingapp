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
						<h4 class="page-title">Population</h4>
						<ol class="breadcrumb">
							 <li class="breadcrumb-item"><a href="{{ url('/admin/home') }}">Home</a></li>
                                <li class="breadcrumb-item active">Population</li>
							
						</ol>
					</div>
					<!-- PAGE-HEADER END -->

					<!-- ROW-1 OPEN -->
					<div class="row">
						<div class="col-md-12 col-lg-12">
							<div class="card">
								 <style> .card-header { display: block;padding: 1rem 0.5rem 0rem 2rem;} </style>
								<div class="card-header">
								<form  action="{{ action('Admin\PopulationController@index')}}" enctype="multipart/form-data" method="get" >
									
								
									<div class="row">
										<div class="col-md-2">
											<div class="form-group">
												
											<a href="{{ url('/admin/population/add') }}" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Add New</a> 
											</div>
										</div>
												<div class="col-md-3">
											<div class="form-group">
												
												<select name="province" class="form-control custom-select">
													<option value="">--Select Province--</option>
													<?php foreach($province as $key=>$provinceData){?>
														<option <?php if (isset($_GET['province']) &&!empty($_GET['province']) && $_GET['province']==($provinceData->id)){ echo 'selected';}?>  value="{{(($provinceData->id))}}">{{$provinceData->name}}</option>
														<?php }?>
												</select>
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group">												
												<input  name="name"  class="form-control" value="<?php if (isset($_GET['name']) &&!empty($_GET['name']) ){ echo $_GET['name'];}?>">																								
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
										<table id="populationTable" class="table table-striped table-bordered text-nowrap w-100">
											<thead class="thead-light">
												<th>Province</th>                         
												<th>Population</th>           
												<th>Meta Title</th>                      
												<th>Meta Decription</th>           												               
												<th>Status</th>
												<th>Action</th>
												</tr>
											</thead>
											<tbody>
												
												@foreach($population as $data)
												<tr>
													<td>{{ $data->province_name }}</td>																		
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
													<a  data-toggle="tooltip" data-original-title="Edit" class="btn btn-sm btn-primary" href="{{url('/admin/population/edit/')}}/{{$data->id}}" ><i class="fa fa-edit"></i> Edit</a>							
													<a  data-id="{{$data->id}}"  data-location="population"    href="#" data-toggle="tooltip" data-original-title="Delete" class="btn btn-sm btn-danger sa-params"  ><i class="fa fa-trash"></i> Delete</a>
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