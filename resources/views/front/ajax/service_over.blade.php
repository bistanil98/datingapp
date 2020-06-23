		<div class="col-md-6">
									<div class="Sobreti-div common-div">
										<h4>Acerca de ti</h4>
										
										<div class="row">
										<?php foreach($over_you as $data){?>
											<div class="col-md-6 tag-column">
												<div class="form-group">
													<label><input value="{{$data->name}}" type="checkbox" name="over_you[]"><span class="form-control">{{$data->name}}</span></label>
												</div>
											</div>  
										<?php } ?>
											
										</div>
										
									</div> 
								</div><!-- col-md-6 -->
								<!-- Services -->
								<div class="col-md-6">
									<div class="Sobreti-div common-div">
										<h4>Servicios </h4>
										
										<div class="row">
											<?php foreach($services as $data){?>
											<div class="col-md-6 tag-column">
												<div class="form-group">
													<label><input value="{{$data->name}}" type="checkbox" name="services[]"><span class="form-control">{{$data->name}}</span></label>
												</div>
											</div>  
										  <?php } ?>
										</div>
											
											
											
										</div><!-- Sobreti-div common-div-row -->
										
									</div> <!-- Sobreti-div common-div --> 
							