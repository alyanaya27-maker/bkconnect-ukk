<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengajuan Konseling - BKConnect</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background: #EEF5FF;
            color: #263238;
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
.main {
    margin-left: 250px;
    padding: 28px;
    min-width: 0;
    transition: margin-left 0.3s ease;
}

body.sidebar-closed .guru-sidebar,
body.sidebar-closed .sidebar {
    transform: translateX(-100%);
}

body.sidebar-closed .main {
    margin-left: 0;
}

        .content {
            flex: 1;
            min-width: 0;
        }

        .content-card {
            background: #FFFFFF;
            border-radius: 15px;
            padding: 28px;
            box-shadow: 0 5px 18px rgba(0, 0, 0, 0.06);
        }

        .page-title {
    font-size: 22px;
    font-weight: 700;
    margin-bottom: 8px;
}
        .page-description {
            color: #78909C;
            margin-bottom: 28px;
        }

        .success {
            margin-bottom: 18px;
            padding: 12px 15px;
            border-radius: 9px;
            background: #DCFCE7;
            color: #15803D;
            font-size: 13px;
        }

        .table-title {
            font-size: 16px;
            font-weight: 700;
            margin-bottom: 17px;
            color: #37474F;
        }

        .table-wrapper {
    display: block;
    width: 100%;
    max-width: 100%;
    overflow-x: scroll;
    overflow-y: hidden;
    border-radius: 9px;
    padding-bottom: 12px;
}

.table-wrapper::-webkit-scrollbar {
    height: 10px;
}

.table-wrapper::-webkit-scrollbar-track {
    background: #E5E7EB;
    border-radius: 10px;
}

.table-wrapper::-webkit-scrollbar-thumb {
    background: #315BFF;
    border-radius: 10px;
}

