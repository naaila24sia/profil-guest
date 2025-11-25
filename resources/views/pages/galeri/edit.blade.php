@extends('layouts.guest.app')

@section('content')
<!-- Form Edit Galeri Start -->
<div class="container py-5" style="margin-top:90px;">
    <div class="col-lg-8 mx-auto bg-light p-5 rounded shadow">
        <h3 class="text-center mb-4 text-primary">Form Edit Galeri</h3>

        <form action="{{ route('galeri.update', $galeri) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            {{-- Tampilkan error validation --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $err)
                            <li>{{ $err }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Judul -->
            <div class="mb-3">
                <label class="form-label">Judul</label>
                <input type="text" name="judul" class="form-control"
                       value="{{ old('judul', $galeri->judul) }}"
                       placeholder="Masukkan judul galeri" required>
            </div>

            <!-- Deskripsi -->
            <div class="mb-3">
                <label class="form-label">Deskripsi</label>
                <textarea name="deskripsi" class="form-control" rows="3"
                          placeholder="Tuliskan deskripsi singkat">{{ old('deskripsi', $galeri->deskripsi) }}</textarea>
            </div>

            <!-- Upload Foto Baru -->
            <div class="mb-3">
                <label class="form-label">Foto (opsional)</label>
                <input type="file" name="foto" class="form-control" accept="image/*">
                <small class="text-muted">Biarkan kosong kalau tidak ingin mengganti foto.</small>
            </div>

            <!-- Tombol -->
            <div class="text-center">
                <button type="submit" class="btn btn-primary px-4 py-2">Simpan Perubahan</button>
                <a href="{{ route('galeri.index') }}" class="btn btn-secondary px-4 py-2">Batal</a>
            </div>
        </form>
    </div>
</div>
<!-- Form Edit Galeri End -->
@endsection
