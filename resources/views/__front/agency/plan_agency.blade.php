@extends('front.layouts.frontlayout')
@section('content')
<link rel="stylesheet" type="text/css" href="{{URL::asset('public/front/css/dashboard.css')}}">
<link rel="stylesheet" type="text/css" href="{{URL::asset('public/front/css/color1.css')}}">
<section class="info-card-sec">
	<div class="container">
		<div class="row info-row">
			<div class="col-md-9">
				<div class="info-heading">
					<h4>Plan Agencia : <span class="info-span">cuantos anuncios deseas contratar ?</span></h4>
				</div>
			</div>
		</div>
		<div class="row info-row">
			<div class="col-lg-3 col-xs-6 col-sm-6  primary">
				<div class="princing-item mb-4">
					<div class="pricing-divider text-center">
						<h3 class="text-light">Plan Basic</h3>
						<h4 class="my-0 display-2 text-light font-weight-normal mb-3">
							<span class="h3 text-white">€</span>40<span class="h5 text-white">/ mes</span>
						</h4> 
						</div> <div class=" br-br-0 br-bl-0 bg-white mt-0 shadow text-center"> <ul class="list-group list-group-flush text-center"> <li class="list-group-item">Hasta <b>5</b> anuncios</li>
							
						<!-- <li class="list-group-item"><b>2 GB</b> of storage</li> <li class="list-group-item"><b>Free </b>Email support</li> <li class="list-group-item"><b> 24/7</b> support</li> <li class="list-group-item border-bottom-0"><b>Help center access</b></li> --> </ul>
						<ul>
							<li>Lorem Ipsum1</li>
							<li>Lorem Ipsum2</li>
							<li>Lorem Ipsum3</li>
						</ul>
					<div class="card-footer"><a href="{{url('/agencia-login')}}"><button type="button" class="btn btn-primary btn-block">Contatar</button></a> </div> </div> </div> </div><!-- COL-END --> 
                    
					<div class="col-lg-3 col-xs-6 col-sm-6  secondary"> 
						
						<div class="princing-item mb-4"> <div class="pricing-divider text-center"> <h3 class="text-light">Plan Estrella</h3> <h4 class="my-0 display-2 text-light font-weight-normal mb-3"><span class="h3 text-white">€</span>100<span class="h5 text-white">/ mes</span></h4> 
							</div> <div class=" br-br-0 br-bl-0 bg-white mt-0 shadow text-center"> <ul class="list-group list-group-flush text-center"> <li class="list-group-item">Hasta <b>12</b> anuncios</li> 
								
							<!-- <li class="list-group-item"><b>2 GB</b> of storage</li> <li class="list-group-item"><b>Free </b>Email support</li> <li class="list-group-item"><b> 24/7</b> support</li> <li class="list-group-item border-bottom-0"><b>Help center access</b></li> --> </ul> 
							<ul>
								<li>Lorem Ipsum1</li>
								<li>Lorem Ipsum2</li>
								<li>Lorem Ipsum3</li>
							</ul>
						<div class="card-footer"><a href="{{url('/agencia-login')}}"><button type="button" class="btn btn-secondary btn-block">contatar</button></a></div> </div> </div> </div><!-- COL-END --> 
						<div class="col-lg-3 col-xs-6 col-sm-6 success"> 
							
							<div class="princing-item mb-4"> <div class="pricing-divider text-center"> <h3 class="text-light">Plan Premium</h3> <h4 class="my-0 display-2 text-light font-weight-normal mb-3"><span class="h3 text-white">€</span>175<span class="h5 text-white">/ mes</span></h4> 
								</div> <div class=" br-br-0 br-bl-0 bg-white mt-0 shadow text-center"> <ul class="list-group list-group-flush text-center"> <li class="list-group-item">Hasta <b>25</b> anuncios</li> 
									
								<!-- <li class="list-group-item"><b>2 GB</b> of storage</li> <li class="list-group-item"><b>Free </b>Email support</li> <li class="list-group-item"><b> 24/7</b> support</li> <li class="list-group-item border-bottom-0"><b>Help center access</b></li> --> </ul>
								<ul>
									<li>Lorem Ipsum1</li>
									<li>Lorem Ipsum2</li>
									<li>Lorem Ipsum3</li>
								</ul>
							<div class="card-footer"><a href="{{url('/agencia-login')}}"><button type="button" class="btn btn-success btn-block">contatar</button></a> </div> </div> </div> </div>
		</div>
		
	</div>
</section>

@endsection