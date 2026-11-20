<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Siswa - BKConnect</title>

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
    color: #9CA3AF;
    font-size: 11px;
    font-weight: bold;
    margin: 0 10px 15px;
    text-transform: uppercase;
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
    display: flex;
    align-items: center;
    gap: 12px;
}

.logout-button:hover {
    background: #FFE4E4;
}
        /* MAIN */
        .main {
            margin-left: 250px;
            min-height: 100vh;
            padding: 28px 35px;
            transition: margin-left 0.3s ease;
            min-width: 0;
        }

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

        /* PAGE HEADING */
        .page-heading {
            margin-bottom: 20px;
        }

        .page-heading h2 {
            font-size: 21px;
            color: #172554;
            margin-bottom: 7px;
        }

        .page-heading p {
            font-size: 14px;
            color: #64748B;
        }

        /* FORM CARD */
        .form-card {
            background: #FFFFFF;
            padding: 25px;
            border-radius: 15px;
            border: 1px solid #E5E7EB;
        }

        .form-card h3 {
            font-size: 17px;
            color: #172554;
            margin-bottom: 20px;
        }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 18px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            min-width: 0;
        }

        .full {
            grid-column: 1 / -1;
        }

        label {
            font-size: 13px;
            font-weight: 600;
            color: #334155;
            margin-bottom: 8px;
        }

        input, select, textarea {
            padding: 12px;
            border: 1px solid #D1D5DB;
            border-radius: 8px;
            font-size: 14px;
            width: 100%;
            background: #FFFFFF;
            color: #334155;
        }

        input:focus, select:focus, textarea:focus {
            outline: none;
            border-color: #315BFF;
            box-shadow: 0 0 0 3px rgba(49, 91, 255, 0.08);
        }

        textarea {
            resize: vertical;
        }

        .error {
            color: #DC2626;
            font-size: 12px;
            margin-top: 5px;
        }

        .alert {
            background: #DCFCE7;
            color: #166534;
            padding: 13px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 14px;
        }

        .actions {
            margin-top: 25px;
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
        }

        .save-button {
            background: linear-gradient(135deg, #315BFF, #8B5CF6);
            color: #FFFFFF;
            border: none;
            padding: 12px 22px;
            border-radius: 8px;
            cursor: pointer;
            font-weight: bold;
            font-size: 14px;
        }

        .save-button:hover {
            opacity: 0.92;
        }

        .back {
            background: #E5E7EB;
            color: #374151;
            text-decoration: none;
            padding: 12px 22px;
            border-radius: 8px;
            font-size: 14px;
        }

        /* TABLET */
        @media (max-width: 900px) {
            .main {
                padding: 22px;
            }
        }

        /* MOBILE */
        @media (max-width: 650px) {
            .sidebar {
                width: 260px;
                padding: 20px 16px;
                box-shadow: 5px 0 20px rgba(0,0,0,0.08);
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

            .form-grid {
                grid-template-columns: 1fr;
            }

            .full {
                grid-column: auto;
            }

            .form-card {
                padding: 20px;
            }
        }
    </style>
</head>

<body>

    <!-- SIDEBAR -->
    <aside class="sidebar" id="sidebar">

    <div class="brand">
    <img src="{{ asset('images/logo-bk.png') }}" alt="Logo BKConnect">
    <span class="brand-text">BKConnect</span>
</div>

    <div class="menu-title">MENU UTAMA</div>

    <nav class="menu">

        <a href="{{ route('dashboard.siswa') }}">
            <span class="menu-icon">🏠</span>
            Dashboard
        </a>

        <a href="{{ url('/pengajuan-konseling/create') }}">
            <span class="menu-icon">💬</span>
            Pengajuan Konseling
        </a>

        <a href="{{ url('/jadwal-konseling') }}">
            <span class="menu-icon">📅</span>
            Jadwal Konseling
        </a>

        <a href="{{ url('/riwayat-konseling') }}">
            <span class="menu-icon">📋</span>
            Riwayat Konseling
        </a>

<a href="{{ route('profile.index') }}" class="active">
    <span class="menu-icon">👤</span>
    <span>Profil</span>
</a>
    </nav>

    <form action="{{ route('logout') }}" method="POST" class="logout-form">
    @csrf
    <button type="submit" class="logout-button">
        <span class="menu-icon">🚪</span>
        <span>Keluar</span>
    </button>
</form>
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
                    aria-controls="sidebar">
                    ☰
                </button>

                <div>
                    <h1>Profil Siswa</h1>
                    <p>Lihat dan perbarui informasi data pribadi Anda</p>
                </div>

            </div>

            <div class="header-right">

                <div class="notification">🔔</div>

                <div class="profile">
                    <div class="profile-avatar">👤</div>

                    <div>
                        <div class="profile-name">
                            {{ auth()->user()->name }}
                        </div>

                        <div class="profile-role">
                            Siswa
                        </div>
                    </div>
                </div>

            </div>

        </header>

        <!-- FORM PROFIL -->
        <section class="form-card">

            <h3>Informasi Pribadi</h3>

            @if(session('success'))
                <div class="alert">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('profile.update') }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-grid">

                    <div class="form-group">
                        <label>Nama Lengkap</label>
                        <input type="text" name="nama"
                            value="{{ old('nama', $student->nama ?? auth()->user()->name) }}" required>
                        @error('nama')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>NIS</label>
                        <input type="text" name="nis"
                            value="{{ old('nis', $student->nis ?? '') }}" required>
                        @error('nis')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Kelas</label>
                        <input type="text" name="kelas"
                            value="{{ old('kelas', $student->kelas ?? '') }}" required>
                        @error('kelas')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Jurusan</label>
                        <input type="text" name="jurusan"
                            value="{{ old('jurusan', $student->jurusan ?? '') }}" required>
                        @error('jurusan')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <select name="jenis_kelamin" required>
                            <option value="">Pilih Jenis Kelamin</option>
                            <option value="Laki-laki"
                                {{ old('jenis_kelamin', $student->jenis_kelamin ?? '') == 'Laki-laki' ? 'selected' : '' }}>
                                Laki-laki
                            </option>
                            <option value="Perempuan"
                                {{ old('jenis_kelamin', $student->jenis_kelamin ?? '') == 'Perempuan' ? 'selected' : '' }}>
                                Perempuan
                            </option>
                        </select>
                        @error('jenis_kelamin')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Nomor HP</label>
                        <input type="text" name="no_hp"
                            value="{{ old('no_hp', $student->no_hp ?? '') }}">
                        @error('no_hp')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group full">
                        <label>Alamat</label>
                        <textarea name="alamat" rows="3">{{ old('alamat', $student->alamat ?? '') }}</textarea>
                        @error('alamat')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group full">
                        <label>Wali Kelas</label>
                        <input type="text" name="wali_kelas"
                            value="{{ old('wali_kelas', $student->wali_kelas ?? '') }}">
                        @error('wali_kelas')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>

                </div>

                <div class="actions">
                    <button type="submit" class="save-button">
                        Simpan Perubahan
                    </button>

                    <a href="{{ url('/dashboard/siswa') }}" class="back">
                        Kembali
                    </a>
                </div>

            </form>

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