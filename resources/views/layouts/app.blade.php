
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Stal de vogelzang</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Waar paardrijden puur genot is!" />
    <meta name="keywords" content="stal manege vogelzang paarden pony's pony paard lokeren sport" />
    <meta name="author" content="Hans Jonckers" />

    <!-- Facebook and Twitter integration -->
    <meta property="og:title" content=""/>
    <meta property="og:image" content=""/>
    <meta property="og:url" content=""/>
    <meta property="og:site_name" content=""/>
    <meta property="og:description" content=""/>
    <meta name="twitter:title" content="" />
    <meta name="twitter:image" content="" />
    <meta name="twitter:url" content="" />
    <meta name="twitter:card" content="" />

    <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
    <link rel="shortcut icon" href="favicon.ico">

    <!-- Custom Google fonts -->
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,500,300,700' rel='stylesheet' type='text/css'>
    <link href="http://fonts.googleapis.com/css?family=Crimson+Text:400,600" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('css/bxslider.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.transitions.css') }}">
    <link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('css/superslides.css') }}">

</head>
<body>
@include('layouts._partials._nav')

    <div id="wrapper">
        @yield('content')

        <footer>
            <div id="footer-section" class="text-center">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2">
                            <p class="copyright">
                                &copy; {{ date('Y') }} Stal de vogelzang
                            </p>
                        </div> <!-- End col-sm-8 -->
                    </div> <!-- End row -->
                </div> <!-- End container -->
            </div> <!-- End footer-section  -->
        </footer>
    </div>

<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="js/jquery.easing.1.3.js"></script>
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/countdown.js') }}"></script>
<script src="{{ asset('js/magnific-popup.js') }}"></script>
<script src="{{ asset('js/fitvids.js') }}"></script>
<script src="{{ asset('js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('js/ajaxChimp.js') }}"></script>
<script src="{{ asset('js/appear.js') }}"></script>
<script src="{{ asset('js/placeholder.js') }}"></script>
<script src="{{ asset('js/countTo.js') }}"></script>
<script src="{{ asset('js/waypoints.js') }}"></script>
<script src="{{ asset('js/bxslider.js') }}"></script>
<script src="{{ asset('js/superslides.js') }}"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCefOgb1ZWqYtj7raVSmN4PL2WkTrc-KyA&sensor=false"></script>
<script src="{{ asset('js/gmaps.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>

</body>
</html>

