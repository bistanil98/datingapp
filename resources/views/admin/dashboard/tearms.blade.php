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
						<h4 class="page-title">Terms & Conditions</h4>
						<ol class="breadcrumb">
							 <li class="breadcrumb-item"><a href="{{ url('/admin/home') }}">Home</a></li>
							 
								<li class="breadcrumb-item active">Terms & Conditions</li>
							
						</ol>
					</div>
					<!-- PAGE-HEADER END -->

					<!-- ROW-1 OPEN -->
					
						<div class="row">
					<div class="col-lg-12">
							 <form action="{{ action('Admin\HomeController@update_terms')}}" enctype="multipart/form-data" method="post" class="card">
								@csrf							
								<div class="card-header">
									<h3 class="card-title">Terms & Conditions</h3>
								</div>
								<div class="card-body">
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<textarea class="form-control content" name="tearms" id="summernote" >{{ $tearms->tearms }}</textarea>
												
											</div>
										</div>
										
								</div>
								</div>
								<div class="card-footer text-left">
									<button type="submit" class="btn btn-primary">Submit</button>
								</div>
							</form>
						</div><!-- COL END -->
					</div>
					<!-- ROW-1 CLOSED -->
				</div>
				<!-- CONTAINER CLOSED -->
        </div>      
	
	<!-- JQUERY SCRIPTS -->
		<script src="{{URL::asset('public/admin/assets/js/vendors/jquery-3.2.1.min.js')}}"></script>
		<!-- WYSIWYG Editor js -->
		<script src="{{URL::asset('public/admin/assets/plugins/wysiwyag/jquery.richtext.js')}}"></script>
		<script src="{{URL::asset('public/admin/assets/plugins/wysiwyag/wysiwyag.js')}}"></script>

@endsection       