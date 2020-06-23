@extends('front.layouts.agencia')
@section('content')
<?php if(!$profile_ads->isEmpty()){
?>
<?php
//echo "Action Method==".Route::getCurrentRoute()->getActionMethod();
?>
<section class="create-add-sec activos-sec">
<div class="container">
	<?php if(count($profile_ads)>1){?>
  <div class="row">
    <div class="col-md-12">
      <div class="create-heading">
        <h4>Consumo</h4>
      </div>
    </div>
  <div class="col-md-12 nested-card-main">

    <div class="row border-card-row free-ads">
	
	<?php foreach($profile_ads as $free){?>
	
	
      <div class="col-md-8 col-lg-6">
        <div class="left-image-text-main">
          <div class="card-left-img">
            <img src="<?php if(!empty($free->profile_pic)){  echo URL::asset('public/uploads/profile_ads/'.$free->profile_pic); }?>" class="img-fluid" alt="">
			
			<div class="text-block-image22">
							<h6>{{$free->first_name}}</h6>
						</div>
          </div>
          <div class="left-image-text">
            <div class="graf-img-main common-left">
					
					<div id="anuncio_productos">
					<div class="row">
						<div class="col-md-9"><h4 class="head-title">Estadísticas de este anuncio</h4> </div>
						<div class="col-md-3">
						<span id="estadisticas_ver_mas" class="onclick enlace_antiguo"><a target="_blank" href="{{url('/estadisticas/'.$free->id.'')}}" class="btn btn-primary"> ver más </a></span> 
						</div>
					</div>
						
						
						
						<div class="Estadísticas ">
							<ul class="listado-ul">
								<li>
									<label>
										<span class="maintag"><strong>{{visualizacionesTotal($free->id)}}</strong></span> <span class="simpleg">veces en listado</span>
									</label>
								</li>
								<li>
									<label>
										<span class="maintag">€ <strong>{{piesepuertoTotal($free->id)}}</strong></span> <span class="simpleg">Presupuesto </span>
									</label>
								</li>
								<li>
									<label>
										<!--<span class="maintag">€ <strong>20.00 / --><span class="maintag"><strong>{{registrationAfterActiveTopAnuncio($free->id)}}</strong></span> <span class="simpleg">Top Anuncios</span>
									</label>
								</li>
								<li>
									<label>
										<!--<span class="maintag">€ <strong>0 / --><span class="maintag"><strong>{{registrationAfterGoneAutoSubida($free->id)}}</strong></span> <span class="simpleg">Auto Subida</span>
									</label>
								</li>
								
							</ul>
						</div>
					</div>
					
				</div>
          </div>
        </div>
      </div><!-- col-md-6 -->

	
     <?php }?>
	<hr>
    </div>
 </div><!-- row-1 -->
  </div><!-- col-md-12-nested-main -->
	<?php }else{?>
	  <div class="row row justify-content-md-center">
    <div class="col-md-12">
      <div class="create-heading">
        <h4>Consumo</h4>
      </div>
    </div>
  <div class="col-md-6 nested-card-main">

    <div class="row border-card-row free-ads">
	
	<?php foreach($profile_ads as $free){?>
	
	
      <div class="col-md-12 col-lg-12">
        <div class="left-image-text-main">
          <div class="card-left-img">
            <img src="<?php if(!empty($free->profile_pic)){  echo URL::asset('public/uploads/profile_ads/'.$free->profile_pic); }?>" class="img-fluid" alt="">
					<div class="text-block-image22">
							<h6>{{$free->first_name}}</h6>
						</div>
          </div>
          <div class="left-image-text">
            <div class="graf-img-main common-left">
					
					<div id="anuncio_productos">
					<div class="row">
						<div class="col-md-9"><h4 class="head-title">Estadísticas de este anuncio</h4> </div>
						<div class="col-md-3">
						<span id="estadisticas_ver_mas" class="onclick enlace_antiguo"><a target="_blank" href="{{url('/estadisticas/'.$free->id.'')}}" class="btn btn-primary"> ver más </a></span> 
						</div>
					</div>
						
						
						
						<div class="Estadísticas ">
							<ul class="listado-ul">
								<li>
									<label>
										<span class="maintag"><strong>{{visualizacionesTotal($free->id)}}</strong></span> <span class="simpleg">veces en listado</span>
									</label>
								</li>
								<li>
									<label>
										<span class="maintag">€ <strong>{{piesepuertoTotal($free->id)}}</strong></span> <span class="simpleg">Presupuesto </span>
									</label>
								</li>
								<li>
									<label>
										<!--<span class="maintag">€ <strong>20.00 / --><span class="maintag"><strong>{{registrationAfterActiveTopAnuncio($free->id)}}</strong></span> <span class="simpleg">Top Anuncios</span>
									</label>
								</li>
								<li>
									<label>
										<!--<span class="maintag">€ <strong>0 / --><span class="maintag"><strong>{{registrationAfterGoneAutoSubida($free->id)}}</strong></span> <span class="simpleg">Auto Subida</span>
									</label>
								</li>
								
							</ul>
						</div>
					</div>
					
				</div>
          </div>
        </div>
      </div><!-- col-md-6 -->

	
     <?php }?>
	<hr>
    </div>
 </div><!-- row-1 -->
  </div><!-- col-md-12-nested-main -->

	<?php } ?>
 
  </div>

</section>
	<?php }else{?>
	<section class="subida-zone">
		<div class="container">
			<div class="row">
				<div class="col-md-10 col-lg-11 col-8">
					<div class="subida-header text-center">
						<h3><strong>No hay anuncio</strong></h3>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php }?>
