<head>
    <meta charset="utf-8">
    <title>Data Warga</title>
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
        /* ======== Tambahan Style untuk Card Horizontal ======== */
        .card-horizontal {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: #fff;
            border-radius: 15px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            padding: 25px 30px;
            margin-bottom: 20px;
            transition: all 0.3s ease;
        }

        .card-horizontal:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 16px rgba(0, 0, 0, 0.12);
        }

        .card-info {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .card-avatar {
            width: 70px;
            height: 70px;
            border-radius: 50%;
            background: #0d6efd;
            color: #fff;
            font-weight: 600;
            font-size: 22px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .card-details p {
            margin-bottom: 3px;
            font-size: 15px;
            color: #444;
        }

        .card-actions {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
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

        .btn-hapus {
            background-color: #dc3545;
            border: none;
            color: #fff;
            padding: 6px 16px;
            border-radius: 6px;
            font-size: 14px;
            transition: 0.3s;
            width: 90px;
        }

        .btn-hapus:hover {
            background-color: #bb2d3b;
        }

        @media (max-width: 768px) {
            .card-horizontal {
                flex-direction: column;
                align-items: flex-start;
            }

            .card-actions {
                flex-direction: row;
                margin-top: 10px;
            }
        }
    </style>
</head>
