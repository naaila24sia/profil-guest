@extends('layouts.guest.app')

@section('content')
<!-- Header Start -->
    <div class="container-fluid bg-breadcrumb" style="margin-top: -30px;">
        <div class="container text-center py-5 mt-0" style="max-width: 900px;">
            <h3 class="text-white display-3 mb-4">Form Edit Data</h3>
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('berita.index') }}">Berita</a></li>
                    <li class="breadcrumb-item active text-white">Edit</li>
                </ol>
        </div>
    </div>

    <!-- Form Edit Berita Start -->
    <div class="container py-5">
        <div class="col-lg-8 mx-auto bg-light p-5 rounded shadow">
            <h3 class="text-center mb-4 text-primary">Form Edit Berita</h3>

            {{-- FORM UPDATE BERITA --}}
            <form action="{{ route('berita.update', $berita->berita_id) }}"
                  method="POST"
                  enctype="multipart/form-data">
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

                <!-- Isi -->
                <div class="mb-3">
                    <label class="form-label">Isi Berita</label>
                    <textarea name="isi_html" class="form-control" rows="6" required>{{ old('isi_html', $berita->isi_html) }}</textarea>
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
                    <label class="form-label">Tanggal Terbit (opsional)</label>
                    <input type="datetime-local" name="terbit_at" class="form-control"
                           value="{{ old('terbit_at', $berita->terbit_at ? date('Y-m-d\TH:i', strtotime($berita->terbit_at)) : '') }}">
                </div>

                <!-- Upload Foto Baru -->
                <div class="mb-3">
                    <label class="form-label">Tambah Foto Baru</label>
                    <input type="file" name="files[]" class="form-control" multiple>
                </div>

                <!-- Foto Lama -->
                @php
                    $media = \App\Models\Media::where('ref_table', 'berita')
                                ->where('ref_id', $berita->berita_id)
                                ->get();
                @endphp

                @if ($media->count() > 0)
                    <div class="mb-3">
                        <label class="form-label"><strong>Foto Lama:</strong></label><br>

                        <div class="d-flex gap-3 flex-wrap">
                            @foreach ($media as $m)
                                <div class="text-center">
                                    @if (str_contains($m->mime_type, 'image'))
                                        <img src="{{ asset('storage/uploads/berita/' . $m->file_name) }}"
                                             class="img-thumbnail mb-2"
                                             style="height:120px; width:auto;">
                                    @else
                                        <a href="{{ asset('storage/uploads/berita/' . $m->file_name) }}" target="_blank">
                                            📄 {{ $m->file_name }}
                                        </a>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif

                <!-- Tombol -->
                <div class="text-center mt-4">
                    <button type="submit" class="btn btn-primary px-4 py-2">Simpan</button>
                    <a href="{{ route('berita.index') }}" class="btn btn-secondary px-4 py-2">Batal</a>
                </div>

            </form>
        </div>
    </div>
    <!-- Form Edit Berita End -->
@endsection
