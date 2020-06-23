	<span id="divID">
			<?php $logo = 0; ?>
					<?php if(count($top_zona)>0){?>
						<?php $top_zona_ids = array(); ?>
						<?php $top = 0; foreach($top_zona as $data){ ?>
						<?php  $top_zona_ids[] = $data->id; ?>
						<?php //$data = profile($data->profile_ads_id,$category); ?>
						<?php if(!empty($data)){ ?>
						
						<?php 
							$province = createSlug(province($data->province));
							$population = createSlug(($data->population));
							$title = createSlug(($data->title));
							$category = (($data->category));
							$id = (($data->id));							
							$url2= 'profile/'.$category.'/'.$province.'/'.$population.'/'.$title.'/'.$id;
							?>
						<div class="item video-image grid-item">
							<a href="#<?php echo $url2;?>"  >
								<div class="img-top">
								<?php if($top>4){?>
								<img src="<?php echo URL::asset('public/uploads/profile_ads/'.$data->profile_pic);?>" class="img-fluid" alt="" onclick="openpopup({{$data->id}}, {{$data->top_subida_profile_listsID}}, 'top')" >
								<?php }else{ ?>
								<img src="<?php echo URL::asset('public/uploads/profile_ads/'.$data->profile_pic);?>" class="img-fluid" alt="" onclick="openpopup({{$data->id}}, {{$data->top_subida_profile_listsID}}, 'top')" >
									<?php } ?>
									
									<div class="overlay">										
										<div class="text">
											<a onclick="favoritos({{$data->id}},'top_zona{{$data->id}}')" href="javascript:void(0)"    class="top_zona{{$data->id}} a1"><i class="fas fa-heart  <?php if(favoritos_check($data->id)>0){ echo 'favrotea1';}?>"></i></a>
											<a href="" class="a2"><i class="fas fa-check"></i></a>
											<a href="" class="a3"><i class="fas fa-play"></i></a>
											<?php 	if($data->role == 'Individual'){ ?>
											<a href="" class="a4"><i class="fas fa-info"></i></a>
											<?php } ?>
									</div>
									</div>
									<?php if(self_check($data->id)>0){?>
									<div class="self-icon">
									<img src="{{URL::asset('public/front/images/self.png')}}" class="img-fluid" alt="">
									</div>
									<?php } ?>
								</div>
						
							<?php 	if($data->role == 'Agency'){ ?>
							<?php 
							$check_ad_member_type =  check_ad_member_type($data->member_id);
							if(!empty($check_ad_member_type->upload_logo)){   ?>
							<?php if($logo<1){
							$logo = 1; ?>
								
							<a href="{{ url('/agencia/'.$data->member_id) }}">
							<div class="image-top-bottom">
							<img src="<?php echo URL::asset('public/uploads/profile_logo/'.$check_ad_member_type->upload_logo);?>" class="img-fluid" alt="">
							</div>
							</a>
							<?php }?>
							<?php }?>
							<?php } ?>
							</a>
							<a href="#">
								<div class="img-text <?php if (isset($category) && $category=='travestis'){ echo 'orange-bg';}?><?php if (isset($category) && $category=='chaperos'){ echo 'blue-bg';}?>">
								<div class="head-title-0">
									<a href="#" data-toggle="tooltip" title="{{province($data->province)}}" class="btn btn-dark">{{substr(province($data->province), 0, 9)}}</a>
									<a href="#" data-toggle="tooltip" title="{{$data->age}} años" class="btn btn-dark">{{$data->age}} años</a>
									<a href="#" data-toggle="tooltip" title="{{tariffs_price($data->id)}} €" class="btn btn-dark">{{tariffs_price($data->id)}} €</a>
									<span  data-toggle="tooltip" title="{{$data->nationality}}"><img src="{{URL::asset('public/front/images/flags-medium/'.nationality($data->nationality).'.png')}}" class="img-fluid"></span>
									</div>
									<p>{{$data->title}}</p>
								</div>
							</a>
						</div>						
						
						<?php } ?>
						<?php $top++;  } ?>
						
						
					<?php }?>
					</span>
				
				<!---------------------------------------------------Subida Zona ads------>			
						<?php if(count($subida)>0){?>
					<?php /*<div  class="col-md-11 masonry offset-md-1">*/?>
					<?php $subida_ids = array(); ?>
					<?php foreach($subida as $data2){?>
						<?php  $subida_ids[] = $data2->id; ?>
						<?php //$data2 = profile($data2->profile_ads_id, $category); ?>
						<?php if(!empty($data2)){?>
						<?php 
							$province = createSlug(province($data2->province));
							$population = createSlug(($data2->population));
							$title = createSlug(($data2->title));
							$category = (($data2->category));
							$id = (($data2->id));							
							$url2= 'profile/'.$category.'/'.$province.'/'.$population.'/'.$title.'/'.$id;
							?>
						<div class="item video-image grid-item">
							<a href="#<?php echo $url2;?>"  >
								<div class="img-top">
									<img   onclick="openpopup({{$data2->id}}, {{$data2->top_subida_profile_listsID}}, 'subida')" src="<?php echo URL::asset('public/uploads/profile_ads/'.$data2->profile_pic);?>" class="img-fluid" alt="">
									<div class="overlay">
										<div class="text">
											<a onclick="favoritos({{$data2->id}},'subida{{$data2->id}}')" href="javascript:void(0)"    class="subida{{$data2->id}} a1 <?php if(favoritos_check($data2->id)>0){ echo 'favrotea1';}?>"><i class="fas fa-heart <?php if(favoritos_check($data2->id)>0){ echo 'favrotea1';}?>"></i></a>
											<a href="" class="a2"><i class="fas fa-check"></i></a>
											<a href="" class="a3"><i class="fas fa-play"></i></a>
												<?php 	if($data2->role == 'Individual'){ ?>
											<a href="" class="a4"><i class="fas fa-info"></i></a>
											<?php } ?>
										</div>
									</div>
									<?php if(self_check($data2->id)>0){?>
									<div class="self-icon">
									<img src="{{URL::asset('public/front/images/self.png')}}" class="img-fluid" alt="">
									</div>
									<?php } ?>
								</div>
								<?php 	if($data2->role == 'Agency'){ ?>
							<?php 
							$check_ad_member_type =  check_ad_member_type($data2->member_id);
							if(!empty($check_ad_member_type->upload_logo)){  ?>
<?php if($logo<1){
							$logo = 1; ?>
							
							<a href="{{ url('/agencia/'.$data2->member_id) }}">
							<div class="image-top-bottom">
							<img src="<?php echo URL::asset('public/uploads/profile_logo/'.$check_ad_member_type->upload_logo);?>" class="img-fluid" alt="">
							</div>
							</a>
							<?php }?>
							<?php }?>
							<?php } ?>
								<div class="img-text white-bg">
									<a href="#" data-toggle="tooltip" title="{{province($data2->province)}}" class="btn btn-dark">{{substr(province($data2->province), 0, 9)}}</a>
									<a href="#" data-toggle="tooltip" title="{{$data2->age}} años" class="btn btn-dark">{{$data2->age}} años</a>
									<a href="#" data-toggle="tooltip" title="{{tariffs_price($data2->id)}} €" class="btn btn-dark">{{tariffs_price($data2->id)}} €</a>
									<span  data-toggle="tooltip" title="{{$data2->nationality}}"><img src="{{URL::asset('public/front/images/flags-medium/'.nationality($data2->nationality).'.png')}}" class="img-fluid"></span>
									<p>{{$data2->title}}</p>
								</div>
							</a>
						</div>
													
						<?php } ?>	
						<?php } ?>	
					<?php /*</div>*/?>
				<?php }?>
				
						
							
						<?php if(count($get_subida_going_address)>0){?>	
						<?php $get_subida_going_address_ids = array(); ?>
					<?php $subida_increment=1;
							foreach($get_subida_going_address as $data3){?>
						<?php if(!empty($data3)){?>
							<?php  $get_subida_going_address_ids[] = $data3->id; ?>
					<?php 
							$province = createSlug(province($data3->province));
							$population = createSlug(($data3->population));
							$title = createSlug(($data3->title));
							$category = (($data3->category));
							$id = (($data3->id));							
							$url2= 'profile/'.$category.'/'.$province.'/'.$population.'/'.$title.'/'.$id;
							?>
						<div class="item video-image grid-item">
							<a href="#<?php echo $url2;?>"  >
								<div class="img-top">
								<?php if(!empty($data3->top_subida_profile_listsID)){ $top_subida_profile_listsID=$data3->top_subida_profile_listsID; }else{ $top_subida_profile_listsID=0;}?>
								<img src="<?php echo URL::asset('public/uploads/profile_ads/'.$data3->profile_pic);?>" class="img-fluid" alt="" onclick="openpopup({{$data3->id}}, {{$top_subida_profile_listsID}}, 'subida')" >
									
									<div class="overlay">
										<div class="text">
										<a onclick="favoritos({{$data3->id}},'subida_going{{$data3->id}}')" href="javascript:void(0)"    class="subida_going{{$data3->id}} a1 <?php if(favoritos_check($data3->id)>0){ echo 'favrotea1';}?>"><i class="fas fa-heart <?php if(favoritos_check($data3->id)>0){ echo 'favrotea1';}?>"></i></a>
											<a href="" class="a2"><i class="fas fa-check"></i></a>
											<a href="" class="a3"><i class="fas fa-play"></i></a>
												<?php 	if($data3->role == 'Individual'){ ?>
											<a href="" class="a4"><i class="fas fa-info"></i></a>
											<?php } ?>
										</div>
									</div>
									<?php if(self_check($data3->id)>0){?>
									<div class="self-icon">
									<img src="{{URL::asset('public/front/images/self.png')}}" class="img-fluid" alt="">
									</div>
									<?php } ?>
								</div>
										<?php 	if($data3->role == 'Agency'){ ?>
							<?php 
							$check_ad_member_type =  check_ad_member_type($data3->member_id);
							if(!empty($check_ad_member_type->upload_logo)){  ?>
<?php if($logo<1){
							$logo = 1; ?>
							
							<a href="{{ url('/agencia/'.$data3->member_id) }}">
							<div class="image-top-bottom">
							<img src="<?php echo URL::asset('public/uploads/profile_logo/'.$check_ad_member_type->upload_logo);?>" class="img-fluid" alt="">
							</div>
							</a>
							<?php }?>
							<?php }?>
							<?php } ?>
								<div class="img-text white-bg">
									<a href="#" data-toggle="tooltip" title="{{province($data3->province)}}" class="btn btn-dark">{{substr(province($data3->province), 0, 9)}}</a>
									<a href="#" data-toggle="tooltip" title="{{$data3->age}} años" class="btn btn-dark">{{$data3->age}} años</a>
									<a href="#" data-toggle="tooltip" title="{{tariffs_price($data3->id)}} €" class="btn btn-dark">{{tariffs_price($data3->id)}} €</a>
									<span  data-toggle="tooltip" title="{{$data3->nationality}}"><img src="{{URL::asset('public/front/images/flags-medium/'.nationality($data3->nationality).'.png')}}" class="img-fluid"></span>
									<p>{{$data3->title}}</p>
								</div>
							</a>
						</div>
													
						<?php } ?>	
						<?php $subida_increment++; } ?>						
				<?php } ?>
			