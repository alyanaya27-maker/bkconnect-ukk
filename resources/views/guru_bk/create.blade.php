<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Guru BK - BKConnect</title>

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
            padding: 35px;
            border-radius: 18px;
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
            border: 1px solid #D1D5DB;
            border-radius: 9px;
            font-size: 14px;
        }

        input:focus {
            outline: none;
            border-color: #315BFF;
        }

        .buttons {
            display: flex;
            gap: 12px;
            margin-top: 25px;
        }

        .button {
            border: none;
            text-decoration: none;
            padding: 12px 20px;
            border-radius: 10px;
            font-weight: 600;
            cursor: pointer;
        }

        .save {
            background: linear-gradient(135deg, #315BFF, #8B5CF6);
            color: white;
        }

        .back {
            background: #E5E7EB;
            color: #374151;
        }

        .error {
            color: #DC2626;
            font-size: 13px;
            margin-top: 5px;
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

            .button {
                width: 100%;
                text-align: center;
            }
        }
    </style>
</head>

<body>

<div class="container">

    <div class="card">

        <h1>Tambah Guru BK</h1>

        <p class="subtitle">
            Tambahkan data Guru BK baru.
        </p>

        <form action="{{ route('guru-bk.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="nip">NIP</label>

                <input
                    type="text"
                    id="nip"
                    name="nip"
                    value="{{ old('nip') }}"
                    placeholder="Masukkan NIP"
                >

                @error('nip')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="nama">Nama Guru BK</label>

                <input
                    type="text"
                    id="nama"
                    name="nama"
                    value="{{ old('nama') }}"
                    placeholder="Masukkan nama Guru BK"
                >

                @error('nama')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="email">Email</label>

                <input
                    type="email"
                    id="email"
                    name="email"
                    value="{{ old('email') }}"
                    placeholder="Masukkan email"
                >

                @error('email')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="no_hp">No. HP</label>

                <input
                    type="text"
                    id="no_hp"
                    name="no_hp"
                    value="{{ old('no_hp') }}"
                    placeholder="Masukkan nomor HP"
                >

                @error('no_hp')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="buttons">

                <a href="{{ route('guru-bk.index') }}" class="button back">
                    Kembali
                </a>

                <button type="submit" class="button save">
                    Simpan Data
                </button>

            </div>

        </form>

    </div>

</div>

</body>
</html>
