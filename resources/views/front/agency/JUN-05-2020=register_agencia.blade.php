@extends('front.layouts.frontlayout')
@section('content')
<link rel="stylesheet" type="text/css" href="{{URL::asset('public/front/css/dashboard.css')}}">
<link rel="stylesheet" type="text/css" href="{{URL::asset('public/front/css/color1.css')}}">
<link rel="stylesheet" type="text/css" href="{{URL::asset('public/front/css/dropify.css')}}">
<link rel="stylesheet" href="{{ asset('public/front/croppie/croppie.min.css') }}">
<!--------------- anucnio-sec-------------->
<section class="anucnio-sec">
<div class="container">
<div class="row">
<div class="col-12">
	<div class="anucnio-form">
    <div class="anucnio-heading common-div" style="background-color:unset">
      <h6 style="font-size:30px;letter-spacing:1px;color: #000;">Agencia Registration Form</h6>
    </div>
<form  id="profile-ads"  method="post" action="javascript:void(0)" enctype="multipart/form-data">
@csrf
<div class="important-div-top common-div-2">
	<div class="row">
		
		<div class="col-12 col-sm-6"><!--left side -->
                <div class="form-group row" style="margin-bottom:0rem;">
                    <label for="fname" class="col-sm-4 col-form-label" style="text-align:left;font-weight:700;"><h6>Móvil</h6></label>
                    <div class="col-sm-8 col-8">                        
						<input name="mobile" required type="text" class="form-control" id="mobile" Placeholder="inserte el número de móvil">
                    </div>
                </div>               
            </div>
			 <div class="col-12 col-sm-6 "><!--left side -->
                <div class="form-group row my-buttonggg">
                    <div class="col-sm-8 col-12">                        
						 <button class="btn btn-success" type="submit">Verificar</button>
                    </div>
                </div>               
            </div>
          		

	
	</div>
</div>

<div class="AdData-from common-div-2">
<div class="row">
<div class="col-md-12">
  <div class="add-data-heading">
    <h2>Datos de la Agencia</h2>
  </div>
</div>

