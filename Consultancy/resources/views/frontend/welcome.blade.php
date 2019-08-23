@extends('layouts.frontend')
@section('page-title')
<meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{$website->name}}</title>
    <link rel="icon" 
    type="image/png" 
    href="{{url('/images/company_logo'.'/'.$website->logo)}}">
    <meta name="description" content="">
@endsection
@section('js')
<script type="text/javascript">
    function init() {
        var imgDefer = document.getElementsByTagName('img');
        for (var i = 0; i < imgDefer.length; i++) {
            if (imgDefer[i].getAttribute('data-src')) {
                imgDefer[i].setAttribute('src', imgDefer[i].getAttribute('data-src'));
            }
        }
    }
    window.onload = init;
</script>
@endsection
@section('contents')
<!-- header nav section -->
@include('includes.frontend.header')
<!-- header nav section end -->
<!-- header nav section -->
@include('includes.frontend.navbar')
<!-- End header nav section -->
<section class="xs-banner-sec owl-carousel banner-slider">
    @foreach($sliders as $slider)
    <div class="banner-slider-item banner-item1" style="background-image: url(/images/Sliders/{{$slider->image}});">
        <div class="slider-table">
            <div class="slider-table-cell">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-10 offset-lg-1">
                        <div class="banner-content text-right">
                                    <h2>{{$slider->title}}</h2>
                                    <p>{!!$slider->description !!}
                                    </p>
                                    <!-- <div class="xs-btn-wraper">
                                        <a href="#" class="xs-btn">
                                           Detail Section
                                        </a>
                                    </div> -->
                                </div><!-- .xs-welcome-wraper END -->
                        </div><!-- .column END -->
                    </div><!-- .row end -->
                </div><!-- .container end -->
            </div><!-- .slider table cell end -->
        </div><!-- .slider table end -->
    </div><!-- .xs-welcome-content END -->
@endforeach
</section><!-- End banner section -->
<!-- start banner section -->
<section class="promo-area-sec">
    <div class="container">
        <div class="promo-content-item">
            <div class="row">
                @foreach($about as $a)
                <div class="col-md-4">
                    <div class="single-promo-content">
                    
                        <h3 class="xs-service-title">{{$a->title}}</h3>
                        <p>
                        {{$a->short_description}}
                        </p>
                        <a href="{{route('about.show',$a->id)}}" class="xs-btn sm-btn">Learn More</a>
                    </div>
                </div>
                @endforeach
</section><!-- End banner section --> 
<!-- start about us section -->
<section class="about-sec section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-5" >
                <div class="about-content">
                    <h2 class="column-title"> <span class="xs-title">About Us</span>{{$youtube->title}}</h2>
                    <p>{{$youtube->short_description}}
                    </p>
                    <a href="{{route('youtube.show',$youtube->id)}}" class="xs-btn sm-btn">Read More</a>
                </div>
            </div>
            <div class="col-md-7">
                <div class="about-video-item">
                    <div class="about-video-img">
                        <iframe width="560" height="315" src="https://www.youtube.com/embed/{{$youtube->iframe}}" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div><!-- row end-->
    </div><!-- .container end -->
</section><!-- End about us section -->
<!-- start service section -->
<section class="service-sec section-padding" >
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title-item"> 
                    <h2 class="section-title">
                         <span class="xs-title">Service we provide</span>
                        Our Services
                    </h2>
                </div>
            </div>
        </div><!-- row end-->
        <div class="row">
            @foreach($service as $key)
            <div class="col-lg-3 col-sm-6">
                <div class="single-service">
                    <div class="service-img">
                        <img src="{{url('/images/OurService/OurService_image'.'/'.$key->image) }}" alt="{{$key->title}}">
                        <!-- <i  class="icon" src="url('/images/OurService/OurService_icon'.'/'.$key->icon)"></i> -->
                    </div>
                    <h3 class="xs-service-title"><a href="{{route('service.show',$key->id)}}">{{$key->title}}</a> </h3>
                    <p>
                       {{$key->short_description}}
                    </p>
                    <a href="{{route('service.show',$key->id)}}" class="readMore">Read more <i class="icon icon-arrow-right"></i> </a>
                </div>
            </div>
            @endforeach
        </div><!-- row end-->
    </div><!-- .container end -->
</section><!-- End service section -->
<section class="service-sec section-padding" style="background: url(frontend/images/1.jpg);">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title-item"> 
                <h2 class="section-title">
                         <span class="xs-title">Experts</span>
                        Our Experts
                    </h2>
                </div>
            </div>
        </div><!-- row end-->
        <div class="row">
            @foreach($expert as $key)
            <div class="col-lg-3 col-sm-6">
                <div class="single-service">
                    <div class="service-img">
                        <img src="{{url('/images/Experts'.'/'.$key->image) }}" alt="{{$key->title}}">
                        <!-- <i  class="icon" src="url('/images/OurService/OurService_icon'.'/'.$key->icon)"></i> -->
                    </div>
                    <h3 class="xs-service-title">{{$key->position}}</h3>
                    <p>{{$key->name}}</p>
                </div>
            </div>
            @endforeach
        </div><!-- row end-->
    </div><!-- .container end -->
