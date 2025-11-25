@extends('layouts.guest.app')

@section('content')
    <div class="container-fluid blog py-5">
        <div class="container py-5">

            <div class="text-center mx-auto pb-5" style="max-width: 800px;">
                <h5 class="text-uppercase text-primary">Berita</h5>
                <h1 class="mb-0">Berita Bina Desa</h1>
            </div>

            {{-- Tombol Tambah Data --}}
            <div class="mb-4 d-flex justify-content-between align-items-center">
                <a href="{{ route('berita.create') }}" class="btn btn-primary">
                    <i class="bi bi-plus-circle"></i> Tambah Data
                </a>
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
            <form method="GET" action="{{ route('galeri.index') }}">
                <div class="col-md-4 mb-4">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control" id="exampleInputIconRight"
                            value="{{ request('search') }}" placeholder="Search" aria-label="Search">
                        <button type="submit" class="btn btn-outline-secondary" id="basic-addon2"
                            aria-label="Search button">
                            <i class="bi bi-search"></i>
                        </button>
                        @if (request('search'))
                            <a href="{{ request()->fullUrlWithQuery(['search' => null]) }}"
                                class="btn btn-outline-secondary ml-3" id="clear-search"> Clear</a>
                        @endif
                    </div>
                </div>
            </form>

            {{-- Berita List --}}
            <div class="row g-4">
                @forelse ($berita as $b)
                    <div class="col-lg-6 col-xl-4">
                        <div class="blog-item">
                            <div class="text-dark border p-4" style="border-radius:10px;">

                                <h4 class="mb-3">{{ $b->judul }}</h4>

                                {{-- Excerpt isi --}}
                                <p class="mb-4">
                                    {{ \Illuminate\Support\Str::limit(strip_tags($b->isi_html), 120, '...') }}
                                </p>

                                {{-- Info Emoji (kategori, penulis, terbit) --}}
                                <div class="mt-3 small text-muted d-flex flex-wrap gap-4 align-items-center">
                                    <span>📂 <strong>{{ $b->kategori->nama ?? '-' }}</strong></span>
                                    <span>✍️ <strong>{{ $b->penulis ?? '-' }}</strong></span>
                                    <span>🕒 <strong>{{ $b->terbit_at ?? '-' }}</strong></span>
                                </div>

                                {{-- Tombol (DI BAWAH META) --}}
                                <div class="mt-3 d-flex gap-2">
                                    {{-- Read More --}}
                                    <a href="{{ route('berita.show', $b->slug ?? $b->berita_id) }}"
                                        class="btn text-white py-2 px-3" style="background:#E27258; border-color:#E27258;">
                                        Read More
                                    </a>

                                    {{-- Edit --}}
                                    <a href="{{ route('berita.edit', $b->berita_id) }}"
                                        class="btn btn-outline-secondary py-2 px-3"
                                        style="background:#ffc107; color: #000;">
                                        Edit
                                    </a>

                                    {{-- Hapus --}}
                                    <form action="{{ route('berita.destroy', $b->berita_id) }}" method="POST"
                                        onsubmit="return confirm('Hapus berita ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger py-2 px-3">Hapus</button>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <div class="alert alert-secondary">Belum ada berita.</div>
                    </div>
                @endforelse

                <!-- PAGINATION -->
                <div class="mt-3 d-flex justify-content-center">
                    {{ $berita->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
@endsection
