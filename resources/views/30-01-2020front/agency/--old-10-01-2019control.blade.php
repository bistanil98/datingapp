@extends('front.layouts.agencia')
@section('content')
<section class="listing-panel-sec agency-dasboard-sec">
  <div class="container">
    <div class="row">
	@if(Session::has('message'))
	<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
	@endif			
      <div class="col-md-12">
        <div class="listing-div">
          <div class="row">
            <div class="col-md-12">
              <div class="listing-heading">
                <h2 style="text-align:left">PEFIL DE AGENCIA</h2>
              </div>
            </div>
             	
             <div class="col-md-4 col-lg-3 col-sm-6">
              <a href="{{url('agencia/create-add')}}">
              <div class="listing-icon-text icon-2">
                <!-- <i class="fas fa-meteor"></i> --><span class="icon-font" style="font-size:20px">CREAR ANUNCIOS</span>
              </div>
               </a>
            </div>
             <!-- <div class="col-md-4 col-lg-3 col-sm-6">
              <a href="#">
              <div class="listing-icon-text icon-3">
                <i class="fas fa-bullhorn"></i> <span style="font-size:20px">ANUNCIOS CREADOS</span>
              </div>
              </a>
            </div> -->
             <div class="col-md-4 col-lg-3 col-sm-6">
             <a href="{{url('agencia/anuncios-activos')}}">
              <div class="listing-icon-text icon-1">
                <!-- <i class="fas fa-sync"></i> --> <span style="font-size:20px"> AUNCIOS ACTIVOS</span>
              </div>
              </a>
            </div>
            <div class="col-md-4 col-lg-3 col-sm-6">
               <a href="{{url('agencia/zona-top')}}">
              <div class="listing-icon-text icon-2">
                <!-- <i class="fas fa-list"></i> --> <span style="font-size:20px">TOP ANUNCIOS</span>
              </div>
                </a>
            </div>

			<div class="col-md-4 col-lg-3 col-sm-6">
              <a href="{{url('agencia/subida-zone')}}">
              <div class="listing-icon-text icon-3">
                <!-- <i class="fas fa-list"></i> --> <span style="font-size:20px">AUTO SUBIDAS</span>
              </div>
                </a>
            </div>

			<div class="col-md-4 col-lg-3 col-sm-6">
                <a href="#">
              <div class="listing-icon-text icon-1">
                <!-- <i class="fas fa-list"></i> --> <span style="font-size:20px">CONSUMO</span>
              </div>
                </a>
            </div>

			<div class="col-md-4 col-lg-3 col-sm-6">
                <a href="#">
              <div class="listing-icon-text icon-2">
                <!-- <i class="fas fa-list"></i> --> <span style="font-size:20px">Facturacion</span>
              </div>
                </a>
            </div>

			<div class="col-md-4 col-lg-3 col-sm-6">
                <a href="{{url('agencia/datos-de-agencia')}}">
              <div class="listing-icon-text icon-3">
                <!-- <i class="fas fa-list"></i> --> <span style="font-size:20px">DATOS DE AGENCIA</span>
              </div>
                </a>
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