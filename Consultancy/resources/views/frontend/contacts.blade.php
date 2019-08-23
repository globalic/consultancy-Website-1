@extends('layouts.frontend')
@section('page-title')
<meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Contacts | Mission USA</title>
    <link rel="icon" 
    type="image/png" 
    href="{{url('/images/company_logo'.'/'.$website->logo)}}">
    <meta name="description" content="">
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
<section class="xs-get-in-touch">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="get-in-touch-cont text-center">
                    <h3><span class="light-text">Get</span> in touch</h3>
                   
                </div>
            </div>
        </div><!-- .row end -->
    </div><!-- .container end -->
</section><!-- End get in touch section -->

<!--  contact section -->
<section class="xs-contact-sec">
    <div class="container">
        <div class="row">
            <div class="col-lg-7">
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
                <form class="form form-submit" method="post" action="{{route('store.store')}}"
                              enctype="multipart/form-data">
                           @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name" class="col-form-label required">Your Name</label>
                                            <input name="name" type="text" class="form-control" id="name" placeholder="Your Name" required>
                                        </div>
                                        <!--end form-group-->
                                    </div>
                                    <!--end col-md-6-->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="Phone" class="col-form-label required">Phone Number</label>
                                            <input name="phone" type="text" class="form-control" id="phone" placeholder="Contact number" required>
                                        </div>
                                        <!--end form-group-->
                                    </div>
                                    <!--end col-md-6-->
                                </div>
                                <div class="form-group">
                                    <label for="Email" class="col-form-label">Email</label>
                                    <input name="email" type="email" class="form-control" id="subject" placeholder="Your Email" required>
                                </div>
                                <!--end row-->
                                <div class="form-group">
                                    <label for="subject" class="col-form-label">Subject</label>
                                    <input name="subject" type="text" class="form-control" id="subject" placeholder="Subject" required>
                                </div>
                                <!--end form-group-->
                                <div class="form-group">
                                    <label for="message" class="col-form-label required">Your Message</label>
                                    <textarea name="description" id="message" class="form-control" rows="2" placeholder="Your Message" required></textarea>
                                </div>
                                <div class="g-recaptcha" data-sitekey="6LdbK5IUAAAAADgrfqGtA2xFZSKue5QZ3ou2f20o"></div>
                                <!--end form-group-->
                                <button type="submit" class="btn btn-primary float-right">Send Message</button>
                            </form>
                </div>
            </div><!-- col end -->
            <div class="col-lg-5">
                <div class="contact-map">
                    <div style="width: 100%">
                        
                       <iframe src="{{$website->google_plus}}" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>

                    </div>
               </div>
            </div>
        </div><!-- .row end -->
    </div><!-- .container end -->
</section><!-- End contact section -->
<!--  contact section -->
<section class="xs-contact-infomation xs-contact-info-1">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="contact-info-group">
                    <i class="icon-address"></i>
                    <h4>Visit our office</h4>
                    <span>{{$website->company_address}}</span>
                 
                </div><!-- .contact-info-group END -->
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="contact-info-group">
                    <i class="icon-mail"></i>
                    <h4>Mail us</h4>
                    <a href="mailto:contact@example.com">{{$website->email}}</a>
                </div><!-- .contact-info-group END -->
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="contact-info-group">
                    <i class="icon-call"></i>
                    <h4>Call us</h4>
                    <span>{{$website->phone}}</span>
                   
                </div><!-- .contact-info-group END -->
            </div>
        </div>
    </div><!-- .container end -->
</section><!-- End contact section -->
<!-- header ready to contact section -->
<!-- footer start -->
@include('includes.frontend.footer')
<!-- footer end -->
@endsection