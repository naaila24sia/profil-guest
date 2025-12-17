@extends('layouts.guest.app')

@section('content')
    <!-- Header Start -->
    <div class="container-fluid bg-breadcrumb" style="margin-top: -30px;">
        <div class="container text-center py-5 mt-0" style="max-width: 900px;">
            <h3 class="text-white display-3 mb-4">Agenda</h3>
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active text-white">Agenda</li>
            </ol>
        </div>
    </div>

    <!-- Form Edit Profil Start -->
    <div class="container-fluid event py-5">
        <div class="container py-5">

            {{-- HEADER + TOMBOL TAMBAH --}}
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div class="text-start">
                    <h5 class="text-uppercase text-primary">Agenda Desa</h5>
                    <h1 class="mb-0">Agenda Kegiatan Terbaru</h1>
                </div>

                @auth
                    @if (Auth::user()->role === 'admin')
                        <a href="{{ route('agenda.create') }}" class="btn btn-primary px-4 py-2">
                            <i class="bi bi-plus-circle"></i> Tambah Data
                        </a>
                    @endif
                @endauth

            </div>

            {{-- Flash Messages --}}
            @if (session('create'))
                <div class="alert alert-success alert-dismissible fade show">
                    {{ session('create') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @if (session('update'))
                <div class="alert alert-info alert-dismissible fade show">
                    {{ session('update') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @if (session('delete'))
                <div class="alert alert-danger alert-dismissible fade show">
                    {{ session('delete') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            {{-- search form --}}
            <form method="GET" action="{{ route('agenda.index') }}">
                <div class="col-md-4 mb-4">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control" value="{{ request('search') }}"
                            placeholder="Search">
                        <button type="submit" class="btn btn-outline-secondary">
                            <i class="bi bi-search"></i>
                        </button>

                        @if (request('search'))
                            <a href="{{ request()->fullUrlWithQuery(['search' => null]) }}"
                                class="btn btn-outline-secondary ml-3"> Clear</a>
                        @endif
                    </div>
                </div>
            </form>

            @if ($agenda->count())
                <div class="row g-3">

                    @foreach ($agenda as $ag)
                        <div class="col-lg-4 col-md-6">
                            <div class="event-item rounded border overflow-hidden h-100" style="background-color: #F3DCBC;">

                                {{-- FOTO / POSTER --}}
                                @if ($ag->media->first())
                                    <img src="{{ asset('storage/uploads/agenda/' . $ag->media->first()->file_name) }}"
                                        class="agenda-image" style="width:100%; height:250px; object-fit:cover;">
                                @else
                                    <img src="{{ asset('assets-guest/img/placeholder.jpg') }}" class="agenda-image"
                                        style="width:100%; height:250px; object-fit:cover; opacity:0.7;">
                                @endif

                                <div class="event-content p-4">

                                    {{-- Lokasi + Penyelenggara --}}
                                    <div class="d-flex justify-content-between mb-3">
                                        <span class="text-body">
                                            <i class="fas fa-map-marker-alt me-2"></i>
                                            {{ $ag->lokasi }}
                                        </span>
                                        <span class="text-body">
                                            <i class="fas fa-user-tie me-2"></i>
                                            {{ $ag->penyelenggara }}
                                        </span>
                                    </div>

                                    {{-- Tanggal --}}
                                    <div class="d-flex justify-content-between mb-3">
                                        <span class="text-body">
                                            <i class="fas fa-calendar-alt me-2"></i>
                                            {{ \Carbon\Carbon::parse($ag->tanggal_mulai)->format('d M Y') }}
                                        </span>
                                        <span class="text-body">
                                            <i class="fas fa-calendar-check me-2"></i>
                                            {{ \Carbon\Carbon::parse($ag->tanggal_selesai)->format('d M Y') }}
                                        </span>
                                    </div>

                                    {{-- Judul --}}
                                    <h4 class="mb-3">{{ $ag->judul }}</h4>

                                    {{-- Deskripsi --}}
                                    <p class="mb-4">
                                        {{ Str::limit($ag->deskripsi, 120, '...') }}
                                    </p>

                                    {{-- TOMBOL BACA, EDIT, DELETE --}}
                                    <div class="d-flex justify-content-between align-items-center">

                                        @auth
                                            @if (Auth::user()->role === 'admin')
                                                <div class="d-flex gap-2 ms-auto">
                                                    {{-- EDIT --}}
                                                    <a href="{{ route('agenda.edit', $ag->agenda_id) }}"
                                                        class="btn btn-warning btn-sm px-2 py-1">
                                                        <i class="bi bi-pencil"></i>
                                                    </a>

                                                    {{-- DELETE --}}
                                                    <form action="{{ route('agenda.destroy', $ag->agenda_id) }}" method="POST"
                                                        onsubmit="return confirm('Hapus agenda ini?')">
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
                    @endforeach

                </div>
            @else
                <div class="text-center py-5">
                    <p class="text-muted">Belum ada agenda kegiatan.</p>
                </div>
            @endif
            {{-- PAGINATION --}}
            <div class="mt-3 d-flex justify-content-center">
                {{ $agenda->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>
@endsection
