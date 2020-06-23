@extends('front.layouts.agencia')
@section('content')

<link rel="stylesheet" href="{{ asset('public/front/croppie/croppie.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{URL::asset('public/front/css/dropify.css')}}">
<!--------------- anucnio-sec-------------->
<section class="anucnio-sec page">
<div class="container page-main page-faq">
<div class="row">
<div class="col-12">
  <div class="anucnio-form">
 <!-- CONTAINER -->
		<div class="container content-area relative content-are">
			
			<!-- PAGE-HEADER -->
			<div class="page-header">
				<h4 class="page-title">Datos de agencia</h4>
				<?php /*
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="#">Pages</a></li>
					<li class="breadcrumb-item active" aria-current="page">Contraseña</li>
				</ol>*/?>
			</div>
			<!-- PAGE-HEADER END -->
			
			<!-- ROW-1 OPEN -->
			
			<!-- CONTAINER CLOSED -->
		</div>
<form  id="profile-ads"  method="post" action="{{ action('AgencyController@profile_agencia')}}" enctype="multipart/form-data">
@csrf

<div class="AdData-from common-div-2">
<div class="row">


<div class="container">
    
        <div class="row">
            <div class="col-6"><!--left side -->
                <div class="form-group row">
                    <label for="fname" class="col-sm-4 col-form-label"><h6><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Categoria</font></font></h6></label>
                    <div class="col-sm-8"> 
					<?php  
					$categoriesSaved = explode(',',$agencies->agency_category);
					/* 
					$categoriesSaved = explode(',',$agencies->agency_category);
					foreach($categoriesSaved as $data){?>						
							<div class="custom-control custom-checkbox custom-control-inline">
							<input readonly disabled checked value="{{$data}}" type="checkbox" class="custom-control-input" id="customCheck{{$data}}" >
							<label class="custom-control-label" for="customCheck{{$data}}">{{$data}}</label>
							</div>
						<?php } */?>
						<?php foreach($categories as $data){?>						
							<div class="custom-control custom-checkbox custom-control-inline">
						<input <?php  if (in_array(strtolower($data->name), $categoriesSaved)){   echo "checked"; } ?> value="{{strtolower($data->name)}}" type="checkbox" class="custom-control-input" id="customCheck{{$data->id}}" name="agency_category[]">
							<label class="custom-control-label" for="customCheck{{$data->id}}">{{$data->name}}</label>
							</div>
						<?php }?>
						
                    </div>
                </div>               
            </div>
			 <div class="col-6"><!--left side -->
                <div class="form-group row">
                    <label for="fname" class="col-sm-4 col-form-label"><h6>Nombre de Agencia</h6></label>
                    <div class="col-sm-8">                        
						 <input value="{{$agencies->name}}" type="text" class="form-control" name="name"  Placeholder="Inserte Nombre" required>
                    </div>
                </div>               
            </div>
          		
        </div>
		
		 <div class="row">
		 
		 <div class="col-6">
                <div class="form-group row">
				
                    <label for="fname" class="col-sm-4 col-form-label"><h6>Provincia</h6></label>
                    <div class="col-sm-8">
					<select id="province" name="provincia" class="form-control" required>
					<option value="">Seleccione Provincia</option>
					<optgroup label="———————————"></optgroup>
					<?php foreach($province as $data){?>
						<option @if($agencies->provincia==$data->id) {{'selected'}} @endif value="{{$data->id}}">{{$data->name}}</option>
					<?php }?>
					</select>                        
                    </div>
                </div>
               
            </div>
			
			    <div class="col-6"><!--left side -->
                <div class="form-group row">
                    <label for="fname" class="col-sm-4 col-form-label"><h6>Población</h6></label>
                    <div class="col-sm-8">                        
					<select name="population" class="form-control" id="population" required>
					<?php foreach($population as $data){?>
						<option @if($agencies->population==$data->name) {{'selected'}} @endif value="{{$data->name}}">{{$data->name}}</option>
					<?php }?>
					</select>
                    </div>
                </div>
               </div>
			             
            </div>
			
         	<div class="row">
			
			
            <div class="col-6"><!--left side -->
                 
				
                <div class="form-group row">
                    <label for="fname" class="col-sm-4 col-form-label"><h6>Zona <span style="color:red;">(Opcional)</span></h6></label>
                    <div class="col-sm-8">
					<input value="{{$agencies->zona}}" type="text" class="form-control" name="zona" id="zona" placeholder="Seleccione Zona">
                        
                    </div>
                </div>
               
            </div>			
			
			
			<div class="col-6">
                <div class="form-group row">
                    <label for="fname" class="col-sm-4 col-form-label"><h6>Añofundador</h6></label>
                    <div class="col-sm-8">
					<select name="founder_year" class="form-control" required>
					<option value="">Añofundador</option>
					<?php for($foot=2001;$foot<=date('Y');$foot++){?>
					<option @if($agencies->founder_year==$foot) {{'selected'}} @endif value="{{$foot}}">{{$foot}}</option>
					<?php }?>				
					</select>
                    </div>
                </div>
               
            </div>
			
		
		</div>
		
		<div class="row">
          
			  <div class="col-6"><!--left side -->
                <div class="form-group row">
                    <label for="fname" class="col-sm-4 col-form-label"><h6>Pagina Web</h6></label>
                    <div class="col-sm-8">                        
						 <input value="{{$agencies->website}}" type="text" name="website" class="form-control" id="website" placeholder="Inserte Pagina Web">
                    </div>
                </div>               
            </div>
			
			
			  <div class="col-6"><!--left side -->
                <div class="form-group row">
                    <label for="fname" class="col-sm-4 col-form-label"><h6>Correo Electrónico</h6></label>
                    <div class="col-sm-8">                        
						 <input value="{{$agencies->email}}" type="email" name="email" class="form-control"   required>
                    </div>
                </div>               
            </div>
			
            			
        </div>
		
		<div class="row">          
			  <div class="col-6"><!--left side -->
                <div class="form-group row">
                    <label for="fname" class="col-sm-4 col-form-label"><h6>Whatsapp</h6></label>
                    <div class="col-sm-8">                        
						 <input value="{{$agencies->whatsapp}}" name="whatsapp" type="text" class="form-control" id="whatsapp" placeholder="Inserte numero Whatsapp">
                    </div>
                </div>               
            </div>			
					
            <div class="col-6"><!--left side -->
                <div class="form-group row">
                    <label for="fname" class="col-sm-4 col-form-label"><h6>Enlace de Banner</h6></label>
                    <div class="col-sm-8">                        
						 <input value="{{$agencies->banner_link}}" name="banner_link" type="url" class="form-control" id="bannerlink" placeholder="http://">
                    </div>
                </div>               
            </div>
			
        </div>
		
		
				<div class="row">          
			  <div class="col-6"><!--left side -->
                <div class="form-group row">
                    <label for="fname" class="col-sm-4 col-form-label"><h6>Subir Logo</h6></label>
                    <div class="col-sm-8">                        
						 <div class="custom-file">
						<input type="file" class="custom-file-input" id="image_file" title="Elija el archivo">
						<label class="custom-file-label" for="image_file">Elija el archivo</label>
						</div>
						<a class="btn btn-primary btn-block upload-image" style="margin-top:3%;display:none;" >Crop</a>
						<div id="preview-crop-image" style="margin-top:3%">
						<?php if(!empty($agencies->upload_logo)){  ?>
						<img style="width:228px;height:50px;" src="<?php echo URL::asset('public/uploads/profile_logo/'.$agencies->upload_logo); ?>" />
						<?php }?>
                    </div>
                    </div>
                </div>               
            </div>			
				  <div class="col-6"><!--left side -->
                <div class="form-group row">
                 <div id="upload-demo" style="display:none;"></div>
                </div>               
            </div>	
          
        </div>
		
		
		
    
