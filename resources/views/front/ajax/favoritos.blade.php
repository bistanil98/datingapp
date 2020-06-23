
<div class="modal-content">
	
		<?php $favoritos_list = (favoritos_list());?>
	
	<!-- Modal Header -->
	
	<div class="modal-header">
		
		<h4 class="modal-title">Favoritos</h4>
		<?php if($favoritos_list->isNotEmpty()){?>
		<div class="delet-imgdiv">
			
			<span class="main-iconimg">
				
				<span class="love-icon"><i class="fas fa-heart"></i><span class="counterone"><?php echo ($favoritos);?></span></span>
				
				<span class="dele-icona">
					
					<a href="javascript:void(0);" onclick="remove_favoritos();"><i class="fas  fa-trash-alt"></i></a>
					
					
				</span>
				
				
				
				
				
				
				
			</span>
			
			
			
			
			
		</div>
		<?php } ?>
		<button type="button" class="close" data-dismiss="modal">×</button>
		
	</div>
	
	
	
	<!-- Modal body -->
	
	<div class="modal-body">
		<div class="counter-images">
			<ul class="countul">
			
				<?php if($favoritos_list->isNotEmpty()){?>
				<?php $favoritos_ids = array(); ?>
					<?php foreach($favoritos_list as $favoritos){?>
						<?php  $favoritos_ids[] = $favoritos->id; ?>
						 <?php 
												$province = createSlug(province($favoritos->province));
												$population = createSlug(($favoritos->population));
												$first_name = createSlug(($favoritos->first_name));
												$id = (($favoritos->id));
												$url = url('escorts/'.$province.'/'.$population.'/'.$first_name.'/'.$id);
												?>
						<li>
							<div class="cunt-img">
								<a  href="javascript:void(0);<?php //echo $url;?>" onclick="openpopupfavoritos({{$favoritos->id}})">
									<img src="<?php echo URL::asset('public/uploads/profile_ads/'.$favoritos->profile_pic);?>" alt="" class="img-fluid">
									<div class="dummy-overly">
            <div class="text"><a href="javascript:void(0);" onclick="remove_favoritos_single({{$favoritos->id}})"> <i class="far fa-times fas  fa-times"></i></a></div>
            </div>
								</a>
							</div>    
						</li>
					<?php }?>
				<?php }else{?>
				<p>No tienes anuncios favoritos.</p>
				<?php }?>
			</ul>
		</div>
	</div><!-- body -->
	
	
	
</div>