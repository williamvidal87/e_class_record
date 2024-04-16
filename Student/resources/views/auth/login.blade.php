<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Login - {{ config('app.name') }}</title>
    <!-- Favicon-->
    <link rel="apple-touch-icon" href="{{ asset('app-assets/images/ico/apple-icon-120.png') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('app-assets/images/logo/logo.png') }}">

    <!-- Google Fonts -->
    <link href="{{ asset('student-side/css/font/cyrillic-ext.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('student-side/css/font/icon.css') }}" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="{{ asset('student-side/plugins/bootstrap/css/bootstrap.css') }}" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="{{ asset('student-side/plugins/node-waves/waves.css') }}" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="{{ asset('student-side/plugins/animate-css/animate.css') }}" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="{{ asset('student-side/css/style.css" rel="stylesheet') }}">
    
    <link rel="stylesheet" type="text/css" href="{{ asset('student-side/css/style.css') }}">
</head>

<body style="
background: url(../../app-assets/images/backgrounds/bg-18.jpg) center center no-repeat fixed;
-webkit-background-size: cover;
background-size: cover" class="login-page">
    <div class="login-box">
        <div class="card">
            <div class="body">
                <form id="sign_in" method="POST">
                    <div class="text-center mb-1">
                        <img src="{{ asset('app-assets/images/logo/logo.png') }}" alt="branding logo') }}">
                    </div>
                    <div class="text-center mb-1">
                        <h2><b>Student Portal</b></h2>
                    </div>
                    <x-validation-errors style="color: red" />
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="material-icons">person</i>
                            </span>
                            <div class="form-line">
                                <input type="text" class="form-control" name="id_number" placeholder="ID" :value="old('id_number')" required autofocus autocomplete="username">
                            </div>
                        </div>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="material-icons">lock</i>
                            </span>
                            <div class="form-line">
                                <input type="password" class="form-control" name="password" placeholder="Password" required autocomplete="current-password">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-8 p-t-5">
                                {{-- <input type="checkbox" name="rememberme" id="rememberme" class="filled-in chk-col-pink">
                                <label for="rememberme">Remember Me</label> --}}
                            </div>
                            <div class="col-xs-4">
                                <button class="btn btn-block bg-pink waves-effect" type="submit">SIGN IN</button>
                            </div>
                        </div>
                        <div class="row m-t-15 m-b--20">
                        </div>
                    </form>
                </form>
            </div>
        </div>
    </div>

    <!-- Jquery Core Js -->
    <script src="{{ asset('student-side/plugins/jquery/jquery.min.js') }}"></script>

    <!-- Bootstrap Core Js -->
    <script src="{{ asset('student-side/plugins/bootstrap/js/bootstrap.js') }}"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="{{ asset('student-side/plugins/node-waves/waves.js') }}"></script>

    <!-- Validation Plugin Js -->
    <script src="{{ asset('student-side/plugins/jquery-validation/jquery.validate.js') }}"></script>

    <!-- Custom Js -->
    <script src="{{ asset('student-side/js/admin.js') }}"></script>
    <script src="{{ asset('student-side/js/pages/examples/sign-in.js') }}"></script>
</body>

</html>