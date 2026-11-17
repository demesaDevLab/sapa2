<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Buat Pengaduan - SAPA</title>

    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background: #f6f7ff;
            color: #505474;
        }

        /* =========================
           SIDEBAR
        ========================= */

        .sidebar {
            position: fixed;
            left: 0;
            top: 0;
            width: 245px;
            height: 100vh;
            background: #ffffff;
            border-right: 1px solid #eceef8;
            padding: 25px 18px;
            z-index: 100;
        }

        .logo-area {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 0 8px;
            margin-bottom: 35px;
        }

        .logo {
            width: 48px;
            height: 48px;
            object-fit: cover;
            border-radius: 14px;
        }

        .logo-text h2 {
            font-size: 18px;
            color: #555f9d;
        }

        .logo-text p {
            font-size: 9px;
            color: #a3a6ba;
            margin-top: 3px;
        }

        .menu-title {
            font-size: 10px;
            font-weight: bold;
            color: #b0b3c5;
            margin: 0 10px 10px;
            text-transform: uppercase;
        }

        .menu {
            display: flex;
            flex-direction: column;
            gap: 6px;
        }

        .menu a {
            display: flex;
            align-items: center;
            gap: 12px;
            text-decoration: none;
            color: #8589a3;
            padding: 12px 13px;
            border-radius: 12px;
            font-size: 12px;
        }

        .menu a:hover,
        .menu a.active {
            background: #eef0ff;
            color: #6675ca;
        }

        .menu-icon {
            width: 24px;
            text-align: center;
            font-size: 15px;
        }

        /* =========================
           LOGOUT
        ========================= */

        .logout-area {
            position: absolute;
            left: 18px;
            right: 18px;
            bottom: 25px;
        }

        .logout-button {
            width: 100%;
            border: none;
            background: #fff0f2;
            color: #c87887;
            padding: 12px;
            border-radius: 12px;
            cursor: pointer;
            font-size: 12px;
        }

        .logout-button:hover {
            background: #ffe5e8;
        }

        /* =========================
           MAIN
        ========================= */

        .main {
            margin-left: 245px;
            min-height: 100vh;
            padding: 30px;
        }

        /* =========================
           TOPBAR
        ========================= */

        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 28px;
        }

        .welcome h1 {
            font-size: 25px;
            color: #4d578f;
            margin-bottom: 7px;
        }

        .welcome p {
            font-size: 12px;
            color: #989caf;
        }

        /* =========================
           BACK BUTTON
        ========================= */

        .back-button {
            text-decoration: none;
            background: #ffffff;
            border: 1px solid #eceef8;
            color: #7f84a1;
            padding: 10px 15px;
            border-radius: 12px;
            font-size: 11px;
        }

        .back-button:hover {
            background: #eef0ff;
            color: #6675ca;
        }

        /* =========================
           FORM CARD
        ========================= */

        .form-card {
            background: #ffffff;
            border: 1px solid #eceef8;
            border-radius: 20px;
            padding: 25px;
            max-width: 100%;
        }

        /* =========================
           INFO BOX
        ========================= */

        .info-box {
            background: linear-gradient(
                135deg,
                #e9edff,
                #f5f1ff
            );

            border-radius: 16px;
            padding: 17px 18px;
            margin-bottom: 23px;
            border: 1px solid #e4e7fa;
        }

        .info-box p {
            font-size: 11px;
            color: #8589a3;
            line-height: 1.7;
        }

        .info-box strong {
            color: #5864a2;
        }

        /* =========================
           FORM
        ========================= */

        .form-group {
            margin-bottom: 18px;
        }

        .form-group label {
            display: block;
            font-size: 11px;
            font-weight: bold;
            color: #555b8e;
            margin-bottom: 7px;
        }

        .required {
            color: #c87887;
        }

        .form-control {
            width: 100%;
            border: 1px solid #e3e5f2;
            background: #ffffff;
            color: #666b86;
            padding: 12px 13px;
            border-radius: 11px;
            outline: none;
            font-size: 11px;
        }

        .form-control:focus {
            border-color: #8998df;
            box-shadow: 0 0 0 3px #eef0ff;
        }

        .form-control:disabled {
            background: #fafaff;
            color: #8589a3;
            cursor: not-allowed;
        }

        textarea.form-control {
            min-height: 130px;
            resize: vertical;
            line-height: 1.6;
        }

        select.form-control {
            cursor: pointer;
        }

        .form-help {
            margin-top: 5px;
            font-size: 9px;
            color: #a3a6ba;
        }

        /* =========================
           TWO COLUMN
        ========================= */

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 16px;
        }

        /* =========================
           FILE
        ========================= */

        .file-input {
            padding: 10px;
            background: #fafaff;
        }

        /* =========================
           ERROR
        ========================= */

        .error-box {
            background: #fff0f2;
            border: 1px solid #ffd8dd;
            color: #bd6e7d;
            border-radius: 12px;
            padding: 13px 15px;
            margin-bottom: 20px;
            font-size: 10px;
            line-height: 1.6;
        }

        .error-box ul {
            margin-left: 17px;
        }

        /* =========================
           BUTTON
        ========================= */

        .form-actions {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
            margin-top: 25px;
            padding-top: 20px;
            border-top: 1px solid #eff0f7;
        }

        .cancel-button {
            text-decoration: none;
            background: #f4f5fb;
            color: #8589a3;
            padding: 11px 17px;
            border-radius: 10px;
            font-size: 10px;
        }

        .cancel-button:hover {
            background: #eceef8;
        }

        .submit-button {
            border: none;
            background: #8998df;
            color: #ffffff;
            padding: 11px 18px;
            border-radius: 10px;
            font-size: 10px;
            font-weight: bold;
            cursor: pointer;
        }

        .submit-button:hover {
            background: #7788d5;
        }

        /* =========================
           MOBILE
        ========================= */

        @media (max-width: 800px) {

            .sidebar {
                width: 70px;
                padding: 20px 10px;
            }

            .logo-area {
                justify-content: center;
                padding: 0;
            }

            .logo-text,
            .menu-title,
            .menu a span,
            .logout-button {
                display: none;
            }

            .menu a {
                justify-content: center;
                padding: 13px 5px;
            }

            .menu-icon {
                font-size: 17px;
            }

            .logout-area {
                left: 10px;
                right: 10px;
            }

            .main {
                margin-left: 70px;
                padding: 20px;
            }

            .topbar {
                align-items: flex-start;
            }

            .form-row {
                grid-template-columns: 1fr;
                gap: 0;
            }
        }

        @media (max-width: 500px) {

            .main {
                padding: 15px;
            }

            .welcome h1 {
                font-size: 21px;
            }

            .form-card {
                padding: 18px;
            }

            .form-actions {
                flex-direction: column;
            }

            .cancel-button,
            .submit-button {
                width: 100%;
                text-align: center;
            }

        }
        .breadcrumb {
    display: flex;
    align-items: center;
    gap: 8px;
    font-size: 11px;
    color: #989caf;
    margin-bottom: 18px;
}

