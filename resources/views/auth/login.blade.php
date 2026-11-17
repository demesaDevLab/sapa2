<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login - SAPA</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, Helvetica, sans-serif;
        }

        body {
            min-height: 100vh;
            background: linear-gradient(135deg, #eef5ff, #f7f1ff);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 25px;
            color: #333;
        }

        .login-wrapper {
            width: 100%;
            max-width: 1050px;
            min-height: 620px;
            background: #ffffff;
            border-radius: 28px;
            overflow: hidden;
            box-shadow: 0 15px 45px rgba(99, 102, 241, 0.12);
            display: flex;
        }

        /* =========================
           BAGIAN KIRI
        ========================= */

        .login-left {
            width: 50%;
            background: linear-gradient(145deg, #8db9ff, #a994f5);
            padding: 55px;
            color: white;
            display: flex;
            flex-direction: column;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }

        .login-left::before {
            content: "";
            position: absolute;
            width: 260px;
            height: 260px;
            background: rgba(255, 255, 255, 0.10);
            border-radius: 50%;
            top: -80px;
            right: -80px;
        }

        .login-left::after {
            content: "";
            position: absolute;
            width: 200px;
            height: 200px;
            background: rgba(255, 255, 255, 0.08);
            border-radius: 50%;
            bottom: -70px;
            left: -70px;
        }

        .brand {
            position: relative;
            z-index: 2;
            text-align: center;
        }

        .logo {
            width: 130px;
            height: 130px;
            object-fit: cover;
            border-radius: 25px;
            background: white;
            padding: 8px;
            margin-bottom: 25px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.12);
        }

        .brand h1 {
            font-size: 42px;
            margin-bottom: 8px;
            letter-spacing: 2px;
        }

        .brand h2 {
            font-size: 18px;
            font-weight: 500;
            margin-bottom: 22px;
            opacity: 0.95;
        }

        .brand p {
            font-size: 14px;
            line-height: 1.8;
            max-width: 380px;
            margin: auto;
            opacity: 0.92;
        }

        .tagline {
            margin-top: 28px;
            padding: 13px 18px;
            border: 1px solid rgba(255,255,255,0.35);
            background: rgba(255,255,255,0.10);
            border-radius: 15px;
            font-size: 14px;
            display: inline-block;
        }

        /* =========================
           BAGIAN KANAN
        ========================= */

        .login-right {
            width: 50%;
            padding: 55px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .login-title {
            margin-bottom: 32px;
        }

        .login-title h2 {
            font-size: 30px;
            color: #303b58;
            margin-bottom: 8px;
        }

        .login-title p {
            font-size: 14px;
            color: #8a8fa3;
        }

        /* =========================
           ERROR
        ========================= */

        .alert {
            background: #fff0f2;
            color: #d9536f;
            border: 1px solid #ffd1d9;
            padding: 12px 15px;
            border-radius: 12px;
            font-size: 13px;
            margin-bottom: 20px;
        }

        .alert ul {
            padding-left: 18px;
        }

        /* =========================
           FORM
        ========================= */

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            color: #454b60;
            font-size: 14px;
            font-weight: 600;
        }

        .input-wrapper {
            position: relative;
        }

        .form-control {
            width: 100%;
            height: 52px;
            border: 1px solid #dfe4f0;
            border-radius: 14px;
            padding: 0 16px;
            font-size: 14px;
            color: #333;
            background: #fafbff;
            outline: none;
            transition: 0.2s;
        }

        .form-control:focus {
            border-color: #8caef5;
            background: #ffffff;
            box-shadow: 0 0 0 4px rgba(140, 174, 245, 0.12);
        }

        .form-control::placeholder {
            color: #b2b7c5;
        }

        .password-toggle {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            border: none;
            background: none;
            cursor: pointer;
            color: #8a8fa3;
            font-size: 13px;
        }

        /* =========================
           REMEMBER
        ========================= */

        .form-options {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 25px;
        }

        .remember {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 13px;
            color: #73798d;
            cursor: pointer;
        }

        .remember input {
            width: 16px;
            height: 16px;
            accent-color: #829fe9;
            cursor: pointer;
        }

        /* =========================
           BUTTON
        ========================= */

        .btn-login {
            width: 100%;
            height: 52px;
            border: none;
            border-radius: 14px;
            background: linear-gradient(135deg, #82aef5, #9b8ce8);
            color: white;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            transition: 0.2s;
            box-shadow: 0 8px 20px rgba(130, 174, 245, 0.25);
        }

        .btn-login:hover {
            transform: translateY(-1px);
            box-shadow: 0 10px 25px rgba(130, 174, 245, 0.32);
        }

        .btn-login:disabled {
            background: #c5c9d6;
            color: #ffffff;
            cursor: not-allowed;
            box-shadow: none;
            transform: none;
            opacity: 0.8;
        }

        .register-text {
            text-align: center;
            margin-top: 25px;
            font-size: 14px;
            color: #8a8fa3;
        }

        .register-text a {
            color: #758fdf;
            font-weight: 600;
            text-decoration: none;
        }

        .register-text a:hover {
            text-decoration: underline;
        }

        .footer {
            text-align: center;
            margin-top: 35px;
            font-size: 11px;
            color: #b0b4c1;
        }

        /* =========================
           TABLET
        ========================= */

        @media (max-width: 850px) {
            body {
                padding: 18px;
            }

            .login-wrapper {
                max-width: 650px;
                min-height: auto;
            }

            .login-left {
                padding: 40px 30px;
            }

            .login-right {
                padding: 40px 30px;
            }

            .brand h1 {
                font-size: 34px;
            }

            .brand h2 {
                font-size: 16px;
            }
        }

        /* =========================
           HP
        ========================= */

        @media (max-width: 650px) {
            body {
                padding: 0;
                align-items: stretch;
                background: #f7f9ff;
            }

            .login-wrapper {
                width: 100%;
                max-width: none;
                min-height: 100vh;
                border-radius: 0;
                display: block;
                box-shadow: none;
            }

            .login-left {
                width: 100%;
                padding: 35px 25px 30px;
                min-height: 330px;
            }

            .logo {
                width: 90px;
                height: 90px;
                border-radius: 20px;
                margin-bottom: 17px;
            }

            .brand h1 {
                font-size: 32px;
            }

            .brand h2 {
                font-size: 15px;
                margin-bottom: 12px;
            }

            .brand p {
                font-size: 12px;
                line-height: 1.6;
                max-width: 320px;
            }

            .tagline {
                margin-top: 18px;
                font-size: 12px;
                padding: 10px 14px;
            }

            .login-right {
                width: 100%;
                padding: 32px 25px 35px;
            }

            .login-title {
                margin-bottom: 25px;
            }

            .login-title h2 {
                font-size: 25px;
            }

            .login-title p {
                font-size: 13px;
            }

            .form-group {
                margin-bottom: 17px;
            }

            .form-control {
                height: 50px;
            }

            .btn-login {
                height: 50px;
            }

            .footer {
                margin-top: 25px;
            }
        }

        /* =========================
           HP KECIL
        ========================= */

        @media (max-width: 380px) {
            .login-left {
                padding: 28px 20px 25px;
                min-height: 300px;
            }

            .logo {
                width: 75px;
                height: 75px;
            }

            .brand h1 {
                font-size: 28px;
            }

            .brand h2 {
                font-size: 14px;
            }

            .brand p {
                font-size: 11px;
            }

            .login-right {
                padding: 27px 20px 30px;
            }
        }
    </style>
</head>

<body>

<div class="login-wrapper">

    <!-- =========================
         BAGIAN KIRI
    ========================== -->
    <div class="login-left">

        <div class="brand">

            <img
                src="{{ asset('images/logo-sapa.jpeg') }}"
                alt="Logo SAPA"
                class="logo"
            >

            <h1>SAPA</h1>

            <h2>
                Sistem Aspirasi dan Pengaduan Akademik
            </h2>

            <p>
                Sampaikan aspirasi dan pengaduan akademik
                dengan mudah, aman, dan terstruktur melalui
                sistem SAPA.
            </p>

            <div class="tagline">
                Sampaikan Aspirasi, Wujudkan Solusi
            </div>

        </div>

    </div>


    <!-- =========================
         BAGIAN KANAN
    ========================== -->
    <div class="login-right">

        <div class="login-title">

            <h2>Selamat Datang </h2>

            <p>
                Silakan masuk untuk melanjutkan ke SAPA.
            </p>

        </div>


        <!-- =========================
             ERROR MESSAGE
        ========================== -->

        @if ($errors->any())

            <div class="alert">

                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>

            </div>

        @endif


        <!-- =========================
             FORM LOGIN
        ========================== -->

        <form
            action="{{ route('login.process') }}"
             method="POST">

            @csrf


            <!-- EMAIL -->

            <div class="form-group">

                <label for="email">
                    Email
                </label>

                <input
                    type="email"
                    id="email"
                    name="email"
                    class="form-control"
                    placeholder="Masukkan email"
                    value=""
                    autocomplete="off"
                    required
                >

            </div>


            <!-- PASSWORD -->

            <div class="form-group">

                <label for="password">
                    Password
                </label>

                <div class="input-wrapper">

                    <input
                        type="password"
                        id="password"
                        name="password"
                        class="form-control"
                        placeholder="Masukkan password"
                        autocomplete="new-password"
                        required
                    >

                    <button
                        type="button"
                        class="password-toggle"
                        onclick="togglePassword()"
                    >
                        Lihat
                    </button>

                </div>

            </div>


            <!-- REMEMBER -->

            <div class="form-options">

                <label class="remember">

                    <input
                        type="checkbox"
                        name="remember"
                        value="1"
                    >

                    <span>
                        Ingat saya
                    </span>

                </label>

            </div>


            <!-- BUTTON LOGIN -->

            <button
                type="submit"
                class="btn-login"
                id="loginButton"
                disabled
                >
                Masuk
            </button>


        </form>


        <!-- REGISTER SISWA -->
    <div class="register-text">
        Belum punya akun siswa?

        <a href="{{ route('register') }}">
            Daftar sebagai siswa
        </a>
    </div>


        <!-- FOOTER -->

        <div class="footer">

            © {{ date('Y') }} SAPA -
            SMK Budi Bakti Ciwidey

        </div>

    </div>

</div>


<!-- =========================
     JAVASCRIPT
========================== -->

<script>

// Fitur lihat dan sembunyikan password
function togglePassword() {

    const password = document.getElementById('password');
    const button = document.querySelector('.password-toggle');

    if (password.type === 'password') {
        password.type = 'text';
        button.textContent = 'Sembunyikan';
    } else {
        password.type = 'password';
        button.textContent = 'Lihat';
    }

}


// Fitur disable tombol login
const loginForm = document.querySelector('form');
const emailInput = document.getElementById('email');
const passwordInput = document.getElementById('password');
const loginButton = document.getElementById('loginButton');

function checkLogin() {

    loginButton.disabled =
        !emailInput.value.trim() ||
        !passwordInput.value.trim();

}

emailInput.addEventListener('input', checkLogin);
passwordInput.addEventListener('input', checkLogin);


// Disable tombol saat form dikirim
loginForm.addEventListener('submit', function () {

    if (!emailInput.value.trim() || !passwordInput.value.trim()) {
        return;
    }

    loginButton.disabled = true;
    loginButton.textContent = 'Memproses...';

});

</script>

</body>
</html>
