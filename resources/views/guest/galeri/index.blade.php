<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Galeri Kegiatan</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <!-- Fonts & Styles -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Jost:wght@500;600&family=Roboto&display=swap"
        rel="stylesheet">

    <link rel="stylesheet"
        href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css"
        rel="stylesheet">

    <link href="{{ asset('assets-guest/vendor/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets-guest/vendor/lightbox/css/lightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets-guest/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets-guest/css/style.css') }}" rel="stylesheet">
</head>

<body>
    <!-- Navbar -->
    <div class="container-fluid fixed-top px-0">
        <div class="container px-0">
            <nav class="navbar navbar-light bg-light navbar-expand-xl">
                <a href="{{ route('dashboard') }}" class="navbar-brand ms-3">
                    <h1 class="text-primary display-5">Environs</h1>
                </a>
                <button class="navbar-toggler py-2 px-3 me-3" type="button"
                    data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars text-primary"></span>
                </button>
                <div class="collapse navbar-collapse bg-light" id="navbarCollapse">
                    <div class="navbar-nav ms-auto">
                        <a href="{{ route('dashboard') }}" class="nav-item nav-link">Home</a>
                        <a href="#" class="nav-item nav-link">Profil</a>
                        <a href="#" class="nav-item nav-link">Berita</a>
                        <a href="#" class="nav-item nav-link">Agenda</a>
                        <a href="{{ route('galeri.index') }}" class="nav-item nav-link active">Galeri</a>
                    </div>
                </div>
            </nav>
        </div>
    </div>

    <!-- Header -->
    <div class="container-fluid bg-breadcrumb">
        <div class="container text-center py-5" style="max-width: 900px;">
            <h3 class="text-white display-3 mb-4">Galeri Kegiatan</h3>
            <p class="fs-5 text-white mb-4">Dokumentasi kegiatan dan aktivitas terbaru kami.</p>
        </div>
    </div>

    <!-- Flash Message -->
    <div class="container mt-4">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle me-2"></i>{{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif
    </div>

    <!-- Form Tambah Galeri -->
    <div class="container py-5">
        <div class="card border-0 shadow mb-5">
            <div class="card-body">
                <h3 class="mb-4 text-primary">Tambah Galeri Baru</h3>

                <form action="{{ route('galeri.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label fw-bold">Judul Foto</label>
                        <input type="text" name="judul" class="form-control" placeholder="Masukkan judul foto" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Deskripsi</label>
                        <textarea name="deskripsi" class="form-control" rows="3" placeholder="Tulis deskripsi kegiatan (opsional)"></textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Upload Foto</label>
                        <input type="file" name="foto" class="form-control" accept="image/*" required>
                    </div>

                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-upload me-2"></i> Simpan
                    </button>
                </form>
            </div>
        </div>

        <!-- Daftar Galeri -->
        <div class="text-center mx-auto pb-5" style="max-width: 800px;">
            <h5 class="text-uppercase text-primary">Dokumentasi</h5>
            <h1 class="mb-0">Galeri Kegiatan Terbaru</h1>
        </div>

        <div class="row g-4">
            @forelse ($galeris as $item)
                <div class="col-md-6 col-lg-4 col-xl-3">
                    <div class="service-item">
                        <img src="{{ asset('storage/' . $item->foto) }}"
                            class="img-fluid w-100 rounded shadow-sm"
                            alt="{{ $item->judul }}"
                            style="height: 220px; object-fit: cover;">
                        <div class="service-link">
                            <a href="{{ asset('storage/' . $item->foto) }}"
                                data-lightbox="galeri" class="h5 mb-0">{{ $item->judul }}</a>
                        </div>
                    </div>
                    <p class="my-3 text-center">{{ $item->deskripsi ?? '-' }}</p>
                </div>
            @empty
                <div class="text-center text-muted">
                    <p>Belum ada foto di galeri.</p>
                </div>
            @endforelse
        </div>
    </div>

    <!-- Footer -->
    <div class="container-fluid footer bg-dark text-body py-5">
        <div class="container text-center">
            <p class="text-light mb-0">© {{ date('Y') }} - Semua hak cipta dilindungi.</p>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets-guest/vendor/easing/easing.min.js') }}"></script>
    <script src="{{ asset('assets-guest/vendor/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('assets-guest/vendor/counterup/counterup.min.js') }}"></script>
    <script src="{{ asset('assets-guest/vendor/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets-guest/vendor/lightbox/js/lightbox.min.js') }}"></script>
    <script src="{{ asset('assets-guest/js/main.js') }}"></script>
</body>

</html>
