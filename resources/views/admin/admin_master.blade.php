<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="POS - Bootstrap Admin Template">
    <meta name="keywords"
        content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern,  html5, responsive">
    <meta name="author" content="Dreamguys - Bootstrap Admin Template">
    <meta name="robots" content="noindex, nofollow">
    <title>Dreams Pos admin template</title>

    <link rel="shortcut icon" type="image/x-icon" href="{{asset('backend/assets/img/favicon.png')}}">

    <link rel="stylesheet" href="{{asset('backend/assets/css/bootstrap.min.css')}}">

    <link rel="stylesheet" href="{{asset('backend/assets/css/animate.css')}}">

    <link rel="stylesheet" href="{{asset('backend/assets/css/dataTables.bootstrap4.min.css')}}">

    <link rel="stylesheet" href="{{asset('backend/assets/plugins/fontawesome/css/fontawesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('backend/assets/plugins/fontawesome/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('backend/assets/css/style.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/92d6c198cd.js" crossorigin="anonymous"></script>
</head>

<body>
    <div id="global-loader">
        <div class="whirly-loader"> </div>
    </div>

    <div class="main-wrapper">

      @include('admin.body.header')


     @include('admin.body.sidebar')

        <div class="page-wrapper">

            {{-- Admin Main content Here --}}
            @yield('admin-content')

        </div>
    </div>

@stack('customIs')
    <script src="{{asset('backend/assets/js/jquery-3.6.0.min.js')}}"></script>

    <script src="{{asset('backend/assets/js/feather.min.js')}}"></script>

    <script src="{{asset('backend/assets/js/jquery.slimscroll.min.js')}}"></script>

    <script src="{{asset('backend/assets/js/jquery.dataTables.min.js')}}"></script>

    <script src="{{asset('backend/assets/js/dataTables.bootstrap4.min.js')}}"></script>

    <script src="{{asset('backend/assets/js/bootstrap.bundle.min.js')}}"></script>

    {{-- <script src="assets/plugins/apexchart/apexcharts.min.js"></script> --}}

    <script src="{{asset('backend/assets/plugins/apexchart/apexcharts.min.js')}}"></script>

    {{-- <script src="assets/plugins/apexchart/chart-data.js"></script> --}}
    <script src="{{asset('backend/assets/plugins/apexchart/chart-data.js')}}"></script>

    {{-- <script src="assets/js/script.js"></script> --}}

    <script src="{{asset('backend/assets/js/script.js')}}"></script>
</body>

</html>