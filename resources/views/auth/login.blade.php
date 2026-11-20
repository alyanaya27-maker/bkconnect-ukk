<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login - BKConnect</title>

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
                radial-gradient(
                    circle at 0% 0%,
                    rgba(49, 91, 255, 0.45),
                    transparent 30%
                ),
                radial-gradient(
                    circle at 100% 100%,
                    rgba(139, 92, 246, 0.40),
                    transparent 30%
                ),
                #080B2A;

            overflow: hidden;
        }

        /* Dekorasi background */
        body::before {
            content: "";
            position: absolute;
            width: 500px;
            height: 500px;
            border: 2px solid rgba(139, 92, 246, 0.35);
            border-radius: 50%;
            top: -280px;
            left: -180px;
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
        }

        .login-container {
            position: relative;
            z-index: 2;

            width: 430px;
            padding: 45px 48px;

            background: rgba(255, 255, 255, 0.98);

            border-radius: 24px;

            box-shadow:
                0 25px 70px rgba(0, 0, 0, 0.35),
                0 0 35px rgba(49, 91, 255, 0.20);

            text-align: center;
        }

        /* Logo */
        .logo {
             width: 105px;
             height: 105px;

             margin: 0 auto 15px;

            display: flex;
            justify-content: center;
            align-items: center;

            filter: drop-shadow(0 8px 18px rgba(49, 91, 255, 0.20));
        }

         .logo img {
            width: 100%;
            height: 100%;

            object-fit: contain;

            mix-blend-mode: multiply;
        }

        /* Judul */
        .title {
            margin-bottom: 30px;

            font-size: 24px;
            font-weight: 700;

            color: #172554;
        }

        /* Error */
        .error {
            margin-bottom: 18px;
            padding: 10px;

            border-radius: 8px;

            background: #fee2e2;
            color: #dc2626;

            font-size: 13px;
        }

        /* Success */
        .success {
           margin-bottom: 18px;
           padding: 10px;

           border-radius: 8px;

           background: #dcfce7;
           color: #16a34a;

           font-size: 13px;
        }

        /* Input */
        .form-group {
            margin-bottom: 18px;
        }

        .input-wrapper {
            position: relative;
        }

        .input-wrapper input {
            width: 100%;
            height: 52px;

            padding: 0 18px;

            border: 1.5px solid #D7DDF0;
            border-radius: 12px;

            background: #FFFFFF;

            color: #1F2937;
            font-size: 14px;

            outline: none;

            transition: 0.2s;
        }

        .input-wrapper input::placeholder {
            color: #7B86A8;
        }

        .input-wrapper input:focus {
            border-color: #315BFF;

            box-shadow:
                0 0 0 4px rgba(49, 91, 255, 0.10);
        }

        /* Tombol */
        .login-button {
            width: 100%;
            height: 52px;

            margin-top: 5px;

            border: none;
            border-radius: 12px;

            background: linear-gradient(
                90deg,
                #315BFF,
                #8B5CF6
            );

            color: #FFFFFF;

            font-size: 15px;
            font-weight: bold;

            cursor: pointer;

            transition: 0.2s;
        }

        .login-button:hover {
            transform: translateY(-2px);

            box-shadow:
                0 10px 25px rgba(49, 91, 255, 0.30);
        }

        .login-button:active {
            transform: translateY(0);
        }

        @media (max-width: 500px) {
            .login-container {
                width: 90%;
                padding: 35px 28px;
            }

            .title {
                font-size: 20px;
            }

            .logo {
                width: 105px;
                height: 105px;
            }
        }
    </style>
</head>

<body>

    <div class="login-container">

        <!-- Logo BK Connect -->
        <div class="logo">
            <img src="{{ asset('images/logo-bk.png') }}" alt="Logo BK Connect">
        </div>

        <!-- Judul -->
        <div class="title">
            SISTEM BK & KONSELING
        </div>

        <!-- Pesan error -->
        @if($errors->any())
        <div class="error">
        {{ $errors->first() }}
        </div>
        @endif

        <!-- Pesan sukses -->
        @if(session('success'))
        <div class="success">
        {{ session('success') }}
        </div>
        @endif

        <!-- Form Login -->
        <form action="/login" method="POST">

            @csrf

            <div class="form-group">
                <div class="input-wrapper">
                    <input
                        type="email"
                        name="email"
                        placeholder="Email"
                        required
                    >
                </div>
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
            </div>
            <div style="text-align: right; margin-bottom: 18px;">
    <a href="{{ route('password.request') }}"
       style="color: #315BFF; font-size: 13px; text-decoration: none;">
        Lupa Password?
    </a>
</div>

            <button
                type="submit"
                class="login-button"
            >
                LOGIN
            </button>

        </form>

    </div>

</body>
</html>