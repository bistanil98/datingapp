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
						<h4 class="page-title">Agency Packages</h4>
						<ol class="breadcrumb">
							 <li class="breadcrumb-item"><a href="{{ url('/admin/home') }}">Home</a></li>
							 <li class="breadcrumb-item"><a href="{{ url('/admin/agency-packages') }}">Agency Packages</a></li>                                
								<li class="breadcrumb-item active">Add</li>
							
						</ol>
					</div>
					<!-- PAGE-HEADER END -->

					<!-- ROW-1 OPEN -->
					
						<div class="row">
					<div class="col-lg-12">
							 <form action="{{ action('Admin\AgencyPackagesController@add')}}" enctype="multipart/form-data" method="post" class="card">
								@csrf							
								<div class="card-header">
									<h3 class="card-title">Add Agency Packages</h3>
								</div>
								<div class="card-body">
									<div class="row">
										
										<div class="col-md-5">
											<div class="form-group">
												<label class="form-label">Agency Pack</label>
												<select required class="form-control" name="pack_number">
													<option value="">Select Pack</option>
													<option value="1">Agency pack 1</option>
													<option value="2">Agency pack 2</option>
													<option value="3">Agency pack 3</option>													
												</select>
													@if ($errors->has('pack_number'))
													<div class="error">{{ $errors->first('pack_number') }}</div>
													@endif
											</div>
										</div>
										
										<div class="col-md-5">
											<div class="form-group">
												<label class="form-label">Advertisements</label>
												<input oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required value="{{ old('advertisements') }}" type="text" name="advertisements" class="form-control">
												@if ($errors->has('advertisements'))
												<div class="error">{{ $errors->first('advertisements') }}</div>
												@endif
											</div>
										</div>
										
										<div class="col-md-5">
											<div class="form-group">
												<label class="form-label">Days</label>
												<input oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required value="{{ old('days') }}" type="text" name="days" class="form-control">
												@if ($errors->has('days'))
												<div class="error">{{ $errors->first('days') }}</div>
												@endif
											</div>
										</div>
										
										<div class="col-md-5">
											<div class="form-group">
												<label class="form-label">Uploads</label>
												<input oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required value="{{ old('uploads') }}" type="text" name="uploads" class="form-control">
												@if ($errors->has('uploads'))
												<div class="error">{{ $errors->first('uploads') }}</div>
												@endif
											</div>
										</div>
										
										<div class="col-md-5">
											<div class="form-group">
												<label class="form-label">Price(€)</label>
												<input oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required value="{{ old('price') }}" type="text" name="price" class="form-control">
												@if ($errors->has('price'))
												<div class="error">{{ $errors->first('price') }}</div>
												@endif
											</div>
										</div>
										
								</div>
								</div>
								<div class="card-footer text-left">
									<button type="submit" class="btn btn-primary">Submit</button>
									<button type="reset" class="btn btn-dark">Reset</button>
									<a href="{{ url('/admin/agency-packages') }}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Back</a> 
								</div>
							</form>
						</div><!-- COL END -->
					</div>
					<!-- ROW-1 CLOSED -->
				</div>
				<!-- CONTAINER CLOSED -->
        </div>      
@endsection       