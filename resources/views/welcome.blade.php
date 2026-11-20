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
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            color: #111827;
            background: #FFFFFF;
        }

        /* =========================
           NAVBAR
        ========================= */

        nav {
            height: 76px;
            padding: 0 7%;

            display: flex;
            align-items: center;
            justify-content: space-between;

            background: #FFFFFF;

            border-bottom: 1px solid #E5E7EB;

            position: sticky;
            top: 0;
            z-index: 100;
        }

        .logo {
    display: flex;
    align-items: center;
    gap: 10px;

    font-size: 26px;
    font-weight: 800;
    color: #315BFF;
}

.logo img {
    width: 42px;
    height: 42px;
    object-fit: contain;
}

        .nav-menu {
            display: flex;
            align-items: center;
            gap: 32px;
        }

        .nav-menu a {
            text-decoration: none;
            color: #111827;
            font-size: 15px;
            font-weight: 600;
        }

        .nav-menu a:hover {
            color: #315BFF;
        }

        .login-btn {
            background: #315BFF;
            color: #FFFFFF !important;

            padding: 11px 24px;

            border-radius: 30px;
        }

        .login-btn:hover {
            background: #8B5CF6;
        }


        /* =========================
           HERO
        ========================= */

        .hero {
            min-height: 650px;

            padding: 80px 7%;

            display: flex;
            align-items: center;
            justify-content: space-between;

            gap: 60px;

            background:
                 radial-gradient(circle at 85% 50%, rgba(139, 92, 246, 0.25), transparent 30%),
                 radial-gradient(circle at 10% 80%, rgba(49, 91, 255, 0.18), transparent 30%),
                 linear-gradient(135deg, #F5F7FF 0%, #EEF2FF 50%, #F5F0FF 100%);

            position: relative;
            overflow: hidden;
        }

        .hero::before {
            content: "";
            position: absolute;

            width: 280px;
            height: 280px;

            background: rgba(49, 91, 255, 0.10);

            border-radius: 50%;

            top: -100px;
            right: -80px;
        }

        .hero::after {
            content: "";
            position: absolute;

            width: 250px;
            height: 250px;

            background: rgba(139, 92, 246, 0.10);

            border-radius: 50%;

            bottom: -120px;
            left: -80px;
        }

        .hero-content {
            max-width: 600px;
        }

        .hero-label {
            display: inline-block;

            padding: 8px 16px;

            margin-bottom: 20px;

            border-radius: 30px;

            background: #E5E7EB;

            color: #315BFF;

            font-size: 14px;
            font-weight: bold;
        }

        .hero-content h1 {
            font-size: 52px;

            line-height: 1.15;

            margin-bottom: 24px;
        }

        .hero-content h1 span {
            color: #315BFF;
        }

        .hero-content p {
            font-size: 18px;

            line-height: 1.7;

            color: #6B7280;

            margin-bottom: 35px;
        }

        .hero-buttons {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .primary-button {
            display: inline-block;

            text-decoration: none;

            background: #315BFF;

            color: #FFFFFF;

            padding: 15px 28px;

            border-radius: 30px;

            font-weight: bold;
        }

        .primary-button:hover {
            background: #8B5CF6;
        }

        .secondary-button {
            display: inline-block;

            text-decoration: none;

            color: #315BFF;

            border: 1px solid #E5E7EB;

            padding: 15px 28px;

            border-radius: 30px;

            font-weight: bold;
        }

        .secondary-button:hover {
            background: #E5E7EB;
        }


        /* =========================
           HERO VISUAL
        ========================= */

        .hero-visual {
           width: 430px;
           height: 360px;

           display: flex;
           align-items: center;
           justify-content: center;

           text-align: center;
        }

        .hero-visual-content img {
           width: 300px;
           height: 300px;
           object-fit: contain;
        }

        /* =========================
           TENTANG
        ========================= */

        .about {
    padding: 100px 7%;

    background:
        radial-gradient(
            circle at 20% 30%,
            rgba(49, 91, 255, 0.08),
            transparent 35%
        ),
        radial-gradient(
            circle at 80% 70%,
            rgba(139, 92, 246, 0.08),
            transparent 35%
        ),
        #F8FAFF;

    text-align: center;
}

        .section-label {
            color: #315BFF;

            font-size: 14px;

            font-weight: bold;

            margin-bottom: 12px;
        }

        .section-title {
            font-size: 36px;

            margin-bottom: 18px;
        }

        .section-description {
            max-width: 700px;

            margin: auto;

            color: #6B7280;

            line-height: 1.7;
        }


        /* =========================
           LAYANAN
        ========================= */

        .services {
            padding: 100px 7%;

            background:
                  linear-gradient(
                         135deg,
                       #F8FAFF 0%,
                       #F3F5FF 50%,
                       #FAF7FF 100%
                    );
        }
        .services-header {
            text-align: center;

            margin-bottom: 50px;
        }

        .services-title {
            font-size: 36px;

            margin-bottom: 15px;
        }

        .services-subtitle {
            color: #6B7280;
        }

        .service-container {
            max-width: 1100px;

            margin: auto;

            display: grid;

            grid-template-columns: repeat(3, 1fr);

            gap: 25px;
        }

        .service-card {
            background: #FFFFFF;

            border: 1px solid #E5E7EB;

            padding: 35px;

            border-radius: 20px;

            transition: 0.3s;
        }

        .service-card:hover {
            transform: translateY(-5px);

            border-color: #315BFF;

            box-shadow:
                0 15px 35px rgba(49, 91, 255, 0.10);
        }

        .service-icon {
            width: 60px;
            height: 60px;

            margin-bottom: 22px;

            border-radius: 16px;

            background: linear-gradient(
                135deg,
                #315BFF,
                #8B5CF6
            );

            display: flex;
            align-items: center;
            justify-content: center;

            color: #FFFFFF;

            font-weight: bold;

            font-size: 18px;
        }

        .service-card h3 {
            margin-bottom: 12px;

            font-size: 21px;
        }

        .service-card p {
            color: #6B7280;

            line-height: 1.6;
        }


        /* =========================
           CTA
        ========================= */

        .cta-area {
    padding: 1px 0;
    background:
        linear-gradient(
            135deg,
            #F5F7FF 0%,
            #EEF2FF 50%,
            #F8F3FF 100%
        );
}

        .cta {
    margin: 80px 7%;

    padding: 80px 40px;

    border-radius: 30px;

    text-align: center;

    color: #FFFFFF;

    background:
        radial-gradient(
            circle at 20% 20%,
            rgba(255, 255, 255, 0.15),
            transparent 30%
        ),
        radial-gradient(
            circle at 80% 80%,
            rgba(255, 255, 255, 0.10),
            transparent 30%
        ),
        linear-gradient(
            135deg,
            #315BFF,
            #8B5CF6
        );

    box-shadow:
        0 20px 50px rgba(49, 91, 255, 0.18);
}
        .cta h2 {
            font-size: 38px;

            margin-bottom: 18px;
        }

        .cta p {
            margin-bottom: 30px;

            line-height: 1.6;
        }

        .cta-button {
            display: inline-block;

            text-decoration: none;

            background: #FFFFFF;

            color: #315BFF;

            padding: 14px 30px;

            border-radius: 30px;

            font-weight: bold;
        }

        .cta-button:hover {
            background: #E5E7EB;
        }


        /* =========================
           FOOTER
        ========================= */

        footer {
            padding: 30px 7%;

            background: #FFFFFF;

            border-top: 1px solid #E5E7EB;

            display: flex;

            justify-content: space-between;

            align-items: center;
        }

        .footer-logo {
            color: #315BFF;

            font-size: 22px;

            font-weight: bold;
        }

        footer p {
            color: #6B7280;

            font-size: 14px;
        }


        /* =========================
           RESPONSIVE
        ========================= */

        @media (max-width: 850px) {

            .nav-menu {
                gap: 15px;
            }

            .hero {
                flex-direction: column;

                text-align: center;
            }

            .hero-content h1 {
                font-size: 40px;
            }

            .hero-buttons {
                justify-content: center;
            }

            .hero-visual {
                width: 100%;

                max-width: 430px;
            }

            .service-container {
                grid-template-columns: 1fr;
            }

            footer {
                flex-direction: column;

                gap: 10px;

                text-align: center;
            }
        }
    </style>
</head>

<body>


    <!-- =========================
         NAVBAR
    ========================= -->

    <nav>
        
            <div class="logo">
    <img src="{{ asset('images/logo-bk.png') }}" alt="Logo BKConnect">
    <span>BKConnect</span>
</div>

            <a href="#beranda">
                Beranda
            </a>

            <a href="#tentang">
                Tentang
            </a>

            <a href="#layanan">
                Layanan
            </a>

            <a href="/login" class="login-btn">
                Login
            </a>

        </div>

    </nav>


    <!-- =========================
         HERO
    ========================= -->

    <section class="hero" id="beranda">

        <div class="hero-content">

            <div class="hero-label">
                BKCONNECT
            </div>

            <h1>
                Temukan ruang aman untuk
                <span>bercerita</span>
                dan mendapatkan bimbingan.
            </h1>

            <p>
                BKConnect merupakan sistem bimbingan dan konseling
                sekolah yang membantu siswa mendapatkan layanan
                konseling dengan mudah, aman, dan terorganisir.
            </p>

            <div class="hero-buttons">

                <a href="/register" class="primary-button">
                    Mulai Sekarang
                </a>

                <a href="#layanan" class="secondary-button">
                    Lihat Layanan
                </a>

            </div>

        </div>


        <div class="hero-visual">

            <div class="hero-visual-content">

    <img src="{{ asset('images/logo-bk.png') }}" alt="Logo BKConnect">

</div>
        </div>

    </section>


    <!-- =========================
         TENTANG
    ========================= -->

    <section class="about" id="tentang">

        <div class="section-label">
            TENTANG KAMI
        </div>

        <h2 class="section-title">
            Apa itu BKConnect?
        </h2>

        <p class="section-description">
            BKConnect adalah sistem informasi bimbingan dan konseling
            yang dirancang untuk membantu siswa dalam memperoleh
            layanan konseling serta membantu guru BK dalam mengelola
            proses bimbingan dan konseling secara lebih terorganisir.
        </p>

    </section>


    <!-- =========================
         LAYANAN
    ========================= -->

    <section class="services" id="layanan">

        <div class="services-header">

            <div class="section-label">
                LAYANAN
            </div>

            <h2 class="services-title">
                Layanan BKConnect
            </h2>

            <p class="services-subtitle">
                Fitur yang membantu proses bimbingan dan konseling.
            </p>

        </div>


        <div class="service-container">


            <div class="service-card">

                <div class="service-icon">
                    01
                </div>

                <h3>
                    Pengajuan Konseling
                </h3>

                <p>
                    Siswa dapat mengajukan konseling
                    sesuai dengan kebutuhan melalui sistem.
                </p>

            </div>


            <div class="service-card">

                <div class="service-icon">
                    02
                </div>

                <h3>
                    Jadwal Konseling
                </h3>

                <p>
                    Siswa dapat melihat dan memilih
                    jadwal konseling yang tersedia.
                </p>

            </div>


            <div class="service-card">

                <div class="service-icon">
                    03
                </div>

                <h3>
                    Catatan & Tindak Lanjut
                </h3>

                <p>
                    Guru BK dapat mengelola catatan
                    konseling dan tindak lanjut siswa.
                </p>

            </div>


        </div>

    </section>


    <!-- =========================
         CTA
    ========================= -->

    <section class="cta-area">

    <section class="cta">

        <h2>
            Siap menggunakan BKConnect?
        </h2>

        <p>
            Mulai gunakan layanan bimbingan dan konseling
            melalui BKConnect.
        </p>

        <a href="/register" class="cta-button">
            Daftar Sekarang
        </a>

    </section>

</section>

    <!-- =========================
         FOOTER
    ========================= -->

    <footer>

        <div class="footer-logo">
            BKConnect
        </div>

        <p>
            © 2026 BKConnect. Sistem BK & Konseling Sekolah.
        </p>

    </footer>


</body>
</html>