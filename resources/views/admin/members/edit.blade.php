@extends('admin.layouts.frontlayout')
@section('content')
  <div class="page-wrapper">
           
            <div class="container-fluid">
              
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h4 class="text-themecolor">Add Members</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('/admin/home') }}">Home</a></li>
                                <li class="breadcrumb-item"><a href="{{ url('/admin/province') }}">Members</a></li>
                                <li class="breadcrumb-item active">Add</li>
                            </ol>
							<a href="{{ url('/admin/members') }}" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-arrow-left"></i> Back</a>                            
                        </div>
                    </div>
                </div>
               
                  <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                
                                <form  action="{{url('/admin/members/edit/')}}/{{$members->id}}" enctype="multipart/form-data" method="post" class="form-material m-t-40">
								@csrf
                                    <div class="form-group">
                                        <div class="row">
                                            <label class="col-md-12" for="example-text">Name</span>
                                            </label>
                                            <div class="col-md-12">
											<input value="{{$members->name}}" type="text" name="name" class="form-control">
											@if ($errors->has('name'))
											<div class="error">{{ $errors->first('name') }}</div>
											@endif
											
                                            </div>
                                        </div>
                                    </div>
                                  
                                    <button type="submit" class="btn btn-info waves-effect waves-light m-r-10">Submit</button>
                                    
                                </form>
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