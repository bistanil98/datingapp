@extends('front.layouts.member')

@section('content')
<link href="{{URL::asset('public/front/css/performance.css')}}" rel="stylesheet"/>
<link href="{{URL::asset('public/front/css/apexcharts.css')}}" rel="stylesheet"/>
<link href="{{URL::asset('public/front/css/dash_1.css')}}" rel="stylesheet"/>
<input type="hidden" id="get_profile_id" value="{{$id}}"/>
<?php
$end =  date('d/m/Y');
$start =  date('d/m/Y', strtotime('-30 days'));
?>
<section class="graf-videw-sec">
 <div class="container-fluid">
   <div class="row">
<div class="col-md-3">
    <div class="graf-coldiv tb-graph">
      <span class="heading"><h4>Totales</h4></span>
      <div class="column-textdiv">
      <span class="column-text"><h4>{{visualizacionesTotal($id)}} <!-- <br> --> <span class="subtext">Visualizaciones</span></h4></span>
      <span class="column-text"><h4>€ {{piesepuertoTotal($id)}} <!-- <br> --> <span class="subtext">Piesepuerto</span></h4></span>
      <span class="column-text"><h4>€ {{piesepuertoTotalTop($id)}} / {{registrationAfterActiveTopAnuncio($id)}} <!-- <br> --> <span class="subtext">Top Anuncio </span></h4></span>
      <span class="column-text"><h4>€ {{piesepuertoTotalSubida($id)}} / {{registrationAfterGoneAutoSubida($id)}} <!-- <br> --> <span class="subtext">  Auto Subida</span></h4></span>
      </div>

      <label class="dates-label">Datos del <?php echo date('d/m/Y',strtotime($ads->created_at));?> al <?php echo date('d/m/Y');?></label>
    </div>
  </div>




     <div class="col-md-9">
       <div class="graf-bg">
           <?php 
           $province = createSlug(province($ads->province));
												$population = createSlug(($ads->population));
												$first_name = createSlug(($ads->first_name));
												$id = (($ads->id));
												$url = url('escorts/'.$province.'/'.$population.'/'.$first_name.'/'.$id);
												?>
        <a href="<?php echo $url;?>">
         <span class="graf-img">
           <img src="<?php if(!empty($ads->profile_pic)){  echo URL::asset('public/uploads/profile_ads/'.$ads->profile_pic); }?>" class="img-fluid" alt="">
         </span>
         <span class="graf-heading">
           <h5>Española súper completa, te haré de todo, seré tu vecina cachonda.</h5>
   
         <span class="detils-grafimg">
		<label style="font-size: 24px;
    font-weight: 400;
    color: #fd2c94;
    margin-bottom: 8px;">   {{$ads->first_name}}</label>
		<label ><i class="fas fa-map-marker-alt"></i> <?php echo province($ads->province);?>, <?php echo ($ads->population);?></label>
		
		<label > <i class="fas fa-phone-alt"></i> <?php echo ($ads->telephone);?></label>
         </span>
         </a>
       </div>
     </div>




</div>

<div class="row">
  <div class="col-md-3">
    <div class="graf-coldiv cardoneones">
      <span class="heading" style="margin: 0;"><h4>Visualizaciones <span class="icons"><i class="fas fa-question-circle"></i></span></h4></span>
   <?php /*   <h3 style="color: #fff;    font-weight: 400;
    font-size: 22px;">{{$visualizaciones30Days}}</h3>*/?>
      <div class="widget-one">
                            <div class="widget-content">
                                <div class="w-numeric-value">
                                  
                                </div>
                                <div class="w-chart">
                                    <div id="visualizaciones-chart"></div>
                                </div>
                            </div>
                        </div>

      
      <label class="dates-label">Datos del {{$start}} al {{$end}}</label>
    </div>



  </div>
  <div class="col-md-3">
    <div class="graf-coldiv">
      <span class="heading" style="margin: 0;"><h4>Piesepuerto <span class="icons"><i class="fas fa-question-circle"></i></span></h4></span>
     <?php /* <h3 style="color: #fff;    font-weight: 400;
    font-size: 22px;">€ {{$piesepuerto30Days}}</h3>*/?>
      <div class="widget-one">
                            <div class="widget-content">
                                
                                <div class="w-chart">
                                    <div id="piesepuerto-chart"></div>
                                </div>
                            </div>
                        </div>

      <label class="dates-label">Datos del {{$start}} al {{$end}}</label>


    </div>
  </div>
  <div class="col-md-3">
    <div class="graf-coldiv">
       <span class="heading" style="margin: 0;"><h4>Top Anuncio<span class="icons"><i class="fas fa-question-circle"></i></span></h4></span>
      <?php /*<h3 style="color: #fff;    font-weight: 400;
    font-size: 22px;">{{$TopAnuncioTotalCount}}</h3> <div id="top_anuncio-chart"></div> <div id="anuncio_estadisticas_top"></div>*/?>
    
       <div class="widget-one">
                            <div class="widget-content">
                                <div class="w-numeric-value">
                                  
                                </div>
                                <div class="w-chart">
                                   <?php /* <div id="top_anuncio-chart"></div>*/?>
                                    <div id="anuncio_estadisticas_top"></div>
                                </div>
                            </div>
                        </div>

      <label class="dates-label">Datos del {{$start}} al {{$end}}</label>


    </div>
  </div>
  <div class="col-md-3">
    <div class="graf-coldiv">
      <span class="heading" style="margin: 0;"><h4>Auto Subida<span class="icons"><i class="fas fa-question-circle"></i></span></h4></span>
    <?php /*  <h3 style="color: #fff;    font-weight: 400;
    font-size: 22px;">{{$AutoSubidaCount}}</h3>*/?>
    
      <div class="widget-one">
                            <div class="widget-content">
                                <div class="w-numeric-value">
                                  
                                </div>
                                <div class="w-chart">
                                    <div id="auto_subida-chart"></div>
                                </div>
                            </div>
                        </div>

      <label class="dates-label">Datos del {{$start}} al {{$end}}</label>


    </div>
  </div>

  


</div>


 </div> 
</section>

<script type="text/javascript" src="{{URL::asset('public/front/js/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('public/front/js/apexcharts.min.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('public/front/js/dash_1.js')}}"></script>

<style>
	span.apexcharts-legend-text {
    color: #fff!important;
}
/*
.apexcharts-tooltip.dark { 
    color: #fff;    background: red!important;

}*/
.apexcharts-tooltip.dark .apexcharts-tooltip-title{
    background: red!important;
}
</style>
<style>
#anuncio_estadisticas_top path {
  fill: #444444;
}

/* Style tooltip start*/
div.google-visualization-tooltip {
background-color: #000;
border: 0px solid #red !important;
}

div.google-visualization-tooltip > ul > li > span {
color: #fff !important;
}
/* Style tooltip end*/
#piesepuerto-chart .light {
    margin-top: -9px!important;
}
}
</style>
@endsection