@extends('layouts.guest.app')

@section('content')
    <!-- Header Start -->
    <div class="container-fluid bg-breadcrumb" style="margin-top: -30px;">
        <div class="container text-center py-5 mt-0" style="max-width: 900px;">
            <h3 class="text-white display-3 mb-4">Kategori Berita</h3>
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active text-white">Kategori</li>
            </ol>
        </div>
    </div>

    <!-- Kategori Section Start -->
    <div class="container py-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h5 class="text-uppercase text-primary mb-1">Data</h5>
                <h1 class="mb-0">Daftar Kategori Berita</h1>
            </div>

            <a href="{{ route('kategori.create') }}" class="btn btn-add d-flex align-items-center gap-2">
                <i class="bi bi-plus-circle"></i> Tambah Data
            </a>

        </div>

        {{-- Flash messages --}}
        @if (session('create'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('create') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif
        @if (session('update'))
            <div class="alert alert-info alert-dismissible fade show" role="alert">
                {{ session('update') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif
        @if (session('delete'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('delete') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        {{-- Filter kategori --}}
        <div class="table-responsive">
            <form method="GET" action="{{ route('kategori.index') }}" class="mb-3">
                <div class="row">
                    <div class="col-md-2">
                        <select name="nama" class="form-select" onchange="this.form.submit()">
                            <option value="">Semua Kategori</option>
                            <option value="Pemerintahan" {{ request('nama') == 'Pemerintahan' ? 'selected' : '' }}>
                                Pemerintahan</option>
                            <option value="Kesehatan" {{ request('nama') == 'Kesehatan' ? 'selected' : '' }}>Kesehatan
                            </option>
                            <option value="Pendidikan" {{ request('nama') == 'Pendidikan' ? 'selected' : '' }}>Pendidikan
                            </option>
                            <option value="Kegiatan Warga" {{ request('nama') == 'Kegiatan Warga' ? 'selected' : '' }}>
                                Kegiatan Warga</option>
                            <option value="Pembangunan Desa" {{ request('nama') == 'Pembangunan Desa' ? 'selected' : '' }}>
                                Pembangunan Desa</option>
                        </select>
                    </div>
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
                </div>
            </form>
        </div>

        {{-- List kategori --}}
        @forelse ($kategori as $k)
            <div class="cat-card">
                <div class="cat-info">
                    <div class="cat-avatar">
                        {{ strtoupper(substr($k->nama, 0, 1)) }}
                    </div>

                    <div class="cat-details">
                        <h5>{{ $k->nama }}</h5>
                        <p class="cat-meta">Slug: <strong>{{ $k->slug }}</strong></p>
                        <p style="margin-top:6px; color:#555;">
                            {{ $k->deskripsi ? \Illuminate\Support\Str::limit($k->deskripsi, 160, '...') : '-' }}
                        </p>
                    </div>
                </div>

                <div class="cat-actions">
                    <a href="{{ route('kategori.edit', $k->kategori_id) }}" class="btn-edit">
                        <i class="bi bi-pencil"></i> Edit
                    </a>

                    <form action="{{ route('kategori.destroy', $k->kategori_id) }}" method="POST"
                        onsubmit="return confirm('Yakin ingin menghapus kategori ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-delete">
                            <i class="bi bi-trash"></i> Hapus
                        </button>
                    </form>
                </div>
            </div>
        @empty
            <div class="text-center py-4">
                <p>Belum ada kategori.</p>
            </div>
        @endforelse

        <!-- PAGINATION -->
        <div class="mt-3 d-flex justify-content-center">
            {{ $kategori->links('pagination::bootstrap-5') }}
        </div>
    </div>


    <!-- Kategori Section End -->
@endsection
