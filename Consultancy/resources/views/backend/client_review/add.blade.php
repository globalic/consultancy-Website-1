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
                        <h1>Client Review</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="#">Client Review</a></li>
                            <li><a href="#">Create</a></li>
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
                         <div class="card-body card-block">
                                             <form action="{{route('ClientReview.store')}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                                                           @csrf
                                                            <div class="row form-group">
                                                                <div class="col col-md-3"><label for="text-input" class=" form-control-label" >User Name</label></div>
                                                                <div class="col-12 col-md-9"><input type="text" id="text-input" name="user_name" placeholder="Slider Title" class="form-control" required><small class="form-text text-muted">Title of slider</small></div>
                                                            </div>
                                                            <div class="row form-group">
                                                                    <div class="col col-md-3"><label for="file-input" class=" form-control-label" >User Image</label></div>
                                                                    <div class="col-12 col-md-9"><input type="file" id="file-input" name="image" class="form-control-file" required></div>
                                                                </div>
                                                         
                                                            <div class="row form-group">
                                                                <div class="col col-md-3"><label for="textarea-input" class=" form-control-label" required>Review</label></div>
                                                                <div class="col-12 col-md-9"><textarea name="description" id="textarea-input" rows="9" placeholder="Description about Slider" class="form-control" required></textarea></div>
                                                           </div>
                                                                <div class="card-footer">
                                                                  <button type="submit" class="btn btn-secondary">Submit</button>
                                                                </div>
                                                        </form>
                                                    </div>
                                                    
                                                </div>
        </div>
      <!-- .content -->
    </div><!-- /#right-panel -->
@endsection

