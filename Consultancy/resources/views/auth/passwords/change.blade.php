@extends('layouts.backend')
@section('contents')
<!-- /#left-panel -->
    @include('includes.backend.sidepannel')
    <!-- Left Panel -->
    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">
        <!-- Header-->
        @include('includes.backend.header')
        <!-- Header-->
        <div class="breadcrumbs">
            <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Change Password</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="#">Change Password</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
       <!-- .content -->
       @if(session('success'))
       <div class="col-sm-12">
                <div class="alert  alert-success alert-dismissible fade show" role="alert">
                    <span class="badge badge-pill badge-success">Success</span> {{session('success')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        @endif
        @if(session('error'))
        <div class="col-sm-12">
                <div class="alert  alert-success alert-dismissible fade show" role="alert">
                    <span class="badge badge-pill badge-success">OOps !!</span> {{session('error')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        @endif
        <div class="col-lg-12">
                                         <div class="card">
                                                    <div class="card-header">
                                                        <strong>General Informations</strong>
                                                    </div>
                                                    <div class="card-body card-block">
                                                        <form action="{{route('changepassword-save',$user->id)}}" method="post"  enctype="multipart/form-data" class="form-horizontal">
                                                            @csrf
                                                                <div class="row form-group">
                                                                    <div class="col col-md-12">
                                                                        <div class="input-group">
                                                                           <div class="input-group-addon"><i class="fa fa-key"></i></div>
                                                                            <input type="password" id="input2-group1" name="current_password"  placeholder="Current Password" class="form-control" required>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row form-group">
                                                                    <div class="col col-md-12">
                                                                        <div class="input-group">
                                                                           <div class="input-group-addon"><i class="fa fa-key"></i></div>
                                                                            <input type="password" id="input2-group1" name="new_password"  placeholder="New Password" class="form-control" required>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row form-group">
                                                                    <div class="col col-md-12">
                                                                        <div class="input-group">
                                                                           <div class="input-group-addon"><i class="fa fa-key"></i></div>
                                                                            <input type="password" id="input2-group1" name="confirm_password"  placeholder="Confirm Password" class="form-control" required>
                                                                        </div>
                                                                    </div>
                                                                </div>
     
                                                                <div class="card-footer">
                                                                  <button type="submit" class="btn btn-secondary">Submit</button>
                                                                </div>
                                                            </form>                                              
</div>
@endsection
@section('js')
<script src="{{url('vendor/unisharp/laravel-ckeditor/ckeditor.js')}}"></script>
<script>
    CKEDITOR.replace( 'description' );
</script>
@endsection

