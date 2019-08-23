@extends('layouts.frontend')
@section('page-title')
<meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>gallery | Mission USA</title>
    <link rel="icon" 
    type="image/png" 
    href="{{url('/images/company_logo'.'/'.$website->logo)}}">
    <meta name="description" content="#">
    <meta property="og:url" content= "{{url('/home/expertmessages/')}}">
  
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
                        
                        Gallery
                     </h2>
                </div>
            </div>
        </div><!-- row end-->

      <div class="xs-portfolio-grid grid">
      @foreach( $gallery as $key)
      <div class="xs-portfolio-grid-item category2 grid-item all">
                <a href="#popup_2" class="xs-single-portfolio-item xs-image-popup"  data-effect="mfp-zoom-in">
                    <img src="{{url('/images/Gallery/'.$key->image)}}" alt="">
                    <div class="single-project-content">
                        <div class="xs-image-popup-icon">
                            <i class="icon icon-plus"></i>
                        </div>
                        <h3 class="xs-single-title">{{$key->title}}</h3>
                        <p>
                        {{$key->description}}
                        </p>
                    </div>
                </a><!-- .xs-single-portfolio-item END -->
            </div><!-- .xs-portfolio-grid-item END -->   
      @endforeach
        </div>
</section><!-- End team section -->
<!-- End about inner section -->
<!-- header ready to contact section -->
<!-- footer start -->
@include('includes.frontend.footer')
<!-- footer end -->
@endsection