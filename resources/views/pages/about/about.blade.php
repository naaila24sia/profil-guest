@extends('layouts.guest.app');

@section('content')

        <!-- CARD UTAMA -->
        <div class="card shadow border-0 mb-5" style="margin-top:90px;">
            <div class="card-body text-center p-5">
                <h3 class="text-warning mb-3"><i class="fas fa-bullseye"></i> Tujuan Aplikasi</h3>
                <p>
                    Aplikasi <strong>Bina Desa</strong> dirancang untuk membantu pengelolaan data warga, kegiatan, dan
                    informasi desa secara efisien dan terintegrasi.
                </p>
            </div>
        </div>

        <!-- 3 CARD TUJUAN -->
        <div class="row text-center">
            <div class="col-md-4 mb-4">
                <div class="card shadow border-0 p-4">
                    <i class="fas fa-database fa-2x text-success mb-3"></i>
                    <h5>Data Terpusat</h5>
                    <p>Seluruh informasi warga dan kegiatan disimpan dalam satu sistem agar mudah diakses.</p>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card shadow border-0 p-4">
                    <i class="fas fa-handshake fa-2x text-warning mb-3"></i>
                    <h5>Kolaboratif</h5>
                    <p>Memudahkan perangkat desa bekerja sama dalam pembaruan dan validasi data.</p>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card shadow border-0 p-4">
                    <i class="fas fa-chart-line fa-2x text-info mb-3"></i>
                    <h5>Transparansi</h5>
                    <p>Meningkatkan kepercayaan masyarakat melalui laporan kegiatan yang terbuka.</p>
                </div>
            </div>
        </div>

        <!-- CARD ALUR -->
        <div class="card shadow border-0 p-5 mt-5">
            <h3 class="text-center text-warning mb-4"><i class="fas fa-route"></i> Alur Aplikasi</h3>
            <ol class="fs-5">
                <li>Pengguna membuka halaman utama <strong>Bina Desa</strong>.</li>
                <li>Admin atau perangkat desa melakukan login.</li>
                <li>Data warga dapat ditambah, diedit, atau dihapus.</li>
                <li>Hasil data divisualisasikan dalam dashboard interaktif.</li>
            </ol>
        </div>
    </div>
@endsection
