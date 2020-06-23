@extends('front.layouts.agencia')
@section('content')
<style>
	.create-add-sec .nested-card-main {    
    padding: 20px 0px!important;
}
</style>
<?php $item = 19;?>
<section class="create-add-sec">

	

	<div class="container">
		<div class="row">
			 <div class="col-md-12">
      <div class="create-heading">
        <h4>Clica en el cuadro para crear su anuncio</h4>
      </div>
    </div>
		</div>
		
  <div class="row my-8 nested-card-main">

    <div class="col">
      <div class="jumbotron-2">
        <div class="container-fluid">
          <div class="row row-cols-5">
		  <?php for($i=0;$i<=$item;$i++){?>
           <div class="col my-respo-col">
		   <?php $edit_profile = edit_profile($agency_id,$i); ?>
		   
		   <?php if(!empty($edit_profile)){   ?>
		     <div class="create-add-imgae fill-img-top">
						<div class="image-crete-top">
							<img src="<?php if(!empty($edit_profile->profile_pic)){  echo URL::asset('public/uploads/profile_ads/'.$edit_profile->profile_pic); }?>" class="img-fluid" alt="">
							<div class="orignal-overly">
								<div class="text">
									<a href="{{url('agencia/crear-anuncio-update/'.$edit_profile->id.'/create-add')}}"><i class="fas fa-edit"></i></a>
									<a href="{{url('agencia/delete/'.$edit_profile->id.'/create-add')}}" onclick="return confirm('Are you sure want to delete this item?')" ><i class="fas fa-trash"></i></a>									
								</div>
							</div>
						</div>
						<div class="text-block-image22">
							<h6>{{$edit_profile->first_name}}</h6>
						</div>
					</div>
		   <?php }else{ ?>
			   <div class="create-add-imgae">
							<div class="dummy-iamge-top">
								<img src="{{URL::asset('public/front/images/dummy-girl.png')}}" class="img-fluid" alt="">
								<div class="dummy-overly">
									<div class="text"><a href="{{url('/agencia/crear-anuncio')}}"> <i class="fas fa-plus-square"></i></a></div>
								</div>
							</div>
				</div>
			<?php } ?>
						
						
					
					</div>
		  <?php }?>
		  </div>
        </div>
       </div>
    </div>
  </div>
</div>
</section>

<?php /*
	<div class="col my-respo-col">
	<div class="create-add-imgae fill-img-top">
	<div class="image-crete-top">
	<img src="{{URL::asset('public/front/images/model0001.jpg')}}" class="img-fluid" alt="">
	<div class="orignal-overly">
    <div class="text"><a href="#"><i class="fas fa-trash"></i></a> <a href=""><i class="fas fa-edit"></i></a></div>
	</div>
	</div>
	<div class="text-block-image22">
	<h6>mariya</h6>
	</div>
	</div>
    </div>
    
*/?>
@endsection