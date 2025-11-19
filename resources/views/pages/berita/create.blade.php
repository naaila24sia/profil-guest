@extends('layouts.guest.app')

@section('content')
    <!-- Form Start (content) -->
    <div class="container py-5" style="margin-top:80px;">
        <div class="col-lg-8 mx-auto bg-light p-5 rounded shadow">
            <h3 class="text-center mb-4 text-primary">Form Tambah Berita</h3>

            <form action="{{ route('berita.store') }}" method="POST">
                @csrf

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
                    <label class="form-label">Judul</label>
                    <input type="text" name="judul" class="form-control" placeholder="Masukkan judul berita" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Slug (opsional)</label>
                    <input type="text" name="slug" class="form-control" placeholder="Kosongkan untuk otomatis">
                </div>

                <div class="mb-3">
                    <label class="form-label">Isi Berita</label>
                    <textarea name="isi_html" class="form-control" rows="5" placeholder="Tulis isi berita..." required></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Penulis</label>
                    <input type="text" name="penulis" class="form-control" placeholder="Nama penulis (opsional)">
                </div>

                <div class="mb-3">
                    <label class="form-label">Status</label>
                    <select name="status" class="form-control" required>
                        <option value="draft">Draft</option>
                        <option value="published">Published</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Tanggal Terbit (optional)</label>
                    <input type="datetime-local" name="terbit_at" class="form-control">
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary px-4 py-2">Simpan</button>
                    <a href="{{ route('berita.index') }}" class="btn btn-secondary px-4 py-2">Batal</a>
                </div>
            </form>
        </div>
    </div>
    <!-- Form End (content) -->
@endsection
