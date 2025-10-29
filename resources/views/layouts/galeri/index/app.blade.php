<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Galeri Kegiatan</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <!-- CSS Start -->
    @include('layouts.galeri.index.css')
    <!-- CSS End -->
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner"
        class="show w-100 vh-100 bg-white position-fixed translate-middle top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" role="status"></div>
    </div>
    <!-- Spinner End -->

    <!-- Navbar Start -->
   @include('layouts.galeri.index.navbar')
    <!-- Navbar End -->

    <!-- Header Start -->
    @include('layouts.galeri.index.header')
    <!-- Header End -->

    <!-- Galeri Section Start (content) -->
   @yield('content')
    <!-- Galeri Section End (contentt) -->

    <!-- Footer Start -->
    @include('layouts.galeri.index.footer')
    <!-- Footer End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded back-to-top"><i
            class="bi bi-arrow-up"></i></a>

    <!-- JavaScript Start -->
    @include('layouts.galeri.index.js')
    <!-- JavaScript End -->
</body>

</html>
