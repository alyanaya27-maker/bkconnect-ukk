<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - BKConnect</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            min-height: 100vh;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            background:
                radial-gradient(circle at 0% 0%, rgba(49, 91, 255, 0.45), transparent 30%),
                radial-gradient(circle at 100% 100%, rgba(139, 92, 246, 0.40), transparent 30%),
                #080B2A;
            overflow: hidden;
        }

        body::before {
            content: "";
            position: absolute;
            width: 500px;
            height: 500px;
            border: 2px solid rgba(139, 92, 246, 0.35);
            border-radius: 50%;
            top: -280px;
            left: -180px;
            pointer-events: none;
        }

        body::after {
            content: "";
            position: absolute;
            width: 450px;
            height: 450px;
            border: 2px solid rgba(49, 91, 255, 0.35);
            border-radius: 50%;
            bottom: -250px;
            right: -170px;
            pointer-events: none;
        }

        .register-container {
            position: relative;
            z-index: 2;
            width: 430px;
            padding: 35px 45px 40px;
            background: #FFFFFF;
            border-radius: 24px;
            box-shadow: 0 25px 70px rgba(0, 0, 0, 0.35),
                        0 0 35px rgba(49, 91, 255, 0.18);
            text-align: center;
        }

        .logo {
            width: 95px;
            height: 95px;
            margin: 0 auto 10px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .logo img {
            width: 100%;
            height: 100%;
            object-fit: contain;
            filter: drop-shadow(0 6px 12px rgba(49, 91, 255, 0.15));
        }

        .title {
            margin-bottom: 25px;
            font-size: 23px;
            font-weight: 700;
            letter-spacing: 0.3px;
            color: #172554;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .input-wrapper input,
        .input-wrapper select {
            width: 100%;
            height: 48px;
            padding: 0 18px;
            border: 1.5px solid #D7DDF0;
            border-radius: 12px;
            background: #FFFFFF;
            font-family: Arial, sans-serif;
            font-size: 14px;
            outline: none;
            transition: 0.2s;
        }

        .input-wrapper input {
            color: #1F2937;
        }

        .input-wrapper input::placeholder {
            color: #7B86A8;
            opacity: 1;
        }

        .input-wrapper input:focus,
        .input-wrapper select:focus {
            border-color: #315BFF;
            box-shadow: 0 0 0 4px rgba(49, 91, 255, 0.10);
        }

        .input-wrapper select {
            color: #7B86A8;
            cursor: pointer;
        }

        .input-wrapper select.has-value {
            color: #1F2937;
        }

        .input-wrapper select option {
            color: #1F2937;
        }

        #role-info {
            display: block;
            margin-top: 6px;
            text-align: left;
            color: #7B86A8;
            font-size: 13px;
            line-height: 1.5;
        }

        .error-message {
            color: #DC2626;
            font-size: 12px;
            text-align: left;
            margin-top: 5px;
        }

        .register-button {
            width: 100%;
            height: 52px;
            margin-top: 5px;
            border: none;
            border-radius: 12px;
            background: linear-gradient(90deg, #315BFF, #8B5CF6);
            color: #FFFFFF;
            font-size: 15px;
            font-weight: 700;
            letter-spacing: 0.5px;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .register-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(49, 91, 255, 0.30);
        }

        .contact-button {
            display: none;
            width: 100%;
            height: 52px;
            margin-top: 5px;
            border-radius: 12px;
            background: linear-gradient(90deg, #315BFF, #8B5CF6);
            color: #FFFFFF;
            font-size: 15px;
            font-weight: 700;
            letter-spacing: 0.5px;
            text-decoration: none;
            align-items: center;
            justify-content: center;
            transition: all 0.2s ease;
        }

        .contact-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(49, 91, 255, 0.30);
        }

        @media (max-width: 500px) {
            .register-container {
                width: 90%;
                padding: 30px 28px 35px;
                margin: 20px 0;
            }

            .title {
                font-size: 20px;
            }

            .logo {
                width: 85px;
                height: 85px;
            }
        }
    </style>
</head>

<body>
    <div class="register-container">

        <div class="logo">
            <img src="{{ asset('images/logo-bk.png') }}" alt="Logo BKConnect">
        </div>

        <div class="title">BUAT AKUN</div>

        <form action="/register" method="POST" id="register-form">
            @csrf

            <div class="form-group">
                <div class="input-wrapper">
                    <input
                        type="text"
                        name="name"
                        value="{{ old('name') }}"
                        placeholder="Nama"
                        required
                    >
                </div>
                @error('name')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <div class="input-wrapper">
                    <input
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        placeholder="Email"
                        required
                    >
                </div>
                @error('email')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <div class="input-wrapper">
                    <input
                        type="password"
                        name="password"
                        placeholder="Password"
                        required
                    >
                </div>
                @error('password')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
    <div class="input-wrapper">
        <input
            type="password"
            name="password_confirmation"
            placeholder="Konfirmasi Password"
            required
        >
    </div>
</div>

            <div class="form-group">
    <small id="role-info">
        Pendaftaran ini khusus untuk Siswa.
        Akun Guru BK dan Wali Kelas dibuat oleh Admin.
    </small>
</div>

            <div class="form-group">
            <button
                type="submit"
                class="register-button"
                id="register-button"
            >
                DAFTAR
            </button>

        </form>
    </div>
</body>
</html>