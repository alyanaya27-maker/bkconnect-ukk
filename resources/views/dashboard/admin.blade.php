<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - BKConnect</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f1f5ff;
            color: #1e293b;
        }

        .app-layout {
            display: flex;
            min-height: 100vh;
        }

        
.sidebar {
    width: 250px;
    min-width: 250px;
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
            justify-content: center;
            gap: 12px;
            margin: 0 0 55px;
            padding: 0 4px;
        }

       .brand img {
    width: 48px;
    height: 48px;
    object-fit: contain;
    flex-shrink: 0;
}

        .brand span {
    color: #315BFF;
    font-size: 20px;
    font-weight: 700;
}

        .menu-title {
    font-size: 11px;
    font-weight: 600;
    color: #9CA3AF;
    margin: 0 12px 10px;
    text-transform: uppercase;
}

        .sidebar a {
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 13px 12px;
    margin-bottom: 7px;
    border-radius: 9px;
    text-decoration: none;
    color: #5C6578;
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

        .menu-icon {
    width: 22px;
    text-align: center;
    font-size: 17px;
}

        .sidebar a.logout {
            color: #dc2626;
            margin-top: 18px;
        }

        .sidebar a.logout:hover {
            background: #fef2f2;
        }

        .main-area {
    flex: 1;
    min-width: 0;
    margin-left: 250px;
    transition: margin-left 0.3s ease;
}

        .header {
    height: auto;
    min-height: 76px;
    background: transparent;
    border-bottom: none;
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 0 30px;
    margin-top: 30px;
}

        .user-info {
    display: flex;
    align-items: center;
    gap: 10px;
    background: #FFFFFF;
    padding: 8px 14px;
    border: 1px solid #E5E7EB;
    border-radius: 12px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
}
        
.header-left {
    display: flex;
    align-items: center;
    gap: 18px;
}


.page-heading h3 {
    font-size: 22px;
    font-weight: 700;
    color: #263247;
    margin: 0 0 5px;
}

.page-heading p {
    font-size: 13px;
    color: #9299A8;
    margin: 0;
}


@media (max-width: 600px) {
    .header {
        padding: 0 18px;
        gap: 12px;
        flex-wrap: wrap;
    }

    .header-left {
        gap: 10px;
    }

    .page-heading h3 {
        font-size: 18px;
    }

    .header-right {
        gap: 10px;
    }
}

.menu-toggle {
    border: none;
    background: #FFFFFF;
    color: #315BFF;
    padding: 9px 12px;
    border-radius: 10px;
    font-size: 20px;
    cursor: pointer;
    box-shadow: 0 3px 12px rgba(0,0,0,.05);
}

.header-right {
    display: flex;
    align-items: center;
    gap: 18px;
}

.notification {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 42px;
    height: 42px;
    background: #FFFFFF;
    border: 1px solid #E5E7EB;
    border-radius: 10px;
    font-size: 18px;
    cursor: pointer;
}

        .user-icon {
            width: 38px;
            height: 38px;
            border-radius: 50%;
            background: #eef2ff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 19px;
        }

        .user-name {
            font-size: 14px;
            font-weight: bold;
            color: #334155;
        }

        .user-role {
            font-size: 12px;
            color: #64748b;
            margin-top: 4px;
        }

        .content {
    padding: 30px 35px;
}

        .welcome {
            margin-bottom: 28px;
        }

        .welcome h1 {
            font-size: 28px;
            margin: 0 0 10px;
            color: #1e293b;
        }

        .welcome p {
            color: #64748b;
            margin: 7px 0;
            line-height: 1.6;
        }

        .welcome-banner {
    padding: 30px;
    border-radius: 16px;
    background: linear-gradient(135deg, #315BFF, #8B5CF6);
    color: #FFFFFF;
    margin-bottom: 28px;
    box-shadow: 0 5px 15px rgba(49, 91, 255, 0.12);
}

        .welcome-banner h2 {
    margin: 0 0 12px;
    font-size: 23px;
    font-weight: 700;
}

        .welcome-banner p {
    margin: 0;
    line-height: 1.7;
    color: #FFFFFF;
}

        .section-title {
            font-size: 22px;
            margin: 0 0 20px;
        }

        .cards {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(190px, 1fr));
    gap: 20px;
}

        .card {
    background: #FFFFFF;
    padding: 24px;
    border-radius: 14px;
    border: 1px solid #E5E7EB;
    box-shadow: 0 4px 12px rgba(15, 23, 42, 0.04);
    transition: transform 0.2s ease, box-shadow 0.2s ease;
}

        .card:hover {
    transform: translateY(-3px);
    box-shadow: 0 7px 18px rgba(15, 23, 42, 0.08);
}

        .card p {
    color: #64748B;
    margin: 0 0 14px;
    font-size: 14px;
}

.card h2 {
    margin: 0;
    color: #315BFF;
    font-size: 25px;
    font-weight: 700;
}

        .info {
    background: #FFFFFF;
    margin-top: 26px;
    padding: 25px;
    border-radius: 14px;
    border: 1px solid #E5E7EB;
    box-shadow: 0 4px 12px rgba(15, 23, 42, 0.04);
}

.info h3 {
    margin-top: 0;
    margin-bottom: 16px;
    color: #315BFF;
    font-size: 18px;
}
        .info p {
    color: #5C6578;
    line-height: 1.7;
    font-size: 14px;
}

        @media (max-width: 800px) {
            .sidebar {
                width: 225px;
                min-width: 225px;
                padding: 22px 12px;
            }

            .brand {
                gap: 7px;
                margin-bottom: 38px;
            }

            .brand img {
                width: 48px;
                height: 48px;
            }

            .brand span {
                font-size: 19px;
            }

            .content {
                padding: 22px;
            }

            .header {
                padding: 0 20px;
            }
        }

        @media (max-width: 600px) {
            
.app-layout {
    display: flex;
    min-height: 100vh;
}


            .sidebar {
                width: 100%;
                min-width: 0;
                padding: 18px;
            }

            .brand {
    display: flex;
    align-items: center;
    gap: 10px;
    margin: 0 0 30px;
    padding: 5px 10px;
}

            .sidebar a {
                padding: 13px;
            }

            .header {
                height: 68px;
            }

            .content {
                padding: 18px;
            }

            .welcome h1 {
                font-size: 24px;
            }

            .welcome-banner {
                padding: 22px;
            }
        }


body.sidebar-closed .sidebar {
    transform: translateX(-100%);
}

body.sidebar-closed .main-area {
    margin-left: 0;
}

@media (max-width: 600px) {
    .main-area {
        margin-left: 0;
    }

    .sidebar {
        position: fixed;
        top: 0;
        left: 0;
        height: 100vh;
        width: 250px;
        min-width: 250px;
        z-index: 100;
        transition: transform 0.3s ease;
    }
}

    </style>
</head>

<body>

<div class="app-layout">

    <aside class="sidebar">

        <div class="brand">
            <img src="{{ asset('images/logo-bk.png') }}" alt="Logo BKConnect">
            <span>BKConnect</span>
        </div>

        <div class="menu-title">MENU UTAMA</div>

        <a href="{{ route('dashboard.admin') }}" class="active">
            <span class="menu-icon">🏠</span>
            <span>Dashboard</span>
        </a>

        <a href="/guru-bk">
            <span class="menu-icon">👨‍🏫</span>
            <span>Data Guru BK</span>
        </a>

        <a href="/wali-kelas">
            <span class="menu-icon">📚</span>
            <span>Data Wali Kelas</span>
        </a>

        <a href="{{ route('admin.users.index') }}">
            <span class="menu-icon">👥</span>
            <span>Pengelolaan Akun</span>
        </a>

        <a href="#pengaturan">
            <span class="menu-icon">⚙️</span>
            <span>Pengaturan</span>
        </a>

        <a href="{{ route('logout') }}"
           class="logout"
           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <span class="menu-icon">🚪</span>
            <span>Keluar</span>
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>

    </aside>

    <div class="main-area">

        
<header class="header">

    <div class="header-left">
        <button
            type="button"
            class="menu-toggle"
            id="menuToggle"
            aria-label="Buka atau tutup menu"
            aria-expanded="true"
            aria-controls="sidebar"
        >☰</button>

        <div class="page-heading">
            <h3>Dashboard Admin</h3>
            <p>Selamat datang kembali di BKConnect</p>
        </div>
    </div>

    <div class="header-right">
        <div class="notification">🔔</div>

        <div class="user-info">
            <div class="user-icon">👤</div>

            <div>
                <div class="user-name">
                    {{ Auth::user()->name }}
                </div>

                <div class="user-role">Admin</div>
            </div>
        </div>
    </div>

</header>


        <main class="content">

            <section class="welcome-banner">
                <h2>Selamat Datang di BKConnect 👋</h2>
                <p>
                    Halo, {{ Auth::user()->name }}!
                    Kelola dan pantau sistem BKConnect
                    melalui halaman administrasi ini.
                </p>
            </section>

            <h2 class="section-title">Informasi Sistem</h2>

            <div class="cards">

                <div class="card">
                    <p>Pengelolaan Pengguna</p>
                    <h2>Admin</h2>
                </div>

                <div class="card">
                    <p>Akses Sistem</p>
                    <h2>Aktif</h2>
                </div>

                <div class="card">
                    <p>Nama Aplikasi</p>
                    <h2>BKConnect</h2>
                </div>

            </div>

            <section class="info">
                <h3>Informasi Admin</h3>

                <p>
                    Admin bertugas mengelola akun Guru BK dan Wali Kelas
                    serta memantau data yang tersedia di sistem BKConnect.
                </p>

                <p>
                    Melalui menu Pengelolaan Akun, Admin dapat membuat akun,
                    mengubah informasi akun, dan menonaktifkan akun Guru BK
                    maupun Wali Kelas.
                </p>

                <p>
                    Admin juga dapat melihat data siswa, Guru BK, Wali Kelas,
                    dan informasi pengajuan konseling sesuai hak aksesnya.
                </p>
            </section>

        </main>

    </div>

</div>

@if(session('error'))
   <div class="bg-red-100 border-1-4 border-red-600 text-red-800 p-4 mb-4 rounded">
        <strong>Peringatan Validasi:</strong> {{
            session('error') }}
</div>
@endif

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