@extends('front.layouts.member')

@section('content')
		
		<section class="listing-panel-sec">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						@if(Session::has('message'))

						<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
						@endif

						<div class="listing-div">
							<div class="row">
								<div class="col-md-12">
									<div class="listing-heading">
									
										<h2>Usuario: {{$members->email}}</h2>
									</div>
								</div>
								
								<div class="col-md-4">
									<a href="{{ action('MembersController@profile')}}">
										<div class="listing-icon-text icon-2">
											<!-- <i class="fas fa-meteor"></i> --><span class="icon-font">Publicar Anuncio</span>
										</div>
									</a>
								</div>
								<div class="col-md-4">
									<a href="#">
										<div class="listing-icon-text icon-3">
											<!-- <i class="fas fa-bullhorn"></i> --> <span>Top Anuncio</span>
										</div>
									</a>
								</div>
								<div class="col-md-4">
									
										<div class="listing-icon-text icon-4">
											<!-- <i class="fas fa-sync"></i> --> <a href="{{ url('/members/subida-zone') }}"><span> Auto Subida</span></a>
										</div>
									
								</div>
								<div class="col-md-4">
									<a href="#">
										<div class="listing-icon-text icon-1">
											<!-- <i class="fas fa-list"></i> --> <span>Mis Anuncios</span>
										</div>
									</a>
								</div>
								
								
								<div class="col-md-4">
									<a href="#">
										<div class="listing-icon-text common-div icon-5 ">
											<div class="fontawosme-div"><!-- <i class="fas fa-file-invoice-dollar"></i> --> <span>Consumo</span></div> 
											<div class="span-text-div"><span>Facturacion</span></div>
										</div>
									</a>
								</div>
								<div class="col-md-4">
									
										<div class="listing-icon-text common-div icon-6">
											<div class="fontawosme-div"><a href="{{ url('/members/contrasena') }}"><span>Contraseña</span></a></div> 
											<div class="span-text-div"><span><a href="{{ url('/members/contact-us') }}"><span>Contactar</span></a></span></div>
										</div>
									
								</div>
							</div>
						</div>
					</div>
				</div>
				
				<div class="row">
					<div class="col-md-12">
						<div class="row">
							<div class="col-md-3 m-auto d-block">
								<div class="listing-center-text">
									<p>Truvalia Global Classifieds OOD
									Iskar 4, 1000 Sofia, Bulgaria</p>
								</div>
							</div>
						</div>
					</div>
					
					
				</div>
				
			</div>
		</section>

@endsection	