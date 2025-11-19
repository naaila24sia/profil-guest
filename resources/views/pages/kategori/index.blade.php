@extends('layouts.guest.app')

@section('content')
    <style>
        /* jika header situs fixed/menempel di atas, atur tinggi ini agar konten tidak tertutup */
        .site-top-space {
            height: 120px;
            /* <-- ubah angka ini sesuai tinggi headermu (mis. 150px jika header lebih besar) */
        }

        /* card styling (sama seperti sebelumnya) */
        .cat-card {
            background: #fff;
            border-radius: 16px;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.08);
            padding: 20px 24px;
            margin-bottom: 18px;
            transition: 0.3s;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .cat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.12);
        }

        .cat-info {
            display: flex;
            align-items: center;
            gap: 18px;
            flex: 1;
        }

        .cat-avatar {
            width: 64px;
            height: 64px;
            border-radius: 50%;
            background: linear-gradient(135deg, #F5A97F, #E27258);
            color: #fff;
            font-size: 22px;
            font-weight: 700;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .cat-details h5 {
            margin-bottom: 6px;
            font-weight: 700;
            color: #222;
            font-size: 1.05rem;
        }

        .cat-details p {
            margin: 0;
            font-size: 14px;
            color: #666;
        }

        .cat-meta {
            margin-top: 6px;
            font-size: 13px;
            color: #7a7a7a;
        }

        .cat-actions {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 8px;
            margin-left: 18px;
        }

        .btn-add {
            background-color: #ffc107;
            border: none;
            color: #000; ;
            padding: 6px 14px;
            font-weight: 700;
        }

        .btn-edit {
            background-color: #ffc107;
            border: none;
            color: #000;
            padding: 6px 16px;
            border-radius: 6px;
            font-size: 14px;
            transition: 0.3s;
            width: 90px;
        }
        .btn-edit:hover {
            background-color: #e0a800;
            color: #fff;
        }

        .btn-delete {
            background-color: #dc3545;
            border: none;
            color: #fff;
            padding: 6px 16px;
            border-radius: 6px;
            font-size: 14px;
            transition: 0.3s;
            width: 90px;
        }

        .btn-delete:hover {
            background-color: #bb2d3b;
        }
        @media (max-width: 768px) {
            .cat-card {
                flex-direction: column;
                align-items: flex-start;
                gap: 12px;
            }

            .cat-actions {
                flex-direction: row;
            }
        }

        .btn-tambah-kategori {
            background: #F7B56A;
            /* warna sama seperti contoh */
            color: #000;
            font-weight: 700;
            padding: 10px 18px;
            border-radius: 4px;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .btn-tambah-kategori .plus-icon {
            width: 22px;
            height: 22px;
            border: 2px solid #000;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
            font-weight: 700;
        }

        .btn-tambah-kategori:hover {
            background: #e9a85f;
        }
    </style>

    <!-- space supaya konten tidak tertutup header -->
    <div class="site-top-space"></div>

    <!-- Kategori Section Start -->
    <div class="container py-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h5 class="text-uppercase text-primary mb-1">Data</h5>
                <h1 class="mb-0">Daftar Kategori Berita</h1>
            </div>

            <a href="{{ route('kategori.create') }}" class="btn btn-add d-flex align-items-center gap-2">
                <i class="bi bi-plus-circle"></i> Tambah Kategori
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
    </div>
    <!-- Kategori Section End -->
@endsection
