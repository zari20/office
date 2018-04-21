<!DOCTYPE html>
<html lang="fa">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="{{$website->description ?? ''}}">
        <meta name="author" content="{{$website->author ?? ''}}">
        <meta name="keywords" content="{{$website->keywords ?? ''}}">
        <title> {{$website->title ?? '-'}} </title>


        <link href="css/welcome/bootstrap.min.css" rel="stylesheet">
        @include('welcome_partials.styles')
        <link href="css/welcome/responsive.css" rel="stylesheet">
        <link href="css/welcome/fonts.css" rel="stylesheet">
        <link href="css/welcome/animate.css" rel="stylesheet">
        @include('welcome_partials.snippets')
        <link href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet">

    </head>
    <body>

        @yield('main')

        <script src="js/welcome/jquery.min.js"></script>
        <script src="js/welcome/bootstrap.bundle.min.js"></script>
        <script src="js/welcome/contact_me.js"></script>
        <script src="js/welcome/jqBootstrapValidation.js"></script>
        <script src="js/welcome/sm-scroll.js"></script>
        <script src="{{asset('js/welcome/isotope.pkgd.min.js')}}"></script>
    </body>
</html>
