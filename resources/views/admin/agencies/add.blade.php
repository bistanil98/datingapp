@extends('admin.layouts.frontlayout')
@section('content')
<link rel="stylesheet" type="text/css" href="{{URL::asset('public/front/css/dropify.css')}}">
<!-- Page Heading -->
@if (Session::has('message'))
<span class="alert-id-m" id="sa-close" >{!! session('message') !!}</span>
@endif 

<!-- CONTAINER -->
<div class="container content-area relative">
	
	<!-- PAGE-HEADER -->
	<div class="page-header">
		<h4 class="page-title">Agencies</h4>
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="{{ url('/admin/home') }}">Home</a></li>
			<li class="breadcrumb-item"><a href="{{ url('/admin/agencies') }}">Agencies</a></li>                                
			<li class="breadcrumb-item active">Add Agency</li>
			
		</ol>
	</div>
	<!-- PAGE-HEADER END -->
	
	<!-- ROW-1 OPEN -->
	
	<div class="row">
		<div class="col-lg-12">
			<form id="profile-ads" action="{{ action('Admin\AgenciesController@add')}}" enctype="multipart/form-data" method="post" class="card">
				@csrf							
				<div class="card-header">
					<h3 class="card-title">Add Agency</h3>
				</div>
				<div class="card-body">
					
					
					<div class="row">
						<div class="col-md-5"><!--left side -->
							<div class="form-group">
								<label for="fname" class="form-label"><h6><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Agency Category</font></font></h6></label>
								
								<?php foreach($categories as $data){?>						
							<div class="custom-control custom-checkbox custom-control-inline">
							<input value="{{strtolower($data->name)}}" type="checkbox" class="custom-control-input" id="customCheck{{$data->id}}" name="agency_category[]">
							<label class="custom-control-label" for="customCheck{{$data->id}}">{{$data->name}}</label>
							</div>
						<?php }?>
								
							</div>               
						</div>
						<div class="col-md-5"><!--left side -->
							<div class="form-group">
								<label for="fname" class="form-label"><h6>Agency Name</h6></label>
								
								<input type="text" class="form-control" name="name"  Placeholder="Enter name" required>
							</div>
							
						</div>
						
					</div>
					
					<div class="row">
						
						<div class="col-md-5">
							<div class="form-group">
								
								<label for="fname" class="form-label"><h6>Provincia</h6></label>
								
								<select id="province" name="provincia" class="form-control" required>
									<option value="">Select a Province</option>
									<optgroup label="———————————"></optgroup>
									<?php foreach($province as $data){?>
										<option value="{{$data->id}}">{{$data->name}}</option>
									<?php }?>
								</select>                        
							</div>
							
							
						</div>
						
						<div class="col-md-5"><!--left side -->
							<div class="form-group">
								<label for="fname" class="form-label"><h6>Población</h6></label>
								
								<select name="population" class="form-control" id="population" required>
									<option value="">Select Population</option>
								</select>
							</div>
							
						</div>
						
					</div>
					
					<div class="row">
						
						
						<div class="col-md-5"><!--left side -->
							
							
							<div class="form-group">
								<label for="fname" class="form-label"><h6>Zona</h6></label>
								
								<input type="text" class="form-control" name="zona" id="zona" placeholder="Enter zona">(Opcional)
								
								
							</div>
							
						</div>			
						
						
						<div class="col-md-5">
							<div class="form-group">
								<label for="fname" class="form-label"><h6>Founder Year</h6></label>
								
								<select name="founder_year" class="form-control" required>
									<option value="">Founder Year</option>
									<?php
										for($foot=2001;$foot<=date('Y');$foot++){															
											echo "<option value='$foot'> $foot </option>";																										
										}
									?>					
								</select>
								
							</div>
							
						</div>
						
						
					</div>
					
					<div class="row">
						
						<div class="col-md-5"><!--left side -->
							<div class="form-group">
								<label for="fname" class="form-label"><h6>Website</h6></label>
								
								<input type="text" name="website" class="form-control" id="website" placeholder="Enter website address">
							</div>
							
						</div>
						
						
						<div class="col-md-5"><!--left side -->
							<div class="form-group">
								<label for="fname" class="form-label"><h6>E-mail</h6></label>
								
								<input type="email" name="email" class="form-control"   required>
							</div>
							
						</div>
						
            			
					</div>
					
					<div class="row">          
						<div class="col-md-5"><!--left side -->
							<div class="form-group">
								<label for="fname" class="form-label"><h6>Whatsapp</h6></label>
								
								<input name="whatsapp" type="text" class="form-control" id="whatsapp" placeholder="Enter whatsapp number">
								
							</div>               
						</div>			
						
						<div class="col-md-5"><!--left side -->
							<div class="form-group">
								<label for="fname" class="form-label"><h6>Banner Link</h6></label>
								
								<input name="banner_link" type="url" class="form-control" id="bannerlink" placeholder="http://">
								
							</div>               
						</div>
						
					</div>
					
					<div class="row">          
						<div class="col-md-5">
							<div class="form-group">
								<label class="form-label">Mobile</label>
								<input value="{{ old('mobile') }}" type="text" name="mobile" class="form-control">
								@if ($errors->has('mobile'))
								<div class="error">{{ $errors->first('mobile') }}</div>
								@endif
							</div>
						</div>
						
						<div class="col-md-5"><!--left side -->
							<div class="form-group">
								<label for="fname" class="form-label"><h6>Password</h6></label>
								
								<input name="password" type="password" class="form-control" required>
								
							</div>               
						</div>			
						
						
						
					</div>
					<div class="row">          
						<div class="col-md-5"><!--left side -->
							<div class="form-group">
								<label for="fname" class="form-label"><h6>Upload Logo</h6></label>
								
								<input  type="file" name="profile"  accept='image/*'   class="dropify">
								
							</div>               
						</div>	
						
						
						
					</div>
					
				</div>
				<div class="card-footer text-left">
					<button type="submit" class="btn btn-primary">Submit</button>
					<button type="reset" class="btn btn-dark">Reset</button>
					<a href="{{ url('/admin/agencies') }}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Back</a> 
				</div>
			</form>
		</div><!-- COL END -->
	</div>
	<!-- ROW-1 CLOSED -->
