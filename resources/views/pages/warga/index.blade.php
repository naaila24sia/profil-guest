@extends('layouts.guest.app')

@section('content')
    <style>
        /* ======== Tambahan Style untuk Card Horizontal ======== */
        .card-horizontal {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: #fff;
            border-radius: 15px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            padding: 25px 30px;
            margin-bottom: 20px;
            transition: all 0.3s ease;
        }

        .card-horizontal:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 16px rgba(0, 0, 0, 0.12);
        }

        .card-info {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .card-avatar {
            width: 70px;
            height: 70px;
            border-radius: 50%;
            background: #0d6efd;
            color: #fff;
            font-weight: 600;
            font-size: 22px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .card-details p {
            margin-bottom: 3px;
            font-size: 15px;
            color: #444;
        }

        .card-actions {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 10px;
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

        .btn-hapus {
            background-color: #dc3545;
            border: none;
            color: #fff;
            padding: 6px 16px;
            border-radius: 6px;
            font-size: 14px;
            transition: 0.3s;
            width: 90px;
        }

        .btn-hapus:hover {
            background-color: #bb2d3b;
        }

        @media (max-width: 768px) {
            .card-horizontal {
                flex-direction: column;
                align-items: flex-start;
            }

            .card-actions {
                flex-direction: row;
                margin-top: 10px;
            }
        }
    </style>

    <!-- Data Warga Section Start -->
    <div class="container py-5 mt-5 pt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div class="text-start">
                <h5 class="text-uppercase text-primary mb-1">Data</h5>
                <h1 class="mb-0">Daftar Warga</h1>
            </div>
            <a href="{{ route('warga.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-circle"></i> Tambah Data
            </a>
        </div>

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

        {{-- FILTER JENIS KELAMIN DAN AGAMA --}}
        <form method="GET" action="{{ route('warga.index') }}" class="mb-3">
            <div class="row g-2">
                <div class="col-md-2">
                    <select name="jenis_kelamin" class="form-select" onchange="this.form.submit()">
                        <option value="">Semua Data Warga</option>
                        <option value="Laki-Laki" {{ request('jenis_kelamin') == 'Laki-Laki' ? 'selected' : '' }}>Laki-Laki
                        </option>
                        <option value="Perempuan" {{ request('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>Perempuan
                        </option>
                    </select>
                </div>
                <div class="col-md-3">
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

        {{-- Card List --}}
        @forelse ($wargas as $item)
            <div class="card-horizontal">
                <div class="card-info">
                    <div class="card-avatar">{{ strtoupper(substr($item->nama, 0, 1)) }}</div>
                    <div class="card-details">
                        <p>Nama : {{ $item->nama }}</p>
                        <p>No KTP : {{ $item->no_ktp }}</p>
                        <p>Jenis Kelamin : {{ $item->jenis_kelamin }}</p>
                        <p>Agama : {{ $item->agama }}</p>
                        <p>Pekerjaan : {{ $item->pekerjaan }}</p>
                        <p>Telepon : {{ $item->telp }}</p>
                        <p>Email : {{ $item->email }}</p>
                    </div>
                </div>

                <div class="card-actions">
                    <a href="{{ route('warga.edit', $item->warga_id) }}" class="btn btn-edit">
                        <i class="bi bi-pencil"></i> Edit
                    </a>
                    <form action="{{ route('warga.destroy', $item->warga_id) }}" method="POST"
                        onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-hapus">
                            <i class="bi bi-trash"></i> Hapus
                        </button>
                    </form>
                </div>
            </div>
        @empty
            <div class="text-center py-4">
                <p>Belum ada data warga.</p>
            </div>
        @endforelse

        <!-- PAGINATION -->
        <div class="mt-3 d-flex justify-content-center">
            {{ $wargas->links('pagination::bootstrap-5') }}
        </div>
        <!-- Data Warga Section End -->
    @endsection
