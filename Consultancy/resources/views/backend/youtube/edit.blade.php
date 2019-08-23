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
                        <h1>Add Youtube</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="#">Youtube</a></li>
                            <li><a href="#">Edit</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
       <!-- .content -->
       @if ($errors->any())
                 @foreach ($errors->all() as $error)
                 <div class="col-sm-12">
                <div class="alert  alert-success alert-dismissible fade show" role="alert">
                    <span class="badge badge-pill badge-success"></span>{{$error}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
            @endforeach
        @endif
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
                                             <form action="{{route('Youtube.update',$youtube->id)}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                                             {{csrf_field()}}
                                                  {{ method_field('PUT') }}
                                                  <div class="row form-group">
                                                            <div class="col col-md-3"><label for="text-input" class=" form-control-label" >Title</label></div>
                                                                <div class="col-12 col-md-9"><input type="text" id="text-input" name="title" placeholder="Post title" value ="{{$youtube->title}}" class="form-control" required><small class="form-text text-muted"></small></div>
                                                            </div>
                                                            <div class="row form-group">
                                                                <div class="col col-md-3"><label for="textarea-input" class=" form-control-label" required></label></div>
                                                                <div class="col-12 col-md-9"> <iframe style="width:100%;" height="340" src="https://www.youtube.com/embed/{{$youtube->iframe}}" frameborder="0" allowfullscreen></iframe></div>
                                                           </div>
                                                            <div class="row form-group">
                                                                <div class="col col-md-3"><label for="textarea-input" class=" form-control-label" required>Youtube Key</label></div>
                                                                <div class="col-12 col-md-9"><input type="text" name="iframe" id="iframe"  placeholder="Insert youtube key here" class="form-control"  value="{{$youtube->iframe}}" required></div>
                                                           </div>
                                                            <div class="row form-group">
                                                                <div class="col col-md-3"><label for="textarea-input" class=" form-control-label" required> short Description</label></div>
                                                                <div class="col-12 col-md-9"><textarea name="short_description" id="short_description" rows="2" placeholder="Description about Post in summary" class="form-control" required>{{$youtube->short_description}}</textarea></div>
                                                           </div> 
                                                            <div class="row form-group">
                                                                <div class="col col-md-3"><label for="textarea-input" class=" form-control-label" required>Description</label></div>
                                                                <div class="col-12 col-md-9"><textarea name="description" id="description" rows="9" placeholder="Description about Post in detail" class="form-control" required>{{$youtube->description}}</textarea></div>
                                                                <input type="text" id="file-input" name="id" value="{{$youtube->id}}" class="form-control-file" hidden>
                                                           </div>
                                                                <div class="card-footer">
                                                                  <button type="submit" class="btn btn-secondary">Submit</button>
                                                                </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
    </div>
@endsection
@section('js')
<script src="{{url('vendor/unisharp/laravel-ckeditor/ckeditor.js')}}"></script>
<script>
    CKEDITOR.replace( 'description' );
</script>
@endsection
