<div class="row img-row card-row">
			<div class="col-md-1 img-col paso-col">
				<h4>paso 2</h4>
			</div>
			<div class="col-md-11">
				<div class="peso-text">
					<h5>Escoge un plan de subidas.</h5>
				</div>
			</div>
			<div class="col-md-11 offset-md-1">
				<div class="table-div firt-table">
					<table id="myTable">
						<thead>
							<tr>
								<th class="my-radius-left"><h5>Anuncio</h5></th>
								<th><h5>Dias</h5></th>
								<th><h5>Subidas diarias</h5></th>
								<th class="my-radius-right"><h5>Precio</h5></th>
							</tr>
						</thead>
						<tbody>
						<?php $i=1; foreach($get_user as $data){?>
						<tr class="" >
							<td >
							<div class="td-label" class="lab1">
							<input name="UserSelected" data-id="<?php echo $data->days;?>"  type="radio" value="<?php echo $data->id;?>">
							</div>
							<h4 class="td-h4"> <?php echo $data->advertisements;?> <span class="td-span">anuncios</span></h4>
							</td>
							
							<td>
							<h4><?php echo $data->days;?> <span class="td-span"> dias</span></h4>
							<input type="hidden" id="plan{{$i}}" value="{{$data->days}}" />
							</td>
							<td>
							<h4><?php echo $data->uploads;?> <span class="td-span">subidas</span></h4>
							</td>
							<td class="no-border">
							<h3><?php echo $data->price;?>.00 <span class="td-span">€</span> <span class="td-total">total</span></h3>
							</td>
						</tr>    
						<?php $i++; }?>
						
						</tbody>
					</table>
				</div>
			</div> 
			
			
		</div>
		<div class="row img-row card-row">
			<div class="col-md-1 img-col paso-col">
				<h4>paso 3</h4>
			</div>
			<div class="col-md-11">
				<div class="peso-text">
					<h5> Configura cuándo subir.</h5>
				</div>
			</div>
			<div class="col-md-11 offset-md-1">
			
					<div class="table-div subida">
						<table>
							<thead>
								<tr class="subida-tr">
									<th class="my-radius-left"></th>
									<th><h5>Primer día</h5></th>
									<th><h5>Último día</h5></th>
									<th><h5>Primera subida</h5></th>
									<th class="my-radius-right"><h5>Último subida</h5></th>
								</tr>
							</thead>
							<tbody>
							<?php //for($row=1; $row<=$numberOfChecked; $row++){?>
							<?php $row=1; foreach($numberOfCheckedAds as $numberOfCheckedAds){?>
								<tr>
									<td><img src="<?php echo URL::asset('public/uploads/profile_ads/'.profile_first_img($numberOfCheckedAds));?>" class="img-fluid"></td>
									<td><div class="form-group mb-0">
										<input name="from_date[]" required placeholder="dd-mm-yy" autocomplete="off" min="{{date('d-m-y')}}"  type="date" onchange="myFunction('{{$row}}')"  class="form-control plan2startTime-{{$row}}">
									</div>
									</td>
									<td><div class="form-group mb-0">
										<input name="to_date[]" required style="background:#fff;" readonly placeholder="dd-mm-yy" autocomplete="off" min="{{date('Y-m-d')}}"    class="form-control plan2endTime-{{$row}}">
									</div>
									</td>
									<td>
										<select required  name="from_date_time[]" class="custom-select">
									
										<?php // Set begin date
										$begin = new DateTime("00:00");
										$end   = new DateTime("23:30");

										$interval = DateInterval::createFromDateString('30 min');

										$times    = new DatePeriod($begin, $interval, $end);

										// Loop through range										
										foreach ($times as $time) {
										// Output date and time
										// echo $date->format("Y-m-dTH:i:s") . "<br>";
										echo "<option value=".$time->format("H:i").">".$time->format("H:i")."</option>";
										}

										?>

											
										</select>
									</td>
									<td>
										<select required  name="to_date_time[]" class="custom-select">											
											<?php 
											foreach ($times as $time) {
										// Output date and time
										// echo $date->format("Y-m-dTH:i:s") . "<br>";
										echo "<option value=".$time->format("H:i").">".$time->format("H:i")."</option>";
										}
										?>
										</select>
									</td>
								</tr>
								
							<?php $row++; }?>
							</tbody>  
							
							
							
						</table>
					</div>
			
			</div> 
			
			
		</div>
		
<script type="text/javascript" src="{{URL::asset('public/front/js/jquery.min.js')}}"></script>	
<script type="text/javascript">
	
   $('#myTable tbody tr').click(function() {
     $('#myTable').find('td input:radio').removeAttr("checked");
    $(this).addClass('bg-success').siblings().removeClass('bg-success');
     $(this).find('td input:radio').prop('checked', true);	 
     $(this).find('td input:radio').attr('checked', 'checked');	 
	 $('.plan2startTime').val('');
	 $('.plan2endTime').val('');
 });

</script>

	<script>
	function myFunction(number_of_class){	
	var ids = number_of_class;		
	$('body').on('change',".plan2startTime-"+ids+"", function(){									
	var plan = $('.subida-zone input:radio:checked').attr("data-id");	
	if(plan!='' && plan!=undefined){		
		var from_date = $(this).val();
		var date = new Date(from_date);
		date.setDate(date.getDate() + (+plan));
		var dd = date.getDate();
		var mm = date.getMonth() + 1;
		var y = date.getFullYear();
		if(dd<=9){
			dd = '0'+dd;
		}
		if(mm<=9){
			mm = '0'+mm;
		}
		var someFormattedDate = dd + '-' + mm + '-' + y;
		$(".plan2endTime-"+ids+"").val(someFormattedDate);
	}else{
		alert('Please select escort plans');
		return false;
	}
	});
	}
	</script>