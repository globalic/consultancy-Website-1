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
                        <h1>Settings</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="#">Settings</a></li>
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
                                                    @if( empty($website))
                                                        <form action="{{route('settings.store')}}" method="post"  enctype="multipart/form-data" class="form-horizontal">
                                                            @csrf
                                                            <div class="row form-group">
                                                                    <div class="col col-md-12">
                                                                        <div class="input-group">
                                                                           <div class="input-group-addon"><i class="fas fa-address-card"></i></div>
                                                                            <input type="text" id="input2-group1" name="name"  placeholder=" Company Email" class="form-control" required>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row form-group">
                                                                    <div class="col col-md-12">
                                                                        <div class="input-group">
                                                                           <div class="input-group-addon"><i class="fa fa-envelope-o"></i></div>
                                                                            <input type="email" id="input2-group1" name="email"  placeholder=" Company Email" class="form-control" required>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row form-group">
                                                                    <div class="col col-md-12">
                                                                        <div class="input-group">
                                                                            <div class="input-group-addon"><i class="fa fa-map-marker"></i></div>
                                                                            <input type="text" id="input2-group1" name="address" placeholder="Company Address"   class="form-control" required>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row form-group">
                                                                    <div class="col col-md-12">
                                                                        <div class="input-group">
                                                                          <div class="input-group-addon"><i class="fa fa-facebook"></i></div>
                                                                            <input type="text" id="input2-group1" name="fb_link" placeholder="Company facebook page link"  class="form-control" required>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row form-group">
                                                                    <div class="col col-md-12">
                                                                        <div class="input-group">
                                                                         <div class="input-group-addon"><i class="fa fa-phone"></i></div>
                                                                            <input type="text" id="input2-group1" name="phone" placeholder="Contact Number"  class="form-control" required>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row form-group">
                                                                    <div class="col col-md-12">
                                                                        <div class="input-group">
                                                                         <div class="input-group-addon"><i class="fa fa-phone"></i></div>
                                                                            <input type="text" id="input2-group1" name="google_plus" placeholder="Insert Google iframe link here" class="form-control" required>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row form-group">
                                                                    <div class="col col-md-12">
                                                                        <div class="input-group">
                                                                         <div class="input-group-addon"><i class="fa fa-image"></i></div>
                                                                            <input type="file" id="input2-group1" name="image" placeholder="Company Logo"  class="form-control" required>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="card-footer">
                                                                  <button type="submit" class="btn btn-secondary">Submit</button>
                                                                </div>
                                                            </form>
                                                         @else
                                                            <form action="{{route('settings.update',$website->id)}}"  enctype="multipart/form-data" method="post" class="form-horizontal">
                                                            {{csrf_field()}}
                                                  {{method_field('PUT')}}
                                                  <div class="row form-group">
                                                                    <div class="col col-md-12">
                                                                        <div class="input-group">
                                                                           <div class="input-group-addon"><i class="fa fa-address-card"></i></div>
                                                                            <input type="text" id="input2-group1" name="name"  placeholder=" Company Name" value ="{{$website->name}}" class="form-control" required>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row form-group">
                                                                    <div class="col col-md-12">
                                                                        <div class="input-group">
                                                                           <div class="input-group-addon"><i class="fa fa-envelope-o"></i></div>
                                                                            <input type="email" id="input2-group1" name="email" placeholder=" Company Email" value ="{{$website->email}}" class="form-control" required>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row form-group">
                                                                    <div class="col col-md-12">
                                                                        <div class="input-group">
                                                                            <div class="input-group-addon"><i class="fa fa-map-marker"></i></div>
                                                                            <input type="text" id="input2-group1" name="address" placeholder="Company Address"  value ="{{$website->company_address}}" class="form-control" required>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row form-group">
                                                                    <div class="col col-md-12">
                                                                        <div class="input-group">
                                                                          <div class="input-group-addon"><i class="fa fa-facebook"></i></div>
                                                                            <input type="text" id="input2-group1" name="fb_link" placeholder="Company facebook page link" value ="{{$website->facebook}}" class="form-control" required>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row form-group">
                                                                    <div class="col col-md-12">
                                                                        <div class="input-group">
                                                                         <div class="input-group-addon"><i class="fa fa-phone"></i></div>
                                                                            <input type="text" id="input2-group1" name="phone" placeholder="Contact Number" class="form-control" value ="{{$website->phone}}" required>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row form-group">
                                                                    <div class="col col-md-12">
                                                                        <div class="input-group">
                                                                         <div class="input-group-addon"><i class="fa fa-phone"></i></div>
                                                                            <input type="text" id="input2-group1" name="google_plus" placeholder="Insert Google iframe link here" class="form-control" value ="{{$website->google_plus}}" required>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row form-group">
                                                                    <div class="col col-md-12">
                                                                        <div class="input-group">
                                                                         <div class="input-group-addon"><i class="fa fa-image"></i></div>
                                                                            <input type="file" id="input2-group1" name="image"  class="form-control">
                                                                            <input type="text" id="input2-group1" name="id" placeholder="Contact Number" class="form-control" value ="{{$website->id}}" hidden>
                                                                            <input type="text" id="input2-group1" name="prev_logo" placeholder="Contact Number" class="form-control" value ="{{$website->logo}}" hidden>
                                                                            <input type="text" id="input2-group1" name="prev_header_image" placeholder="Contact Number" class="form-control" value ="{{$website->header_image}}" hidden>

                                                                        </div>
                                                                    </div>
                                                                    <div class="mx-auto d-block">
                                                                        <img class="mx-auto d-block" src="{{url('/images/company_logo'.'/'.$website->logo) }}" width="100" height="50" alt="Card image cap">
                                                                    </div>
                                                                </div>
                                                                <div class="row form-group">
                                                               

                                                                    <div class="col col-md-12">
                                                                    <span><h5>Header Image</h5></span>
                                                                        <div class="input-group">
                                                                         <div class="input-group-addon"><i class="fa fa-image"></i></div>
                                                                            <input type="file" id="input2-group1" name="header_image" placeholder="Add Header Image" class="form-control">
                                                                    
                                                                        </div>
                                                                    </div>
                                                                    <div class="mx-auto d-block">
                                                                        <img class="mx-auto d-block" src="{{url('/images/header_image'.'/'.$website->header_image) }}" width="400" height="150" alt="Card image cap">
                                                                    </div>
                                                                </div>
                                                                <div class="card-footer">
                                                                  <button type="submit" class="btn btn-secondary">Submit</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                        @endif
                                                        <hr><br>
                                                        <div class="card-header">
                                                        <strong>Manage Navbar</strong>
                                                    </div>

                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                        <td>About Us Status</td>
                                            @if($nav->about_us == 1)
                                                <td>
                                                    <form method="POST" action="{{route('about_us.status')}}" onclick="return confirm('Are you sure?')">
                                                        {{ csrf_field() }}
                                                            <div class="form-group">
                                                               <input type="submit" class="btn btn-outline-success" value ="Active">
                                                               </div>
                                                        </form>
                                                      </td>
                                                      @else
                                                      <td>
                                                         <form method="POST" action="{{route('about_us.status')}}" onclick="return confirm('Are you sure?')">
                                                             {{ csrf_field() }}
                                                               <div class="form-group">
                                                               <input type="submit" class="btn btn-outline-success" value ="Inactive">
                                                               </div>
                                                        </form>
                                                    </td>
                                             @endif
                                        </tr>

                                        <tr>
                                        <td>Services</td>
                                            @if($nav->services == 1)
                                                <td>
                                                    <form method="POST" action="{{route('services.status')}}" onclick="return confirm('Are you sure?')">
                                                        {{ csrf_field() }}
                                                            <div class="form-group">
                                                               <input type="submit" class="btn btn-outline-success" value ="Active">
                                                               </div>
                                                        </form>
                                                      </td>
                                                      @else
                                                      <td>
                                                         <form method="POST" action="{{route('services.status')}}" onclick="return confirm('Are you sure?')">
                                                             {{ csrf_field() }}
                                                               <div class="form-group">
                                                               <input type="submit" class="btn btn-outline-success" value ="Inactive">
                                                               </div>
                                                        </form>
                                                    </td>
                                             @endif
                                        </tr>
                                        <tr>
                                        <td>Apply Online</td>
                                            @if($nav->apply_online == 1)
                                                <td>
                                                    <form method="POST" action="{{route('apply_online.status')}}" onclick="return confirm('Are you sure?')">
                                                        {{ csrf_field() }}
                                                            <div class="form-group">
                                                               <input type="submit" class="btn btn-outline-success" value ="Active">
                                                               </div>
                                                        </form>
                                                      </td>
                                                      @else
                                                      <td>
                                                         <form method="POST" action="{{route('apply_online.status')}}" onclick="return confirm('Are you sure?')">
                                                             {{ csrf_field() }}
                                                               <div class="form-group">
                                                               <input type="submit" class="btn btn-outline-success" value ="Inactive">
                                                               </div>
                                                        </form>
                                                    </td>
                                             @endif
                                        </tr>

                                        <tr>
                                        <td>Abroad Study Status</td>
                                            @if($nav->abroad_study == 1)
                                                <td>
                                                    <form method="POST" action="{{route('abroad.status')}}" onclick="return confirm('Are you sure?')">
                                                        {{ csrf_field() }}
                                                            <div class="form-group">
                                                               <input type="submit" class="btn btn-outline-success" value ="Active">
                                                               </div>
                                                        </form>
                                                      </td>
                                                      @else
                                                      <td>
                                                         <form method="POST" action="{{route('abroad.status')}}" onclick="return confirm('Are you sure?')">
                                                             {{ csrf_field() }}
                                                               <div class="form-group">
                                                               <input type="submit" class="btn btn-outline-success" value ="Inactive">
                                                               </div>
                                                        </form>
                                                    </td>
                                                    @endif
                                        </tr>
                                        <tr>
                                        <td>Gallery Status</td>
                                            @if($nav->gallery == 1)
                                                <td>
                                                    <form method="POST" action="{{route('gallery.status')}}" onclick="return confirm('Are you sure?')">
                                                        {{ csrf_field() }}
                                                            <div class="form-group">
                                                               <input type="submit" class="btn btn-outline-success" value ="Active">
                                                               </div>
                                                        </form>
                                                      </td>
                                                      @else
                                                      <td>
                                                         <form method="POST" action="{{route('gallery.status')}}" onclick="return confirm('Are you sure?')">
                                                             {{ csrf_field() }}
                                                               <div class="form-group">
                                                               <input type="submit" class="btn btn-outline-success" value ="Inactive">
                                                               </div>
                                                        </form>
                                                    </td>
                                                    @endif
                                        </tr>
                                        <tr>
                                        <td>Expert Messages</td>
                                            @if($nav->expert_messages == 1)
                                                <td>
                                                    <form method="POST" action="{{route('message.status')}}" onclick="return confirm('Are you sure?')">
                                                        {{ csrf_field() }}
                                                            <div class="form-group">
                                                               <input type="submit" class="btn btn-outline-success" value ="Active">
                                                               </div>
                                                        </form>
                                                      </td>
                                                      @else
                                                      <td>
                                                         <form method="POST" action="{{route('message.status')}}" onclick="return confirm('Are you sure?')">
                                                             {{ csrf_field() }}
                                                               <div class="form-group">
                                                               <input type="submit" class="btn btn-outline-success" value ="Inactive">
                                                               </div>
                                                        </form>
                                                    </td>
                                                    @endif
                                        </tr>
                                        <td>Apply Online</td>
                                            @if($nav->apply_online == 1)
                                                <td>
                                                    <form method="POST" action="{{route('apply_online.status')}}" onclick="return confirm('Are you sure?')">
                                                        {{ csrf_field() }}
                                                            <div class="form-group">
                                                               <input type="submit" class="btn btn-outline-success" value ="Active">
                                                               </div>
                                                        </form>
                                                      </td>
                                                      @else
                                                      <td>
                                                         <form method="POST" action="{{route('apply_online.status')}}" onclick="return confirm('Are you sure?')">
                                                             {{ csrf_field() }}
                                                               <div class="form-group">
                                                               <input type="submit" class="btn btn-outline-success" value ="Inactive">
                                                               </div>
                                                        </form>
                                                    </td>
                                                    @endif
                                        </tr>
                                    </tbody>
                                </table>
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

