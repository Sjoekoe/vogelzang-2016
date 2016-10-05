<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Vogelzang">
    <link rel="shortcut icon" href="images/favicon.png">

    <title>Stal de vogelzang</title>

    <!--Core CSS -->
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">

    <!-- Custom styles for this template -->
    <link href="{{ asset('css/bucket.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/bucket-responsive.css') }}">

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]>
    <script src="js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>

<body>

    <section id="container" >
            @yield('content')
    </section>

    <script>
        window.vogelzang = window.vogelzang || {!! Info::toJson() !!};
    </script>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/scrollTo.js') }}"></script>
    <script src="{{ asset('js/niceScroll.js') }}"></script>

    <script src="{{ asset('js/bucket.js') }}"></script>

</body>
</html>
