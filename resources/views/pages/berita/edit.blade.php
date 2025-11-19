@extends('layouts.guest.app')

@section('content')
<!-- Form Edit Berita Start -->
<div class="container py-5" style="margin-top:80px;">
    <div class="col-lg-8 mx-auto bg-light p-5 rounded shadow">
        <h3 class="text-center mb-4 text-primary">Form Edit Berita</h3>

        <form action="{{ route('berita.update', $berita) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Kategori -->
            <div class="mb-3">
                <label class="form-label">Kategori</label>
                <select name="kategori_id" class="form-control" required>
                    <option value="">-- Pilih Kategori --</option>
                    @foreach ($kategori as $k)
                        <option value="{{ $k->kategori_id }}"
                            {{ $k->kategori_id == $berita->kategori_id ? 'selected' : '' }}>
                            {{ $k->nama }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Judul -->
            <div class="mb-3">
                <label class="form-label">Judul</label>
                <input type="text" name="judul" class="form-control"
                       value="{{ old('judul', $berita->judul) }}"
                       placeholder="Masukkan judul berita" required>
            </div>

            <!-- Slug -->
            <div class="mb-3">
                <label class="form-label">Slug (opsional)</label>
                <input type="text" name="slug" class="form-control"
                       value="{{ old('slug', $berita->slug) }}"
                       placeholder="Kosongkan untuk otomatis">
            </div>

            <!-- Isi Berita -->
            <div class="mb-3">
                <label class="form-label">Isi Berita</label>
                <textarea name="isi_html" class="form-control" rows="6"
                          placeholder="Tulis isi berita..." required>{{ old('isi_html', $berita->isi_html) }}</textarea>
            </div>

            <!-- Penulis -->
            <div class="mb-3">
                <label class="form-label">Penulis</label>
                <input type="text" name="penulis" class="form-control"
                       value="{{ old('penulis', $berita->penulis) }}"
                       placeholder="Nama penulis (opsional)">
            </div>

            <!-- Status -->
            <div class="mb-3">
                <label class="form-label">Status</label>
                <select name="status" class="form-control" required>
                    <option value="draft" {{ $berita->status == 'draft' ? 'selected' : '' }}>Draft</option>
                    <option value="published" {{ $berita->status == 'published' ? 'selected' : '' }}>Published</option>
                </select>
            </div>
            <!-- Tanggal Terbit -->
            <div class="mb-3">
                <label class="form-label">Tanggal Terbit (optional)</label>
                <input type="datetime-local" name="terbit_at" class="form-control"
                       value="{{ old('terbit_at', $berita->terbit_at ? date('Y-m-d\TH:i', strtotime($berita->terbit_at)) : '') }}">
            </div>

            <!-- Tombol -->
            <div class="text-center">
                <button type="submit" class="btn btn-primary px-4 py-2">Simpan</button>
                <a href="{{ route('berita.index') }}" class="btn btn-secondary px-4 py-2">Batal</a>
            </div>
        </form>
    </div>
</div>
<!-- Form Edit Berita End -->
@endsection
