<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Tambah User - Bina Desa</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    {{-- css start --}}
    @include('layouts.guest.user.create.css')
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
    @include('layouts.guest.user.create.navbar')
    <!-- Navbar End -->

    <!-- Header Start -->
    @include('layouts.guest.user.create.header')
    <!-- Header End -->

    <!-- Form Start -->
    @yield('content')
    <!-- Form End -->

    <!-- Footer Start -->
    @include('layouts.guest.user.create.footer')
    <!-- Footer End -->

    {{-- js start --}}
    @include('layouts.guest.user.create.js')
    {{-- js end --}}
</body>

</html>
