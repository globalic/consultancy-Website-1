@extends('layouts.frontend')
@section('page-title')
<meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{$key->title}} | Mission USA</title>
    <link rel="icon" 
    type="image/png" 
    href="{{url('/images/company_logo'.'/'.$website->logo)}}">
    <meta name="description" content="{{$key->message}}">
    <meta property="og:url" content= "{{url('/home/expertmessages/'.$key->id)}}">
    <meta property="og:image" content="{{url('/images/Experts/'.$key->expert->image)}}">
    <meta property="og:site_name" content="Mission USA">
@endsection
@section('js')
<script type="text/javascript">
  var onloadCallback = function() {
    alert("grecaptcha is ready!");
  };
</script>
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
        <div class="row">
            <div class="col-lg-5">
         
                <div class="about-inner-img">
                    <img src="{{url('/images/Experts/'.$key->expert->image)}}" alt="{{$key->title}}">
                </div>
                <br>
                <div class="col-lg-12">
              
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
         <div class="xs-form-group">
               @include('includes.frontend.contact_form')
                </div>
            </div><!-- col end -->
            </div><!-- col end -->
            <div class="col-lg-6">
                <div class="about-inner-content">
                    <h2 class="column-title2 column-title">{{$key->title}}</h2>
                   <div class="single-about-content">
                     {!! $key->message !!}
                   </div>
                </div>
            </div><!-- col end -->
        </div><!-- row end-->
    </div><!-- .container end -->
</section><!-- End about inner section -->
<!-- header ready to contact section -->
<!-- footer start -->
@include('includes.frontend.footer')
<!-- footer end -->
@endsection