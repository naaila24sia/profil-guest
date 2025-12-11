@extends('layouts.guest.app')

@section('content')
<!-- Header Start -->
    <div class="container-fluid bg-breadcrumb" style="margin-top: -30px;">
        <div class="container text-center py-5 mt-0" style="max-width: 900px;">
            <h3 class="text-white display-3 mb-4">Form Edit Data</h3>
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('kategori.index') }}">Kategori</a></li>
                    <li class="breadcrumb-item active text-white">Edit</li>
                </ol>
        </div>
    </div>
    <!-- Form Edit Kategori Start -->
    <div class="container py-5">
        <div class="col-lg-8 mx-auto bg-light p-5 rounded shadow">
            <h3 class="text-center mb-4 text-primary">Form Edit Kategori Berita</h3>

            <form action="{{ route('kategori.update', $kategori->kategori_id) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Nama Kategori -->
                <div class="mb-3">
                    <label class="form-label">Nama Kategori</label>
                    <input type="text" name="nama" class="form-control"
                        value="{{ old('nama', $kategori->nama) }}" required>
                </div>

                <!-- Slug -->
                <div class="mb-3">
                    <label class="form-label">Slug (opsional)</label>
                    <input type="text" name="slug" class="form-control"
                        value="{{ old('slug', $kategori->slug) }}"
                        placeholder="Kosongkan jika ingin digenerate otomatis">
                </div>

                <!-- Deskripsi -->
                <div class="mb-3">
                    <label class="form-label">Deskripsi (opsional)</label>
                    <textarea name="deskripsi" class="form-control" rows="3"
                        placeholder="Masukkan deskripsi kategori">{{ old('deskripsi', $kategori->deskripsi) }}</textarea>
                </div>

                <!-- Tombol -->
                <div class="text-center">
                    <button type="submit" class="btn btn-primary px-4 py-2">Simpan</button>
                    <a href="{{ route('kategori.index') }}" class="btn btn-secondary px-4 py-2">Batal</a>
                </div>
            </form>
        </div>
    </div>
    <!-- Form Edit Kategori End -->
@endsection
