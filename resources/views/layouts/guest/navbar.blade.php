<div class="container-fluid fixed-top px-0">
    <div class="container px-0">

        {{-- TOPBAR --}}
        <div class="topbar">
            <div class="row align-items-center justify-content-center">
                <div class="col-md-8">
                    <div class="topbar-info d-flex flex-wrap">
                        <a href="#" class="text-light me-4">
                            <i class="fas fa-envelope text-white me-2"></i>Example@gmail.com
                        </a>
                        <a href="#" class="text-light">
                            <i class="fas fa-phone-alt text-white me-2"></i>+01234567890
                        </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="topbar-icon d-flex align-items-center justify-content-end">
                        <a href="#" class="btn-square text-white me-2"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="btn-square text-white me-2"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="btn-square text-white me-2"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="btn-square text-white me-2"><i class="fab fa-pinterest"></i></a>
                        <a href="#" class="btn-square text-white me-0"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
            </div>
        </div>

        {{-- NAVBAR --}}
        <nav class="navbar navbar-light bg-light navbar-expand-xl">
            <a href="{{ route('dashboard') }}" class="navbar-brand ms-3">
                <h1 class="text-primary display-5">Bina Desa</h1>
            </a>

            <button class="navbar-toggler py-2 px-3 me-3" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarCollapse">
                <span class="fa fa-bars text-primary"></span>
            </button>

            <div class="collapse navbar-collapse bg-light" id="navbarCollapse">

                <ul class="navbar-nav ms-auto">

                    {{-- MENU UTAMA --}}
                    <li class="nav-item">
                        <a href="{{ route('dashboard') }}"
                            class="nav-link {{ request()->routeIs('dashboard') ? 'fw-bold text-primary' : 'text-dark' }}">
                            Home
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('about.index') }}"
                            class="nav-link {{ request()->routeIs('about.index') ? 'fw-bold text-primary' : 'text-dark' }}">
                            About
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('profil.index') }}"
                            class="nav-link {{ request()->routeIs('profil.index') ? 'fw-bold text-primary' : 'text-dark' }}">
                            Profil
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('agenda.index') }}"
                            class="nav-link {{ request()->routeIs('agenda.index') ? 'fw-bold text-primary' : 'text-dark' }}">
                            Agenda
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('galeri.index') }}"
                            class="nav-link {{ request()->routeIs('galeri.index') ? 'fw-bold text-primary' : 'text-dark' }}">
                            Galeri
                        </a>
                    </li>

                    {{-- DROPDOWN BERITA --}}
                    <li class="nav-item dropdown">
                        <a href="{{ route('berita.index') }}"
                            class="nav-link dropdown-toggle
                           {{ request()->routeIs('berita.*') || request()->routeIs('kategori.*') ? 'fw-bold text-primary' : 'text-dark' }}"
                            data-bs-toggle="dropdown">
                            Berita
                        </a>
                        <div class="dropdown-menu m-0 bg-secondary rounded-0">
                            <a href="{{ route('berita.index') }}" class="dropdown-item">Berita</a>
                            <a href="{{ route('kategori.index') }}" class="dropdown-item">Kategori Berita</a>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('warga.index') }}"
                            class="nav-link {{ request()->routeIs('warga.index') ? 'fw-bold text-primary' : 'text-dark' }}">
                            Warga
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('user.index') }}"
                            class="nav-link {{ request()->routeIs('user.index') ? 'fw-bold text-primary' : 'text-dark' }}">
                            User
                        </a>
                    </li>

                    {{-- LOGIN / USER DROPDOWN --}}

                    @if (Auth::check())
                        <li class="nav-item dropdown ms-3">
                            <a class="nav-link dropdown-toggle d-flex align-items-center" href="#"
    id="profileDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"
    style="gap: 8px;">

    {{-- Icon profile bulat --}}
    <div class="rounded-circle bg-primary d-flex justify-content-center align-items-center"
        style="width: 32px; height: 32px;">
        <i class="fa-regular fa-user text-white" style="font-size: 16px;"></i>
    </div>

    {{-- Nama user --}}
    <span class="text-dark fw-semibold" style="font-size: 15px;">
        {{ Auth::user()->name }}
    </span>
</a>


                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profileDropdown">

                                {{-- LAST LOGIN --}}
                                <li>
                                    <a class="dropdown-item d-flex align-items-center">
                                        <i class="fa-regular fa-clock me-2"></i>
                                        {{ session('last_login') }}

                                    </a>
                                </li>

                                <div class="dropdown-divider"></div>

                                {{-- LOGOUT --}}
                                <li>
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button type="submit" class="dropdown-item d-flex align-items-center">
                                            <i class="fa-solid fa-right-from-bracket me-2"></i>
                                            Logout
                                        </button>
                                    </form>
                                </li>

                            </ul>
                        </li>
                    @else
                        {{-- TOMBOL LOGIN --}}
                        <li class="nav-item ms-3 me-3">
                            <a href="{{ route('login.form') }}" class="btn btn-primary text-white py-2 px-4">
                                Login
                            </a>
                        </li>
                    @endif

                </ul>
            </div>
        </nav>
    </div>
</div>
{{-- <div class="d-flex align-items-center flex-nowrap pt-xl-0" style="margin-left: 15px;">
                        <a href="{{route('login.form')}}" class="btn-hover-bg btn btn-primary text-white py-2 px-4 me-3">Login</a>
                    </div>
                </ul> --}}

{{-- <div class="nav-item dropdown">
                                <a href="{{ route('berita.index') }}" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Berita</a>
                                <div class="dropdown-menu m-0 bg-secondary rounded-0">
                                    <a href="{{route('berita.index')}}" class="dropdown-item">Berita</a>
                                    <a href="{{route('kategori.index')}}" class="dropdown-item">Kategori Berita</a>
                                </div> --}}
{{-- <div class="d-flex align-items-center flex-nowrap pt-xl-0" style="margin-left: 15px;">
                        <a href="" class="btn-hover-bg btn btn-primary text-white py-2 px-4 me-3">Login</a>
                    </div>
                </ul> --}}
{{-- <a href="causes.html" class="nav-item nav-link">Causes</a> --}}
{{-- <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                                <div class="dropdown-menu m-0 bg-secondary rounded-0">
                                    <a href="blog.html" class="dropdown-item">Blog</a>
                                    <a href="gallery.html" class="dropdown-item">Gallery</a>
                                    <a href="volunteer.html" class="dropdown-item">Volunteers</a>
                                    <a href="donation.html" class="dropdown-item">Donation</a>
                                    <a href="404.html" class="dropdown-item">404 Error</a>
                                </div> --}}
{{-- </div>
                            <a href="contact.html" class="nav-item nav-link">Contact</a>
                        </div> --}}
{{-- <div class="d-flex align-items-center flex-nowrap pt-xl-0" style="margin-left: 15px;">
                            <a href="" class="btn-hover-bg btn btn-primary text-white py-2 px-4 me-3">Donate Now</a>
                        </div> --}}
</div>
</nav>
</div>
</div>
