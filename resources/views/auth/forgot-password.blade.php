
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
<meta name="description" content="POS - Bootstrap Admin Template">
<meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, invoice, html5, responsive, Projects">
<meta name="author" content="Dreamguys - Bootstrap Admin Template">
<meta name="robots" content="noindex, nofollow">
<title>Login - Pos admin template</title>

<link rel="shortcut icon" type="image/x-icon" href="{{asset('backend/assets/img/favicon.png')}}">

<link rel="stylesheet" href="{{asset('backend/assets/css/bootstrap.min.css')}}">

<link rel="stylesheet" href="{{asset('backend/assets/css/animate.css')}}">

<link rel="stylesheet" href="{{asset('backend/assets/css/dataTables.bootstrap4.min.css')}}">

<link rel="stylesheet" href="{{asset('backend/assets/plugins/fontawesome/css/fontawesome.min.css')}}">
<link rel="stylesheet" href="{{asset('backend/assets/plugins/fontawesome/css/all.min.css')}}">
<link rel="stylesheet" href="{{asset('backend/assets/css/style.css')}}">
<script src="https://kit.fontawesome.com/92d6c198cd.js" crossorigin="anonymous"></script>
</head>
<body class="account-page">


    <div class="main-wrapper">
        <div class="account-content">
        <div class="login-wrapper">
        <div class="login-content">
        <div class="login-userset ">
        <div class="login-logo">
        <img src="{{asset('backend/assets/img/logo.png')}}" alt="img">
        </div>
        <div class="mb-4 text-sm text-gray-600">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>
        <x-auth-session-status class="mb-4" :status="session('status')" />
        <form method="POST" action="{{ route('password.email') }}">
            @csrf

        <div class="form-login">
            <x-input-label for="email" :value="__('Email')" />
        <div class="form-addons">
        <input type="text" id="email" name="email" placeholder="Enter your email address" :value="old('email')" required autofocus>
        <img src="{{asset('backend/assets/img/icons/mail.svg')}}" alt="img">
        <x-input-error :messages="$errors->get('email')" class="mt-2 text-danger " />
        </div>

      

        </div>
        <div class="form-login">
        <button class="btn btn-login">Submit</button>
        </div>
        </form>
        </div>
        </div>
        <div class="login-img">
        <img src="{{asset('backend/assets/img/login.jpg')}}" alt="img">
        </div>
        </div>
        </div>
        </div>



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