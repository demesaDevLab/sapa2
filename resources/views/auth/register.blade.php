<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar - SAPA</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, Helvetica, sans-serif;
        }

        body {
            min-height: 100vh;
            background: #f4f7ff;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 30px;
            color: #38577f;
        }

        .container {
            width: 100%;
            max-width: 1050px;
            min-height: 650px;
            background: white;
            border-radius: 30px;
            overflow: hidden;
            box-shadow: 0 15px 50px rgba(62, 94, 145, 0.12);
            display: grid;
            grid-template-columns: 1fr 1fr;
        }

        /* LEFT */

        .illustration {
            background: linear-gradient(145deg, #7d8fdf, #9a9fe2);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 50px;
            position: relative;
            overflow: hidden;
        }

        .circle-one {
            position: absolute;
            width: 280px;
            height: 280px;
            background: rgba(255, 255, 255, 0.08);
            border-radius: 50%;
            top: -100px;
            left: -90px;
        }

        .circle-two {
            position: absolute;
            width: 250px;
            height: 250px;
            background: rgba(255, 255, 255, 0.08);
            border-radius: 50%;
            bottom: -100px;
            right: -80px;
        }

        .illustration-content {
            text-align: center;
            color: white;
            position: relative;
            z-index: 2;
        }

        .logo-large {
            width: 105px;
            height: 105px;
            object-fit: cover;
            background: white;
            padding: 6px;
            border-radius: 27px;
            margin-bottom: 25px;
        }

        .illustration h1 {
            font-size: 35px;
            margin-bottom: 12px;
        }

        .illustration p {
            max-width: 350px;
            line-height: 1.7;
            font-size: 13px;
            opacity: 0.92;
        }

        .tagline {
            margin-top: 25px;
            font-size: 12px;
            background: rgba(255, 255, 255, 0.15);
            display: inline-block;
            padding: 10px 17px;
            border-radius: 20px;
        }

        /* RIGHT */

        .form-section {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 45px;
        }

        .form-container {
            width: 100%;
            max-width: 400px;
        }

        .form-container h2 {
            font-size: 27px;
            color: #34567f;
            margin-bottom: 7px;
        }

        .subtitle {
            color: #98a5b7;
            font-size: 11px;
            margin-bottom: 24px;
            line-height: 1.5;
        }

        .alert {
            background: #fff0f2;
            color: #c86c7c;
            padding: 10px 12px;
            border-radius: 10px;
            font-size: 10px;
            margin-bottom: 13px;
            line-height: 1.5;
        }

        .input-group {
            margin-bottom: 13px;
        }

        .input-group label {
            display: block;
            font-size: 10px;
            color: #647993;
            margin-bottom: 6px;
        }

        .input-box {
            height: 44px;
            border: 1px solid #e4eaf3;
            border-radius: 12px;
            display: flex;
            align-items: center;
            padding: 0 12px;
            background: #fbfcff;
            transition: 0.2s;
        }

        .input-box:focus-within {
            border-color: #8298dd;
            background: white;
            box-shadow: 0 0 0 3px rgba(113, 134, 218, 0.08);
        }

        .input-icon {
            width: 25px;
            font-size: 14px;
            margin-right: 7px;
            flex-shrink: 0;
        }

        .input-box input,
        .input-box select {
            width: 100%;
            min-width: 0;
            border: none;
            outline: none;
            background: transparent;
            color: #405d80;
            font-size: 11px;
        }

        .input-box input::placeholder {
            color: #b0bac8;
        }

        .input-box select {
            cursor: pointer;
        }

        .password-eye {
            border: none;
            background: transparent;
            cursor: pointer;
            color: #8da0b8;
            flex-shrink: 0;
        }

        .register-button {
            width: 100%;
            height: 46px;
            border: none;
            border-radius: 12px;
            background: linear-gradient(135deg, #7186d8, #9297dc);
            color: white;
            font-size: 11px;
            font-weight: bold;
            cursor: pointer;
            margin-top: 5px;
            box-shadow: 0 8px 18px rgba(111, 128, 211, 0.18);
        }

        .register-button:hover {
            opacity: 0.92;
        }

        .login-text {
            text-align: center;
            color: #94a1b3;
            font-size: 10px;
            margin-top: 20px;
        }

        .login-text a {
            color: #657bd0;
            font-weight: bold;
            text-decoration: none;
        }

        .footer {
            text-align: center;
            margin-top: 18px;
            color: #b0bac7;
            font-size: 8px;
        }

        /* TABLET */

        @media (max-width: 850px) {
            .container {
                grid-template-columns: 0.85fr 1fr;
            }

            .illustration {
                padding: 30px;
            }

            .form-section {
                padding: 30px;
            }
        }

        /* HP */

        @media (max-width: 650px) {
            body {
                padding: 0;
                align-items: flex-start;
            }

            .container {
                min-height: 100vh;
                border-radius: 0;
                box-shadow: none;
                display: block;
            }

            .illustration {
                min-height: 255px;
                padding: 30px 25px;
            }

            .logo-large {
                width: 75px;
                height: 75px;
                border-radius: 20px;
                margin-bottom: 14px;
            }

            .illustration h1 {
                font-size: 27px;
            }

            .illustration p {
                font-size: 10px;
                max-width: 300px;
            }

            .tagline {
                margin-top: 15px;
                font-size: 9px;
            }

            .form-section {
                padding: 28px 22px 35px;
            }

            .form-container h2 {
                font-size: 23px;
            }

            .subtitle {
                font-size: 10px;
                margin-bottom: 21px;
            }
        }

        @media (max-width: 380px) {
            .illustration {
                min-height: 240px;
            }

            .form-section {
                padding: 24px 18px 30px;
            }
        }
    </style>
</head>

<body>

<div class="container">

    <!-- LEFT -->

    <section class="illustration">
        <div class="circle-one"></div>
        <div class="circle-two"></div>

        <div class="illustration-content">
            <img
                src="{{ asset('images/logo-sapa.jpeg') }}"
                alt="Logo SAPA"
                class="logo-large"
            >

            <h1>SAPA</h1>

            <p>
                Bergabung dengan sistem aspirasi dan
                pengaduan akademik SMK Budi Bakti Ciwidey.
            </p>

            <div class="tagline">
                Sampaikan Aspirasi, Wujudkan Solusi
            </div>
        </div>
    </section>

    <!-- RIGHT -->

    <section class="form-section">
        <div class="form-container">

            <h2>Buat Akun</h2>

            <p class="subtitle">
                Daftarkan akun kamu untuk mulai menggunakan SAPA.
            </p>

            @if ($errors->any())
                <div class="alert">
                    @foreach ($errors->all() as $error)
                        <div>• {{ $error }}</div>
                    @endforeach
                </div>
            @endif

            @if (session('error'))
                <div class="alert">
                    {{ session('error') }}
                </div>
            @endif

            <form
                action="{{ route('register.process') }}"
                method="POST"
            >
                @csrf

                <!-- NAMA -->

                <div class="input-group">
                    <label for="name">Nama Lengkap</label>

                    <div class="input-box">
                        <span class="input-icon"></span>

                        <input
                            type="text"
                            id="name"
                            name="name"
                            value="{{ old('name') }}"
                            placeholder="Masukkan nama lengkap"
                            maxlength="255"
                            autocomplete="name"
                            required
                        >
                    </div>
                </div>

                <!-- EMAIL -->

                <div class="input-group">
                    <label for="email">Email</label>

                    <div class="input-box">
                        <span class="input-icon"></span>

                        <input
                            type="email"
                            id="email"
                            name="email"
                            value="{{ old('email') }}"
                            placeholder="Masukkan email"
                            maxlength="255"
                            autocomplete="email"
                            required
                        >
                    </div>
                </div>

                <!-- NOMOR HP -->

                <div class="input-group">
                    <label for="phone_number">Nomor HP</label>

                    <div class="input-box">
                        <span class="input-icon"></span>

                        <input
                            type="tel"
                            id="phone_number"
                            name="phone_number"
                            value="{{ old('phone_number') }}"
                            placeholder="Contoh: 081234567890"
                            autocomplete="tel"
                            required
                        >
                    </div>
                </div>

                <!-- NIS -->

                <div class="input-group">
                    <label for="nis">NIS</label>

                    <div class="input-box">
                        <span class="input-icon"></span>

                        <input
                            type="text"
                            id="nis"
                            name="nis"
                            value="{{ old('nis') }}"
                            placeholder="Masukkan NIS"
                            maxlength="20"
                            required
                        >
                    </div>
                </div>

                <!-- TINGKAT KELAS -->

                <div class="input-group">
                    <label for="tingkat_kelas">Tingkat Kelas</label>

                    <div class="input-box">
                        <span class="input-icon"></span>

                        <select
                            id="tingkat_kelas"
                            name="tingkat_kelas"
                            required
                        >
                            <option value="">Pilih tingkat kelas</option>

                            <option
                                value="10"
                                {{ old('tingkat_kelas') == '10' ? 'selected' : '' }}
                            >
                                Kelas 10
                            </option>

                            <option
                                value="11"
                                {{ old('tingkat_kelas') == '11' ? 'selected' : '' }}
                            >
                                Kelas 11
                            </option>

                            <option
                                value="12"
                                {{ old('tingkat_kelas') == '12' ? 'selected' : '' }}
                            >
                                Kelas 12
                            </option>
                        </select>
                    </div>
                </div>

                <!-- JURUSAN -->

                <div class="input-group">
                    <label for="jurusan">Jurusan</label>

                    <div class="input-box">
                        <span class="input-icon"></span>

                        <select id="jurusan" name="jurusan" required>
                            <option value="">Pilih jurusan</option>

                            <option
                                value="BRP"
                                {{ old('jurusan') == 'BRP' ? 'selected' : '' }}
                            >
                                BRP
                            </option>

                            <option
                                value="DKV"
                                {{ old('jurusan') == 'DKV' ? 'selected' : '' }}
                            >
                                DKV
                            </option>

                            <option
                                value="RPL"
                                {{ old('jurusan') == 'RPL' ? 'selected' : '' }}
                            >
                                RPL
                            </option>
                        </select>
                    </div>
                </div>

                <!-- NOMOR ROMBEL -->

                <div class="input-group">
                    <label for="nomor_kelas">Nomor Kelas</label>

                    <div class="input-box">
                        <span class="input-icon"></span>

                        <input
                            type="number"
                            id="nomor_kelas"
                            name="nomor_kelas"
                            value="{{ old('nomor_kelas') }}"
                            placeholder="Contoh: 2"
                            min="1"
                            max="99"
                            step="1"
                            required
                        >
                    </div>
                </div>

                <!-- PASSWORD -->

                <div class="input-group">
                    <label for="password">Password</label>

                    <div class="input-box">
                        <span class="input-icon"></span>

                        <input
                            type="password"
                            name="password"
                            id="password"
                            placeholder="Minimal 8 karakter"
                            autocomplete="new-password"
                            required
                        >

                        <button
                            type="button"
                            class="password-eye"
                            onclick="togglePassword('password', 'eyePassword')"
                            id="eyePassword"
                            aria-label="Tampilkan password"
                        >
                            👁
                        </button>
                    </div>
                </div>

                <!-- KONFIRMASI PASSWORD -->

                <div class="input-group">
                    <label for="password_confirmation">
                        Konfirmasi Password
                    </label>

                    <div class="input-box">
                        <span class="input-icon"></span>

                        <input
                            type="password"
                            name="password_confirmation"
                            id="password_confirmation"
                            placeholder="Ulangi password"
                            autocomplete="new-password"
                            required
                        >

                        <button
                            type="button"
                            class="password-eye"
                            onclick="togglePassword('password_confirmation', 'eyeConfirmation')"
                            id="eyeConfirmation"
                            aria-label="Tampilkan konfirmasi password"
                        >
                            👁
                        </button>
                    </div>
                </div>

                <button type="submit" class="register-button">
                    Daftar Sekarang
                </button>

            </form>

            <div class="login-text">
                Sudah memiliki akun?
                <a href="{{ route('login') }}">Masuk di sini</a>
            </div>

            <div class="footer">
                © {{ date('Y') }} SAPA —
                SMK Budi Bakti Ciwidey
            </div>

        </div>
    </section>

</div>

<script>
function togglePassword(inputId, buttonId) {
    const input = document.getElementById(inputId);
    const button = document.getElementById(buttonId);

    if (input.type === 'password') {
        input.type = 'text';
        button.textContent = '🙈';
        button.setAttribute('aria-label', 'Sembunyikan password');
    } else {
        input.type = 'password';
        button.textContent = '👁';
        button.setAttribute('aria-label', 'Tampilkan password');
    }
}
</script>

</body>
</html>
