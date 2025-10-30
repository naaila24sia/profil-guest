<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Bina Desa</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500;600&family=Roboto&display=swap" rel="stylesheet">

    <!-- Font Awesome 5 (harus ini, biar icon muncul) -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />

    <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('assets-guest/vendor/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets-guest/vendor/lightbox/css/lightbox.min.css') }}" rel="stylesheet">


    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('assets-guest/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('assets-guest/css/style.css') }}" rel="stylesheet">
</head>

<body>
    <!-- ✅ NAVBAR START -->
    <div class="container-fluid fixed-top px-0">
            <div class="container px-0">
                <div class="topbar">
                    <div class="row align-items-center justify-content-center">
                        <div class="col-md-8">
                            <div class="topbar-info d-flex flex-wrap">
                                <a href="#" class="text-light me-4"><i class="fas fa-envelope text-white me-2"></i>Example@gmail.com</a>
                                <a href="#" class="text-light"><i class="fas fa-phone-alt text-white me-2"></i>+01234567890</a>
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
                <nav class="navbar navbar-light bg-light navbar-expand-xl">
                    <a href="index.html" class="navbar-brand ms-3">
                        <h1 class="text-primary display-5">Bina Desa</h1>
                    </a>
                    <button class="navbar-toggler py-2 px-3 me-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                        <span class="fa fa-bars text-primary"></span>
                    </button>
                    <div class="collapse navbar-collapse bg-light" id="navbarCollapse">
                        <div class="navbar-nav ms-auto">
                            <a href="{{route('dashboard')}}" class="nav-item nav-link">Home</a>
                            <a href="{{route('about.index')}}" class="nav-item nav-link active">About</a>
                            <a href="about.html" class="nav-item nav-link">Profil</a>
                            <a href="blog.html" class="nav-item nav-link">Berita</a>
                            <a href="events.html" class="nav-item nav-link">Agenda</a>
                            <a href="{{route('galeri.index')}}" class="nav-item nav-link">Galeri</a>
                            <a href="{{route('warga.index')}}" class="nav-item nav-link">Warga</a>
                            <a href="{{route('user.index')}}" class="nav-item nav-link">User</a>
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

    <!-- ✅ NAVBAR END -->

    <div class="container-fluid bg-breadcrumb">
        <div class="container text-center py-5" style="max-width: 900px;">
            <h3 class="text-white display-3 mb-4">About</h3>
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active text-white">About</li>
            </ol>
        </div>
    </div>

    <!-- ✅ ABOUT SECTION -->
    <div class="container py-5" style="margin-top: 150px;">
>
        <h1 class="text-center text-warning mb-2">
            <i class="fas fa-info-circle"></i> Tentang Aplikasi
        </h1>
        <p class="text-center text-muted mb-5">Sistem Informasi <strong>Bina Desa</strong></p>

        <!-- CARD UTAMA -->
        <div class="card shadow border-0 mb-5">
            <div class="card-body text-center p-5">
                <h3 class="text-warning mb-3"><i class="fas fa-bullseye"></i> Tujuan Aplikasi</h3>
                <p>
                    Aplikasi <strong>Bina Desa</strong> dirancang untuk membantu pengelolaan data warga, kegiatan, dan
                    informasi desa secara efisien dan terintegrasi.
                </p>
            </div>
        </div>

        <!-- 3 CARD TUJUAN -->
        <div class="row text-center">
            <div class="col-md-4 mb-4">
                <div class="card shadow border-0 p-4">
                    <i class="fas fa-database fa-2x text-success mb-3"></i>
                    <h5>Data Terpusat</h5>
                    <p>Seluruh informasi warga dan kegiatan disimpan dalam satu sistem agar mudah diakses.</p>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card shadow border-0 p-4">
                    <i class="fas fa-handshake fa-2x text-warning mb-3"></i>
                    <h5>Kolaboratif</h5>
                    <p>Memudahkan perangkat desa bekerja sama dalam pembaruan dan validasi data.</p>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card shadow border-0 p-4">
                    <i class="fas fa-chart-line fa-2x text-info mb-3"></i>
                    <h5>Transparansi</h5>
                    <p>Meningkatkan kepercayaan masyarakat melalui laporan kegiatan yang terbuka.</p>
                </div>
            </div>
        </div>

        <!-- CARD ALUR -->
        <div class="card shadow border-0 p-5 mt-5">
            <h3 class="text-center text-warning mb-4"><i class="fas fa-route"></i> Alur Aplikasi</h3>
            <ol class="fs-5">
                <li>Pengguna membuka halaman utama <strong>Bina Desa</strong>.</li>
                <li>Admin atau perangkat desa melakukan login.</li>
                <li>Data warga dapat ditambah, diedit, atau dihapus.</li>
                <li>Hasil data divisualisasikan dalam dashboard interaktif.</li>
            </ol>
        </div>
    </div>

    <!-- ✅ FOOTER -->
    <div class="container-fluid footer bg-dark text-body py-5">
            <div class="container py-5">
                <div class="row g-5">
                    <div class="col-md-6 col-lg-6 col-xl-3">
                        <div class="footer-item">
                            <h4 class="mb-4 text-white">Newsletter</h4>
                            <p class="mb-4">Dolor amet sit justo amet elitr clita ipsum elitr est.Lorem ipsum dolor sit amet, consectetur adipiscing elit consectetur adipiscing elit.</p>
                            <div class="position-relative mx-auto">
                                <input class="form-control border-0 bg-secondary w-100 py-3 ps-4 pe-5" type="text" placeholder="Enter your email">
                                <button type="button" class="btn-hover-bg btn btn-primary position-absolute top-0 end-0 py-2 mt-2 me-2">SignUp</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-3">
                        <div class="footer-item d-flex flex-column">
                            <h4 class="mb-4 text-white">Our Services</h4>
                            <a href=""><i class="fas fa-angle-right me-2"></i> Ocean Turtle</a>
                            <a href=""><i class="fas fa-angle-right me-2"></i> White Tiger</a>
                            <a href=""><i class="fas fa-angle-right me-2"></i> Social Ecology</a>
                            <a href=""><i class="fas fa-angle-right me-2"></i> Loneliness</a>
                            <a href=""><i class="fas fa-angle-right me-2"></i> Beauty of Life</a>
                            <a href=""><i class="fas fa-angle-right me-2"></i> Present for You</a>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-3">
                        <div class="footer-item d-flex flex-column">
                            <h4 class="mb-4 text-white">Volunteer</h4>
                            <a href=""><i class="fas fa-angle-right me-2"></i> Karen Dawson</a>
                            <a href=""><i class="fas fa-angle-right me-2"></i> Jack Simmons</a>
                            <a href=""><i class="fas fa-angle-right me-2"></i> Michael Linden</a>
                            <a href=""><i class="fas fa-angle-right me-2"></i> Simon Green</a>
                            <a href=""><i class="fas fa-angle-right me-2"></i> Natalie Channing</a>
                            <a href=""><i class="fas fa-angle-right me-2"></i> Caroline Gerwig</a>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-3">
                        <div class="footer-item">
                            <h4 class="mb-4 text-white">Our Gallery</h4>
                            <div class="row g-2">
                                <div class="col-4">
                                    <div class="footer-gallery">
                                        <img src="{{asset('assets-guest/img/gallery-footer-1.jpg')}}" class="img-fluid w-100" alt="">
                                        <div class="footer-search-icon">
                                            <a href="{{asset('assets-guest/img/gallery-footer-1.jpg')}}" data-lightbox="footerGallery-1" class="my-auto"><i class="fas fa-search-plus text-white"></i></a>
                                        </div>
                                    </div>
                               </div>
                               <div class="col-4">
                                    <div class="footer-gallery">
                                        <img src="{{asset('assets-guest/img/gallery-footer-2.jpg')}}" class="img-fluid w-100" alt="">
                                        <div class="footer-search-icon">
                                            <a href="{{asset('assets-guest/img/gallery-footer-2.jpg')}}" data-lightbox="footerGallery-2" class="my-auto"><i class="fas fa-search-plus text-white"></i></a>
                                        </div>
                                    </div>
                               </div>
                                <div class="col-4">
                                    <div class="footer-gallery">
                                        <img src="{{asset('assets-guest/img/gallery-footer-3.jpg')}}" class="img-fluid w-100" alt="">
                                        <div class="footer-search-icon">
                                            <a href="{{asset('assets-guest/img/gallery-footer-3.jpg')}}" data-lightbox="footerGallery-3" class="my-auto"><i class="fas fa-search-plus text-white"></i></a>
                                        </div>
                                    </div>
                               </div>
                                <div class="col-4">
                                    <div class="footer-gallery">
                                        <img src="{{asset('assets-guest/img/gallery-footer-4.jpg')}}" class="img-fluid w-100" alt="">
                                        <div class="footer-search-icon">
                                            <a href="{{asset('assets-guest/img/gallery-footer-4.jpg')}}" data-lightbox="footerGallery-4" class="my-auto"><i class="fas fa-search-plus text-white"></i></a>
                                        </div>
                                    </div>
                               </div>
                                <div class="col-4">
                                    <div class="footer-gallery">
                                        <img src="{{asset('assets-guest/img/gallery-footer-5.jpg')}}" class="img-fluid w-100" alt="">
                                        <div class="footer-search-icon">
                                            <a href="{{asset('assets-guest/img/gallery-footer-5.jpg')}}" data-lightbox="footerGallery-5" class="my-auto"><i class="fas fa-search-plus text-white"></i></a>
                                        </div>
                                    </div>
                               </div>
                               <div class="col-4">
									<div class="footer-gallery">
										<img src="{{asset('assets-guest/img/gallery-footer-6.jpg')}}" class="img-fluid w-100" alt="">
                                        <div class="footer-search-icon">
                                            <a href="{{asset('assets-guest/img/gallery-footer-6.jpg')}}" data-lightbox="footerGallery-6" class="my-auto"><i class="fas fa-search-plus text-white"></i></a>
                                        </div>
									</div>
								</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    <!-- ✅ FLOATING WHATSAPP BUTTON -->
    <a href="https://wa.me/6281234567890?text=Halo%20Admin%2C%20saya%20ingin%20bertanya%20tentang%20Bina%20Desa"
        class="float-whatsapp" target="_blank">
        <i class="fab fa-whatsapp"></i>
    </a>

    <style>
        .float-whatsapp {
            position: fixed;
            width: 60px;
            height: 60px;
            bottom: 90px;
            right: 20px;
            background-color: #25D366;
            color: white;
            border-radius: 50%;
            text-align: center;
            font-size: 30px;
            box-shadow: 2px 2px 3px #999;
            z-index: 100;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
        }

        .float-whatsapp:hover {
            background-color: #128C7E;
            transform: scale(1.1);
        }
    </style>

    <!-- ✅ JS LIBRARIES -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets-guest/vendor/easing/easing.min.js') }}"></script>
    <script src="{{ asset('assets-guest/vendor/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('assets-guest/vendor/counterup/counterup.min.js') }}"></script>
    <script src="{{ asset('assets-guest/vendor/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets-guest/vendor/lightbox/js/lightbox.min.js') }}"></script>
    <script src="{{ asset('assets-guest/js/main.js') }}"></script>
</body>
</html>
