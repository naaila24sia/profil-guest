@extends('layouts.guest.app')

@section('content')
    <!-- Form Edit User Start -->
    <div class="container py-5" style="margin-top:90px;">
        <div class="col-lg-8 mx-auto bg-light p-5 rounded shadow">
            <h3 class="text-center mb-4 text-primary">Form Edit User</h3>

            <form action="{{ route('user.update', $dataUser->id) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Nama Lengkap -->
                <div class="mb-3">
                    <label class="form-label">Nama Lengkap</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name', $dataUser->name) }}"
                        required>
                </div>

                <!-- Email -->
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" value="{{ old('email', $dataUser->email) }}"
                        required>
                </div>

                <!-- Password -->
                <div class="mb-3">
                    <label class="form-label">Password (isi jika ingin ubah)</label>
                    <input type="password" name="password" class="form-control"
                        placeholder="Kosongkan jika tidak diubah">
                </div>

                <!-- Konfirmasi Password -->
                <div class="mb-3">
                    <label class="form-label">Konfirmasi Password</label>
                    <input type="password" name="password_confirmation" class="form-control"
                        placeholder="Kosongkan jika tidak diubah">
                </div>

                <!-- Tombol -->
                <div class="text-center">
                    <button type="submit" class="btn btn-primary px-4 py-2">Simpan</button>
                    <a href="{{ route('user.index') }}" class="btn btn-secondary px-4 py-2">Batal</a>
                </div>
            </form>
        </div>
    </div>
    <!-- Form Edit User End -->
@endsection
