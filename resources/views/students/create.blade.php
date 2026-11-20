<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Tambah Data Siswa - BK & Konseling</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        body {
            background: #ffffff;
            color: #111111;
        }

        /* NAVBAR */
        .navbar {
            height: 95px;
            margin: 25px;
            border: 3px solid #111111;
            border-radius: 20px;
            background: #f5f3f5;

            display: flex;
            align-items: center;
            justify-content: space-between;

            padding: 0 35px;
        }

        .logo {
            font-size: 32px;
            font-weight: 400;
        }

        .profile-navbar {
            display: flex;
            align-items: center;
            gap: 20px;
            font-size: 28px;
        }

        .notification {
            font-size: 32px;
        }

        .profile-icon {
            color: #1976d2;
            font-size: 35px;
        }

        /* LAYOUT */
        .layout {
            display: flex;
            gap: 100px;
            padding: 50px 38px;
        }

        /* SIDEBAR */
        .sidebar {
            width: 365px;
            min-height: 720px;

            border: 3px solid #111111;
            border-radius: 20px;
            background: #f5f3f5;

            padding: 30px 25px;
            flex-shrink: 0;
        }

        .menu {
            list-style: none;
        }

        .menu li {
            margin-bottom: 20px;
        }

        .menu a {
            text-decoration: none;
            color: #111111;

            display: flex;
            align-items: center;
            gap: 12px;

            font-size: 27px;
            line-height: 1.25;
        }

        .menu-icon {
            width: 38px;
            text-align: center;
            font-size: 28px;
        }

        /* CONTENT */
        .content {
            flex: 1;
            min-width: 0;

            border: 3px solid #111111;
            border-radius: 20px;
            background: #f5f3f5;

            padding: 30px 45px;
        }

        .content h1 {
            font-size: 38px;
            font-weight: 400;
            margin-bottom: 12px;
        }

        .subtitle {
            font-size: 22px;
            margin-bottom: 35px;
        }

        /* FORM */
        .form-container {
            background: white;
            border: 2px solid #111111;
            border-radius: 12px;
            padding: 30px;
        }

        .form-group {
            margin-bottom: 22px;
        }

        .form-group label {
            display: block;
            font-size: 19px;
            font-weight: bold;
            margin-bottom: 8px;
        }

        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 13px 15px;

            border: 2px solid #111111;
            border-radius: 8px;

            font-size: 17px;
            background: #ffffff;
            outline: none;
        }

        .form-group textarea {
            min-height: 100px;
            resize: vertical;
        }

        .form-group input:focus,
        .form-group select:focus,
        .form-group textarea:focus {
            border-color: #315BFF;
        }

        .error {
            color: red;
            font-size: 14px;
            margin-top: 5px;
        }

        /* BUTTON */
        .button-area {
            display: flex;
            gap: 15px;
            margin-top: 10px;
        }

        .save-button {
            background: #b18b5d;
            color: white;

            border: 2px solid #111111;
            border-radius: 8px;

            padding: 13px 25px;

            font-size: 18px;
            font-weight: bold;

            cursor: pointer;
        }

        .back-button {
            background: white;
            color: #111111;

            border: 2px solid #111111;
            border-radius: 8px;

            padding: 13px 25px;

            font-size: 18px;
            font-weight: bold;

            text-decoration: none;
        }

        .save-button:hover {
            background: #8f704b;
        }

        .back-button:hover {
            background: #eeeeee;
        }

        /* RESPONSIVE */
        @media (max-width: 1000px) {
            .layout {
                gap: 25px;
            }

            .sidebar {
                width: 280px;
            }

            .menu a {
                font-size: 21px;
            }

            .content {
                padding: 25px;
            }
        }

        @media (max-width: 750px) {
            .layout {
                flex-direction: column;
            }

            .sidebar {
                width: 100%;
                min-height: auto;
            }

            .navbar {
                margin: 15px;
                padding: 0 20px;
            }

            .logo {
                font-size: 22px;
            }

            .profile-navbar {
                font-size: 20px;
            }
        }
    </style>
</head>

