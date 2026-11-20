<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Riwayat Konseling - BKConnect</title>
    <style>
        * { box-sizing: border-box; font-family: Arial, sans-serif; }
        body { margin: 30px; color: #000; font-size: 12px; }
        .kop { text-align: center; margin-bottom: 18px; }
        .kop h2 { font-size: 18px; margin-bottom: 4px; }
        .kop p { font-size: 12px; color: #475569; }
        hr { margin: 12px 0 18px; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #999; padding: 6px 8px; text-align: left; vertical-align: top; }
        th { background: #E5E7EB; text-align: center; -webkit-print-color-adjust: exact; print-color-adjust: exact; }
        td.c { text-align: center; }
        .ttd { margin-top: 40px; width: 220px; margin-left: auto; text-align: center; }
        .ttd .nama { margin-top: 70px; font-weight: bold; text-decoration: underline; }
        .table-wrapper { width: 100%; overflow-x: auto; }
        @media print {
            body { margin: 0; }
            .table-wrapper { overflow: visible; }
        }
    </style>
</head>
<body>

    <div class="kop">
        <h2>Laporan Riwayat Konseling</h2>
        <p>
            BKConnect
            @if(request('bulan'))
                • Periode: {{ \Carbon\Carbon::parse(request('bulan').'-01')->translatedFormat('F Y') }}
            @endif
            @if(request('status'))
                • Status: {{ ucfirst(request('status')) }}
            @endif
        </p>
        <hr>
    </div>

    <div class="table-wrapper">
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Siswa</th>
                <th>Jadwal</th>
                <th>Alasan Pengajuan</th>
                <th>Status</th>
                <th>Perkembangan</th>
            </tr>
        </thead>
        <tbody>
            @forelse($requests as $r)
                <tr>
                    <td class="c">{{ $loop->iteration }}</td>
                    <td>{{ $r->student->nama ?? '-' }}</td>
                    <td>
                        @if($r->schedule)
                            {{ \Carbon\Carbon::parse($r->schedule->tanggal)->translatedFormat('d F Y') }}<br>
                            {{ $r->schedule->jam_mulai }} - {{ $r->schedule->jam_selesai }}
                        @else
                            -
                        @endif
                    </td>
                    <td>{{ $r->alasan ?: '-' }}</td>
                    <td class="c">{{ ucfirst($r->status) }}</td>
                    <td>{{ $r->perkembangan_konseling ?: '-' }}</td>
                </tr>
            @empty
                <tr><td colspan="6" class="c">Tidak ada data.</td></tr>
            @endforelse
        </tbody>
    </table>
    </div>

    <div class="ttd">
        <p>{{ now()->translatedFormat('d F Y') }}</p>
        <p>Guru BK</p>
        <p class="nama">{{ auth()->user()->name }}</p>
    </div>

    <script>window.onload = () => window.print();</script>
</body>
</html>
