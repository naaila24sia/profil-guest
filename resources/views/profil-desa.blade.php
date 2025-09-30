<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil {{ $nama_desa }}</title>
    {{-- Menggunakan font modern dari Google Fonts --}}
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        /* Variabel Warna Tema Biru Dongker & Biru Laut (DIPERTAHANKAN) */
        :root {
            --primary-navy: #0D47A1;    /* Biru Dongker/Navy (Warna Utama Navbar & Footer) */
            --secondary-sky: #4FC3F7;   /* Biru Laut / Sky Blue Cerah (Warna Aksen) */
            --accent-color: #FF7043;   /* Oranye/Coral untuk Aksen Visi */
            --text-color: #333;
            --light-bg: #E1F5FE;     /* Biru Sangat Muda (Background Halaman) */
            --card-bg: #FFFFFF;
            --shadow-base: 0 8px 25px rgba(0, 0, 0, 0.1);
            --shadow-hover: 0 12px 30px rgba(0, 0, 0, 0.2);
            --shadow-active: 0 3px 10px rgba(0, 0, 0, 0.2);
            --border-radius: 15px;
        }

        /* Gaya Dasar */
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background-color: var(--light-bg);
            color: var(--text-color);
            line-height: 1.6;
        }

        /* CONTAINER UTAMA (FULL WIDTH) */
        .container {
            width: 100%;
            margin: 0;
            padding: 0;
        }

        /* HEADER / NAVBAR (KEMBALI KE NAVY) */
        .header {
            background-color: var(--primary-navy); /* Biru Dongker */
            color: white;
            padding: 10px 40px;
            text-align: left;
            box-shadow: var(--shadow-base);
            margin-bottom: 30px;
            display: flex;
            align-items: center;
            border-radius: 0;
        }
        .header .logo {
            width: 50px;
            height: 50px;
            border-radius: 0%;
            object-fit: contain;
            border: none;
            margin-right: 15px;
            margin-bottom: 0;
        }
        .header .desa-info {
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        .header h1 {
            margin: 0;
            font-size: 1.4em;
            font-weight: 600;
        }
        .header p {
            margin: 0;
            font-size: 0.9em;
            color: rgba(255, 255, 255, 0.8);
        }

        /* CONTAINER DENGAN PADDING HORIZONTAL */
        .main-content {
            padding: 0 40px;
        }

        /* VISI MISI CARD */
        .visi-misi-card {
            background-color: var(--card-bg);
            padding: 30px;
            border-radius: var(--border-radius);
            box-shadow: var(--shadow-base);
            margin: 0 auto 40px auto;
            max-width: 1200px;
            text-align: center;
            transition: box-shadow 0.3s ease, transform 0.1s;
            cursor: pointer;
        }

        /* EFEK INTERAKTIF: Saat kursor mengarah ke elemen */
        .visi-misi-card:hover {
            box-shadow: var(--shadow-hover);
            transform: translateY(-2px);
        }

        /* EFEK INTERAKTIF: Saat elemen ditekan (klik) */
        .visi-misi-card:active {
            box-shadow: var(--shadow-active);
            transform: translateY(1px);
        }

        .visi-misi-card h2 {
            font-size: 2.2em;
            color: var(--primary-navy);
            margin-bottom: 10px;
            font-weight: 700;
        }
        .visi-misi-card .visi-text {
            font-size: 1.1em;
            margin-bottom: 30px;
            font-style: italic;
            color: #555;
            padding: 0 50px;
        }
        .misi-list {
            list-style: none;
            padding: 0;
            text-align: left;
            max-width: 600px;
            margin: 0 auto 20px;
        }
        .misi-list li {
            font-size: 1.05em;
            padding: 10px 0;
            border-bottom: 1px dashed #DDD;
            display: flex;
            align-items: center;
        }
        .misi-list li:before {
            content: "✓";
            color: var(--secondary-sky);
            font-weight: bold;
            display: inline-block;
            width: 1.2em;
            margin-right: 10px;
            font-size: 1.2em;
        }
        .misi-list li:last-child {
            border-bottom: none;
        }

        /* BAGIAN INFORMASI LAIN */
        .content-section {
            background-color: var(--card-bg);
            padding: 30px;
            border-radius: var(--border-radius);
            box-shadow: var(--shadow-base);
            margin: 0 auto 20px auto;
            max-width: 1200px;
            transition: box-shadow 0.3s ease, transform 0.1s;
            cursor: pointer;
        }

        /* EFEK INTERAKTIF PADA SECTION */
        .content-section:hover {
            box-shadow: var(--shadow-hover);
            transform: translateY(-2px);
        }

        .content-section:active {
            box-shadow: var(--shadow-active);
            transform: translateY(1px);
        }

        .section-title {
            font-size: 1.6em;
            color: var(--primary-navy);
            border-bottom: 3px solid var(--secondary-sky);
            padding-bottom: 5px;
            margin-bottom: 20px;
            font-weight: 600;
        }
        .info-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }
        .info-box {
            background-color: var(--light-bg);
            border-left: 5px solid var(--secondary-sky);
            padding: 15px;
            border-radius: 8px;
        }
        .info-box strong {
            display: block;
            color: var(--primary-navy);
            margin-bottom: 3px;
            font-size: 0.9em;
        }

        /* FOOTER (Full Width) */
        .footer {
            text-align: center;
            padding: 15px 0;
            background-color: var(--primary-navy);
            color: white;
            border-radius: 0;
            margin-top: 20px;
            font-size: 0.85em;
        }

        /* RESPONSIVE CSS */
        @media (max-width: 768px) {
            .header {
                padding: 10px 20px;
            }
            .header .logo {
                width: 40px;
                height: 40px;
            }
            .header h1 {
                font-size: 1.2em;
            }
            .header p {
                font-size: 0.8em;
            }
            .main-content {
                padding: 0 15px;
            }
            .info-grid {
                grid-template-columns: 1fr;
            }
            .visi-misi-card .visi-text {
                padding: 0 15px;
            }
        }
    </style>
