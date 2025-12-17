@extends('layouts.guest.app')

@section('content')
    <!-- Header Start -->
    <div class="container-fluid bg-breadcrumb" style="margin-top: -30px;">
        <div class="container text-center py-5 mt-0" style="max-width: 900px;">
            <h3 class="text-white display-3 mb-4">Profil Desa</h3>
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active text-white">Profil</li>
            </ol>
        </div>
    </div>

    <!-- PROFIL DESA (NEW STYLE) -->
    <div class="container-fluid about py-5">
        <div class="container py-5">
            <div class="row g-5">

                {{-- KIRI FOTO --}}
                <div class="col-xl-5">
                    <div class="h-100">
                        <img src="{{ asset('assets-guest/img/profil.jpg') }}" class="img-fluid w-80 h-100"
                            style="object-fit: cover;">
                    </div>
                </div>

                {{-- KANAN DATA & TAB --}}
                <div class="col-xl-7">
                    <h5 class="text-uppercase text-primary">Profil Desa</h5>

                    @if ($profil)
                        <h1 class="mb-4">{{ $profil->nama_desa }}</h1>

                        {{-- TABEL PROFIL --}}
                        <table class="table table-borderless fs-5 mb-4">
                            <tr>
                                <th width="200">Kecamatan</th>
                                <td>{{ $profil->kecamatan }}</td>
                            </tr>
                            <tr>
                                <th>Kabupaten</th>
                                <td>{{ $profil->kabupaten }}</td>
                            </tr>
                            <tr>
                                <th>Provinsi</th>
                                <td>{{ $profil->provinsi }}</td>
                            </tr>
                            <tr>
                                <th>Alamat Kantor</th>
                                <td>{{ $profil->alamat_kantor }}</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>{{ $profil->email }}</td>
                            </tr>
                            <tr>
                                <th>Telepon</th>
                                <td>{{ $profil->telepon }}</td>
                            </tr>
                        </table>

                        {{-- TAB CLASS --}}
                        <div class="tab-class bg-secondary p-4">

                            <ul class="nav d-flex mb-2">
                                <li class="nav-item mb-3">
                                    <a class="d-flex py-2 text-center bg-white active" data-bs-toggle="pill"
                                        href="#tab-about">
                                        <span class="text-dark" style="width: 150px;">Tentang Desa</span>
                                    </a>
                                </li>

                                <li class="nav-item mb-3">
                                    <a class="d-flex py-2 mx-3 text-center bg-white" data-bs-toggle="pill" href="#tab-misi">
                                        <span class="text-dark" style="width: 150px;">Misi</span>
                                    </a>
                                </li>

                                <li class="nav-item mb-3">
                                    <a class="d-flex py-2 text-center bg-white" data-bs-toggle="pill" href="#tab-visi">
                                        <span class="text-dark" style="width: 150px;">Visi</span>
                                    </a>
                                </li>
                            </ul>

                            <div class="tab-content">

                                {{-- ABOUT --}}
                                <div id="tab-about" class="tab-pane fade show p-0 active">
                                    <h5 class="text-uppercase mb-3">Tentang Desa</h5>
                                    <p>Desa {{ $profil->nama_desa }} terletak di Kecamatan {{ $profil->kecamatan }},
                                        Kabupaten {{ $profil->kabupaten }}, Provinsi {{ $profil->provinsi }}.</p>
                                </div>

                                {{-- MISI --}}
                                <div id="tab-misi" class="tab-pane fade p-0">
                                    <h5 class="text-uppercase mb-3">Misi Desa</h5>
                                    <ol class="fs-5">
                                        @foreach (explode("\n", $profil->misi) as $m)
                                            @if (trim($m) != '')
                                                <li>{{ trim($m) }}</li>
                                            @endif
                                        @endforeach
                                    </ol>
                                </div>

                                {{-- VISI --}}
                                <div id="tab-visi" class="tab-pane fade p-0">
                                    <h5 class="text-uppercase mb-3">Visi Desa</h5>
                                    <ol class="fs-5">
                                        @foreach (explode("\n", $profil->visi) as $v)
                                            @if (trim($v) != '')
                                                <li>{{ trim($v) }}</li>
                                            @endif
                                        @endforeach
                                    </ol>
                                </div>

                            </div>
                        </div>

                        {{-- BUTTON EDIT / DELETE --}}
                        @auth
                            @if (Auth::user()->role === 'admin')
                                <div class="mt-3">
                                    <div class="d-flex justify-content-start gap-3">
                                        <a href="{{ route('profil.edit', $profil->profil_id) }}" class="btn-edit">
                                            <i class="bi bi-pencil"></i> Edit
                                        </a>

                                        <form action="{{ route('profil.destroy', $profil->profil_id) }}" method="POST"
                                            onsubmit="return confirm('Yakin ingin menghapus profil ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn-delete">
                                                <i class="bi bi-trash"></i> Hapus
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            @endif
                        @endauth
                    @else
                        <div class="text-center py-4">
                            <p>Belum ada profil desa.</p>

                            @auth
                                @if (Auth::user()->role === 'admin')
                                    <a href="{{ route('profil.create') }}" class="btn btn-primary mt-2">
                                        Tambah Profil
                                    </a>
                                @endif
                            @endauth
                        </div>
                    @endif

                </div>

            </div>
        </div>
    </div>
@endsection
