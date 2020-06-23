<!DOCTYPE html>
<html lang="en">
<head>
<title>Escort Listing / Agency Dashboard Control</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="{{URL::asset('public/front/css/bootstrap.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{URL::asset('public/front/css/style-lightpink3.css')}}">
<link rel="stylesheet" type="text/css" href="{{URL::asset('public/front/css/responsive.css')}}">
<link rel="stylesheet" type="text/css" href="{{URL::asset('public/front/fontawesome/css/all.min.css')}}">

</head>

<body>
<header>
<nav class="navbar navbar-expand-lg  bg-light navbar-light listing-bar">
<div class="container-fluid">
<!-- Brand -->
<a class="navbar-brand" href="{{url('/')}}"><!-- <img src="assets/images/header-logo.png" class="img-fluid" alt=""> -->Escort Listing</a>

<div class="dasbuttons">
<a href="#" class="btn btn-success">FAQ</a>
<a href="#" class="btn btn-success">Contraseña</a>
<a href="#" class="btn btn-success">Contactar</a>
</div>

<div class="icon-div alta-list">
<a href="#"><i class="fas fa-list"></i></a>
</div>

</div>
</nav>
</header>

<section class="listing-panel-sec">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="listing-div">
          <div class="row">
            <div class="col-md-12">
              <div class="listing-heading">
                <h2 style="text-align:left">PEFIL DE AGENCIA</h2>
              </div>
            </div>

             <div class="col-md-3">
              <a href="alta-anuncio.html">
              <div class="listing-icon-text icon-2">
                <!-- <i class="fas fa-meteor"></i> --><span class="icon-font" style="font-size:20px">CREAR ANUNCIOS</span>
              </div>
               </a>
            </div>
             <div class="col-md-3">
              <a href="#">
              <div class="listing-icon-text icon-3">
                <!-- <i class="fas fa-bullhorn"></i> --> <span style="font-size:20px">ANUNCIOS CREADOS</span>
              </div>
              </a>
            </div>
             <div class="col-md-3">
              <a href="#">
              <div class="listing-icon-text icon-1">
                <!-- <i class="fas fa-sync"></i> --> <span style="font-size:20px"> AUNCIOS ACTIVOS</span>
              </div>
              </a>
            </div>
            <div class="col-md-3">
                <a href="#">
              <div class="listing-icon-text icon-2">
                <!-- <i class="fas fa-list"></i> --> <span style="font-size:20px">TOP ANUNCIOS</span>
              </div>
                </a>
            </div>

			<div class="col-md-3">
                <a href="#">
              <div class="listing-icon-text icon-3">
                <!-- <i class="fas fa-list"></i> --> <span style="font-size:20px">AUTO SUBIDAS</span>
              </div>
                </a>
            </div>

			<div class="col-md-3">
                <a href="#">
              <div class="listing-icon-text icon-1">
                <!-- <i class="fas fa-list"></i> --> <span style="font-size:20px">CONSUMO</span>
              </div>
                </a>
            </div>

			<div class="col-md-3">
                <a href="#">
              <div class="listing-icon-text icon-2">
                <!-- <i class="fas fa-list"></i> --> <span style="font-size:20px">Facturacion</span>
              </div>
                </a>
            </div>

			<div class="col-md-3">
                <a href="#">
              <div class="listing-icon-text icon-3">
                <!-- <i class="fas fa-list"></i> --> <span style="font-size:20px">DATOS DE AGENCIA</span>
              </div>
                </a>
            </div>     
          
		  </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <div class="row">
          <div class="col-md-3 m-auto d-block">
            <div class="listing-center-text">
              <p>Truvalia Global Classifieds OOD
Iskar 4, 1000 Sofia, Bulgaria</p>
            </div>
          </div>
        </div>
      </div>


    </div>

  </div>
</section>













	<script type="text/javascript" src="{{URL::asset('public/front/js/jquery.min.js')}}"></script>
		<script type="text/javascript" src="{{URL::asset('public/front/js/popper.min.js')}}"></script>
		<script type="text/javascript" src="{{URL::asset('public/front/js/bootstrap.min.js')}}"></script>
<!-- <script type="text/javascript" src="assets/js/masonry.pkgd.min.js"></script>
<script type="text/javascript">
	$('.grid').masonry({
  // options...
  itemSelector: '.grid-item',
  columnWidth: 200
});
</script> -->
</body>
</html>