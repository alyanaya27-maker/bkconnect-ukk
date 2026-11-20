<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Siswa - BKConnect</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
    background: #F1F5FF;
    color: #263247;
    padding: 0;
    margin: 0;
}

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
}

.main-content {
    margin-left: 250px;
    padding: 35px;
    min-height: 100vh;
}

.container {
    max-width: 1100px;
    margin: auto;
}

        .header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    background: transparent;
    padding: 0;
    border-radius: 0;
    margin-bottom: 30px;
    box-shadow: none;
}

.header-left {
    display: flex;
    align-items: center;
    gap: 18px;
}

.header-left h1 {
    font-size: 25px;
    font-weight: 700;
    color: #263247;
    margin-bottom: 6px;
}

.header-left p {
    font-size: 13px;
    color: #9299A8;
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
    width: 38px;
    height: 38px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: #FFFFFF;
    border-radius: 10px;
    box-shadow: 0 3px 12px rgba(0,0,0,.05);
}

.profile {
    display: flex;
    align-items: center;
    gap: 10px;
    background: #FFFFFF;
    padding: 8px 14px;
    border-radius: 12px;
    box-shadow: 0 3px 12px rgba(0,0,0,.05);
}

.profile-avatar {
    width: 38px;
    height: 38px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: #EEF3FF;
    border-radius: 50%;
}

.profile-name {
    font-size: 13px;
    font-weight: 700;
    color: #263247;
}

.profile-role {
    font-size: 12px;
    color: #9299A8;
}

        .info {
            display: flex;
            gap: 20px;
            flex-wrap: wrap;
            margin-bottom: 25px;
        }

        .info-card {
            background: white;
            padding: 20px;
            border-radius: 12px;
            flex: 1;
            min-width: 200px;
            box-shadow: 0 3px 12px rgba(0,0,0,.05);
        }

        .info-card small {
            color: #777;
        }

        .info-card h3 {
            margin-top: 8px;
            color: #315BFF;
        }

        .table-card {
            background: white;
            padding: 25px;
            border-radius: 14px;
            box-shadow: 0 3px 12px rgba(0,0,0,.05);
            overflow-x: auto;
        }

        .table-card h2 {
            font-size: 19px;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 650px;
        }

        th, td {
            padding: 14px;
            text-align: left;
            border-bottom: 1px solid #E5E7EB;
            font-size: 14px;
        }

        th {
    background: #EEF3FF;
    color: #315BFF;
    font-weight: 700;
    padding: 15px;
}

td {
    color: #5C6578;
    background: #FFFFFF;
}

tbody tr:hover td {
    background: #F8FAFF;
}

        .empty {
            text-align: center;
            color: #777;
            padding: 30px;
        }

        .back {
            display: inline-block;
            margin-bottom: 20px;
            color: #315BFF;
            text-decoration: none;
            font-weight: bold;
        }

        .sidebar .brand {
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 5px 10px 30px;
}

.sidebar .brand img {
    width: 48px;
    height: 48px;
    object-fit: contain;
    flex-shrink: 0;
}

.sidebar .brand-text {
    font-size: 20px;
    font-weight: 700;
    color: #315BFF;
}

.sidebar .menu-title {
    font-size: 11px;
    font-weight: 600;
    color: #9CA3AF;
    padding: 0 12px;
    margin-bottom: 10px;
    text-transform: uppercase;
}

.sidebar nav a {
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

.sidebar nav a:hover {
    background: #EEF3FF;
    color: #315BFF;
}

.sidebar nav a.active {
    background: linear-gradient(135deg, #315BFF, #8B5CF6);
    color: #FFFFFF;
}

.sidebar nav form {
    margin-top: 25px;
}

.sidebar nav form button {
    display: flex;
    align-items: center;
    gap: 10px;
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

body.sidebar-closed .sidebar {
    transform: translateX(-100%);
}

body.sidebar-closed .main-content {
    margin-left: 0;
}

@media (max-width: 700px) {
    .sidebar {
        width: 260px;
    }

    .main-content {
        margin-left: 0;
        padding: 20px 15px;
    }
}

        @media(max-width: 600px) {
            body {
                padding: 15px;
            }

            .header, .table-card {
                padding: 18px;
            }
        }
    </style>
</head>

<body>

<!-- SIDEBAR -->
<aside class="sidebar" id="sidebar">

    <div class="brand">
        <img src="{{ asset('images/logo-bk.png') }}" alt="Logo BKConnect">
        <div class="brand-text">BKConnect</div>
    </div>

    <div class="menu-title">MENU UTAMA</div>

    <nav class="menu">
        <a href="{{ route('dashboard.wali_kelas') }}">
            <span class="menu-icon">🏠</span>
            <span>Dashboard</span>
        </a>

        <a href="{{ route('wali-kelas.data-siswa') }}" class="active">
            <span class="menu-icon">👨‍🎓</span>
            <span>Data Siswa</span>
        </a>

        <a href="{{ route('dashboard.wali_kelas') }}#informasi-akun">
            <span class="menu-icon">👤</span>
            <span>Informasi Akun</span>
        </a>

        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit">
                <span class="menu-icon">🚪</span>
                <span>Keluar</span>
            </button>
        </form>
    </nav>

</aside>

<div class="main-content">
    <div class="container">

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
            <h1>Data Siswa</h1>
            <p>Daftar siswa yang menjadi tanggung jawab Wali Kelas</p>
        </div>

    </div>

    <div class="header-right">

        <div class="notification">🔔</div>

        <div class="profile">
            <div class="profile-avatar">👤</div>

            <div>
                <div class="profile-name">{{ auth()->user()->name }}</div>
                <div class="profile-role">Wali Kelas</div>
            </div>
        </div>

    </div>

</header>

    <div class="info">
        <div class="info-card">
            <small>Nama Wali Kelas</small>
            <h3>{{ $waliKelas->nama }}</h3>
        </div>

        <div class="info-card">
            <small>Kelas yang Diampu</small>
            <h3>{{ $waliKelas->kelas }}</h3>
        </div>

        <div class="info-card">
            <small>Jumlah Siswa</small>
            <h3>{{ $students->count() }} Siswa</h3>
        </div>
    </div>

    <div class="table-card">
        <h2>Daftar Siswa Kelas {{ $waliKelas->kelas }}</h2>

        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>NIS</th>
                    <th>Nama Siswa</th>
                    <th>Kelas</th>
                    <th>Jurusan</th>
                </tr>
            </thead>

            <tbody>
                @forelse($students as $index => $student)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $student->nis }}</td>
                        <td>
    <a href="{{ route('wali-kelas.detail-siswa', $student->id) }}"
       style="color: #315BFF; text-decoration: none; font-weight: bold;">
        {{ $student->nama }}
    </a>
</td>
                        <td>{{ $student->kelas }}</td>
                        <td>{{ $student->jurusan }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="empty">
                            Belum ada data siswa untuk kelas ini.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
<script>
    const menuToggle = document.getElementById('menuToggle');

    menuToggle.addEventListener('click', function () {
        document.body.classList.toggle('sidebar-closed');

        const isExpanded =
            !document.body.classList.contains('sidebar-closed');

        menuToggle.setAttribute('aria-expanded', isExpanded);
    });
</script>
</body>
</html>
