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
							<a href="javascript:void(0);" data-toggle="modal" data-target="#escrot">Crear Anuncio</a>
							<a href="javascript:void(0);" class="alta-button" data-toggle="modal" data-target="#mi-cuenta-modal"><i class="fas fa-users"></i> Mi Cuenta</a>
							
						</div>
					</div>
					
					
				</div>
				
				
				<div class="row gird-first">
					<div class="col-md-1 top-fix-main">
					<div class="top-fix-button">
					<h2 class="<?php if (isset($category) && $category=='travestis'){ echo 'orange-h2';}?><?php if (isset($category) && $category=='chaperos'){ echo 'blue-h2';}?>">TOP Anuncio</h2>
					</div>
					</div>
					<div  class="col-md-11 masonry grid">
					<div class="grid-sizer"></div>
                                            <div class="gutter-sizer"></div>
											<div id="divID">
					<?php if(count($top_zona)>0){?>
					
						<?php foreach($top_zona as $data){ ?>
						
						<?php //$data = profile($data->profile_ads_id,$category); ?>
						<?php if(!empty($data)){ ?>
						
						<div onclick="openpopup({{$data->id}})" class="item video-image grid-item">
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
									</div>
									<?php if(self_check($data->id)>0){?>
									<div class="self-icon">
									<img src="{{URL::asset('public/front/images/self.png')}}" class="img-fluid" alt="">
									</div>
									<?php } ?>
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
						
						
					<?php }?>	
				</div>
				<!---------------------------------------------------Subida Zona ads------>			
						<?php if(count($subida)>0){?>
					<?php /*<div  class="col-md-11 masonry offset-md-1">*/?>
					<?php foreach($subida as $data2){?>
						<?php //$data2 = profile($data2->profile_ads_id, $category); ?>
						<?php if(!empty($data2)){?>
						<div onclick="openpopup({{$data2->id}})" class="item video-image grid-item">
							<a href="javascript:void(0);"  >
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
					<?php /*</div>*/?>
				<?php }?>
				</div>
				</div>
			</div>
			
			
		</section>
 <script src="{{URL::asset('public/front/js/masonry.pkgd-4.2.2.js')}}"></script>
<script type="text/javascript">
	  $(document).ready(function(){                                                                                                                   
                setTimeout(function() { masonry_go();}, 1000);                                                                    
            });     
            $(window).resize(function() 
            {
                // jQuery
                
                
                setTimeout(function() { masonry_go();}, 1000);                                                                    
            });                 
            function masonry_go(){
                $('.grid').masonry({
                 itemSelector: '.grid-item',
  columnWidth: '.grid-sizer',
  gutter: '.gutter-sizer',
  horizontalOrder: true, // new!
  percentPosition: true,
                });                         
            }       
   /* 		
  // external js: masonry.pkgd.js
jQuery(window).on('load', function(){
var $ = jQuery;
var $grid = $('.grid').masonry({
  itemSelector: '.grid-item',
  columnWidth: '.grid-sizer',
  gutter: '.gutter-sizer',
  horizontalOrder: true, // new!
  percentPosition: true,
});

var isHorOrder = true;
var $status = $('.status');

// toggle horizontalOrder on click
$('.hor-order-button').on( 'click', function() {
  isHorOrder = !isHorOrder;
  $grid.masonry({
    horizontalOrder: isHorOrder
  });
  var message = 'horizontalOrder ' +
    ( isHorOrder ? 'enabled' : 'disabled' );
  $status.text( message );
});
}); */

	function resize()
											{
											var heights = window.innerHeight;
											document.getElementById("divID").style.height = heights -20 + "px";
											}
											resize();
											window.onresize = function() {
											resize();
											};
											$(function(){
											
											$(window).scroll(function() {
											//alert(height);
											if ($(this).scrollTop() >= $('#divID').height()) {
											
											$('.top-fix-button h2').css({"font-size": "30px", "color": "#333"});
											$('.top-fix-button h2').text('Auto Subida');
											}else{
											var category = $("#category").val();
											if(category=='escorts'){
											$('.top-fix-button h2').css({"font-size": "30px", "color": "#fd2c94"});
											}else if(category=='travestis'){
											$('.top-fix-button h2').css({"font-size": "30px", "color": "#fd5602"});
											}else if(category=='chaperos'){		
											$('.top-fix-button h2').css({"font-size": "30px", "color": "#00bef3"});
											}
											
											$('.top-fix-button h2').text('TOP Anuncio');
											
											}
											});
											});
										
</script>