@extends('admin.layouts.frontlayout')
@section('content')
	<!-- Page Heading -->
	@if (Session::has('message'))
	<span class="alert-id-m-" id="sa-close" >{!! session('message') !!}</span>
	@endif 
	<?php $durations = array(
			'1 semana',
			'2 semanas',
			'1 mes',
			'3 meses',
	);
	?>
<!-- CONTAINER -->
				<div class="container content-area relative">

				   <!-- PAGE-HEADER -->
					<div class="page-header">
						<h4 class="page-title">Top Agency Packages</h4>
						<ol class="breadcrumb">
							 <li class="breadcrumb-item"><a href="{{ url('/admin/home') }}">Home</a></li>
                                <li class="breadcrumb-item active">Top Agency Packages</li>
							
						</ol>
					</div>
					<!-- PAGE-HEADER END -->

					<!-- ROW-1 OPEN -->
					<div class="row">
						<div class="col-md-12 col-lg-12">						
							 
							 <div class="card">
							 <style> .card-header { display: block;padding: 1rem 0.5rem 0rem 2rem;} </style>
								<div class="card-header">
								<form  action="{{ action('Admin\TopAgencyPackagesController@index')}}" enctype="multipart/form-data" method="get" >
									
								
									<div class="row">
										<div class="col-md-3">
											<div class="form-group">
												
												<a style="   width: 100%;" href="{{ url('/admin/top-agency-packages/add') }}" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Add Top Agency Packages</a> 
											</div>
										</div>
										
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
										<div class="col-md-2">
											<div class="form-group">
												
												<select name="province" class="form-control custom-select">
													<option value="">--Select Province--</option>
													<?php foreach($province as $key=>$provinceData){?>
														<option <?php if (isset($_GET['province']) &&!empty($_GET['province']) && $_GET['province']==strtolower($provinceData->name)){ echo 'selected';}?>  value="{{(strtolower($provinceData->name))}}">{{$provinceData->name}}</option>
														<?php }?>
												</select>
											</div>
										</div>
										<div class="col-md-2">
											<div class="form-group">
												
												<select name="durations"  class="form-control custom-select">
													<option value="">--Select Durations--</option>
													<?php foreach($durations as $key=>$Durationsdata){?>
														<option <?php if (isset($_GET['durations']) &&!empty($_GET['durations']) && $_GET['durations']==strtolower($Durationsdata)){ echo 'selected';}?>  value="{{$Durationsdata}}">{{$Durationsdata}}</option>
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
										<table id="packages" class="table table-striped table-bordered text-nowrap w-100 display nowrap">
											<thead class="thead-light">												
												<th>Category</th>                      
												<th>Advertisements</th>                      
												<th>Durations</th>
												<th>Price(€)</th> 
												<th>Action</th>
												<th>Provinces</th>                      												
												                     												
												
												</tr>
											</thead>
											<tbody>
												<?php $i=1; ?> 
												@foreach($top_agency_packages as $data)
												<tr>
													<td>{{ ucwords($data->category) }}</td>
													<td>{{ $data->advertisements }}</td>
													<td>{{ ($data->durations) }}</td>
													<td>{{ $data->price }}</td>
													<td>
													<a  data-toggle="tooltip" data-original-title="Edit" class="btn btn-sm btn-primary" href="{{url('/admin/top-agency-packages/edit/')}}/{{$data->id}}" ><i class="fa fa-edit"></i> Edit</a>							
													<?php /*<a  data-id="{{$data->id}}"  data-location="top-agency-packages"    href="#" data-toggle="tooltip" data-original-title="Delete" class="btn btn-sm btn-danger sa-params"  ><i class="fa fa-trash"></i> Delete</a>*/?>
													</td>
													<td>{{ ucwords($data->provinces) }}</td>
													
													
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
.dataTables_scrollBody::-webkit-scrollbar-track {
    
    background-color: #f1f1f1;
    border-radius: 10px;
	
}

.dataTables_scrollBody::-webkit-scrollbar {
    width: 100%;
    cursor:pointer;
	height:10px;
}

.dataTables_scrollBody::-webkit-scrollbar-thumb {
    background-color: #888;
    cursor:pointer;
	
	
}
.dataTables_scrollBody::-webkit-scrollbar-thumb:hover {
    background-color: #555;
	cursor:pointer;
    
	
}
</style>
@endsection       