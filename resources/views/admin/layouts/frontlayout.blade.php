<!doctype html>
<html lang="en" dir="ltr">
	<head>
		<!-- Meta data -->
		<meta charset="UTF-8">
		<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>

		<!--favicon -->
		<link rel="icon" href="{{URL::asset('public/admin/assets/images/brand/favicon.png')}}" type="image/png"/>

		<!-- TITLE -->
		<title>Escortlisting</title>

		<!-- DASHBOARD CSS -->
		<link href="{{URL::asset('public/admin/assets/css/dashboard.css')}}" rel="stylesheet"/>
		<link href="{{URL::asset('public/admin/assets/css/style-modes.css')}}" rel="stylesheet"/>

		<!-- HORIZONTAL-MENU CSS -->
		<link href="{{URL::asset('public/admin/assets/plugins/horizontal-menu/dropdown-effects/fade-down.css')}}" rel="stylesheet">
		<link href="{{URL::asset('public/admin/assets/plugins/horizontal-menu/horizontal-menu.css')}}" rel="stylesheet">

		<!--C3.JS CHARTS PLUGIN -->
		<link href="{{URL::asset('public/admin/assets/plugins/charts-c3/c3-chart.css')}}" rel="stylesheet"/>

		<!-- TABS CSS -->
		<link href="{{URL::asset('public/admin/assets/plugins/tabs/style-2.css')}}" rel="stylesheet" type="text/css">

		<!-- PERFECT SCROLL BAR CSS-->
		<link href="{{URL::asset('public/admin/assets/plugins/pscrollbar/perfect-scrollbar.css')}}" rel="stylesheet" />

		<!--- FONT-ICONS CSS -->
		<link href="{{URL::asset('public/admin/assets/css/icons.css')}}" rel="stylesheet"/>

		<!-- Skin css-->
		<link href="{{URL::asset('public/admin/assets/skins/skins-modes/color1.css')}}"  id="theme" rel="stylesheet" type="text/css" media="all" />

		<!-- SIDEBAR CSS -->
		<link href="{{URL::asset('public/admin/assets/plugins/sidebar/sidebar.css')}}" rel="stylesheet">
		
		<!-- Data table css -->
		<link href="{{URL::asset('public/admin/assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
		<link rel="stylesheet" href="{{URL::asset('public/admin/assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}">
		<link href="{{URL::asset('public/admin/assets/plugins/datatable/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
		<link href="{{URL::asset('public/admin/assets/node_modules/sweetalert/sweetalert.css')}}" rel="stylesheet">
		<!-- developer css-->
		<link href="{{URL::asset('public/admin/assets/css/main.css')}}" rel="stylesheet"/>
		
		<!-- MULTI SELECT CSS -->
		<link rel="stylesheet" href="{{URL::asset('public/admin/assets/plugins/multipleselect/multiple-select.css')}}">
			<!-- WYSIWYG EDITOR CSS -->
		<link href="{{URL::asset('public/admin/assets/plugins/wysiwyag/richtext.css')}}" rel="stylesheet"/>


	</head>

	<body class="default-header">

		<!-- GLOBAL-LOADER -->
		<div id="global-loader">
			<img src="{{URL::asset('public/admin/assets/images/svgs/loader.svg')}}" class="loader-img" alt="Loader">
		</div>

		<div class="page">
			<div class="page-main">
				<!-- HEADER -->
				<div class="header">
					<div class="container">
						<div class="d-flex">
						    <a id="horizontal-navtoggle" class="animated-arrow hor-toggle"><span></span></a>
							<a class="header-brand" href="{{url('/admin/home')}}">
								Escort Listing

								<!-- <img src="{{URL::asset('public/admin/assets/images/brand/logo.png')}}" class="header-brand-img desktop-logo" alt="Solic logo">
								<img src="{{URL::asset('public/admin/assets/images/brand/logo-1.png')}}" class="header-brand-img mobile-view-logo" alt="Solic logo"> -->
							</a><!-- LOGO -->
							<div class="d-flex order-lg-2 ml-auto header-right-icons header-search-icon">
							    <a href="#" data-toggle="search" class="nav-link nav-link-lg d-md-none navsearch"><i class="fa fa-search"></i></a>
								<div class="">
									<!-- <form class="form-inline">
										<div class="search-element">
											<input type="search" class="form-control header-search" placeholder="Search…" aria-label="Search" tabindex="1">
											<button class="btn btn-primary-color" type="submit"><i class="fa fa-search"></i></button>
										</div>
									</form> -->
								</div><!-- SEARCH -->
								<div class="dropdown d-md-flex">
									<a class="nav-link icon full-screen-link nav-link-bg" id="fullscreen-button">
										<i class="fe fe-maximize-2" ></i>
									</a>
								</div><!-- FULL-SCREEN -->
								<?php /*		
								<div class="dropdown d-md-flex notifications">
									<a class="nav-link icon" data-toggle="dropdown">
										<i class="fe fe-bell"></i>
										<span class="pulse bg-warning"></span>
									</a>
									<div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
										<div class="drop-heading">
											<div class="d-flex">
												<h5 class="mb-0 text-dark">Notifications</h5>
												<span class="badge badge-danger ml-auto  brround">4</span>
											</div>
										</div>
										<div class="dropdown-divider mt-0"></div>
									    <a href="#" class="dropdown-item mt-2 d-flex pb-3">
											<div class="notifyimg bg-success-transparent">
												<i class="fa fa-thumbs-o-up text-success"></i>
											</div>
											<div>
												<strong>Someone likes our posts.</strong>
												<div class="small text-muted">3 hours ago</div>
											</div>
										</a>
										<a href="#" class="dropdown-item d-flex pb-3">
											<div class="notifyimg bg-primary-transparent">
												<i class="fa fa-exclamation-triangle text-primary"></i>
											</div>
											<div>
												<strong> Issues Fixed</strong>
												<div class="small text-muted">30 mins ago</div>
											</div>
										</a>
										<a href="#" class="dropdown-item d-flex pb-3">
											<div class="notifyimg bg-warning-transparent">
												<i class="fa fa-commenting-o text-warning"></i>
											</div>
											<div>
												<strong> 3 New Comments</strong>
												<div class="small text-muted">5  hour ago</div>
											</div>
										</a>
										<a href="#" class="dropdown-item d-flex pb-3">
											<div class="notifyimg bg-danger-transparent">
												<i class="fa fa-cogs text-danger"></i>
											</div>
											<div>
												<strong> Server Rebooted.</strong>
												<div class="small text-muted">45 mintues ago</div>
											</div>
										</a>
										<div class="dropdown-divider mb-0"></div>
										<div class=" text-center p-2">
											<a href="#" class="text-dark pt-0">View All Notifications</a>
										</div>
									</div>
								</div><!-- NOTIFICATIONS -->
								*/?><div class="dropdown d-md-flex message">
									<a class="nav-link icon text-center" data-toggle="dropdown">
										<i class="fe fe-mail "></i>
										<span class="badge badge-danger"><?php echo(count(agency_contact_enquiry()));?></span>
									</a>
									<div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
										<div class="drop-heading">
											<div class="d-flex">
												<h5 class="mb-0 text-dark">Messages</h5>
												<span class="badge badge-danger ml-auto  brround"><?php echo(count(agency_contact_enquiry()));?></span>
											</div>
										</div>
										<div class="dropdown-divider mt-0"></div>
										@foreach(agency_contact_enquiry() as $data)
													<a href="#" class="dropdown-item d-flex mt-2 pb-3">
													<?php if($data->type=='agency'){?>
													<?php $AgencyLogo = AgencyLogo($data->id);?>
														<?php if(!empty($AgencyLogo)){?>
														
														<?php $icon =  URL::asset('public/uploads/profile_logo/'.$AgencyLogo);?>
														<?php }else{?>
														<?php $icon =  URL::asset('public/admin/assets/images/admin-image.png');?>
														<?php } ?>
													<?php }else{ ?>
														<?php $individualLogo = individualLogo($data->id);?>
														<?php if(!empty($individualLogo)){?>
														<?php $icon =  URL::asset('public/uploads/profile_ads/'.$individualLogo);?>
														<?php }else{?>
														<?php $icon =  URL::asset('public/admin/assets/images/admin-image.png');?>
														<?php } ?>
														<?php } ?>
														
											<div class="avatar avatar-md brround mr-3 d-block cover-image" data-image-src="{{$icon}}">
												<span class="avatar-status bg-green"></span>
											</div>
											<div>
												<strong>{{ $data->name }}</strong>
												<p class="mb-0 fs-13 text-muted "><?php echo  substr($data->comments, 0, 25), "\n"; ?>  </p>
												<div class="small text-muted"><?php  echo date('h:i A',strtotime($data->created_at));;?></div>
											</div>
										</a>
								
												
												@endforeach	
									
									<div class="dropdown-divider mb-0"></div>
										<div class=" text-center p-2">
											<a href="{{ url('/admin/contact-enquiry') }}" class="text-dark pt-0">View All Messages</a>
										</div>
									</div>
								</div><!-- MESSAGE-BOX -->
								<div class="dropdown d-md-flex header-settings">
									<a href="#" class="nav-link " data-toggle="dropdown">
										<span><img src="{{URL::asset('public/admin/assets/images/users/male/32.jpg')}}" alt="profile-user" class="avatar brround cover-image mb-0 ml-0"></span>
									</a>
									
									<div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
										<?php /*<div class="drop-heading  text-center border-bottom pb-3">
											<h5 class="text-dark mb-1">Jonathan	Mills</h5>
											<small class="text-muted">App Developer</small>
										</div>
										<a class="dropdown-item" href="profile.html"><i class="mdi mdi-account-outline mr-2"></i> <span>My profile</span></a>
										<a class="dropdown-item" href="#"><i class="mdi mdi-settings mr-2"></i> <span>Settings</span></a>
										<a class="dropdown-item" href="#"><i class="fe fe-calendar mr-2"></i> <span>Activity</span></a>
										<a class="dropdown-item" href="#"><i class="mdi mdi-compass-outline mr-2"></i> <span>Support</span></a>
										*/?>
										<a class="dropdown-item" onclick="return confirm('Are you sure to logout?');" href="{{ url('/admin/logout') }}"><i class="mdi  mdi-logout-variant mr-2"></i> <span>Logout</span></a>
									</div>
								</div><!-- SIDE-MENU -->
								<!-- <div class="sidebar-link">
									<a href="#" class="nav-link icon" data-toggle="sidebar-right" data-target=".sidebar-right">
										<i class="fe fe-align-right" ></i>
									</a>
								</div> --><!-- FULL-SCREEN -->
							</div>
						</div>
					</div>
				</div>
				<!-- HEADER END -->

				<!-- HORIZONTAL-MENU -->
				<div class="sticky">
					<div class="horizontal-main hor-menu clearfix">
						<div class="horizontal-mainwrapper container clearfix">
							<nav class="horizontalMenu clearfix">
								<ul class="horizontalMenu-list">
									<li aria-haspopup="true"><a href="{{url('/admin/home')}}" class="sub-icon active"><i class="fe fe-airplay"></i> Dashboard <!-- <i class="fa fa-angle-down horizontal-icon"></i> --></a>
										
									</li>
									
									<li aria-haspopup="true"><a href="#" class="sub-icon"><i class="fe fe-users"></i> Members <i class="fa fa-angle-down horizontal-icon"></i></a>
										<ul class="sub-menu">
											<li aria-haspopup="true"><a href="{{url('/admin/individual')}}">Individual</a></li>											
											<li aria-haspopup="true"><a href="{{url('/admin/agencies')}}">Agencies</a></li>											
										</ul>
									</li>
									
									<li aria-haspopup="true"><a href="#" class="sub-icon"><i class="fe fe-box"></i> Anuncios <i class="fa fa-angle-down horizontal-icon"></i></a>
										<ul class="sub-menu">
											<li aria-haspopup="true"><a href="{{url('/admin/profile/index/escorts')}}">Escorts</a></li>											
											<li aria-haspopup="true"><a href="{{url('/admin/profile/index/chaperos')}}">Chaperos</a></li>
											<li aria-haspopup="true"><a href="{{url('/admin/profile/index/travestis')}}">Travestis</a></li>
										</ul>
									</li>
									<li aria-haspopup="true"><a href="#" class="sub-icon"><i class="fe fe-database"></i> Packages <i class="fa fa-angle-down horizontal-icon"></i></a>
										<ul class="sub-menu">
										<li aria-haspopup="true" class="sub-menu-sub"><span class="horizontalMenu-click02"><i class="horizontalMenu-arrow fa fa-angle-down"></i></span><a href="#">Agency Packages</a>
												<ul class="sub-menu">
													<li aria-haspopup="true"><a href="{{url('/admin/top-agency-packages?category=escorts&province=&durations=')}}">Top Packages</a></li>											
													<li aria-haspopup="true"><a href="{{url('/admin/subida-agency-packages?category=escorts&province=&durations=')}}">Subida Packages</a></li>											
												</ul>
											</li>
											<li aria-haspopup="true" class="sub-menu-sub"><span class="horizontalMenu-click02"><i class="horizontalMenu-arrow fa fa-angle-down"></i></span><a href="#">Individual Packages</a>
												<ul class="sub-menu">
													<li aria-haspopup="true"><a href="{{url('/admin/top-individual-packages?category=escorts&province=&durations=')}}">Top Packages</a></li>											
													<li aria-haspopup="true"><a href="{{url('/admin/subida-individual-packages?category=escorts&province=&durations=')}}">Subida Packages</a></li>											
												</ul>
											</li>
											
											
										</ul>
									</li>
									
									<li aria-haspopup="true"><a href="#" class="sub-icon"><i class="fe fe-pie-chart"></i> Settings  <i class="fa fa-angle-down horizontal-icon"></i></a>
										<ul class="sub-menu">										                    
											<li aria-haspopup="true"><a href="{{ url('/admin/over_you') }}">Manage Over You</a></li>                                
											<li aria-haspopup="true"><a href="{{ url('/admin/services') }}">Manage Services</a></li>  
											<li aria-haspopup="true"><a href="{{ url('/admin/faq') }}">Manage Frequently Asked Questions</a></li>  
											<li aria-haspopup="true"><a href="{{ url('/admin/terms-and-conditions') }}">Manage Terms & Conditions</a></li>  
										</ul>
									</li>	
									
									<li aria-haspopup="true"><a href="#" class="sub-icon"><i class="fe fe-pie-chart"></i> Seo  <i class="fa fa-angle-down horizontal-icon"></i></a>
										<ul class="sub-menu">
											<li aria-haspopup="true"><a href="{{ url('/admin/province') }}">Manage Province</a></li>
											<li aria-haspopup="true"><a href="{{ url('/admin/population') }}">Manage Population</a></li>
											<li aria-haspopup="true"><a href="{{ url('/admin/meta-seo') }}">Manage Meta Seo</a></li>
											
										</ul>
									</li>
									
								</ul>
							</nav>
							<!-- NAV END -->
						</div>
					</div>
				</div>
				<!-- HORIZONTAL-MENU END -->
				<!-- CONTAINER START -->
					@yield('content')
			<!-- CONTAINER END -->
            </div>
