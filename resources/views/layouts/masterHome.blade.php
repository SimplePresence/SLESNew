<!doctype html>
<html class="no-js"lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" type="image/png" href="{{ asset('images/icon/tms-icon-blue.ico') }}">
    <link rel="stylesheet" href="{{ asset('srtdash/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('srtdash/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('srtdash/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('srtdash/css/metisMenu.css') }}">
    <link rel="stylesheet" href="{{ asset('srtdash/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('srtdash/css/slicknav.min.css') }}">
    <!-- others css -->
    <link rel="stylesheet" href="{{ asset('srtdash/css/typography.css') }}">
    <link rel="stylesheet" href="{{ asset('srtdash/css/default-css.css') }}">
    <link rel="stylesheet" href="{{ asset('srtdash/css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('srtdash/css/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('sweetalert2/dist/sweetalert2.min.css') }}">
    <script src="{{ asset('srtdash/js/vendor/modernizr-2.8.3.min.js') }}"></script>
    <style>
        .modal-backdrop {
            z-index: 1040;
        }
        .modal {
            z-index: 1050;
        }
        .modal-dialog {
            overflow: hidden;
        }
        .modal-body {
            overflow-y: auto;
        }
        body.modal-open {
            overflow: hidden;
        }
    </style>

    @yield('css')
        {{-- datetimepicker --}}
        <link rel="stylesheet"  type="text/css" href="{{asset('datetimepicker/css/bootstrap-datetimepicker.css')}}"/>
        <script src="{{asset('datetimepicker/js/jquery.min.js')}}"></script>
        <script src="{{asset('datetimepicker/js/moment.min.js')}}"></script>
        <script src="{{asset('datetimepicker/js/bootstrap-datetimepicker.min.js')}}"></script>

  </head>

    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>

    <!-- page container area start -->
    <div class="page-container">
        @include('layouts.sidebar')

        <!-- main content area start -->
        <div class="main-content">
            @include('layouts.header')
            @yield('page-title')
            @yield('content')
            </div>
        </div>
        <!-- main content area end -->
        <footer>
            <div class="footer-area">
                <p>SLES - Web version. Developed by IT Dept.<a href="https://pttrimitra.com"> PT Trimitra Chitrahasta</a>.</p>
            </div>
        </footer>
    </div>
    <!-- page container area end -->

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
    {{-- realtime --}}
    <script>
         $(document).ready(function() {
            var $body = $('body');

            $(document).on('hidden.bs.modal', function () {
                if ($('.modal:visible').length) {
                    $body.addClass('modal-open');
                } else {
                    $body.removeClass('modal-open');
                }
            });

            $('.modal').on('show.bs.modal', function () {
                var $modal = $(this);
                if ($('.modal:visible').length > 1) {
                    $body.addClass('modal-open');
                }
            });

            $('.modal').on('hide.bs.modal', function () {
                if ($('.modal:visible').length > 1) {
                    $body.addClass('modal-open');
                } else {
                    $body.removeClass('modal-open');
                }
            });
        });
    </script>
    @stack('js')

    @yield('script')

  </body>
</html>

