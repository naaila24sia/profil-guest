@extends('layouts.guest.galeri.edit.app')

@section('content')
<!-- Form Edit Galeri Start -->
    <div class="container py-5">
        <div class="col-lg-8 mx-auto bg-light p-5 rounded shadow">
            <h3 class="text-center mb-4 text-primary">Form Edit Galeri</h3>

            <form action="{{ route('galeri.update', $galeri) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Judul -->
                <div class="mb-3">
                    <label class="form-label">Judul</label>
                    <input type="text" name="judul" class="form-control" value="{{ old('judul', $galeri->judul) }}"
                        placeholder="Masukkan judul galeri" required>
                </div>

                <!-- Deskripsi -->
                <div class="mb-3">
                    <label class="form-label">Deskripsi</label>
                    <textarea name="deskripsi" class="form-control" rows="3" placeholder="Tuliskan deskripsi singkat" required>{{ old('deskripsi', $galeri->deskripsi) }}</textarea>
                </div>

                <!-- Foto -->
                <div class="mb-3">
                    <label class="form-label">Foto</label>
                    <input type="file" name="foto" class="form-control" accept="image/*">

                    @if ($galeri->foto)
                        <div class="mt-3">
                            <p class="text-muted mb-2">Foto saat ini:</p>
                            <img src="{{ asset('storage/' . $galeri->foto) }}" alt="Foto lama" class="img-thumbnail"
                                width="200">
                        </div>
                    @endif
                </div>

                <!-- Tombol -->
                <div class="text-center">
                    <button type="submit" class="btn btn-primary px-4 py-2">Simpan</button>
                    <a href="{{ route('galeri.index') }}" class="btn btn-secondary px-4 py-2">Batal</a>
                </div>
            </form>
        </div>
    </div>
    <!-- Form Edit Galeri End -->

@endsection
