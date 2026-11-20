<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perkembangan Siswa - BKConnect</title>
    <style>
        body { margin: 0; padding: 28px; font-family: Arial, sans-serif; background: #f1f5ff; color: #1e293b; }
        .container { max-width: 1100px; margin: auto; }
        .card { background: #fff; border: 1px solid #e5e7eb; border-radius: 14px; padding: 24px; margin-bottom: 20px; }
        h1, h2 { margin-top: 0; color: #24345b; }
        .muted { color: #64748b; }
        label { display: block; margin: 12px 0 7px; font-weight: bold; font-size: 14px; }
        select, textarea { width: 100%; padding: 11px; border: 1px solid #cbd5e1; border-radius: 8px; box-sizing: border-box; }
        textarea { min-height: 110px; resize: vertical; }
        button, .back { display: inline-block; margin-top: 14px; border: 0; border-radius: 8px; padding: 11px 16px; background: #315bff; color: white; text-decoration: none; cursor: pointer; }
        .back { background: #e5e7eb; color: #334155; margin-left: 8px; }
        .success { background: #dcfce7; color: #166534; padding: 12px; border-radius: 8px; margin-bottom: 16px; }
        .error { color: #b91c1c; font-size: 13px; }
        table { width: 100%; border-collapse: collapse; }
        th, td { text-align: left; padding: 12px 8px; border-bottom: 1px solid #e5e7eb; vertical-align: top; }
        th { color: #475569; font-size: 13px; }
        @media (max-width: 700px) { body { padding: 14px; } .table-wrap { overflow-x: auto; } table { min-width: 700px; } }
    </style>
</head>
<body>
<main class="container">
    <div class="card">
        <h1>Perkembangan Siswa</h1>
        <p class="muted">Kirim informasi perkembangan siswa kelas {{ $waliKelas->kelas }} kepada Guru BK.</p>
        <p><strong>Guru BK pendamping:</strong> {{ $waliKelas->guruBk?->nama ?? 'Belum terhubung' }}</p>

        @if(session('success')) <div class="success">{{ session('success') }}</div> @endif
        @if($errors->any())
            <div class="error">{{ $errors->first() }}</div>
        @endif

        @if($waliKelas->guruBk)
            <form action="{{ route('wali-kelas.perkembangan.store') }}" method="POST">
                @csrf
                <label for="student_id">Siswa</label>
                <select name="student_id" id="student_id" required>
                    <option value="">-- Pilih Siswa --</option>
                    @foreach($students as $student)
                        <option value="{{ $student->id }}" @selected(old('student_id') == $student->id)>
                            {{ $student->nama }} - {{ $student->nis }}
                        </option>
                    @endforeach
                </select>
                <label for="perkembangan">Perkembangan Siswa</label>
                <textarea name="perkembangan" id="perkembangan" required placeholder="Tuliskan perkembangan akademik, sosial, atau perilaku siswa...">{{ old('perkembangan') }}</textarea>
                <label for="catatan">Catatan Tambahan</label>
                <textarea name="catatan" id="catatan" placeholder="Catatan atau tindak lanjut yang disarankan...">{{ old('catatan') }}</textarea>
                <button type="submit">Kirim ke Guru BK</button>
            </form>
        @else
            <p class="error">Akun Anda belum dihubungkan dengan Guru BK oleh admin.</p>
        @endif
        <a class="back" href="{{ route('dashboard.wali_kelas') }}">Kembali ke Dashboard Wali Kelas</a>
    </div>

    <div class="card">
        <h2>Laporan yang Dikirim</h2>
        <div class="table-wrap">
            <table>
                <thead><tr><th>Siswa</th><th>Perkembangan</th><th>Catatan</th><th>Tanggal</th></tr></thead>
                <tbody>
                    @forelse($reports as $report)
                        <tr>
                            <td>{{ $report->student->nama }}</td>
                            <td>{{ $report->perkembangan }}</td>
                            <td>{{ $report->catatan ?: '-' }}</td>
                            <td>{{ $report->created_at->format('d/m/Y H:i') }}</td>
                        </tr>
                    @empty
                        <tr><td colspan="4">Belum ada laporan perkembangan.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</main>
</body>
</html>
