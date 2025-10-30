@extends('layouts.user.index.app')

@section('content')
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
    </div>
    <!-- Data User Section End -->
@endsection
