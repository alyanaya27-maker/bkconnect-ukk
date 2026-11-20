<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Konseling - BKConnect</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        body {
    background: #F5F7FB;
    color: #172554;
    min-height: 100vh;
}

        
.topbar {
    min-height: 75px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 15px;
    margin-bottom: 25px;
}

.topbar-left {
    display: flex;
    align-items: center;
    gap: 15px;
}

.menu-toggle {
    width: 42px;
    height: 42px;
    border: none;
    border-radius: 9px;
    background: #FFFFFF;
    color: #315BFF;
    font-size: 22px;
    cursor: pointer;
    box-shadow: 0 3px 12px rgba(0,0,0,0.06);
}

.page-heading h3 {
    font-size: 25px;
    font-weight: 700;
    color: #263247;
    margin-bottom: 6px;
}

.page-heading p {
    font-size: 13px;
    color: #9299A8;
}

.topbar-right {
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
    border: 1px solid #E5E7EB;
    border-radius: 10px;
    background: #FFFFFF;
    font-size: 17px;
}

.profile {
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 7px 12px;
    background: #FFFFFF;
    border: 1px solid #E5E7EB;
    border-radius: 10px;
    min-width: 0;
}

.profile-icon {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 34px;
    height: 34px;
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
    color: #172554;
    overflow-wrap: anywhere;
}

.profile-info small {
    font-size: 11px;
    color: #64748B;
}

.main {
    margin-left: 250px;
    width: calc(100% - 250px);
    min-height: 100vh;
    padding: 28px 35px;
    min-width: 0;
    transition: margin-left 0.3s ease, width 0.3s ease;
}

body.sidebar-closed .guru-sidebar,
body.sidebar-closed .siswa-sidebar,
body.sidebar-closed .sidebar {
    transform: translateX(-100%);
}

body.sidebar-closed .main {
    margin-left: 0;
    width: 100%;
}

.sidebar,
.siswa-sidebar,
.guru-sidebar {
    transition: transform 0.3s ease;
}


        .sidebar {
    position: fixed;
    top: 0;
    left: 0;
    width: 250px;
    height: 100vh;
    background: #FFFFFF;
    border-right: 1px solid #E5E7EB;
    border-radius: 0;
    padding: 25px 18px;
    box-shadow: none;
    z-index: 100;
    overflow-y: auto;
    transition: transform 0.3s ease;
}

        .menu-title {
    color: #9CA3AF;
    font-size: 11px;
    font-weight: bold;
    margin: 0 10px 15px;
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
    box-shadow: 0 4px 10px rgba(49, 91, 255, 0.18);
}

.menu-icon {
    width: 22px;
    text-align: center;
}

        .logout-form {
    margin-top: 25px;
}