</head>
<body>

    <div class="container">

        <div class="header">
            <img src="{{ asset($logo_path) }}" alt="Logo {{ $nama_desa }}" class="logo">
            <div class="desa-info">
                <h1>{{ $nama_desa }}</h1>
                <p>Kabupaten {{ $kabupaten }}</p>
            </div>
        </div>

        <div class="main-content">

            <div class="visi-misi-card">

                <h2 style="color: var(--accent-color);">Visi</h2>
                <p class="visi-text">"{{ $visi }}"</p>

                <h2 style="margin-top: 40px;">Misi</h2>
                <ul class="misi-list">
                    @foreach ($misi as $index => $item)
                        <li>
                            {{ ($index + 1) . '. ' . $item }}
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="content-section">
                <h2 class="section-title">Informasi Lokasi</h2>
                <div class="info-grid">
                    <div class="info-box">
                        <strong>Kecamatan</strong>
                        <p>{{ $kecamatan }}</p>
                    </div>
                    <div class="info-box">
                        <strong>Kabupaten</strong>
                        <p>{{ $kabupaten }}</p>
                    </div>
                    <div class="info-box">
                        <strong>Provinsi</strong>
                        <p>{{ $provinsi }}</p>
                    </div>
                    <div class="info-box">
                        <strong>Alamat Kantor</strong>
                        <p>{{ $alamat_kantor }}</p>
                    </div>
                </div>
            </div>

            <div class="content-section">
                <h2 class="section-title">Kontak Resmi</h2>
                <div class="info-grid">
                    <div class="info-box">
                        <strong>Email</strong>
                        <p>{{ $email }}</p>
                    </div>
                    <div class="info-box">
                        <strong>Nomor Telepon</strong>
                        <p>{{ $telepon }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer">
            <p>Data Profil Desa | Akses: {{ $tanggal_akses }}</p>
        </div>
    </div>

</body>
</html>