.breadcrumb a {
    color: #8998df;
    text-decoration: none;
}

.breadcrumb a:hover {
    text-decoration: underline;
}

    </style>

</head>


<body>


    <!-- =========================
         SIDEBAR
    ========================= -->

    <aside class="sidebar">

        <div class="logo-area">

            <img
                src="{{ asset('images/logo-sapa.jpeg') }}"
                alt="Logo SAPA"
                class="logo"
            >

            <div class="logo-text">

                <h2>SAPA</h2>

                <p>
                    Sampaikan Aspirasi, Wujudkan Solusi
                </p>

            </div>

        </div>


        <div class="menu-title">
            Menu Utama
        </div>


        <nav class="menu">

            <!-- DASHBOARD -->

            <a href="{{ route('dashboard') }}">

                <div class="menu-icon">
                    🏠
                </div>

                <span>
                    Dashboard
                </span>

            </a>


            <!-- BUAT PENGADUAN -->

            <a
                href="{{ route('pengaduan.create') }}"
                class="active"
            >

                <div class="menu-icon">
                    📝
                </div>

                <span>
                    Buat Pengaduan
                </span>

            </a>


            <!-- RIWAYAT -->

            <a href="{{ route('pengaduan.riwayat') }}">

                <div class="menu-icon">
                    🕐
                </div>

                <span>
                    Riwayat Pengaduan
                </span>

            </a>

        </nav>


        <!-- LOGOUT -->

        <div class="logout-area">

            <form
                action="{{ route('logout') }}"
                method="POST"
            >

                @csrf

                <button
                    type="submit"
                    class="logout-button"
                >
                    Keluar
                </button>

            </form>

        </div>

    </aside>


    <main class="main">

    <!-- BREADCRUMBS -->

    <div class="breadcrumb">
        <a href="{{ route('dashboard') }}">Dashboard</a>
        <span>›</span>
        <span>Buat Pengaduan</span>
    </div>

    <!-- TOPBAR -->

    <div class="topbar">

        <div class="welcome">

            <h1>
                Buat Pengaduan
            </h1>

            <p>
                Sampaikan aspirasi atau pengaduan kamu kepada sekolah.
            </p>

        </div>

        <a
            href="{{ route('dashboard') }}"
            class="back-button"
        >
            ← Kembali
        </a>

    </div>


        <!-- =========================
             FORM CARD
        ========================= -->

        <div class="form-card">


            <!-- INFO -->

            <div class="info-box">

                <p>

                    <strong>Perhatian:</strong>
                    Silakan isi pengaduan dengan jelas dan sesuai dengan kondisi
                    yang sebenarnya. Setelah dikirim, kamu akan mendapatkan
                    nomor tiket untuk memantau proses pengaduan.

                </p>

            </div>


            <!-- ERROR -->

            @if ($errors->any())

                <div class="error-box">

                    <strong>
                        Ada data yang perlu diperbaiki:
                    </strong>

                    <ul>

                        @foreach ($errors->all() as $error)

                            <li>
                                {{ $error }}
                            </li>

                        @endforeach

                    </ul>

                </div>

            @endif


            <!-- FORM -->

            <form
                action="{{ route('pengaduan.store') }}"
                method="POST"
                enctype="multipart/form-data"
            >

                @csrf


                <!-- NAMA + NIS -->

                <div class="form-row">

                    <div class="form-group">

                        <label>
                            Nama Pelapor
                        </label>

                        <input
                            type="text"
                            class="form-control"
                            value="{{ Auth::user()->name }}"
                            disabled
                        >

                    </div>


                    <div class="form-group">

                        <label>
                            NIS
                        </label>

                        <input
                            type="text"
                            class="form-control"
                            value="{{ $siswa->nis ?? '-' }}"
                            disabled
                        >

                    </div>

                </div>


                <!-- KELAS + KATEGORI -->

                <div class="form-row">

                    <div class="form-group">

                        <label>
                            Kelas
                        </label>

                        <input
                            type="text"
                            class="form-control"
                            value="{{ $siswa->kelas ?? '-' }}"
                            disabled
                        >

                    </div>


                    <div class="form-group">

                        <label>
                            Kategori Pengaduan
                            <span class="required">*</span>
                        </label>

                        <select
                            name="kategori_id"
                            class="form-control"
                            required
                        >

                            <option value="">
                                Pilih kategori pengaduan
                            </option>

                            @foreach ($kategori as $item)

                                <option
                                    value="{{ $item->id }}"
                                    {{ old('kategori_id') == $item->id ? 'selected' : '' }}
                                >
                                    {{ $item->nama_kategori }}
                                </option>

                            @endforeach

                        </select>

                    </div>

                </div>


                <!-- JUDUL -->

                <div class="form-group">

                    <label>
                        Judul Pengaduan
                        <span class="required">*</span>
                    </label>

                    <input
                        type="text"
                        name="judul"
                        class="form-control"
                        value="{{ old('judul') }}"
                        placeholder="Contoh: Fasilitas toilet sekolah perlu diperbaiki"
                        required
                    >

                </div>


                <!-- ISI -->

                <div class="form-group">

                    <label>
                        Isi Pengaduan
                        <span class="required">*</span>
                    </label>

                    <textarea
                        name="isi_pengaduan"
                        class="form-control"
                        placeholder="Tuliskan pengaduan atau aspirasi kamu secara jelas..."
                        required
                    >{{ old('isi_pengaduan') }}</textarea>

                    <div class="form-help">
                        Jelaskan pengaduan secara jelas agar pihak sekolah dapat memahami masalahnya.
                    </div>

                </div>


                <!-- LAMPIRAN -->

                <div class="form-group">

                    <label>
                        Lampiran
                        <span style="font-weight: normal;">
                            (Opsional)
                        </span>
                    </label>

                    <input
                        type="file"
                        name="lampiran"
                        class="form-control file-input"
                    >

                    <div class="form-help">
                        Kamu dapat melampirkan foto atau bukti pendukung jika diperlukan.
                    </div>

                </div>


                <!-- BUTTON -->

                <div class="form-actions">

                    <a
                        href="{{ route('dashboard') }}"
                        class="cancel-button"
                    >
                        Batal
                    </a>


                    <button
                        type="submit"
                        class="submit-button"
                    >
                        📤 Kirim Pengaduan
                    </button>

                </div>

            </form>


        </div>📤


    </main>


</body>
<script>
</script>
</html>