.logout-button {
    width: 100%;
    border: none;
    border-radius: 10px;
    background: #FFF0F0;
    color: #D63C3C;
    text-align: left;
    padding: 13px 14px;
    cursor: pointer;
    font-size: 14px;
}

        .content {
    width: 100%;
    min-width: 0;
    background: #FFFFFF;
    border: 1px solid #E5E7EB;
    border-radius: 15px;
    padding: 25px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.03);
}
        .title {
            font-size: 25px;
            font-weight: bold;
            margin-bottom: 8px;
        }

        .description {
            color: #78909C;
            font-size: 13px;
            margin-bottom: 28px;
        }

        .table-title {
    font-size: 16px;
    font-weight: bold;
    margin-bottom: 20px;
    color: #172554;
}

        .table-wrapper {
            width: 100%;
            overflow-x: auto;
            border-radius: 9px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 750px;
        }

        th {
    background: linear-gradient(135deg, #315BFF, #8B5CF6);
    color: #FFFFFF;
    padding: 14px 12px;
    text-align: center;
    font-size: 13px;
    white-space: nowrap;
}

        td {
    padding: 14px 12px;
    border-bottom: 1px solid #E5E7EB;
    font-size: 13px;
    color: #475569;
    text-align: center;
    vertical-align: top;
}


        tbody tr:hover td {
    background: #F8FAFF;
}

        .text-cell {
            text-align: left;
            min-width: 150px;
            max-width: 240px;
            white-space: normal;
            line-height: 1.5;
        }

        .status {
            display: inline-block;
            padding: 6px 11px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: bold;
            white-space: nowrap;
        }

        .status-menunggu {
            background: #FEF3C7;
            color: #92400E;
        }

        .status-disetujui {
            background: #DCFCE7;
            color: #166534;
        }

        .status-ditolak {
            background: #FEE2E2;
            color: #991B1B;
        }

        .status-selesai {
            background: #DBEAFE;
            color: #1E40AF;
        }

        .empty {
            text-align: center;
            color: #90A4AE;
            padding: 35px !important;
        }

        /* ✅ TAMBAHAN: tombol aksi catat/edit logbook */
        .btn-aksi {
            display: inline-block;
            padding: 7px 12px;
            border-radius: 7px;
            background: linear-gradient(135deg, #315BFF, #8B5CF6);
            color: #FFFFFF;
            font-size: 12px;
            font-weight: 600;
            text-decoration: none;
            white-space: nowrap;
        }

        .btn-aksi:hover {
            opacity: 0.9;
        }

        @media (max-width: 900px) {
    .main {
        padding: 22px;
    }

    .content {
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

    .topbar {
        flex-direction: column;
        align-items: flex-start;
    }

    .topbar-right {
        width: 100%;
        justify-content: flex-end;
    }

    .profile-name,
    .profile-info small {
        display: none;
    }

    .page-heading h3 {
        font-size: 22px;
    }

    .content {
        padding: 18px 14px;
    }

    .table-wrapper {
        overflow-x: auto;
    }
}

    .brand {
    display: flex;
    align-items: center;
    gap: 10px;
    margin-bottom: 35px;
    padding: 0 8px;
}

.brand img {
    width: 40px;
    height: 40px;
    object-fit: contain;
}

.brand span {
    font-size: 20px;
    font-weight: bold;
    color: #315BFF;
}

.history-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 15px;
    margin-bottom: 20px;
}

.history-header .table-title {
    margin-bottom: 0;
}

.btn-print {
    padding: 11px 16px;
    border: none;
    border-radius: 9px;
    background: linear-gradient(135deg, #315BFF, #8B5CF6);
    color: white;
    font-size: 13px;
    font-weight: bold;
    cursor: pointer;
}

.btn-print:hover {
    opacity: 0.9;
}

@media print {
    .sidebar,
    .guru-sidebar,
    .topbar,
    .print-actions,
    .btn-aksi {
        display: none !important;
    }

    .main {
        margin: 0 !important;
        padding: 0 !important;
    }

    .content {
        border: none !important;
        box-shadow: none !important;
    }

    body {
        background: white !important;
    }

    table {
        min-width: 100% !important;
    }
}

    </style>
</head>

<body>

    @php
        $isGuruBk = auth()->user()->role === 'guru_bk';
    @endphp

    
@if($isGuruBk)
    @include('layouts.guru_bk.sidebar')
@else
    @include('layouts.siswa.sidebar')
@endif

<div class="main">

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
                <h3>Riwayat Konseling</h3>
                <p>Lihat riwayat dan perkembangan konseling siswa</p>
            </div>
        </div>

        <div class="topbar-right">
            <div class="notification">🔔</div>

            <div class="profile">
                <span class="profile-icon">👤</span>
                <div class="profile-info">
                    <span class="profile-name">
                        {{ auth()->user()->name }}
                    </span>
                    <small>{{ $isGuruBk ? 'Guru BK' : 'Siswa' }}</small>
                </div>
            </div>
        </div>
    </header>

    <main class="content">
<div class="history-header">
    <div class="table-title">
        Daftar Riwayat Konseling
    </div>

    @if($isGuruBk)
    <form action="{{ route('riwayat-konseling.cetak') }}" method="GET" target="_blank"
          class="print-actions" style="display:flex; gap:8px; align-items:center; flex-wrap:wrap;">
        <input type="month" name="bulan"
               style="padding:9px 10px; border:1px solid #E5E7EB; border-radius:9px; font-size:13px;">
        <select name="status"
                style="padding:9px 10px; border:1px solid #E5E7EB; border-radius:9px; font-size:13px;">
            <option value="">Semua status</option>
            <option value="menunggu">Menunggu</option>
            <option value="disetujui">Disetujui</option>
            <option value="ditolak">Ditolak</option>
            <option value="selesai">Selesai</option>
        </select>
        <button type="submit" class="btn-print">🖨 Cetak Laporan</button>
    </form>
@endif
</div>

            <div class="table-wrapper">

                <table>

                    <thead>
                        <tr>
                            <th>No</th>

                            @if($isGuruBk)
                                <th>Nama Siswa</th>
                            @endif

                            <th>Jadwal</th>
                            <th>Alasan Pengajuan</th>
                            <th>Catatan Siswa</th>
                            <th>Status</th>
                            <th>Pesan dari Guru BK</th>

                            @if($isGuruBk)
                                <th>Perkembangan Konseling</th>
                                <th>Aksi</th>  {{-- ✅ TAMBAH --}}
                            @endif
                        </tr>
                    </thead>

                    <tbody>
    @forelse($requests as $request)
        <tr>
            <td>{{ $loop->iteration }}</td>

            @if($isGuruBk)
                <td>{{ $request->student->nama ?? '-' }}</td>
            @endif

            <td>
                @if($request->schedule)
                    {{ \Carbon\Carbon::parse($request->schedule->tanggal)->translatedFormat('d F Y') }}
                    <br>
                    {{ $request->schedule->jam_mulai }} - {{ $request->schedule->jam_selesai }}
                @else
                    -
                @endif
            </td>

            <td>
                <div class="text-cell">{{ $request->alasan ?: '-' }}</div>
            </td>

            <td>
                <div class="text-cell">{{ $request->catatan ?: '-' }}</div>
            </td>

            {{-- Status hanya satu kali --}}
            <td>
                <span class="status status-{{ $request->status }}">
                    {{ ucfirst($request->status) }}
                </span>
            </td>

            {{-- Pesan yang boleh dilihat siswa --}}
            <td>
                <div class="text-cell">
                    {{ $request->pesan_untuk_siswa ?: '-' }}
                </div>
            </td>

            @if($isGuruBk)
                <td>
                    <div class="text-cell">
                        {{ $request->perkembangan_konseling ?: 'Belum ada perkembangan.' }}
                    </div>
                </td>

                <td>
                    @if($request->status === 'selesai')
                        <a href="{{ route('counseling-requests.logbook', $request) }}"
                           class="btn-aksi">
                            {{ $request->ringkasan ? '✏️ Edit' : '📝 Catat' }}
                        </a>
                    @else
                        -
                    @endif
                </td>
            @endif
        </tr>
    @empty
        <tr>
            <td colspan="{{ $isGuruBk ? 9 : 6 }}" class="empty">
                Belum ada riwayat konseling.
            </td>
        </tr>
    @endforelse
</tbody>

                </table>

            </div>

        </main>

    </div>

<script>
    const menuToggle = document.getElementById('menuToggle');

    menuToggle.addEventListener('click', function () {
        document.body.classList.toggle('sidebar-closed');

        const isExpanded = !document.body.classList.contains('sidebar-closed');

        this.setAttribute('aria-expanded', isExpanded);
    });
</script>
</body>
</html>