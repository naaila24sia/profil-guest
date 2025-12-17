@extends('layouts.guest.app')

@include('layouts.guest.header')

@section('content')
    {{-- content start --}}

    <!-- Profile Start -->
    <div class="container py-5">
        <div class="row align-items-stretch">

            {{-- FOTO --}}
            <div class="col-lg-6">
                <div class="row g-2" style="height: 320px;">

                    <div class="col-6">
                        <img src="{{ asset('assets-guest/img/profil3.jpg') }}" class="w-100 h-100" style="object-fit: cover;">
                    </div>

                    <div class="col-6">
                        <img src="{{ asset('assets-guest/img/profil2.jpg') }}" class="w-100 h-100"
                            style="object-fit: cover;">
                    </div>
                </div>
            </div>

            {{-- TEKS --}}
            <div class="col-lg-6 d-flex">
                <div class="my-auto">
                    <h5 class="text-uppercase text-primary">Profil Singkat</h5>
                    <h1 class="mb-4">{{ $profil->nama_desa ?? 'Nama Desa' }}</h1>

                    <p class="fs-5 text-muted mb-4">
                        {{ $profil->nama_desa ?? 'Nama Desa' }} merupakan desa yang terletak di
                        Kecamatan {{ $profil->kecamatan ?? '-' }},
                        Kabupaten {{ $profil->kabupaten ?? '-' }},
                        Provinsi {{ $profil->provinsi ?? '-' }}.
                        Website ini menjadi pusat informasi resmi desa.
                    </p>

                    <a href="{{ route('profil.index') }}" class="btn btn-primary">
                        Selengkapnya
                    </a>
                </div>
            </div>

        </div>
    </div>
    <!-- Profile End -->

    <!-- Statistik Start -->

    <!-- RINGKASAN DESA START -->
<div class="container py-5">

    {{-- JUDUL UTAMA --}}
    <div class="mb-5">
        <h5 class="text-uppercase text-primary">
            Ringkasan Desa
        </h5>

        <h1 class="fw-bold mt-2 mb-3">
            Sistem Informasi Desa
        </h1>

        <p class="text-muted fs-5" style="max-width: 720px;">
            Platform digital resmi Desa {{ $profil->nama_desa ?? 'Nama Desa' }} yang
            menyajikan informasi desa secara transparan, terintegrasi,
            dan mudah diakses oleh masyarakat.
        </p>
    </div>

    {{-- KEUNGGULAN --}}
    <div class="row g-4 mb-5">

        <div class="col-md-4">
            <div class="d-flex gap-3">
                <i class="bi bi-shield-check fs-3 text-primary"></i>
                <div>
                    <h6 class="fw-semibold mb-1">Transparan</h6>
                    <p class="text-muted small mb-0">
                        Informasi desa disajikan terbuka dan resmi.
                    </p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="d-flex gap-3">
                <i class="bi bi-diagram-3 fs-3 text-success"></i>
                <div>
                    <h6 class="fw-semibold mb-1">Terintegrasi</h6>
                    <p class="text-muted small mb-0">
                        Berita, agenda, dan galeri saling terhubung.
                    </p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="d-flex gap-3">
                <i class="bi bi-phone fs-3 text-warning"></i>
                <div>
                    <h6 class="fw-semibold mb-1">Mudah Diakses</h6>
                    <p class="text-muted small mb-0">
                        Dapat diakses kapan saja oleh masyarakat.
                    </p>
                </div>
            </div>
        </div>

    </div>

    {{-- PEMISAH --}}
    <hr class="my-5" style="opacity: .1;">

    {{-- STATISTIK --}}
    <div class="row g-4 justify-content-start text-center">

        <div class="col-lg-3 col-md-4 col-sm-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body py-4">
                    <i class="bi bi-newspaper fs-2 text-primary mb-2"></i>
                    <h3 class="fw-bold" data-toggle="counter-up">{{ $totalBerita }}</h3>
                    <p class="text-muted mb-0">Berita</p>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-4 col-sm-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body py-4">
                    <i class="bi bi-calendar-event fs-2 text-success mb-2"></i>
                    <h3 class="fw-bold" data-toggle="counter-up">{{ $totalAgenda }}</h3>
                    <p class="text-muted mb-0">Agenda</p>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-4 col-sm-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body py-4">
                    <i class="bi bi-images fs-2 text-warning mb-2"></i>
                    <h3 class="fw-bold" data-toggle="counter-up">{{ $totalGaleri }}</h3>
                    <p class="text-muted mb-0">Galeri</p>
                </div>
            </div>
        </div>

    </div>

</div>
    <!-- Statistik End -->

    {{-- content end  --}}
@endsection
