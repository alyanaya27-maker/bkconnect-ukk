<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Akun - BKConnect</title>
    <style>
        * { box-sizing: border-box; }
        body { margin: 0; padding: 30px; font-family: Arial, sans-serif; background: #f1f5ff; color: #1e293b; }
        .container { max-width: 750px; margin: 20px auto; background: white; padding: 32px; border-radius: 16px; border: 1px solid #e5e7eb; }
        h1 { margin-top: 0; font-size: 26px; }
        .subtitle { color: #64748b; margin-bottom: 28px; }
        .form-group { margin-bottom: 19px; }
        label { display: block; margin-bottom: 8px; font-weight: bold; font-size: 14px; }
        input, select { width: 100%; padding: 12px 14px; border: 1px solid #cbd5e1; border-radius: 9px; font-size: 14px; outline: none; }
        input:focus, select:focus { border-color: #315BFF; }
        .error { color: #dc2626; font-size: 13px; margin-top: 6px; }
        .buttons { display: flex; gap: 12px; margin-top: 28px; }
        button, .back { padding: 13px 20px; border: none; border-radius: 9px; font-size: 14px; font-weight: bold; text-decoration: none; cursor: pointer; }
        button { background: #315BFF; color: white; }
        .back { background: #e5e7eb; color: #334155; }
        @media (max-width: 600px) { body { padding: 12px; } .container { padding: 22px; } .buttons { flex-direction: column; } }
    </style>
</head>
<body>
<div class="container">
    <h1>Edit Akun</h1>
    <p class="subtitle">Perbarui data akun Guru BK atau Wali Kelas.</p>

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

    @php
        $profile = $user->role === 'guru_bk' ? $user->guruBk : $user->waliKelas;
    @endphp

    <form action="{{ route('admin.users.update', $user) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Nama Lengkap</label>
            <input id="name" type="text" name="name" value="{{ old('name', $user->name) }}" required>
        </div>
        <div class="form-group">
            <label for="email">Email Login</label>
            <input id="email" type="email" name="email" value="{{ old('email', $user->email) }}" required>
        </div>
        <div class="form-group">
            <label for="password">Password Baru</label>
            <input id="password" type="password" name="password" placeholder="Kosongkan jika tidak diubah">
        </div>
        <div class="form-group">
            <label for="password_confirmation">Konfirmasi Password Baru</label>
            <input id="password_confirmation" type="password" name="password_confirmation">
        </div>
        <div class="form-group">
            <label for="role">Role Akun</label>
            <select name="role" id="role" required>
                <option value="guru_bk" @selected(old('role', $user->role) === 'guru_bk')>Guru BK</option>
                <option value="wali_kelas" @selected(old('role', $user->role) === 'wali_kelas')>Wali Kelas</option>
            </select>
        </div>
        <div class="form-group">
            <label for="nip">NIP</label>
            <input id="nip" type="text" name="nip" value="{{ old('nip', $profile?->nip) }}" required>
        </div>
        <div class="form-group">
            <label for="no_hp">Nomor HP</label>
            <input id="no_hp" type="text" name="no_hp" value="{{ old('no_hp', $profile?->no_hp) }}">
        </div>
        <div class="form-group" id="kelas-group">
            <label for="kelas">Kelas (Khusus Wali Kelas)</label>
            <input id="kelas" type="text" name="kelas" value="{{ old('kelas', $profile?->kelas) }}">
        </div>
        <div class="form-group" id="guru-bk-group">
            <label for="guru_bk_id">Guru BK Pendamping</label>
            <select name="guru_bk_id" id="guru_bk_id">
                <option value="">-- Pilih Guru BK --</option>
                @foreach($guruBks as $guruBk)
                    <option value="{{ $guruBk->id }}" @selected(old('guru_bk_id', $user->waliKelas?->guru_bk_id) == $guruBk->id)>
                        {{ $guruBk->nama }}{{ $guruBk->nip ? ' - '.$guruBk->nip : '' }}
                    </option>
                @endforeach
            </select>
            @error('guru_bk_id') <div class="error">{{ $message }}</div> @enderror
        </div>
        <div class="form-group">
            <label for="is_active">Status Akun</label>
            <select name="is_active" id="is_active" required>
                <option value="1" @selected((string) old('is_active', (int) $user->is_active) === '1')>Aktif</option>
                <option value="0" @selected((string) old('is_active', (int) $user->is_active) === '0')>Nonaktif</option>
            </select>
        </div>
        <div class="buttons">
            <a href="{{ route('admin.users.index') }}" class="back">Kembali</a>
            <button type="submit">Simpan Perubahan</button>
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
    }
    roleSelect.addEventListener('change', aturFormKelas);
    aturFormKelas();
</script>
</body>
</html>
