<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title Page-->
    <title>@yield('title')</title>

    <!-- Fontfaces CSS-->
    <link href="{{ asset('asset/admin/css/font-face.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('asset/admin/vendor/font-awesome-4.7/css/font-awesome.min.css') }}" rel="stylesheet"
        media="all">
    <link href="{{ asset('asset/admin/vendor/font-awesome-5/css/fontawesome-all.min.css') }}" rel="stylesheet"
        media="all">
    <link href="{{ asset('asset/admin/vendor/mdi-font/css/material-design-iconic-font.min.css') }}" rel="stylesheet"
        media="all">

    <!-- Bootstrap CSS-->
    <link href="{{ asset('asset/admin/vendor/bootstrap-4.1/bootstrap.min.css') }}" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="{{ asset('asset/admin/vendor/animsition/animsition.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('asset/admin/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css') }}"
        rel="stylesheet" media="all">
    <link href="{{ asset('asset/admin/vendor/wow/animate.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('asset/admin/vendor/css-hamburgers/hamburgers.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('asset/admin/vendor/slick/slick.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('asset/admin/vendor/select2/select2.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('asset/admin/vendor/perfect-scrollbar/perfect-scrollbar.css') }}" rel="stylesheet"
        media="all">

    <!-- Main CSS-->
    <link href="{{ asset('asset/admin/css/theme.css') }}" rel="stylesheet" media="all">

</head>
    @yield('content')


    <!-- Jquery JS-->
    <script src="{{ asset('asset/admin/vendor/jquery-3.2.1.min.js') }}"></script>
    <!-- Bootstrap JS-->
    <script src="{{ asset('asset/admin/vendor/bootstrap-4.1/popper.min.js') }}"></script>
    <script src="{{ asset('asset/admin/vendor/bootstrap-4.1/bootstrap.min.js') }}"></script>
    <!-- Vendor JS       -->
    <script src="{{ asset('asset/admin/vendor/slick/slick.min.js') }}"></script>
    <script src="{{ asset('asset/admin/vendor/wow/wow.min.js') }}"></script>
    <script src="{{ asset('asset/admin/vendor/animsition/animsition.min.js') }}"></script>
    <script src="{{ asset('asset/admin/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js') }}"></script>
    <script src="{{ asset('asset/admin/vendor/counter-up/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('asset/admin/vendor/counter-up/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('asset/admin/vendor/circle-progress/circle-progress.min.js') }}"></script>
    <script src="{{ asset('asset/admin/vendor/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('asset/admin/vendor/chartjs/Chart.bundle.min.js') }}"></script>
    <script src="{{ asset('asset/admin/vendor/select2/select2.min.js') }}"></script>

    <!-- Main JS-->
    <script src="{{ asset('asset/admin/js/main.js') }}"></script>

</body>

</html>
<!-- end document-->
