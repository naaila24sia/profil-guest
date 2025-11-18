<head>
    <meta charset="utf-8">
    <title>Data User</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Jost:wght@400;500;600;700&family=Roboto:wght@400;500&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('assets-guest/vendor/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets-guest/vendor/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets-guest/vendor/lightbox/css/lightbox.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('assets-guest/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('assets-guest/css/style.css') }}" rel="stylesheet">

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

    <!-- Floating WhatsApp Button -->
    <a href="https://wa.me/6282134567890" class="float-whatsapp" target="_blank">
        <i class="fa-brands fa-whatsapp"></i>
    </a>

    <!-- FONT AWESOME CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />


    <!-- Style Floating Button -->
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

    <!-- Pastikan Font Awesome sudah aktif -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

</head>
