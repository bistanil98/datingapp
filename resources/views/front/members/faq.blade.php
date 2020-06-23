@extends('front.layouts.agencia')

@section('content')
<div class="page">
			<div class="page-main page-faq">
				<!-- HEADER -->
		
				<!-- HEADER END -->

				
				

				<!-- CONTAINER -->
				<div class="container content-area relative">

				    <!-- PAGE-HEADER -->
					<div class="page-header">
						<h4 class="page-title">Faq</h4>
					<?php /*	<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="#">Pages</a></li>
							<li class="breadcrumb-item active" aria-current="page">faq</li>
						</ol>
					*/?>
					</div>
					<!-- PAGE-HEADER END -->

					<!-- ROW-1 OPEN -->
					
					<!-- ROW-1 CLOSED -->
				</div>
				<!-- CONTAINER CLOSED -->
				<div class="container">
    <div id="accordion" class="accordion">
        <div class="card mb-0">
		<?php $i = 0; foreach($faq as $data){?>
            <div class="card-header collapsed" data-toggle="collapse" href="#collapse{{$i}}">
                <a class="card-title"><?php echo $data->question;?></a>
            </div>
            <div id="collapse{{$i++}}" class="card-body collapse" data-parent="#accordion">
                <p><?php echo $data->answer;?></p>
            </div> 
		<?php $i++;} ?>
           
        </div>
    </div>
</div>
			</div>
@endsection