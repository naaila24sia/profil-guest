@extends('layouts.guest..app')

@section('content')
    <!-- Form Edit Warga Start -->
    <div class="container py-5" style="margin-top:90px;">
        <div class="col-lg-8 mx-auto bg-light p-5 rounded shadow">
            <h3 class="text-center mb-4 text-primary">Form Edit Warga</h3>

            <form action="{{ route('warga.update', $warga->warga_id) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- No KTP -->
                <div class="mb-3">
                    <label class="form-label">No KTP</label>
                    <input type="text" name="no_ktp" class="form-control"
                        value="{{ old('no_ktp', $warga->no_ktp) }}" required>
                </div>

                <!-- Nama -->
                <div class="mb-3">
                    <label class="form-label">Nama Lengkap</label>
                    <input type="text" name="nama" class="form-control"
                        value="{{ old('nama', $warga->nama) }}" required>
                </div>

                <!-- Jenis Kelamin -->
                <div class="mb-3">
                    <label class="form-label">Jenis Kelamin</label>
                    <select name="jenis_kelamin" class="form-control">
                        <option value="">-- Pilih --</option>
                        <option value="Laki-Laki" {{ old('jenis_kelamin', $warga->jenis_kelamin) == 'Laki-Laki' ? 'selected' : '' }}>Laki-Laki</option>
                        <option value="Perempuan" {{ old('jenis_kelamin', $warga->jenis_kelamin) == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                </div>

                <!-- Agama -->
                <div class="mb-3">
                    <label class="form-label">Agama</label>
                    <input type="text" name="agama" class="form-control"
                        value="{{ old('agama', $warga->agama) }}">
                </div>

                <!-- Pekerjaan -->
                <div class="mb-3">
                    <label class="form-label">Pekerjaan</label>
                    <input type="text" name="pekerjaan" class="form-control"
                        value="{{ old('pekerjaan', $warga->pekerjaan) }}">
                </div>

                <!-- Telepon -->
                <div class="mb-3">
                    <label class="form-label">Nomor Telepon</label>
                    <input type="text" name="telp" class="form-control"
                        value="{{ old('telp', $warga->telp) }}">
                </div>

                <!-- Email -->
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control"
                        value="{{ old('email', $warga->email) }}">
                </div>

                <!-- Tombol -->
                <div class="text-center">
                    <button type="submit" class="btn btn-primary px-4 py-2">Simpan</button>
                    <a href="{{ route('warga.index') }}" class="btn btn-secondary px-4 py-2">Batal</a>
                </div>
            </form>
        </div>
    </div>
    <!-- Form Edit Warga End -->
@endsection
