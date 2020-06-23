@extends('admin.layouts.frontlayout')
@section('content')


				<!-- CONTAINER -->
				<div class="container content-area relative">

					<!-- PAGE-HEADER -->
					<div class="page-header">
						<h4 class="page-title"><!-- Dashboard 01 --></h4>
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="#">Home</a></li>
							<li class="breadcrumb-item active" aria-current="page">Saas Dashboard</li>
						</ol>
					</div>
					<!-- PAGE-HEADER END -->

					<!-- ROW-1 -->
					<div class="row boxes-card-row">
						<div class="col-sm-6 col-lg-6 col-xl-3">
							<div class="card">
								<div class="card-body iconfont text-left">
									<h6 class="mb-3 flex-head"><span>Active Agencies</span> <a href="{{url('/admin/agencies/add')}}" class="btn btn-danger">Add Agency</a></h6>
									<h2 class="mb-1 text-dark display-4 font-weight-bold"><a href="{{url('admin/agencies?category=&province=&name=&email=&mobile=&status=1')}}">{{$agencies}}</a><!-- K --><span class="text-success fs-13 ml-2">(+25%)</span></h2>
									
								</div>
							</div>
						</div>
						<div class="col-sm-6 col-lg-6 col-xl-3">
							<div class="card">
								<div class="card-body iconfont text-left">
									<h6 class="mb-3 flex-head"><span>Active Individuals</span></h6>
									<h2 class="mb-1 text-dark display-4 font-weight-bold"><a href="{{url('admin/individual?email=&status=1')}}">{{$escorts}}</a><span class="text-success fs-13 ml-2">(+15%)</span></h2>
									
								</div>
							</div>
						</div>
						<div class="col-sm-6 col-lg-6 col-xl-3">
							<div class="card">
								<div class="card-body iconfont text-left">
									<h6 class="mb-3 flex-head"><span>Blocked Agencies</span></h6>
									<h2 class="mb-1 text-dark display-4 font-weight-bold"><a href="{{url('admin/agencies?category=&province=&name=&email=&mobile=&status=2')}}">{{$chaperos}}</a> </h2>
									
								</div>
							</div>
						</div>
						<div class="col-sm-6 col-lg-6 col-xl-3">
							<div class="card">
								<div class="card-body iconfont text-left">
									<h6 class="mb-3 flex-head"><span>Blocked Individual</span> </h6>
									<h2 class="mb-1 text-dark display-4 font-weight-bold"><!-- $ --><a href="{{url('admin/individual?email=&status=2')}}">{{$travestis}}</a> </h2>
									
								</div>
							</div>
						</div>
					</div>
					<!-- ROW-1 END -->
					
					<!-- ROW-1 -->
					<div class="row boxes-card-row">
					
						<div class="col-sm-6 col-lg-6 col-xl-3">
							<div class="card">
								<div class="card-body iconfont text-left">
									<h6 class="mb-3 flex-head"><span>Active Escorts</span> <a href="{{ url('/admin/profile/add/escorts') }}" class="btn btn-danger">Add Escorts</a></h6>
									<h2 class="mb-1 text-dark display-4 font-weight-bold"><a href="{{url('/admin/profile/index/escorts')}}">{{$escorts}}</a><span class="text-success fs-13 ml-2">(+15%)</span></h2>
									
								</div>
							</div>
						</div>
						<div class="col-sm-6 col-lg-6 col-xl-3">
							<div class="card">
								<div class="card-body iconfont text-left">
									<h6 class="mb-3 flex-head"><span>Active Chaperos</span> <a href="{{ url('/admin/profile/add/chaperos') }}" class="btn btn-danger">Add Chaperos</a></h6>
									<h2 class="mb-1 text-dark display-4 font-weight-bold"><a href="{{url('/admin/profile/index/chaperos')}}">{{$chaperos}}</a> <span class="text-success fs-13 ml-2">(+08%)</span></h2>
									
								</div>
							</div>
						</div>
						<div class="col-sm-6 col-lg-6 col-xl-3">
							<div class="card">
								<div class="card-body iconfont text-left">
									<h6 class="mb-3 flex-head"><span>Active Travestis</span> <a href="{{ url('/admin/profile/add/travestis') }}" class="btn btn-danger">Add Travestis</a></h6>
									<h2 class="mb-1 text-dark display-4 font-weight-bold"><!-- $ --><a href="{{url('/admin/profile/index/travestis')}}">{{$travestis}}</a> <span class="text-success fs-13 ml-2">(+35%)</span></h2>
								</div>
							</div>
						</div>
						<div class="col-sm-6 col-lg-6 col-xl-3">
							<div class="card">
								<div class="card-body iconfont text-left">
								<h6 class="mb-3 flex-head"><span>Selfies</span> 
									
								</h6>
								
								<h2 class="mt-2 mb-2 display-6 font-weight-bold"><a href="{{url('/admin/agencies/index')}}">{{$chaperos}}</a></h2>
								
								<small class="mb-0">Escorts (10)</small></br>
									<small class="mb-0">Chaperos (10)</small></br>
									<small class="mb-0">Travestis (10)</small></br>
														
								</div>
							</div>
						</div>
					</div>
					<!-- ROW-1 END -->

					<!-- ROW-2 -->
					<div class="row user-row">
						<div class="col-lg-12">
							<div class="row">
									<div class="col-xl-3 col-md-12">
									<div class="card">
										<div class="card-body">
											<div class="d-flex">
												<div class="">
													<p class="mb-1 font-weight-semibold">
														Top Anuncios 
													</p>
													<h2 class="mt-2 mb-2 display-6 font-weight-bold"><a href="{{url('/admin/agencies/index')}}">{{$chaperos}}</a></h2>
													
												</div>
												<!-- <div class="ml-auto mt-3">
													<span class="pie" data-peity="{ &quot;fill&quot;: [&quot;#04cad0&quot;, &quot;#e2e1ea&quot;]}" style="display: none;">220/360</span><svg class="peity" height="70" width="70"><path d="M 35 0 A 35 35 0 1 1 12.502433660971121 61.81155550916423 L 35 35" fill="#04cad0"></path><path d="M 12.502433660971121 61.81155550916423 A 35 35 0 0 1 34.99999999999999 0 L 35 35" fill="#e2e1ea"></path></svg>
												</div> -->
											</div>
										</div>
									</div>
								</div>	
								<div class="col-xl-3 col-md-12">
									<div class="card">
										<div class="card-body">
											<div class="d-flex">
												<div class="">
													<p class="mb-1 font-weight-semibold">
														Top Escorts 
													</p>
													<h2 class="mt-2 mb-2 display-6 font-weight-bold"><a href="{{url('/admin/agencies/index')}}">{{$chaperos}}</a></h2>
													
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-xl-3 col-md-12">
									<div class="card">
										<div class="card-body">
											<div class="d-flex">
												<div class="">
													<p class="mb-1 font-weight-semibold">
														Top Chaperos
													</p>
													<h2 class="mt-2 mb-2 display-6 font-weight-bold"><a href="{{url('/admin/agencies/index')}}">{{$chaperos}}</a></h2>
													
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-xl-3 col-md-12">
									<div class="card">
										<div class="card-body">
											<div class="d-flex">
												<div class="">
													<p class="mb-1 font-weight-semibold">
														Top Travestis
													</p>
													<h2 class="mt-2 mb-2 display-6 font-weight-bold"><a href="{{url('/admin/agencies/index')}}">{{$chaperos}}</a></h2>
													
												</div>
											</div>
										</div>
									</div>
								</div>		
							</div>
							<!-- row-3 -->
							<div class="row">
								<div class="col-xl-3 col-md-12">
									<div class="card">
										<div class="card-body">
											<div class="d-flex">
												<div class="">
													<p class="mb-1 font-weight-semibold">
														 Auto Subidas Anuncios
													</p>
													<h2 class="mt-2 mb-2 display-6 font-weight-bold"><!-- $ -->345<!-- K --></h2>
													
												</div>
												
											</div>
										</div>
									</div>
								</div>
								<div class="col-xl-3 col-md-12">
									<div class="card">
										<div class="card-body">
											<div class="d-flex">
												<div class="">
													<p class="mb-1 font-weight-semibold">
														Auto Subidas Escorts
													</p>
													<h2 class="mt-2 mb-2 display-6 font-weight-bold"><a href="{{url('/admin/agencies/index')}}">{{$chaperos}}</a></h2>
													
												</div>
											
											</div>
										</div>
									</div>
								</div>
								<div class="col-xl-3 col-md-12">
									<div class="card">
										<div class="card-body">
											<div class="d-flex">
												<div class="">
													<p class="mb-1 font-weight-semibold">
														Auto Subidas Chaperos
													</p>
													<h2 class="mt-2 mb-2 display-6 font-weight-bold"><a href="{{url('/admin/agencies/index')}}">{{$chaperos}}</a></h2>
													
												</div>
												
												
											</div>
										</div>
									</div>
								</div>
								<div class="col-xl-3 col-md-12">
									<div class="card">
										<div class="card-body">
											<div class="d-flex">
												<div class="">
													<p class="mb-1 font-weight-semibold">
														Auto Subidas Travestis
													</p>
													<h2 class="mt-2 mb-2 display-6 font-weight-bold"><a href="{{url('/admin/agencies/index')}}">{{$chaperos}}</a></h2>
													
												</div>
											</div>
										</div>
									</div>
								</div>		
							</div>
							<!-- row-4 -->
							<div class="row">
								<div class="col-xl-3 col-md-12">
									<div class="card">
										<div class="card-body">
											<div class="d-flex">
												<div class="">
													<p class="mb-1 font-weight-semibold">
														Top Packages
													</p>
														<small class="mb-0"><a href="{{url('/admin/top-agency-packages?category=&province=&durations=')}}"><strong>ALL</strong></a></small></br>
														<small class="mb-0"><a href="{{url('/admin/top-agency-packages?category=escorts&province=&durations=')}}"><strong>Escorts Prices List</strong></a></small></br>
														<small class="mb-0"><a href="{{url('/admin/top-agency-packages?category=chaperos&province=&durations=')}}"><strong>Chaperos Prices List</strong></a></small></br>
														<small class="mb-0"><a href="{{url('/admin/top-agency-packages?category=travestis&province=&durations=')}}"><strong>Travestis Prices List</strong></a></small>												
												</div>
											
											</div>
										</div>
									</div>
								</div>
								<div class="col-xl-3 col-md-12">
									<div class="card">
										<div class="card-body">
											<div class="d-flex">
												<div class="">
													<p class="mb-1 font-weight-semibold">
														Auto Subida
													</p>
														<small class="mb-0"><a href="{{url('/admin/subida-agency-packages?category=&province=&durations=')}}"><strong>ALL</strong></a></small></br>
														<small class="mb-0"><a href="{{url('/admin/subida-agency-packages?category=escorts&province=&durations=')}}"><strong>Escorts Prices List</strong></a></small></br>
														<small class="mb-0"><a href="{{url('/admin/subida-agency-packages?category=chaperos&province=&durations=')}}"><strong>Chaperos Prices List</strong></a></small></br>
														<small class="mb-0"><a href="{{url('/admin/subida-agency-packages?category=travestis&province=&durations=')}}"><strong>Travestis Prices List</strong></a></small>												
												</div>
											
											</div>
										</div>
									</div>
								</div>
									<div class="chart-wrapper" style="height:20px;">
										<canvas id="widgetChart1" class="mb-0 p-0 overflow-hidden" style="visibility:hidden"></canvas>
									</div>
								</div>
							
						
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
											<h3 class="mb-0 fs-25 number-font1 counter">5,89%<span class="fs-13 text-muted font-weight-normal"><span class="text-danger mr-1"><i class="fe fe-arrow-down ml-1"></i>0.7%</span>last month</span></h3>
										</div>
										<div class="col-md-4 dash-1">
											<h6 class="mb-1">Signup Conversion rate</h6>
											<h3 class="mb-0 fs-25 number-font1 counter">6,89%<span class="fs-13 text-muted font-weight-normal"><span class="text-danger mr-1"><i class="fe fe-arrow-down ml-1"></i>0.2%</span>last month</span></h3>
										</div>
										<div class="col-md-4">
											<h6 class="mb-1">Churn rate</h6>
											<h3 class="mb-0 fs-25 number-font1 counter">2,76%<span class="fs-13 text-muted font-weight-normal"><span class="text-danger mr-1"><i class="fe fe-arrow-down ml-1"></i>1.3%</span>last month</span></h3>
										</div>
									</div>
									<div id="conversion"></div>
								</div>
							</div>
						</div>
						<div class="col-md-12 col-xl-4 col-lg-12">
							<div class="card">
								<div class="card-header">
									<div class="card-title">Types of Revenue</div>
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