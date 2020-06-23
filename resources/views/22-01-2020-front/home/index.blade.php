@extends('front.layouts.frontlayout')

@section('content')
		<section class="video-grid-sec">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-6 offset-md-1  order-column-text">
						<div class="video-header-text">
							<h1>Escorts y putas en España</h1>
							<nav aria-label="breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item active" aria-current="page">España</li>
								</ol>
							</nav>
						</div>
					</div>
					<div class="col-md-5  order-column-icon">
						<div class="icon-div">
							<a href="" data-toggle="modal" data-target="#escrot">Crear Anuncio</a>
							<a href="#" class="alta-button" data-toggle="modal" data-target="#register-modal"><i class="fas fa-users"></i> Mi Cuenta</a>
							
						</div>
					</div>
					
					
				</div>
				
				
				<div class="row gird-first">
					<div class="col-md-1 top-fix-main">
					<div class="top-fix-button">
					<h2>TOP Anuncio</h2>
					</div>
					</div>
					<div class="col-md-11 masonry">
						<?php foreach($top_zona as $ads){?>
						<?php $data = profile($ads->profile_ads_id); ?>
						<?php $photos = array();
if(!empty($data->selfie_1)){
$photos[] =  array(
'name'=>$data->selfie_1,
'type'=>'selfie',
);
}
if(!empty($data->selfie_2)){
$photos[] =  array(
'name'=>$data->selfie_2,
'type'=>'selfie',
);
}
if(!empty($data->selfie_3)){
$photos[] =  array(
'name'=>$data->selfie_3,
'type'=>'selfie',
);
}
if(!empty($data->selfie_4)){
$photos[] =  array(
'name'=>$data->selfie_4,
'type'=>'selfie',
);
}
if(!empty($data->gallery_1)){
$photos[] =  array(
'name'=>$data->gallery_1,
'type'=>'photo',
);
}
if(!empty($data->gallery_2)){
$photos[] =  array(
'name'=>$data->gallery_2,
'type'=>'photo',
);
}
if(!empty($data->gallery_3)){
$photos[] =  array(
'name'=>$data->gallery_3,
'type'=>'photo',
);
}
if(!empty($data->gallery_4)){
$photos[] =  array(
'name'=>$data->gallery_4,
'type'=>'photo',
);
}
if(!empty($data->gallery_5)){
$photos[] =  array(
'name'=>$data->gallery_5,
'type'=>'photo',
);
}
if(!empty($data->gallery_6)){
$photos[] =  array(
'name'=>$data->gallery_6,
'type'=>'photo',
);
}
if(!empty($data->gallery_7)){
$photos[] =  array(
'name'=>$data->gallery_7,
'type'=>'photo',
);
}
if(!empty($data->gallery_8)){
$photos[] =  array(
'name'=>$data->gallery_8,
'type'=>'photo',
);
}

?>
	
						<div class="item video-image" data-toggle="modal" data-target="#girl_modals{{$ads->profile_ads_id}}">
							<a href="#" >
								<div class="img-top">
									<img src="<?php echo URL::asset('public/uploads/profile_ads/'.$data->profile_pic);?>" class="img-fluid" alt="">
									<div class="overlay">
										
										<div class="text">
											<a href="#" class="a1"><i class="fas fa-heart"></i></a>
											<a href="" class="a2"><i class="fas fa-check"></i></a>
											<a href="" class="a3"><i class="fas fa-play"></i></a>
										<a href="" class="a4"><i class="fas fa-info"></i></a></div>
									</div>
								</div>
							</a>
							<a href="#">
								<div class="img-text">
									<a href="#" class="btn btn-dark">{{$data->nationality}}</a>
									<a href="#" class="btn btn-dark">{{$data->age}} años</a>
									<a href="#" class="btn btn-dark">150 €</a>
									<span><img src="{{URL::asset('public/front/images/united-kingdom.png')}}" class="img-fluid"></span>
									<p>{{$data->text}}</p>
								</div>
							</a>
						</div>
						<!------Girl Popup----->
<section class="main-pop-sec">
				<!-- The Modal -->
				<div class="modal fade show" id="girl_modals{{$ads->profile_ads_id}}">
					
					
					<div class="modal-dialog main-popup modal-xl">
						<div class="row">
							<div class="modal-content">
							<div class="popupclick-button">
							<?php $top_previous_profile = top_previous_profile($ads->id);?>
							<?php $top_next_profile = top_next_profile($ads->id);?>
							
						<?php if(!empty($top_previous_profile)){?>
							<button data-id="{{$top_previous_profile}}"  class="btn btn-danger left"><i class="fas fa-arrow-left"></i> </button>
						<?php } ?>
						<?php if(!empty($top_next_profile)){?>
						<button data-id="{{$top_next_profile}}" class="btn btn-danger right"><i class="fas fa-arrow-right"></i> </button>
						<?php } ?>
					</div> 
								<!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
								<div class="col-md-12">
									<div class="row">
										<div class="col-md-6">
											<div class="main-div-popup">
												<div class="top-pop-img common-left">
													<div class="profile-img-top">
													<?php 
														if(!empty($data->profile_pic)){?>
														<a class="example-image-link-top{{$ads->profile_ads_id}}" href="<?php echo URL::asset('public/uploads/profile_ads/'.$data->profile_pic);?>" data-lightbox="example-set-top{{$ads->profile_ads_id}}" ><img class="example-image-top{{$ads->profile_ads_id}}" src="<?php echo URL::asset('public/uploads/profile_ads/'.$data->profile_pic);?>" width="100%" height="100%"  /></a>
														<?php }?>
														
														<div class="profile-img-text">
															<a href="#photos"><i class="fa fa-image"></i> <?php echo  count($photos)+1;?> Pictures</a>
														</div>
														
														


														
														
													</div>
												</div>
												
												<div class="graf-img-main common-left">
													
													<div id="anuncio_productos">
														<h4>Statistics Of This Ad</h4> <span id="estadisticas_ver_mas" class="onclick enlace_antiguo" data-src="/estadisticas/8xwbj">ver más</span>
													<div class="producto_estadisticas">
														   <div style="position: relative; width: 309px; height: 110px;" dir="ltr">
            <div style="position: absolute; left: 0px; top: 0px; width: 100%; height: 100%;" aria-label="Un gráfico.">
                <svg width="309" height="110" style="overflow: hidden;" aria-label="Un gráfico.">
                    <defs id="defs">
                        <clipPath id="_ABSTRACT_RENDERER_ID_1">
                            <rect x="54" y="15" width="246" height="70"></rect>
                        </clipPath>
                    </defs>
                    <rect x="0" y="0" width="309" height="110" stroke="none" stroke-width="0" fill="#ffffff"></rect>
                    <g>
                        <rect x="54" y="15" width="246" height="70" stroke="none" stroke-width="0" fill-opacity="0" fill="#ffffff"></rect>
                        <g clip-path="url(https://www.slumi.com/escorts/barcelona/capital/pla%C3%A7a-espanya/la-escort-mas-complaciente-acabo-de-llegar-a-la-ciudad-id-8xwbj#_ABSTRACT_RENDERER_ID_1)">
                            <g>
                                <rect x="54" y="84" width="246" height="1" stroke="none" stroke-width="0" fill="#cccccc"></rect>
                                <rect x="54" y="67" width="246" height="1" stroke="none" stroke-width="0" fill="#cccccc"></rect>
                                <rect x="54" y="50" width="246" height="1" stroke="none" stroke-width="0" fill="#cccccc"></rect>
                                <rect x="54" y="32" width="246" height="1" stroke="none" stroke-width="0" fill="#cccccc"></rect>
                                <rect x="54" y="15" width="246" height="1" stroke="none" stroke-width="0" fill="#cccccc"></rect>
                            </g>
                            <g>
                                <g>
                                    <path d="M54.5,84.5L54.5,84.5L54.5,69.182L79,31.85875L103.5,34.60725L128,33.23875L152.5,33.54925L177,36.34375L201.5,31.163000000000004L226,25.125500000000002L250.5,56.13525L275,33.67575L299.5,66.629L299.5,84.5L299.5,84.5Z" stroke="none" stroke-width="0" fill-opacity="0.4" fill="#0072c6"></path>
                                </g>
                            </g>
                            <g>
                                <rect x="54" y="84" width="246" height="1" stroke="none" stroke-width="0" fill="#333333"></rect>
                            </g>
                            <g>
                                <path d="M54.5,69.182L79,31.85875L103.5,34.60725L128,33.23875L152.5,33.54925L177,36.34375L201.5,31.163000000000004L226,25.125500000000002L250.5,56.13525L275,33.67575L299.5,66.629" stroke="#0072c6" stroke-width="2" fill-opacity="1" fill="none"></path>
                            </g>
                        </g>
                        <g></g>
                        <g>
                            <g>
                                <text text-anchor="end" x="46.5" y="88.35" font-family="Verdana" font-size="11" stroke="none" stroke-width="0" fill="#444444">0</text>
                            </g>
                            <g>
                                <text text-anchor="end" x="46.5" y="71.1" font-family="Verdana" font-size="11" stroke="none" stroke-width="0" fill="#444444">3.000</text>
                            </g>
                            <g>
                                <text text-anchor="end" x="46.5" y="53.85" font-family="Verdana" font-size="11" stroke="none" stroke-width="0" fill="#444444">6.000</text>
                            </g>
                            <g>
                                <text text-anchor="end" x="46.5" y="36.6" font-family="Verdana" font-size="11" stroke="none" stroke-width="0" fill="#444444">9.000</text>
                            </g>
                            <g>
                                <text text-anchor="end" x="46.5" y="19.35" font-family="Verdana" font-size="11" stroke="none" stroke-width="0" fill="#444444">12.000</text>
                            </g>
                        </g>
                    </g>
                    <g>
                        <g>
                            <text text-anchor="middle" x="177" y="101.35" font-family="Verdana" font-size="11" stroke="none" stroke-width="0" fill="#222222">Veces en listado últimos 30 días</text>
                            <rect x="54" y="92" width="246" height="11" stroke="none" stroke-width="0" fill-opacity="0" fill="#ffffff"></rect>
                        </g>
                    </g>
                    <g></g>
                </svg>
                <div aria-label="Una representación tabular de los datos del gráfico." style="position: absolute; left: -10000px; top: auto; width: 1px; height: 1px; overflow: hidden;">
                    <table>
                        <thead>
                            <tr>
                                <th>Dia</th>
                                <th>veces en listado</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Lunes, 28 de Octubre</td>
                                <td>2.664</td>
                            </tr>
                            <tr>
                                <td>Martes, 29 de Octubre</td>
                                <td>9.155</td>
                            </tr>
                            <tr>
                                <td>Miércoles, 30 de Octubre</td>
                                <td>8.677</td>
                            </tr>
                            <tr>
                                <td>Jueves, 31 de Octubre</td>
                                <td>8.915</td>
                            </tr>
                            <tr>
                                <td>Viernes, 1 de Noviembre</td>
                                <td>8.861</td>
                            </tr>
                            <tr>
                                <td>Sábado, 2 de Noviembre</td>
                                <td>8.375</td>
                            </tr>
                            <tr>
                                <td>Domingo, 3 de Noviembre</td>
                                <td>9.276</td>
                            </tr>
                            <tr>
                                <td>Lunes, 4 de Noviembre</td>
                                <td>10.326</td>
                            </tr>
                            <tr>
                                <td>Martes, 5 de Noviembre</td>
                                <td>4.933</td>
                            </tr>
                            <tr>
                                <td>Miércoles, 6 de Noviembre</td>
                                <td>8.839</td>
                            </tr>
                            <tr>
                                <td>Jueves, 7 de Noviembre</td>
                                <td>3.108</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
														<div id="anuncio_estadisticas_valores">
															<div class="anuncio_info_listados veces_listado">
																<span class="anuncio-info-estadistica" id="anuncio_listado_total">83.129</span>
																<p>times listed</p>
																</div><div class="anuncio_info_listados veces_listado">
																<span class="anuncio-info-estadistica" id="anuncio_total">3.819</span>
																<p>they saw the phone</p>
																</div><div class="anuncio_info_listados subir_listado">
																<span class="anuncio-info-estadistica" id="anuncio_subir_total">0</span>
																<p>uploads</p>
																</div><div class="anuncio_info_listados subir_listado">
																<span class="anuncio-info-estadistica" id="anuncio_telefono_total">11</span>
																<p>top days</p>
															</div>
														</div>
													</div>
													
												</div>
												
												
											</div>
											
											
											
										</div><!-- main-div-popup -->
									</div><!-- col-md-6 -->
									
									
									
									<!-- right-div-start -->
									<div class="col-md-6">
										<div class="right-main-popup">
											<div class="girl-detais-div common-div">
												<h3>{{$data->first_name}}  |  {{$data->telephone}}</h3>
												<div class="main-justify-div">
													<div class="justify-girl-detais"><h5> Edad  </h5> <span class="name2">{{$data->age}}</span></div>
													<div class="justify-girl-detais"><h5>Nacionalidad</h5> <span class="name2">{{$data->nationality}}</span></div>
												</div>
												<div class="main-justify-div">
													<div class="justify-girl-detais"><h5>Localidad  </h5> <span class="name2">{{$data->population}} </span></div>
													<div class="justify-girl-detais"><h5>Estatura </h5> <span class="name2">{{$data->height}}</span></div>
												</div>
												<div class="main-justify-div">
													<div class="justify-girl-detais second-justi"><h5> Peso</h5> <span class="name2">{{$data->weight}}</span></div>
													<div class="justify-girl-detais second-justi"><h5>Pecho</h5> <span class="name2">{{$data->chest}}</span></div>
												</div>
												<div class="main-justify-div">
													<div class="justify-girl-detais second-justi"><h5>Cabello</h5><<span class="name2">{{$data->hair}}</span></div>
													<div class="justify-girl-detais second-justi"><h5>Ojos</h5><<span class="name2">{{$data->eyes}}</span></div>
												</div>
												
												<div class="contact-link"><a href="#" class="btn btn-primary"><i class="fas fa-phone-alt"></i> <span>{{$data->telephone}}</span></a>
													<a href="#" class="btn btn-success"><i class="fa fa-whatsapp"></i>   <span>whatsapp</span></a>
												</div>
												<div class="share-links">
													<a href="#"><i class="fa fa-share-alt"></i>  <span>Compartir</span></a>
													<a href="#"><i class="fa fa-heart"></i>  <span>Favoritos</span></a>
													<a href="#"><i class="fa fa-bug"></i>  <span>Denunciar</span></a>
												</div>
											</div>  
											
			
				
											<div class="descreption common-div">
												<h4>Description</h4>
												<div class="comment more">  
												{{$data->text}}
												</div> 												
											</div>
											
											<?php if(!empty($data->tariffs)){?>
											<div class="price-list common-div">
												<div class="price big">
													<h4>Tariffs</h4>
													
													@foreach(json_decode($data->tariffs) as $tariffs)
													<h6><span>{{$tariffs->tariffs_description}}</span> <span>{{$tariffs->tariffs_euro_price}} €</span></h6>													
													@endforeach;
													
												</div>
											</div>
											<?php } ?>
											<div class="price-list list common-div">
												<div class="price big">
													<h4>Horario</h4>
													<h6><span>Lunes a Domingo</span> <span>24 horas</span></h6>
													<h6><span>Lunes a Domingo</span> <span>24 horas</span></h6>
													<h6><span>Lunes a Domingo</span> <span>24 horas</span></h6>
												</div>
											</div>
											
											
											
										</div><!-- right-main-popup -->
									</div><!-- col-md-6 -->
									
									
									<div class="col-md-12">
										<div class="photos-left-div common-left" id="photos">
											<h4>Photos</h4>
											<div class="images-div row">
												
												<?php $Iphoto = 1; foreach($photos as $photo){?>
												<div class="phtos-img-grid col-md-3">
												<div class="photo-grid-in">
												<a class="example-image-link-top{{$ads->profile_ads_id}}" href="<?php echo URL::asset('public/uploads/profile_ads/'.$photo['name']);?>" data-lightbox="example-set-top{{$ads->profile_ads_id}}" ><img class="example-image-top{{$ads->profile_ads_id}}" src="<?php echo URL::asset('public/uploads/profile_ads/'.$photo['name']);?>" width="100%" height="100%"  /></a>
												
												<?php if($photo['type']=='selfie'){?>
													<div class="photo-selfie">
														<img src="{{URL::asset('public/front/images/selfred.png')}}" class="img-fluid" alt="">
													</div>
													<?php } ?>
												</div>
												</div>
												<?php $Iphoto++; }?>
												
											</div>
											
										</div>
										
										
										<div class="photos-left-div common-left" > 
											<h4>Video</h4>
											<div class="images-div">
											<?php if(!empty($data->video_1)){?>
												<div class="phtos-img-grid">
													<video id="videoID"  controlslist="nodownload" preload="none" poster="{{URL::asset('public/front/images/model1video.png')}}" height="600" width="400"  class="">
													 <source src="<?php echo URL::asset('public/uploads/profile_ads/'.$data->video_1);?>" type="video/mp4">
													
												</div>
											<?php }?>
											<?php if(!empty($data->video_2)){?>

												<div class="phtos-img-grid">
													<video id="videoID"  controlslist="nodownload" preload="none" poster="{{URL::asset('public/front/images/model1video.png')}}" height="600" width="400"  class="">
													 <source src="<?php echo URL::asset('public/uploads/profile_ads/'.$data->video_2);?>" type="video/mp4">
													
												</div>
												<?php }?>
												<?php if(!empty($data->video_3)){?>

												<div class="phtos-img-grid">
													<video id="videoID"  controlslist="nodownload" preload="none" poster="{{URL::asset('public/front/images/model1video.png')}}" height="600" width="400"  class="">
													 <source src="<?php echo URL::asset('public/uploads/profile_ads/'.$data->video_3);?>" type="video/mp4">
													
												</div>
												<?php }?>
												<?php if(!empty($data->video_4)){?>
												<div class="phtos-img-grid">
													<video id="videoID"  controlslist="nodownload" preload="none" poster="{{URL::asset('public/front/images/model1video.png')}}" height="600" width="400"  class="">
													 <source src="<?php echo URL::asset('public/uploads/profile_ads/'.$data->video_4);?>" type="video/mp4">
													
												</div>
												<?php }?>
												
												
											</div>
											
										</div>
									</div>
									
									<!-- services div-open -->
									<?php  if(!empty($data->over_you)){?>
											<div class="col-md-6">
										<div class="Sobre-tags common-left">
													<h4> Sobre Mi </h4>
													<?php 
													$over_you = explode(',', $data->over_you);

														?>
													@foreach($over_you as $over_you_data)
													<span>{{$over_you_data}}</span>
													@endforeach;
													
												</div>
									</div>
											<?php } ?>
											
											<?php  if(!empty($data->services)){?>
											<div class="col-md-6">
										<div class="Sobre-tags common-left">
													<h4> Servicios </h4>
													<?php 
													$services = explode(',', $data->services);

														?>
													@foreach($services as $services_data)
													<span>{{$services_data}}</span>
													@endforeach;
													
												</div>
									</div>
											<?php } ?>
								
									
									
								</div><!-- modal-content -->
							</div><!-- modal-content -->
						</div><!-- row -->
					</div><!-- modal-dialog modal-xl container -->
				</div><!-- modal fade show -->
					
					
					</div>  
					
				
				
				
			</section>
						<?php } ?>
						
						</div>
						
				
	<!---------------------------------------------------Subida Zona ads------>			
						
					<div class="col-md-11 masonry offset-md-1">
					<?php foreach($subida as $ads2){?>
						<?php $data2 = profile($ads2->profile_ads_id); ?>
							<?php $photos2 = array();
if(!empty($data->selfie_1)){
$photos2[] =  array(
'name'=>$data2->selfie_1,
'type'=>'selfie',
);
}
if(!empty($data2->selfie_2)){
$photos2[] =  array(
'name'=>$data2->selfie_2,
'type'=>'selfie',
);
}
if(!empty($data2->selfie_3)){
$photos2[] =  array(
'name'=>$data2->selfie_3,
'type'=>'selfie',
);
}
if(!empty($data2->selfie_4)){
$photos2[] =  array(
'name'=>$data2->selfie_4,
'type'=>'selfie',
);
}
if(!empty($data2->gallery_1)){
$photos2[] =  array(
'name'=>$data2->gallery_1,
'type'=>'photo',
);
}
if(!empty($data2->gallery_2)){
$photos2[] =  array(
'name'=>$data2->gallery_2,
'type'=>'photo',
);
}
if(!empty($data2->gallery_3)){
$photos2[] =  array(
'name'=>$data2->gallery_3,
'type'=>'photo',
);
}
if(!empty($data2->gallery_4)){
$photos2[] =  array(
'name'=>$data2->gallery_4,
'type'=>'photo',
);
}
if(!empty($data2->gallery_5)){
$photos2[] =  array(
'name'=>$data2->gallery_5,
'type'=>'photo',
);
}
if(!empty($data2->gallery_6)){
$photos2[] =  array(
'name'=>$data2->gallery_6,
'type'=>'photo',
);
}
if(!empty($data2->gallery_7)){
$photos2[] =  array(
'name'=>$data2->gallery_7,
'type'=>'photo',
);
}
if(!empty($data2->gallery_8)){
$photos2[] =  array(
'name'=>$data2->gallery_8,
'type'=>'photo',
);
}

?>
	
						<div class="item video-image" data-toggle="modal" data-target="#girl_modals{{$ads2->profile_ads_id}}-subida">
							<a href="#">
								<div class="img-top">
									<img src="<?php echo URL::asset('public/uploads/profile_ads/'.$data2->profile_pic);?>" class="img-fluid" alt="">
									<div class="overlay">
										<div class="text"><a href="#" class="a1"><i class="fas fa-heart"></i></a>
											<a href="" class="a2"><i class="fas fa-check"></i></a>
											<a href="" class="a3"><i class="fas fa-play"></i></a>
											<a href="" class="a4"><i class="fas fa-info"></i></a>
										</div>
									</div>
								</div>
								<div class="img-text white-bg">
									<a href="#" class="btn btn-dark">{{$data2->nationality}}</a>
									<a href="#" class="btn btn-dark">{{$data2->age}} años</a>
									<a href="#" class="btn btn-dark">150 €</a>
									<span><img src="{{URL::asset('public/front/images/united-kingdom.png')}}" class="img-fluid"></span>
									<p>{{$data2->text}}</p>
								</div>
							</a>
						</div>

							<!------Girl Popup----->
<section class="main-pop-sec">
				<!-- The Modal -->
				<div class="modal fade show" id="girl_modals{{$ads2->profile_ads_id}}-subida">
					<div class="popupclick-button">
						<button class="btn btn-danger left"><i class="fas fa-arrow-left"></i> </button>
						<button class="btn btn-danger right"><i class="fas fa-arrow-right"></i> </button>
					</div> 
					
					<div class="modal-dialog main-popup modal-xl">
						<div class="row">
							<div class="modal-content">
								<!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
								<div class="col-md-12">
									<div class="row">
										<div class="col-md-6">
											<div class="main-div-popup">
												<div class="top-pop-img common-left">
													<div class="profile-img-top">
													<?php 
														if(!empty($data2->profile_pic)){?>
														<a class="example-image-link-top{{$ads2->profile_ads_id}}" href="<?php echo URL::asset('public/uploads/profile_ads/'.$data2->profile_pic);?>" data-lightbox="example-set-top{{$ads2->profile_ads_id}}" ><img class="example-image-top{{$ads2->profile_ads_id}}" src="<?php echo URL::asset('public/uploads/profile_ads/'.$data2->profile_pic);?>" width="100%" height="100%"  /></a>
														<?php }?>
														
														<div class="profile-img-text">
															<a href="#photos"><i class="fa fa-image"></i> <?php echo  count($photos2)+1;?> Pictures</a>
														</div>
														
														


														
														
													</div>
												</div>
												
												<div class="graf-img-main common-left">
													
													<div id="anuncio_productos">
														<h4>Statistics Of This Ad</h4> <span id="estadisticas_ver_mas" class="onclick enlace_antiguo" data-src="/estadisticas/8xwbj">ver más</span>
													<div class="producto_estadisticas">
														   <div style="position: relative; width: 309px; height: 110px;" dir="ltr">
            <div style="position: absolute; left: 0px; top: 0px; width: 100%; height: 100%;" aria-label="Un gráfico.">
                <svg width="309" height="110" style="overflow: hidden;" aria-label="Un gráfico.">
                    <defs id="defs">
                        <clipPath id="_ABSTRACT_RENDERER_ID_1">
                            <rect x="54" y="15" width="246" height="70"></rect>
                        </clipPath>
                    </defs>
                    <rect x="0" y="0" width="309" height="110" stroke="none" stroke-width="0" fill="#ffffff"></rect>
                    <g>
                        <rect x="54" y="15" width="246" height="70" stroke="none" stroke-width="0" fill-opacity="0" fill="#ffffff"></rect>
                        <g clip-path="url(https://www.slumi.com/escorts/barcelona/capital/pla%C3%A7a-espanya/la-escort-mas-complaciente-acabo-de-llegar-a-la-ciudad-id-8xwbj#_ABSTRACT_RENDERER_ID_1)">
                            <g>
                                <rect x="54" y="84" width="246" height="1" stroke="none" stroke-width="0" fill="#cccccc"></rect>
                                <rect x="54" y="67" width="246" height="1" stroke="none" stroke-width="0" fill="#cccccc"></rect>
                                <rect x="54" y="50" width="246" height="1" stroke="none" stroke-width="0" fill="#cccccc"></rect>
                                <rect x="54" y="32" width="246" height="1" stroke="none" stroke-width="0" fill="#cccccc"></rect>
                                <rect x="54" y="15" width="246" height="1" stroke="none" stroke-width="0" fill="#cccccc"></rect>
                            </g>
                            <g>
                                <g>
                                    <path d="M54.5,84.5L54.5,84.5L54.5,69.182L79,31.85875L103.5,34.60725L128,33.23875L152.5,33.54925L177,36.34375L201.5,31.163000000000004L226,25.125500000000002L250.5,56.13525L275,33.67575L299.5,66.629L299.5,84.5L299.5,84.5Z" stroke="none" stroke-width="0" fill-opacity="0.4" fill="#0072c6"></path>
                                </g>
                            </g>
                            <g>
                                <rect x="54" y="84" width="246" height="1" stroke="none" stroke-width="0" fill="#333333"></rect>
                            </g>
                            <g>
                                <path d="M54.5,69.182L79,31.85875L103.5,34.60725L128,33.23875L152.5,33.54925L177,36.34375L201.5,31.163000000000004L226,25.125500000000002L250.5,56.13525L275,33.67575L299.5,66.629" stroke="#0072c6" stroke-width="2" fill-opacity="1" fill="none"></path>
                            </g>
                        </g>
                        <g></g>
                        <g>
                            <g>
                                <text text-anchor="end" x="46.5" y="88.35" font-family="Verdana" font-size="11" stroke="none" stroke-width="0" fill="#444444">0</text>
                            </g>
                            <g>
                                <text text-anchor="end" x="46.5" y="71.1" font-family="Verdana" font-size="11" stroke="none" stroke-width="0" fill="#444444">3.000</text>
                            </g>
                            <g>
                                <text text-anchor="end" x="46.5" y="53.85" font-family="Verdana" font-size="11" stroke="none" stroke-width="0" fill="#444444">6.000</text>
                            </g>
                            <g>
                                <text text-anchor="end" x="46.5" y="36.6" font-family="Verdana" font-size="11" stroke="none" stroke-width="0" fill="#444444">9.000</text>
                            </g>
                            <g>
                                <text text-anchor="end" x="46.5" y="19.35" font-family="Verdana" font-size="11" stroke="none" stroke-width="0" fill="#444444">12.000</text>
                            </g>
                        </g>
                    </g>
                    <g>
                        <g>
                            <text text-anchor="middle" x="177" y="101.35" font-family="Verdana" font-size="11" stroke="none" stroke-width="0" fill="#222222">Veces en listado últimos 30 días</text>
                            <rect x="54" y="92" width="246" height="11" stroke="none" stroke-width="0" fill-opacity="0" fill="#ffffff"></rect>
                        </g>
                    </g>
                    <g></g>
                </svg>
                <div aria-label="Una representación tabular de los datos del gráfico." style="position: absolute; left: -10000px; top: auto; width: 1px; height: 1px; overflow: hidden;">
                    <table>
                        <thead>
                            <tr>
                                <th>Dia</th>
                                <th>veces en listado</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Lunes, 28 de Octubre</td>
                                <td>2.664</td>
                            </tr>
                            <tr>
                                <td>Martes, 29 de Octubre</td>
                                <td>9.155</td>
                            </tr>
                            <tr>
                                <td>Miércoles, 30 de Octubre</td>
                                <td>8.677</td>
                            </tr>
                            <tr>
                                <td>Jueves, 31 de Octubre</td>
                                <td>8.915</td>
                            </tr>
                            <tr>
                                <td>Viernes, 1 de Noviembre</td>
                                <td>8.861</td>
                            </tr>
                            <tr>
                                <td>Sábado, 2 de Noviembre</td>
                                <td>8.375</td>
                            </tr>
                            <tr>
                                <td>Domingo, 3 de Noviembre</td>
                                <td>9.276</td>
                            </tr>
                            <tr>
                                <td>Lunes, 4 de Noviembre</td>
                                <td>10.326</td>
                            </tr>
                            <tr>
                                <td>Martes, 5 de Noviembre</td>
                                <td>4.933</td>
                            </tr>
                            <tr>
                                <td>Miércoles, 6 de Noviembre</td>
                                <td>8.839</td>
                            </tr>
                            <tr>
                                <td>Jueves, 7 de Noviembre</td>
                                <td>3.108</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
														<div id="anuncio_estadisticas_valores">
															<div class="anuncio_info_listados veces_listado">
																<span class="anuncio-info-estadistica" id="anuncio_listado_total">83.129</span>
																<p>times listed</p>
																</div><div class="anuncio_info_listados veces_listado">
																<span class="anuncio-info-estadistica" id="anuncio_total">3.819</span>
																<p>they saw the phone</p>
																</div><div class="anuncio_info_listados subir_listado">
																<span class="anuncio-info-estadistica" id="anuncio_subir_total">0</span>
																<p>uploads</p>
																</div><div class="anuncio_info_listados subir_listado">
																<span class="anuncio-info-estadistica" id="anuncio_telefono_total">11</span>
																<p>top days</p>
															</div>
														</div>
													</div>
													
												</div>
												
												
											</div>
											
											
											
										</div><!-- main-div-popup -->
									</div><!-- col-md-6 -->
									
									
									
									<!-- right-div-start -->
									<div class="col-md-6">
										<div class="right-main-popup">
											<div class="girl-detais-div common-div">
												<h3>{{$data->first_name}}  |  {{$data->telephone}}</h3>
												<div class="main-justify-div">
													<div class="justify-girl-detais"><h5> Edad  </h5> <span class="name2">{{$data->age}}</span></div>
													<div class="justify-girl-detais"><h5>Nacionalidad</h5> <span class="name2">{{$data->nationality}}</span></div>
												</div>
												<div class="main-justify-div">
													<div class="justify-girl-detais"><h5>Localidad  </h5> <span class="name2">{{$data->population}} </span></div>
													<div class="justify-girl-detais"><h5>Estatura </h5> <span class="name2">{{$data->height}}</span></div>
												</div>
												<div class="main-justify-div">
													<div class="justify-girl-detais second-justi"><h5> Peso</h5> <span class="name2">{{$data->weight}}</span></div>
													<div class="justify-girl-detais second-justi"><h5>Pecho</h5> <span class="name2">{{$data->chest}}</span></div>
												</div>
												<div class="main-justify-div">
													<div class="justify-girl-detais second-justi"><h5>Cabello</h5><<span class="name2">{{$data->hair}}</span></div>
													<div class="justify-girl-detais second-justi"><h5>Ojos</h5><<span class="name2">{{$data->eyes}}</span></div>
												</div>
												
												<div class="contact-link"><a href="#" class="btn btn-primary"><i class="fas fa-phone-alt"></i> <span>{{$data->telephone}}</span></a>
													<a href="#" class="btn btn-success"><i class="fa fa-whatsapp"></i>   <span>whatsapp</span></a>
												</div>
												<div class="share-links">
													<a href="#"><i class="fa fa-share-alt"></i>  <span>Compartir</span></a>
													<a href="#"><i class="fa fa-heart"></i>  <span>Favoritos</span></a>
													<a href="#"><i class="fa fa-bug"></i>  <span>Denunciar</span></a>
												</div>
											</div>  
											
			
				
											<div class="descreption common-div">
												<h4>Description</h4>
												<div class="comment more">  
												{{$data->text}}
												</div> 												
											</div>
											
											<?php if(!empty($data->tariffs)){?>
											<div class="price-list common-div">
												<div class="price big">
													<h4>Tariffs</h4>
													
													@foreach(json_decode($data->tariffs) as $tariffs)
													<h6><span>{{$tariffs->tariffs_description}}</span> <span>{{$tariffs->tariffs_euro_price}} €</span></h6>													
													@endforeach;
													
												</div>
											</div>
											<?php } ?>
											<div class="price-list list common-div">
												<div class="price big">
													<h4>Horario</h4>
													<h6><span>Lunes a Domingo</span> <span>24 horas</span></h6>
													<h6><span>Lunes a Domingo</span> <span>24 horas</span></h6>
													<h6><span>Lunes a Domingo</span> <span>24 horas</span></h6>
												</div>
											</div>
											
											
											
										</div><!-- right-main-popup -->
									</div><!-- col-md-6 -->
									
									
									<div class="col-md-12">
										<div class="photos-left-div common-left" id="photos">
											<h4>Photos</h4>
											<div class="images-div row">
												
												<?php $Iphoto = 1; foreach($photos2 as $photo){?>
												<div class="phtos-img-grid col-md-3">
												<div class="photo-grid-in">
												<a class="example-image-link-top{{$ads2->profile_ads_id}}" href="<?php echo URL::asset('public/uploads/profile_ads/'.$photo['name']);?>" data-lightbox="example-set-top{{$ads2->profile_ads_id}}" ><img class="example-image-top{{$ads2->profile_ads_id}}" src="<?php echo URL::asset('public/uploads/profile_ads/'.$photo['name']);?>" width="100%" height="100%"  /></a>
												
												<?php if($photo['type']=='selfie'){?>
													<div class="photo-selfie">
														<img src="{{URL::asset('public/front/images/selfred.png')}}" class="img-fluid" alt="">
													</div>
													<?php } ?>
												</div>
												</div>
												<?php $Iphoto++; }?>
												
											</div>
											
										</div>
										
										
										<div class="photos-left-div common-left" > 
											<h4>Video</h4>
											<div class="images-div">
											<?php if(!empty($data->video_1)){?>
												<div class="phtos-img-grid">
													<video id="videoID"  controlslist="nodownload" preload="none" poster="{{URL::asset('public/front/images/model1video.png')}}" height="600" width="400"  class="">
													 <source src="<?php echo URL::asset('public/uploads/profile_ads/'.$data->video_1);?>" type="video/mp4">
													
												</div>
											<?php }?>
											<?php if(!empty($data->video_2)){?>

												<div class="phtos-img-grid">
													<video id="videoID"  controlslist="nodownload" preload="none" poster="{{URL::asset('public/front/images/model1video.png')}}" height="600" width="400"  class="">
													 <source src="<?php echo URL::asset('public/uploads/profile_ads/'.$data->video_2);?>" type="video/mp4">
													
												</div>
												<?php }?>
												<?php if(!empty($data->video_3)){?>

												<div class="phtos-img-grid">
													<video id="videoID"  controlslist="nodownload" preload="none" poster="{{URL::asset('public/front/images/model1video.png')}}" height="600" width="400"  class="">
													 <source src="<?php echo URL::asset('public/uploads/profile_ads/'.$data->video_3);?>" type="video/mp4">
													
												</div>
												<?php }?>
												<?php if(!empty($data->video_4)){?>
												<div class="phtos-img-grid">
													<video id="videoID"  controlslist="nodownload" preload="none" poster="{{URL::asset('public/front/images/model1video.png')}}" height="600" width="400"  class="">
													 <source src="<?php echo URL::asset('public/uploads/profile_ads/'.$data->video_4);?>" type="video/mp4">
													
												</div>
												<?php }?>
												
												
											</div>
											
										</div>
									</div>
									
									<!-- services div-open -->
									<?php  if(!empty($data->over_you)){?>
											<div class="col-md-6">
										<div class="Sobre-tags common-left">
													<h4> Sobre Mi </h4>
													<?php 
													$over_you = explode(',', $data->over_you);

														?>
													@foreach($over_you as $over_you_data)
													<span>{{$over_you_data}}</span>
													@endforeach;
													
												</div>
									</div>
											<?php } ?>
											
											<?php  if(!empty($data->services)){?>
											<div class="col-md-6">
										<div class="Sobre-tags common-left">
													<h4> Servicios </h4>
													<?php 
													$services = explode(',', $data->services);

														?>
													@foreach($services as $services_data)
													<span>{{$services_data}}</span>
													@endforeach;
													
												</div>
									</div>
											<?php } ?>
								
									
									
								</div><!-- modal-content -->
							</div><!-- modal-content -->
						</div><!-- row -->
					</div><!-- modal-dialog modal-xl container -->
				</div><!-- modal fade show -->
					
					
					</div>  
					
				
				
				
			</section>
						<?php } ?>	
					</div>
				</div>
			</div>
			
			
		</section>

