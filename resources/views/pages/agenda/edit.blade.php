@extends('layouts.guest.app')

@section('content')

<!-- Header Start -->
<div class="container-fluid bg-breadcrumb" style="margin-top: -30px;">
    <div class="container text-center py-5 mt-0" style="max-width: 900px;">
        <h3 class="text-white display-3 mb-4">Form Edit Data</h3>
        <ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('agenda.index') }}">Agenda</a></li>
            <li class="breadcrumb-item active text-white">Edit</li>
        </ol>
    </div>
</div>

<!-- Form Edit Agenda Start -->
<div class="container py-5">
    <div class="bg-light p-5 rounded shadow mx-auto" style="max-width: 1200px;">
        <h3 class="text-center mb-4 text-primary">Form Edit Agenda</h3>

        <form action="{{ route('agenda.update', $agenda->agenda_id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row">

                <!-- KIRI -->
                <div class="col-md-4">

                    <!-- Judul -->
                    <div class="mb-3">
                        <label class="form-label">Judul Agenda</label>
                        <input type="text" name="judul" class="form-control"
                               value="{{ old('judul', $agenda->judul) }}" required>
                    </div>

                    <!-- Lokasi -->
                    <div class="mb-3">
                        <label class="form-label">Lokasi</label>
                        <input type="text" name="lokasi" class="form-control"
                               value="{{ old('lokasi', $agenda->lokasi) }}" required>
                    </div>

                    <!-- Foto Cover -->
                    <div class="mb-3">
                        <label class="form-label">Foto Cover (opsional)</label>
                        <input type="file" name="foto" class="form-control" accept="image/*">
                        <small class="text-muted">Biarkan kosong jika tidak ingin mengganti foto.</small>

                        @php
                            $media = \App\Models\Media::where('ref_table', 'agenda')
                                ->where('ref_id', $agenda->agenda_id)
                                ->first();
                        @endphp

                        @if ($media)
                            <div class="mt-2">
                                <img src="{{ asset('storage/uploads/agenda/' . $media->file_name) }}"
                                    width="180" class="rounded shadow-sm">
                            </div>
                        @endif
                    </div>

                </div>

                <!-- TENGAH -->
                <div class="col-md-4">

                    <!-- Penyelenggara -->
                    <div class="mb-3">
                        <label class="form-label">Penyelenggara</label>
                        <input type="text" name="penyelenggara" class="form-control"
                               value="{{ old('penyelenggara', $agenda->penyelenggara) }}" required>
                    </div>

                    <!-- Tanggal Mulai -->
                    <div class="mb-3">
                        <label class="form-label">Tanggal Mulai</label>
                        <input type="date" name="tanggal_mulai" class="form-control"
                               value="{{ old('tanggal_mulai', $agenda->tanggal_mulai) }}" required>
                    </div>

                    <!-- Tanggal Selesai -->
                    <div class="mb-3">
                        <label class="form-label">Tanggal Selesai</label>
                        <input type="date" name="tanggal_selesai" class="form-control"
                               value="{{ old('tanggal_selesai', $agenda->tanggal_selesai) }}" required>
                    </div>

                </div>

                <!-- KANAN -->
                <div class="col-md-4">
                    <div class="mb-3 h-100">
                        <label class="form-label">Deskripsi</label>
                        <textarea name="deskripsi" class="form-control" rows="8" required>{{ old('deskripsi', $agenda->deskripsi) }}</textarea>
                    </div>
                </div>

            </div>

            <!-- TOMBOL PALING BAWAH SEJAJAR -->
            <div class="text-right mt-4">
                <button type="submit" class="btn btn-primary px-4 py-2">Simpan</button>
                <a href="{{ route('agenda.index') }}" class="btn btn-secondary px-4 py-2">Batal</a>
            </div>

        </form>
    </div>
</div>



<!-- Form Edit Agenda End -->

@endsection
