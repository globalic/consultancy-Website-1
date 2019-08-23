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
                        <h1>Dashboard</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Dashboard</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-md-12">
                    @if(count($mails))
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Unread Mails</strong>
                            </div>
                            <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>SN</th>
                                            <th>Title</th>
                                            <th>Subject</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                     @foreach($mails as $count=>$key)
                                        <tr>
                                            <td>{{++$count}}</td>
                                            <td>{{$key->name}}</td>
                                            <td>{{$key->subject}}</td>
                                            <td>
                                                <table>
                                                    <tr>
                                                        <th>
                                                            <a href="{{route('mails.show',$key->id)}}">
                                                            <input type="submit" class="btn btn-outline-success" value ="view">
                                                            </a>
                                                        </th>
                                                        <th>
                                                        <form method="POST" action="{{route('mails.destroy',$key->id)}}" onclick="return confirm('Are you sure?')">
                                                             {{ csrf_field() }}
                                                             {{ method_field('DELETE') }}
                                                               <div class="form-group">
                                                               <input type="submit" class="btn btn-outline-success" value ="Delete">
                                                               </div>
                                                            </form>
                                                          
                                                        </th>
                                                     </tr> 
                                              </table>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>  
                            </div>
                        </div>
                        @endif
                        @if(count($reviews))
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Inactive Review</strong>
                            </div>
                            <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>SN</th>
                                            <th>Title</th>
                                            <th>Description</th>
                                            <th>Action</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                     @foreach($reviews as $count=>$key)
                                        <tr>
                                            <td>{{++$count}}</td>
                                            <td>{{$key->user_name}}</td>
                                            <td>{{$key->description}}</td>
                                            <td>
                                                <table>
                                                    <tr>
                                                        <th>
                                                            <a href="{{route('ClientReview.show',$key->id)}}">
                                                            <input type="submit" class="btn btn-outline-success" value ="view">
                                                            </a>
                                                        </th>
                                                        <th>
                                                        <form method="POST" action="{{route('ClientReview.destroy',$key->id)}}" onclick="return confirm('Are you sure?')">
                                                             {{ csrf_field() }}
                                                             {{ method_field('DELETE') }}
                                                               <div class="form-group">
                                                               <input type="submit" class="btn btn-outline-success" value ="Delete">
                                                               </div>
                                                            </form>
                                                          
                                                        </th>
                                                     </tr> 
                                                    </table>
                                                    @if($key->status== 1)
                                                         <td>
                                                         <form method="POST" action="{{route('review.status',$key->id)}}" onclick="return confirm('Are you sure?')">
                                                             {{ csrf_field() }}
                                                               <div class="form-group">
                                                               <input type="submit" class="btn btn-outline-success" value ="Active">
                                                               </div>
                                                            </form>
                                                      </td>
                                                      @else  
                                                      <td>
                                                         <form method="POST" action="{{route('review.status',$key->id)}}" onclick="return confirm('Are you sure?')">
                                                             {{ csrf_field() }}
                                                               <div class="form-group">
                                                               <input type="submit" class="btn btn-outline-success" value ="Inactive">
                                                               </div>
                                                            </form>
                                                      </td>
                                                      @endif
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                                
                            </div>
                           
                        </div>
                        @endif
                    </div>
                </div>
            </div><!-- .animated -->
        </div><!-- .content -->
       <!-- .content -->
    </div><!-- /#right-panel -->
@endsection

