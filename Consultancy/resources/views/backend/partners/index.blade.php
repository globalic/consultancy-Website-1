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
                        <h1>Partners</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="#">Parteners</a></li>
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
                                            <th>SN</th>
                                            <th>Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                     @foreach($partners as $count => $key)
                                        <tr>
                                            <td>{{++$count}}</td>
                                            <td>{{$key->name}}</td>
                                            <td>
                                                <table>
                                                    <tr>
                                                        <th>
                                                            <a href="{{route('parteners.edit',$key->id)}}">
                                                                <input type="submit" class="btn btn-default btn-xs" value ="edit">
                                                            </a>
                                                        </th>
                                                        <th>
                                                     <form method="POST" action="{{route('parteners.destroy',$key->id)}}" onclick="return confirm('Are you sure?')">
                                                            {{ csrf_field() }}
                                                         {{ method_field('DELETE') }}
                                                 <div class="form-group">
                                                   <input type="submit" class="btn btn-warning btn-xs delete-slider" value="Delete">
                                                 </div>
                                                  </form>
                                                      </th>
                                                     </tr>
                                                </table>
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

