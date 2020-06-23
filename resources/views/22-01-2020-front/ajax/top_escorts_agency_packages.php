    <div class="row">
		<div class="col-md-3 col-sm-6">
    <label class="card-text-lab">
          
    <div class="card-vale card-blue card-input">
      <h5 class="blue-recom">anuncio top</h5>
      <h5 class="dios"><span class="numberOfChecked"> 1</span></h5>
    </div>
  </label>
  </div>
  
  <div class="col-md-3 col-sm-6">
    <label class="card-text-lab">
         
    
    <div class="card-vale card-blue card-input">
      <h5 class="blue-recom">semanas</h5>
      <h5 class="dios"><span>
		  <select name="package" id="package" class="custom-select">
			<option>Select Package</option>
			<option <?php if($packageValue=='1 semana'){ echo 'selected'; }?> value="1 semana">1 semana</option>
			<option <?php if($packageValue=='2 semanas'){ echo 'selected'; }?> value="2 semanas">2 semanas</option>
			<option <?php if($packageValue=='3 mes'){ echo 'selected'; }?> value="3 mes">3 mes</option>
			<option <?php if($packageValue=='3 meses'){ echo 'selected'; }?> value="3 meses">3 meses</option>
		  </select>
		  </span></h5>
    </div>
  </label>
  </div>

<div class="col-md-3 col-sm-6">
  <label class="card-text-lab">
         
    <div class="card-vale card-blue card-input">
      <h5 class="blue-recom">Precio/Escort</h5>
      <h5 class="dios"><span> <?php echo ($get_user->price/$numberOfChecked);?> euro</span></h5>
    </div>
  </label>
  </div>
  
<div class="col-md-3 col-sm-6">
  <label class="card-text-lab">
         
    <div class="card-vale card-blue card-pink card-input">
      <h5 class="blue-recom">total precio</h5>
      <h5 class="dios"><?php echo $numberOfChecked;?> * <?php echo $get_user->price/$numberOfChecked;?> = <?php echo $get_user->price/$numberOfChecked;?> euro</h5>
    </div>
  </label>
  </div>
  </div>
  