<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengajuan Konseling - Admin BKConnect</title>

    <style>
        * {
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            margin: 0;
            background: #EEF5FF;
            color: #263247;
        }

        .main {
    margin-left: 250px;
    transition: margin-left 0.3s ease;
}

        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            margin-bottom: 28px;
        }

        .topbar h1 {
            margin: 0 0 5px;
            font-size: 25px;
        }

        .topbar p {
            margin: 0;
            color: #9299A8;
            font-size: 13px;
        }

        .profile, .card {
            background: #fff;
            border-radius: 15px;
            padding: 20px;
        }

        .card {
            padding: 30px;
            min-height: 400px;
        }

        .card h2 {
            margin: 0 0 20px;
            font-size: 17px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        .table-wrapper {
            width: 100%;
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
        }

        th, td {
            padding: 14px;
            border: 1px solid #E5E7EB;
            text-align: center;
            font-size: 13px;
        }

        th {
            background: linear-gradient(135deg, #315BFF, #8B5CF6);
            color: white;
        }

        .status {
            display: inline-block;
            padding: 6px 11px;
            border-radius: 20px;
            background: #EEF2FF;
            font-size: 12px;
            font-weight: bold;
        }

        @media (max-width: 700px) {
            .main { margin-left: 0; padding: 15px; }
            .card { padding: 18px; }
            table { min-width: 560px; }
        }

        .topbar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 20px;
    margin-bottom: 28px;
}

.topbar-left,
.topbar-right {
    display: flex;
    align-items: center;
    gap: 15px;
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
}

.page-heading h3 {
    margin: 0 0 6px;
    font-size: 25px;
    color: #263247;
}

.page-heading p {
    margin: 0;
    font-size: 13px;
    color: #9299A8;
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
}

.profile {
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 8px 14px;
    background: #FFFFFF;
    border: 1px solid #E5E7EB;
    border-radius: 12px;
}

.profile-icon {
    font-size: 17px;
}

.profile-info {
    display: flex;
    flex-direction: column;
    gap: 3px;
}

.profile-name {
    font-size: 13px;
    font-weight: 600;
}

.profile-info small {
    font-size: 11px;
    color: #9299A8;
}

.main {
    transition: margin-left .3s ease;
}

body.sidebar-closed .admin-sidebar,
body.sidebar-closed .sidebar {
    transform: translateX(-100%);
}

body.sidebar-closed .main {
    margin-left: 0;
}

@media (max-width: 700px) {
    .topbar {
        flex-wrap: wrap;
    }

    .topbar-right {
        margin-left: auto;
    }
}
.main {
    margin-left: 250px;
    transition: margin-left 0.3s ease;
}

body.sidebar-closed .sidebar,
body.sidebar-closed .guru-sidebar {
    transform: translateX(-100%);
}

body.sidebar-closed .main {
    margin-left: 0;
}
    </style>
</head>
<body>
    @include('layouts.admin.sidebar')

    <main class="main">
        <header class="topbar">
    <div class="topbar-left">
        <button type="button"
                class="menu-toggle"
                id="menuToggle"
                aria-label="Buka atau tutup menu"
                aria-expanded="true">
            ☰
        </button>

        <div class="page-heading">
            <h3>Pengajuan Konseling</h3>
            <p>Pantau jumlah dan status pengajuan konseling.</p>
        </div>
    </div>

    <div class="topbar-right">
        <div class="notification" title="Notifikasi">🔔</div>

        <div class="profile">
            <span class="profile-icon">👤</span>
            <div class="profile-info">
                <span class="profile-name">{{ auth()->user()->name }}</span>
                <small>Admin</small>
            </div>
        </div>
    </div>
</header>

        <section class="card">
            <h2>Daftar Pengajuan ({{ $requests->count() }})</h2>

            <div class="table-wrapper">
                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Siswa</th>
                            <th>Tanggal Pengajuan</th>
                            <th>Status</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($requests as $request)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $request->student->nama ?? '-' }}</td>
                                <td>{{ $request->created_at?->translatedFormat('d F Y') ?? '-' }}</td>
                                <td><span class="status">{{ ucfirst($request->status) }}</span></td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4">Belum ada pengajuan konseling.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </section>
    </main>
<script>
    document.getElementById('menuToggle')?.addEventListener('click', function () {
        document.body.classList.toggle('sidebar-closed');

        this.setAttribute(
            'aria-expanded',
            String(!document.body.classList.contains('sidebar-closed'))
        );
    });
</script>
</body>
</html>
