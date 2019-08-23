<body>
<!--[if lt IE 10]>
    your browser</a> to improve your experience.</p>
<![endif]-->
	<!-- END prelaoder -->

<!-- header top section -->
<section class="xs-header-top">
	<div class="container">
	    <div class="row">
            <div class="col-lg-6 col-md-8">
                <div class="header-top-info">
                    <ul>
                        <li><i class="icon icon-map-marker2"></i>{{$website->company_address}}</li>
                        <li><i class="icon icon-envelope"></i> {{$website->email}}</li>
                    </ul>
                </div>
            </div><!-- .col end -->

            <div class="col-lg-6 align-self-center col-md-4">
                <div class="header-top-social">
                    <ul>
                       <li><a href="{{$website->facebook}}"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="#"><i class="fab fa-twitter-square"></i></a></li>
                        <li><a href="#"><i class="fab fa-google-plus-g"></i></a></li>
                        <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                    </ul>
                </div>
            </div><!-- .col end -->
        </div><!-- .row end -->
	</div><!-- .container end -->
</section><!-- End header section -->

<!-- header middle section -->
<section class="xs-header-middle">
<div class="col-md-12" style="height: 140px">
                <div class="modal-content"
                     style="background-color: #a39e9b; width: 100%; height: 100%;overflow: hidden">
                     <img src="{{url('/images/header_image'.'/'.$website->header_image)}}" alt="">
                </div>
            </div>
  </section><!-- End header middle section -->