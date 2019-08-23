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
                        <h1>Edit News</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="#">News & Updates</a></li>
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
                         <form action="{{route('NewsUpdates.update',$news->id)}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                                             {{csrf_field()}}
                                                  {{method_field('PUT')}}
                                                            <div class="row form-group">
                                                                <div class="col col-md-3"><label for="text-input" class=" form-control-label" >Title</label></div>
                                                                <div class="col-12 col-md-9"><input type="text" id="text-input" name="title" placeholder="Our Service title" class="form-control" value="{{$news->title}}" required></div>
                                                            </div>
                                                            <div class="row form-group">
                                                                <div class="col col-md-3"><label for="text-input" class=" form-control-label" >Author Name</label></div>
                                                                <div class="col-12 col-md-9"><input type="text" id="text-input" name="author_name" placeholder="Author Name" class="form-control" value="{{$news->author_name}}" required></div>
                                                            </div>
                                                            <div class="mx-auto d-block">
                                                          <!-- <img src="img_girl.jpg" alt="Girl in a jacket" width="500" height="600"> -->
                                                              <img class="mx-auto d-block" src="{{url('/images/NewsUpdates/News_updates_image'.'/'.$news->image) }}" width="300" height="150" alt="Card image cap">
                                                            </div>
                                                                <div class="row form-group">
                                                                    <div class="col col-md-3"><label for="file-input" class=" form-control-label" >Featured Image</label></div>
                                                                    <div class="col-12 col-md-9"><input type="file" id="file-input" name="image" class="form-control-file"></div>
                                                                    <input type="text" id="file-input" name="prev_image" value="{{$news->image}}" class="form-control-file" hidden>
                                                                    <input type="text" id="file-input" name="prev_icon" value="{{$news->author_image}}" class="form-control-file" hidden>
                                                                    <input type="text" id="file-input" name="id" value="{{$news->id}}" class="form-control-file" hidden>
                                                                </div>
                                                                <div class="mx-auto d-block">
                                                          <!-- <img src="img_girl.jpg" alt="Girl in a jacket" width="500" height="600"> -->
                                                              <img class="mx-auto d-block" src="{{url('/images/NewsUpdates/News_updates_author'.'/'.$news->author_image) }}" width="50" height="50" alt="Card image cap">
                                                            </div>
                                                                <div class="row form-group">
                                                                    <div class="col col-md-3"><label for="file-input" class=" form-control-label" >Author Image</label></div>
                                                                    <div class="col-12 col-md-9"><input type="file" id="file-input" name="author_image" class="form-control-file"></div>
                                                        
                                                                </div>
                                                                <div class="row form-group">
                                                                <div class="col col-md-3"><label for="textarea-input" class=" form-control-label" required>Short Description</label></div>
                                                                <div class="col-12 col-md-9"><textarea name="short_description" id="textarea-input" rows="2" placeholder="Summary Of Service You Provide" class="form-control" required>{{$news->short_description}}</textarea></div>
                                                           </div>
                                                               
                                                            <div class="row form-group">
                                                                <div class="col col-md-3"><label for="textarea-input" class=" form-control-label" required>Description</label></div>
                                                                <div class="col-12 col-md-9"><textarea name="description" id="description" rows="9" placeholder="Detailed Description about Service you Provide" class="form-control" required>{{$news->description}}</textarea></div>
                                                                <input type="text" id="file-input" name="prev_image" value="{{$news->image}}" class="form-control-file" hidden>
                                                                <input type="text" id="file-input" name="prev_author_image" value="{{$news->author_image}}" class="form-control-file" hidden>
                                                                    <input type="text" id="file-input" name="id" value="{{$news->id}}" class="form-control-file" hidden>
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
