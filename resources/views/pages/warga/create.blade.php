@extends('layouts.guest.app')

@section('content')
    <!-- Header Start -->
    <div class="container-fluid bg-breadcrumb" style="margin-top: -30px;">
        <div class="container text-center py-5 mt-0" style="max-width: 900px;">
            <h3 class="text-white display-3 mb-4">Form Tambah Data</h3>
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('warga.index') }}">Warga</a></li>
                <li class="breadcrumb-item active text-white">Create</li>
            </ol>
        </div>
    </div>
    <!-- Form Start -->
   <div class="container py-5">
    <div class="col-lg-11 mx-auto bg-light p-5 rounded shadow">
        <h3 class="text-center mb-4 text-primary">Form Tambah Warga</h3>

        <form action="{{ route('warga.store') }}" method="POST">
            @csrf

            <div class="row g-4">

                {{-- KOLOM KIRI --}}
                <div class="col-md-4">

                    <div class="mb-3">
                        <label class="form-label">No KTP</label>
                        <input type="text" name="no_ktp" class="form-control"
                               placeholder="Masukkan nomor KTP" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Nama Lengkap</label>
                        <input type="text" name="nama" class="form-control"
                               placeholder="Masukkan nama lengkap" required>
                    </div>

                     <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control"
                               placeholder="Masukkan email">
                    </div>
                    
                </div>

                {{-- KOLOM TENGAH --}}
                <div class="col-md-4">

                    <div class="mb-3">
                        <label class="form-label">Jenis Kelamin</label>
                        <select name="jenis_kelamin" class="form-select" required>
                            <option value="">-- Pilih Jenis Kelamin --</option>
                            <option value="Laki-Laki">Laki-Laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Agama</label>
                        <input type="text" name="agama" class="form-control"
                               placeholder="Masukkan agama">
                    </div>

                </div>

                {{-- KOLOM KANAN --}}
                <div class="col-md-4">

                    <div class="mb-3">
                        <label class="form-label">Pekerjaan</label>
                        <input type="text" name="pekerjaan" class="form-control"
                               placeholder="Masukkan pekerjaan">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">No Telepon</label>
                        <input type="text" name="telp" class="form-control"
                               placeholder="Masukkan nomor telepon">
                    </div>

                </div>

            </div>

            {{-- TOMBOL --}}
            <div class="text-center mt-4">
                <button type="submit" class="btn btn-primary px-4 py-2">Simpan</button>
                <a href="{{ route('warga.index') }}" class="btn btn-secondary px-4 py-2">Batal</a>
            </div>

        </form>
    </div>
</div>

    <!-- Form End -->
@endsection