<!-- FOOTER -->
			<footer class="footer">
				<div class="container">
					<div class="row align-items-center flex-row-reverse">
						<div class="col-md-12 col-sm-12 text-center">
							Copyright © 2019 <a href="#">Escort Listing </a>. <!-- Designed by --> <a href="#"><!-- Spruko Technologies Private Limited --></a> All rights reserved.
						</div>
					</div>
				</div>
			</footer>
			<!-- FOOTER END -->
		</div>

		<!-- BACK-TO-TOP -->
		<a href="#top" id="back-to-top"><i class="fa fa-long-arrow-up"></i></a>
		
		<?php if (Route::currentRouteAction()=='App\Http\Controllers\Admin\HomeController@terms'){?>
		<?php 		}else if(Route::currentRouteAction()=='App\Http\Controllers\Admin\FaqController@add'){?>
		<?php 		}else if(Route::currentRouteAction()=='App\Http\Controllers\Admin\FaqController@edit'){?>
		<?php 		}else if(Route::currentRouteAction()=='App\Http\Controllers\Admin\HomeController@seo'){?>
		<?php }else{?>
		<!-- JQUERY SCRIPTS -->
		<script src="{{URL::asset('public/admin/assets/js/vendors/jquery-3.2.1.min.js')}}"></script>
		<?php }?>
		<!-- BOOTSTRAP SCRIPTS -->
		<script src="{{URL::asset('public/admin/assets/js/vendors/bootstrap.bundle.min.js')}}"></script>

		<!-- SPARKLINE -->
		<script src="{{URL::asset('public/admin/assets/js/vendors/jquery.sparkline.min.js')}}"></script>

		<!-- CHART-CIRCLE -->
		<script src="{{URL::asset('public/admin/assets/js/vendors/circle-progress.min.js')}}"></script>

		<!-- RATING STAR -->
		<script src="{{URL::asset('public/admin/assets/plugins/rating/jquery.rating-stars.js')}}"></script>

		<!-- CHARTJS CHART -->
		<script src="{{URL::asset('public/admin/assets/plugins/chart/Chart.bundle.js')}}"></script>
		<script src="{{URL::asset('public/admin/assets/plugins/chart/utils.js')}}"></script>

		<!-- PIETY CHART -->
		<script src="{{URL::asset('public/admin/assets/plugins/peitychart/jquery.peity.min.js')}}"></script>
		<script src="{{URL::asset('public/admin/assets/plugins/peitychart/peitychart.init.js')}}"></script>

		<!-- HORIZONTAL-MENU -->
		<script src="{{URL::asset('public/admin/assets/plugins/horizontal-menu/horizontal-menu.js')}}"></script>

		<!-- PERFECT SCROLL BAR JS-->
		<script src="{{URL::asset('public/admin/assets/plugins/pscrollbar/perfect-scrollbar.js')}}"></script>
		<script src="{{URL::asset('public/admin/assets/plugins/pscrollbar/pscroll-1.js')}}"></script>

		<!-- SIDEBAR JS -->
		<script src="{{URL::asset('public/admin/assets/plugins/sidebar/sidebar.js')}}"></script>

		<!-- APEX-CHARTS JS -->
		<script src="{{URL::asset('public/admin/assets/plugins/apexcharts/apexcharts.js')}}"></script>
		<script src="{{URL::asset('public/admin/assets/plugins/apexcharts/irregular-data-series.js')}}"></script>

		<!-- INDEX-SCRIPTS  -->
		<script src="{{URL::asset('public/admin/assets/js/index.js')}}"></script>
			<?php if(Route::getCurrentRoute()->getActionName()=='App\Http\Controllers\Admin\HomeController@home'){?>
			<input type="hidden" id="site_url" value="{{url('/')}}/"/>
		<script>
		
	var APP_URL = $('#site_url').val();
			/* Donutchart */
	var ctx = document.getElementById("pieChart");
	ctx.height = 410;
	//FD5602
	var myChart = new Chart(ctx, {
		type: 'pie',
		data: {
			datasets: [{
				data: [{{$PieEscortsCount}}, {{$PieChaperosCount}}, {{$PieTravestisCount}}],
				backgroundColor: ['#fd2c94', '#007bff', '#FD5602'],
				hoverBackgroundColor: ['#fd2c94', '#007bff', '#FD5602'],
				borderColor:'transparent',
			}],
			labels: ["Escorts", "Chaperos", "Travestis"]
		},
		options: {
			responsive: true,
			maintainAspectRatio: false,
			legend: {
				labels: {
					fontColor: "#14171a"
				},
			},
			tooltips: {
  callbacks: {
    label: function(tooltipItem, data) {
      //get the concerned dataset
      var dataset = data.datasets[tooltipItem.datasetIndex];
      //calculate the total of this data set
	  var indice = tooltipItem.index; 
      var total = dataset.data.reduce(function(previousValue, currentValue, currentIndex, array) {
        return previousValue + currentValue;
      });
      //get the current items value
      var currentValue = dataset.data[tooltipItem.index];
      var labels = data.labels[tooltipItem.index];
      //calculate the precentage based on the total and current item, also this does a rough rounding to give a whole number
      
		 return  labels+': '+currentValue+ '%';

      //return currentValue + "%";
    }
  }
} 
		}
	});
	/*apex-chart*/
	var options = {
		chart: {
			height: 300,
			type: 'bar',
			stacked: true,
		},
		plotOptions: {
			bar: {
				horizontal: true,
			},

		},
		stroke: {
			width: 1,
			colors: ['#fff']
		},
	series: [{
          data: []
        }],
		xaxis: {
			
			labels: {
				formatter: function(val) {
					return val + ""
				}
			}
		},
		yaxis: {
			title: {
				text: undefined
			},

		},
		tooltip: {
			y: {
				formatter: function(val) {
				return val + ""
			}
			}
		},
		fill: {
			opacity: 1

		},
		colors: ['#564ec1' ,'#04cad0' ,'#f5334f'],
		legend: {
			position: 'top',
			horizontalAlign: 'center',
			offsetX: 10
		}
	}
	
	var piesepuerto_chart = new ApexCharts(document.querySelector("#conversion"), options);
var piesepuerto_url = remove_double_slash(APP_URL+'ajax/conversion');
piesepuerto_chart.render();
 $.getJSON(piesepuerto_url, function(response) {     
  piesepuerto_chart.updateSeries([{
   	name: 'Paying Conversion rate',
    data: response.pay
  },
  {
	name: 'Signup Conversion rate',
    data: response.signup
  },
    {
    name: 'Churn rate',
    data: response.delete
  }
  ])
   
});  
/* 	var chart = new ApexCharts(
		document.querySelector("#conversion"),
		options
	);
    chart.render(); */
	// visualizaciones chat 
function remove_double_slash(temp){
			return temp.replace(/([^:]\/)\/+/g, "$1");
		}
	</script>
			<?php }?>
		<!--HIGH CHARTS-->
		<script src="{{URL::asset('public/admin/assets/plugins/highcharts/highcharts.js')}}"></script>

		<!-- STICKY JS -->
		<script src="{{URL::asset('public/admin/assets/js/stiky.js')}}"></script>

		<!-- CUSTOM JS -->
		<script src="{{URL::asset('public/admin/assets/js/custom.js')}}"></script>
		
		<!-- DATA TABLE -->
		<script src="{{URL::asset('public/admin/assets/plugins/datatable/js/jquery.dataTables.js')}}"></script>
		<script src="{{URL::asset('public/admin/assets/plugins/datatable/js/dataTables.bootstrap4.js')}}"></script>
		<script src="{{URL::asset('public/admin/assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
		<script src="{{URL::asset('public/admin/assets/plugins/datatable/js/buttons.bootstrap4.min.js')}}"></script>
		<script src="{{URL::asset('public/admin/assets/plugins/datatable/dataTables.responsive.min.js')}}"></script>
		<script src="{{URL::asset('public/admin/assets/plugins/datatable/responsive.bootstrap4.min.js')}}"></script>
		<script src="{{URL::asset('public/admin/assets/plugins/datatable/datatable.js')}}"></script>
		<!-- Sweet-Alert  -->
    <script src="{{URL::asset('public/admin/assets/node_modules/sweetalert/sweetalert.min.js')}}"></script>
    <script src="{{URL::asset('public/admin/assets/node_modules/sweetalert/jquery.sweet-alert.custom.js')}}"></script>
	<script>
	$('.alert-id-m').trigger('click');
	$('.alert-id-m').trigger('click');
	setTimeout(function(){
   $('.alert-id-m').hide();// or fade, css display however you'd like.
}, 10);
	</script>
	
	<!-- MULTI SELECT JS-->
		<script src="{{URL::asset('public/admin/assets/plugins/multipleselect/multiple-select.js')}}"></script>
		<script src="{{URL::asset('public/admin/assets/plugins/multipleselect/multi-select.js')}}"></script>
		<style>
			.tooltip { pointer-events: none; }
			.main-pop-sec .video-sec {
    margin-bottom: 15px;
    border-radius: 12px;
    height: auto;
}
		</style>
		<script>
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();   
});
</script>
	</body>
</html>

