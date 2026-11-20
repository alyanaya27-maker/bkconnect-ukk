<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BKConnect - Sistem BK & Konseling</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
            scroll-behavior: smooth;
        }

        body {
            background: #F5F7FF;
            color: #1E293B;
        }

        header {
            background: white;
            padding: 18px 7%;
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-shadow: 0 2px 12px rgba(0,0,0,0.06);
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 10px;
            color: #315BFF;
            font-size: 23px;
            font-weight: bold;
        }

        .brand img {
            width: 48px;
            height: 48px;
            object-fit: contain;
        }

        nav {
            display: flex;
            align-items: center;
            gap: 28px;
        }

        nav a {
            text-decoration: none;
            color: #334155;
            font-size: 14px;
            font-weight: 600;
        }

        nav a:hover {
            color: #315BFF;
        }

        .btn {
            display: inline-block;
            padding: 12px 23px;
            border-radius: 9px;
            text-decoration: none;
            font-weight: bold;
            font-size: 14px;
            transition: 0.2s;
        }

        .btn-primary {
            background: #315BFF;
            color: white;
        }

        .btn-primary:hover {
            background: #2448D8;
        }

        .btn-outline {
            border: 1.5px solid #315BFF;
            color: #315BFF;
        }

        .hero {
            min-height: 570px;
            padding: 90px 7%;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 40px;
            background: linear-gradient(120deg, #EEF2FF, #F5F3FF);
        }

        .hero-content {
            max-width: 600px;
        }

        .tagline {
            display: inline-block;
            background: #E0E7FF;
            color: #315BFF;
            padding: 9px 16px;
            border-radius: 30px;
            font-size: 13px;
            font-weight: bold;
            margin-bottom: 22px;
        }

        .hero h1 {
            font-size: 47px;
            line-height: 1.2;
            margin-bottom: 20px;
            color: #172554;
        }

        .hero h1 span {
            color: #315BFF;
        }

        .hero p {
            color: #64748B;
            line-height: 1.8;
            font-size: 16px;
            margin-bottom: 30px;
        }

        .hero-buttons {
            display: flex;
            gap: 13px;
            flex-wrap: wrap;
        }

        .hero-visual {
            width: 390px;
            min-height: 300px;
            border-radius: 30px;
            background: linear-gradient(135deg, #315BFF, #8B5CF6);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-align: center;
            padding: 35px;
            box-shadow: 0 20px 45px rgba(49,91,255,0.2);
        }

        .hero-visual h2 {
            font-size: 30px;
            margin-bottom: 15px;
        }

        .hero-visual p {
            color: #EEF2FF;
            margin: 0;
        }

        section {
            padding: 75px 7%;
        }

        .section-title {
            text-align: center;
            margin-bottom: 45px;
        }

        .section-title h2 {
            font-size: 32px;
            color: #172554;
            margin-bottom: 12px;
        }

        .section-title p {
            color: #64748B;
            line-height: 1.7;
        }

        .about {
            background: white;
            text-align: center;
        }

        .about-content {
            max-width: 800px;
            margin: auto;
            color: #64748B;
            line-height: 1.9;
            font-size: 16px;
        }

        .services {
            background: #F5F7FF;
        }

        .service-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 25px;
        }

        .service-card {
            background: white;
            padding: 30px 25px;
            border-radius: 17px;
            box-shadow: 0 8px 25px rgba(0,0,0,0.04);
            text-align: center;
        }

        .service-icon {
            width: 65px;
            height: 65px;
            margin: 0 auto 20px;
            border-radius: 17px;
            background: #EEF2FF;
            color: #315BFF;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 29px;
        }

        .service-card h3 {
            color: #172554;
            margin-bottom: 12px;
        }

        .service-card p {
            color: #64748B;
            font-size: 14px;
            line-height: 1.8;
        }

        .cta {
            background: linear-gradient(120deg, #315BFF, #8B5CF6);
            color: white;
            text-align: center;
        }

        .cta h2 {
            font-size: 30px;
            margin-bottom: 15px;
        }

        .cta p {
            margin-bottom: 25px;
            line-height: 1.7;
            color: #EEF2FF;
        }

        .cta .btn {
            background: white;
            color: #315BFF;
        }

        footer {
            background: #172554;
            color: #CBD5E1;
            text-align: center;
            padding: 25px;
            font-size: 13px;
        }

        @media (max-width: 850px) {
            header {
                flex-wrap: wrap;
                gap: 15px;
            }

            nav {
                gap: 15px;
                flex-wrap: wrap;
            }

            .hero {
                flex-direction: column;
                text-align: center;
            }

            .hero h1 {
                font-size: 36px;
            }

            .hero-buttons {
                justify-content: center;
            }

            .hero-visual {
                width: 100%;
                max-width: 390px;
            }

            .service-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>

<header>
    <div class="brand">
        <img src="{{ asset('images/logo-bk.png') }}" alt="Logo BKConnect">
        <span>BKConnect</span>
    </div>

    <nav>
        <a href="#beranda">Beranda</a>
        <a href="#tentang">Tentang</a>
        <a href="#layanan">Layanan</a>
        <a href="{{ route('login') }}">Login</a>
        <a href="{{ route('register') }}" class="btn btn-primary">Daftar</a>
    </nav>
</header>

<main>
    <section class="hero" id="beranda">
        <div class="hero-content">
            <span class="tagline">Sistem BK & Konseling</span>

            <h1>
                Temukan Solusi dan
                <span>Dukungan</span>
                Bersama BKConnect
            </h1>

            <p>
                BKConnect merupakan sistem informasi Bimbingan dan
                Konseling yang membantu siswa mengajukan konseling,
                melihat jadwal, dan memantau riwayat konseling
                dengan lebih mudah.
            </p>

            <div class="hero-buttons">
                <a href="{{ route('register') }}" class="btn btn-primary">
                    Mulai Sekarang
                </a>

                <a href="#tentang" class="btn btn-outline">
                    Pelajari Lebih Lanjut
                </a>
            </div>
        </div>

        <div class="hero-visual">
            <div>
                <h2>BKConnect</h2>
                <p>
                    Mendukung layanan Bimbingan dan Konseling
                    yang lebih mudah, teratur, dan terintegrasi.
                </p>
            </div>
        </div>
    </section>

    <section class="about" id="tentang">
        <div class="section-title">
            <h2>Tentang BKConnect</h2>
            <p>Mengenal sistem informasi Bimbingan dan Konseling</p>
        </div>

        <div class="about-content">
            BKConnect adalah sistem informasi Bimbingan dan Konseling
            berbasis web yang dirancang untuk membantu pengelolaan
            layanan konseling di sekolah. Sistem ini menghubungkan
            siswa, Guru BK, Wali Kelas, dan Admin sesuai dengan
            hak akses masing-masing.
        </div>
    </section>

    <section class="services" id="layanan">
        <div class="section-title">
            <h2>Layanan BKConnect</h2>
            <p>Fitur yang membantu proses layanan konseling di sekolah</p>
        </div>

        <div class="service-grid">
            <div class="service-card">
                <div class="service-icon">📝</div>
                <h3>Pengajuan Konseling</h3>
                <p>
                    Siswa dapat mengajukan permintaan konseling
                    melalui sistem dengan lebih mudah.
                </p>
            </div>

            <div class="service-card">
                <div class="service-icon">📅</div>
                <h3>Jadwal Konseling</h3>
                <p>
                    Membantu melihat dan mengelola jadwal
                    pelaksanaan konseling.
                </p>
            </div>

            <div class="service-card">
                <div class="service-icon">📋</div>
                <h3>Riwayat Konseling</h3>
                <p>
                    Membantu melihat riwayat pengajuan dan
                    perkembangan layanan konseling.
                </p>
            </div>
        </div>
    </section>

    <section class="cta">
        <h2>Mulai Gunakan BKConnect</h2>
        <p>
            Akses layanan Bimbingan dan Konseling sekolah
            melalui satu sistem yang terintegrasi.
        </p>

        <a href="{{ route('register') }}" class="btn">
            Daftar Sekarang
        </a>
    </section>
</main>

<footer>
    &copy; {{ date('Y') }} BKConnect - Sistem BK & Konseling.
    Semua Hak Dilindungi.
</footer>

</body>
</html>
