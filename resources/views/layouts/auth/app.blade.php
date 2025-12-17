<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SiDesa - Login</title>

    {{-- Google Fonts & Icons --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500;600&family=Roboto&display=swap" rel="stylesheet">

    {{-- Bootstrap (assets-guest) --}}
    <link href="{{ asset('assets-guest/css/bootstrap.min.css') }}" rel="stylesheet">

    {{-- Template CSS (assets-guest) --}}
    <link href="{{ asset('assets-guest/css/style.css') }}" rel="stylesheet">

    <style>
        body {
            background: #FFFEED !important;
            min-height: 100vh;
            font-family: 'Roboto', sans-serif;
        }

        .login-btn:hover {
            background: #e9a85f !important;
        }

        .forgot-hover:hover {
            color: #e9a85f !important;
        }
    </style>
</head>

<body>

    <main class="d-flex align-items-center min-vh-100">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                @yield('content')
            </div>
        </div>
    </main>

    {{-- JS --}}
    <script src="{{ asset('assets-guest/js/bootstrap.bundle.min.js') }}"></script>

</body>

</html>
