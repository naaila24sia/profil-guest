@extends('layouts.guest.app')

@section('content')
<!-- Form Start (content) -->
    <<div class="container py-5" style="margin-top:90px;">
        <div class="col-lg-8 mx-auto bg-light p-5 rounded shadow">
            <h3 class="text-center mb-4 text-primary">Form Tambah Galeri</h3>
            <form action="{{ route('galeri.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Judul</label>
                    <input type="text" name="judul" class="form-control" placeholder="Masukkan judul galeri" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Deskripsi</label>
                    <textarea name="deskripsi" class="form-control" rows="3" placeholder="Tuliskan deskripsi singkat" required></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Foto</label>
                    <input type="file" name="foto" class="form-control" accept="image/*" required>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary px-4 py-2">Simpan</button>
                    <a href="{{ route('galeri.index') }}" class="btn btn-secondary px-4 py-2">Batal</a>
                </div>
            </form>
        </div>
    </div>
    <!-- Form End (content) -->

@endsection