</div>


<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet"/>
<style>
	.form-control {
    display: block;
    width: 100%;
    padding: 0.375rem 0.75rem;
    font-size: 0.9375rem;
    line-height: 1.6;
    color: #9493a9 !important;
    background-color: #f4f3f9;
    background-clip: padding-box;
    border: 1px solid #e1e0ea;
    transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    border-radius: 3px;
}
.container h6{font-size: 20px;}
.anucnio-sec{background-color: #f4f3f9;}
.anucnio-sec {
    padding: 0px;
}
</style>

</div>
</div>




<div class="col-md-12">
<div class="submit-from">
<input type="submit" name="submit" class="btn btn-danger" value="Actualizar Agencia  ►">
</div>

</div>

</form> 

</div>














    </div>
  </div>
</div>
</section>
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
				/* remote: {

				url: APP_URL+'/ajax/checkEmail',

				type: "post",			

				}, */

            },
			  mobile: {
                required: true,
                maxlength: 50,                
				/* remote: {
				url: APP_URL+'/ajax/checkMobile',
				type: "post",			

				}, */

            },

		},

		messages: {
		  email: {
          required: "Please enter valid email",
          email: "Please enter valid email",
          maxlength: "The email should less than or equal to 50 characters",
		//  remote: "Email Address already exists"
        },
		  mobile: {
          required: "Please enter valid mobile",          
          maxlength: "The mobile should less than or equal to 14 characters",
		 // remote: "Mobile already exists"
        },
			
		},
 

		});

	}

</script>
	  <script src="{{ asset('public/front/croppie/croppie.js') }}"></script>
	<script type="text/javascript">
var APP_URL = {!! json_encode(url('/')) !!};
$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});



var resize = $('#upload-demo').croppie({
    enableExif: true,
    enableOrientation: true,    
    viewport: { // Default { width: 100, height: 100, type: 'square' } 
        width: 228,
        height: 50,
        type: 'square' //circle
    },
    boundary: {
        width: 300,
        height: 300
    }
});


$('#image_file').on('change', function () { 
		$("#upload-demo").show();
		$(".upload-image").show();
  var reader = new FileReader();
    reader.onload = function (e) {
      resize.croppie('bind',{
        url: e.target.result
      }).then(function(){
        console.log('jQuery bind complete');
      });
    }
    reader.readAsDataURL(this.files[0]);
	

});


$('.upload-image').on('click', function (ev) {
	
	
  resize.croppie('result', {
    type: 'canvas',
    size: 'viewport'
  }).then(function (img) {
    html = '<img src="' + img + '" />';
    $("#preview-crop-image").html(html);
    $("#upload-success").html("Images cropped and uploaded successfully.");
    $("#upload-success").show();
	 var token = '{{ csrf_token() }}';
	 
    $.ajax({
		url: APP_URL+'/agencia/imageCrop',      
       type: "POST",
      data: {"image":img, '_token': token},
      success: function (data) {
		  $(".upload-image").hide();
		$("#upload-demo").hide();
     }
     });
  });
});


</script>
<script>
// Add the following code if you want the name of the file appear on select
$(".custom-file-input").on("change", function() {
  var fileName = $(this).val().split("\\").pop();
  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});
</script>
<style>
	.custom-file-input:lang(en)~.custom-file-label::after {
    content: "Navegadora";
}
</style>
@endsection