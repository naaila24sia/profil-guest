@extends('layouts.guest.app')

@section('content')
    <!-- Header Start -->
    <div class="container-fluid bg-breadcrumb" style="margin-top: -30px;">
        <div class="container text-center py-5 mt-0" style="max-width: 900px;">
            <h3 class="text-white display-3 mb-4">Berita</h3>
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active text-white">Berita</li>
            </ol>
        </div>
    </div>

    <div class="container-fluid blog pt-3 pb-5">
        <div class="container py-5">

            {{-- TITLE --}}
            <div class="text-center mx-auto pb-5" style="max-width: 600px;">
                <h5 class="text-uppercase text-primary">Berita</h5>
                <h1 class="mb-0">Berita Bina Desa</h1>
            </div>

            {{-- FLASH MESSAGE --}}
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

            <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap">

                {{-- SEARCH --}}
                <form method="GET" action="{{ route('berita.index') }}" class="mb-2">
                    <div class="input-group" style="width: 350px;">
                        <input type="text" name="search" class="form-control" value="{{ request('search') }}"
                            placeholder="Search...">
                        <button type="submit" class="btn btn-outline-secondary">
                            <i class="bi bi-search"></i>
                        </button>

                        @if (request('search'))
                            <a href="{{ route('berita.index') }}" class="btn btn-outline-secondary">Clear</a>
                        @endif
                    </div>
                </form>

                {{-- BUTTON TAMBAH --}}
                @auth
                    @if (Auth::user()->role === 'admin')
                        <a href="{{ route('berita.create') }}" class="btn btn-primary mb-2">
                            <i class="bi bi-plus-circle"></i> Tambah Data
                        </a>
                    @endif
                @endauth

            </div>

            {{-- LIST BERITA --}}
            <div class="row g-4">
                @forelse ($berita as $b)
                    @php
                        $media = \App\Models\Media::where('ref_table', 'berita')
                            ->where('ref_id', $b->berita_id)
                            ->orderBy('media_id', 'desc')
                            ->first();
                    @endphp

                    <div class="col-lg-6 col-xl-4">
                        <div class="event-item rounded border overflow-hidden h-100" style="background-color: white;">

                            {{-- COVER FOTO --}}
                            @if ($media)
                                <img src="{{ asset('storage/uploads/berita/' . $media->file_name) }}"
                                    style="width:100%; height:230px; object-fit:cover;">
                            @else
                                <img src="{{ asset('assets-guest/img/placeholder.jpg') }}"
                                    style="width:100%; height:230px; object-fit:cover; opacity:0.7;">
                            @endif

                            {{-- CONTENT --}}
                            <div class="event-content p-4">

                                {{-- JUDUL --}}
                                <h4 class="mb-3">{{ $b->judul }}</h4>

                                {{-- EXCERPT --}}
                                <p class="mb-4">
                                    {{ \Illuminate\Support\Str::limit(strip_tags($b->isi_html), 120, '...') }}
                                </p>

                                {{-- INFO --}}
                                <div class="small text-muted d-flex flex-wrap gap-4 mb-3">
                                    <span>📂 <strong>{{ $b->kategori->nama ?? '-' }}</strong></span>
                                    <span>✍️ <strong>{{ $b->penulis ?? '-' }}</strong></span>
                                    <span>🕒 <strong>{{ $b->terbit_at ?? '-' }}</strong></span>
                                </div>

                                {{-- BUTTON ROW --}}
                                <div class="d-flex justify-content-between align-items-center">
                                    <a href="{{ route('berita.show', $b->berita_id) }}"
                                        class="btn btn-primary text-white py-2 px-3">
                                        Baca Selengkapnya
                                    </a>

                                    @auth
                                        @if (Auth::user()->role === 'admin')
                                            <div class="d-flex gap-2">
                                                {{-- EDIT --}}
                                                <a href="{{ route('berita.edit', $b->berita_id) }}"
                                                    class="btn btn-warning btn-sm px-2 py-1">
                                                    <i class="bi bi-pencil"></i>
                                                </a>

                                                {{-- DELETE --}}
                                                <form action="{{ route('berita.destroy', $b->berita_id) }}" method="POST"
                                                    onsubmit="return confirm('Hapus Berita?')">
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
                    <div class="col-12">
                        <div class="alert alert-secondary text-center">
                            Belum ada berita.
                        </div>
                    </div>
                @endforelse

                {{-- PAGINATION --}}
                <div class="mt-3 d-flex justify-content-center">
                    {{ $berita->links('pagination::bootstrap-5') }}
                </div>

            </div>

        </div>
    </div>
@endsection
