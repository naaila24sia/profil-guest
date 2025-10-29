<!DOCTYPE html>
<html lang="en">

{{-- css start --}}
@include('layouts.warga.edit.css')
{{-- css end  --}}

<body>
    <!-- Spinner Start -->
    <div id="spinner"
        class="show w-100 vh-100 bg-white position-fixed translate-middle top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" role="status"></div>
    </div>
    <!-- Spinner End -->

    <!-- Navbar Start -->
    @include('layouts.warga.edit.navbar')
    <!-- Navbar End -->

    <!-- Header Start -->
    @include('layouts.warga.edit.header')
    <!-- Header End -->

    <!-- Form Edit Warga Start -->
    @yield('content')
    <!-- Form Edit Warga End -->

    <!-- Footer Start -->
    @include('layouts.warga.edit.footer')
    <!-- Footer End -->

    {{-- js start --}}
    @include('layouts.warga.edit.js')
    {{-- js end --}}
</body>

</html>
