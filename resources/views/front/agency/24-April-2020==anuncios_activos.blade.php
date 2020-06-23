@extends('front.layouts.agencia')
@section('content')
<section class="create-add-sec activos-sec">
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="create-heading">
        <h4>Edita, desactiva o borra tus anuncios en cualquier momento. Contrata las   <strong class="zona-strong">zonas TOP</strong> y <strong class="zona-strong">Auto Subida</strong> con un solo clic!</h4>
      </div>
    </div>
  <div class="col-md-12 nested-card-main">

    <div class="row border-card-row free-ads">
	 <div class="col-md-12">
      <div class="image-text-heading text-center">
        <h5 style="text-transform: inherit !important;">Anuncios Activos en Zona Gratuita</h5>
      </div>
    </div>
	<?php foreach($profile_ads as $free){?>
	<?php if(check_free_profile_ads($free->id)>0){;?>
	<?php }else{?>
      <div class="col-md-8 col-lg-6">
        <div class="left-image-text-main">
          <div class="card-left-img">
            <img src="<?php if(!empty($free->profile_pic)){  echo URL::asset('public/uploads/profile_ads/'.$free->profile_pic); }?>" class="img-fluid" alt="">
          </div>
          <div class="left-image-text">
            <h5>{{$free->first_name}}</h5>
            <h5><i class="fa fa-mobile-phone"></i> {{$free->telephone}}</h5>            
            <h5 style="text-transform:none;">Fecha de Creación {{date('d M Y',strtotime($free->created_at))}}</h5>            
            
            <div class="icons-right">
			<?php /*
			 <?php if($free->user_status==1){?>
				<a href="{{url('agencia/status/'.$free->id.'/anuncios-activos')}}" onclick="return confirm('Are you sure want to change status this item?')" class="icons-rt deactive-red"> Desactivar </a>
				 <?php }else{?>
				<a href="{{url('agencia/status/'.$free->id.'/anuncios-activos')}}" onclick="return confirm('Are you sure want to change status this item?')" class="icons-rt active-green"> Reactivar </a> 
				 <?php } ?>
				 */?>
				 <a href="{{url('agencia/crear-anuncio-update/'.$free->id.'/anuncios-activos')}}" class="icons-rt">Editar</a>
            <a href="{{url('agencia/delete/'.$free->id.'/anuncios-activos')}}" onclick="return confirm('Are you sure want to delete this item?')" class="icons-rt">Borrar</a>
             
				 
				
				<a href="{{url('agencia/subida-zone/'.$free->category.'/'.$free->id.'/'.$free->province.'')}}" class="btn btn-danger"><i class="fas fa-arrow-circle-up"></i> Auto Subida</a>
            <a href="{{url('agencia/zona-top/'.$free->category.'/'.$free->id.'/'.$free->province.'')}}" class="btn btn-danger"><i class="fas fa-arrow-circle-up"></i> Zona Top</a>
           </div>
          </div>
        </div>
      </div><!-- col-md-6 -->
	<?php }?>
     <?php }?>
	<hr>
    </div>
	

 <div class="row border-card-row subida-ads">
   <div class="col-md-12 auto-subida-column">
      <div class="image-text-heading heading-two hed_01  text-center">
        <h5 style="text-transform: inherit !important;">Anuncios Activos en Auto Subida</h5>
      </div>
    </div>
	<?php foreach($profile_ads as $subida){?>
	<?php  $check_top_subida_profile_lists = check_top_subida_profile_lists_sub($subida->id);?>	
	<?php if(check_free_profile_ads_type($subida->id,'subida')>0){?>
	<?php $top_subida_profile_lists_id = return_free_profile_ads_type($subida->id,'subida'); ?>
	<?php if($check_top_subida_profile_lists->to_date >= date('Y-m-d') || $check_top_subida_profile_lists->ad_active_inactive_status>0 && $check_top_subida_profile_lists->seen_days>0){ ?>
	   <div class="col-md-8 col-lg-6">
        <div class="left-image-text-main green_01">
          <div class="card-left-img">
            <img src="<?php if(!empty($subida->profile_pic)){  echo URL::asset('public/uploads/profile_ads/'.$subida->profile_pic); }?>" class="img-fluid" alt="">
          </div>
          <div class="left-image-text">
            <h5>{{$subida->first_name}}</h5>            
            
			<h5 style="text-transform:none;"><span class="blak-block">Fecha de Inicio :  {{date('d-m-Y',strtotime($check_top_subida_profile_lists->from_date))}}</span></h5>             
            <h5 style="text-transform:none;">Horario de Subidas : <span class="labl-txt">{{date('H:i',strtotime($check_top_subida_profile_lists->from_date_time))}} - {{date('H:i',strtotime($check_top_subida_profile_lists->to_date_time))}}</span></h5>
            <h5>Subidas Diarias :  <span class="labl-txt">{{$check_top_subida_profile_lists->seen_days}} dias</span></h5>                        
			  <?php if($check_top_subida_profile_lists->from_date>date('Y-m-d')){ ?>
			 <h5><span style="color:red!important;" class="blak-block">Awaiting to Display</span></h5>            
			 <?php }else{
					$from_date = \Carbon\Carbon::createFromFormat('Y-m-d', $check_top_subida_profile_lists->from_date);
					$to_date = \Carbon\Carbon::createFromFormat('Y-m-d', $check_top_subida_profile_lists->to_date);
					$start_expiry_days = $from_date->diffInDays($to_date);
					$start_date = \Carbon\Carbon::createFromFormat('Y-m-d', $check_top_subida_profile_lists->from_date);
					$current_date = \Carbon\Carbon::createFromFormat('Y-m-d', date('Y-m-d'));
					$mindays = $from_date->diffInDays($current_date);
					$totalleftdays = $start_expiry_days-$mindays;
					if($totalleftdays>0){
				?>
				
				 <h5>Dias Restantes :  <span style="color:#28a745" class="blak-block"><?php echo $totalleftdays;?> dias</span></h5>    
			 <?php } }?>
            <div class="icons-right">
				<?php if($check_top_subida_profile_lists->from_date>date('Y-m-d')){ ?>
					 <?php if($subida->user_status_subida==1){?>
					<a href="javascript:void(0)"  class="icons-rt deactive-red disabled-btn"> Pausar </a>
					<?php }else{?>
					<a href="javascript:void(0)"  class="icons-rt active-green disabled-btn"> Reactivar </a> 
					<?php }?>
			 <?php }else{ ?>
					 <?php if($subida->user_status_subida==1){?>
						<a href="{{url('agencia/status/'.$subida->id.'/anuncios-activos/'.$top_subida_profile_lists_id.'/subida')}}" onclick="return confirm('Are you sure want to change status this item?')" class="icons-rt deactive-red"> Pausar </a>
						 <?php }else{?>
						<a href="{{url('agencia/status/'.$subida->id.'/anuncios-activos/'.$top_subida_profile_lists_id.'/subida')}}" onclick="return confirm('Are you sure want to change status this item?')" class="icons-rt active-green"> Reactivar </a> 
						 <?php } ?>
				 
				 <?php } ?>
            <a href="{{url('agencia/crear-anuncio-update/'.$subida->id.'/anuncios-activos')}}" class="icons-rt">Editar</a>
            <a href="{{url('agencia/delete/'.$subida->id.'/anuncios-activos')}}" onclick="return confirm('Are you sure want to delete this item?')" class="icons-rt">Borrar</a>
             
				 
				
			<?php $check_top_subida_profile_lists_on_top = check_top_subida_profile_lists_top($subida->id);
							if(empty($check_top_subida_profile_lists_on_top)){?>
           <a href="{{url('agencia/zona-top/'.$subida->category.'/'.$subida->id.'/'.$subida->province.'')}}" class="btn btn-danger"><i class="fas fa-arrow-circle-up"></i> Zona Top</a>
							<?php }?>
           </div>
          </div>
        </div>
      </div><!-- col-md-6 -->	
	<?php }?>
     <?php }?>
     <?php }?>
	<hr>
    </div>
	
   
	<div class="row border-card-row top-ads" style="display: flex !important;">
	 <div class="col-md-12">
      <div class="image-text-heading heading-two hed_01  text-center">
        <h5 style="text-transform: inherit !important;">Anuncios Activos en Zona Top</h5>
      </div>
    </div>
	<?php foreach($profile_ads as $top){?>
	
	<?php  $check_top_subida_profile_lists = check_top_subida_profile_lists_top($top->id);?>
	
	<?php if(check_free_profile_ads_type($top->id,'top')>0){;?>	
	<?php $top_subida_profile_lists_id = return_free_profile_ads_type($top->id,'top'); ?>
	<?php if($check_top_subida_profile_lists->to_date>= date('Y-m-d') || $check_top_subida_profile_lists->ad_active_inactive_status>0 && $check_top_subida_profile_lists->seen_days>0){ ?>
     <div class="col-md-8 col-lg-6">
        <div class="left-image-text-main blue_01">
          <div class="card-left-img">
            <img src="<?php if(!empty($top->profile_pic)){  echo URL::asset('public/uploads/profile_ads/'.$top->profile_pic); }?>" class="img-fluid" alt="">
          </div>
          <div class="left-image-text">
            <h5>{{$top->first_name}}</h5>
             <h5 style="text-transform:none;"><span class="blak-block">Fecha de Inicio :  {{date('d-m-Y',strtotime($check_top_subida_profile_lists->from_date))}}</span></h5>             
            <h5>Dias Contractos : <span class="labl-txt">{{$check_top_subida_profile_lists->seen_days}} dias</span></h5>            
			 
			  <?php if($check_top_subida_profile_lists->from_date>date('Y-m-d')){ ?>
			 <h5><span style="color:red!important;" class="blak-block">Awaiting to Display</span></h5>            
			 <?php }else{
					$from_date = \Carbon\Carbon::createFromFormat('Y-m-d', $check_top_subida_profile_lists->from_date);
					$to_date = \Carbon\Carbon::createFromFormat('Y-m-d', $check_top_subida_profile_lists->to_date);
					$start_expiry_days = $from_date->diffInDays($to_date);
					$start_date = \Carbon\Carbon::createFromFormat('Y-m-d', $check_top_subida_profile_lists->from_date);
					$current_date = \Carbon\Carbon::createFromFormat('Y-m-d', date('Y-m-d'));
					$mindays = $from_date->diffInDays($current_date);
					$totalleftdays = $start_expiry_days-$mindays;
					if($totalleftdays>0){
				?>
				
				 <h5>Dias Restantes : <span style="color:#28a745" class="blak-block"><?php echo $totalleftdays;?> dias</span></h5>    
			 <?php } }?>
				
            <div class="icons-right">			
				<?php if($check_top_subida_profile_lists->from_date>date('Y-m-d')){ ?>
				<?php if($top->user_status==1){?>
					<a href="javascript:void(0)"  class="icons-rt deactive-red disabled-btn"> Pausar </a>
					<?php }else{?>
					<a href="javascript:void(0)"  class="icons-rt active-green disabled-btn"> Reactivar </a> 
					<?php }?>
			 <?php }else{ ?>
				<?php if($top->user_status==1){?>
				<a href="{{url('agencia/status/'.$top->id.'/anuncios-activos/'.$top_subida_profile_lists_id.'/top')}}" onclick="return confirm('Are you sure want to change status this item?')" class="icons-rt deactive-red"> Pausar </a>
				<?php }else{?>
				<a href="{{url('agencia/status/'.$top->id.'/anuncios-activos/'.$top_subida_profile_lists_id.'/top')}}" onclick="return confirm('Are you sure want to change status this item?')" class="icons-rt active-green"> Reactivar </a> 
				<?php } ?>
				
				 <?php }?>
				<a href="{{url('agencia/crear-anuncio-update/'.$top->id.'/anuncios-activos')}}" class="icons-rt">Editar</a>
				<a href="{{url('agencia/delete/'.$top->id.'/anuncios-activos')}}" onclick="return confirm('Are you sure want to delete this item?')" class="icons-rt">Borrar</a>
				<?php $check_top_subida_profile_lists_sub = check_top_subida_profile_lists_sub($top->id);
				if(empty($check_top_subida_profile_lists_sub)){?>
				<a href="{{url('agencia/subida-zone/'.$top->category.'/'.$top->id.'/'.$top->province.'')}}" class="btn btn-danger"><i class="fas fa-arrow-circle-up"></i> Auto Subida</a>
				<?php }?>
           </div>
          </div>
        </div>
      </div><!-- col-md-6 -->
	<?php }?>	
     <?php }?>
     <?php }?>
	<hr>
    </div>
    </div><!-- row-1 -->
  </div><!-- col-md-12-nested-main -->

 
  </div>

</section>
<style>
.activos-sec .left-image-text .icons-right .icons-rt.deactive-red {
    background: red;
    border: red;
}
.disabled-btn{opacity: .50;}
</style>
@endsection