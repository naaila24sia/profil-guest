@extends('layouts.guest.app')

@section('content')
    <!-- Header Start -->
    <div class="container-fluid bg-breadcrumb" style="margin-top: -30px;">
        <div class="container text-center py-5 mt-0" style="max-width: 900px;">
            <h3 class="text-white display-3 mb-4">Form Tambah Data</h3>
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('profil.index') }}">Profil</a></li>
                <li class="breadcrumb-item active text-white">Tambah</li>
            </ol>
        </div>
    </div>

    <!-- Form Start -->
    <div class="container py-5">
        <div class="mx-auto bg-light p-5 rounded shadow" style="max-width:95%;">

            <h3 class="text-center mb-4 text-primary">Form Tambah Profil Desa</h3>

            <form action="{{ route('profil.store') }}" method="POST">
                @csrf

                <div class="row g-4">

                    <!-- KOLom KIRI -->
                    <div class="col-md-4">

                        <div class="mb-3">
                            <label class="form-label">Nama Desa</label>
                            <input type="text" name="nama_desa" class="form-control" placeholder="Masukkan nama desa"
                                required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Kecamatan</label>
                            <input type="text" name="kecamatan" class="form-control" placeholder="Masukkan kecamatan"
                                required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Kabupaten</label>
                            <input type="text" name="kabupaten" class="form-control" placeholder="Masukkan kabupaten"
                                required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Provinsi</label>
                            <input type="text" name="provinsi" class="form-control" placeholder="Masukkan provinsi"
                                required>
                        </div>

                    </div>

                    <!-- KOLOM TENGAH -->
                    <div class="col-md-4">

                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" placeholder="Masukkan email desa"
                                required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Telepon</label>
                            <input type="text" name="telepon" class="form-control" placeholder="Masukkan nomor telepon"
                                required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Alamat Kantor</label>
                            <textarea name="alamat_kantor" class="form-control" rows="4" placeholder="Masukkan alamat kantor desa" required></textarea>
                        </div>

                    </div>

                    <!-- KOLOM KANAN -->
                    <div class="col-md-4">

                        <div class="mb-3">
                            <label class="form-label">Visi</label>
                            <textarea name="visi" class="form-control" rows="5" placeholder="Masukkan visi desa" required></textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Misi</label>
                            <textarea name="misi" class="form-control" rows="5" placeholder="Masukkan misi desa" required></textarea>
                        </div>

                    </div>
                </div>

                <div class="text-center mt-4">
                    <button type="submit" class="btn btn-primary px-4 py-2">Simpan</button>
                    <a href="{{ route('profil.index') }}" class="btn btn-secondary px-4 py-2">Batal</a>
                </div>

            </form>

        </div>
    </div>
    <!-- Form End -->
@endsection
