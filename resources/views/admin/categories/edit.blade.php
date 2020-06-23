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
						<h4 class="page-title">Categories</h4>
						<ol class="breadcrumb">
							 <li class="breadcrumb-item"><a href="{{ url('/admin/home') }}">Home</a></li>
							 <li class="breadcrumb-item"><a href="{{ url('/admin/categories') }}">Categories</a></li>                                
								<li class="breadcrumb-item active">Edit</li>
							
						</ol>
					</div>
					<!-- PAGE-HEADER END -->

					<!-- ROW-1 OPEN -->
					
						<div class="row">
					<div class="col-lg-12">
							 <form action="{{url('/admin/categories/edit/')}}/{{$categories->id}}" enctype="multipart/form-data" method="post" class="card">
								@csrf							
								<div class="card-header">
									<h3 class="card-title">Edit Categories</h3> 
								</div>
								<div class="card-body">
									<div class="row">
										<div class="col-md-5">
											<div class="form-group">
												<label class="form-label">Name</label>
												<input value="{{$categories->name}}"  type="text" name="name" class="form-control">
												@if ($errors->has('name'))
												<div class="error">{{ $errors->first('name') }}</div>
												@endif
											</div>
										</div>
										
								</div>
								</div>
								<div class="card-footer text-left">
									<button type="submit" class="btn btn-primary">Submit</button>
									<a href="{{ url('/admin/categories') }}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Back</a> 
									
								</div>
							</form>
						</div><!-- COL END -->
					</div>
					<!-- ROW-1 CLOSED -->
				</div>
				<!-- CONTAINER CLOSED -->
        </div>      
@endsection       