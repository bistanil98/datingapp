@extends('admin.layouts.frontlayout')
@section('content')


				<!-- CONTAINER -->
				<div class="container content-area relative">

					<!-- PAGE-HEADER -->
					<div class="page-header">
						<h4 class="page-title"><!-- Dashboard 01 --></h4>
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="#">Home</a></li>
							<li class="breadcrumb-item active" aria-current="page">Dashboard</li>
						</ol>
					</div>
					<!-- PAGE-HEADER END -->

					<!-- ROW-1 -->
					<div class="row boxes-card-row">
						<div class="col-sm-6 col-lg-6 col-xl-3 card-purpple">
							<div class="card active-cards">
								<div class="card-body iconfont text-left">
									<h6 class="mb-3 flex-head agency-head"><span>Active Agencies</span> <a href="{{url('/admin/agencies/add')}}" class="btn btn-danger">Add Agency</a></h6>
									<h2 class="mb-1 text-dark display-4 font-weight-bold"><a href="{{url('admin/agencies?category=&province=&name=&email=&mobile=&status=1')}}">{{$ActiveAgencies}}</a>
										<!-- K --><span class="text-success fs-13 ml-2">(+{{$ActiveAgenciesAddedd}}%)</span></h2>
									<p class="mb-3">Overview of Last month</p>
									<div class="progress h-1 mb-2">
										<div class="progress-bar bg-primary" style="width: {{$ActiveAgenciesLastAddedd}}% !important" role="progressbar"></div>
									</div>
									<small class="mb-0  text-muted">Monthly<span class="float-right text-muted">{{$ActiveAgenciesLastAddedd}}%</span></small>
								</div>
							</div>
						</div>
						
						
						<div class="col-sm-6 col-lg-6 col-xl-3 card-pink">
							<div class="card active-cards">
								<div class="card-body iconfont text-left">
									<h6 class="mb-3 flex-head"><span>Active Escorts</span> <a href="{{ url('/admin/profile/add/escorts') }}" class="btn btn-danger">Add Escorts</a></h6>
									<h2 class="mb-1 text-dark display-4 font-weight-bold"><a href="{{url('/admin/profile/index/escorts')}}">{{$ActiveEscorts}}</a><span class="text-success fs-13 ml-2">(+{{$ActiveEscortsAddedd}}%)</span></h2>
									<p class="mb-3">Overview of Last month</p>
									<div class="progress h-1 mb-2">
										<div class="progress-bar bg-secondary" style="width: {{$ActiveEscortsLastAddedd}}% !important" role="progressbar"></div>
									</div>
									<small class="mb-0  text-muted">Monthly<span class="float-right text-muted">{{$ActiveEscortsLastAddedd}}%</span></small>
								</div>
							</div>
						</div>
						<div class="col-sm-6 col-lg-6 col-xl-3 card-blue">
							<div class="card active-cards">
								<div class="card-body iconfont text-left">
									<h6 class="mb-3 flex-head chepross"><span>Active Chaperos</span> <a href="{{ url('/admin/profile/add/chaperos') }}" class="btn btn-danger">Add Chaperos</a></h6>
									<h2 class="mb-1 text-dark display-4 font-weight-bold"><a href="{{url('/admin/profile/index/chaperos')}}">{{$ActiveChaperos}}</a> <span class="text-success fs-13 ml-2">(+{{$ActiveChaperosAddedd}}%)</span></h2>
									<p class="mb-3">Overview of Last month</p>
									<div class="progress h-1 mb-2">
										<div class="progress-bar bg-danger" style="width: {{$ActiveChaperosLastAddedd}}% !important" role="progressbar"></div>
									</div>
									<small class="mb-0  text-muted">Monthly<span class="float-right text-muted">{{$ActiveChaperosLastAddedd}}%</span></small>
								</div>
							</div>
						</div>
						<div class="col-sm-6 col-lg-6 col-xl-3 card-yellow">
							<div class="card active-cards">
								<div class="card-body iconfont text-left">
									<h6 class="mb-3 flex-head Travestis-head"><span>Active Travestis</span> <a href="{{ url('/admin/profile/add/travestis') }}" class="btn btn-danger">Add Travestis</a></h6>
									<h2 class="mb-1 text-dark display-4 font-weight-bold"><!-- $ --><a href="{{url('/admin/profile/index/travestis')}}">{{$ActiveTravestis}}</a> <span class="text-success fs-13 ml-2">(+{{$ActiveTravestisAddedd}}%)</span></h2>
									<p class="mb-3">Overview of Last month</p>
									<div class="progress h-1 mb-2">
										<div class="progress-bar bg-warning" style="width: {{$ActiveTravestisLastAddedd}}% !important" role="progressbar"></div>
									</div>
									<small class="mb-0  text-muted">Monthly<span class="float-right text-muted">{{$ActiveTravestisLastAddedd}}%</span></small>
								</div>
							</div>
						</div>
					
						<div class="col-sm-6 col-lg-6 col-xl-3 card-purpple">
						<div class="card active-cards">
								<div class="card-body iconfont text-left">
									<h6 class="mb-3 flex-head"><span>Top anuncio agency</span> </h6>
									<h2 class="mb-1 text-dark display-4 font-weight-bold"><a href="{{url('admin/top_anuncios_agency/index')}}">{{$AgencyTopAd}}</a><span class="text-success fs-13 ml-2">(+{{$AgencyTopAdAddedd}}%)</span></h2>
									<p class="mb-3">Overview of Last month</p>
									<div class="progress h-1 mb-2">
										<div class="progress-bar bg-secondary" style="width: {{$AgencyTopAdLastAddedd}}% !important" role="progressbar"></div>
									</div>
									<small class="mb-0  text-muted">Monthly<span class="float-right text-muted">{{$AgencyTopAdLastAddedd}}%</span></small>
								</div>
							</div>							
						</div>
						
						<?php  /*
						<div class="col-sm-6 col-lg-6 col-xl-3 card-pink">
							<div class="card">
								<div class="card-body iconfont text-left">
									<h6 class="mb-3 flex-head"><span>Pending Escorts</span></h6>
									<h2 class="mb-1 text-dark display-4 font-weight-bold"><a href="#">{{$PendingEscorts}}</a></h2>
									
								</div>
							</div>
						</div>
						<div class="col-sm-6 col-lg-6 col-xl-3 card-blue">
							<div class="card">
								<div class="card-body iconfont text-left">
									<h6 class="mb-3 flex-head chepross"><span>Pending Chaperos</span> </h6>
									<h2 class="mb-1 text-dark display-4 font-weight-bold"><a href="#">{{$PendingChaperos}}</a></h2>
									
								</div>
							</div>
						</div>
						<div class="col-sm-6 col-lg-6 col-xl-3 card-yellow">
							<div class="card">
								<div class="card-body iconfont text-left">
									<h6 class="mb-3 flex-head Travestis-head"><span>Pending Travestis</span> </h6>
									<h2 class="mb-1 text-dark display-4 font-weight-bold"><a href="#">{{$PendingTravestis}}</a></h2>
								</div>
							</div>
						</div>
								*/?>			
						
						
							<div class="col-sm-6 col-lg-6 col-xl-3 card-pink">
									<div class="card">
										<div class="card-body">
											<div class="d-flex">
												<div class="">
													<p class="mb-1 font-weight-semibold">
														Top Escorts 
													</p>
													<h2 class="mt-2 mb-2 display-6 font-weight-bold"><a href="{{url('admin/top_anuncios/index?category=escorts&province=&name=&mobile=')}}">{{$TopAnunciosEscorts}}</a></h2>
													
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-6 col-lg-6 col-xl-3 card-blue">
									<div class="card">
										<div class="card-body">
											<div class="d-flex">
												<div class="">
													<p class="mb-1 font-weight-semibold">
														Top Chaperos
													</p>
													<h2 class="mt-2 mb-2 display-6 font-weight-bold"><a href="{{url('admin/top_anuncios/index?category=chaperos&province=&name=&mobile=')}}">{{$TopAnunciosChaperos}}</a></h2>
													
												</div>
											</div>
										</div>
									</div>
								</div>
							
								<div class="col-sm-6 col-lg-6 col-xl-3 card-yellow">
									<div class="card">
										<div class="card-body">
											<div class="d-flex">
												<div class="">
													<p class="mb-1 font-weight-semibold">
														Top Travestis
													</p>
													<h2 class="mt-2 mb-2 display-6 font-weight-bold"><a href="{{url('admin/top_anuncios/index?category=travestis&province=&name=&mobile=')}}">{{$TopAnunciosTravestis}}</a></h2>
													
												</div>
											</div>
										</div>
									</div>
								</div>
					
								<div class="col-sm-6 col-lg-6 col-xl-3 card-purpple">
						<div class="card active-cards">
								<div class="card-body iconfont text-left">
									<h6 class="mb-3 flex-head"><span>Auto Subida agency</span> </h6>
									<h2 class="mb-1 text-dark display-4 font-weight-bold"><a href="{{url('admin/auto_subidas_anuncios_agency/index')}}">{{$AgencySubidaAd}}</a><span class="text-success fs-13 ml-2">(+{{$AgencySubidaAdAddedd}}%)</span></h2>
									<p class="mb-3">Overview of Last month</p>
									<div class="progress h-1 mb-2">
										<div class="progress-bar bg-secondary" style="width: {{$AgencySubidaAdLastAddedd}}% !important" role="progressbar"></div>
									</div>
									<small class="mb-0  text-muted">Monthly<span class="float-right text-muted">{{$AgencySubidaAdLastAddedd}}%</span></small>
								</div>
							</div>							
						</div>
						
					
					
						<div class="col-sm-6 col-lg-6 col-xl-3 card-pink">
									<div class="card">
										<div class="card-body">
											<div class="d-flex">
												<div class="">
													<p class="mb-1 font-weight-semibold">
														Auto Subidas Escorts
													</p>
													<h2 class="mt-2 mb-2 display-6 font-weight-bold"><a href="{{url('admin/auto_subidas_anuncios/index?category=escorts&province=&name=&mobile=')}}">{{$AutoSubidasEscorts}}</a></h2>
													
												</div>
											
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-6 col-lg-6 col-xl-3 card-blue">
									<div class="card">
										<div class="card-body">
											<div class="d-flex">
												<div class="">
													<p class="mb-1 font-weight-semibold">
														Auto Subidas Chaperos
													</p>
													<h2 class="mt-2 mb-2 display-6 font-weight-bold"><a href="{{url('admin/auto_subidas_anuncios/index?category=chaperos&province=&name=&mobile=')}}">{{$AutoSubidasChaperos}}</a></h2>
													
												</div>
												
												
											</div>
										</div>
									</div>
								</div>
									<div class="col-sm-6 col-lg-6 col-xl-3 card-yellow">
									<div class="card">
										<div class="card-body">
											<div class="d-flex">
												<div class="">
													<p class="mb-1 font-weight-semibold">
														Auto Subidas Travestis
													</p>
													<h2 class="mt-2 mb-2 display-6 font-weight-bold"><a href="{{url('admin/auto_subidas_anuncios/index?category=travestis&province=&name=&mobile=')}}">{{$AutoSubidasTravestis}}</a></h2>
													
												</div>
											</div>
										</div>
									</div>
								</div>		
								
								<div class="col-sm-6 col-lg-6 col-xl-3 card-purpple">
						<div class="card active-cards">
								<div class="card-body iconfont text-left">
									<h6 class="mb-3 flex-head"><span>Free AD agency</span> </h6>
									<h2 class="mb-1 text-dark display-4 font-weight-bold"><a href="{{url('/admin/profile_agency/index/free')}}">{{$FreeAdAgency}}</a><span class="text-success fs-13 ml-2">(+{{$AgencyFreeAdAddedd}}%)</span></h2>
									<p class="mb-3">Overview of Last month</p>
									<div class="progress h-1 mb-2">
										<div class="progress-bar bg-secondary" style="width: {{$AgencyFreeAdLastAddedd}}% !important" role="progressbar"></div>
									</div>
									<small class="mb-0  text-muted">Monthly<span class="float-right text-muted">{{$AgencyFreeAdLastAddedd}}%</span></small>
								</div>
							</div>							
						</div>
							
						
								
							
								<div class="col-sm-6 col-lg-6 col-xl-3 card-pink">
									<div class="card">
										<div class="card-body">
											<div class="d-flex">
												<div class="">
													<p class="mb-1 font-weight-semibold">
														Free Escorts
													</p>
													<h2 class="mt-2 mb-2 display-6 font-weight-bold"><a href="{{url('/admin/profile/index/free?category=escorts&province=&name=&mobile=')}}">{{$FreeEscorts}}</a></h2>
													
												</div>
											
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-6 col-lg-6 col-xl-3 card-blue">
									<div class="card">
										<div class="card-body">
											<div class="d-flex">
												<div class="">
													<p class="mb-1 font-weight-semibold">
														Free Chaperos
													</p>
													<h2 class="mt-2 mb-2 display-6 font-weight-bold"><a href="{{url('/admin/profile/index/free?category=chaperos&province=&name=&mobile=')}}">{{$FreeChaperos}}</a></h2>													
												</div>
											</div>
										</div>
									</div>
								</div>
									<div class="col-sm-6 col-lg-6 col-xl-3 card-yellow">
									<div class="card">
										<div class="card-body">
											<div class="d-flex">
												<div class="">
													<p class="mb-1 font-weight-semibold">
														Free Travestis
													</p>
													<h2 class="mt-2 mb-2 display-6 font-weight-bold"><a href="{{url('/admin/profile/index/free?category=travestis&province=&name=&mobile=')}}">{{$FreeTravestis}}</a></h2>
													
												</div>
											</div>
										</div>
									</div>
								</div>		
								
										<div class="col-sm-6 col-lg-6 col-xl-3 card-purpple">
							<div class="card">
								<div class="card-body iconfont text-left">
									<h6 class="mb-3 flex-head"><span>Pending Agencies</span></h6>
									<h2 class="mb-1 text-dark display-4 font-weight-bold"><a href="{{url('admin/agencies?category=&province=&name=&email=&mobile=&status=all&pending=1')}}">{{$PendingAgencies}}</a> </h2>
									
								</div>
							</div>
						</div>
						
								<div class="col-sm-6 col-lg-6 col-xl-3 color-white">
								<div class="card">
								<div class="card-body iconfont text-left">
								<h6 class="mb-3 flex-head"><span>Blocked Anuncios</span> </h6>
								<h2  class="mb-1 text-dark display-4 font-weight-bold"><!-- $ --><a style="color:#000!important" href="{{url('/admin/profile/index/blocked')}}">{{$BlockedAnuncios}}</a> </h2>

								</div>
								</div>
								</div>
								
								<div class="col-sm-6 col-lg-6 col-xl-3">
									<div class="card">
										<div class="card-body">
											<div class="d-flex">
												<div class="">
														<small class="mb-0"><a href="{{url('/admin/top-agency-packages?category=escorts&province=&durations=')}}"><strong>Top Packages</strong></a></small></br>
														<small class="mb-0"><a href="{{url('/admin/top-agency-packages?category=escorts&province=&durations=')}}"><strong>Escorts Prices List</strong></a></small></br>
														<small class="mb-0"><a href="{{url('/admin/top-agency-packages?category=chaperos&province=&durations=')}}"><strong>Chaperos Prices List</strong></a></small></br>
														<small class="mb-0"><a href="{{url('/admin/top-agency-packages?category=travestis&province=&durations=')}}"><strong>Travestis Prices List</strong></a></small>												
												</div>
											
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-6 col-lg-6 col-xl-3">
									<div class="card">
										<div class="card-body">
											<div class="d-flex">
												<div class="">
														<small class="mb-0"><a href="{{url('/admin/subida-agency-packages?category=escorts&province=&durations=')}}"><strong>Auto Subida</strong></a></small></br>
														<small class="mb-0"><a href="{{url('/admin/subida-agency-packages?category=escorts&province=&durations=')}}"><strong>Escorts Prices List</strong></a></small></br>
														<small class="mb-0"><a href="{{url('/admin/subida-agency-packages?category=chaperos&province=&durations=')}}"><strong>Chaperos Prices List</strong></a></small></br>
														<small class="mb-0"><a href="{{url('/admin/subida-agency-packages?category=travestis&province=&durations=')}}"><strong>Travestis Prices List</strong></a></small>												
												</div>
											
											</div>
										</div>
									</div>
								</div>
								
							<div class="col-sm-6 col-lg-6 col-xl-3 card-purpple">
							<div class="card">
								<div class="card-body iconfont text-left">
									<h6 class="mb-3 flex-head"><span>Blocked Agencies</span></h6>
									<h2 class="mb-1 text-dark display-4 font-weight-bold"><a href="{{url('admin/agencies?category=&province=&name=&email=&mobile=&status=2')}}">{{$BlockedAgencies}}</a> </h2>
									
								</div>
							</div>
						</div>
								<div class="col-sm-6 col-lg-6 col-xl-3 color-white">
							<div class="card">
								<div class="card-body iconfont text-left">
									<span class="agecny-head">
								<h6 class="mb-3 flex-head"><span>Selfies</span> 
									
								</h6>
								
								<h2 style="color:#000!important"  class="mt-2 mb-2 display-6 font-weight-bold"><a style="color:#000!important" href="{{url('/admin/profile/index/selfies')}}">{{$Selfies}}</a></h2>
							</span>
								<span class="agecny-names">
								<small class="mb-0 sp1">Escorts <a href="{{url('/admin/profile/index/selfies?category=escorts&province=&name=&mobile=')}}">{{$SelfiesEscorts}}</a></small></br>
									<small class="mb-0 sp2">Chaperos <a href="{{url('/admin/profile/index/selfies?category=chaperos&province=&name=&mobile=')}}">{{$SelfiesChaperos}}</a></small></br>
									<small class="mb-0 sp3">Travestis <a href="{{url('/admin/profile/index/selfies?category=travestis&province=&name=&mobile=')}}">{{$SelfiesTravestis}}</a></small></br>
									</span>				
								</div>
							</div>
						</div>
							
								<div class="col-sm-6 col-lg-6 col-xl-3">
									<div class="card">
										<div class="card-body">
											<div class="d-flex">
												<div class="">
													<p class="mb-1 font-weight-semibold">
														<a href="{{url('/admin/faq')}}">Frequently Asked Questions</a>
													</p>														
												</div>
											
											</div>
										</div>
									</div>
								</div>
								
									<div class="col-sm-6 col-lg-6 col-xl-3">
									<div class="card">
										<div class="card-body">
											<div class="d-flex">
												<div class="">
													<p class="mb-1 font-weight-semibold">
														<a href="{{url('/admin/terms-and-conditions')}}">Terms & Conditions</a>
													</p>														
												</div>
											
											</div>
										</div>
									</div>
								</div>
								
								<div class="col-sm-6 col-lg-6 col-xl-3">
									<div class="card">
										<div class="card-body">
											<div class="d-flex">
												<div class="">
													<p class="mb-1 font-weight-semibold">
														<h6 class="mb-3 flex-head"><span>Email Accounts</span> </h6>														
														<h2 class="mt-2 mb-2 display-6 font-weight-bold"><a  style="color:#000!important" href="{{url('/admin/email-accounts')}}">{{$EmailAccounts}}</a></h2>													
													</p>														
												</div>
											
											</div>
										</div>
									</div>
								</div>
							
									<div class="chart-wrapper" style="height:20px;">
										<canvas id="widgetChart1" class="mb-0 p-0 overflow-hidden" style="visibility:hidden"></canvas>
									</div>
								</div>
							
						
							
						
							
						
						
					<!-- ROW-2 END -->

					<!-- ROW-3 -->
					<div class="row">
					
						<div class="col-md-12 col-xl-8 col-lg-12">
							<div class="card">
								<div class="card-header">
									<div class="card-title">Conversion Rate</div>
								</div>
								<div class="card-body">
									<p class="text-left text-muted">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum  odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque</p>
									<div class="row text-left mb-5">
										<div class="col-md-4 dash-1">
											<h6 class="mb-1">Paying Conversion rate</h6>
											<h3 class="mb-0 fs-25 number-font1 counter">{{$Last30Paying}}<span class="fs-13 text-muted font-weight-normal">
												<?php if($Last60Paying > $Last30Paying){?>
												<span class="text-danger mr-1"><i class="fe fe-arrow-down ml-1"></i>{{$Last30PayingRate}}%</span>last month</span>
												<?php }else{?>
												<span class="text-success mr-1"><i class="fe fe-arrow-up ml-1"></i>{{$Last30PayingRate}}%</span>last month</span>
												<?php } ?>
												</h3>
										</div>
										<div class="col-md-4 dash-1">
											<h6 class="mb-1">Signup Conversion rate</h6>
											<h3 class="mb-0 fs-25 number-font1 counter">{{$Last30Signup}}<span class="fs-13 text-muted font-weight-normal">
													<?php if($Last60Signup > $Last30Signup){?>
												<span class="text-danger mr-1"><i class="fe fe-arrow-down ml-1"></i>{{$Last30SignupRate}}%</span>last month</span>
												<?php }else{?>
												<span class="text-success mr-1"><i class="fe fe-arrow-up ml-1"></i>{{$Last30SignupRate}}%</span>last month</span>
												<?php } ?>
												</h3>
										</div>
										<div class="col-md-4">
											<h6 class="mb-1">Churn rate</h6>
											<h3 class="mb-0 fs-25 number-font1 counter">{{$Last30Delete}}<span class="fs-13 text-muted font-weight-normal">
													<?php if($Last60Delete > $Last30Delete){?>
												<span class="text-danger mr-1"><i class="fe fe-arrow-down ml-1"></i>{{$Last30DeleteRate}}%</span>last month</span>
												<?php }else{?>
												<span class="text-success mr-1"><i class="fe fe-arrow-up ml-1"></i>{{$Last30DeleteRate}}%</span>last month</span>
												<?php } ?>
												</h3>
										</div>
									</div>
									<div id="conversion"></div>
								</div>
							</div>
						</div>
						<div class="col-md-12 col-xl-4 col-lg-12">
							<div class="card">
								<div class="card-header">
									<div class="card-title">Ad Revenue ( % )</div>
								</div>
								<div class="card-body">
									<div>
										<canvas id="pieChart" class=""></canvas>
									</div>
								</div>
							</div>
							
						</div>
					</div> 
					<!-- ROW-3 END -->

					<!-- ROW-4 -->
					
					<div class="row">
						<div class="col-md-12 col-xl-12 col-lg-12">
							<div class="card">
								<div class="card-header">
									<div class="card-title">Customer Transactions Details</div>
								</div>
								<div class="">
									<div class="table-responsive">
										<table class="table table-hover card-table table-striped table-vcenter table-outline text-nowrap">
											<thead>
												<tr>
													<th scope="col">Name</th>
													<th scope="col">Date</th>
													<th scope="col">Payment Method</th>
													<th scope="col">Amount</th>
													<th scope="col">Info</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td>Phil Watson</td>
													<td>31-05-2019</td>
													<td class="text-success">Transfer</td>
													<td>$2,48,960.00</td>
													<td><a class="btn btn-sm btn-primary" href="#"> View more</a></td>
												</tr>
												<tr>
													<td>Sonia Robertson</td>
													<td>02-06-2019</td>
													<td class="text-primary">Shares</td>
													<td>$78,956.00</td>
													<td><a class="btn btn-sm btn-primary" href="#"> View more</a></td>
												</tr>
												<tr>
													<td>Matt Arnold</td>
													<td>12-06-2019</td>
													<td class="text-danger">Bonds</td>
													<td>$5,85,976.00</td>
													<td><a class="btn btn-sm btn-primary" href="#"> View more</a></td>
												</tr>
												<tr>
													<td>Adam Hamilton</td>
													<td>16-06-2019</td>
													<td class="text-danger">Bonds</td>
													<td>$34,692.00</td>
													<td><a class="btn btn-sm btn-primary" href="#"> View more</a></td>
												</tr>
												<tr>
													<td>Leah Morgan</td>
													<td>17-06-2019</td>
													<td class="text-success">Transfer</td>
													<td>$7,89,465.00</td>
													<td><a class="btn btn-sm btn-primary" href="#"> View more</a></td>
												</tr>
												<tr>
													<td>Amelia	McDonald</td>
													<td>21-06-2019</td>
													<td class="text-primary">Shares</td>
													<td>$89,365.00</td>
													<td><a class="btn btn-sm btn-primary" href="#"> View more</a></td>
												</tr>
												<tr>
													<td>Simon Clark</td>
													<td>22-06-2019</td>
													<td class="text-primary">Shares</td>
													<td  >$1,23,567.00</td>
													<td><a class="btn btn-sm btn-primary" href="#"> View more</a></td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- ROW-4 END -->

				</div>
				

			
			
 @endsection       