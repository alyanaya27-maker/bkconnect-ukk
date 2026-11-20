<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Tambah Wali Kelas - BKConnect</title>

    <style>
        body {
            margin: 0;
            font-family: 'Segoe UI', sans-serif;
            background: #F5F7FF;
            color: #1F2937;
        }

        .container {
            width: 90%;
            max-width: 700px;
            margin: 50px auto;
        }

        .card {
            background: #FFFFFF;
            border-radius: 16px;
            padding: 30px;
            box-shadow: 0 10px 30px rgba(49, 91, 255, 0.08);
        }

        h1 {
            color: #315BFF;
            margin-bottom: 8px;
        }

        .subtitle {
            color: #6B7280;
            margin-bottom: 30px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
        }

        input {
            width: 100%;
            box-sizing: border-box;
            padding: 12px 14px;
            border: 1px solid #E5E7EB;
            border-radius: 10px;
            font-size: 14px;
            outline: none;
        }

        input:focus {
            border-color: #315BFF;
        }

        .buttons {
            display: flex;
            gap: 12px;
            margin-top: 25px;
        }

        .save-button {
            border: none;
            background: linear-gradient(135deg, #315BFF, #8B5CF6);
            color: white;
            padding: 12px 20px;
            border-radius: 10px;
            font-weight: 600;
            cursor: pointer;
        }

        .back-button {
            text-decoration: none;
            background: #E5E7EB;
            color: #374151;
            padding: 12px 20px;
            border-radius: 10px;
            font-weight: 600;
        }

        @media (max-width: 600px) {
            .container {
                width: auto;
                margin: 20px 16px;
            }

            .card {
                padding: 22px;
            }

            .buttons {
                flex-direction: column;
            }

            .save-button,
            .back-button {
                width: 100%;
                text-align: center;
            }
        }
    </style>
</head>

<body>

<div class="container">

    <div class="card">

        <h1>Tambah Wali Kelas</h1>

        <p class="subtitle">
            Tambahkan data Wali Kelas baru
        </p>

        <form action="{{ route('wali-kelas.store') }}" method="POST">

            @csrf

            <div class="form-group">
                <label>NIP</label>
                <input type="text" name="nip" placeholder="Masukkan NIP" required>
            </div>

            <div class="form-group">
                <label>Nama Wali Kelas</label>
                <input type="text" name="nama" placeholder="Masukkan nama lengkap" required>
            </div>

            <div class="form-group">
                <label>Kelas</label>
                <input type="text" name="kelas" placeholder="Contoh: XII RPL 1" required>
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" placeholder="Masukkan email">
            </div>

            <div class="form-group">
                <label>No. HP</label>
                <input type="text" name="no_hp" placeholder="Masukkan nomor HP">
            </div>

            <div class="form-group">
                <label>Guru BK Pendamping</label>
                <select name="guru_bk_id" required>
                    <option value="">-- Pilih Guru BK --</option>
                    @foreach($guruBks as $guruBk)
                        <option value="{{ $guruBk->id }}" @selected(old('guru_bk_id') == $guruBk->id)>
                            {{ $guruBk->nama }}{{ $guruBk->nip ? ' - '.$guruBk->nip : '' }}
                        </option>
                    @endforeach
                </select>
                @error('guru_bk_id')
                    <div style="color:#dc2626; font-size:13px; margin-top:5px;">{{ $message }}</div>
                @enderror
            </div>

            <div class="buttons">

                <button type="submit" class="save-button">
                    Simpan Data
                </button>

                <a href="{{ route('wali-kelas.index') }}" class="back-button">
                    Kembali
                </a>

            </div>

        </form>

    </div>

</div>

</body>

</html>
