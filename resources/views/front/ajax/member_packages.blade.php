<?php //$agency_category = agency_category(session('agency_id'));
	//$categoriesSaved = explode(',',$agency_category); 
?>
<style>
	
	.subida-zone .table-div .td-label {
    position: absolute;
    left: 7%;
    margin-top: -15px;
}
</style>
<div class="row img-row card-row">
			<div class="col-md-2 col-lg-1 col-4 img-col paso-col">
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
								<th class="my-radius-left"><h5></h5></th>
								<th><h5>Dias</h5></th>
								<th><h5>Subidas diarias</h5></th>
								<th class="my-radius-right"><h5>Precio</h5></th>
							</tr>
						</thead>
						<tbody>
						<?php if($get_user!=null){
							$i=1; foreach($get_user as $data){?>
						<?php $days = str_replace(' dias','',$data->durations); ?>
						<tr class="frist-tabrow <?php if($i==1){ echo 'bg-success';}?>">
							<td >
							<div class="td-label" class="lab1">
							<input <?php if($i==1){ echo 'checked="checked';}?>" name="UserSelected" data-id="<?php echo $days;?>"  type="radio" value="<?php echo $data->id;?>">
							</div>
							<h4 style="display:none;" class="td-h4"> <?php echo $data->advertisements;?> <span class="td-span">anuncios</span></h4>
							</td>
							
							<td>
							<h4><?php echo $days;?> <span class="td-span"> dias</span></h4>
							<input type="hidden" name="testing" id="plan{{$i}}" value="{{$days}}" />
							</td>
							<td>
							<h4><?php echo $data->subidas;?> <span class="td-span">subidas</span></h4>
							</td>
							<td class="no-border">
							<h3><?php echo $data->price;?> <span class="td-span">€</span> <span class="td-total">total</span></h3>
							</td>
						</tr>    
						<?php $i++; }?>
						<?php } ?>
						
						</tbody>
					</table>
				</div>
			</div> 
			
			
		</div>
		<div class="row img-row card-row">
			<div class="col-md-2 col-lg-1 col-4 img-col paso-col">
				<h4>paso 3</h4>
			</div>
			<div class="col-md-11">
				<div class="peso-text">
					<h5> Configure la duracion de su plan de subidas</h5>
				</div>
			</div>
			<div class="col-md-11 offset-md-1">
			
					<div class="table-div subida">
						<table>
							<thead>
								<tr class="subida-tr">
									<th class="my-radius-left"><h5>Primer día</h5></th>
									<th><h5>Último día</h5></th>
									<th><h5>Primera subida</h5></th>
									<th class="my-radius-right"><h5>Ultima Subida</h5></th>
								</tr>
							</thead>
							<tbody>
							<?php //for($row=1; $row<=$numberOfChecked; $row++){?>
							<?php $row=1; foreach($numberOfCheckedAds as $numberOfCheckedAds){?>
								<tr>
									<td> <span class="icon-crical"><img src="<?php echo URL::asset('public/uploads/profile_ads/'.profile_first_img($numberOfCheckedAds));?>" class="img-fluid"></span>
									<div class="form-group date-group mb-0">
										<input name="from_date[]" required placeholder="Día-Mes-Año" autocomplete="off"   type="text" onfocus="myFunction('{{$row}}')"  class="form-control plan2startTime-{{$row}}">
									</div>
									</td>
									<td><div class="form-group mb-0">
										<input readonly name="to_date[]" required style="background:#fff;"  placeholder="Día-Mes-Año" type="text" autocomplete="off"    class="form-control plan2endTime-{{$row}}">
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
	jQuery.fn.extend({
    live: function (event, callback) {
       if (this.selector) {
            jQuery(document).on(event, this.selector, callback);
        }
        return this;
    }
});
	function myFunction(number_of_class){	
	$(document).ready(function(){ 
	var ids = number_of_class;	
	var plan = $(".bg-success input[name=testing]:hidden").val();
		//console.log(plan);	 
		   $(".plan2startTime-"+ids+"").removeClass("hasDatepicker");
		//  $(this).not(".hasDatePicker").datepicker();
			//$(this).datepicker("destroy");
			//$(".plan2startTime-"+ids+"").datepicker("destroy");
			//$(this).hasClass("hasDatepicker");
			$(".plan2startTime-"+ids+"").datepicker( "destroy" );
		//	$(".plan2startTime-"+ids+"").removeClass("hasDatepicker").removeAttr('id');
		 	$(".plan2startTime-"+ids+"").datepicker({
			dateFormat: 'dd-mm-yy',
			minDate: 0,
			onSelect: function(selected) {
			$(".plan2endTime-"+ids+"").datepicker("option","minDate", selected); //  mindate on the End datepicker cannot be less than start date already selected.
			var date = $(this).datepicker('getDate');
			var nextDayDate = new Date(date);
			nextDayDate.setDate(date.getDate() + parseInt(plan));			
			var str = $.datepicker.formatDate('dd-mm-yy', nextDayDate);

			if(str!='NaN-NaN-NaN'){
			$(".plan2endTime-"+ids+"").val(str); // Set as default                           
			}

			}
			});

		$(".plan2startTime-"+ids+"").live('click',function(){
		$(".plan2startTime-"+ids+"").focus();
		
		});
	
	});
	}
	</script>
