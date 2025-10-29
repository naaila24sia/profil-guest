<!DOCTYPE html>
<html lang="en">

{{-- css start --}}
@include('layouts.warga.index.css')
{{-- css end  --}}
<body>
    <!-- Spinner Start -->
    <div id="spinner"
        class="show w-100 vh-100 bg-white position-fixed translate-middle top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" role="status"></div>
    </div>
    <!-- Spinner End -->

    <!-- Navbar Start -->
    @include('layouts.warga.index.navbar')
    <!-- Navbar End -->

    <!-- Header Start -->
    @include('layouts.warga.index.header')
    <!-- Header End -->

    <!-- Data Warga Section Start -->
    @yield('content')
    <!-- Data Warga Section End -->

    <!-- Footer Start -->
    @include('layouts.warga.index.footer')
    <!-- Footer End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded back-to-top"><i
            class="bi bi-arrow-up"></i></a>

    {{-- js start --}}
    @include('layouts.warga.index.js')
    {{-- js end --}}
</body>

</html>
