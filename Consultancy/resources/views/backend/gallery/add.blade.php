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
                        <h1>Gallery</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="#">Gallery</a></li>
                            <li><a href="#">Create</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        @if ($errors->any())
          <div class="alert alert-danger">
              <ul>
                 @foreach ($errors->all() as $error)
                   <li>{{ $error }}</li>
                  @endforeach
               </ul>
           </div>
          @endif
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
                                             <form action="{{route('gallery.store')}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                                                           @csrf
                                                            <div class="row form-group">
                                                                <div class="col col-md-3"><label for="text-input" class=" form-control-label" >Title</label></div>
                                                                <div class="col-12 col-md-9"><input type="text" id="text-input" name="title" placeholder="Image Title" class="form-control"><small class="form-text text-muted"></small></div>
                                                            </div>
                                                            @if ($errors->has('title'))
                                                              <span class="invalid-feedback" role="alert">
                                                                   <strong>{{ $errors->first('title') }}</strong>
                                                              </span>
                                                            @endif
                                                            <div class="row form-group">
                                                                    <div class="col col-md-3"><label for="file-input" class=" form-control-label" >Slider Image</label></div>
                                                                    <div class="col-12 col-md-9"><input type="file" id="file-input" name="image" class="form-control-file" required></div>
                                                                </div>
                                                         
                                                            <div class="row form-group">
                                                                <div class="col col-md-3"><label for="textarea-input" class=" form-control-label" required>Description</label></div>
                                                                <div class="col-12 col-md-9"><textarea name="description" id="short_description" rows="9" placeholder="Description about Image" class="form-control"></textarea></div>
                                                           </div>
                                                           @if ($errors->has('descripton'))
                                                              <span class="invalid-feedback" role="alert">
                                                                   <strong>{{ $errors->first('description') }}</strong>
                                                              </span>
                                                            @endif
                                                               
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

