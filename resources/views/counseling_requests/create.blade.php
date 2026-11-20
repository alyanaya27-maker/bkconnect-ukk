<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajukan Konseling - BKConnect</title>

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
    padding: 5px 10px 30px;
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
            min-height: 100vh;
            padding: 28px 35px;
            transition: 0.3s;
            min-width: 0;
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
            font-size: 26px;
            color: #172554;
            margin-bottom: 5px;
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

        .page-title {
            font-size: 22px;
            font-weight: 700;
            color: #172554;
            margin-bottom: 8px;
        }

        .page-description {
            font-size: 14px;
            color: #64748B;
            margin-bottom: 28px;
            line-height: 1.6;
        }

        .form-container {
            max-width: 750px;
        }

        .form-group {
            margin-bottom: 22px;
        }

        .form-group label {
            display: block;
            margin-bottom: 9px;
            font-size: 14px;
            font-weight: 600;
            color: #334155;
        }

        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 13px 14px;
            border: 1px solid #D9E1F2;
            border-radius: 9px;
            background: #FFFFFF;
            color: #334155;
            font-size: 14px;
            outline: none;
        }

        .form-group select:focus,
        .form-group textarea:focus {
            border-color: #315BFF;
            box-shadow: 0 0 0 3px rgba(49, 91, 255, 0.08);
        }

        .form-group textarea {
            min-height: 130px;
            resize: vertical;
        }

        .error {
            margin-top: 7px;
            color: #DC2626;
            font-size: 12px;
        }

        .error-summary {
            margin-bottom: 20px;
            padding: 13px 15px;
            background: #FEF2F2;
            color: #B91C1C;
            border: 1px solid #FECACA;
            border-radius: 9px;
            font-size: 14px;
        }

        .success {
            margin-bottom: 20px;
            padding: 13px 15px;
            background: #DCFCE7;
            color: #166534;
            border-radius: 9px;
            font-size: 14px;
        }

        .button-area {
            display: flex;
            gap: 12px;
            margin-top: 28px;
            flex-wrap: wrap;
        }

        .button {
            display: inline-block;
            border: none;
            text-decoration: none;
            padding: 12px 21px;
            border-radius: 9px;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            transition: 0.2s;
        }

        .button-primary {
            background: linear-gradient(135deg, #315BFF, #8B5CF6);
            color: #FFFFFF;
        }

        .button-primary:hover {
            opacity: 0.9;
            transform: translateY(-1px);
        }

        .button-secondary {
            background: #EEF2F7;
            color: #546E7A;
        }

        .button-secondary:hover {
            background: #E2E8F0;
        }

        /* SIDEBAR TOGGLE */
        body.sidebar-closed .siswa-sidebar {
    transform: translateX(-100%);
}

        body.sidebar-closed .main {
            margin-left: 0;
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
    font-size: 25px;
    font-weight: 700;
    color: #263247;
    margin-bottom: 6px;
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

    @include('layouts.siswa.sidebar')

    <main class="main">

        <header class="header">

            <div class="header-left">
                <button type="button" class="menu-toggle" id="menuToggle"
                    aria-label="Buka atau tutup menu" aria-expanded="true">
                    ☰
                </button>

                <div class="header-title">
                    <h1>Pengajuan Konseling</h1>
                    <p>Ajukan layanan konseling dengan mudah dan nyaman.</p>
                </div>
            </div>

            <div class="header-right">

                <div class="notification">🔔</div>

                <div class="profile">
                    <div class="profile-avatar">👤</div>

                    <div class="profile-info">
                        <strong>{{ auth()->user()->name ?? 'Siswa' }}</strong>
                        <span>Siswa</span>
                    </div>
                </div>

            </div>

        </header>

        <section class="content-card">

            <h2 class="page-title">Ajukan Konseling</h2>

            <p class="page-description">
                Isi formulir berikut untuk mengajukan layanan konseling.
                Ceritakan hal yang ingin kamu konsultasikan dengan Guru BK.
            </p>

            @if(session('success'))
                <div class="success">
                    {{ session('success') }}
                </div>
            @endif

            @if($errors->any())
                <div class="error-summary">
                    Periksa kembali data yang kamu masukkan.
                </div>
            @endif

            <div class="form-container">

                <form action="/pengajuan-konseling" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="schedule_id">Jadwal Konseling</label>

                        <select name="schedule_id" id="schedule_id">
                            <option value="">-- Pilih Jadwal (Opsional) --</option>

                            @foreach($schedules as $schedule)
                                <option
                                    value="{{ $schedule->id }}"
                                    {{ old('schedule_id') == $schedule->id ? 'selected' : '' }}
                                >
                                    {{ $schedule->tanggal }} |
                                    {{ $schedule->jam_mulai }} -
                                    {{ $schedule->jam_selesai }}
                                </option>
                            @endforeach
                        </select>

                        @error('schedule_id')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="alasan">Alasan Konseling</label>

                        <textarea
                            name="alasan"
                            id="alasan"
                            required
                            placeholder="Tuliskan alasan atau hal yang ingin dikonsultasikan..."
                        >{{ old('alasan') }}</textarea>

                        @error('alasan')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="catatan">Catatan Tambahan</label>

                        <textarea
                            name="catatan"
                            id="catatan"
                            placeholder="Catatan tambahan (opsional)..."
                        >{{ old('catatan') }}</textarea>

                        @error('catatan')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="button-area">

                        <button type="submit" class="button button-primary">
                            Ajukan Konseling
                        </button>

                        <a href="/dashboard/siswa" class="button button-secondary">
                            Batal
                        </a>

                    </div>

                </form>

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