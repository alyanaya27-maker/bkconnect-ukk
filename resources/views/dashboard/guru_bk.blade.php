<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Guru BK - BKConnect</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background: #F5F7FB;
            color: #263247;
            min-height: 100vh;
        }

        /* SIDEBAR */
        .sidebar {
            width: 250px;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            background: #FFFFFF;
            padding: 25px 18px;
            border-right: 1px solid #E5E7EB;
            overflow-y: auto;
            z-index: 100;
            transition: transform 0.3s ease;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 10px;
            color: #315BFF;
            font-size: 22px;
            font-weight: bold;
            margin-bottom: 35px;
        }

        .brand img {
            width: 36px;
            height: 36px;
            object-fit: contain;
        }

        .menu-title {
            font-size: 12px;
            color: #9299A8;
            margin: 20px 10px 12px;
            font-weight: bold;
        }

        .sidebar a {
            display: flex;
            align-items: center;
            gap: 10px;
            text-decoration: none;
            color: #5C6578;
            padding: 13px 12px;
            margin-bottom: 7px;
            border-radius: 9px;
            font-size: 14px;
            transition: 0.2s;
        }

        .sidebar a:hover {
            background: #EEF3FF;
            color: #315BFF;
        }

        .sidebar a.active {
            background: linear-gradient(135deg, #315BFF, #8B5CF6);
            color: #FFFFFF;
        }

        .logout {
            margin-top: 25px;
        }

        .logout button {
            width: 100%;
            padding: 12px;
            border: 0;
            border-radius: 9px;
            background: #FFF0F0;
            color: #D63C3C;
            cursor: pointer;
            font-size: 14px;
            text-align: left;
        }

        .logout button:hover {
            background: #FEE2E2;
        }

        /* MAIN */
        .main {
            margin-left: 250px;
            padding: 28px;
            min-width: 0;
            transition: margin-left 0.3s ease;
        }

        /* SAAT SIDEBAR DITUTUP */
        body.sidebar-closed .guru-sidebar {
    transform: translateX(-100%);
        }

        body.sidebar-closed .main {
            margin-left: 0;
        }

        /* TOPBAR */
        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
            margin-bottom: 28px;
        }

        .topbar-left {
            display: flex;
            align-items: center;
            gap: 15px;
            min-width: 0;
        }

        .menu-toggle {
            width: 42px;
            height: 42px;
            flex-shrink: 0;
            border: 1px solid #E5E7EB;
            border-radius: 10px;
            background: #FFFFFF;
            color: #315BFF;
            font-size: 22px;
            cursor: pointer;
            transition: 0.2s;
        }

        .menu-toggle:hover {
            background: #EEF3FF;
        }

        .page-heading h3 {
            font-size: 25px;
            color: #263247;
            margin-bottom: 6px;
        }

        .page-heading p {
            font-size: 13px;
            color: #9299A8;
        }

        /* TOPBAR RIGHT */
.topbar-right {
    display: flex;
    align-items: center;
    gap: 14px;
}

.notification {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 42px;
    height: 42px;
    background: #FFFFFF;
    border: 1px solid #E5E7EB;
    border-radius: 12px;
    cursor: pointer;
    font-size: 16px;
}

.profile {
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 8px 12px;
    background: #FFFFFF;
    border: 1px solid #E5E7EB;
    border-radius: 16px;
    min-width: 0;
}

.profile-icon {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 36px;
    height: 36px;
    flex-shrink: 0;
    border-radius: 50%;
    background: #EEF2FF;
}

.profile-info {
    display: flex;
    flex-direction: column;
    gap: 3px;
    min-width: 0;
}

.profile-name {
    font-size: 13px;
    font-weight: 600;
    color: #374151;
    overflow-wrap: anywhere;
}

