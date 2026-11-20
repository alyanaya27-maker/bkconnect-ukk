<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Akun - BKConnect</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 30px;
            font-family: Arial, sans-serif;
            background: #f1f5ff;
            color: #1e293b;
        }

        .container {
            max-width: 750px;
            margin: 20px auto;
            background: white;
            padding: 32px;
            border-radius: 16px;
            border: 1px solid #e5e7eb;
        }

        h1 {
            margin-top: 0;
            font-size: 26px;
        }

        .subtitle {
            color: #64748b;
            margin-bottom: 28px;
        }

        .form-group {
            margin-bottom: 19px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            font-size: 14px;
        }

        input, select {
            width: 100%;
            padding: 12px 14px;
            border: 1px solid #cbd5e1;
            border-radius: 9px;
            font-size: 14px;
            outline: none;
        }

        input:focus, select:focus {
            border-color: #315BFF;
        }

        .error {
            color: #dc2626;
            font-size: 13px;
            margin-top: 6px;
        }

        .buttons {
            display: flex;
            gap: 12px;
            margin-top: 28px;
        }

        button, .back {
            padding: 13px 20px;
            border: none;
            border-radius: 9px;
            font-size: 14px;
            font-weight: bold;
            text-decoration: none;
            cursor: pointer;
        }

        button {
            background: #315BFF;
            color: white;
        }

        .back {
            background: #e5e7eb;
            color: #334155;
        }

        button:hover {
            background: #2548d8;
        }

        .role-info {
            padding: 13px;
            background: #eef2ff;
            color: #475569;
            border-radius: 9px;
            font-size: 13px;
            margin-top: 8px;
        }

        @media (max-width: 600px) {
            body {
                padding: 12px;
            }

            .container {
                padding: 22px;
            }

            .buttons {
                flex-direction: column;
            }
        }
    </style>
</head>

<body>

<div class="container">

    <h1>Tambah Akun</h1>
    <p class="subtitle">
        Buat akun baru untuk Guru BK atau Wali Kelas.
    </p>

    @if ($errors->any())
        <div class="error" style="margin-bottom: 20px;">
            <strong>Periksa kembali data berikut:</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.users.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label>Nama Lengkap</label>
            <input
                type="text"
                name="name"
                value="{{ old('name') }}"
                placeholder="Masukkan nama lengkap"
                required
            >
        </div>

        <div class="form-group">
            <label>Email Login</label>
            <input
                type="email"
                name="email"
                value="{{ old('email') }}"
                placeholder="contoh@email.com"
                required
            >
        </div>

        <div class="form-group">
            <label>Password</label>
            <input
                type="password"
                name="password"
                placeholder="Minimal 8 karakter"
                required
            >
        </div>

        <div class="form-group">
            <label>Konfirmasi Password</label>
            <input
                type="password"
                name="password_confirmation"
                placeholder="Ulangi password"
                required
            >
        </div>

        <div class="form-group">
            <label>Role Akun</label>
            <select name="role" id="role" required>
                <option value="">-- Pilih Role --</option>
                <option value="guru_bk" {{ old('role') == 'guru_bk' ? 'selected' : '' }}>
                    Guru BK
                </option>
                <option value="wali_kelas" {{ old('role') == 'wali_kelas' ? 'selected' : '' }}>
                    Wali Kelas
                </option>
            </select>
            <div class="role-info">
                Pilih jenis akun yang akan dibuat.
            </div>
        </div>

        <div class="form-group">
            <label>NIP</label>
            <input
                type="text"
                name="nip"
                value="{{ old('nip') }}"
                placeholder="Masukkan NIP"
                required
            >
        </div>

        <div class="form-group">
            <label>Nomor HP</label>
            <input
                type="text"
                name="no_hp"
                value="{{ old('no_hp') }}"
                placeholder="Masukkan nomor HP"
            >
        </div>

        <div class="form-group" id="kelas-group">
            <label>Kelas (Khusus Wali Kelas)</label>
            <input
                type="text"
                name="kelas"
                value="{{ old('kelas') }}"
                id="kelas"
                placeholder="Contoh: XII RPL 1"
            >
        </div>

        <div class="form-group" id="guru-bk-group">
            <label for="guru_bk_id">Guru BK Pendamping</label>
            <select name="guru_bk_id" id="guru_bk_id">
                <option value="">-- Pilih Guru BK --</option>
                @foreach($guruBks as $guruBk)
                    <option value="{{ $guruBk->id }}" @selected(old('guru_bk_id') == $guruBk->id)>
                        {{ $guruBk->nama }}{{ $guruBk->nip ? ' - '.$guruBk->nip : '' }}
                    </option>
                @endforeach
            </select>
            @error('guru_bk_id') <div class="error">{{ $message }}</div> @enderror
        </div>

        <div class="buttons">
            <a href="{{ route('admin.users.index') }}" class="back">
                Kembali
            </a>

            <button type="submit">
                Simpan Akun
            </button>
        </div>

    </form>

</div>

<script>
    const roleSelect = document.getElementById('role');
    const kelasGroup = document.getElementById('kelas-group');
    const kelasInput = document.getElementById('kelas');
    const guruBkGroup = document.getElementById('guru-bk-group');
    const guruBkInput = document.getElementById('guru_bk_id');

    function aturFormKelas() {
        const waliKelas = roleSelect.value === 'wali_kelas';

        kelasGroup.style.display = waliKelas ? 'block' : 'none';
        kelasInput.required = waliKelas;
        guruBkGroup.style.display = waliKelas ? 'block' : 'none';
        guruBkInput.required = waliKelas;

        if (!waliKelas) {
            kelasInput.value = '';
        }
    }

    roleSelect.addEventListener('change', aturFormKelas);
    aturFormKelas();
</script>

</body>
</html>
