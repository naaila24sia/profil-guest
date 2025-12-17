@extends('layouts.guest..app')

@section('content')
<!-- Header Start -->
    <div class="container-fluid bg-breadcrumb" style="margin-top: -30px;">
        <div class="container text-center py-5 mt-0" style="max-width: 900px;">
            <h3 class="text-white display-3 mb-4">Form Edit Data</h3>
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('warga.index') }}">Warga</a></li>
                    <li class="breadcrumb-item active text-white">Edit</li>
                </ol>
        </div>
    </div>
    <!-- Form Edit Warga Start -->
   <div class="container py-5">
    <div class="col-lg-11 mx-auto bg-light p-5 rounded shadow">
        <h3 class="text-center mb-4 text-primary">Form Edit Warga</h3>

        <form action="{{ route('warga.update', $warga->warga_id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row g-4">

                {{-- KOLOM KIRI --}}
                <div class="col-md-4">

                    <div class="mb-3">
                        <label class="form-label">No KTP</label>
                        <input type="text"
                               name="no_ktp"
                               class="form-control"
                               value="{{ old('no_ktp', $warga->no_ktp) }}"
                               required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Nama Lengkap</label>
                        <input type="text"
                               name="nama"
                               class="form-control"
                               value="{{ old('nama', $warga->nama) }}"
                               required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email"
                               name="email"
                               class="form-control"
                               value="{{ old('email', $warga->email) }}">
                    </div>

                </div>

                {{-- KOLOM TENGAH --}}
                <div class="col-md-4">

                    <div class="mb-3">
                        <label class="form-label">Jenis Kelamin</label>
                        <select name="jenis_kelamin" class="form-select" required>
                            <option value="">-- Pilih Jenis Kelamin --</option>
                            <option value="Laki-Laki"
                                {{ old('jenis_kelamin', $warga->jenis_kelamin) == 'Laki-Laki' ? 'selected' : '' }}>
                                Laki-Laki
                            </option>
                            <option value="Perempuan"
                                {{ old('jenis_kelamin', $warga->jenis_kelamin) == 'Perempuan' ? 'selected' : '' }}>
                                Perempuan
                            </option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Agama</label>
                        <input type="text"
                               name="agama"
                               class="form-control"
                               value="{{ old('agama', $warga->agama) }}">
                    </div>

                </div>

                {{-- KOLOM KANAN --}}
                <div class="col-md-4">

                    <div class="mb-3">
                        <label class="form-label">Pekerjaan</label>
                        <input type="text"
                               name="pekerjaan"
                               class="form-control"
                               value="{{ old('pekerjaan', $warga->pekerjaan) }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Nomor Telepon</label>
                        <input type="text"
                               name="telp"
                               class="form-control"
                               value="{{ old('telp', $warga->telp) }}">
                    </div>

                </div>

            </div>

            {{-- TOMBOL --}}
            <div class="text-center mt-4">
                <button type="submit" class="btn btn-primary px-4 py-2">Simpan</button>
                <a href="{{ route('warga.index') }}" class="btn btn-secondary px-4 py-2">Batal</a>
            </div>

        </form>
    </div>
</div>

    <!-- Form Edit Warga End -->
@endsection
