@extends('layouts.guest.app')

@section('content')
    <!-- Header -->
    <div class="container-fluid bg-breadcrumb" style="margin-top: -30px;">
        <div class="container text-center py-5" style="max-width: 900px;">
            <h3 class="text-white display-3 mb-4">Developer</h3>
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active text-white">Developer</li>
            </ol>
        </div>
    </div>

    <!-- Developer Content -->
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-10">

                <div class="card shadow-lg border-0 rounded-4">
                    <div class="card-body p-5">
                        <div class="row align-items-center g-5">

                            {{-- INFO KIRI --}}
                            <div class="col-lg-7">

                                <h6 class="text-uppercase text-primary mb-2" style="letter-spacing:2px">
                                    Identitas Pengembang
                                </h6>

                                <h1 class="fw-bold mb-4">
                                    Naaila Raqila Prismart
                                </h1>

                                <div class="mb-4">
                                    <p class="mb-2 text-muted">
                                        <i class="fas fa-id-card me-2 text-primary"></i>
                                        <strong>NIM:</strong> 2457301101
                                    </p>

                                    <p class="mb-2 text-muted">
                                        <i class="fas fa-graduation-cap me-2 text-primary"></i>
                                        <strong>Program Studi:</strong> Sistem Informasi
                                    </p>

                                    <p class="mb-2 text-muted">
                                        <i class="fas fa-university me-2 text-primary"></i>
                                        <strong>Institusi:</strong> Politeknik Caltex Riau
                                    </p>

                                    <div class="mb-4">
                                        <p class="fs-6 text-muted mb-1"> <i class="fas fa-envelope me-2 text-primary"></i>
                                            <strong>Email:</strong>
                                            <a href="mailto:naaila24si@mahasiswa.pcr.ac.id"
                                                class="text-decoration-none text-muted"> naaila24si@mahasiswa.pcr.ac.id </a>
                                        </p>
                                    </div>
                                </div>

                                <p class="text-muted lh-lg mb-4" style="max-width: 520px;">
                                    Pengembang website <strong>Sistem Informasi Desa (SiDesa)</strong>
                                    yang dirancang untuk menyajikan informasi desa secara
                                    transparan, terintegrasi, dan mudah diakses oleh warga.
                                </p>

                                {{-- SOSIAL MEDIA --}}
                                <div class="d-flex gap-3 flex-wrap"> <a href="https://www.linkedin.com/in/naila-raqila-prismart-339726394"
                                        target="_blank" class="btn btn-outline-primary rounded-circle"> <i
                                            class="fab fa-linkedin-in"></i>
                                    </a> <a href="https://github.com/naaila24sia/profil-guest.git" target="_blank"
                                        class="btn btn-outline-dark rounded-circle"> <i class="fab fa-github"></i> </a> <a
                                        href="https://instagram.com/raqilanaila" target="_blank"
                                        class="btn btn-outline-danger rounded-circle"> <i class="fab fa-instagram"></i> </a>
                                </div>
                            </div>

                            {{-- FOTO KANAN --}}
                            <div class="col-lg-5 text-center">
                                <img src="{{ asset('assets-guest/img/developer.jpg') }}" alt="Foto Developer"
                                    class="img-fluid rounded-4 shadow"
                                    style="max-width: 300px; width: 90%; aspect-ratio: 4 / 4; object-fit: cover;">
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
<!-- Developer Content End -->
