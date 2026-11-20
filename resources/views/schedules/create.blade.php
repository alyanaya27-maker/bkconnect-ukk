<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Jadwal Konseling - BKConnect</title>

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

        .main {
            margin-left: 250px;
            min-height: 100vh;
            padding: 28px 35px;
            transition: margin-left 0.3s ease;
        }

        body.sidebar-closed .sidebar,
        body.sidebar-closed .guru-sidebar {
            transform: translateX(-100%);
        }

        body.sidebar-closed .main {
            margin-left: 0;
        }

        .topbar {
            min-height: 50px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 15px;
            margin-bottom: 28px;
        }

        .topbar-left,
        .topbar-right {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .menu-toggle,
        .notification {
            width: 42px;
            height: 42px;
            display: grid;
            place-items: center;
            border: 1px solid #E5E7EB;
            border-radius: 10px;
            background: #FFFFFF;
            font-size: 20px;
        }

        .menu-toggle {
            color: #315BFF;
            cursor: pointer;
        }

        .page-heading h3 {
            color: #263247;
            font-size: 25px;
            margin-bottom: 5px;
        }

        .page-heading p {
            color: #9299A8;
            font-size: 13px;
        }

        .profile {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 7px 12px;
            background: #FFFFFF;
            border: 1px solid #E5E7EB;
            border-radius: 10px;
            font-size: 13px;
        }

        .profile-icon {
            display: grid;
            place-items: center;
            width: 34px;
            height: 34px;
            border-radius: 50%;
            background: #EEF2FF;
        }

        .profile small {
            color: #64748B;
        }

        .content {
            width: 100%;
            background: #FFFFFF;
            border: 1px solid #E5E7EB;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.03);
        }

        .form-title {
            font-size: 18px;
            margin-bottom: 25px;
        }

        .form-box {
            max-width: 750px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-size: 13px;
            font-weight: bold;
        }

        input,
        select,
        textarea {
            width: 100%;
            padding: 12px 14px;
            border: 1px solid #D1D5DB;
            border-radius: 9px;
            color: #172554;
            background: #FFFFFF;
            font-size: 14px;
            outline: none;
        }

        input:focus,
        select:focus,
        textarea:focus {
            border-color: #315BFF;
            box-shadow: 0 0 0 3px rgba(49, 91, 255, 0.1);
        }

        textarea {
            min-height: 100px;
            resize: vertical;
        }

        .hint {
            display: block;
            margin-top: 6px;
            color: #64748B;
            font-size: 12px;
        }

        .buttons {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
            margin-top: 25px;
        }

        .btn {
            display: inline-block;
            padding: 12px 20px;
            border: none;
            border-radius: 9px;
            text-decoration: none;
            cursor: pointer;
            font-size: 14px;
            font-weight: bold;
        }

        .btn-save {
            color: #FFFFFF;
            background: linear-gradient(135deg, #315BFF, #8B5CF6);
        }

        .btn-cancel {
            color: #374151;
            background: #E5E7EB;
        }

        .error {
            max-width: 750px;
            padding: 12px 15px;
            margin-bottom: 20px;
            border-radius: 9px;
            background: #FEE2E2;
            color: #991B1B;
            font-size: 14px;
        }

        @media (max-width: 650px) {
            .main {
                margin-left: 0;
                padding: 20px 15px;
            }

            .topbar-right {
                display: none;
            }

            .content {
                padding: 20px;
            }
        }
    </style>
</head>

<body>
    @include('layouts.guru_bk.sidebar')

    <div class="main">
        <header class="topbar">
            <div class="topbar-left">
                <button type="button" class="menu-toggle" id="menuToggle"
                        aria-label="Buka atau tutup menu">
                    ☰
                </button>

                <div class="page-heading">
                    <h3>Tambah Jadwal Konseling</h3>
                    <p>Tambahkan jadwal konseling untuk siswa.</p>
                </div>
            </div>

            <div class="topbar-right">
                <div class="notification">🔔</div>

                <div class="profile">
                    <span class="profile-icon">👤</span>
                    <div>
                        <strong>{{ auth()->user()->name }}</strong><br>
                        <small>Guru BK</small>
                    </div>
                </div>
            </div>
        </header>

        <main class="content">
            <h4 class="form-title">Form Tambah Jadwal</h4>

            @if($errors->any())
                <div class="error">
                    <ul style="margin-left: 20px;">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('schedules.store') }}" method="POST" class="form-box">
                @csrf

                <div class="form-group">
                    <label for="student_id">Siswa</label>
                    <select name="student_id" id="student_id" required>
    <option value="">-- Pilih Siswa --</option>

    @foreach($students as $student)
        <option value="{{ $student->id }}"
            @selected(old('student_id') == $student->id)>
            {{ $student->nama }}
        </option>
    @endforeach
</select>
                </div>

                <div class="form-group">
                    <label for="tanggal">Tanggal</label>
                    <input type="date" name="tanggal" id="tanggal"
                           min="{{ now()->toDateString() }}"
                           value="{{ old('tanggal') }}" required>
                </div>

                <div class="form-group">
                    <label for="jam_mulai">Jam Mulai</label>
                    <input type="time" name="jam_mulai" id="jam_mulai"
                           value="{{ old('jam_mulai') }}" required>
                </div>

                <div class="form-group">
                    <label for="jam_selesai">Jam Selesai</label>
                    <input type="time" name="jam_selesai" id="jam_selesai"
                           value="{{ old('jam_selesai') }}" required>
                </div>

                <div class="form-group">
                    <label for="keterangan">Keterangan</label>
                    <textarea name="keterangan" id="keterangan"
                              placeholder="Contoh: Konseling di ruang BK">{{ old('keterangan') }}</textarea>
                </div>

                <div class="buttons">
                    <button type="submit" class="btn btn-save">+ Simpan Jadwal</button>
                    <a href="{{ route('schedules.index') }}" class="btn btn-cancel">Batal</a>
                </div>
            </form>
        </main>
    </div>

    <script>
        document.getElementById('menuToggle').addEventListener('click', function () {
            document.body.classList.toggle('sidebar-closed');
        });
    </script>
</body>
</html>