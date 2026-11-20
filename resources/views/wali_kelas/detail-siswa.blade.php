<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Siswa - BKConnect</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background: #F4F6FC;
            padding: 35px;
            color: #333;
        }

        .container {
            max-width: 900px;
            margin: auto;
        }

        .header {
            margin-bottom: 25px;
        }

        .header h2 {
            color: #315BFF;
            margin-bottom: 8px;
        }

        .header p {
            color: #777;
            font-size: 14px;
        }

        .card {
            background: white;
            padding: 30px;
            border-radius: 14px;
            box-shadow: 0 3px 12px rgba(0,0,0,0.05);
        }

        .profile {
            display: flex;
            align-items: center;
            gap: 18px;
            padding-bottom: 25px;
            border-bottom: 1px solid #E5E7EB;
            margin-bottom: 25px;
        }

        .avatar {
            width: 65px;
            height: 65px;
            border-radius: 50%;
            background: #315BFF;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 25px;
            font-weight: bold;
        }

        .profile h3 {
            margin-bottom: 6px;
        }

        .profile p {
            color: #777;
            font-size: 14px;
        }

        .details {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 22px;
        }

        .detail-item {
            padding: 15px;
            background: #F8F9FF;
            border-radius: 9px;
        }

        .detail-item label {
            display: block;
            color: #777;
            font-size: 13px;
            margin-bottom: 8px;
        }

        .detail-item p {
            font-size: 15px;
            font-weight: bold;
            overflow-wrap: anywhere;
        }

        .back-button {
            display: inline-block;
            margin-top: 25px;
            padding: 12px 20px;
            background: #315BFF;
            color: white;
            text-decoration: none;
            border-radius: 8px;
            font-size: 14px;
        }

        .back-button:hover {
            background: #2448D8;
        }

        @media (max-width: 600px) {
            body {
                padding: 18px;
            }

            .details {
                grid-template-columns: 1fr;
            }

            .card {
                padding: 20px;
            }
        }
    </style>
</head>

<body>
    <div class="container">

        <div class="header">
            <h2>Detail Siswa</h2>
            <p>Informasi lengkap siswa yang berada di kelas Anda.</p>
        </div>

        <div class="card">

            <div class="profile">
                <div class="avatar">
                    {{ strtoupper(substr($student->nama, 0, 1)) }}
                </div>

                <div>
                    <h3>{{ $student->nama }}</h3>
                    <p>{{ $student->kelas }} - {{ $student->jurusan }}</p>
                </div>
            </div>

            <div class="details">

                <div class="detail-item">
                    <label>Nomor Induk Siswa (NIS)</label>
                    <p>{{ $student->nis ?: '-' }}</p>
                </div>

                <div class="detail-item">
                    <label>Nama Lengkap</label>
                    <p>{{ $student->nama ?: '-' }}</p>
                </div>

                <div class="detail-item">
                    <label>Kelas</label>
                    <p>{{ $student->kelas ?: '-' }}</p>
                </div>

                <div class="detail-item">
                    <label>Jurusan</label>
                    <p>{{ $student->jurusan ?: '-' }}</p>
                </div>

                <div class="detail-item">
                    <label>Jenis Kelamin</label>
                    <p>{{ $student->jenis_kelamin ?: '-' }}</p>
                </div>

                <div class="detail-item">
                    <label>Nomor HP</label>
                    <p>{{ $student->no_hp ?: '-' }}</p>
                </div>

                <div class="detail-item">
                    <label>Alamat</label>
                    <p>{{ $student->alamat ?: '-' }}</p>
                </div>

                <div class="detail-item">
                    <label>Wali Kelas</label>
                    <p>{{ $student->wali_kelas ?: '-' }}</p>
                </div>

            </div>

            <a href="{{ route('wali-kelas.data-siswa') }}" class="back-button">
                ← Kembali ke Data Siswa
            </a>

        </div>
    </div>
</body>
</html>