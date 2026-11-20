<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengelolaan Akun - BKConnect</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background: #F1F5FF;
            color: #25304A;
        }

        .main {
    margin-left: 250px;
    padding: 28px;
    min-width: 0;
    transition: margin-left 0.3s ease;
}

.topbar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 20px;
    margin-bottom: 30px;
}

.topbar-left {
    display: flex;
    align-items: center;
    gap: 18px;
}

.menu-toggle {
    width: 42px;
    height: 42px;
    border: 1px solid #E5E7EB;
    border-radius: 10px;
    background: #FFFFFF;
    color: #315BFF;
    font-size: 20px;
    font-weight: bold;
    line-height: 1;
    cursor: pointer;
}

.page-heading h3 {
    font-size: 20px;
    color: #24345B;
}

.page-heading p {
    font-size: 13px;
    color: #778198;
    margin-top: 5px;
}

.topbar-right {
    display: flex;
    align-items: center;
    gap: 12px;
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

.profile {
    display: flex;
    align-items: center;
    gap: 10px;
    background: #FFFFFF;
    padding: 8px 14px;
    border: 1px solid #E5E7EB;
    border-radius: 12px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
}

.profile-info {
    display: flex;
    flex-direction: column;
    gap: 3px;
}

.profile-name {
    font-size: 13px;
    font-weight: bold;
}

.profile-info small {
    font-size: 11px;
    color: #778198;
}

.container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 25px;
}

body.sidebar-closed .admin-sidebar {
    transform: translateX(-100%);
}

body.sidebar-closed .main {
    margin-left: 0;
}

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            margin-bottom: 25px;
        }

        h1 {
            font-size: 25px;
            color: #24345B;
        }

        .subtitle {
            color: #778198;
            margin-top: 7px;
            font-size: 14px;
        }

        .actions {
            display: flex;
            gap: 8px;
            align-items: center;
        }

        .action-link, .action-button {
            border: 0;
            border-radius: 7px;
            padding: 7px 10px;
            color: white;
            font-size: 12px;
            text-decoration: none;
            cursor: pointer;
        }

        .action-link { background: #f59e0b; }
        .action-button { background: #dc2626; }

        .btn {
            display: inline-block;
            background: #315BFF;
            color: white;
            text-decoration: none;
            padding: 12px 18px;
            border-radius: 8px;
            font-size: 14px;
            border: none;
            cursor: pointer;
        }

        .btn:hover {
            background: #2448D8;
        }

        .btn-back {
            background: #E5E7EB;
            color: #374151;
        }

        .card {
            background: white;
            border-radius: 12px;
            padding: 25px;
            box-shadow: 0 3px 15px rgba(0,0,0,0.04);
        }

        .alert {
            padding: 13px 16px;
            background: #DCFCE7;
            color: #166534;
            border-radius: 8px;
            margin-bottom: 18px;
        }

        .table-wrapper {
            overflow-x: auto;
        }

        table {
    width: 100%;
    min-width: 1050px;
    border-collapse: collapse;
}

        th {
    background: linear-gradient(
        135deg,
        #315BFF,
        #8B5CF6
    );
    color: #FFFFFF;
    padding: 14px 12px;
    border: 1px solid #D9E1F2;
    font-size: 13px;
    text-align: center;
    white-space: nowrap;
}

td {
    padding: 14px 12px;
    border: 1px solid #E5E7EB;
    font-size: 13px;
    text-align: center;
    color: #455A64;
    white-space: nowrap;
}
        .role {
            display: inline-block;
            padding: 6px 10px;
            border-radius: 20px;
            font-size: 12px;
            background: #EDE9FE;
            color: #6D28D9;
        }

        .active {
            color: #15803D;
            background: #DCFCE7;
            padding: 6px 10px;
            border-radius: 20px;
            font-size: 12px;
        }

        .inactive {
            color: #B91C1C;
            background: #FEE2E2;
            padding: 6px 10px;
            border-radius: 20px;
            font-size: 12px;
        }

        .empty {
            text-align: center;
            color: #8791A5;
            padding: 35px;
        }

        @media (max-width: 600px) {
            .header {
                align-items: flex-start;
                flex-direction: column;
            }

            .card {
                padding: 15px;
            }
        }
    </style>
</head>

<body>

@include('layouts.admin.sidebar')

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
                <h3>Pengelolaan Akun</h3>
                <p>Kelola akun Guru BK dan Wali Kelas BKConnect</p>
            </div>
        </div>

        <div class="topbar-right">
            <div class="notification">🔔</div>

            <div class="profile">
                <span class="profile-icon">👤</span>
                <div class="profile-info">
                    <span class="profile-name">{{ auth()->user()->name }}</span>
                    <small>Admin</small>
                </div>
            </div>
        </div>
    </header>

    <div class="container">

    @if(session('success'))
        <div class="alert">
            {{ session('success') }}
        </div>
    @endif

    <div class="card">

        <div class="header">

            <div>
                <h2 style="font-size:18px;">Daftar Akun</h2>
                <p class="subtitle">
                    Jumlah akun: {{ $users->count() }}
                </p>
            </div>

            <a href="{{ route('admin.users.create') }}" class="btn">
    + Tambah Akun
</a>
        </div>

        <div class="table-wrapper">
            <table>
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Status</th>
                        <th>Nip</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($users as $index => $user)
                        <tr>
                            <td>{{ $index + 1 }}</td>

                            <td>{{ $user->name }}</td>

                            <td>{{ $user->email }}</td>

                            <td>
                                <span class="role">
                                    {{ $user->role === 'guru_bk' ? 'Guru BK' : 'Wali Kelas' }}
                                </span>
                            </td>

                            <td>
                                @if($user->is_active)
                                    <span class="active">Aktif</span>
                                @else
                                    <span class="inactive">Nonaktif</span>
                                @endif
                            </td>

                            <td>
                                @if($user->role === 'guru_bk')
                                    {{ $user->guruBk?->nip ?? 'Belum terhubung' }}
                                @else
                                    {{ $user->waliKelas?->nip ?? 'Belum terhubung' }}
                                @endif
                            </td>
                            <td>
                                <div class="actions">
                                    <a href="{{ route('admin.users.edit', $user) }}" class="action-link">Edit</a>
                                    <form action="{{ route('admin.users.destroy', $user) }}" method="POST" onsubmit="return confirm('Hapus akun ini? Data profil terkait juga akan dihapus.');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="action-button">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="empty">
                                Belum ada akun Guru BK atau Wali Kelas.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>

</div>

<script>
    const menuToggle = document.getElementById('menuToggle');

    menuToggle.addEventListener('click', function () {
        document.body.classList.toggle('sidebar-closed');

        const isExpanded = !document.body.classList.contains('sidebar-closed');

        menuToggle.setAttribute('aria-expanded', isExpanded);
    });
</script>

</main>
</body>
</html>
