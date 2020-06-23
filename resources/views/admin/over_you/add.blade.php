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
						<h4 class="page-title">Over You</h4>
						<ol class="breadcrumb">
							 <li class="breadcrumb-item"><a href="{{ url('/admin/home') }}">Home</a></li>
							 <li class="breadcrumb-item"><a href="{{ url('/admin/over_you') }}">Over You</a></li>                                
								<li class="breadcrumb-item active">Add</li>
							
						</ol>
					</div>
					<!-- PAGE-HEADER END -->

					<!-- ROW-1 OPEN -->
					
						<div class="row">
					<div class="col-lg-12">
							 <form action="{{ action('Admin\OverYouController@add')}}" enctype="multipart/form-data" method="post" class="card">
								@csrf							
								<div class="card-header">
									<h3 class="card-title">Add New</h3>
								</div>
								<div class="card-body">
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<label class="form-label">Category</label>
											<?php foreach($categories as $data){?>						
											<div class="custom-control custom-checkbox custom-control-inline">
											<input value="{{strtolower($data->name)}}" type="checkbox" class="custom-control-input" id="customCheck{{$data->id}}" name="category[]">
											<label class="custom-control-label" for="customCheck{{$data->id}}">{{$data->name}}</label>
											</div>
											<?php }?>
											<!--</select>-->
											@if ($errors->has('category'))
											<div class="error">{{ $errors->first('category') }}</div>
											@endif
											</div>
										</div>
										
										<div class="col-md-12">
											<div class="form-group">
												<label class="form-label">Name</label>
												<input value="{{ old('name') }}" type="text" name="name" class="form-control">
												@if ($errors->has('name'))
												<div class="error">{{ $errors->first('name') }}</div>
												@endif
											</div>
										</div>
										
								</div>
								</div>
								<div class="card-footer text-left">
									<button type="submit" class="btn btn-primary">Submit</button>
									<button type="reset" class="btn btn-dark">Reset</button>
									<a href="{{ url('/admin/over_you') }}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Back</a> 
								</div>
							</form>
						</div><!-- COL END -->
					</div>
					<!-- ROW-1 CLOSED -->
				</div>
				<!-- CONTAINER CLOSED -->
        </div>      
@endsection       