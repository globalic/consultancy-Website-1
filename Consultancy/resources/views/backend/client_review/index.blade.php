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
                        </ol>
                    </div>
                </div>
            </div>
        </div>
       <!-- .content -->
       <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-md-12">
                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Description</th>
                                            <th>Action</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                     @foreach($reviews as $review)
                                        <tr>
                                            <td>{{$review->user_name}}</td>
                                            <td>{{$review->description}}</td>
                                            <td>
                                                <table>
                                                    <tr>
                                                        <th>
                                                            <a href="{{route('ClientReview.show',$review->id)}}">
                                                                <input type="submit" class="btn btn-default btn-xs" value ="view">
                                                            </a>
                                                        </th>
                                                        <th>
                                                          <form method="POST" action="{{route('ClientReview.destroy',$review->id)}}" onclick="return confirm('Are you sure?')">
                                                             {{ csrf_field() }}
                                                              {{ method_field('DELETE') }}
                                                               <div class="form-group">
                                                                 <input type="submit" class="btn btn-warning btn-xs delete-slider" value="Delete">
                                                               </div>
                                                            </form>
                                                        </th>
                                                     </tr> 
                                                    </table>
                                                    @if($review->status== 1)
                                                         <td>
                                                         <form method="POST" action="{{route('review.status',$review->id)}}" onclick="return confirm('Are you sure?')">
                                                             {{ csrf_field() }}
                                                               <div class="form-group">
                                                               <input type="submit" class="btn btn-outline-success" value ="Active">
                                                               </div>
                                                            </form>
                                                      </td>
                                                      @else  
                                                      <td>
                                                         <form method="POST" action="{{route('review.status',$review->id)}}" onclick="return confirm('Are you sure?')">
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
            </div><!-- .animated -->
        </div><!-- .content -->
    </div><!-- /#right-panel -->
    <script>
    $('.delete-slider').click(function(e){
        e.preventDefault() // Don't post the form, unless confirmed
        if (confirm('Are you sure?')) {
            // Post the form
            $(e.target).closest('form').submit() // Post the surrounding form
        }
    });
</script>
@endsection

