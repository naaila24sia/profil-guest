@extends('layouts.auth.app')

@section('content')
    <div class="col-12 d-flex justify-content-center py-4">
        <div class="d-flex shadow-lg bg-white rounded-4 overflow-hidden" style="width: 1000px; min-height: 560px;">

            {{-- BAGIAN KIRI (FORM) --}}
            <div class="d-flex flex-column justify-content-center align-items-center text-center px-5" style="width: 50%;">

                {{-- Logo / Brand --}}
                <img src="{{ asset('assets-guest/img/SiDesa.png') }}" alt="Logo Bina Desa" style="height:100px;">

                {{-- Heading --}}
                <h4 class="fw-bold mb-2" style="font-size:1.4rem;">
                    Welcome!
                </h4>
                <p class="text-muted mb-4" style="font-size:0.9rem;">
                    Sign in by entering the information below
                </p>

                {{-- ERROR MESSAGE --}}
                @if ($errors->any())
                    <div class="alert alert-danger w-100" style="font-size: 0.85rem;">
                        {{ $errors->first() }}
                    </div>
                @endif

                {{-- FORM --}}
                <form action="{{ route('login.process') }}" method="POST" style="width:100%; max-width:330px;">
                    @csrf

                    {{-- Email --}}
                    <div class="mb-3 text-start">
                        <label class="form-label fw-semibold" style="font-size:0.85rem;">Email Address</label>
                        <input type="email" name="email" class="form-control" placeholder="email@example.com" required>
                    </div>

                    {{-- Password --}}
                    <div class="mb-3 text-start">
                        <label class="form-label fw-semibold" style="font-size:0.85rem;">Password</label>
                        <input type="password" name="password" class="form-control" placeholder="password" required>
                    </div>

                    {{-- Role --}}
                    <div class="mb-3 text-start">
                        <label for="role">Role</label>
                        <select name="role" class="form-control" required>
                            <option value="">-- Pilih Role --</option>
                            <option value="admin">Admin</option>
                        </select>
                    </div>

                    {{-- Remember + Forgot --}}
                    <div class="d-flex justify-content-between align-items-center mb-4" style="font-size:0.85rem;">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="remember">
                            <label for="remember" class="form-check-label">Remember Me</label>
                        </div>

                        <a href="#" class="text-decoration-none forgot-hover fw-semibold" style="color:#E27258;">
                            Forgot Password?
                        </a>
                    </div>

                    {{-- Button --}}
                    <button class="btn w-100 text-white py-2 fw-semibold login-btn"
                        style="background:#F7B56A; border-radius:6px;">
                        Continue
                    </button>

                    <p class="text-muted mt-3" style="font-size:0.75rem;">© 2025 SiDesa</p>
                </form>
            </div>

            {{-- BAGIAN KANAN (GAMBAR) --}}
            <div style="width: 50%; background:#FFF4DD;">
                <img src="{{ asset('assets-guest/img/service-4.jpg') }}" style="width:100%; height:100%; object-fit:cover;">
            </div>

        </div>
    </div>
@endsection
