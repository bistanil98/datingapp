@extends('front.layouts.frontlayout')

@section('content')
		<section class="video-grid-sec">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-6 offset-md-1  order-column-text">
						<div class="video-header-text">
							<h1>Escorts y putas en España</h1>
							<nav aria-label="breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item active" aria-current="page">España</li>
								</ol>
							</nav>
						</div>
					</div>
					<div class="col-md-5  order-column-icon">
						<div class="icon-div">
							<a href="" data-toggle="modal" data-target="#escrot">Crear Anuncio</a>
							<a href="#" class="alta-button" data-toggle="modal" data-target="#register-modal"><i class="fas fa-users"></i> Mi Cuenta</a>
							
						</div>
					</div>
					
					
				</div>
				
				
				<div class="row gird-first">
					<div class="col-md-1 top-fix-main">
					<div class="top-fix-button">
					<h2>TOP TOP Anuncio</h2>
					</div>
					</div>
					<div class="col-md-11 masonry">
						<div class="item video-image" data-toggle="modal" data-target="#girl_modals">
							<a href="#">
								<div class="vips-logo">
									<img src="{{URL::asset('public/front/images/vip-logo.png')}}" class="img-fluid" alt="">
								</div>
								<div class="img-top">
									<img src="{{URL::asset('public/front/images/model01.jpg')}}" class="img-fluid" alt="">
									<div class="overlay">
										
										<div class="text"><a href="#" class="a1"><i class="fas fa-heart"></i></a>
											<a href="" class="a2"><i class="fas fa-check"></i></a>
											<a href="" class="a3"><i class="fas fa-play"></i></a>
										<a href="" class="a4"><i class="fas fa-info"></i></a></div>
									</div>
									<div class="self-icon">
										<img src="{{URL::asset('public/front/images/self.png')}}" class="img-fluid" alt="">
									</div>
									<div class="tops-icon">
										<img src="{{URL::asset('public/front/images/top-icon.png')}}" class="img-fluid" alt="">
									</div>
								</a>
							</div>
							<a href="#">
								<div class="img-text <?php if ($category=='travestis'){ echo 'orange-bg';}?><?php if ($category=='chaperos'){ echo 'blue-bg';}?>">
									<a href="#" class="btn btn-dark">Barcelona</a>
									<a href="#" class="btn btn-dark">24 anos</a>
									<a href="#" class="btn btn-dark">300 €</a>
									<span><img src="{{URL::asset('public/front/images/spain.png')}}" class="img-fluid"></span>
									<p>Youg, Tall and Sexy!!! Highly recommended Youg, Tall and Sexy!!! Highly recommended </p>
								</div>
							</a>
						</div>
						
						<div class="item video-image" data-toggle="modal" data-target="#girl_modals">
							<a href="#" >
								<div class="img-top">
									<img src="{{URL::asset('public/front/images/model9.jpg')}}" class="img-fluid" alt="">
									<div class="overlay">
										
										<div class="text">
											<a href="#" class="a1"><i class="fas fa-heart"></i></a>
											<a href="" class="a2"><i class="fas fa-check"></i></a>
											<a href="" class="a3"><i class="fas fa-play"></i></a>
										<a href="" class="a4"><i class="fas fa-info"></i></a></div>
									</div>
								</div>
							</a>
							<a href="#">
								<div class="img-text <?php if ($category=='travestis'){ echo 'orange-bg';}?><?php if ($category=='chaperos'){ echo 'blue-bg';}?>">
									<a href="#" class="btn btn-dark">Madrid</a>
									<a href="#" class="btn btn-dark">24 años</a>
									<a href="#" class="btn btn-dark">150 €</a>
									<span><img src="{{URL::asset('public/front/images/united-kingdom.png')}}" class="img-fluid"></span>
									<p>Universitaria deseosa de compartir lomejor de su juventud.</p>
								</div>
							</a>
						</div>
						
						<div class="item video-image">
							<a href="#">
								<div class="img-top">
									<img src="{{URL::asset('public/front/images/model3.jpg')}}" class="img-fluid" alt="">
									<div class="overlay">
										<div class="text"><a href="#" class="a1"><i class="fas fa-heart"></i></a>
											<a href="" class="a2"><i class="fas fa-check"></i></a>
											<a href="" class="a3"><i class="fas fa-play"></i></a>
										<a href="" class="a4"><i class="fas fa-info"></i></a></div>
									</div>
								</div>
							</a>
							<a href="">
								<div class="img-text <?php if ($category=='travestis'){ echo 'orange-bg';}?><?php if ($category=='chaperos'){ echo 'blue-bg';}?>">
									<a href="#" class="btn btn-dark">Madrid</a>
									<a href="#" class="btn btn-dark">24 años</a>
									<a href="#" class="btn btn-dark">150 €</a>
									<span><img src="{{URL::asset('public/front/images/spain.png')}}" class="img-fluid"></span>
									<p>Universitaria deseosa de compartir lomejor de su juventud.</p>
								</div>
							</a>
						</div>
						
						<div class="item video-image" data-toggle="modal" data-target="#girl_modals">
							<a href="#">
								<div class="img-top">
									<img src="{{URL::asset('public/front/images/model4.jpg')}}" class="img-fluid" alt="">
									<div class="overlay">
										<div class="text"><a href="#" class="a1"><i class="fas fa-heart"></i></a>
											<a href="" class="a2"><i class="fas fa-check"></i></a>
											<a href="" class="a3"><i class="fas fa-play"></i></a>
										<a href="" class="a4"><i class="fas fa-info"></i></a></div>
									</div>
								</div>
							</a>
							<a href="">
								<div class="img-text <?php if ($category=='travestis'){ echo 'orange-bg';}?><?php if ($category=='chaperos'){ echo 'blue-bg';}?>">
									<a href="#" class="btn btn-dark">Madrid</a>
									<a href="#" class="btn btn-dark">24 años</a>
									<a href="#" class="btn btn-dark">150 €</a>
									<span><img src="{{URL::asset('public/front/images/united-kingdom.png')}}" class="img-fluid"></span>
									<p>Universitaria deseosa de compartir lomejor de su juventud.</p>
								</div>
							</a>
						</div>
						
						<div class="item video-image">
							
							<a href="#">
								<div class="img-top" data-toggle="modal" data-target="#girl_modals">
									<img src="{{URL::asset('public/front/images/model02.jpg')}}" class="img-fluid" alt="">
									<div class="overlay">
										<div class="text"><a href="#" class="a1"><i class="fas fa-heart"></i></a>
											<a href="" class="a2"><i class="fas fa-check"></i></a>
											<a href="" class="a3"><i class="fas fa-play"></i></a>
										</div>
									</div>
								</div>
							</a>
							<a href="agency.html">
								<div class="image-top-bottom">
									<img src="{{URL::asset('public/front/images/agency-image.jpg')}}" class="img-fluid" alt>
								</div>
							</a>
							<a href="#">
								<div class="img-text <?php if ($category=='travestis'){ echo 'orange-bg';}?><?php if ($category=='chaperos'){ echo 'blue-bg';}?>">
									<a href="#" class="btn btn-dark">Malaga</a>
									<a href="#" class="btn btn-dark">32 anos</a>
									<a href="#" class="btn btn-dark">250 €</a>
									<span><img src="{{URL::asset('public/front/images/spain.png')}}" class="img-fluid"></span>
									<p>Youg, Tall and Sexy!!! Highly recommended Youg, Tall and Sexy!!! Highly recommended </p>
								</div>
							</a>
						</div>
						<div class="item video-image">
							<a href="#">
								<div class="img-top">
									<img src="{{URL::asset('public/front/images/model4.jpg')}}" class="img-fluid" alt="">
									<div class="overlay">
										<div class="text"><a href="#" class="a1"><i class="fas fa-heart"></i></a>
											<a href="" class="a2"><i class="fas fa-check"></i></a>
											<a href="" class="a3"><i class="fas fa-play"></i></a>
										<a href="" class="a4"><i class="fas fa-info"></i></a></div>
									</div>
								</div>
								<div class="img-text <?php if ($category=='travestis'){ echo 'orange-bg';}?><?php if ($category=='chaperos'){ echo 'blue-bg';}?>">
									<a href="#" class="btn btn-dark">Madrid</a>
									<a href="#" class="btn btn-dark">24 años</a>
									<a href="#" class="btn btn-dark">150 €</a>
									<span><img src="{{URL::asset('public/front/images/brazil.png')}}" class="img-fluid"></span>
									<p>Universitaria deseosa de compartir lomejor de su juventud.</p>
								</div>
							</a>
						</div>
						<div class="item video-image" data-toggle="modal" data-target="#girl_modals">
							<a href="#">
								<div class="img-top">
									<img src="{{URL::asset('public/front/images/model11.jpg')}}" class="img-fluid" alt="">
									<div class="overlay">
										<div class="text"><a href="#" class="a1"><i class="fas fa-heart"></i></a>
											<a href="" class="a2"><i class="fas fa-check"></i></a>
											<a href="" class="a3"><i class="fas fa-play"></i></a>
										<a href="" class="a4"><i class="fas fa-info"></i></a></div>
									</div>
								</div>
								<div class="img-text <?php if ($category=='travestis'){ echo 'orange-bg';}?><?php if ($category=='chaperos'){ echo 'blue-bg';}?>">
									<a href="#" class="btn btn-dark">Madrid</a>
									<a href="#" class="btn btn-dark">24 años</a>
									<a href="#" class="btn btn-dark">150 €</a>
									<span>
									<img src="{{URL::asset('public/front/images/spain.png')}}" class="img-fluid"></span>
									<p>Universitaria deseosa de compartir lomejor de su juventud.</p>
								</div>
							</a>
						</div>
						<div class="item video-image">
							<a href="#">
								<div class="img-top">
									<img src="{{URL::asset('public/front/images/model11.jpg')}}" class="img-fluid" alt="">
									<div class="overlay">
										<div class="text"><a href="#" class="a1"><i class="fas fa-heart"></i></a>
											<a href="" class="a2"><i class="fas fa-check"></i></a>
											<a href="" class="a3"><i class="fas fa-play"></i></a>
										<a href="" class="a4"><i class="fas fa-info"></i></a></div>
									</div>
								</div>
								<div class="img-text <?php if ($category=='travestis'){ echo 'orange-bg';}?><?php if ($category=='chaperos'){ echo 'blue-bg';}?>">
									<a href="#" class="btn btn-dark">Madrid</a>
									<a href="#" class="btn btn-dark">24 años</a>
									<a href="#" class="btn btn-dark">150 €</a>
									<span><img src="{{URL::asset('public/front/images/brazil.png')}}" class="img-fluid"></span>
									<p>Universitaria deseosa de compartir lomejor de su juventud.</p>
								</div>
							</a>
						</div>
						<div class="item video-image">
							<a href="#">
								<div class="img-top">
									<img src="{{URL::asset('public/front/images/model3.jpg')}}" class="img-fluid" alt="">
									<div class="overlay">
										<div class="text"><a href="#" class="a1"><i class="fas fa-heart"></i></a>
											<a href="" class="a2"><i class="fas fa-check"></i></a>
											<a href="" class="a3"><i class="fas fa-play"></i></a>
										<a href="" class="a4"><i class="fas fa-info"></i></a></div>
									</div>
								</div>
								<div class="img-text <?php if ($category=='travestis'){ echo 'orange-bg';}?><?php if ($category=='chaperos'){ echo 'blue-bg';}?>">
									<a href="#" class="btn btn-dark">Madrid</a>
									<a href="#" class="btn btn-dark">24 años</a>
									<a href="#" class="btn btn-dark">150 €</a>
									<span><img src="{{URL::asset('public/front/images/brazil.png')}}" class="img-fluid"></span>
									<p>Universitaria deseosa de compartir lomejor de su juventud.</p>
								</div>
							</a>
						</div>
						<div class="item video-image" data-toggle="modal" data-target="#girl_modals">
							<a href="#">
								<div class="img-top">
									<img src="{{URL::asset('public/front/images/model5.jpg')}}" class="img-fluid" alt="">
									<div class="overlay">
										<div class="text"><a href="#" class="a1"><i class="fas fa-heart"></i></a>
											<a href="" class="a2"><i class="fas fa-check"></i></a>
											<a href="" class="a3"><i class="fas fa-play"></i></a>
										<a href="" class="a4"><i class="fas fa-info"></i></a></div>
									</div>
								</div>
								<div class="img-text <?php if ($category=='travestis'){ echo 'orange-bg';}?><?php if ($category=='chaperos'){ echo 'blue-bg';}?>">
									<a href="#" class="btn btn-dark">Madrid</a>
									<a href="#" class="btn btn-dark">24 años</a>
									<a href="#" class="btn btn-dark">150 €</a>
									<span><img src="{{URL::asset('public/front/images/united-kingdom.png')}}" class="img-fluid"></span>
									<p>Universitaria deseosa de compartir lomejor de su juventud.</p>
								</div>
							</a>
						</div>
						
						<div class="item video-image">
							<a href="#">
								<div class="img-top">
									<img src="{{URL::asset('public/front/images/model7.jpg')}}" class="img-fluid" alt="">
									<div class="overlay">
										<div class="text"><a href="#" class="a1"><i class="fas fa-heart"></i></a>
											<a href="" class="a2"><i class="fas fa-check"></i></a>
											<a href="" class="a3"><i class="fas fa-play"></i></a>
										<a href="" class="a4"><i class="fas fa-info"></i></a></div>
									</div>
								</div>
								<div class="img-text <?php if ($category=='travestis'){ echo 'orange-bg';}?><?php if ($category=='chaperos'){ echo 'blue-bg';}?>">
									<a href="#" class="btn btn-dark">Madrid</a>
									<a href="#" class="btn btn-dark">24 años</a>
									<a href="#" class="btn btn-dark">150 €</a>
									<span><img src="{{URL::asset('public/front/images/united-kingdom.png')}}" class="img-fluid"></span>
									<p>Universitaria deseosa de compartir lomejor de su juventud.</p>
								</div>
							</a>
						</div>
						<div class="item video-image">
							<a href="#">
								<div class="img-top">
									<img src="{{URL::asset('public/front/images/model3.jpg')}}" class="img-fluid" alt="">
									<div class="overlay">
										<div class="text"><a href="#" class="a1"><i class="fas fa-heart"></i></a>
											<a href="" class="a2"><i class="fas fa-check"></i></a>
											<a href="" class="a3"><i class="fas fa-play"></i></a>
										<a href="" class="a4"><i class="fas fa-info"></i></a></div>
									</div>
								</div>
								<div class="img-text <?php if ($category=='travestis'){ echo 'orange-bg';}?><?php if ($category=='chaperos'){ echo 'blue-bg';}?>">
									<a href="#" class="btn btn-dark">Madrid</a>
									<a href="#" class="btn btn-dark">24 años</a>
									<a href="#" class="btn btn-dark">150 €</a>
									<span><img src="{{URL::asset('public/front/images/brazil.png')}}" class="img-fluid"></span>
									<p>Universitaria deseosa de compartir lomejor de su juventud.</p>
								</div>
							</a>
						</div>
						
						<div class="item video-image">
							<a href="#">
								<div class="img-top" data-toggle="modal" data-target="#girl_modals">
									<img src="{{URL::asset('public/front/images/model7.jpg')}}" class="img-fluid" alt="">
									<div class="overlay">
										<div class="text"><a href="#" class="a1"><i class="fas fa-heart"></i></a>
											<a href="" class="a2"><i class="fas fa-check"></i></a>
											<a href="" class="a3"><i class="fas fa-play"></i></a>
										</div>
									</div>
								</div>
							</a>
							<a href="agency.html">
								<div class="image-top-bottom">
									<img src="{{URL::asset('public/front/images/agency-image2.png')}}" class="img-fluid" alt>
								</div>
							</a>
							<a href="#">
								<div class="img-text <?php if ($category=='travestis'){ echo 'orange-bg';}?><?php if ($category=='chaperos'){ echo 'blue-bg';}?>">
									<a href="#" class="btn btn-dark">Madrid</a>
									<a href="#" class="btn btn-dark">24 años</a>
									<a href="#" class="btn btn-dark">150 €</a>
									<span><img src="{{URL::asset('public/front/images/spain.png')}}" class="img-fluid"></span>
									<p>Universitaria deseosa de compartir lomejor de su juventud.</p>
								</div>
							</a>
						</div>
						<div class="item video-image" data-toggle="modal" data-target="#girl_modals">
							<a href="#">
								<div class="img-top">
									<img src="{{URL::asset('public/front/images/model9.jpg')}}" class="img-fluid" alt="">
									<div class="overlay">
										<div class="text"><a href="#" class="a1"><i class="fas fa-heart"></i></a>
											<a href="" class="a2"><i class="fas fa-check"></i></a>
											<a href="" class="a3"><i class="fas fa-play"></i></a>
										<a href="" class="a4"><i class="fas fa-info"></i></a></div>
									</div>
								</div>
								<div class="img-text <?php if ($category=='travestis'){ echo 'orange-bg';}?><?php if ($category=='chaperos'){ echo 'blue-bg';}?>">
									<a href="#" class="btn btn-dark">Madrid</a>
									<a href="#" class="btn btn-dark">24 años</a>
									<a href="#" class="btn btn-dark">150 €</a>
									<span><img src="{{URL::asset('public/front/images/spain.png')}}" class="img-fluid"></span>
									<p>Universitaria deseosa de compartir lomejor de su juventud.</p>
								</div>
							</a>
						</div>
						<div class="item video-image">
							<a href="#">
								<div class="img-top">
									<img src="{{URL::asset('public/front/images/model8.jpg')}}" class="img-fluid" alt="">
									<div class="overlay">
										<div class="text"><a href="#" class="a1"><i class="fas fa-heart"></i></a>
											<a href="" class="a2"><i class="fas fa-check"></i></a>
											<a href="" class="a3"><i class="fas fa-play"></i></a>
										<a href="" class="a4"><i class="fas fa-info"></i></a></div>
									</div>
								</div>
								<div class="img-text orignial">
									<a href="#" class="btn btn-dark">Madrid</a>
									<a href="#" class="btn btn-dark">24 años</a>
									<a href="#" class="btn btn-dark">150 €</a>
									<span><img src="{{URL::asset('public/front/images/spain.png')}}" class="img-fluid"></span>
									<p>Universitaria deseosa de compartir lomejor de su juventud.</p>
								</div>
							</a>
						</div>
					</div>
					<div class="col-md-11 masonry offset-md-1">
						<div class="item video-image">
							<a href="#">
								<div class="img-top">
									<img src="{{URL::asset('public/front/images/model5.jpg')}}" class="img-fluid" alt="">
									<div class="overlay">
										<div class="text"><a href="#" class="a1"><i class="fas fa-heart"></i></a>
											<a href="" class="a2"><i class="fas fa-check"></i></a>
											<a href="" class="a3"><i class="fas fa-play"></i></a>
											<a href="" class="a4"><i class="fas fa-info"></i></a>
										</div>
									</div>
								</div>
								<div class="img-text white-bg">
									<a href="#" class="btn btn-dark">Madrid</a>
									<a href="#" class="btn btn-dark">24 años</a>
									<a href="#" class="btn btn-dark">150 €</a>
									<span><img src="{{URL::asset('public/front/images/brazil.png')}}" class="img-fluid"></span>
									<p>Universitaria deseosa de compartir lomejor de su juventud.</p>
								</div>
							</a>
						</div>
						<div class="item video-image">
							<a href="#">
								<div class="img-top">
									<img src="{{URL::asset('public/front/images/model9.jpg')}}" class="img-fluid" alt="">
									<div class="overlay">
										<div class="text"><a href="#" class="a1"><i class="fas fa-heart"></i></a>
											<a href="" class="a2"><i class="fas fa-check"></i></a>
											<a href="" class="a3"><i class="fas fa-play"></i></a>
											<a href="" class="a4"><i class="fas fa-info"></i></a>
											
										</div>
									</div>
								</div>
								<div class="img-text white-bg">
									<a href="#" class="btn btn-dark">Madrid</a>
									<a href="#" class="btn btn-dark">24 años</a>
									<a href="#" class="btn btn-dark">150 €</a>
									<span><img src="{{URL::asset('public/front/images/united-kingdom.png')}}" class="img-fluid"></span>
									<p>Universitaria deseosa de compartir lomejor de su juventud.</p>
								</div>
							</a>
						</div>
						<div class="item video-image">
							<a href="#">
								<div class="img-top">
									<img src="{{URL::asset('public/front/images/model6.jpg')}}" class="img-fluid" alt="">
									<div class="overlay">
										<div class="text"><a href="#" class="a1"><i class="fas fa-heart"></i></a>
											<a href="" class="a2"><i class="fas fa-check"></i></a>
											<a href="" class="a3"><i class="fas fa-play"></i></a>
										<a href="" class="a4"><i class="fas fa-info"></i></a></div>
									</div>
								</div>
								<div class="img-text white-bg">
									<a href="#" class="btn btn-dark">Madrid</a>
									<a href="#" class="btn btn-dark">24 años</a>
									<a href="#" class="btn btn-dark">150 €</a>
									<span><img src="{{URL::asset('public/front/images/spain.png')}}" class="img-fluid"></span>
									<p>Universitaria deseosa de compartir lomejor de su juventud.</p>
								</div>
							</a>
						</div>
						<div class="item video-image">
							<a href="#">
								<div class="img-top">
									<img src="{{URL::asset('public/front/images/model4.jpg')}}" class="img-fluid" alt="">
									<div class="overlay">
										<div class="text"><a href="#" class="a1"><i class="fas fa-heart"></i></a>
											<a href="" class="a2"><i class="fas fa-check"></i></a>
											<a href="" class="a3"><i class="fas fa-play"></i></a>
										<a href="" class="a4"><i class="fas fa-info"></i></a></div>
									</div>
								</div>
								<div class="img-text white-bg">
									<a href="#" class="btn btn-dark">Madrid</a>
									<a href="#" class="btn btn-dark">24 años</a>
									<a href="#" class="btn btn-dark">150 €</a>
									<span><img src="{{URL::asset('public/front/images/brazil.png')}}" class="img-fluid"></span>
									<p>Universitaria deseosa de compartir lomejor de su juventud.</p>
								</div>
							</a>
						</div>
						<div class="item video-image">
							<a href="#">
								<div class="img-top">
									<img src="{{URL::asset('public/front/images/model8.jpg')}}" class="img-fluid" alt="">
									<div class="overlay">
										<div class="text"><a href="#" class="a1"><i class="fas fa-heart"></i></a>
											<a href="" class="a2"><i class="fas fa-check"></i></a>
											<a href="" class="a3"><i class="fas fa-play"></i></a>
										<a href="" class="a4"><i class="fas fa-info"></i></a></div>
									</div>
								</div>
								<div class="img-text white-bg">
									<a href="#" class="btn btn-dark">Madrid</a>
									<a href="#" class="btn btn-dark">24 años</a>
									<a href="#" class="btn btn-dark">150 €</a>
									<span><img src="{{URL::asset('public/front/images/spain.png')}}" class="img-fluid"></span>
									<p>Universitaria deseosa de compartir lomejor de su juventud.</p>
								</div>
							</a>
						</div>
						<div class="item video-image">
							<a href="#">
								<div class="img-top">
									<img src="{{URL::asset('public/front/images/model5.jpg')}}" class="img-fluid" alt="">
									<div class="overlay">
										<div class="text"><a href="#" class="a1"><i class="fas fa-heart"></i></a>
											<a href="" class="a2"><i class="fas fa-check"></i></a>
											<a href="" class="a3"><i class="fas fa-play"></i></a>
											<a href="" class="a4"><i class="fas fa-info"></i></a>
										</div>
									</div>
								</div>
								<div class="img-text white-bg">
									<a href="#" class="btn btn-dark">Madrid</a>
									<a href="#" class="btn btn-dark">24 años</a>
									<a href="#" class="btn btn-dark">150 €</a>
									<span><img src="{{URL::asset('public/front/images/brazil.png')}}" class="img-fluid"></span>
									<p>Universitaria deseosa de compartir lomejor de su juventud.</p>
								</div>
							</a>
						</div>
						<div class="item video-image">
							<a href="#">
								<div class="img-top">
									<img src="{{URL::asset('public/front/images/model9.jpg')}}" class="img-fluid" alt="">
									<div class="overlay">
										<div class="text"><a href="#" class="a1"><i class="fas fa-heart"></i></a>
											<a href="" class="a2"><i class="fas fa-check"></i></a>
											<a href="" class="a3"><i class="fas fa-play"></i></a>
											<a href="" class="a4"><i class="fas fa-info"></i></a>
											
										</div>
									</div>
								</div>
								<div class="img-text white-bg">
									<a href="#" class="btn btn-dark">Madrid</a>
									<a href="#" class="btn btn-dark">24 años</a>
									<a href="#" class="btn btn-dark">150 €</a>
									<span><img src="{{URL::asset('public/front/images/united-kingdom.png')}}" class="img-fluid"></span>
									<p>Universitaria deseosa de compartir lomejor de su juventud.</p>
								</div>
							</a>
						</div>
						<div class="item video-image">
							<a href="#">
								<div class="img-top">
									<img src="{{URL::asset('public/front/images/model6.jpg')}}" class="img-fluid" alt="">
									<div class="overlay">
										<div class="text"><a href="#" class="a1"><i class="fas fa-heart"></i></a>
											<a href="" class="a2"><i class="fas fa-check"></i></a>
											<a href="" class="a3"><i class="fas fa-play"></i></a>
										<a href="" class="a4"><i class="fas fa-info"></i></a></div>
									</div>
								</div>
								<div class="img-text white-bg">
									<a href="#" class="btn btn-dark">Madrid</a>
									<a href="#" class="btn btn-dark">24 años</a>
									<a href="#" class="btn btn-dark">150 €</a>
									<span><img src="{{URL::asset('public/front/images/spain.png')}}" class="img-fluid"></span>
									<p>Universitaria deseosa de compartir lomejor de su juventud.</p>
								</div>
							</a>
						</div>
						<div class="item video-image">
							<a href="#">
								<div class="img-top">
									<img src="{{URL::asset('public/front/images/model4.jpg')}}" class="img-fluid" alt="">
									<div class="overlay">
										<div class="text"><a href="#" class="a1"><i class="fas fa-heart"></i></a>
											<a href="" class="a2"><i class="fas fa-check"></i></a>
											<a href="" class="a3"><i class="fas fa-play"></i></a>
										<a href="" class="a4"><i class="fas fa-info"></i></a></div>
									</div>
								</div>
								<div class="img-text white-bg">
									<a href="#" class="btn btn-dark">Madrid</a>
									<a href="#" class="btn btn-dark">24 años</a>
									<a href="#" class="btn btn-dark">150 €</a>
									<span><img src="{{URL::asset('public/front/images/brazil.png')}}" class="img-fluid"></span>
									<p>Universitaria deseosa de compartir lomejor de su juventud.</p>
								</div>
							</a>
						</div>
						<div class="item video-image">
							<a href="#">
								<div class="img-top">
									<img src="{{URL::asset('public/front/images/model8.jpg')}}" class="img-fluid" alt="">
									<div class="overlay">
										<div class="text"><a href="#" class="a1"><i class="fas fa-heart"></i></a>
											<a href="" class="a2"><i class="fas fa-check"></i></a>
											<a href="" class="a3"><i class="fas fa-play"></i></a>
										<a href="" class="a4"><i class="fas fa-info"></i></a></div>
									</div>
								</div>
								<div class="img-text white-bg">
									<a href="#" class="btn btn-dark">Madrid</a>
									<a href="#" class="btn btn-dark">24 años</a>
									<a href="#" class="btn btn-dark">150 €</a>
									<span><img src="{{URL::asset('public/front/images/spain.png')}}" class="img-fluid"></span>
									<p>Universitaria deseosa de compartir lomejor de su juventud.</p>
								</div>
							</a>
						</div>
						<div class="item video-image">
							<a href="#">
								<div class="img-top">
									<img src="{{URL::asset('public/front/images/model5.jpg')}}" class="img-fluid" alt="">
									<div class="overlay">
										<div class="text"><a href="#" class="a1"><i class="fas fa-heart"></i></a>
											<a href="" class="a2"><i class="fas fa-check"></i></a>
											<a href="" class="a3"><i class="fas fa-play"></i></a>
											<a href="" class="a4"><i class="fas fa-info"></i></a>
										</div>
									</div>
								</div>
								<div class="img-text white-bg">
									<a href="#" class="btn btn-dark">Madrid</a>
									<a href="#" class="btn btn-dark">24 años</a>
									<a href="#" class="btn btn-dark">150 €</a>
									<span><img src="{{URL::asset('public/front/images/brazil.png')}}" class="img-fluid"></span>
									<p>Universitaria deseosa de compartir lomejor de su juventud.</p>
								</div>
							</a>
						</div>
						<div class="item video-image">
							<a href="#">
								<div class="img-top">
									<img src="{{URL::asset('public/front/images/model9.jpg')}}" class="img-fluid" alt="">
									<div class="overlay">
										<div class="text"><a href="#" class="a1"><i class="fas fa-heart"></i></a>
											<a href="" class="a2"><i class="fas fa-check"></i></a>
											<a href="" class="a3"><i class="fas fa-play"></i></a>
											<a href="" class="a4"><i class="fas fa-info"></i></a>
											
										</div>
									</div>
								</div>
								<div class="img-text white-bg">
									<a href="#" class="btn btn-dark">Madrid</a>
									<a href="#" class="btn btn-dark">24 años</a>
									<a href="#" class="btn btn-dark">150 €</a>
									<span><img src="{{URL::asset('public/front/images/united-kingdom.png')}}" class="img-fluid"></span>
									<p>Universitaria deseosa de compartir lomejor de su juventud.</p>
								</div>
							</a>
						</div>
						<div class="item video-image">
							<a href="#">
								<div class="img-top">
									<img src="{{URL::asset('public/front/images/model6.jpg')}}" class="img-fluid" alt="">
									<div class="overlay">
										<div class="text"><a href="#" class="a1"><i class="fas fa-heart"></i></a>
											<a href="" class="a2"><i class="fas fa-check"></i></a>
											<a href="" class="a3"><i class="fas fa-play"></i></a>
										<a href="" class="a4"><i class="fas fa-info"></i></a></div>
									</div>
								</div>
								<div class="img-text white-bg">
									<a href="#" class="btn btn-dark">Madrid</a>
									<a href="#" class="btn btn-dark">24 años</a>
									<a href="#" class="btn btn-dark">150 €</a>
									<span><img src="{{URL::asset('public/front/images/spain.png')}}" class="img-fluid"></span>
									<p>Universitaria deseosa de compartir lomejor de su juventud.</p>
								</div>
							</a>
						</div>
						<div class="item video-image">
							<a href="#">
								<div class="img-top">
									<img src="{{URL::asset('public/front/images/model4.jpg')}}" class="img-fluid" alt="">
									<div class="overlay">
										<div class="text"><a href="#" class="a1"><i class="fas fa-heart"></i></a>
											<a href="" class="a2"><i class="fas fa-check"></i></a>
											<a href="" class="a3"><i class="fas fa-play"></i></a>
										<a href="" class="a4"><i class="fas fa-info"></i></a></div>
									</div>
								</div>
								<div class="img-text white-bg">
									<a href="#" class="btn btn-dark">Madrid</a>
									<a href="#" class="btn btn-dark">24 años</a>
									<a href="#" class="btn btn-dark">150 €</a>
									<span><img src="{{URL::asset('public/front/images/brazil.png')}}" class="img-fluid"></span>
									<p>Universitaria deseosa de compartir lomejor de su juventud.</p>
								</div>
							</a>
						</div>
						<div class="item video-image">
							<a href="#">
								<div class="img-top">
									<img src="{{URL::asset('public/front/images/model8.jpg')}}" class="img-fluid" alt="">
									<div class="overlay">
										<div class="text"><a href="#" class="a1"><i class="fas fa-heart"></i></a>
											<a href="" class="a2"><i class="fas fa-check"></i></a>
											<a href="" class="a3"><i class="fas fa-play"></i></a>
										<a href="" class="a4"><i class="fas fa-info"></i></a></div>
									</div>
								</div>
								<div class="img-text white-bg">
									<a href="#" class="btn btn-dark">Madrid</a>
									<a href="#" class="btn btn-dark">24 años</a>
									<a href="#" class="btn btn-dark">150 €</a>
									<span><img src="{{URL::asset('public/front/images/spain.png')}}" class="img-fluid"></span>
									<p>Universitaria deseosa de compartir lomejor de su juventud.</p>
								</div>
							</a>
						</div>
						
					</div>
				</div>
			</div>
			
			
		</section>
