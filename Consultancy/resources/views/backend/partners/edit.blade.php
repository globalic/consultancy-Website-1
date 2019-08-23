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
                        <h1>Edit Partners</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="#">Partners</a></li>
                            <li><a href="#">Edit</a></li>
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
                                             <form action="{{route('parteners.update',$partners->id)}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                                             {{csrf_field()}}
                                                  {{ method_field('PUT') }}
                                                  <div class="row form-group">
                                                                <div class="col col-md-3"><label for="text-input" class=" form-control-label" >Name</label></div>
                                                                <div class="col-12 col-md-9"><input type="text" id="text-input" name="name" placeholder="Expert Name" value ="{{$partners->name}}" class="form-control"><small class="form-text text-muted"  ></small></div>
                                                            </div>
                                                            @if ($errors->has('name'))
                                                              <span class="invalid-feedback" role="alert">
                                                                   <strong>{{ $errors->first('name') }}</strong>
                                                              </span>
                                                            @endif
                                                                <div class="row form-group">
                                                                <div class="col col-md-3"><label for="text-input" class=" form-control-label" >Link</label></div>
                                                                <div class="col-12 col-md-9"><input type="text" id="text-input" name="link" placeholder="Expert Position" value ="{{$partners->link}}" class="form-control"><small class="form-text text-muted"  ></small></div>
                                                            </div>
                                                            @if ($errors->has('link'))
                                                              <span class="invalid-feedback" role="alert">
                                                                   <strong>{{ $errors->first('link') }}</strong>
                                                              </span>
                                                              @endif
                                                              <div class="row form-group">
                                                                    <div class="col col-md-3"><label for="file-input" class=" form-control-label" >Image</label></div>
                                                                    <div class="col-12 col-md-9"><input type="file" id="file-input" name="image" class="form-control-file" ></div>
                                                                </div>
                                                                <div class="mx-auto d-block">
                                                            <img class="mx-auto d-block" src="{{url('/images/Partners'.'/'.$partners->logo) }}" width="300" height="150" alt="Card image cap">
                                                            <input type="text" id="file-input" name="prev_image" value="{{$partners->logo}}" class="form-control-file" hidden>
                                                            <input type="text" id="file-input" name="id" value="{{$partners->id}}" class="form-control-file" hidden>
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
@section('js')
<script src="{{url('vendor/unisharp/laravel-ckeditor/ckeditor.js')}}"></script>
<script>
    CKEDITOR.replace( 'description' );
</script>
@endsection
