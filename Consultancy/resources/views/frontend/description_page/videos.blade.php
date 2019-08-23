@extends('layouts.frontend')
@section('page-title')
<meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>gallery | Mission USA</title>
    <link rel="icon" 
    type="image/png" 
    href="{{url('/images/company_logo'.'/'.$website->logo)}}">
    <meta name="description" content="#">
    <meta property="og:url" content= "{{url('/home/videogallery')}}">
  
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
<section class="recent-work-sec section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title-item">
                    <h2 class="section-title">
                         Video Gallery
                     </h2>
                </div>
                @foreach($video as $key)
                <section class="about-sec section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-5" >
                <div class="about-content">
                    <h2 class="column-title">{{$key->title}}</h2>
                    <p>{{$key->short_description}}
                    </p>
                    <a href="{{route('youtube.show',$key->id)}}" class="xs-btn sm-btn">Read More</a>
                </div>
            </div>
            <div class="col-md-7">
                <div class="about-video-item">
                    <div class="about-video-img">
                        <iframe width="560" height="315" src="https://www.youtube.com/embed/{{$key->iframe}}" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
            @endforeach
        </div><!-- row end-->
    </div><!-- .container end -->
</section><!-- End about us section -->
            </div>
        </div><!-- row end-->
</section><!-- End team section -->
<!-- End about inner section -->
<!-- header ready to contact section -->
<!-- footer start -->
@include('includes.frontend.footer')
<!-- footer end -->
@endsection