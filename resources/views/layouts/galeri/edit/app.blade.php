<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Tambah Galeri - Environs</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    {{-- css start --}}
    @include('layouts.galeri.edit.css')
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
    @include('layouts.galeri.edit.navbar')
    <!-- Navbar End -->

    <!-- Header Start -->
    @include('layouts.galeri.edit.header')
    <!-- Header End -->

    <!-- Form Edit Galeri Start -->
    @yield('content')
    <!-- Form Edit Galeri End -->

    <!-- Footer Start -->
    @include('layouts.galeri.edit.footer')
    <!-- Footer End -->

    {{-- javascript start--}}
    @include('layouts.galeri.edit.js')
    {{-- javascript end--}}

</body>

</html>
