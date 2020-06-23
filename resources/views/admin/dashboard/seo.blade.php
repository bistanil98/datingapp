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
						<h4 class="page-title">Meta Seo</h4>
						<ol class="breadcrumb">
							 <li class="breadcrumb-item"><a href="{{ url('/admin/home') }}">Home</a></li>
							 
								<li class="breadcrumb-item active">Meta Seo</li>
							
						</ol>
					</div>
					<!-- PAGE-HEADER END -->

					<!-- ROW-1 OPEN -->
					
						<div class="row">
					<div class="col-lg-12">
							 <form action="{{ action('Admin\HomeController@update_seo')}}" enctype="multipart/form-data" method="post" class="card">
								@csrf							
								<div class="card-header">
									<h3 class="card-title">Meta Seo</h3>
								</div>
								<div class="card-body">
								<?php $i=1; foreach($tearms as $data){?>
								<label class="category">{{ucfirst($data->category)}}	</label>																	
									<input type="hidden" class="form-control" name="category[]"  value="{{$data->category}}"/>					
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<label>Title</label>		
												<input type="text" class="form-control" name="title[]"  value="{{$data->title}}"/>					
											</div>
										</div>
										
										<div class="col-md-12">
											<div class="form-group">
												<label>Meta Title</label>		
												<input type="text" class="form-control" name="meta_title[]"  value="{{$data->meta_title}}"/>					
											</div>
										</div>
										
										<div class="col-md-12">
											<div class="form-group">
												<label>Meta Description</label>		
												<input type="text" class="form-control" name="meta_description[]"  value="{{$data->meta_description}}"/>					
											</div>
										</div>
										
										<div class="col-md-12">
											<div class="form-group">
												<label>H1 Title</label>		
												<input type="text" class="form-control" name="h1_title[]"  value="{{$data->h1_title}}"/>					
											</div>
										</div>
										
										<div class="col-md-12">
											<div class="form-group">
												<label>Upper Description</label>	
												<textarea class="form-control" id="content{{$i}}" name="upper_description[]">{{$data->upper_description}}</textarea>												
											</div>
										</div>
										<div class="col-md-12">
											<div class="form-group">
												<label>Lower Description</label>		
												<textarea class="form-control" id="content2{{$i}}" name="lower_description[]">{{$data->lower_description}}</textarea>
												
											</div>
										</div>
										<!-- JQUERY SCRIPTS -->
		<script src="https://www.webkhabari.com/webroot/js/ckeditor/ckeditor.js"></script>
			<script>
		CKEDITOR.replace( 'content{{$i}}' );
		
		
		CKEDITOR.replace( 'content2{{$i}}' );
		
		</script>
								</div>
								<hr>
								<?php $i++; }?>
								
								
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
	
<style>
	    .category {background: #333333;
    display: block;
    padding: 10px;
    color: #fff;
	}
	</style>
	<script src="{{URL::asset('public/admin/assets/js/vendors/jquery-3.2.1.min.js')}}"></script>
		
		
		<script>
		CKEDITOR.replace( 'content1' );
		CKEDITOR.replace( 'content2' );
		CKEDITOR.replace( 'content3' );
		CKEDITOR.replace( 'content21' );
		CKEDITOR.replace( 'content22' );
		CKEDITOR.replace( 'content23' );
		
		</script>
@endsection       