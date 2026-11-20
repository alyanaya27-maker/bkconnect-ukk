<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Reset Password - BKConnect</title>

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
        }

        .container {
            width: 430px;
            padding: 40px 45px;
            background: #FFFFFF;
            border-radius: 24px;
            box-shadow: 0 25px 70px rgba(0, 0, 0, 0.35);
            text-align: center;
        }

        .logo {
            width: 100px;
            height: 100px;
            margin: 0 auto 15px;
        }

        .logo img {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }

        h2 {
            color: #172554;
            font-size: 23px;
            margin-bottom: 12px;
        }

        .description {
            color: #64748B;
            font-size: 13px;
            line-height: 1.6;
            margin-bottom: 25px;
        }

        input {
            width: 100%;
            height: 52px;
            padding: 0 16px;
            border: 1.5px solid #D7DDF0;
            border-radius: 12px;
            outline: none;
            font-size: 14px;
            margin-bottom: 18px;
        }

        input:focus {
            border-color: #315BFF;
            box-shadow: 0 0 0 4px rgba(49, 91, 255, 0.10);
        }

        button {
            width: 100%;
            height: 52px;
            border: none;
            border-radius: 12px;
            background: linear-gradient(90deg, #315BFF, #8B5CF6);
            color: white;
            font-size: 15px;
            font-weight: bold;
            cursor: pointer;
        }

        .message {
            padding: 10px;
            border-radius: 8px;
            margin-bottom: 18px;
            font-size: 13px;
            background: #FEE2E2;
            color: #DC2626;
        }

        .back {
            display: inline-block;
            margin-top: 22px;
            color: #315BFF;
            font-size: 13px;
            text-decoration: none;
        }

        @media (max-width: 500px) {
            .container {
                width: 90%;
                padding: 35px 25px;
            }
        }
    </style>
</head>

<body>

<div class="container">

    <div class="logo">
        <img src="{{ asset('images/logo-bk.png') }}" alt="Logo BKConnect">
    </div>

    <h2>RESET PASSWORD</h2>

    <p class="description">
        Silakan masukkan password baru untuk akun BKConnect kamu.
    </p>

    @if($errors->any())
        <div class="message">
            {{ $errors->first() }}
        </div>
    @endif

    <form action="{{ route('password.update') }}" method="POST">
        @csrf

        <input type="hidden" name="token" value="{{ $token }}">

        <input
            type="email"
            name="email"
            placeholder="Email terdaftar"
            value="{{ old('email', $email) }}"
            required
        >

        <input
            type="password"
            name="password"
            placeholder="Password baru (minimal 8 karakter)"
            required
        >

        <input
            type="password"
            name="password_confirmation"
            placeholder="Konfirmasi password baru"
            required
        >

        <button type="submit">
            SIMPAN PASSWORD BARU
        </button>
    </form>

    <a href="{{ route('login') }}" class="back">
        ← Kembali ke Login
    </a>

</div>

</body>
</html>
