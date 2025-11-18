<!DOCTYPE html>
<html lang="id">

<head>
    {{-- ================= CSS ================= --}}
    @include('layouts.guest.css')
</head>

<body>
    {{-- ================= Header ================= --}}
    @include('layouts.guest.navbar')

    {{-- ================= Main Content ================= --}}
    <main class="py-4">
        @yield('content')
    </main>

    {{-- ================= Footer ================= --}}
    @include('layouts.guest.footer')

    {{-- ================= JS ================= --}}
    @include('layouts.guest.js')
</body>

</html>
