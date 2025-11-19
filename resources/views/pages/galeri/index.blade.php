@extends('layouts.guest.app')

@section('content')

    <!-- Galeri Section Start -->
    <div class="container py-5 mt-5 pt-5" style="margin-top: 140px;">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div class="text-start">
                <h5 class="text-uppercase text-primary mb-1">DOKUMENTASI</h5>
                <h1 class="mb-0">Galeri Kegiatan Terbaru</h1>
            </div>
            
            <!-- Tombol Tambah Data -->
            <a href="{{ route('galeri.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-circle"></i> Tambah Data
            </a>
        </div>

        {{-- Flash message (notifikasi sukses/error) --}}
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif


        <div class="row justify-content-start">
            @forelse ($galeris as $item)
                <div class="col-md-6 col-lg-4 col-xl-3 mb-4">
                    <div class="service-item text-center">
                        <img src="{{ asset('storage/' . $item->foto) }}" class="img-fluid w-100"
                            alt="{{ $item->judul }}">
                    </div>

                    <h5 class="mt-3 fw-bold">{{ $item->judul }}</h5>
                    <p class="text-muted">{{ $item->deskripsi }}</p>

                    <!-- Tombol Edit dan Hapus SELALU tampil -->
                    <div class="d-flex justify-content-center gap-2 mt-2">
                        <a href="{{ route('galeri.edit', $item) }}" class="btn btn-sm btn-warning px-3">
                            <i class="bi bi-pencil"></i> Edit
                        </a>
                        <form action="{{ route('galeri.destroy', $item) }}" method="POST"
                            onsubmit="return confirm('Yakin ingin menghapus foto ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger px-3">
                                <i class="bi bi-trash"></i> Hapus
                            </button>
                        </form>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center">
                    <p>Belum ada data galeri.</p>
                </div>
            @endforelse
        </div>
    </div>
    <!-- Galeri Section End -->

@endsection
