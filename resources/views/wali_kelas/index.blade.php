<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Wali Kelas - BK & Konseling</title>

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
    font-weight: 400;
    color: #9299A8;
    line-height: normal;
    margin: 0;
    padding: 0;
}

        /* MAIN */
        .main {
    margin-left: 250px;
    padding: 28px;
    min-width: 0;
    transition: margin-left 0.3s ease;
}

body.sidebar-closed .admin-sidebar {
    transform: translateX(-100%);
}

body.sidebar-closed .main {
    margin-left: 0;
}

        /* SIDEBAR */
        .sidebar {
            width: 285px;
            background: #FFFFFF;
            border-radius: 15px;
            padding: 25px 14px;
            box-shadow: 0 5px 18px rgba(0, 0, 0, 0.07);
            flex-shrink: 0;
        }

        .menu-title {
            color: #315BFF;
            font-size: 16px;
            font-weight: 700;
            margin: 0 10px 18px;
        }

        .menu {
            display: flex;
            flex-direction: column;
            gap: 5px;
        }

        .menu a {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 12px 15px;
            border-radius: 10px;
            text-decoration: none;
            color: #606B75;
            font-size: 14px;
            transition: 0.2s;
        }

        .menu a:hover {
            background: #EEF3FF;
            color: #315BFF;
        }

        .menu a.active {
            background: linear-gradient(
                135deg,
                #315BFF,
                #8B5CF6
            );
            color: #FFFFFF;
        }

        .menu-icon {
            width: 20px;
            text-align: center;
        }

        /* CONTENT */
        .content {
            flex: 1;
            min-width: 0;
        }

        .content-card {
            background: #FFFFFF;
            border-radius: 15px;
            padding: 32px;
            min-height: 620px;
            box-shadow: 0 5px 18px rgba(0, 0, 0, 0.07);
        }

        .page-title {
            font-size: 28px;
            font-weight: 700;
            color: #263238;
            margin-bottom: 8px;
        }

        .page-description {
            font-size: 14px;
            color: #78909C;
            margin-bottom: 38px;
        }

        /* TABLE HEADING */
        .table-heading {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .table-title {
            font-size: 16px;
            font-weight: 700;
            color: #37474F;
        }

        .add-button {
            display: inline-block;
            text-decoration: none;
            color: #FFFFFF;
            background: linear-gradient(
                135deg,
                #315BFF,
                #8B5CF6
            );
            padding: 10px 18px;
            border-radius: 9px;
            font-size: 13px;
            font-weight: 600;
        }

        /* SUCCESS */
        .success {
            margin-bottom: 18px;
            padding: 12px 15px;
            border-radius: 9px;
            background: #DCFCE7;
            color: #15803D;
            font-size: 13px;
        }

        /* TABLE */
        .table-wrapper {
            width: 100%;
            overflow-x: auto;
        }

        table {
            width: 100%;
            min-width: 850px;
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

        tbody tr:hover {
            background: #F8FAFF;
        }

        .empty {
            padding: 35px !important;
            color: #90A4AE;
        }

        /* RESPONSIVE */
        @media (max-width: 900px) {
            .main {
                flex-direction: column;
            }

            .sidebar {
                width: 100%;
            }

            .menu {
                flex-direction: row;
                flex-wrap: wrap;
            }

            .content-card {
                padding: 22px;
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
                aria-controls="sidebar">
                ☰
            </button>

            <div class="page-heading">
                <h3>Data Wali Kelas</h3>
                <p>Daftar seluruh data Wali Kelas</p>
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

    <main class="content">
            <div class="content-card">

                <div class="table-heading">

                    <div class="table-title">
                        Data Wali Kelas
                    </div>

                </div>


                @if(session('success'))
                    <div class="success">
                        {{ session('success') }}
                    </div>
                @endif


                <div class="table-wrapper">

                    <table>
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Wali Kelas</th>
        </tr>
    </thead>
    <tbody>
        @forelse($waliKelas as $wali)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $wali->nama }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="2">Belum ada data Wali Kelas.</td>
            </tr>
        @endforelse
    </tbody>
</table>

                </div>

            </div>

        </main>

                </div>

        </main>

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