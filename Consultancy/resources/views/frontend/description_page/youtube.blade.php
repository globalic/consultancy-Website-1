@extends('layouts.frontend')
@section('page-title')
<meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{$key->title}} | Mission USA</title>
    <link rel="icon" 
    type="image/png" 
    href="{{url('/images/company_logo'.'/'.$website->logo)}}">
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{$key->title}} | Mission USA</title>
    <link rel="icon" 
    type="image/png" 
    href="{{url('/images/company_logo'.'/'.$website->logo)}}">
    <meta name="description" content="{{$key->short_description}}">
    <meta property="og:url" content= "{{url('/home/youtube/'.$key->id)}}">
    <meta property="og:video" content="https://www.youtube.com/embed/{{$key->iframe}}">
    <meta property="og:site_name" content="Mission USA">
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
                <div>
                    <iframe width="450" height="315" src="https://www.youtube.com/embed/{{$key->iframe}}" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                </div><br>
                <div class="xs-form-group">
               @include('includes.frontend.contact_form')
                </div>
            </div><!-- col end -->
            <div class="col-lg-6">
                <div class="about-inner-content">
                    <h2 class="column-title2 column-title">{{$key->title}}</h2>
                   <div class="single-about-content">
                      {!! $key->description !!}
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