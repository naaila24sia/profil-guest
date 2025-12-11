@extends('layouts.guest.app')

@section('content')
    <!-- Header Start -->
    <div class="container-fluid bg-breadcrumb" style="margin-top: -30px;">
        <div class="container text-center py-5 mt-0" style="max-width: 900px;">
            <h3 class="text-white display-3 mb-4">Form Tambah Data</h3>
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('agenda.index') }}">Agenda</a></li>
                <li class="breadcrumb-item active text-white">Tambah</li>
            </ol>
        </div>
    </div>

    <div class="container py-5">
        <div class="col-lg-8 mx-auto bg-light p-5 rounded shadow">

            <h3 class="text-center mb-4 text-primary">Form Tambah Agenda</h3>

            <form action="{{ route('agenda.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label>Judul</label>
                    <input type="text" name="judul" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Tanggal</label>
                    <input type="date" name="tanggal" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Isi</label>
                    <textarea name="isi" class="form-control"></textarea>
                </div>

                <div class="mb-3">
                    <label>Foto Cover (optional)</label>
                    <input type="file" name="foto" class="form-control">
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>

        </div>
    </div>
@endsection