</div>
<!-- CONTAINER CLOSED -->
</div> 
<script type="text/javascript" src="{{URL::asset('public/front/js/jquery.min.js')}}"></script>
<script src="{{URL::asset('public/front/js/dropify.js')}}"></script>
<script type="text/javascript">
	$('.dropify').dropify({
    messages: {
        'default': 'Drag and drop a file here or click',
        'replace': 'Drag and drop or click to replace',
        'remove':  'Remove',
        'error':   'Ooops, something wrong happended.'
    }
});
</script>
<script>
$('#province').change(function(){
 $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }

      });
	// fetch data 
      var population = $(this).val();
	  
      $.ajax({
       url: APP_URL+'/ajax/population' ,
        type: "POST",
        data: {population:population},
        success: function( response ) {					
				$('#population').html(response);		
        },


      });
});
</script>
<script src="{{URL::asset('public/front/validate/jquery.js')}}"></script>  
<script src="{{URL::asset('public/front/validate/jquery.validate.js')}}"></script>  
<script src="{{URL::asset('public/front/validate/additional-methods.min.js')}}"></script>
<script>

   var APP_URL = {!! json_encode(url('/')) !!};
	if ($("#profile-ads").length > 0) {
		$("#profile-ads").validate({
		error: function(label) {
     $(this).addClass("error");
   },
		 rules: {
			   email: {
                required: true,
                maxlength: 50,
                email: true,
				remote: {

				url: APP_URL+'/ajax/checkEmail',

				type: "post",			

				},

            },
			  mobile: {
                required: true,
                maxlength: 50,                
				remote: {
				url: APP_URL+'/ajax/checkMobile',
				type: "post",			

				},

            },

		},

		messages: {
		  email: {
          required: "Please enter valid email",
          email: "Please enter valid email",
          maxlength: "The email should less than or equal to 50 characters",
		  remote: "Email Address already exists"
        },
		  mobile: {
          required: "Please enter valid mobile",          
          maxlength: "The mobile should less than or equal to 14 characters",
		  remote: "Mobile already exists"
        },
			
		},
 

		});

	}

</script>
	
@endsection       