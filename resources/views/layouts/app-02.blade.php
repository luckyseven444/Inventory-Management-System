<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Inventory Management System - @yield('title')</title>

    <!-- Bootstrap core CSS-->
    <link href="{{asset('assets/animate.css/animate.min.css')}}" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="{{asset('assets/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="{{asset('assets/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('assets/styles/app.min.css')}}" rel="stylesheet">

    <link href="{{asset('assets/styles/font.css')}}" rel="stylesheet">

</head>

<body>

@yield('content')

<!-- Bootstrap core JavaScript-->
<script src="{{asset('assets/libs/jquery/jquery/dist/jquery.js')}}"></script>
<script src="{{asset('assets/libs/jquery/tether/dist/js/tether.min.js')}}"></script>

<!-- Core plugin JavaScript-->
<script src="{{asset('assets/libs/jquery/bootstrap/dist/js/bootstrap.js')}}"></script>

<!-- Page level plugin JavaScript-->
<script src="{{asset('assets/html/scripts/ui-scroll-to.js')}}"></script>

</body>

</html>
