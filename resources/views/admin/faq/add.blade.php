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
						<h4 class="page-title">Frequently Asked Questions</h4>
						<ol class="breadcrumb">
							 <li class="breadcrumb-item"><a href="{{ url('/admin/home') }}">Home</a></li>
							 <li class="breadcrumb-item"><a href="{{ url('/admin/faq') }}">Frequently Asked Questions</a></li>                                
								<li class="breadcrumb-item active">Add</li>
							
						</ol>
					</div>
					<!-- PAGE-HEADER END -->

					<!-- ROW-1 OPEN -->
					
						<div class="row">
					<div class="col-lg-12">
							 <form action="{{ action('Admin\FaqController@add')}}" enctype="multipart/form-data" method="post" class="card">
								@csrf							
								<div class="card-header">
									<h3 class="card-title">Add New</h3>
								</div>
								<div class="card-body">
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<label class="form-label">Question</label>
												<input value="{{ old('question') }}" type="text" name="question" class="form-control">
												@if ($errors->has('question'))
												<div class="error">{{ $errors->first('question') }}</div>
												@endif
											</div>
										</div>
										
										<div class="col-md-12">
											<div class="form-group">
												<textarea class="form-control content" name="answer" id="summernote" >{{ old('answer') }}</textarea>												
												@if ($errors->has('answer'))
												<div class="error">{{ $errors->first('answer') }}</div>
												@endif
											</div>
										</div>
										
								</div>
								</div>
								<div class="card-footer text-left">
									<button type="submit" class="btn btn-primary">Submit</button>
									<button type="reset" class="btn btn-dark">Reset</button>
									<a href="{{ url('/admin/faq') }}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Back</a> 
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