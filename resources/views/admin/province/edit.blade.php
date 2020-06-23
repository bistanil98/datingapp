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
							 <li class="breadcrumb-item"><a href="{{ url('/admin/province') }}">Province</a></li>                                
								<li class="breadcrumb-item active">Edit</li>
							
						</ol>
					</div>
					<!-- PAGE-HEADER END -->

					<!-- ROW-1 OPEN -->
					
						<div class="row">
					<div class="col-lg-12">
							 <form action="{{url('/admin/province/edit/')}}/{{$province->id}}" enctype="multipart/form-data" method="post" class="card">
								@csrf							
								<div class="card-header">
									<h3 class="card-title">Edit Province</h3> 
								</div>
								<div class="card-body">
									<div class="row">
										<div class="col-md-5">
											<div class="form-group">
												<label class="form-label">Name</label>
												<input value="{{$province->name}}"  type="text" name="name" class="form-control">
												@if ($errors->has('name'))
												<div class="error">{{ $errors->first('name') }}</div>
												@endif
											</div>
										</div>
										
								</div>
								<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<label>Title</label>		
												<input type="text" class="form-control content" name="title"  value="{{$province->title}}"/>					
											</div>
										</div>
										
										<div class="col-md-12">
											<div class="form-group">
												<label>Meta Title</label>		
												<input type="text" class="form-control content" name="meta_title"  value="{{$province->meta_title}}">					
											</div>
										</div>
										
										<div class="col-md-12">
											<div class="form-group">
												<label>Meta Description</label>		
												<input type="text" class="form-control content" name="meta_description"  value="{{$province->meta_description}}"/>					
											</div>
										</div>
										
								</div>
								
								</div>
								<div class="card-footer text-left">
									<button type="submit" class="btn btn-primary">Submit</button>
									<a href="{{ url('/admin/province') }}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Back</a> 
									
								</div>
							</form>
						</div><!-- COL END -->
					</div>
					<!-- ROW-1 CLOSED -->
				</div>
				<!-- CONTAINER CLOSED -->
        </div>      
@endsection       