<!-- register popup-->

<div class="modal fade" id="register-modal">
	  
					<div class="modal-dialog login container">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
						<div class="modal-content">
							<div class="row">
								<div class="col-md-12">
									<div class="popupheader">
										<h3>Publicar anuncio</h3>
										<p>Para publicar tu anuncio es necesario que te registres primero.</p>
									</div>
								</div>
							</div>
							
								<div class="row">
								
									<div class="col-md-6">
									<form  id="login-form"  method="post" action="javascript:void(0)">
									@csrf
										<div class="popup-form-div border-popup">
											<h4>Ya estoy registrada</h4>
											
											
											<div class="form-group">
												<input required name="email" type="email" class="form-control"  placeholder="Email">
											</div>
											<div class="form-group">
												<input required name="password" type="password" class="form-control"  placeholder="Contraseña">
											</div>
											<div class="custom-control custom-checkbox">
												<input  type="checkbox" class="custom-control-input" id="rimember" name="rimember">
												<label class="custom-control-label" for="rimember">Recuérdame</label>
												<a href="{{url('/members/password-lost')}}" class="form-link">¿Has olvidado tu contraseña?</a>
											</div>
											<div class="alert alert-danger d-none" id="msg_div">
											<span id="res_message"></span>
											</div>
											<input id="send_form" type="submit" name="submit" class="btn btn-primary" value="Entrar en mi panel">
											
										</div>
										</form>
									</div>
									
									
									
									<div class="col-md-6">
									<form  id="register-form"  method="post" action="javascript:void(0)">
									@csrf
										<div class="popup-form-div">
											<h4>Quiero registrarme</h4>
											
											<p>Debes indicarnos un email y te enviaremos un enlace para
												validarlo. Este email no será público, sólo se usará para
											gestionar tus anuncios.</p>
											
											
											<div class="form-group right">
												<input required type="email" class="form-control" name="email"  placeholder="Email">
												 <span class="text-danger">{{ $errors->first('email') }}</span>
											</div>
											<input id="register-form"  method="post" action="javascript:void(0)" type="submit" name="submit" class="btn btn-primary" value="Entrar en mi panel">
											
										</div>
										</form>
									</div>
									
									
									
								</div>							
						</div>
					</div>
				</div>

<!-------escort-popup------>
<div class="modal fade escort-model" id="escrot">
    <div class="modal-dialog modal-lg">
      <div class="modal-content row">
        <!-- Modal Header -->
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        
        <div class="col-md-12 main-escort-div">
          <div class="row">
        <div class="col-md-6" style="border-right: 1px solid #fd2c94;">
          <div class="left-escort">
            <h4>Escort Independiente</h4>
            <p>Regístrese ahora gratis y cree su anuncio. edite su perfil en cualquier momento.</p>
            <span>¿A qué esperas para anunciarte?</span>
            <button class="btn btn-danger register_modal" >+ info</butto>
          </div>
        </div>
         <div class="col-md-6">
          <div class="left-escort">
            <h4>Agencia de Escorts</h4>
            <p>Regístrese ahora gratis y puede editar y actualizar el paquete en cualquier momento.</p>
            <span class="right-span">¿Te podemos ayudar?</span>
            <a href="{{ action('AgencyController@plan_agencia')}}" class="btn btn-primary">+ info</a>
          </div>
        </div>
        </div>
      </div>
        
        
      </div>
    </div>
  </div><!-- escrot model-->				
@endsection