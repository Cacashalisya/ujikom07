<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- mobile metas -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="viewport" content="initial-scale=1, maximum-scale=1">
<!-- site metas -->
<title>Register</title>
<meta name="keywords" content="">
<meta name="description" content="">
<meta name="author" content="">
<!-- owl carousel style -->
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.0.0-beta.2.4/assets/owl.carousel.min.css" />
<!-- bootstrap css -->
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<!-- style css -->
<link rel="stylesheet" type="text/css" href="css/style.css">
<!-- Responsive-->
<link rel="stylesheet" href="css/responsive.css">
<!-- fevicon -->
<link rel="icon" href="images/fevicon.png" type="image/gif" />
<!-- Scrollbar Custom CSS -->
<link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
<!-- Tweaks for older IEs-->
<link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
<!-- owl stylesheets --> 
<link rel="stylesheet" href="css/owl.carousel.min.css">
<link rel="stylesheet" href="css/owl.theme.default.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">

{{-- Ini Custom --}}
@php( $login_url = View::getSection('login_url') ?? config('adminlte.login_url', 'login') )
@php( $register_url = View::getSection('register_url') ?? config('adminlte.register_url', 'register') )

@if (config('adminlte.use_route_url', false))
@php( $login_url = $login_url ? route($login_url) : '' )
@php( $register_url = $register_url ? route($register_url) : '' )
@else
@php( $login_url = $login_url ? url($login_url) : '' )
@php( $register_url = $register_url ? url($register_url) : '' )
@endif
</head>
<body>
<!--header section start -->
<div class="header_section header_bg">
<div class="container">
<nav class="navbar navbar-dark bg-dark">
<a class="logo" href="main"><img src="/images/logo2.png" width="200px"></a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample01" aria-controls="navbarsExample01" aria-expanded="false" aria-label="Toggle navigation">
<span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="navbarsExample01">
<ul class="navbar-nav mr-auto">
<li class="nav-item">
<a class="nav-link" href="main">Home</a>
</li>
<li class="nav-item">
<a class="nav-link" href="about">About</a>
</li>
<li class="nav-item">
<a class="nav-link" href="services">Services</a>
</li>
<li class="nav-item">
<a class="nav-link" href="blog">Blog</a>
</li>
<li class="nav-item">
<a class="nav-link" href="client">Client</a>
</li>
<li class="nav-item">
<a class="nav-link" href="contact">Contact Us</a>
</li>
</ul>
</div>
</nav>
</div>
</div>
<!--header section end -->
<div class="contact_section layout_padding">
<div class="container">
<h1 class="touch_taital">Sign Up</h1>
<div class="contact_section_2">
<div class="row">
<div class="col-md-6">
<form action="{{ $register_url }}" method="post">
@csrf

{{-- Name field --}}
<div class="input-group mb-3">
<input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
value="{{ old('name') }}" placeholder="{{ __('adminlte::adminlte.full_name') }}" autofocus>

<div class="input-group-append">
<div class="input-group-text">
<span class="fas fa-user {{ config('adminlte.classes_auth_icon', '') }}"></span>
</div>
</div>

@error('name')
<span class="invalid-feedback" role="alert">
<strong>{{ $message }}</strong>
</span>
@enderror
</div>

{{-- Email field --}}
<div class="input-group mb-3">
<input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
value="{{ old('email') }}" placeholder="{{ __('adminlte::adminlte.email') }}">

<div class="input-group-append">
<div class="input-group-text">
<span class="fas fa-envelope {{ config('adminlte.classes_auth_icon', '') }}"></span>
</div>
</div>

@error('email')
<span class="invalid-feedback" role="alert">
<strong>{{ $message }}</strong>
</span>
@enderror
</div>

{{-- Password field --}}
<div class="input-group mb-3">
<input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
placeholder="{{ __('adminlte::adminlte.password') }}">

<div class="input-group-append">
<div class="input-group-text">
<span class="fas fa-lock {{ config('adminlte.classes_auth_icon', '') }}"></span>
</div>
</div>

@error('password')
<span class="invalid-feedback" role="alert">
<strong>{{ $message }}</strong>
</span>
@enderror
</div>

{{-- Confirm password field --}}
<div class="input-group mb-3">
<input type="password" name="password_confirmation"
class="form-control @error('password_confirmation') is-invalid @enderror"
placeholder="{{ __('adminlte::adminlte.retype_password') }}">

<div class="input-group-append">
<div class="input-group-text">
<span class="fas fa-lock {{ config('adminlte.classes_auth_icon', '') }}"></span>
</div>
</div>

@error('password_confirmation')
<span class="invalid-feedback" role="alert">
<strong>{{ $message }}</strong>
</span>
@enderror
</div>

{{-- Register button --}}
<button type="submit" class="btn btn-block {{ config('adminlte.classes_auth_btn', 'btn-flat btn-primary') }}">
<span class="fas fa-user-plus"></span>
{{ __('adminlte::adminlte.register') }}
</button>

</form>

@section('auth_footer')
<p class="my-0">
<a href="{{ $login_url }}">
{{ __('adminlte::adminlte.i_already_have_a_membership') }}
</a>
</p>
@stop

</div>
<div class="col-md-6">
<img src="https://img.freepik.com/free-vector/realistic-hello-summer-sale-illustration_52683-61658.jpg?w=740&t=st=1686623536~exp=1686624136~hmac=276c3d686fff0081c0205f32e9194ac701f37f3704e9600157fd9c0d065b4155" width="500px" alt="">
</div>
</div>
</div>
</div>
</div>
<!--client section end -->
<!--copyright section start -->
<div class="copyright_section">
<div class="container">
<p class="copyright_text">Copyright 2023 All Right Reserved By <a href="https://html.design">Free Html Templates</a> Distributed by: <a href="https://themewagon.com">ThemeWagon</a></p>
</div>
</div>
<!--copyright section end -->
<!-- Javascript files-->
<script src="js/jquery.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/jquery-3.0.0.min.js"></script>
<script src="js/plugin.js"></script>
<!-- sidebar -->
<script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="js/custom.js"></script>
<!-- javascript --> 
<script src="js/owl.carousel.js"></script>
<script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script> 
<script type="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2//2.0.0-beta.2.4/owl.carousel.min.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
<script src="../../assets/js/vendor/popper.min.js"></script>
<script src="../../dist/js/bootstrap.min.js"></script>
</body>
</html>