.table-wrapper::-webkit-scrollbar-thumb:hover {
    background: #8B5CF6;
}
        table {
    width: 100%;
    min-width: 1100px;
    border-collapse: collapse;
}
        th {
            background: linear-gradient(135deg, #315BFF, #8B5CF6);
            color: #FFFFFF;
            padding: 13px 11px;
            border: 1px solid #D9E1F2;
            font-size: 12px;
            text-align: center;
            white-space: nowrap;
        }

        td {
            padding: 13px 11px;
            border: 1px solid #E5E7EB;
            font-size: 12px;
            color: #455A64;
            text-align: center;
            vertical-align: top;
        }

        tbody tr:hover {
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

        .status.menunggu {
            background: #FEF3C7;
            color: #92400E;
        }

        .status.disetujui {
            background: #DCFCE7;
            color: #166534;
        }

        .status.ditolak {
            background: #FEE2E2;
            color: #991B1B;
        }

        .status.selesai {
            background: #DBEAFE;
            color: #1E40AF;
        }

        .action-form {
            min-width: 220px;
            display: flex;
            flex-direction: column;
            gap: 8px;
            text-align: left;
        }

        .action-form select,
        .action-form textarea {
            width: 100%;
            padding: 9px;
            border: 1px solid #D1D5DB;
            border-radius: 7px;
            font-size: 12px;
            outline: none;
        }

        .action-form select:focus,
        .action-form textarea:focus {
            border-color: #315BFF;
        }

        .action-form textarea {
            resize: vertical;
            min-height: 65px;
        }

        .save-button {
            background: linear-gradient(135deg, #315BFF, #8B5CF6);
            color: #FFFFFF;
            border: none;
            padding: 9px 12px;
            border-radius: 7px;
            font-size: 12px;
            font-weight: 600;
            cursor: pointer;
        }

        .save-button:hover {
            opacity: 0.9;
        }

        .empty {
            padding: 35px !important;
            color: #90A4AE;
        }

        .student-text {
            max-width: 180px;
            white-space: normal;
            text-align: left;
        }

        .logout-form {
            margin-top: 15px;
        }

        .logout-button {
            width: 100%;
            border: none;
            background: transparent;
            color: #DC2626;
            text-align: left;
            padding: 12px 13px;
            cursor: pointer;
            font-size: 13px;
        }

        @media (max-width: 900px) {
            .main {
                flex-direction: column;
            }
        }

        @media (max-width: 600px) {
            .topbar {
                margin: 12px;
                padding: 15px;
            }

            .brand {
                font-size: 18px;
            }

            .profile {
                font-size: 12px;
            }

            .main {
                padding: 0 12px 20px;
                gap: 14px;
            }

            .sidebar {
                padding: 18px 12px;
            }

            .content-card {
                padding: 18px 14px;
            }

            .page-title {
                font-size: 21px;
            }

            .menu a {
                flex: 1 1 125px;
                font-size: 12px;
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
                >☰</button>

                <div class="page-heading">
                    <h3>Pengajuan Konseling</h3>
                    <p>Kelola pengajuan konseling siswa</p>
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
            <small>Guru Bk</small>
        </div>
    </div>
</div>
        </header>

        <main class="content">
            <div class="content-card">

                @if(session('success'))
                    <div class="success">
                        {{ session('success') }}
                    </div>
                @endif

                @if($errors->any())
                    <div class="success" style="background:#FEE2E2; color:#991B1B;">
                        @foreach($errors->all() as $error)
                            <div>{{ $error }}</div>
                        @endforeach
                    </div>
                @endif

                <div class="table-title">
                    Daftar Pengajuan Konseling Siswa
                </div>

                <div class="table-wrapper">
                    <table>
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Siswa</th>
                                <th>Jadwal</th>
                                <th>Alasan Pengajuan</th>
                                <th>Catatan Siswa</th>
                                <th>Status</th>
                                <th>Perkembangan Konseling</th>
                                <th>Aksi Guru BK</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse($requests as $request)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>

                                    <td>
                                        {{ $request->student->nama ?? '-' }}
                                    </td>

                                    <td>
                                        @if($request->schedule)
                                            {{ $request->schedule->tanggal }}
                                            <br>
                                            {{ $request->schedule->jam_mulai }}
                                            -
                                            {{ $request->schedule->jam_selesai }}
                                        @else
                                            -
                                        @endif
                                    </td>

                                    <td>
                                        <div class="student-text">
                                            {{ $request->alasan }}
                                        </div>
                                    </td>

                                    <td>
                                        <div class="student-text">
                                            {{ $request->catatan ?: '-' }}
                                        </div>
                                    </td>

                                    <td>
                                        <span class="status {{ $request->status }}">
                                            {{ ucfirst($request->status) }}
                                        </span>
                                    </td>

                                    <td>
                                        <div class="student-text">
                                            {{ $request->perkembangan_konseling ?: 'Belum ada perkembangan.' }}
                                        </div>
                                    </td>

                                    <td>
                                        <form
                                            action="{{ route('counseling-requests.updateStatus', $request->id) }}"
                                            method="POST"
                                            class="action-form"
                                        >
                                            @csrf
                                            @method('PATCH')

                                            <select name="status" required>
                                                <option value="menunggu"
                                                    {{ $request->status === 'menunggu' ? 'selected' : '' }}>
                                                    Menunggu
                                                </option>

                                                <option value="disetujui"
                                                    {{ $request->status === 'disetujui' ? 'selected' : '' }}>
                                                    Disetujui
                                                </option>

                                                <option value="ditolak"
                                                    {{ $request->status === 'ditolak' ? 'selected' : '' }}>
                                                    Ditolak
                                                </option>

                                                <option value="selesai"
                                                    {{ $request->status === 'selesai' ? 'selected' : '' }}>
                                                    Selesai
                                                </option>
                                            </select>

                                            <textarea
                                                name="perkembangan_konseling"
                                                rows="3"
                                                placeholder="Tulis perkembangan atau tindak lanjut konseling..."
                                            >{{ $request->perkembangan_konseling }}</textarea>

                                            <button type="submit" class="save-button">
                                                Simpan Perubahan
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="empty">
                                        Belum ada pengajuan konseling.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div> {{-- content-card --}}
        </main> {{-- content --}}
    </main> {{-- main --}}

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