<!------Girl Popup----->
<section class="main-pop-sec">
				<!-- The Modal -->
				<div class="modal fade show" id="girl_modals">
					<div class="popupclick-button">
						<button class="btn btn-danger left"><i class="fas fa-arrow-left"></i> </button>
						<button class="btn btn-danger right"><i class="fas fa-arrow-right"></i> </button>
					</div>  
					<div class="modal-dialog main-popup modal-xl">
						<div class="row">
							<div class="modal-content">
								<!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
								<div class="col-md-12">
									<div class="row">
										<div class="col-md-6">
											<div class="main-div-popup">
												<div class="top-pop-img common-left">
													<div class="profile-img-top">
														<img src="{{URL::asset('public/front/images/model01.jpg')}}" class="img-fluid" alt="" width="100%" height="100%" id="myImg">
														<div class="profile-img-text">
															<a href="#photos"><i class="far fa-image"></i> 22 pictures</a>
														</div>
														
														
														
														
													</div>
												</div>
												
												<div class="graf-img-main common-left">
													
													<div id="anuncio_productos"><h4>Estadísticas de este anuncio</h4> <span id="estadisticas_ver_mas" class="onclick enlace_antiguo" data-src="/estadisticas/8xwbj">ver más</span></span>
													<div class="producto_estadisticas">
														<div id="anuncio_estadisticas" class="chart"><div style="position: relative;"><div style="position: relative; width: 309px; height: 110px;" dir="ltr"><div style="position: absolute; left: 0px; top: 0px; width: 100%; height: 100%;" aria-label="Un gráfico."><svg width="309" height="110" style="overflow: hidden;" aria-label="Un gráfico."><defs id="defs"><clipPath id="_ABSTRACT_RENDERER_ID_1"><rect x="54" y="15" width="246" height="70"></rect></clipPath></defs><rect x="0" y="0" width="309" height="110" stroke="none" stroke-width="0" fill="#ffffff"></rect><g><rect x="54" y="15" width="246" height="70" stroke="none" stroke-width="0" fill-opacity="0" fill="#ffffff"></rect><g clip-path="url(https://www.slumi.com/escorts/barcelona/capital/pla%C3%A7a-espanya/la-escort-mas-complaciente-acabo-de-llegar-a-la-ciudad-id-8xwbj#_ABSTRACT_RENDERER_ID_1)"><g><rect x="54" y="84" width="246" height="1" stroke="none" stroke-width="0" fill="#cccccc"></rect><rect x="54" y="67" width="246" height="1" stroke="none" stroke-width="0" fill="#cccccc"></rect><rect x="54" y="50" width="246" height="1" stroke="none" stroke-width="0" fill="#cccccc"></rect><rect x="54" y="32" width="246" height="1" stroke="none" stroke-width="0" fill="#cccccc"></rect><rect x="54" y="15" width="246" height="1" stroke="none" stroke-width="0" fill="#cccccc"></rect></g><g><g><path d="M54.5,84.5L54.5,84.5L54.5,69.182L79,31.85875L103.5,34.60725L128,33.23875L152.5,33.54925L177,36.34375L201.5,31.163000000000004L226,25.125500000000002L250.5,56.13525L275,33.67575L299.5,66.629L299.5,84.5L299.5,84.5Z" stroke="none" stroke-width="0" fill-opacity="0.4" fill="#0072c6"></path></g></g><g><rect x="54" y="84" width="246" height="1" stroke="none" stroke-width="0" fill="#333333"></rect></g><g><path d="M54.5,69.182L79,31.85875L103.5,34.60725L128,33.23875L152.5,33.54925L177,36.34375L201.5,31.163000000000004L226,25.125500000000002L250.5,56.13525L275,33.67575L299.5,66.629" stroke="#0072c6" stroke-width="2" fill-opacity="1" fill="none"></path></g></g><g></g><g><g><text text-anchor="end" x="46.5" y="88.35" font-family="Verdana" font-size="11" stroke="none" stroke-width="0" fill="#444444">0</text></g><g><text text-anchor="end" x="46.5" y="71.1" font-family="Verdana" font-size="11" stroke="none" stroke-width="0" fill="#444444">3.000</text></g><g><text text-anchor="end" x="46.5" y="53.85" font-family="Verdana" font-size="11" stroke="none" stroke-width="0" fill="#444444">6.000</text></g><g><text text-anchor="end" x="46.5" y="36.6" font-family="Verdana" font-size="11" stroke="none" stroke-width="0" fill="#444444">9.000</text></g><g><text text-anchor="end" x="46.5" y="19.35" font-family="Verdana" font-size="11" stroke="none" stroke-width="0" fill="#444444">12.000</text></g></g></g><g><g><text text-anchor="middle" x="177" y="101.35" font-family="Verdana" font-size="11" stroke="none" stroke-width="0" fill="#222222">Veces en listado últimos 30 días</text><rect x="54" y="92" width="246" height="11" stroke="none" stroke-width="0" fill-opacity="0" fill="#ffffff"></rect></g></g><g></g></svg><div aria-label="Una representación tabular de los datos del gráfico." style="position: absolute; left: -10000px; top: auto; width: 1px; height: 1px; overflow: hidden;"><table><thead><tr><th>Dia</th><th>veces en listado</th></tr></thead><tbody><tr><td>Lunes, 28 de Octubre</td><td>2.664</td></tr><tr><td>Martes, 29 de Octubre</td><td>9.155</td></tr><tr><td>Miércoles, 30 de Octubre</td><td>8.677</td></tr><tr><td>Jueves, 31 de Octubre</td><td>8.915</td></tr><tr><td>Viernes, 1 de Noviembre</td><td>8.861</td></tr><tr><td>Sábado, 2 de Noviembre</td><td>8.375</td></tr><tr><td>Domingo, 3 de Noviembre</td><td>9.276</td></tr><tr><td>Lunes, 4 de Noviembre</td><td>10.326</td></tr><tr><td>Martes, 5 de Noviembre</td><td>4.933</td></tr><tr><td>Miércoles, 6 de Noviembre</td><td>8.839</td></tr><tr><td>Jueves, 7 de Noviembre</td><td>3.108</td></tr></tbody></table></div></div></div><div style="display: none; position: absolute; top: 120px; left: 319px; white-space: nowrap; font-family: Verdana; font-size: 11px;" aria-hidden="true">...</div><div></div></div></div>
														<div id="anuncio_estadisticas_valores">
															<div class="anuncio_info_listados veces_listado">
																<span class="anuncio-info-estadistica" id="anuncio_listado_total">83.129</span>
																<p>veces en listado</p>
																</div><div class="anuncio_info_listados veces_listado">
																<span class="anuncio-info-estadistica" id="anuncio_total">3.819</span>
																<p>vieron el teléfono</p>
																</div><div class="anuncio_info_listados subir_listado">
																<span class="anuncio-info-estadistica" id="anuncio_subir_total">0</span>
																<p>subidas</p>
																</div><div class="anuncio_info_listados subir_listado">
																<span class="anuncio-info-estadistica" id="anuncio_telefono_total">11</span>
																<p>días en top</p>
															</div>
														</div>
													</div>
													
												</div>
												
												
											</div>
											
											
											
										</div><!-- main-div-popup -->
									</div><!-- col-md-6 -->
									
									
									
									<!-- right-div-start -->
									<div class="col-md-6">
										<div class="right-main-popup">
											<div class="girl-detais-div common-div">
												<h3>Carola (english spoken)  |  +5511987092599</h3>
												<div class="main-justify-div">
													<div class="justify-girl-detais"><h5> Edad  </h5> <span class="name2">30 años</span></div>
													<div class="justify-girl-detais"><h5>Nacionalidad</h5> <span class="name2">Italiana</span></div>
												</div>
												<div class="main-justify-div">
													<div class="justify-girl-detais"><h5>Localidad  </h5> <span class="name2">Madrid </span></div>
													<div class="justify-girl-detais"><h5>Estatura </h5> <span class="name2">1,70 cm</span></div>
												</div>
												<div class="main-justify-div">
													<div class="justify-girl-detais second-justi"><h5> Peso</h5> <span class="name2">56 Kg </span></div>
													<div class="justify-girl-detais second-justi"><h5>Pecho</h5> <span class="name2">Silicona</span></div>
												</div>
												<div class="main-justify-div">
													<div class="justify-girl-detais second-justi"><h5>Cabello</h5><<span class="name2">Morena</span></div>
													<div class="justify-girl-detais second-justi"><h5>Ojos</h5><<span class="name2">Verdes</span></div>
												</div>
												
												<div class="contact-link"><a href="#" class="btn btn-primary"><i class="fas fa-phone-alt"></i> <span>6007800</span></a>
													<a href="#" class="btn btn-success"><i class="fab fa-whatsapp"></i>   <span>whatsapp</span></a>
												</div>
												<div class="share-links">
													<a href="#"><i class="fas fa-share-alt"></i>  <span>Compartir</span></a>
													<a href="#"><i class="far fa-heart"></i>  <span>Favoritos</span></a>
													<a href="#"><i class="fas fa-bug"></i>  <span>Denunciar</span></a>
												</div>
											</div>  
											
											
											<div class="descreption common-div">
												<h4>description</h4>
												<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus imperdiet, nulla et dictum interdum, nisi lorem egestas vitae scel Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus imperdiet,adipiscing elit <span id="dots">...</span><span id="view-more">erisque enim ligula venenatis dolor. Maecenas nisl est, ultrices nec congue eget, auctor vitae massa. Fusce luctus vestibulum augue ut aliquet. Nunc sagittis dictum nisi, sed ullamcorper ipsum dignissim ac. In at libero sed nunc venenatis imperdiet sed ornare turpis. Donec vitae dui eget tellus gravida venenatis. Integer fringilla congue eros non fermentum. Sed dapibus pulvinar nibh tempor porta.</span> <a href="#" onclick="myFunction()" id="myBtn"> View more</a></p>
												
												
												
												
											</div>
											
											<div class="price-list common-div">
												<div class="price big">
													<h4>Tarifas</h4>
													<h6><span>1 Hora</span> <span>100 €</span></h6>
													<h6><span>2 Horas Taxi Incluido</span> <span>180 €</span></h6>
													<h6><span>3 Horas Taxi Incluido</span> <span>250 €</span></h6>
													<h6><span>Media Hora Taxi Incluido</span> <span>70 €</span></h6>
												</div>
											</div>
											
											<div class="price-list list common-div">
												<div class="price big">
													<h4>Horario</h4>
													<h6><span>Lunes a Domingo</span> <span>24 horas</span></h6>
													<h6><span>Lunes a Domingo</span> <span>24 horas</span></h6>
													<h6><span>Lunes a Domingo</span> <span>24 horas</span></h6>
												</div>
											</div>
											
											
											
										</div><!-- right-main-popup -->
									</div><!-- col-md-6 -->
									
									<div class="col-md-12">
										<div class="photos-left-div common-left" id="photos">
											<h4>photos</h4>
											<div class="images-div">
												<div class="phtos-img-grid"><img src="{{URL::asset('public/front/images/model02.jpg')}}" class="img-fluid btn2" alt="" onclick="openModal();currentSlide(1)" class="hover-shadow cursor">
													<div class="photo-selfie">
														<img src="{{URL::asset('public/front/images/selfred.png')}}" class="img-fluid" alt="">
													</div>
												</div>
												<div class="phtos-img-grid"><img src="{{URL::asset('public/front/images/model02.jpg')}}" class="img-fluid btn2" alt="" onclick="openModal();currentSlide(2)" class="hover-shadow cursor">
													<div class="photo-selfie">
														<img src="{{URL::asset('public/front/images/selfred.png')}}" class="img-fluid" alt="">
													</div></div>
													<div class="phtos-img-grid"><img src="{{URL::asset('public/front/images/model02.jpg')}}" class="img-fluid btn2" alt="" onclick="openModal();currentSlide(3)" class="hover-shadow cursor"></div>
													<div class="phtos-img-grid"><img src="{{URL::asset('public/front/images/model02.jpg')}}" class="img-fluid btn2" alt="" onclick="openModal();currentSlide(4)" class="hover-shadow cursor"></div>
													
											</div>
											<div class="images-div">
												<div class="phtos-img-grid"><img src="{{URL::asset('public/front/images/model02.jpg')}}" class="img-fluid" alt="" onclick="openModal();currentSlide(5)" class="hover-shadow cursor"></div>
												<div class="phtos-img-grid"><img src="{{URL::asset('public/front/images/model02.jpg')}}" class="img-fluid" alt="" onclick="openModal();currentSlide(6)" class="hover-shadow cursor"></div>
												<div class="phtos-img-grid"><img src="{{URL::asset('public/front/images/model02.jpg')}}" class="img-fluid" alt="" onclick="openModal();currentSlide(7)" class="hover-shadow cursor"></div>
												<div class="phtos-img-grid"><img src="{{URL::asset('public/front/images/model02.jpg')}}" class="img-fluid" alt="" onclick="openModal();currentSlide(8)" class="hover-shadow cursor"></div>
											</div>
										</div>
										
										
										<div class="photos-left-div common-left" > 
											<h4>video</h4>
											<div class="images-div">
												<div class="phtos-img-grid"><img src="{{URL::asset('public/front/images/model1video.png')}}" class="img-fluid" alt="">
													<div class="photo-selfie">
														<img src="{{URL::asset('public/front/images/selfred.png')}}" class="img-fluid" alt="">
													</div>
												</div>
												<div class="phtos-img-grid"><img src="{{URL::asset('public/front/images/model1video.png')}}" class="img-fluid" alt="">
													<div class="photo-selfie">
														<img src="{{URL::asset('public/front/images/selfred.png')}}" class="img-fluid" alt="">
													</div>
												</div>
												<div class="phtos-img-grid"><img src="{{URL::asset('public/front/images/model1video.png')}}" class="img-fluid" alt=""></div>
												<div class="phtos-img-grid"><img src="{{URL::asset('public/front/images/model1video.png')}}" class="img-fluid" alt=""></div>
											</div>
											
										</div>
									</div>
									
									<!-- services div-open -->
									<div class="col-md-6">
										<div class="Sobre-tags common-left">
											<h4> Sobre mi </h4>
											<span>Altas </span>
											<span>Agencia </span>
											<span> Atencion a parejas  </span>
											<span>Cachonda </span>
											<span> Depiladas </span>
											<span> Delgadas </span>
											<span>Independientes </span>
											<span> Morenas </span>
											<span> Pecho natural </span>
											<span> Rellenitas </span>
											<span>Rubias</span>
											<span>Pechos grandes</span>
											<span> Silicona </span>
											<span> Telefono</span>
											<span>  Squirting</span>
											<span>  Whatsapp </span>
										</div>
									</div>
									
									<div class="col-md-6">
										<div class="Sobre-tags common-left">
											<h4> Servicios  </h4>
											<span>Lésbico, Dúplex </span>
											<span>Masajes eróticos </span>
											<span> Striptease  </span>
											<span>Atención a parejas </span>
											<span> Despedidas de soltero </span>
											<span> Juegos eróticos </span>
											<span>Masajes final feliz </span>
											<span> Atención a mujeres </span>
											<span> Posturas, Lluvia Dorada </span>
											<span> Garganta profunda </span>
											<span> Eyaculación facial </span>
											<span> Consoladores</span>
											<span> Penetración </span>
											<span> Cubana</span>
											<span>  Squirting</span>
											<span>  Besos con lengua </span>
											<span>  Luvia dorada </span>
										</div>
									</div>
									
									
									
									
								</div><!-- modal-content -->
							</div><!-- modal-content -->
						</div><!-- row -->
					</div><!-- modal-dialog modal-xl container -->
				</div><!-- modal fade show -->
				
				
				<!-- image-model-zomm -->
				<div id="myModalimg" class="modal image-model fade show">
					<span class="close image-close">&times;</span>
					<img class="modal-content image" id="img01">
				</div>
				<!-- image-model-zomm close-->
				
				
				<!-- gallery slider -->
				<div id="myModal-gallery" class="modal modal-gallery">
					<span class="close cursor" onclick="closeModal()">&times;</span>
					<div class="modal-content">
						
						<div class="mySlides">
							<div class="numbertext">1 / 4</div>
							<img src="{{URL::asset('public/front/images/model02.jpg')}}">
						</div>
						<div class="mySlides">
							<div class="numbertext">1 / 2</div>
							<img src="{{URL::asset('public/front/images/model02.jpg')}}">
						</div>
						<div class="mySlides">
							<div class="numbertext">1 / 3</div>
							<img src="{{URL::asset('public/front/images/model02.jpg')}}">
						</div>
						<div class="mySlides">
							<div class="numbertext">1 / 4</div>
							<img src="{{URL::asset('public/front/images/model02.jpg')}}">
						</div>
						<div class="mySlides">
							<div class="numbertext">1 / 5</div>
							<img src="{{URL::asset('public/front/images/model02.jpg')}}">
						</div>
						<div class="mySlides">
							<div class="numbertext">1 / 6</div>
							<img src="{{URL::asset('public/front/images/model02.jpg')}}">
						</div>
						<div class="mySlides">
							<div class="numbertext">1 / 7</div>
							<img src="{{URL::asset('public/front/images/model02.jpg')}}">
						</div>
						<div class="mySlides">
							<div class="numbertext">1 / 8</div>
							<img src="{{URL::asset('public/front/images/model02.jpg')}}">
						</div>
						<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
						<a class="next" onclick="plusSlides(1)">&#10095;</a>
					</div>
				</div>
				
			</section>