<div class="container">
    
        <div class="row">
            <div class="col-6"><!--left side -->
                <div class="form-group row">
                    <label for="fname" class="col-sm-4 col-form-label"><h6><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Categoría</font></font></h6></label>
                    <div class="col-sm-8">                        
						<!--<select name="agency_category" class="form-control">-->
						<?php foreach($categories as $data){?>						
							<div class="custom-control custom-checkbox custom-control-inline">
							<input value="{{strtolower($data->name)}}" type="checkbox" class="custom-control-input" id="customCheck{{$data->id}}" name="agency_category[]">
							<label class="custom-control-label" for="customCheck{{$data->id}}">{{$data->name}}</label>
							</div>
						<?php }?>
						<!--</select>-->
						@if ($errors->has('agency_category'))
								<div class="error">{{ $errors->first('agency_category') }}</div>
								@endif
                    </div>
                </div>               
            </div>
			 <div class="col-6"><!--left side -->
                <div class="form-group row">
                    <label for="fname" class="col-sm-4 col-form-label"><h6>Nombre de Agencia</h6></label>
                    <div class="col-sm-8">                        
						 <input type="text" class="form-control" name="name"  Placeholder="Inserte Nombre de Agencia" required>
                    </div>
                </div>               
            </div>
          		
        </div>
		
		 <div class="row">
		 
		   <div class="col-6">
                <div class="form-group row">
				
                    <label for="fname" class="col-sm-4 col-form-label"><h6>Seleccione Provincia</h6></label>
                    <div class="col-sm-8">
					<select id="province" name="provincia" class="form-control" required>
					<option value="">Seleccione Provincia</option>
					<optgroup label="———————————"></optgroup>
					<?php foreach($province as $data){?>
					<option value="{{$data->id}}">{{$data->name}}</option>
					<?php }?>
					</select>                        
                    </div>
                </div>
               
            </div>
			
			    <div class="col-6"><!--left side -->
                <div class="form-group row">
                    <label for="fname" class="col-sm-4 col-form-label"><h6>Seleccione población</h6></label>
                    <div class="col-sm-8">                        
					<select name="population" class="form-control" id="population" required>
					<option value="">Seleccione Población</option>
					</select>
                    </div>
                </div>
               </div>
			             
            </div>
			
         	<div class="row">
			
			
            <div class="col-6"><!--left side -->
                 
				
                <div class="form-group row">
                    <label for="fname" class="col-sm-4 col-form-label"><h6>Seleccione Zona <span style="color:red;">(Opcional)</span></h6></label>
                    <div class="col-sm-8">
					<input type="text" class="form-control" name="zona" id="zona" placeholder="Inserte zona">
                        
                    </div>
                </div>
               
            </div>			
			
			
			<div class="col-6">
                <div class="form-group row">
                    <label for="fname" class="col-sm-4 col-form-label"><h6>Año Fundado</h6></label>
                    <div class="col-sm-8">
					<select name="founder_year" class="form-control" required>
					<option value="">Año Fundado</option>
						<?php
						for($foot=2001;$foot<=date('Y');$foot++){															
						echo "<option value='$foot'> $foot </option>";																										
						}
						?>					
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
						 <input type="text" name="website" class="form-control" id="website" placeholder="Insertar Pagina Web">
                    </div>
                </div>               
            </div>
			
			
			  <div class="col-6"><!--left side -->
                <div class="form-group row">
                    <label for="fname" class="col-sm-4 col-form-label"><h6>Correo Electrónico</h6></label>
                    <div class="col-sm-8">                        
						 <input type="email" name="email" class="form-control"   required>
                    </div>
                </div>               
            </div>
			
            			
        </div>
		
		<div class="row">          
			  <div class="col-6"><!--left side -->
                <div class="form-group row">
                    <label for="fname" class="col-sm-4 col-form-label"><h6>Whatsapp</h6></label>
                    <div class="col-sm-8">                        
						 <input name="whatsapp" type="text" class="form-control" id="whatsapp" placeholder="Insertar Telefono Whatsapp">
                    </div>
                </div>               
            </div>			
					
            <div class="col-6"><!--left side -->
                <div class="form-group row">
                    <label for="fname" class="col-sm-4 col-form-label"><h6>Enlace de Banner</h6></label>
                    <div class="col-sm-8">                        
						 <input name="banner_link" type="url" class="form-control" id="bannerlink" placeholder="http://">
                    </div>
                </div>               
            </div>
			
        </div>
		
			<div class="row"> 
		<div class="col-6"><!--left side -->
                <div class="form-group row">
                    <label for="fname" class="col-sm-4 col-form-label"><h6>Contraseña</h6></label>
                    <div class="col-sm-8 imgUp">                        
						 <input name="password" type="password" class="form-control" required>
                    </div>
                </div>               
            </div>	
			
			  <div class="col-6"><!--left side -->
                <div class="form-group row">
                    <label for="fname" class="col-sm-4 col-form-label"><h6>Subir Logo</h6></label>
                    <div class="col-sm-8 imgUp">                        
						      <div class="form-group row">
                    
                    <div class="col-sm-12">                        
						<div class="custom-file">
						<input type="file" class="custom-file-input" id="image_file" title="Elija el archivo">
						<label class="custom-file-label" for="image_file">Elija el archivo</label>
						</div>
						<a class="btn btn-primary btn-block upload-image" style="margin-top:3%;display:none;" >Crop</a>
						  <div id="upload-demo" style="display:none;margin-top:3%;"></div>
                    </div>
                </div>               
          
                    </div>
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
</style>

</div>
</div>




