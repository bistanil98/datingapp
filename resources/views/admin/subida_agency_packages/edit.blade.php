@extends('admin.layouts.frontlayout')
@section('content')
	<!-- Page Heading -->
	@if (Session::has('message'))
	<span class="alert-id-m" id="sa-close" >{!! session('message') !!}</span>
	@endif 
	<?php $durations = array(
			'7 dias',
			'15 dias',
			'30 dias',
	);
	?>
	<style>
	.col-lg-12{margin-bottom: 150px;}
	</style>
<!-- CONTAINER -->
				<div class="container content-area relative">

				   <!-- PAGE-HEADER -->
					<div class="page-header">
						<h4 class="page-title">Subida Agency Packages</h4>
						<ol class="breadcrumb">
							 <li class="breadcrumb-item"><a href="{{ url('/admin/home') }}">Home</a></li>
							 <li class="breadcrumb-item"><a href="{{ url('/admin/subida-agency-packages') }}">Subida Agency Packages</a></li>                                
								<li class="breadcrumb-item active">Edit</li>
							
						</ol>
					</div>
					<!-- PAGE-HEADER END -->

					<!-- ROW-1 OPEN -->
					
						<div class="row">
					<div class="col-lg-12">
							<form action="{{url('/admin/subida-agency-packages/edit/')}}/{{$subida_agency_packages->id}}" enctype="multipart/form-data" method="post" class="card">
								@csrf							
								<div class="card-header">
									<h3 class="card-title">Edit Subida Agency Packages</h3>
								</div>
										<div class="card-body">
									<div class="row">
										
										<div class="col-md-3">
											<div class="form-group">
												<label class="form-label">Category</label>
												<select required  name="category" class="custom-select">
														<?php foreach($categories as $data){?>
														<option <?php if($subida_agency_packages->category==strtolower($data->name)){ echo 'selected';}?>  value="{{strtolower($data->name)}}">{{ucfirst($data->name)}}</option>
														<?php }?>
													</select>
													@if ($errors->has('category'))
													<div class="error">{{ $errors->first('category') }}</div>
													@endif
											</div>
										</div>
										
										<div class="col-md-3">
											<div class="form-group">
												<label class="form-label">Advertisements</label>
												<select required  name="advertisements" class="custom-select">
														<?php for($i=1; $i<=20; $i++){?>
														<option <?php if($subida_agency_packages->advertisements==$i){ echo 'selected';}?>  value="{{$i}}">{{$i}}</option>
														<?php }?>
													</select>
												
												@if ($errors->has('advertisements'))
												<div class="error">{{ $errors->first('advertisements') }}</div>
												@endif
											</div>
										</div>
										
										<div class="col-md-3">
											<div class="form-group">
												<label class="form-label">Durations</label>
												<select required  name="durations" class="custom-select">
														<?php foreach($durations as $key=>$Durationsdata){?>
														<option <?php if($subida_agency_packages->durations==$Durationsdata){ echo 'selected';}?>  value="{{$Durationsdata}}">{{$Durationsdata}}</option>
														<?php }?>
													</select>
												
												@if ($errors->has('durations'))
												<div class="error">{{ $errors->first('durations') }}</div>
												@endif
											</div>
										</div>
										
										<div class="col-md-3">
											<div class="form-group">
												<label class="form-label">Subidas(Uploads)</label>
												<input oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required value="{{ $subida_agency_packages->subidas }}" type="text" name="subidas" class="form-control">
												@if ($errors->has('subidas'))
												<div class="error">{{ $errors->first('subidas') }}</div>
												@endif
											</div>
										</div>
										
										<div class="col-md-3">
											<div class="form-group">
												<label class="form-label">Price(€)</label>
												<input oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required value="{{ $subida_agency_packages->price }}" type="text" name="price" class="form-control">
												@if ($errors->has('price'))
												<div class="error">{{ $errors->first('price') }}</div>
												@endif
											</div>
										</div>
										
										<div class="col-md-9">
											<div class="form-group">
												<label class="form-label">Provinces</label>
												<select required name="provinces[]" multiple="multiple" class="group-filter">														
														<?php foreach($province as $provincedata){?>
														<?php $subida_agency_packages_provinces_check = subida_agency_packages_provinces_check($subida_agency_packages->id,$provincedata->name);?>
														<option <?php if($subida_agency_packages_provinces_check>0){ echo 'selected';} ?>  value="{{strtolower($provincedata->name)}}">{{ucfirst($provincedata->name)}}</option>
														<?php }?>
													</select>
												@if ($errors->has('uploads'))
												<div class="error">{{ $errors->first('uploads') }}</div>
												@endif
											</div>
										</div>
										
										
										
								</div>
								</div>
							
								<div class="card-footer text-left">
									<button type="submit" class="btn btn-primary">Submit</button>
									<button type="reset" class="btn btn-dark">Reset</button>
									<a href="{{ url('/admin/subida-agency-packages') }}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Back</a> 
								</div>
							</form>
						</div><!-- COL END -->
					</div>
					<!-- ROW-1 CLOSED -->
				</div>
				<!-- CONTAINER CLOSED -->
        </div>      
@endsection       