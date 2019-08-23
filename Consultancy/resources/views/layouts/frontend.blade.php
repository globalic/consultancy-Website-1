<!doctype html>
<html class="no-js" lang="en">

<head>
    @yield('page-title')
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
    <link rel="icon" type="image/png" href="favicon.html">
    <link rel="apple-touch-icon" href="apple-touch-icon.html">
    <link rel="stylesheet" href="{{url('frontend/css/fontawesome-min.css')}}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
    <link rel="stylesheet" href="{{url('frontend/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{url('frontend/css/xsIcon.css')}}">
    <link rel="stylesheet" href="{{url('frontend/css/iconmoon.css')}}">
    <link rel="stylesheet" href="{{url('frontend/css/isotope.css')}}">
    <link rel="stylesheet" href="{{url('frontend/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{url('frontend/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{url('frontend/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{url('frontend/css/navigation.css')}}">
    <link rel="stylesheet" href="{{url('frontend/css/animate.css')}}">
    <link rel="stylesheet" href="{{url('frontend/css/style.css')}}">
    <link rel="stylesheet" href="{{url('frontend/css/responsive.css')}}"/>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>
<body>
@yield('style')
@yield('js')
<!--[if lt IE 10]>
    your browser</a> to improve your experience.</p>
<![endif]-->
@yield('contents')

<script src="{{url('frontend/js/jquery-3.2.1.min.js')}}"></script>
<script src="{{url('frontend/js/bootstrap.min.js')}}"></script>
<script src="{{url('frontend/js/jquery-mixtub.js')}}"></script>
<script src="{{url('frontend/js/jquery.magnific-popup.min.js')}}"></script>
<script src="{{url('frontend/js/owl.carousel.min.js')}}"></script>
<script src="{{url('frontend/js/navigation.js')}}"></script>
<script src="{{url('frontend/js/jquery.appear.min.js')}}"></script>
<script src="{{url('frontend/js/isotope.js')}}"></script>
<script src="{{url('frontend/js/wow.min.js')}}"></script>
<script src="{{url('frontend/js/main.js')}}"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
<script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));</script>
</body>

</html>
<!-- footer section end -->