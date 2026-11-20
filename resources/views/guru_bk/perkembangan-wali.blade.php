<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perkembangan Wali Kelas - BKConnect</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            min-height: 100vh;
            background: #EEF5FF;
            color: #263238;
        }

        .main {
            min-width: 0;
            margin-left: 250px;
            padding: 28px;
            transition: margin-left 0.3s ease;
        }

        body.sidebar-closed .guru-sidebar {
            transform: translateX(-100%);
        }

        body.sidebar-closed .main {
            margin-left: 0;
        }

        .topbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 15px;
            min-height: 75px;
            margin-bottom: 25px;
        }

        .topbar-left,
        .topbar-right,
        .profile {
            display: flex;
            align-items: center;
        }

        .topbar-left {
            min-width: 0;
            gap: 15px;
        }

        .topbar-right {
            gap: 14px;
        }

        .menu-toggle,
        .notification {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 42px;
            height: 42px;
            flex-shrink: 0;
            border: 1px solid #E5E7EB;
            border-radius: 10px;
            background: #FFFFFF;
            color: #315BFF;
            font-size: 20px;
        }

        .menu-toggle {
            cursor: pointer;
        }

        .menu-toggle:hover {
            background: #EEF3FF;
        }

        .page-heading h1 {
            margin-bottom: 6px;
            color: #263247;
            font-size: 25px;
        }

        .page-heading p {
            color: #9299A8;
            font-size: 13px;
        }

        .profile {
            min-width: 0;
            gap: 10px;
            padding: 8px 12px;
            border: 1px solid #E5E7EB;
            border-radius: 16px;
            background: #FFFFFF;
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
            min-width: 0;
        }

        .profile-name {
            display: block;
            overflow-wrap: anywhere;
            color: #374151;
            font-size: 13px;
            font-weight: 600;
        }

        .profile-info small {
            color: #64748B;
            font-size: 11px;
        }

        .content-card {
            padding: 28px;
            border-radius: 15px;
            background: #FFFFFF;
            box-shadow: 0 5px 18px rgba(0, 0, 0, 0.06);
        }

        .content-heading {
            margin-bottom: 24px;
        }

        .content-heading h2 {
            margin-bottom: 8px;
            color: #263247;
            font-size: 22px;
        }

        .content-heading p {
            color: #78909C;
            font-size: 14px;
            line-height: 1.6;
        }

        .table-wrapper {
            width: 100%;
            overflow-x: auto;
            padding-bottom: 10px;
        }

        .table-wrapper::-webkit-scrollbar {
            height: 10px;
        }

        .table-wrapper::-webkit-scrollbar-track {
            border-radius: 10px;
            background: #E5E7EB;
        }

        .table-wrapper::-webkit-scrollbar-thumb {
            border-radius: 10px;
            background: #315BFF;
        }

        table {
            width: 100%;
            min-width: 900px;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 13px 11px;
            border: 1px solid #E5E7EB;
            color: #455A64;
            font-size: 12px;
            text-align: center;
            vertical-align: top;
        }

        th {
            border-color: #D9E1F2;
            background: linear-gradient(135deg, #315BFF, #8B5CF6);
            color: #FFFFFF;
            font-size: 12px;
            white-space: nowrap;
        }

        td.report-text {
            min-width: 220px;
            text-align: left;
            line-height: 1.5;
        }

        tbody tr:hover {
            background: #F8FAFF;
        }

        .empty-state {
            padding: 28px;
            color: #78909C;
            text-align: center;
        }

        @media (max-width: 700px) {
            .main {
                margin-left: 0;
                padding: 16px;
            }

            .guru-sidebar {
                transform: translateX(-100%);
            }

            body.sidebar-open .guru-sidebar {
                transform: translateX(0);
            }

            .topbar {
                align-items: flex-start;
            }

            .topbar-right .notification,
            .profile-info {
                display: none;
            }

            .profile {
                padding: 4px;
            }

            .content-card {
                padding: 20px;
            }
        }
    </style>
</head>
<body>
    @include('layouts.guru_bk.sidebar')

    <main class="main">
        <header class="topbar">
            <div class="topbar-left">
                <button class="menu-toggle" id="menuToggle" type="button" aria-label="Buka atau tutup menu" aria-expanded="true">&#9776;</button>
                <div class="page-heading">
                    <h1>Perkembangan Wali Kelas</h1>
                    <p>Kelola laporan perkembangan siswa dari wali kelas.</p>
                </div>
            </div>

            <div class="topbar-right">
                <div class="notification" title="Notifikasi">&#128276;</div>
                <div class="profile">
                    <span class="profile-icon">&#128100;</span>
                    <div class="profile-info">
                        <span class="profile-name">{{ auth()->user()->name }}</span>
                        <small>Guru BK</small>
                    </div>
                </div>
            </div>
        </header>

        <section class="content-card">
            <div class="content-heading">
                <h2>Laporan Perkembangan Siswa</h2>
                <p>Laporan dari wali kelas yang berada di bawah koordinasi Anda.</p>
            </div>

            <div class="table-wrapper">
                <table>
                    <thead>
                        <tr>
                            <th>Siswa</th>
                            <th>Kelas</th>
                            <th>Wali Kelas</th>
                            <th>Perkembangan</th>
                            <th>Catatan</th>
                            <th>Waktu</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($reports as $report)
                            <tr>
                                <td>{{ $report->student->nama }}</td>
                                <td>{{ $report->student->kelas }}</td>
                                <td>{{ $report->waliKelas->nama }}</td>
                                <td class="report-text">{{ $report->perkembangan }}</td>
                                <td class="report-text">{{ $report->catatan ?: '-' }}</td>
                                <td>{{ $report->created_at->format('d/m/Y H:i') }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td class="empty-state" colspan="6">Belum ada laporan dari wali kelas.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </section>
    </main>

    <script>
        const menuToggle = document.getElementById('menuToggle');

        menuToggle.addEventListener('click', function () {
            if (window.innerWidth <= 700) {
                document.body.classList.toggle('sidebar-open');
                menuToggle.setAttribute('aria-expanded', document.body.classList.contains('sidebar-open'));

                return;
            }

            document.body.classList.toggle('sidebar-closed');
            menuToggle.setAttribute('aria-expanded', !document.body.classList.contains('sidebar-closed'));
        });
    </script>
</body>
</html>
