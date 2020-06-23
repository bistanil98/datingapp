@extends('front.layouts.agencia')
@section('content')
<section class="create-add-sec activos-sec">
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="create-heading">
        <h4>Edita, desactiva o borra tus anuncios en cualquier momento. Contrata las   <strong class="zona-strong">zonas TOP y Auto Subida con un solo clic!</strong></h4>
      </div>
    </div>
  <div class="col-md-12 nested-card-main">

    <div class="row border-card-row free-ads">
	 <div class="col-md-12">
      <div class="image-text-heading">
        <h5>free registration</h5>
      </div>
    </div>
	<?php foreach($profile_ads as $free){?>
	<?php if(check_free_profile_ads($free->id)>0){;?>
	<?php }else{?>
      <div class="col-md-6">
        <div class="left-image-text-main">
          <div class="card-left-img">
            <img src="<?php if(!empty($free->profile_pic)){  echo URL::asset('public/uploads/profile_ads/'.$free->profile_pic); }?>" class="img-fluid" alt="">
          </div>
          <div class="left-image-text">
            <h5>{{$free->first_name}}</h5>
            <h5><i class="fa fa-mobile-phone"></i> {{$free->telephone}}</h5>
            <h5>{{date('d M Y',strtotime($free->created_at))}}</h5>            
            <a href="{{url('agencia/subida-zone')}}" class="btn btn-danger"><i class="fas fa-arrow-circle-up"></i> Auto Subida</a>
            <a href="{{url('agencia/zona-top')}}" class="btn btn-danger"><i class="fas fa-arrow-circle-up"></i> Top Zona</a>
            <div class="icons-right">
            <a href="{{url('agencia/crear-anuncio-update/'.$free->id.'/anuncios-activos')}}" class="icons-rt">edit</a>
            <a href="{{url('agencia/delete/'.$free->id.'/anuncios-activos')}}" onclick="return confirm('Are you sure want to delete this item?')" class="icons-rt">delete</a>
             
				 
				 <?php if($free->status==1){?>
				<a href="{{url('agencia/status/'.$free->id.'/anuncios-activos')}}" onclick="return confirm('Are you sure want to change status this item?')" class="icons-rt active-green"> Activar </a>
				 <?php }else{?>
				<a href="{{url('agencia/status/'.$free->id.'/anuncios-activos')}}" onclick="return confirm('Are you sure want to change status this item?')" class="icons-rt deactive-red"> Disable </a> 
				 <?php } ?>
				
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
      <div class="image-text-heading heading-two hed_01">
        <h5>auto subida</h5>
      </div>
    </div>
	<?php foreach($profile_ads as $subida){?>
	<?php  $check_top_subida_profile_lists = check_top_subida_profile_lists($subida->id);?>	
	<?php if(check_free_profile_ads_type($subida->id,'subida')>0){?>
	   <div class="col-md-6">
        <div class="left-image-text-main green_01">
          <div class="card-left-img">
            <img src="<?php if(!empty($subida->profile_pic)){  echo URL::asset('public/uploads/profile_ads/'.$subida->profile_pic); }?>" class="img-fluid" alt="">
          </div>
          <div class="left-image-text">
            <h5>{{$subida->first_name}}</h5>
            <h5><i class="fa fa-mobile-phone"></i>  {{$subida->telephone}}</h5>
             <h5><span class="blak-block">Primer Día {{date('d/m/Y',strtotime($check_top_subida_profile_lists->from_date))}}</span></h5> 
			 <h5><span class="blak-block">Último {{date('d/m/Y',strtotime($check_top_subida_profile_lists->to_date))}}</span></h5>           
            <?php /*<a href="#" class="btn btn-danger"><i class="fas fa-arrow-circle-up"></i> Auto Subida</a>
            <a href="#" class="btn btn-danger"><i class="fas fa-arrow-circle-up"></i> Top Zona</a>*/?>
            <div class="icons-right">
            <a href="{{url('agencia/crear-anuncio-update/'.$subida->id.'/anuncios-activos')}}" class="icons-rt">edit</a>
            <a href="{{url('agencia/delete/'.$subida->id.'/anuncios-activos')}}" onclick="return confirm('Are you sure want to delete this item?')" class="icons-rt">delete</a>
             
				 
				 <?php if($subida->status==1){?>
				<a href="{{url('agencia/status/'.$subida->id.'/anuncios-activos')}}" onclick="return confirm('Are you sure want to change status this item?')" class="icons-rt active-green"> Activar </a>
				 <?php }else{?>
				<a href="{{url('agencia/status/'.$subida->id.'/anuncios-activos')}}" onclick="return confirm('Are you sure want to change status this item?')" class="icons-rt deactive-red"> Disable </a> 
				 <?php } ?>
				
           </div>
          </div>
        </div>
      </div><!-- col-md-6 -->	
	<?php }?>
     <?php }?>
	<hr>
    </div>
	
   
	<div class="row border-card-row top-ads">
	 <div class="col-md-12">
      <div class="image-text-heading heading-two hed_01">
        <h5>top anuncio</h5>
      </div>
    </div>
	<?php foreach($profile_ads as $top){?>
	<?php  $check_top_subida_profile_lists = check_top_subida_profile_lists($top->id);?>
	<?php if(check_free_profile_ads_type($top->id,'top')>0){;?>	
      <div class="col-md-6">
        <div class="left-image-text-main blue_01">
          <div class="card-left-img">
            <img src="<?php if(!empty($top->profile_pic)){  echo URL::asset('public/uploads/profile_ads/'.$top->profile_pic); }?>" class="img-fluid" alt="">
          </div>
          <div class="left-image-text">
            <h5>{{$top->first_name}}</h5>
            <h5> <i class="fa fa-mobile-phone"></i> {{$top->telephone}}</h5>
           
			 <h5><span class="blak-block">Primer Día {{date('d/m/Y',strtotime($check_top_subida_profile_lists->from_date))}}</span></h5> 
			 <h5><span class="blak-block">Último {{date('d/m/Y',strtotime($check_top_subida_profile_lists->to_date))}}</span></h5>            
              <a href="{{url('agencia/subida-zone')}}" class="btn btn-danger"><i class="fas fa-arrow-circle-up"></i> Auto Subida</a>
            <?php /*<a href="#" class="btn btn-danger"><i class="fas fa-arrow-circle-up"></i> Top Zona</a>*/?>
            <div class="icons-right">
            <a href="{{url('agencia/crear-anuncio-update/'.$top->id.'/anuncios-activos')}}" class="icons-rt">edit</a>
            <a href="{{url('agencia/delete/'.$top->id.'/anuncios-activos')}}" onclick="return confirm('Are you sure want to delete this item?')" class="icons-rt">delete</a>
             
				 
				 <?php if($top->status==1){?>
				<a href="{{url('agencia/status/'.$top->id.'/anuncios-activos')}}" onclick="return confirm('Are you sure want to change status this item?')" class="icons-rt active-green"> Activar </a>
				 <?php }else{?>
				<a href="{{url('agencia/status/'.$top->id.'/anuncios-activos')}}" onclick="return confirm('Are you sure want to change status this item?')" class="icons-rt deactive-red"> Disable </a> 
				 <?php } ?>
				
           </div>
          </div>
        </div>
      </div><!-- col-md-6 -->
	<?php }?>
     <?php }?>
	<hr>
    </div>
    </div><!-- row-1 -->
  </div><!-- col-md-12-nested-main -->

 
  </div>

</section>

@endsection