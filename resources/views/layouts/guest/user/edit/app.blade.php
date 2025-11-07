<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Edit Data User - Bina Desa</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    {{-- css start --}}
    @include('layouts.guest.user.edit.css')
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
    @include('layouts.guest.user.edit.navbar')
    <!-- Navbar End -->

    <!-- Header Start -->
    @include('layouts.guest.user.edit.header')
    <!-- Header End -->

    <!-- Form Edit User Start -->
    @yield('content')
    <!-- Form Edit User End -->

    <!-- Footer Start -->
    @include('layouts.guest.user.edit.footer')
    <!-- Footer End -->

    {{-- js start --}}
    @include('layouts.guest.user.edit.js')
    {{-- js end --}}
</body>

</html>
