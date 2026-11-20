<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catat Hasil Konseling - BKConnect</title>

    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; font-family: Arial, sans-serif; }

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
        body.sidebar-closed .guru-sidebar { transform: translateX(-100%); }
        body.sidebar-closed .main { margin-left: 0; }

        .topbar {
            min-height: 75px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 15px;
            margin-bottom: 25px;
        }
        .topbar-left { display: flex; align-items: center; gap: 15px; }
        .menu-toggle {
            width: 42px; height: 42px; border: none; border-radius: 9px;
            background: #FFFFFF; color: #315BFF; font-size: 22px; cursor: pointer;
            box-shadow: 0 3px 12px rgba(0,0,0,0.06);
        }
        .page-heading h3 {
            font-size: 25px; font-weight: 700; color: #263247; margin-bottom: 6px;
        }
        .page-heading p { font-size: 13px; color: #9299A8; }

        .content {
            background: #FFFFFF;
            border: 1px solid #E5E7EB;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.03);
            max-width: 780px;
        }

        .info-box {
            background: #EEF2FF;
            padding: 15px 18px;
            border-radius: 10px;
            margin-bottom: 25px;
            font-size: 13px;
            color: #172554;
            line-height: 1.7;
        }

        .info-box strong { color: #315BFF; }

        .form-group { margin-bottom: 20px; }

        .form-group label {
            display: block;
            font-size: 13px;
            font-weight: 600;
            color: #172554;
            margin-bottom: 8px;
        }

        .form-group label .req { color: #D63C3C; }

        .form-group textarea {
            width: 100%;
            min-height: 100px;
            padding: 12px 14px;
            border: 1px solid #E5E7EB;
            border-radius: 9px;
            font-size: 13px;
            font-family: Arial, sans-serif;
            color: #172554;
            resize: vertical;
            outline: none;
        }

        .form-group textarea:focus {
            border-color: #315BFF;
            box-shadow: 0 0 0 3px rgba(49,91,255,0.1);
        }

        .form-actions {
            display: flex;
            gap: 12px;
            margin-top: 25px;
        }

        .btn {
            padding: 11px 20px;
            border: none;
            border-radius: 9px;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .btn-primary {
            background: linear-gradient(135deg, #315BFF, #8B5CF6);
            color: #FFFFFF;
        }
        .btn-primary:hover { opacity: 0.9; }

        .btn-secondary {
            background: #F3F4F6;
            color: #475569;
        }
        .btn-secondary:hover { background: #E5E7EB; }

        .alert {
            padding: 12px 15px;
            border-radius: 9px;
            margin-bottom: 20px;
            font-size: 13px;
        }
        .alert-error {
            background: #FEE2E2;
            color: #991B1B;
        }

        @media (max-width: 700px) {
            .main {
                margin-left: 0;
                padding: 20px 15px;
            }

            .topbar-left {
                min-width: 0;
            }

            .page-heading h3 {
                font-size: 21px;
            }

            .content {
                padding: 20px;
            }

            .form-actions {
                flex-direction: column;
            }

            .btn {
                justify-content: center;
            }
        }
    </style>
</head>
<body>

    @include('layouts.guru_bk.sidebar')

    <div class="main">

        <header class="topbar">
            <div class="topbar-left">
                <button type="button" class="menu-toggle" id="menuToggle">☰</button>
                <div class="page-heading">
                    <h3>📝 Catat Hasil Konseling</h3>
                    <p>Isi ringkasan sesi dan tindak lanjut (data akan dienkripsi)</p>
                </div>
            </div>


        </header>

        <main class="content">

            @if($errors->any())
                <div class="alert alert-error">
                    <ul style="margin-left: 18px;">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="info-box">
                <strong>Siswa:</strong> {{ $counselingRequest->student->nama ?? '-' }}<br>
                <strong>Alasan Pengajuan:</strong> {{ $counselingRequest->alasan }}<br>
                <strong>Status:</strong> {{ ucfirst($counselingRequest->status) }}
            </div>

            <form action="{{ route('counseling-requests.logbook.store', $counselingRequest) }}" method="POST">
                @csrf

                <div class="form-group">
                    <label>Ringkasan Hasil Sesi <span class="req">*</span></label>
                    <textarea name="ringkasan" rows="5" required
                        placeholder="Tuliskan inti pembicaraan, kondisi siswa, poin penting yang dibahas...">{{ old('ringkasan', $counselingRequest->ringkasan) }}</textarea>
                </div>

                <div class="form-group">
                    <label>Tindak Lanjut</label>
                    <textarea name="tindak_lanjut" rows="4"
                        placeholder="Contoh: sesi lanjutan minggu depan / rujuk ke psikolog / pemanggilan orang tua">{{ old('tindak_lanjut', $counselingRequest->tindak_lanjut) }}</textarea>
                </div>

                <div class="form-group">
    <label>💬 Pesan untuk Siswa <small style="font-weight:normal;color:#9299A8;">(opsional, bisa dibaca siswa)</small></label>
    <textarea name="pesan_untuk_siswa" rows="3" maxlength="500"
        placeholder="Contoh: Terima kasih sudah bercerita. Coba terapkan jadwal belajar yang kita buat, ya.">{{ old('pesan_untuk_siswa', $counselingRequest->pesan_untuk_siswa) }}</textarea>
    <small style="color:#D63C3C;font-size:12px;display:block;margin-top:6px;">
        ⚠️ Kolom ini TIDAK dienkripsi dan terlihat oleh siswa. Jangan tulis hal yang rahasia di sini.
    </small>
</div>

                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">💾 Simpan (Terenkripsi)</button>
                    <a href="{{ url('/riwayat-konseling') }}" class="btn btn-secondary">Batal</a>
                </div>
            </form>

        </main>

    </div>

    <script>
        const menuToggle = document.getElementById('menuToggle');
        menuToggle.addEventListener('click', function () {
            document.body.classList.toggle('sidebar-closed');
        });
    </script>

</body>
</html>
