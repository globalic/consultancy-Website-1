@extends('layouts.frontend')
@section('page-title')
<meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Add Review |Mission USA</title>
    <link rel="icon" 
    type="image/png" 
    href="{{url('/images/company_logo'.'/'.$website->logo)}}">
    <meta name="description" content="">
@endsection
@section('contents')
<!-- header main nav -->
@include('includes.frontend.header')
<!-- header nav main nav -->
<!-- header nav section -->
@include('includes.frontend.navbar')
<!-- End header nav section -->
<section class="about-inner section-padding">
    <div class="container">
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
           <div class="xs-form-group">
                <form class="form form-submit" method="post" action="{{route('addreview.store')}}"
                              enctype="multipart/form-data">
                               @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name" class="col-form-label required">Your Name</label>
                                            <input name="user_name" type="text" class="form-control" id="name" placeholder="Your Name" value="{{ old('user_name') }}" required>
                                        </div>
                                        <!--end form-group-->
                                    </div>
                                    <!--end col-md-6-->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="Phone" class="col-form-label required">Phone Number</label>
                                            <input name="phone" type="text" class="form-control" id="phone" value="{{ old('phone') }}" placeholder="Contact number" required>
                                        </div>
                                        <!--end form-group-->
                                    </div>
                                    <!--end col-md-6-->
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="email" class="col-form-label required">Your Email</label>
                                            <input name="email" type="email" class="form-control" id="email" value="{{ old('email') }}" placeholder="Your Email" required>
                                        </div>
                                        <!--end form-group-->
                                    </div>
                                    <!--end col-md-6-->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="Address" class="col-form-label required">Location</label>
                                            <input name="location" type="text" class="form-control"  value="{{ old('location') }}" id="address" placeholder="Address" required>
                                        </div>
                                        <!--end form-group-->
                                    </div>
                                    <!--end col-md-6-->
                                </div>
                                <!--end row-->                          
                              <div class="form-group">
                                    <label for="Your_image" class="col-form-label">Your Image</label>
                                    <input name="image" type="file" class="form-control" id="image" placeholder="image" >
                                </div>
                                <!--end form-group-->
                                <div class="form-group">
                                    <label for="message" class="col-form-label required">Description</label>
                                    <textarea name="description" id="message" class="form-control" rows="4" placeholder="Your Review" value="{{ old('description') }}" required></textarea>
                                </div>
                                <!--end form-group-->
                                <button type="submit" class="btn btn-primary float-right">Add Review</button>
                            </form>
                </div>
            </div><!-- col end -->
    </div><!-- .container end -->
</section><!-- End about inner section -->
<!-- footer start -->
@include('includes.frontend.footer')
<!-- footer end -->
@endsection