@extends('layouts.guest.app')

@section('content')

    <!-- Header Start -->
    <div class="container-fluid bg-breadcrumb" style="margin-top: -30px;">
        <div class="container text-center py-5 mt-0" style="max-width: 900px;">
            <h3 class="text-white display-3 mb-4">Galeri</h3>
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active text-white">Galeri</li>
            </ol>
        </div>
    </div>

    <div class="container py-5 mt-5 pt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div class="text-start">
                <h5 class="text-uppercase text-primary mb-1">DOKUMENTASI</h5>
                <h1 class="mb-0">Galeri Kegiatan Terbaru</h1>
            </div>

            @auth
                @if (Auth::user()->role === 'admin')
                    <a href="{{ route('galeri.create') }}" class="btn btn-primary">
                        <i class="bi bi-plus-circle"></i> Tambah Data
                    </a>
                @endif
            @endauth

        </div>

        {{-- Flash message --}}
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        {{-- Search --}}
        <form method="GET" action="{{ route('galeri.index') }}">
            <div class="col-md-4 mb-4">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" value="{{ request('search') }}"
                        placeholder="Search">
                    <button type="submit" class="btn btn-outline-secondary">
                        <i class="bi bi-search"></i>
                    </button>

                    @if (request('search'))
                        <a href="{{ route('galeri.index') }}" class="btn btn-outline-secondary">Clear</a>
                    @endif
                </div>
            </div>
        </form>

        {{-- Galeri List --}}
        <div class="row g-4">
            @forelse ($galeris as $item)
                @php
                    $media = $item->media; // semua foto
                    $cover = $media->first(); // foto utama
                @endphp

                <div class="col-md-6 col-lg-4 col-xl-3">
                    <div class="card h-100 galeri-card overflow-hidden">

                        {{-- FOTO UTAMA --}}
                        @if ($cover)
                            <img id="mainImage{{ $item->galeri_id }}"
                                src="{{ asset('storage/uploads/galeri/' . $cover->file_name) }}" class="mb-3 w-100"
                                style="height:200px; object-fit:cover; border-radius:6px;">
                        @else
                            <img id="mainImage{{ $item->galeri_id }}" src="{{ asset('assets-guest/img/placeholder.jpg') }}"
                                style="height:200px; object-fit:cover; border-radius:6px; opacity:0.7;">
                        @endif

                        {{-- THUMBNAIL (maks 4 foto) --}}
                        <div class="d-flex gap-2 mb-3 flex-wrap px-3">
                            @foreach ($media->take(3) as $m)
                                <img src="{{ asset('storage/uploads/galeri/' . $m->file_name) }}"
                                    onclick="document.getElementById('mainImage{{ $item->galeri_id }}').src=this.src"
                                    style="
                                        height:60px;
                                        width:60px;
                                        object-fit:cover;
                                        border-radius:5px;
                                        cursor:pointer;
                                        border:2px solid #eee;
                                    ">
                            @endforeach

                            {{-- Tombol Lihat Semua Foto --}}
                            @if ($media->count() > 3)
                                <a href="{{ route('galeri.show', $item->galeri_id) }}"
                                    class="d-flex justify-content-center align-items-center"
                                    style="
                                        height:60px;
                                        width:60px;
                                        border-radius:5px;
                                        background:#f0f0f0;
                                        font-size:14px;
                                        text-decoration:none;
                                        color:#333;
                                        border:2px solid #eee;
                                    ">
                                    +{{ $media->count() - 3 }}
                                </a>
                            @endif
                        </div>

                        <div class="card-body">
                            <h5 class="card-title">{{ $item->judul }}</h5>
                            <p class="card-text text-truncate">{{ $item->deskripsi }}</p>
                        </div>

                        {{-- ACTION BUTTONS --}}
                        <div class="card-footer bg-white">
                            <div class="d-flex justify-content-between align-items-center">

                                {{-- DETAIL (PUBLIK) --}}
                                <a href="{{ route('galeri.show', $item) }}" class="btn btn-primary text-white py-2 px-3">
                                    <i class="bi bi-eye"></i> Detail
                                </a>

                                {{-- ADMIN ACTION --}}
                                @auth
                                    @if (Auth::user()->role === 'admin')
                                        <div class="d-flex gap-2">
                                            {{-- EDIT --}}
                                            <a href="{{ route('galeri.edit', $item) }}"
                                                class="btn btn-warning btn-sm px-2 py-1">
                                                <i class="bi bi-pencil"></i>
                                            </a>

                                            {{-- DELETE --}}
                                            <form action="{{ route('galeri.destroy', $item) }}" method="POST"
                                                onsubmit="return confirm('Yakin ingin menghapus?')">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger btn-sm px-2 py-1">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    @endif
                                @endauth
                            </div>
                        </div>
                    </div>
                </div>

            @empty
                <div class="col-12 text-center">
                    <p>Belum ada data galeri.</p>
                </div>
            @endforelse

        </div>

        <div class="mt-4 d-flex justify-content-center">
            {{ $galeris->links('pagination::bootstrap-5') }}
        </div>
    </div>
@endsection
