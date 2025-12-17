<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Login')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Bootstrap CSS --}}
    <link rel="stylesheet" href="{{ asset('assets-guest/vendor/bootstrap/css/bootstrap.min.css') }}">

    {{-- Bootstrap Icons --}}
    <link rel="stylesheet" href="{{ asset('assets-guest/vendor/bootstrap-icons/bootstrap-icons.css') }}">

    {{-- Custom Guest CSS --}}
    <link rel="stylesheet" href="{{ asset('assets-guest/css/style.css') }}">

    {{-- Background Login --}}
    <style>
        body.login-bg {
            min-height: 100vh;
            background:
                linear-gradient(rgba(0,0,0,0.45), rgba(0,0,0,0.45)),
                url('{{ asset('assets-guest/img/login/login.jpg') }}')
                no-repeat center center;
            background-size: cover;
        }
    </style>
</head>

<body class="login-bg">

    <main class="d-flex align-items-center justify-content-center min-vh-100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-8 col-lg-5">
                    @yield('content')
                </div>
            </div>
        </div>
    </main>

    {{-- Bootstrap JS --}}
    <script src="{{ asset('assets-guest/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