</section><!-- End service section -->
<section class="testmonial-sec">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
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
                <div class="call-back-content">
                    <p class="call-contact-text">We will contact</p>
                    <h3>Get a <span>call back</span></h3>
                    <form class="call-back-form" method="post" action="{{route('store.store')}}"
                              enctype="multipart/form-data">
                              @csrf
                        <div class="form-group">
                            <input type="text" name="name" value="" placeholder="Your Name" class="call-back-inp" required>
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" value="" placeholder="Email " class="call-back-inp" required>
                        </div>
                        <div class="form-group">
                            <input type="number" name="phone" value="" placeholder="Phone no" class="call-back-inp" required>
                        </div>
                        <div class="form-group">
                        <input type="text" name="subject" value="" placeholder="subject" class="call-back-inp" required>
                        </div>
                        <div class="form-group xs-mb-40">
                            <textarea name="description" placeholder="Message" class="call-back-inp call-back-msg" required></textarea>
                        </div>
                        <div class="g-recaptcha" data-sitekey="6LdbK5IUAAAAADgrfqGtA2xFZSKue5QZ3ou2f20o"></div>

                        <div class="form-group ">
                            <button type="submit" name="submit" class="xs-btn">Submit</button>
                            <label class="call-us-number">Or Call US - <span>098 2639 6257</span></label>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-6">
                <div class="owl-carousel" id="testmonial-slider">
                    @foreach($review as $key)
                    <div class="testmonial-content ">
                       <a href="{{route('addreview.index')}}"><i class="testmonial_icon icon-client_review"></i></a>
                        <h3 class="testmonial-title">Client review</h3>
                        
                        <p>{{$key->description}}
                        </p>
                        <div class="testmonial-author">
                            <img src="{{url('/images/ClientReview'.'/'.$key->image) }}" alt="{{$key->user_name}}">
                            <h4>{{$key->user_name}}</h4 >
                            <div class="author-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div><!-- row end-->
    </div><!-- .container end -->
</section><!-- End testmonila section -->
@if( ! empty($check_news))
<!-- start latest news section -->
<section class="latest-news-sec section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-4" >
                <div class="latest-news-content">
                    <h2 class="column-title"> <span class="xs-title">From our blog</span>Latest News & Updates</h2>
                    <p>
                       More information is always better than less.
                    </p>
                    <!-- <a href="#" class="xs-btn">View All</a> -->
                </div>
            </div>
            <div class="col-lg-8">
                <div class="row">
                    @foreach($news as $key)
                    <div class="col-md-6">
                        <div class="single-latest-news">
                            <div class="latest-news-img">
                                <a href="{{route('news.show',$key->id)}}">
                                    <img src="{{url('/images/NewsUpdates/News_updates_image'.'/'.$key->image) }}" alt="{{$key->title}}">
                                </a>
                            </div>
                            <div class="single-news-content">
                                <span class="date-info">{{$key->created_at->format('d M Y')}}</span>
                                <h3 class="xs-post-title"><a href="{{route('news.show',$key->id)}}">{{$key->title}}</a></h3>
                                <p>{{$key->short_description}}
                                </p>
                                <div class="blog-author">
                                    <img src="{{url('/images/NewsUpdates/News_updates_author'.'/'.$key->author_image) }}" alt="{{$key->author_name}}">
                                    <label>Admin Name</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div><!-- .row end -->
    </div><!-- .container end -->
</section><!-- End latest news section -->
@endif
<section class="latest-news-sec section-padding">
    <div class="container">
    <div class="row">
            <div class="col-lg-12">
                <div class="section-title-item"> 
                <h2 class="section-title">
                         <!-- <span class="xs-title">Partners</span> -->
                        Our Partners
                    </h2>
                </div>
            </div>
        <div class="row" style="margin:auto;">
            @foreach($partners as $key)
               <div>
                    <a href="{{$key->link}}" target="_Blank"><img class ="img-partnres-circle" src="{{url('/images/Partners/'.$key->logo)}}" alt="{{$key->author_name}}" style="width:150px,height:150px;"></a>      
                     </div>
            @endforeach
        </div><!-- row end-->
    </div><!-- .container end -->
</section><!-- End service section -->
<br><br>

<div class="xs-map-sec">
    <div class="xs-maps-wraper">
        <div class="map">
            <iframe src="{{$website->google_plus}}" width="800" height="600" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>
    </div>
</div><!-- End map section -->
@include('includes.frontend.footer')
@endsection
