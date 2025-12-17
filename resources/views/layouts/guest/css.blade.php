<head>
    <meta charset="utf-8">
    <title>SiDesa</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Spinner Start -->
    <div id="spinner"
        class="show w-100 vh-100 bg-white position-fixed translate-middle top-50 start-50  d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" role="status"></div>
    </div>
    <!-- Spinner End -->

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500;600&family=Roboto&display=swap" rel="stylesheet">

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

    <!-- Floating WhatsApp Button -->
    <a href="https://wa.me/6282134567890" class="float-whatsapp" target="_blank">
        <i class="fa-brands fa-whatsapp"></i>
    </a>

    <!-- FONT AWESOME CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />


    <!-- Style Floating Button -->
    <style>
        .navbar-nav .nav-link:hover {
            color: #F8B968 !important;
            /* warna kuning kamu */
        }

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

        /* jika header situs fixed/menempel di atas, atur tinggi ini agar konten tidak tertutup */
        .site-top-space {
            height: 120px;
            /* <-- ubah angka ini sesuai tinggi headermu (mis. 150px jika header lebih besar) */
        }

        /* card styling (sama seperti sebelumnya) */
        .cat-card {
            background: #fff;
            border-radius: 16px;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.08);
            padding: 20px 24px;
            margin-bottom: 18px;
            transition: 0.3s;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .cat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.12);
        }

        .cat-info {
            display: flex;
            align-items: center;
            gap: 18px;
            flex: 1;
        }

        .cat-avatar {
            width: 64px;
            height: 64px;
            border-radius: 50%;
            background: linear-gradient(135deg, #F5A97F, #E27258);
            color: #fff;
            font-size: 22px;
            font-weight: 700;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .cat-details h5 {
            margin-bottom: 6px;
            font-weight: 700;
            color: #222;
            font-size: 1.05rem;
        }

        .cat-details p {
            margin: 0;
            font-size: 14px;
            color: #666;
        }

        .cat-meta {
            margin-top: 6px;
            font-size: 13px;
            color: #7a7a7a;
        }

        .cat-actions {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 8px;
            margin-left: 18px;
        }

        .card-footer {
            border-top: none !important;
            /* Hilangkan garis */
            background-color: white;
            /* Biar tetap rapi */
            margin-top: 0;
            padding-top: 15px;
            /* Jarak tombol dari konten atas */
        }

        .btn-add {
            background-color: #F8B968;
            border: none;
            color: #000;
            ;
            padding: 6px 14px;
            font-weight: 700;
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
            .cat-card {
                flex-direction: column;
                align-items: flex-start;
                gap: 12px;
            }

            .cat-actions {
                flex-direction: row;
            }
        }

        .btn-tambah-kategori {
            background: #F7B56A;
            /* warna sama seperti contoh */
            color: #000;
            font-weight: 700;
            padding: 10px 18px;
            border-radius: 4px;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .btn-tambah-kategori .plus-icon {
            width: 22px;
            height: 22px;
            border: 2px solid #000;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
            font-weight: 700;
        }

        .btn-tambah-kategori:hover {
            background: #e9a85f;
        }

        .galeri-card {
            transition: all 0.3s ease;
            border-radius: 10px;
        }

        .galeri-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 25px rgba(0, 0, 0, 0.15);
        }

        .berita-card {
            transition: all 0.3s ease;
            border-radius: 10px;
        }

        .berita-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 25px rgba(0, 0, 0, 0.15);
        }

        .event-item {
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .event-item:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 25px rgba(0, 0, 0, 0.15);
        }

        .agenda-image {
            width: 100%;
            height: 220px;
            object-fit: cover;
        }

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

        /* ukuran icon logo */
        .logo-icon {
            height: 50px;
            /* PAS buat navbar */
            width: auto;
        }

        /* teks brand */
        .brand-text {
            font-size: 22px;
            font-weight: 700;
            color: #0d6efd;
            /* sesuaikan warna */
            line-height: 1;
        }

        /* navbar normal */
        .navbar {
            height: 75px;
        }

        /* brand text navbar */
        .brand-text {
            font-size: 32px;
            /* BESAR TAPI AMAN */
            font-weight: 700;
            color: #f5b463;
            /* warna kuning kamu */
            line-height: 1;
            white-space: nowrap;
            /* BIAR GA KE POTONG */
        }

        /* navbar tetap stabil */
        .navbar {
            height: 75px;
            display: flex;
            align-items: center;
        }

        .login-logo {
            height: 80px;
            /* BESARIN / KECILIN DI SINI */
            width: auto;
            object-fit: contain;
            display: block;
            margin: 0 auto;
            /* PAKSA TENGAH */
        }

        .bg-breadcrumb {
            height: 350px;
            background:
                linear-gradient(rgba(0, 0, 0, 0.35),
                    rgba(0, 0, 0, 0.35)),
                url("/assets-guest/img/header.jpg") center/cover no-repeat;
            display: flex;
            align-items: center;
        }
        
    </style>

    <!-- Pastikan Font Awesome sudah aktif -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

</head>
