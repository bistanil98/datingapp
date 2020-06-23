@extends('admin.layouts.frontlayout')
@section('content')
	<!-- Page Heading -->
	@if (Session::has('message'))
	<span class="alert-id-m" id="sa-close" >{!! session('message') !!}</span>
	@endif 
	
  <div class="page-wrapper">
           
            <div class="container-fluid">
              
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h4 class="text-themecolor">Members</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('/admin/home') }}">Home</a></li>
                                <li class="breadcrumb-item active">Members</li>
                            </ol>
							<a href="{{ url('/admin/members/add') }}" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> Add New</a>                            
                        </div>
                    </div>
                </div>
               
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                               
                                <div class="table-responsive">
                                    <table id="myTable" class="table table-striped">
                                        <thead>
                                            <tr>                                                
												<th>S.No</th>
												<th>Name</th>                      
												<th>Status</th>
												<th>Action</th>
                                            </tr>
                                        </thead>
										 <tbody>
				  <?php $i=1; ?> 
				  @foreach($members as $data)
                    <tr>
						<td>{{ $i++ }}</td>
						<td>{{ $data->name }}</td>																		
						<td><?php 
						if($data->status==1){	?>
						<i data-toggle="tooltip" data-original-title="Active"  class="btn btn-xs btn-outline-success fa fa-check"></i>
						<?php }else{?>
						<i  data-toggle="tooltip" data-original-title="Deactive"   class="btn btn-xs btn-outline-info fa-times"></i>
						<?php } ?>
						</td>
						<td>
						<a  data-toggle="tooltip" data-original-title="Edit" class="btn waves-effect waves-light btn-xs btn-info" href="{{url('/admin/members/edit/')}}/{{$data->id}}" ><i class="fa fa-pencil"></i></a>							
						<a  data-id="{{$data->id}}"  data-location="members"    href="#" data-toggle="tooltip" data-original-title="Delete" class="btn waves-effect waves-light btn-xs btn-info sa-params"  ><i class="fa fa-trash"></i></a>
						
						<a      data-toggle="tooltip" data-original-title="Registration" class="btn waves-effect waves-light btn-xs btn-info"  href="{{url('/admin/members/registration/')}}/{{$data->id}}" >Registration</a>
						</td>
                    </tr>

					@endforeach
                  </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
              
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
        </div>      
@endsection       