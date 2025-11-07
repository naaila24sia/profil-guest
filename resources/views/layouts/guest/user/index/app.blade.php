<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Data User</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    {{-- css start --}}
    @include('layouts.guest.user.index.css')
    {{-- css end --}}
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner"
        class="show w-100 vh-100 bg-white position-fixed translate-middle top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" role="status"></div>
    </div>
    <!-- Spinner End -->

    <!-- Navbar Start -->
    @include('layouts.guest.user.index.navbar')
    <!-- Navbar End -->

    <!-- Header Start -->
    @include('layouts.guest.user.index.header')
    <!-- Header End -->

    <!-- Data User Section Start -->
    @yield('content')
    <!-- Data User Section End -->

    <!-- Footer Start -->
    @include('layouts.guest.user.index.footer')
    <!-- Footer End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded back-to-top"><i
            class="bi bi-arrow-up"></i></a>

    {{-- js start --}}
    @include('layouts.guest.user.index.js')
    {{-- js end --}}
</body>

</html>
