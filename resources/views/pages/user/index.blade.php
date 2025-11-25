@extends('layouts.guest.app')

@section('content')
    <style>
        /* ======== Custom Style Card User ======== */
        .user-card {
            background: #fff;
            border-radius: 16px;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.08);
            padding: 25px 30px;
            margin-bottom: 25px;
            transition: 0.3s;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .user-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.12);
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .user-avatar {
            width: 75px;
            height: 75px;
            border-radius: 50%;
            background: linear-gradient(135deg, #0d6efd, #007bff);
            color: #fff;
            font-size: 28px;
            font-weight: 600;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .user-details h5 {
            margin-bottom: 8px;
            font-weight: 600;
            color: #222;
        }

        .user-details p {
            margin: 0;
            font-size: 15px;
            color: #555;
        }

        .user-actions {
            display: flex;
            flex-direction: column;
            align-items: center;
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
            .user-card {
                flex-direction: column;
                align-items: flex-start;
            }

            .user-actions {
                flex-direction: row;
                margin-top: 15px;
            }
        }
    </style>

    <!-- Data User Section Start -->
    <div class="container py-5 mt-5 pt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div class="text-start">
                <h5 class="text-uppercase text-primary mb-1">Data</h5>
                <h1 class="mb-0">Daftar User</h1>
            </div>
            <a href="{{ route('user.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-circle"></i> Tambah User
            </a>
        </div>

        @if (session('create'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('create') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if (session('update'))
            <div class="alert alert-info alert-dismissible fade show" role="alert">
                {{ session('update') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if (session('delete'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('delete') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        {{-- Search form --}}
        <form method="GET" action="{{ route('user.index') }}">
            <div class="col-md-4 mb-4">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" id="exampleInputIconRight"
                        value="{{ request('search') }}" placeholder="Search" aria-label="Search">
                    <button type="submit" class="btn btn-outline-secondary" id="basic-addon2" aria-label="Search button">
                        <i class="bi bi-search"></i>
                    </button>
                    @if (request('search'))
                        <a href="{{ request()->fullUrlWithQuery(['search' => null]) }}"
                            class="btn btn-outline-secondary ml-3" id="clear-search"> Clear</a>
                    @endif
                </div>
            </div>
        </form>


        {{-- Card User List --}}
        @forelse ($dataUser as $user)
            <div class="user-card">
                <div class="user-info">
                    <div class="user-avatar">{{ strtoupper(substr($user->name, 0, 1)) }}</div>
                    <div class="user-details">
                        <p>Nama Lengkap : {{ $user->name }}</p>
                        <p>Email : {{ $user->email }}</p>
                        <p>Password : <em>(terenkripsi)</em></p>
                    </div>
                </div>

                <div class="user-actions">
                    <a href="{{ route('user.edit', $user->id) }}" class="btn-edit">
                        <i class="bi bi-pencil"></i> Edit
                    </a>
                    <form action="{{ route('user.destroy', $user->id) }}" method="POST"
                        onsubmit="return confirm('Yakin ingin menghapus user ini?')">
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
                <p>Belum ada user terdaftar.</p>
            </div>
        @endforelse

        <!-- PAGINATION -->
        <div class="mt-3 d-flex justify-content-center">
            {{ $dataUser->links('pagination::bootstrap-5') }}
        </div>
        <!-- Data User Section End -->
    @endsection
