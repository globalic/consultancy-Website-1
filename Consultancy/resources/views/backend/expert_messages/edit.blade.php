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
                        <h1>Expert Message</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="#">Expert message</a></li>
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
                                             <form action="{{route('expert-messages.update',$message->id)}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                                             {{csrf_field()}}
                                                  {{ method_field('PUT') }}
                                                            <div class="row form-group">
                                                                <div class="col col-md-3"><label for="text-input" class=" form-control-label" >Title</label></div>
                                                                <div class="col-12 col-md-9"><input type="text" id="text-input" name="title" placeholder="Title of Message" value="{{$message->title}}" class="form-control" required></div>
                                                            </div>
                                                            <div class="row form-group">
                                                            <div class="col col-md-3"><label for="text-input" class=" form-control-label" >Select Expert</label></div>
                                                            <div class="col-12 col-md-9"> <select  name="expert_id"  class="standardSelect" tabindex="1">
                                                                 <option value="{{$message->expert->id}}">{{$message->expert->name}}</option>
                                                                 @foreach($experts as $key )
                                                                  <option value="{{$key->id}}">{{$key->name}}</option>
                                                                  @endforeach
                                                               </select>
                                                            </div>
                                                            </div>
                                                            <div class="row form-group">
                                                                <div class="col col-md-3"><label for="textarea-input" class=" form-control-label" required>Message</label></div>
                                                                <div class="col-12 col-md-9"><textarea name="message" id="textarea-input" rows="9" placeholder="body of the message" class="form-control"  required>{{$message->message}}</textarea></div>
                                                           </div>
                                                           <div class="row form-group">
                                                                <div class="col col-md-3"><label for="textarea-input" class=" form-control-label" required>Rank</label></div>
                                                                <div class="col-12 col-md-9"><input name="rank" type="text" id="textarea-input" rows="9" placeholder="Message ranking Order" class="form-control" value="{{$message->rank}}" required></textarea></div>
                                                                <input type="text" id="file-input" name="id" value="{{$message->id}}" class="form-control-file" hidden>

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

