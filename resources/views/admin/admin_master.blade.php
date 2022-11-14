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

    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('backend/assets/img/favicon.png') }}">
    <link href="{{ asset('backend/assets/css/select2.min.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{ asset('backend/assets/css/bootstrap.min.css') }}">

    <link rel="stylesheet" href="{{ asset('backend/assets/css/animate.css') }}">

 {{--  <!-- DataTables -->
  <link href="{{ asset('backend/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />

  <!-- Responsive datatable examples -->
  <link href="{{ asset('backend/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />   --}}
  {{-- https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css
https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css --}}

  <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">

{{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css"> --}}

    <link rel="stylesheet" href="{{ asset('backend/assets/plugins/fontawesome/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/plugins/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    {{-- Toastes Css CDN --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/assets/css/toast-notify.css') }}" >

    {{-- <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css"> --}}
    {{-- https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css
    https://cdn.datatables.net/scroller/2.0.7/css/scroller.dataTables.min.css --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">

    <script src="https://kit.fontawesome.com/92d6c198cd.js" crossorigin="anonymous"></script>
    <style>
        @media print{
            /* Hide Every Other Element */
            body *{
                visibility: hidden;
            }
            /* Then Displaying print container element */
            .print-container, .print-container *{
                visibility: visible;
            }
        }

    </style>

</head>
<body>
    <div id="global-loade">
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
    <script src="{{ asset('backend/assets/js/jquery-3.6.0.min.js') }}"></script>
{{-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script> --}}
    <script src="{{ asset('backend/assets/js/feather.min.js') }}"></script>

    <script src="{{ asset('backend/assets/js/jquery.slimscroll.min.js') }}"></script>

   {{--  <script src="{{ asset('backend/assets/js/jquery.dataTables.min.js') }}"></script> --}}
       <!-- Datatable init js -->
       <script src="{{ asset('backend/assets/libs/datatables.init.js') }}"></script>
    {{-- <script src="{{ asset('backend/assets/js/dataTables.bootstrap4.min.js') }}"></script> --}}

<script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
{{-- <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script> --}}

    <script src="{{ asset('backend/assets/js/bootstrap.bundle.min.js') }}"></script>

    {{-- Sweet alert CDN --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<script src="{{ asset('backend/assets/js/sweet-alert.js') }}"></script>
    {{-- <script src="assets/plugins/apexchart/apexcharts.min.js"></script> --}}

    <script src="{{ asset('backend/assets/plugins/apexchart/apexcharts.min.js') }}"></script>

    {{-- <script src="assets/plugins/apexchart/chart-data.js"></script> --}}
    <script src="{{ asset('backend/assets/plugins/apexchart/chart-data.js') }}"></script>

    {{-- <script src="assets/js/script.js"></script> --}}

    <script src="{{ asset('backend/assets/js/script.js') }}"></script>
      
    <script src="{{ asset('backend/assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('backend/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    {{-- This blade syntex for custom js to call view files --}}
    <script src="{{ asset('backend/assets/js/custom.js') }}"></script>
    <script src="{{ asset('backend/assets/js/validate.min.js') }}"></script>
    {{--Select Combobox with search Engine --}}
    <script src="{{ asset('backend/assets/js/select2.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/form-advanced.init.js') }}"></script>
    {{-- Select Combobox with search Engine End --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/4.1.2/handlebars.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/notify.min.js"></script>


    @stack('customJs')

    <script>
        @if(Session::has('message'))
        var type = "{{ Session::get('alert-type','info') }}"
        switch(type){
           case 'info':
           toastr.info(" {{ Session::get('message') }} ");
           break;
           case 'success':
           toastr.success(" {{ Session::get('message') }} ");
           break;
           case 'warning':
           toastr.warning(" {{ Session::get('message') }} ");
           break;
           case 'error':
           toastr.error(" {{ Session::get('message') }} ");
           break; 
        }
        @endif 
       </script>
</body>

</html>
