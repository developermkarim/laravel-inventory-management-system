
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

<div class="login-userset">
    <form method="POST" action="{{ route('register') }}">
        @csrf
<div class="login-logo">
<img src="{{asset('backend/assets/img/logo.png')}}" alt="img">
</div>
<div class="login-userheading">
<h3>Create an Account</h3>
<h4>Continue where you left off</h4>
</div>
<div class="form-login">
{{-- <label>Full Name</label> --}}
<div class="form-addons">
<input type="text" id="name" name="name" placeholder="Enter your full name">
<img src="{{asset('backend/assets/img/icons/users1.svg')}}" alt="img">
</div>
</div>
<div class="form-login">
{{-- <label>Full Name</label> --}}
<div class="form-addons">
<input type="text" id="username" name="username" placeholder="Enter your user name">
<img src="{{asset('backend/assets/img/icons/users1.svg')}}" alt="img">
</div>
</div>
<div class="form-login">
{{-- <label>Email</label> --}}
<div class="form-addons">
 

<input type="email" id="email" name="email" placeholder="Enter your email address">

<img src="{{asset('backend/assets/img/icons/mail.svg')}}" alt="img">
</div>
</div>
<div class="form-login">
{{-- <label>Password</label> --}}
<div class="pass-group">
<input type="password" id="password" class="pass-input" name="password" placeholder="Enter your password">
<span class="fas toggle-password fa-eye-slash"></span>
</div>
</div>
<div class="form-login">
{{-- <label>Confirm Password</label> --}}
<div class="pass-group">
<input type="password" id="password_confirmation" class="pass-input" name="password_confirmation" placeholder="Enter your Confirm password">
<span class="fas toggle-password fa-eye-slash"></span>
</div>
</div>

<div class="form-login">
<button type="submit" class="btn btn-login">Sign Up</button>
</div>
<div class="signinform text-center">
<h4>Already a user? <a href="{{route('login')}}" class="hover-a">Sign In</a></h4>
</div>
<div class="form-setlogin">
<h4>Or sign up with</h4>
</div>
<div class="form-sociallink">
<ul>
<li>
<a href="javascript:void(0);">
<img src="{{asset('backend/assets/img/icons/google.png')}}" class="me-2" alt="google">
Sign Up using Google
</a>
</li>
<li>
 <a href="javascript:void(0);">
<img src="{{asset('backend/assets/img/icons/facebook.png')}}" class="me-2" alt="google">
Sign Up using Facebook
</a>
</li>
</ul>
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