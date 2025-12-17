@extends('layouts.guest.app')

@section('content')
    <!-- Header Start -->
    <div class="container-fluid bg-breadcrumb" style="margin-top: -30px;">
        <div class="container text-center py-5 mt-0" style="max-width: 900px;">
            <h3 class="text-white display-3 mb-4">Form Tambah Data</h3>
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('berita.index') }}">Berita</a></li>
                <li class="breadcrumb-item active text-white">Tambah</li>
            </ol>
        </div>
    </div>

    <!-- Form Start (content) -->
    <div class="container py-5">
        <div class="col-lg-15 mx-auto bg-light p-5 rounded shadow">
            <h3 class="text-center mb-4 text-primary">Form Tambah Berita</h3>

            <form action="{{ route('berita.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row g-4">

                    {{-- KOLOM KIRI --}}
                    <div class="col-md-4">

                        <div class="mb-3">
                            <label class="form-label">Kategori</label>
                            <select name="kategori_id" class="form-control" required>
                                <option value="">-- Pilih Kategori --</option>
                                @foreach ($kategori as $k)
                                    <option value="{{ $k->kategori_id }}">{{ $k->nama }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Status</label>
                            <select name="status" class="form-control" required>
                                <option value="draft">Draft</option>
                                <option value="published">Published</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Tanggal Terbit</label>
                            <input type="datetime-local" name="terbit_at" class="form-control">
                        </div>

                    </div>

                    {{-- KOLOM TENGAH --}}
                    <div class="col-md-4">

                        <div class="mb-3">
                            <label class="form-label">Judul</label>
                            <input type="text" name="judul" class="form-control" placeholder="Masukkan judul berita"
                                required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Slug (opsional)</label>
                            <input type="text" name="slug" class="form-control"
                                placeholder="Kosongkan untuk otomatis">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Penulis</label>
                            <input type="text" name="penulis" class="form-control" placeholder="Nama penulis">
                        </div>

                    </div>

                    {{-- KOLOM KANAN --}}
                    <div class="col-md-4">

                        <div class="mb-3">
                            <label class="form-label">Isi Berita</label>
                            <textarea name="isi_html" class="form-control" rows="7" placeholder="Tulis isi berita..." required></textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Upload Foto</label>
                            <input type="file" name="files[]" class="form-control" multiple>
                        </div>

                    </div>

                </div>

                {{-- TOMBOL --}}
                <div class="text-center mt-4">
                    <button type="submit" class="btn btn-primary px-4 py-2">Simpan</button>
                    <a href="{{ route('berita.index') }}" class="btn btn-secondary px-4 py-2">Batal</a>
                </div>

            </form>

        </div>
    </div>
    <!-- Form End (content) -->
@endsection
