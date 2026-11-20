<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard Siswa - BKConnect</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background: #F5F7FB;
            color: #172554;
        }

        /* SIDEBAR */
        .sidebar {
            position: fixed;
            left: 0;
            top: 0;
            width: 250px;
            height: 100vh;
            background: #FFFFFF;
            border-right: 1px solid #E5E7EB;
            padding: 25px 18px;
            overflow-y: auto;
            z-index: 100;
            transition: transform 0.3s ease;
        }

        .brand {
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 5px 10px 30px;
}

        .brand img {
            width: 48px;
            height: 48px;
            object-fit: contain;
        }

        .brand-text {
            font-size: 20px;
            font-weight: 700;
            color: #315BFF;
        }

        .menu-title {
    font-size: 11px;
    font-weight: 600;
    color: #9CA3AF;
    padding: 0 12px;
    margin-bottom: 10px;
    text-transform: uppercase;
}

        .menu a {
            display: flex;
            align-items: center;
            gap: 12px;
            text-decoration: none;
            color: #64748B;
            padding: 13px 14px;
            margin-bottom: 6px;
            border-radius: 10px;
            font-size: 14px;
            transition: 0.2s;
        }

        .menu a:hover {
            background: #EEF2FF;
            color: #315BFF;
        }

        .menu a.active {
            background: linear-gradient(90deg, #315BFF, #8B5CF6);
            color: #FFFFFF;
            box-shadow: 0 7px 18px rgba(49, 91, 255, 0.20);
        }

        .menu-icon {
            width: 22px;
            text-align: center;
        }

        .logout {
            margin-top: 15px;
        }

        .logout button {
            display: flex;
            align-items: center;
            gap: 12px;
            width: 100%;
            padding: 13px 14px;
            border: none;
            border-radius: 10px;
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
            min-height: 100vh;
            padding: 28px 35px;
            transition: margin-left 0.3s ease;
            min-width: 0;
        }

        /* SIDEBAR DITUTUP */
        body.sidebar-closed .sidebar {
            transform: translateX(-100%);
        }

        body.sidebar-closed .main {
            margin-left: 0;
        }

        /* HEADER */
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
            margin-bottom: 25px;
        }

        .header-left {
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
            background: #EEF2FF;
        }

        .header-left h1 {
            font-size: 26px;
            margin-bottom: 5px;
            color: #172554;
        }

        .header-left p {
            font-size: 14px;
            color: #64748B;
        }

        .header-right {
            display: flex;
            align-items: center;
            gap: 18px;
        }

        .notification {
            width: 42px;
            height: 42px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #FFFFFF;
            border: 1px solid #E5E7EB;
            border-radius: 10px;
            font-size: 18px;
        }

        .profile {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 7px 12px;
            background: #FFFFFF;
            border: 1px solid #E5E7EB;
            border-radius: 10px;
        }

        .profile-avatar {
            width: 34px;
            height: 34px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            background: #EEF2FF;
            color: #315BFF;
            flex-shrink: 0;
        }

        .profile-name {
            font-size: 13px;
            font-weight: 600;
            color: #334155;
        }

        .profile-role {
            font-size: 11px;
            color: #94A3B8;
            margin-top: 2px;
        }

        /* WELCOME */
        .welcome {
            position: relative;
            overflow: hidden;
            padding: 28px 30px;
            margin-bottom: 25px;
            border-radius: 18px;
            background: linear-gradient(135deg, #315BFF, #8B5CF6);
            color: #FFFFFF;
            box-shadow: 0 12px 30px rgba(49, 91, 255, 0.20);
        }

        .welcome::after {
            content: "";
            position: absolute;
            width: 180px;
            height: 180px;
            border: 2px solid rgba(255,255,255,0.15);
            border-radius: 50%;
            right: -60px;
            top: -80px;
        }

        .welcome h2 {
            position: relative;
            z-index: 1;
            font-size: 21px;
            margin-bottom: 8px;
        }

        .welcome p {
            position: relative;
            z-index: 1;
            font-size: 13px;
            opacity: 0.9;
            max-width: 550px;
            line-height: 1.6;
        }

        /* SECTION */
        .section-title {
            font-size: 17px;
            margin-bottom: 15px;
            color: #172554;
        }

        /* CARDS */
        .cards {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 18px;
            margin-bottom: 25px;
        }

        .card {
            background: #FFFFFF;
            padding: 22px;
            border-radius: 15px;
            border: 1px solid #E5E7EB;
            min-width: 0;
            transition: 0.2s;
        }

        .card:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(15, 23, 42, 0.08);
        }

        .card-icon {
            width: 45px;
            height: 45px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 15px;
            border-radius: 12px;
            background: #EEF2FF;
            font-size: 20px;
        }

        .card h3 {
            font-size: 15px;
            color: #172554;
            margin-bottom: 8px;
        }

        .card p {
            font-size: 13px;
            line-height: 1.6;
            color: #64748B;
        }

        /* ACCOUNT */
        .account {
            background: #FFFFFF;
            padding: 22px;
            border-radius: 15px;
            border: 1px solid #E5E7EB;
        }

        .account h2 {
            font-size: 17px;
            margin-bottom: 18px;
        }

        .account-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 15px;
        }

        .account-item {
            padding: 15px;
            background: #F8FAFC;
            border-radius: 10px;
            min-width: 0;
        }

        .account-label {
            display: block;
            font-size: 11px;
            color: #94A3B8;
            margin-bottom: 6px;
        }

        .account-value {
            font-size: 14px;
            color: #334155;
            font-weight: 600;
            overflow-wrap: anywhere;
        }

        /* TABLET */
        @media (max-width: 900px) {
            .main {
                padding: 22px;
            }

            .cards {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            .account-grid {
                grid-template-columns: 1fr;
            }
        }

        /* MOBILE */
        @media (max-width: 650px) {
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

            .main {
                margin-left: 0;
                padding: 20px 15px;
            }

            .header {
                align-items: flex-start;
                flex-direction: column;
                gap: 15px;
            }

            .header-left {
                width: 100%;
            }

            .header-right {
                width: 100%;
                justify-content: space-between;
                gap: 8px;
            }

            .profile-name,
            .profile-role {
                display: none;
            }

            .header-left h1 {
                font-size: 22px;
            }

            .welcome {
                padding: 23px;
            }

            .welcome h2 {
                font-size: 19px;
            }

            .cards {
                grid-template-columns: 1fr;
            }

            .account-grid {
                grid-template-columns: 1fr;
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

    <!-- SIDEBAR -->
    <aside class="sidebar" id="sidebar">

        <div class="brand">
            <img src="{{ asset('images/logo-bk.png') }}" alt="Logo BK Connect">
            <div class="brand-text">BKConnect</div>
        </div>

        <div class="menu-title">Menu Utama</div>

        <nav class="menu">

            <a href="/dashboard/siswa" class="active">
                <span class="menu-icon">🏠</span>
                <span>Dashboard</span>
            </a>

            <a href="{{ url('/pengajuan-konseling/create') }}">
                <span class="menu-icon">💬</span>
                <span>Pengajuan Konseling</span>
            </a>

            <a href="{{ url('/jadwal-konseling') }}">
                <span class="menu-icon">📅</span>
                <span>Jadwal Konseling</span>
            </a>

            <a href="{{ url('/riwayat-konseling') }}">
                <span class="menu-icon">📋</span>
                <span>Riwayat Konseling</span>
            </a>

            <a href="{{ route('profile.index') }}">
                <span class="menu-icon">👤</span>
                <span>Profil</span>
            </a>

        </nav>

        <div class="logout">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit">
                    <span class="menu-icon">🚪</span>
                    <span>Keluar</span>
                </button>
            </form>
        </div>

    </aside>

    <!-- MAIN -->
    <main class="main">

        <!-- HEADER -->
        <header class="header">

            <div class="header-left">

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

                <div>
                    <h1>Dashboard Siswa</h1>
                    <p>Selamat datang kembali di BKConnect</p>
                </div>

            </div>

            <div class="header-right">

                <div class="notification">🔔</div>

                <div class="profile">

                    <div class="profile-avatar">👤</div>

                    <div>
                        <div class="profile-name">
                            {{ $user->name }}
                        </div>

                        <div class="profile-role">
                            Siswa
                        </div>
                    </div>

                </div>

            </div>

        </header>

        <!-- WELCOME -->
        <section class="welcome">

            <h2>Selamat Datang di BKConnect 👋</h2>

            <p>
                Temukan ruang aman untuk bercerita,
                berkonsultasi, dan mendapatkan bimbingan
                dari Guru BK.
            </p>

        </section>

        <!-- FITUR UTAMA -->
        <h2 class="section-title">Layanan BK</h2>

        <section class="cards">

            <div class="card">
                <div class="card-icon">💬</div>
                <h3>Pengajuan Konseling</h3>
                <p>
                    Ajukan permintaan konseling kepada
                    Guru BK sesuai kebutuhanmu.
                </p>
            </div>

            <div class="card">
                <div class="card-icon">📅</div>
                <h3>Jadwal</h3>
                <p>
                    Lihat jadwal konseling yang telah
                    ditentukan oleh Guru BK.
                </p>
            </div>

            <div class="card">
                <div class="card-icon">📋</div>
                <h3>Riwayat Konseling</h3>
                <p>
                    Lihat riwayat konseling dan perkembangan
                    bimbingan yang telah dilakukan.
                </p>
            </div>

        </section>

        <!-- INFORMASI AKUN -->
        <section class="account">

            <h2>Informasi Akun</h2>

            <div class="account-grid">

                <div class="account-item">
                    <span class="account-label">Nama</span>
                    <span class="account-value">
                        {{ $user->name }}
                    </span>
                </div>

                <div class="account-item">
                    <span class="account-label">Email</span>
                    <span class="account-value">
                        {{ $user->email }}
                    </span>
                </div>

                <div class="account-item">
                    <span class="account-label">Role</span>
                    <span class="account-value">
                        {{ ucfirst($user->role) }}
                    </span>
                </div>

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