<style>
.activos-sec .left-image-text .icons-right .icons-rt.deactive-red {
    background: red;
    border: red;
}
.disabled-btn{opacity: .50;}

.activos-sec .left-image-text .graf-img-main .anuncio_info_listados.veces_listado {
display: inline-block;
text-align: center;
padding: 0px 6px;
}
.activos-sec .left-image-text .graf-img-main .anuncio_info_listados.veces_listado p {
font-size: 12px;
font-weight: 600; 
color: #fff;
}    
.activos-sec .left-image-text .graf-img-main .anuncio_info_listados.subir_listado p {
font-size: 12px;
font-weight: 600; 
}
.activos-sec .left-image-text .graf-img-main .anuncio_info_listados.subir_listado {
display: inline-block;
text-align: center;
padding: 0px 6px;
}
.activos-sec .left-image-text .graf-img-main {



 padding: 18px 0px;
color: #fff;
}
.left-image-text-main {
    background: #333!important;
}

.activos-sec .left-image-text ul.listado-ul li {
    float: left;
    width: 25%;
    text-align: center;
        border-right: 1px solid #737373;
}
.activos-sec .left-image-text ul.listado-ul li:nth-child(4){
    border: 0px;
}
.activos-sec .left-image-text ul.listado-ul {
    padding: 0;
    margin: 0;
    list-style: none;
        margin-top: 15px;
}
.column-textdiv {
    padding: 0px 6px;
}
.activos-sec .left-image-text ul.listado-ul::after{
    display: block;
    content: '';
    clear: both;
}
.activos-sec .left-image-text span.maintag {
    display: block;
    font-size: 25px;
    line-height: 26px;
}

.activos-sec .left-image-text span.simpleg {    
    font-size: 14px;
    
}
.activos-sec .left-image-text .head-title {
	text-transform:none !important;
    font-size: 20px;
}
.activos-sec .left-image-text .btn-primary {
	padding: 4px!important;
}
#anuncio_productos .row{    padding: 0px 9px;}
.free-ads {
 
    padding-top: 15px;
}

.text-block-image22{
background: #fd2c94;
    padding: 3px 0px;
    border-bottom-left-radius: 12px;
    border-bottom-right-radius: 12px;
    width: 100%;
    text-align: center;
    position: absolute;
    margin-top: -22px;
    width: 126px;
    color: #fff;
    text-transform: capitalize;
}
</style>
@endsection