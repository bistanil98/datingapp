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
	
<section class="main-pop-sec">
				<!-- The Modal -->
				<div class="modal fade show" id="girl_modals<?php echo $data->id;?>">
					
					
					<div class="modal-dialog main-popup modal-xl">
						<div class="row">
							<div class="modal-content">
							<div class="popupclick-button">
							<?php $top_previous_profile = top_previous_profile($data->id);?>
							<?php $top_next_profile = top_next_profile($data->id);?>
							
						<?php if(!empty($top_previous_profile)){?>
							<button data-id="<?php echo $top_previous_profile ;?>"  class="btn btn-danger left arrow-left"><i class="fas fa-arrow-left"></i> </button>
						<?php } ?>
						<?php if(!empty($top_next_profile)){?>
						<button data-id="<?php echo $top_next_profile ;?>" class="btn btn-danger right arrow-right"><i class="fas fa-arrow-right"></i> </button>
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
														<a class="example-image-link-top<?php echo $data->id ;?>" href="<?php echo URL::asset('public/uploads/profile_ads/'.$data->profile_pic);?>" data-lightbox="example-set-top<?php echo $data->id ;?>" ><img class="example-image-top<?php echo $data->id ;?>" src="<?php echo URL::asset('public/uploads/profile_ads/'.$data->profile_pic);?>" width="100%" height="100%"  /></a>
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
												<h3 style="color:#fff"><?php echo $data->title ;?></h3>
												<h3><span style="font-size: 18px; color: #d2d2d2;">Name</span> <?php echo ucwords($data->first_name) ;?> </h3>
												<div class="main-justify-div">
													<div class="justify-girl-detais"><h5> Edad  </h5> <span class="name2"><?php echo $data->age ;?></span></div>
													<div class="justify-girl-detais"><h5>Nacionalidad</h5> <span class="name2"><?php echo $data->nationality ;?></span></div>
												</div>
												<div class="main-justify-div">
													<div class="justify-girl-detais"><h5>Localidad  </h5> <span class="name2"><?php echo province($data->province) ;?> </span></div>
													<div class="justify-girl-detais"><h5>Estatura </h5> <span class="name2"><?php echo $data->height ;?> cm</span></div>
												</div>
												<div class="main-justify-div">
													<div class="justify-girl-detais second-justi"><h5> Peso</h5> <span class="name2"><?php echo $data->weight ;?> kg</span></div>
													<div class="justify-girl-detais second-justi"><h5>Ojos</h5><<span class="name2"><?php echo $data->eyes ;?></span></div>
												</div>
												<div class="main-justify-div">
													<div class="justify-girl-detais second-justi"><h5>Cabello</h5><<span class="name2"><?php echo $data->hair ;?></span></div>
													<?php if(!empty($data->chest)){?><div class="justify-girl-detais second-justi"><h5>Talla Pecho</h5> <span class="name2"><?php echo $data->chest ;?> </span></div><?php }?>
													
												</div>
												
												<div class="contact-link">
												<a href="tel:<?php echo $data->telephone ;?>" class="btn btn-primary"><i class="fas fa-phone-alt"></i> <span><?php echo $data->telephone ;?></span></a>
												<?php if($data->contact_me_by_whatsApp=='Yes'){?>
												<?php 
												$line= $data->first_name.', te he visto en Slumi y me gustaría quedar contigo.';
												$text = str_replace(' ', '%20',$line)
												?>
												<a target="_blank" href="https://api.whatsapp.com/send?phone=<?php echo $data->telephone;?>&text=<?php echo $text;?>" class="btn btn-success"><i class="fa fa-whatsapp"></i>
													<span>whatsapp</span>
												</a>
												<?php }else{?>
												<a href="javascript:void(0);" class="btn btn-danger"><i class="fa fa-whatsapp"></i>   <span>whatsapp</span></a>
												<?php } ?>
													
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
												<?php echo $data->text ;?>
												</div> 												
											</div>
											
											<?php if(!empty($data->tariffs)){?>
											<div class="price-list common-div">
												<div class="price big">
													<h4>Tariffs</h4>
													
													<?php foreach(json_decode($data->tariffs) as $tariffs){?>
													<h6><span><?php echo $tariffs->tariffs_description ;?></span> <span><?php echo $tariffs->tariffs_euro_price ;?> €</span></h6>													
													<?php }?>
													
												</div>
											</div>
											<?php } ?>
											<div class="price-list list common-div">
												<div class="price big">
													  <h4>Schedule</h4>
														<?php if($data->schedule_status=='yes'){?>
														<h6><span>Lunes a Domingo</span> <span>
														<?php  $schedule = json_decode($data->schedule,true);													
														//$start = $schedule[0]['from_1'].':'.$schedule[0]['from_2'];													
														//$end = $schedule[0]['unit_1'].':'.$schedule[0]['unit_2'];
														//echo workingHour($start, $end).' horas';
														echo 'From the '. $schedule[0]['from_1'].':'.$schedule[0]['from_2'].' Until '.$schedule[0]['unit_1'].':'.$schedule[0]['unit_2'];
														?>
															</span></h6>
														<?php }else{?>
														<?php $schedulecheck  = json_decode($data->schedule,true);
														
														foreach($schedulecheck as $scheduledata){ 
														echo '<h6><span>'.$scheduledata['days'].'</span> <span>';
														//$start = $scheduledata['from_1'].':'.$scheduledata['from_2'];													
														//$end = $scheduledata['unit_1'].':'.$scheduledata['unit_2'];
														//echo workingHour($start, $end).' horas </span></h6>';
														echo 'From the '. $scheduledata['from_1'].':'.$scheduledata['from_2'].' Until '.$scheduledata['unit_1'].':'.$scheduledata['unit_2'];
														echo ' horas </span></h6>';
														 } ?>
														<?php }?>
													
												</div>
											</div>
											
											
											
										</div><!-- right-main-popup -->
									</div><!-- col-md-6 -->
									
									
									<!-- phot0s-grid-section -->
									<div class="col-md-12">
									<div class="photos-left-div common-left" id="photos">
									<h4>photos</h4>
									</div>
									</div>

									<div class="images-div-grid">
									<?php $Iphoto = 1; foreach($photos as $photo){?>
									<div class="phtos-img-grid">

									<a class="example-image-link-top<?php echo $data->id ;?>" href="<?php echo URL::asset('public/uploads/profile_ads/'.$photo['name']);?>" data-lightbox="example-set-top<?php echo $data->id ;?>" ><img class="example-image-top<?php echo $data->id ;?>" src="<?php echo URL::asset('public/uploads/profile_ads/'.$photo['name']);?>" width="100%" height="100%"  /></a>

									<?php if($photo['type']=='selfie'){?>
									<div class="photo-selfie">
									<img src="<?php echo URL::asset('public/front/images/selfred.png') ;?>" class="img-fluid" alt="">
									</div>
									<?php } ?>

									</div>
									<?php $Iphoto++; }?>




									</div><!-- col-md-12 -->
									<!-- phot0s-grid-section-close -->
									<?php if(video_check($data->id)>0){?>
									<div class="col-md-12">
									
										<div class="photos-left-div common-left" > 
											<h4>Video</h4>
											<div class="images-div">
											<?php if(!empty($data->video_1)){?>
												<div class="phtos-img-grid">
													<video id="videoID"  controlslist="nodownload" preload="none" poster="<?php echo URL::asset('public/front/images/model1video.png') ;?>" height="600" width="400"  class="">
													 <source src="<?php echo URL::asset('public/uploads/profile_ads/'.$data->video_1);?>" type="video/mp4">
													
												</div>
											<?php }?>
											<?php if(!empty($data->video_2)){?>

												<div class="phtos-img-grid">
													<video id="videoID"  controlslist="nodownload" preload="none" poster="<?php echo URL::asset('public/front/images/model1video.png') ;?>" height="600" width="400"  class="">
													 <source src="<?php echo URL::asset('public/uploads/profile_ads/'.$data->video_2);?>" type="video/mp4">
													
												</div>
												<?php }?>
												<?php if(!empty($data->video_3)){?>

												<div class="phtos-img-grid">
													<video id="videoID"  controlslist="nodownload" preload="none" poster="<?php echo URL::asset('public/front/images/model1video.png') ;?>" height="600" width="400"  class="">
													 <source src="<?php echo URL::asset('public/uploads/profile_ads/'.$data->video_3);?>" type="video/mp4">
													
												</div>
												<?php }?>
												<?php if(!empty($data->video_4)){?>
												<div class="phtos-img-grid">
													<video id="videoID"  controlslist="nodownload" preload="none" poster="<?php echo URL::asset('public/front/images/model1video.png') ;?>" height="600" width="400"  class="">
													 <source src="<?php echo URL::asset('public/uploads/profile_ads/'.$data->video_4);?>" type="video/mp4">
													
												</div>
												<?php }?>
												
												
											</div>
											
										</div>
									</div>
									<?php }?>
									<!-- services div-open -->
									<?php  if(!empty($data->over_you)){?>
											<div class="col-md-6">
										<div class="Sobre-tags common-left">
													<h4> Sobre Mi </h4>
													<?php 
													$over_you = explode(',', $data->over_you);

														?>
													<?php foreach($over_you as $over_you_data){ ?>
													<span><?php echo $over_you_data ;?></span>
													<?php }; ?>
													
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
													<?php foreach($services as $services_data){?>
													<span><?php echo $services_data ;?></span>
											<?php } ?>
													
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