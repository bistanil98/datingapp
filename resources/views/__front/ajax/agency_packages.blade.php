<div class="row img-row card-row">
			<div class="col-md-1 img-col paso-col">
				<h4>paso 2</h4>
				</div>
			<div class="col-md-11">
				<div class="peso-text">
					<h5>Escoge un plan de subidas.</h5>
				</div>
			</div>
			<div class="col-md-11 offset-sm-1">
				<div class="table-div firt-table">
				<!-- packages listing -->
				<table id="myTable">
				<thead>
					<tr style="background-color: #d7d7d7;">
					<td><h3>Anuncio</h3></td>
					<td><h3>Dias</h3></td>
					<td><h3>Subidas diarias
					</h3></td>
					<td><h3>Precio</h3></td>
					</tr>
				</thead>
				<tbody>
					<?php $i=1; foreach($get_user as $data){?>
					<tr class="" data-pdp-id="nk-<?php echo $data->days;?>">
					<td>		  
					<h4><?php echo $data->advertisements;?> <span class="td-span">anuncios</span></h4>
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
				<!-- packages end -->
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
			<div class="col-md-11 offset-sm-1">
			<!-- packages plans -->
				<form>
					<div class="table-div subida">
						<table>
							<thead>
								<tr class="subida-tr">
									<th></th>
									<th><h5>Primer día</h5></th>
									<th><h5>Último día</h5></th>
									<th><h5>Primera subida</h5></th>
									<th><h5>Último subida</h5></th>
								</tr>
							</thead>
							<tbody>
							<?php for($row=1; $row<=$numberOfChecked; $row++){?>
								<tr>
									<td><img src="{{URL::asset('public/front/images/girl-icon-img.png')}}" class="img-fluid"></td>
									<td><div class="form-group mb-0">
										<input placeholder="dd-mm-yy" autocomplete="off"  type="text" name="bday"  class="form-control plan2startTime">
									</div>
									</td>
									<td><div class="form-group mb-0">
										<input placeholder="dd-mm-yy" autocomplete="off"  name="bday" class="form-control plan2endTime">
									</div>
									</td>
									<td>
										<select name="cars" class="custom-select">
											<option selected>08:00</option>
											<option value="00:00">00:00</option>
											<option value="00:30">00:30</option>
											<option value="01:00">01:00</option>
											<option value="00:00">01:30</option>
											<option value="00:30">02:00</option>
											<option value="01:00">02:30</option>
										</select>
									</td>
									<td>
										<select name="cars" class="custom-select">
											<option selected>02:00</option>
											<option value="00:00">00:00</option>
											<option value="00:30">00:30</option>
											<option value="01:00">01:00</option>
											<option value="00:00">01:30</option>
											<option value="00:30">02:00</option>
											<option value="01:00">02:30</option>
										</select>
									</td>
								</tr>
							<?php }?>
							</tbody>  
							
							
							
						</table>
					</div>
				</form>
			</div> 
			
			
		</div>
		
<input id="selectedPlan" type="hidden" value=""  name="modals">
<script type="text/javascript" src="{{URL::asset('public/front/js/jquery.min.js')}}"></script>
<script type="text/javascript">
$('#myTable tbody tr').click(function() {
	$(this).addClass('bg-success').siblings().removeClass('bg-success');
	$('#selectedPlan').val($(this).attr("data-pdp-id"));
});
</script>
<link rel="stylesheet" href="{{URL::asset('public/front/plugin/jquery-date-picker/jquery-ui.css')}}"> 
<script type="text/javascript" src="{{URL::asset('public/front/plugin/jquery-date-picker/jquery-ui-1-12-1-ui.js')}}"></script>
 <script>
	var j = jQuery.noConflict();
	j(document).ready(function() {
	j('body').on('click',".plan2startTime", function(){
		var plan = j( "#selectedPlan" ).val();	
		if(plan!=''){
		var planDays = plan.replace('nk-','');
        var Plan2minDate;
		var Plan2maxDate;
		var Plan2mDate;		
		j( this ).datepicker({
		dateFormat: 'dd-mm-yy',
		minDate : '0',
		onSelect: function() {		
		Plan2minDate = j( this).datepicker("getDate");
		var Plan2mDate = new Date(Plan2minDate.setDate(Plan2minDate.getDate()));
		Plan2maxDate = new Date(Plan2minDate.setDate(Plan2minDate.getDate() + parseInt(planDays)));
		var strDateTime =  Plan2maxDate.getDate() + "-" + (Plan2maxDate.getMonth()+1) + "-" + Plan2maxDate.getFullYear();		
		j(".plan2endTime").val(strDateTime);		
		},
		close: function (event, ui) { $(this).dialog("destroy"); }

		});	
		}else{
		 alert('Please select escort plans');
		 return false;
		}
});
			
	});
  </script>