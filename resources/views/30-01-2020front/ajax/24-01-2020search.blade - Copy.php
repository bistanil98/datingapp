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
					<h2 class="<?php if (isset($category) && $category=='travestis'){ echo 'orange-h2';}?><?php if (isset($category) && $category=='chaperos'){ echo 'blue-h2';}?>">TOP Anuncio</h2>
					</div>
					</div>
					<?php if(($top_zona_count)>0){?>
					<div id="divID" class="col-md-11 masonry">
						<?php foreach($top_zona as $data){ ?>
						
						<?php //$data = profile($data->profile_ads_id,$category); ?>
						<?php if(!empty($data)){ ?>
						
						<div onclick="openpopup({{$data->id}})" class="item video-image">
							<a href="javascript:void(0);"  >
								<div class="img-top">
									<img src="<?php echo URL::asset('public/uploads/profile_ads/'.$data->profile_pic);?>" class="img-fluid" alt="">
									<div class="overlay">
										
										<div class="text">
											<a href="#" class="a1"><i class="fas fa-heart"></i></a>
											<a href="" class="a2"><i class="fas fa-check"></i></a>
											<a href="" class="a3"><i class="fas fa-play"></i></a>
										<a href="" class="a4"><i class="fas fa-info"></i></a>
										</div>
										<?php if(self_check($data->id)>0){?>
									<div class="self-icon">
									<img src="{{URL::asset('public/front/images/self.png')}}" class="img-fluid" alt="">
									</div>
									<?php } ?>
									</div>
								</div>
							</a>
							<a href="#">
								<div class="img-text <?php if (isset($category) && $category=='travestis'){ echo 'orange-bg';}?><?php if (isset($category) && $category=='chaperos'){ echo 'blue-bg';}?>">
									<a href="#" class="btn btn-dark">{{province($data->province)}}</a>
									<a href="#" class="btn btn-dark">{{$data->age}} años</a>
									<a href="#" class="btn btn-dark">{{tariffs_price($data->id)}} €</a>
									<span><img src="{{URL::asset('public/front/images/flags-medium/'.nationality($data->nationality).'.png')}}" class="img-fluid"></span>
									<p>{{$data->title}}</p>
								</div>
							</a>
						</div>						
						
						<?php } ?>
						<?php } ?>
						
						</div>
					<?php }?>	
				
				<!---------------------------------------------------Subida Zona ads------>			
						<?php if(($subida_count)>0){?>
					<div  class="col-md-11 masonry offset-md-1">
					<?php foreach($subida as $data2){?>
						<?php //$data2 = profile($data2->profile_ads_id, $category); ?>
						<?php if(!empty($data2)){?>
						<div onclick="openpopup({{$data2->id}})" class="item video-image">
							<a href="javascript:void(0);">
								<div class="img-top">
									<img src="<?php echo URL::asset('public/uploads/profile_ads/'.$data2->profile_pic);?>" class="img-fluid" alt="">
									<div class="overlay">
										<div class="text"><a href="#" class="a1"><i class="fas fa-heart"></i></a>
											<a href="" class="a2"><i class="fas fa-check"></i></a>
											<a href="" class="a3"><i class="fas fa-play"></i></a>
											<a href="" class="a4"><i class="fas fa-info"></i></a>
										</div>
									</div>
									<?php if(self_check($data2->id)>0){?>
									<div class="self-icon">
									<img src="{{URL::asset('public/front/images/self.png')}}" class="img-fluid" alt="">
									</div>
									<?php } ?>
								</div>
								<div class="img-text white-bg">
									<a href="#" class="btn btn-dark">{{province($data2->province)}}</a>
									<a href="#" class="btn btn-dark">{{$data2->age}} años</a>
									<a href="#" class="btn btn-dark">{{tariffs_price($data2->id)}} €</a>
									<span><img src="{{URL::asset('public/front/images/flags-medium/'.nationality($data2->nationality).'.png')}}" class="img-fluid"></span>
									<p>{{$data2->title}}</p>
								</div>
							</a>
						</div>
						
							
						<?php } ?>	
						<?php } ?>	
					</div>
				<?php }?>
				</div>
			</div>
			
			
		</section>