<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Login - register</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="{{ asset('logins/images/icons/favicon.ico') }}"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('logins/vendor/bootstrap/css/bootstrap.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('logins/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('logins/fonts/Linearicons-Free-v1.0.0/icon-font.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('logins/vendor/animate/animate.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('logins/vendor/css-hamburgers/hamburgers.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('logins/vendor/select2/select2.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('logins/css/util.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('logins/css/main.css') }}">
    <!--===============================================================================================-->
</head>
<body>

    @yield('content')

<!--===============================================================================================-->
<script src="{{ asset('logins/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
<!--===============================================================================================-->
<script src="{{ asset('logins/vendor/bootstrap/js/popper.js') }}"></script>
<script src="{{ asset('logins/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
<!--===============================================================================================-->
<script src="{{ asset('logins/vendor/select2/select2.min.js') }}"></script>
<!--===============================================================================================-->
<script src="{{ asset('loginss/js/main.js') }}"></script>

</body>
</html>