<div class="col-md-12">
<div class="submit-from">
<input type="submit" name="submit" class="btn btn-danger" value="Crear Agencia  ►">
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
<script src="{{ asset('public/front/croppie/croppie.js') }}"></script>
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
		
		submitHandler: function(form) {

					

					$.ajaxSetup({

						

						headers: {

							

							'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

							

						}

						

					});

				resize.croppie('result', {
				type: 'canvas',
				size: 'viewport'
				}).then(function (img) {
				html = '<img src="' + img + '" />';
				$("#preview-crop-image").html(html);
				$("#upload-success").html("Images cropped and uploaded successfully.");
				$("#upload-success").show();
				var token = '{{ csrf_token() }}';
				var form= $("#profile-ads");

				$.ajax({
					url: APP_URL+'/agencia/agenciaSave',      
				   type: "POST",
				   beforeSend: function(){					
					ajaxindicatorstart('');
					},
					complete: function(){
					//ajaxindicatorstop();
					},
				   data: form.serialize(),

				//  data: {"image":img, '_token': token},
				  success: function (agency_id) {
				  var APP_URL = {!! json_encode(url('/')) !!};
				  $.ajax({
					url: APP_URL+'/agencia/imageCrop',      
				   type: "POST",
				   //data: form.serialize()+"&image="+img,

				  data: {"image":img, '_token': token,'agency_id':agency_id},
				  success: function (data) {
				  var APP_URL = {!! json_encode(url('/')) !!};
					//window.location.href = APP_URL+"/agencia/email-verify/"+data;
				 }
				 });
				 setTimeout(function(){
				 	ajaxindicatorstop();
					 window.location.href = APP_URL+"/agencia/email-verify/"+agency_id;
					 }, 10000);   
					
				 }
				 });
				});

				}

 

		});

	}

</script>

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
		//$(".upload-image").show();
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


/* $('.upload-image').on('click', function (ev) {
	alert('h');
	return false;
  resize.croppie('result', {
    type: 'canvas',
    size: 'viewport'
  }).then(function (img) {
    html = '<img src="' + img + '" />';
    $("#preview-crop-image").html(html);
    $("#upload-success").html("Images cropped and uploaded successfully.");
    $("#upload-success").show();
	 var token = '{{ csrf_token() }}';
	 var form= $("#profile-ads");

    $.ajax({
		url: APP_URL+'/agencia/imageCrop',      
       type: "POST",
	   data: form.serialize()+"&variable="+otherData,

      data: {"image":img, '_token': token},
      success: function (data) {
        $(".upload-image").hide();
		$("#upload-demo").hide();
     }
     });
  });
}); */

function ajaxindicatorstart(text)
	{
		if(jQuery('body').find('#resultLoading').attr('id') != 'resultLoading'){
		jQuery('body').append('<div id="resultLoading" style="display:none"><div><img src="'+$('#site_url').val()+'public/front/images/ajax-loader_.gif"><div>'+text+'</div></div><div class="bg"></div></div>');
		}
		
		jQuery('#resultLoading').css({
			'width':'100%',
			'height':'100%',
			'position':'fixed',
			'z-index':'10000000',
			'top':'0',
			'left':'0',
			'right':'0',
			'bottom':'0',
			'margin':'auto'
		});	
		
		jQuery('#resultLoading .bg').css({
			'background':'#000000',
			'opacity':'0.7',
			'width':'100%',
			'height':'100%',
			'position':'absolute',
			'top':'0'
		});
		
		jQuery('#resultLoading>div:first').css({
			'width': '250px',
			'height':'75px',
			'text-align': 'center',
			'position': 'fixed',
			'top':'0',
			'left':'0',
			'right':'0',
			'bottom':'0',
			'margin':'auto',
			'font-size':'16px',
			'z-index':'10',
			'color':'#ffffff'
			
		});

	    jQuery('#resultLoading .bg').height('100%');
        jQuery('#resultLoading').fadeIn(300);
	    jQuery('body').css('cursor', 'wait');
	}
	
	function ajaxindicatorstop()
	{
	    jQuery('#resultLoading .bg').height('100%');
        jQuery('#resultLoading').fadeOut(300);
	    jQuery('body').css('cursor', 'default');
	}
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