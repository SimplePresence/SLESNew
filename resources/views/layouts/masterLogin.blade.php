<!doctype html>
<html class="no-js"lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    {{-- <title>Login - SPX-Security</title> --}}
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- <link rel="shortcut icon" type="image/png" href="srtdash/images/icon/favicon.ico"> --}}
    <link rel="shortcut icon" type="image/png" href="{{ asset('images/icon/tms-icon-blue.ico') }}">
    <link rel="stylesheet" href="{{ asset('srtdash/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('srtdash/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('srtdash/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('srtdash/css/metisMenu.css') }}">
    <link rel="stylesheet" href="{{ asset('srtdash/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('srtdash/css/slicknav.min.css') }}">
    <!-- amchart css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <!-- others css -->
    <link rel="stylesheet" href="{{ asset('srtdash/css/typography.css') }}">
    <link rel="stylesheet" href="{{ asset('srtdash/css/default-css.css') }}">
    <link rel="stylesheet" href="{{ asset('srtdash/css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('srtdash/css/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('sweetalert2/dist/sweetalert2.min.css') }}">
    <!-- modernizr css -->
    <script src="srtdash/js/vendor/modernizr-2.8.3.min.js"></script>
    <title>@yield('title')</title>
  </head>
  <body>
    @yield('content')












    <!-- jquery latest version -->
    <script src="{{ asset('srtdash/js/vendor/jquery-2.2.4.min.js') }}"></script>
    <!-- bootstrap 4 js -->
    <script src="{{ asset('srtdash/js/popper.min.js') }}"></script>
    <script src="{{ asset('srtdash/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('srtdash/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('srtdash/js/metisMenu.min.js') }}"></script>
    <script src="{{ asset('srtdash/js/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ asset('srtdash/js/jquery.slicknav.min.js') }}"></script>
    <script src="{{ asset('sweetalert2/dist/sweetalert2.min.js') }}"></script>
    <!-- others plugins -->
    <script src="{{ asset('srtdash/js/plugins.js') }}"></script>
    <script src="{{ asset('srtdash/js/scripts.js') }}"></script>
  </body>
</html>
