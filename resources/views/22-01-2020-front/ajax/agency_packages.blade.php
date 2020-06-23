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
							<?php for($row=1; $row<=$numberOfChecked; $row++){?>
								<tr>
									<td><img src="{{URL::asset('public/front/images/girl-icon-img.png')}}" class="img-fluid"></td>
									<td><div class="form-group mb-0">
										<input name="from_date[]" required placeholder="yy-mm-dd" autocomplete="off" min="{{date('Y-m-d')}}"  type="date" onchange="myFunction('{{$row}}')"  class="form-control plan2startTime-{{$row}}">
									</div>
									</td>
									<td><div class="form-group mb-0">
										<input name="to_date[]" required style="background:#fff;" readonly placeholder="yy-mm-dd" autocomplete="off" min="{{date('Y-m-d')}}"    class="form-control plan2endTime-{{$row}}">
									</div>
									</td>
									<td>
										<select required  name="from_date_time[]" class="custom-select">											
											<option value="00:00">00:00</option>
											<option value="00:30">00:30</option>
											<option value="01:00">01:00</option>
											<option value="00:00">01:30</option>
											<option value="00:30">02:00</option>
											<option value="01:00">02:30</option>
										</select>
									</td>
									<td>
										<select required  name="to_date_time[]" class="custom-select">											
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
		var someFormattedDate = y + '-' + mm + '-' + dd;
		$(".plan2endTime-"+ids+"").val(someFormattedDate);
	}else{
		alert('Please select escort plans');
		return false;
	}
	});
	}
	</script>