<body>

    <!-- NAVBAR -->
    <div class="navbar">

        <div class="logo">
            BK & KONSELING
        </div>

        <div class="profile-navbar">
            <span class="notification">🔔</span>
            <span class="profile-icon">👤</span>
            <span>Guru BK ▼</span>
        </div>

    </div>


    <!-- LAYOUT -->
    <div class="layout">

        <!-- SIDEBAR -->
        <aside class="sidebar">

            <ul class="menu">

                <li>
                    <a href="/dashboard/siswa">
                        <span class="menu-icon">🏠</span>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="/students">
                        <span class="menu-icon">👥</span>
                        <span>Data Siswa</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <span class="menu-icon">💬</span>
                        <span>Pengajuan<br>Konseling</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <span class="menu-icon">📅</span>
                        <span>Jadwal<br>Konseling</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <span class="menu-icon">📋</span>
                        <span>Riwayat<br>Konseling</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <span class="menu-icon">📊</span>
                        <span>Laporan BK</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <span class="menu-icon">👤</span>
                        <span>Profil</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <span class="menu-icon">⚙️</span>
                        <span>Pengaturan</span>
                    </a>
                </li>

            </ul>

        </aside>


        <!-- CONTENT -->
        <main class="content">

            <h1>TAMBAH DATA SISWA</h1>

            <p class="subtitle">
                Tambahkan data siswa baru
            </p>


            <div class="form-container">

                <form action="/students" method="POST">

                    @csrf

                    <!-- NIS -->
                    <div class="form-group">

                        <label>NIS</label>

                        <input
                            type="text"
                            name="nis"
                            value="{{ old('nis') }}"
                            placeholder="Masukkan NIS"
                            required
                        >

                        @error('nis')
                            <div class="error">{{ $message }}</div>
                        @enderror

                    </div>


                    <!-- NAMA -->
                    <div class="form-group">

                        <label>Nama Lengkap</label>

                        <input
                            type="text"
                            name="nama"
                            value="{{ old('nama') }}"
                            placeholder="Masukkan nama lengkap"
                            required
                        >

                        @error('nama')
                            <div class="error">{{ $message }}</div>
                        @enderror

                    </div>


                    <!-- KELAS -->
                    <div class="form-group">

                        <label>Kelas</label>

                        <select name="kelas" required>

                            <option value="">-- Pilih Kelas --</option>

                            <option value="X"
                                {{ old('kelas') == 'X' ? 'selected' : '' }}>
                                X
                            </option>

                            <option value="XI"
                                {{ old('kelas') == 'XI' ? 'selected' : '' }}>
                                XI
                            </option>

                            <option value="XII"
                                {{ old('kelas') == 'XII' ? 'selected' : '' }}>
                                XII
                            </option>

                        </select>

                        @error('kelas')
                            <div class="error">{{ $message }}</div>
                        @enderror

                    </div>


                    <!-- JURUSAN -->
                    <div class="form-group">

                        <label>Jurusan</label>

                        <input
                            type="text"
                            name="jurusan"
                            value="{{ old('jurusan') }}"
                            placeholder="Contoh: Rekayasa Perangkat Lunak"
                        >

                    </div>


                    <!-- JENIS KELAMIN -->
                    <div class="form-group">

                        <label>Jenis Kelamin</label>

                        <select name="jenis_kelamin">

                            <option value="">-- Pilih Jenis Kelamin --</option>

                            <option value="Laki-laki"
                                {{ old('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' }}>
                                Laki-laki
                            </option>

                            <option value="Perempuan"
                                {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>
                                Perempuan
                            </option>

                        </select>

                    </div>


                    <!-- ALAMAT -->
                    <div class="form-group">

                        <label>Alamat</label>

                        <textarea
                            name="alamat"
                            placeholder="Masukkan alamat lengkap"
                        >{{ old('alamat') }}</textarea>

                    </div>


                    <!-- NO HP -->
                    <div class="form-group">

                        <label>No. HP</label>

                        <input
                            type="text"
                            name="no_hp"
                            value="{{ old('no_hp') }}"
                            placeholder="Masukkan nomor HP"
                        >

                    </div>

                    <div class="form-group">

                        <label>Wali Kelas</label>

                        <input 
                           type="text" 
                           name="wali_kelas" 
                           value="{{ old('wali_kelas') }}" 
                           placeholder="Masukkan nama wali kelas"
                           >
                    </div>


                    <!-- BUTTON -->
                    <div class="button-area">

                        <button
                            type="submit"
                            class="save-button"
                        >
                            Simpan Data
                        </button>

                        <a
                            href="/students"
                            class="back-button"
                        >
                            Kembali
                        </a>

                    </div>

                </form>

            </div>

        </main>

    </div>

</body>
</html>