.profile-info small {
    font-size: 11px;
    color: #64748B;
}

        /* WELCOME */
        .welcome {
            background: linear-gradient(120deg, #315BFF, #8B5CF6);
            color: #FFFFFF;
            padding: 30px;
            border-radius: 16px;
            margin-bottom: 28px;
        }

        .welcome h1 {
            font-size: 25px;
            margin-bottom: 12px;
            line-height: 1.4;
        }

        .welcome p {
            line-height: 1.7;
            font-size: 14px;
        }

        /* CARDS */
        .section-title {
            margin-bottom: 18px;
            font-size: 20px;
        }

        .cards {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 18px;
        }

        .card {
            background: #FFFFFF;
            padding: 23px;
            border-radius: 13px;
            border: 1px solid #E5E7EB;
            min-width: 0;
            transition: 0.2s;
        }

        .card:hover {
            box-shadow: 0 5px 18px rgba(49, 91, 255, 0.07);
            transform: translateY(-2px);
        }

        .card .icon {
            font-size: 26px;
            margin-bottom: 15px;
        }

        .card h3 {
            font-size: 16px;
            margin-bottom: 10px;
            line-height: 1.4;
        }

        .card p {
            color: #7B8496;
            font-size: 13px;
            line-height: 1.6;
        }

        /* TABLET */
        @media (max-width: 1100px) {
            .cards {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            .main {
                padding: 22px;
            }
        }

        /* MOBILE */
        @media (max-width: 700px) {
            .sidebar {
                width: 260px;
                height: 100vh;
                position: fixed;
                top: 0;
                left: 0;
                padding: 20px 16px;
                overflow-y: auto;
                box-shadow: 5px 0 20px rgba(0, 0, 0, 0.08);
            }

            .sidebar a {
                display: flex;
                width: 100%;
                font-size: 13px;
            }

            .main {
                margin-left: 0;
                padding: 20px 15px;
            }

            .topbar {
                align-items: flex-start;
                flex-direction: column;
                gap: 15px;
            }

            .topbar-left {
                width: 100%;
            }

            .topbar-right {
                width: 100%;
                justify-content: space-between;
            }

            .page-heading h3 {
                font-size: 22px;
            }

            .welcome {
                padding: 23px;
            }

            .welcome h1 {
                font-size: 21px;
            }

            .cards {
                grid-template-columns: 1fr;
                gap: 13px;
            }

            .card {
                padding: 20px;
            }
        }

        @media (max-width: 380px) {
            .main {
                padding: 16px 12px;
            }

            .welcome {
                padding: 19px;
            }
        }
    </style>
</head>

<body>

@include('layouts.guru_bk.sidebar')

<main class="main">

    <header class="topbar">

    <div class="topbar-left">

        <button
            type="button"
            class="menu-toggle"
            id="menuToggle"
            aria-label="Buka atau tutup menu"
            aria-expanded="true"
            aria-controls="sidebar"
        >
            ☰
        </button>

        <div class="page-heading">
            <h3>Dashboard Guru BK</h3>
            <p>Selamat datang kembali di BKConnect</p>
        </div>

    </div>

    <div class="topbar-right">

        <div class="notification" title="Notifikasi">🔔</div>

        <div class="profile">

            <span class="profile-icon">👤</span>

            <div class="profile-info">
                <span class="profile-name">
                    {{ auth()->user()->name }}
                </span>
                <small>Guru BK</small>
            </div>

        </div>

    </div>

</header>

    <section class="welcome">
        <h1>Selamat Datang, {{ auth()->user()->name }}! 👋</h1>
        <p>
            Selamat datang di BKConnect, sistem informasi Bimbingan
            dan Konseling. Kelola data siswa, jadwal, dan layanan
            konseling melalui menu yang tersedia.
        </p>
    </section>

    
<h2 class="section-title">Menu Pengelolaan</h2>

<section class="cards">

    <div class="card">
        <div class="icon">💬</div>
        <h3>Pengajuan Konseling</h3>
        <p>Periksa pengajuan konseling dari siswa.</p>
    </div>

    <div class="card">
        <div class="icon">📅</div>
        <h3>Jadwal Konseling</h3>
        <p>Lihat dan kelola jadwal layanan konseling.</p>
    </div>

    <div class="card">
        <div class="icon">📋</div>
        <h3>Riwayat Konseling</h3>
        <p>Lihat riwayat pengajuan dan layanan konseling siswa.</p>
    </div>

    <div class="card">
        <div class="icon">📨</div>
        <h3>Perkembangan dari Wali Kelas</h3>
        <p>Terima laporan perkembangan siswa dari wali kelas yang Anda dampingi.</p>
    </div>

</section>

</main>

<script>
    const menuToggle = document.getElementById('menuToggle');

    menuToggle.addEventListener('click', function () {
        document.body.classList.toggle('sidebar-closed');

        const isExpanded = !document.body.classList.contains('sidebar-closed');
        menuToggle.setAttribute('aria-expanded', isExpanded);
    });
</script>

</body>
</html>
