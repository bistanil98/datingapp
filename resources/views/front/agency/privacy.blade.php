@extends('front.layouts.agencia')

@section('content')
<div class="page">
			<div class="page-main page-faq">
			
				<!-- CONTAINER -->
				<div class="container content-area relative">

				    <!-- PAGE-HEADER -->
					<div class="page-header">
						<h4 class="page-title">Privacy policy</h4>
					<?php /*	<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="#">Pages</a></li>
							<li class="breadcrumb-item active" aria-current="page">faq</li>
						</ol>
					*/?>
					</div>
					<!-- PAGE-HEADER END -->

					<!-- ROW-1 OPEN -->
				<div class="row from-div">
						<div class="col-md-12">
							<div class="privacy-main-div">
								<?php echo $tearms->tearms;?>

							</div>



						</div>
					</div>


					<!-- row-close -->
				<!-- CONTAINER CLOSED -->
			</div>

		
		</div>
		</div>
@endsection