<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jadwal Konseling - BKConnect</title>

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

        /* SIDEBAR SISWA */
        .sidebar {
            width: 250px;
            height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            background: #FFFFFF;
            border-right: 1px solid #E5E7EB;
            padding: 25px 18px;
            z-index: 100;
            transition: 0.3s;
            overflow-y: auto;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 38px;
            padding-left: 5px;
        }

        .brand img {
            width: 48px;
            height: 48px;
            object-fit: contain;
        }

        .brand span {
            font-size: 20px;
            font-weight: 700;
            color: #315BFF;
        }

        .menu-title {
            font-size: 11px;
            font-weight: 700;
            color: #9CA3AF;
            margin: 0 10px 15px;
            letter-spacing: 0.5px;
        }

        .menu {
            display: flex;
            flex-direction: column;
            gap: 5px;
        }

        .menu a {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 13px 14px;
            margin-bottom: 6px;
            border-radius: 10px;
            text-decoration: none;
            color: #64748B;
            font-size: 14px;
            transition: 0.2s;
        }

        .menu a:hover {
            background: #EEF2FF;
            color: #315BFF;
        }

        .menu a.active {
            background: linear-gradient(135deg, #315BFF, #8B5CF6);
            color: #FFFFFF;
            box-shadow: 0 4px 10px rgba(49, 91, 255, 0.2);
        }

        .menu-icon {
            width: 22px;
            text-align: center;
        }

        .logout-form {
            margin-top: 15px;
        }

        .logout-button {
            width: 100%;
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 13px 14px;
            border: none;
            border-radius: 10px;
            background: #FFF0F0;
            color: #D63C3C;
            font-size: 14px;
            cursor: pointer;
            text-align: left;
        }

        /* MAIN */
        .main {
    margin-left: 250px;
    width: calc(100% - 250px);
    min-height: 100vh;
    padding: 28px 35px;
    transition: margin-left 0.3s ease, width 0.3s ease;
    min-width: 0;
}

body.sidebar-closed .main {
    margin-left: 0;
    width: 100%;
}

        body.sidebar-closed .sidebar,
body.sidebar-closed .siswa-sidebar,
body.sidebar-closed .guru-sidebar {
    transform: translateX(-100%);
}

        /* HEADER */
        .header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
            margin-bottom: 25px;
        }

        .header-left {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .menu-toggle {
            width: 42px;
            height: 42px;
            border: 1px solid #E5E7EB;
            background: #FFFFFF;
            color: #315BFF;
            border-radius: 10px;
            font-size: 20px;
            cursor: pointer;
        }

        .header-title h1 {
    font-size: 25px;
    font-weight: 700;
    color: #263247;
    margin-bottom: 6px;
}

.header-title p {
    font-size: 13px;
    color: #9299A8;
}

        .header-right {
            display: flex;
            align-items: center;
            gap: 15px;
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
            border-radius: 12px;
        }

        .profile-avatar {
            width: 34px;
            height: 34px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #EEF2FF;
            color: #315BFF;
            border-radius: 50%;
            font-size: 17px;
        }

        .profile-info strong {
            display: block;
            font-size: 13px;
            color: #172554;
        }

        .profile-info span {
            font-size: 11px;
            color: #64748B;
        }

        /* CONTENT */
        .content-card {
            background: #FFFFFF;
            border: 1px solid #E5E7EB;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.03);
        }

        .content-heading {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 15px;
            flex-wrap: wrap;
            margin-bottom: 25px;
        }

        .page-title {
            font-size: 22px;
            font-weight: 700;
            color: #172554;
            margin-bottom: 8px;
        }

        .page-description {
            font-size: 14px;
            color: #64748B;
            line-height: 1.6;
        }

        .btn-add {
            display: inline-block;
            text-decoration: none;
            color: #FFFFFF;
            background: linear-gradient(135deg, #315BFF, #8B5CF6);
            padding: 11px 18px;
            border-radius: 9px;
            font-size: 13px;
            font-weight: 600;
        }

        .table-title {
            font-size: 16px;
            font-weight: 700;
            color: #334155;
            margin-bottom: 17px;
        }

        .table-wrapper {
            width: 100%;
            overflow-x: auto;
            border-radius: 9px;
        }

        table {
            width: 100%;
            min-width: 800px;
            border-collapse: collapse;
        }

        th {
            background: linear-gradient(135deg, #315BFF, #8B5CF6);
            color: #FFFFFF;
            padding: 14px;
            text-align: left;
            font-size: 13px;
            white-space: nowrap;
        }

        td {
            padding: 14px;
            border-bottom: 1px solid #E5E7EB;
            font-size: 13px;
            color: #475569;
            vertical-align: middle;
        }

        tbody tr:hover td {
            background: #F8FAFF;
        }

        .status {
            display: inline-block;
            padding: 6px 11px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 700;
            white-space: nowrap;
        }

        .tersedia {
            background: #FEF3C7;
            color: #92400E;
        }

        .dipesan {
            background: #DCFCE7;
            color: #166534;
        }

        .selesai {
            background: #DBEAFE;
            color: #1E40AF;
        }

        .empty {
            text-align: center;
            color: #94A3B8;
            padding: 35px !important;
        }

        /* RESPONSIVE */
        @media (max-width: 900px) {
            .main {
                padding: 22px;
            }
        }

        @media (max-width: 650px) {
            .sidebar {
                width: 260px;
            }

            .main {
    margin-left: 0;
    width: 100%;
    padding: 20px 15px;
}

            .header {
                flex-direction: column;
                align-items: flex-start;
            }

            .header-right {
                width: 100%;
                justify-content: flex-end;
            }

            .header-title h1 {
                font-size: 22px;
            }

            .profile-info {
                display: none;
            }

            .content-card {
                padding: 22px 17px;
            }

            .page-title {
                font-size: 20px;
            }
        }
    </style>
</head>

<body>

    @if(auth()->user()->role === 'siswa')

        @include('layouts.siswa.sidebar')

    @else

        @include('layouts.guru_bk.sidebar')

    @endif

    <main class="main">

        <header class="header">

            <div class="header-left">

                <button
                    type="button"
                    class="menu-toggle"
                    id="menuToggle"
                    aria-label="Buka atau tutup menu"
                    aria-expanded="true"
                >☰</button>

                <div class="header-title">
                    <h1>Jadwal Konseling</h1>
                    <p>Lihat informasi jadwal konseling.</p>
                </div>

            </div>

            <div class="header-right">

                <div class="notification">🔔</div>

                <div class="profile">
                    <div class="profile-avatar">👤</div>

                    <div class="profile-info">
                        <strong>{{ auth()->user()->name }}</strong>
                        <span>
                            {{ auth()->user()->role === 'guru_bk' ? 'Guru BK' : 'Siswa' }}
                        </span>
                    </div>
                </div>

            </div>

        </header>

        <section class="content-card">

            <div class="content-heading">

                @if(auth()->user()->role === 'guru_bk')
                    <a href="{{ route('schedules.create') }}" class="btn-add">
                        + Tambah Jadwal
                    </a>
                @endif

            </div>

            <div class="table-title">
                Daftar Jadwal Konseling
            </div>

            <div class="table-wrapper">

                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Siswa</th>
                            <th>Tanggal</th>
                            <th>Jam Mulai</th>
                            <th>Jam Selesai</th>
                            <th>Keterangan</th>
                            <th>Status</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse($schedules as $schedule)

                            <tr>
                                <td>{{ $loop->iteration }}</td>

                                <td>
                                    {{ $schedule->student->nama ?? '-' }}
                                </td>

                                <td>
                                    {{ $schedule->tanggal }}
                                </td>

                                <td>
                                    {{ $schedule->jam_mulai }}
                                </td>

                                <td>
                                    {{ $schedule->jam_selesai }}
                                </td>

                                <td>
                                    {{ $schedule->keterangan ?? '-' }}
                                </td>

                                <td>
                                    <span class="status {{ $schedule->status }}">
                                        {{ ucfirst($schedule->status) }}
                                    </span>
                                </td>
                            </tr>

                        @empty

                            <tr>
                                <td colspan="7" class="empty">
                                    Belum ada data jadwal konseling.
                                </td>
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
            document.body.classList.toggle('sidebar-closed');

            const isExpanded =
                !document.body.classList.contains('sidebar-closed');

            menuToggle.setAttribute('aria-expanded', isExpanded);
        });
    </script>

</body>
</html>