<!-- register popup-->

<div class="modal fade" id="register-modal">
	  
					<div class="modal-dialog login container">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
						<div class="modal-content">
							<div class="row">
								<div class="col-md-12">
									<div class="popupheader">
										<h3>Publicar anuncio</h3>
										<p>Para publicar tu anuncio es necesario que te registres primero.</p>
									</div>
								</div>
							</div>
							
								<div class="row">
								
									<div class="col-md-6">
									<form  id="login-form"  method="post" action="javascript:void(0)">
									@csrf
										<div class="popup-form-div border-popup">
											<h4>Ya estoy registrada</h4>
											
											
											<div class="form-group">
												<input required name="email" type="email" class="form-control"  placeholder="Email">
											</div>
											<div class="form-group">
												<input required name="password" type="password" class="form-control"  placeholder="Contraseña">
											</div>
											<div class="custom-control custom-checkbox">
												<input  type="checkbox" class="custom-control-input" id="rimember" name="rimember">
												<label class="custom-control-label" for="rimember">Recuérdame</label>
												<a href="#" class="form-link">¿Has olvidado tu contraseña?</a>
											</div>
											<div class="alert alert-danger d-none" id="msg_div">
											<span id="res_message"></span>
											</div>
											<input id="send_form" type="submit" name="submit" class="btn btn-primary" value="Entrar en mi panel">
											
										</div>
										</form>
									</div>
									
									
									
									<div class="col-md-6">
									<form  id="register-form"  method="post" action="javascript:void(0)">
									@csrf
										<div class="popup-form-div">
											<h4>Quiero registrarme</h4>
											
											<p>Debes indicarnos un email y te enviaremos un enlace para
												validarlo. Este email no será público, sólo se usará para
											gestionar tus anuncios.</p>
											
											
											<div class="form-group right">
												<input required type="email" class="form-control" name="email"  placeholder="Email">
												 <span class="text-danger">{{ $errors->first('email') }}</span>
											</div>
											<input id="register-form"  method="post" action="javascript:void(0)" type="submit" name="submit" class="btn btn-primary" value="Entrar en mi panel">
											
										</div>
										</form>
									</div>
									
									
									
								</div>							
						</div>
					</div>
				</div>

<!-------escort-popup------>
<div class="modal fade escort-model" id="escrot">
    <div class="modal-dialog modal-lg">
      <div class="modal-content row">
        <!-- Modal Header -->
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        
        <div class="col-md-12 main-escort-div">
          <div class="row">
        <div class="col-md-6" style="border-right: 1px solid #fd2c94;">
          <div class="left-escort">
            <h4>Escort Independiente</h4>
            <p>Regístrese ahora gratis y cree su anuncio. edite su perfil en cualquier momento.</p>
            <span>¿A qué esperas para anunciarte?</span>
            <button class="btn btn-danger register_modal" >+ info</butto>
          </div>
        </div>
         <div class="col-md-6">
          <div class="left-escort">
            <h4>Agencia de Escorts</h4>
            <p>Regístrese ahora gratis y puede editar y actualizar el paquete en cualquier momento.</p>
            <span class="right-span">¿Te podemos ayudar?</span>
            <a href="{{ action('AgencyController@plan_agencia')}}" class="btn btn-primary">+ info</a>
          </div>
        </div>
        </div>
      </div>
        
        
      </div>
    </div>
  </div><!-- escrot model-->				
@endsection