<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard Siswa - SAPA</title>

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
           PROFILE
        ========================= */

        .profile {
            display: flex;

            align-items: center;

            gap: 10px;

            background: #ffffff;

            padding: 9px 14px;

            border-radius: 14px;

            border: 1px solid #eceef8;

            text-decoration: none;

            cursor: pointer;

            transition: 0.2s ease;

            color: inherit;
        }

        .profile:hover {
            background: #f7f8ff;

            border-color: #dfe3f7;

            transform: translateY(-1px);
        }

        .profile:active {
            transform: translateY(0);
        }

        .profile-icon {
            width: 34px;
            height: 34px;

            border-radius: 50%;

            background: #e9edff;

            display: flex;

            justify-content: center;
            align-items: center;

            color: #6877c7;

            font-weight: bold;

            flex-shrink: 0;
        }

        .profile-name {
            font-size: 12px;

            font-weight: bold;

            color: #555a7e;
        }

        .profile-role {
            font-size: 9px;

            color: #a3a6ba;

            margin-top: 2px;
        }


        /* =========================
           INFO BOX
        ========================= */

        .info-box {
            background:
                linear-gradient(
                    135deg,
                    #e9edff,
                    #f5f1ff
                );

            border-radius: 20px;

            padding: 23px;

            margin-bottom: 25px;

            border: 1px solid #e4e7fa;
        }

        .info-box h2 {
            color: #5864a2;

            font-size: 17px;

            margin-bottom: 7px;
        }

        .info-box p {
            color: #8589a3;

            font-size: 11px;

            line-height: 1.7;

            max-width: 700px;
        }


        /* =========================
           STATISTICS
        ========================= */

        .section-title {
            font-size: 16px;

            color: #555b8e;

            margin-bottom: 15px;
        }

        .stats {
            display: grid;

            grid-template-columns: repeat(5, 1fr);

            gap: 14px;

            margin-bottom: 30px;
        }

        .stat-card {
            background: #ffffff;

            border: 1px solid #eceef8;

            border-radius: 17px;

            padding: 18px;
        }

        .stat-icon {
            width: 37px;
            height: 37px;

            border-radius: 12px;

            display: flex;

            align-items: center;
            justify-content: center;

            font-size: 16px;

            margin-bottom: 13px;
        }

        .blue {
            background: #e9edff;
            color: #6978ca;
        }

        .yellow {
            background: #fff5db;
            color: #c59a48;
        }

        .purple {
            background: #f1eaff;
            color: #8b6ec7;
        }

        .green {
            background: #e7f8ee;
            color: #62a97e;
        }

        .red {
            background: #ffe9eb;
            color: #c87887;
        }

        .stat-number {
            font-size: 25px;

            font-weight: bold;

            color: #4f577f;
        }

        .stat-label {
            font-size: 10px;

            color: #999db1;

            margin-top: 4px;
        }


        /* =========================
           ACTION
        ========================= */

        .action-card {
            background: #ffffff;

            border: 1px solid #eceef8;

            border-radius: 20px;

            padding: 22px;

            margin-bottom: 25px;

            display: flex;

            justify-content: space-between;

            align-items: center;

            gap: 20px;
        }

        .action-card h2 {
            color: #555b8e;

            font-size: 16px;

            margin-bottom: 6px;
        }

        .action-card p {
            color: #999db1;

            font-size: 11px;
        }

        .btn-primary {
            display: inline-block;

            text-decoration: none;

            background: #8998df;

            color: #ffffff;

            padding: 11px 17px;

            border-radius: 11px;

            font-size: 11px;

            font-weight: bold;

            white-space: nowrap;
        }

        .btn-primary:hover {
            background: #7788d5;
        }


        /* =========================
           TABLE
        ========================= */

        .table-card {
            background: #ffffff;

            border: 1px solid #eceef8;

            border-radius: 20px;

            overflow: hidden;
        }

        .table-header {
            padding: 20px;

            display: flex;

            justify-content: space-between;

            align-items: center;

            border-bottom: 1px solid #eff0f7;
        }

        .table-header h2 {
            font-size: 16px;

            color: #555b8e;
        }

        .table-header p {
            font-size: 10px;

            color: #a0a3b5;

            margin-top: 4px;
        }

        .badge-total {
            background: #eef0ff;

            color: #6877c7;

            padding: 7px 12px;

            border-radius: 20px;

            font-size: 10px;

            font-weight: bold;
        }

        .table-wrapper {
            width: 100%;

            overflow-x: auto;
        }

        table {
            width: 100%;

            border-collapse: collapse;

            min-width: 750px;
        }

        th {
            text-align: left;

            padding: 13px 17px;

            background: #fafaff;

            color: #8589a3;

            font-size: 10px;

            font-weight: bold;
        }

        td {
            padding: 15px 17px;

            border-top: 1px solid #f0f1f7;

            color: #696d87;

            font-size: 11px;
        }

        .ticket {
            color: #6877c7;

            font-weight: bold;
        }

        .status {
            display: inline-block;

            padding: 6px 10px;

            border-radius: 20px;

            font-size: 9px;

            font-weight: bold;
        }

        .status-menunggu {
            background: #fff5dc;

            color: #bd9449;
        }

        .status-diproses {
            background: #eeeaff;

            color: #8168bd;
        }

        .status-selesai {
            background: #e6f7ed;

            color: #5c9c76;
        }

        .status-ditolak {
            background: #ffe8eb;

            color: #bd6e7d;
        }

        .detail-button {
            display: inline-block;

            text-decoration: none;

            background: #8998df;

            color: white;

            padding: 7px 11px;

            border-radius: 9px;

            font-size: 9px;
        }

        .detail-button:hover {
            background: #7788d5;
        }

        .empty {
            text-align: center;

            padding: 45px 20px;

            color: #a3a6b8;

            font-size: 12px;
        }


        /* =========================
           MOBILE
        ========================= */

        @media (max-width: 1100px) {

            .stats {
                grid-template-columns: repeat(3, 1fr);
            }

        }


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

            .stats {
                grid-template-columns: repeat(2, 1fr);
            }

            /*
             * Profil tetap bisa digunakan.
             * Kita tidak menyembunyikan profil,
             * hanya menyesuaikan ukurannya.
             */

            .profile {
                padding: 7px 10px;
            }

            .profile-name {
                font-size: 11px;
            }

            .profile-role {
                font-size: 8px;
            }

        }


        @media (max-width: 500px) {

            .main {
                padding: 15px;
            }

            .welcome h1 {
                font-size: 21px;
            }

            .stats {
                grid-template-columns: 1fr;
            }

            .info-box {
                padding: 18px;
            }

            .action-card {
                flex-direction: column;

                align-items: flex-start;
            }

            .btn-primary {
                width: 100%;

                text-align: center;
            }

            .topbar {
                align-items: flex-start;

                gap: 12px;
            }

            .profile {
                padding: 6px 8px;
            }

            .profile-icon {
                width: 32px;
                height: 32px;
            }

            .profile-name {
                font-size: 10px;
            }

            .profile-role {
                font-size: 8px;
            }

        }

    </style>

</head>


<body>


    {{-- =========================
         SIDEBAR
    ========================== --}}

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

            <a
                href="{{ route('dashboard') }}"
                class="active"
            >

                <div class="menu-icon">
                    🏠
                </div>

                <span>
                    Dashboard
                </span>

            </a>


            <a href="{{ route('pengaduan.create') }}">

                <div class="menu-icon">
                    📝
                </div>

                <span>
                    Buat Pengaduan
                </span>

            </a>


            <a href="{{ route('pengaduan.riwayat') }}">

                <div class="menu-icon">
                    📋
                </div>

                <span>
                    Riwayat Pengaduan
                </span>

            </a>

        </nav>


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


    {{-- =========================
         MAIN
    ========================== --}}

    <main class="main">


        {{-- TOPBAR --}}

        <div class="topbar">

            <div class="welcome">

                <h1>
                    Dashboard Siswa
                </h1>

                <p>
                    Pantau aspirasi dan pengaduanmu melalui SAPA.
                </p>

            </div>


            {{-- =========================
                 PROFILE YANG BISA DIKLIK
            ========================== --}}

            <a
                href="{{ route('profil') }}"
                class="profile"
                aria-label="Buka profil {{ $user->name }}"
            >

                <div class="profile-icon">

                    {{ strtoupper(substr($user->name, 0, 1)) }}

                </div>


                <div>

                    <div class="profile-name">
                        {{ $user->name }}
                    </div>

                    <div class="profile-role">
                        Siswa
                    </div>

                </div>

            </a>


        </div>


        {{-- INFO --}}

        <section class="info-box">

            <h2>
                Halo, {{ $user->name }}
            </h2>

            <p>

                Sampaikan aspirasi atau pengaduan terkait
                pembelajaran, fasilitas, maupun pelayanan sekolah.
                Kamu dapat memantau proses pengaduanmu melalui
                dashboard ini.

            </p>

        </section>


        {{-- =========================
             STATISTIK
        ========================== --}}

        <section>

            <h2 class="section-title">
                Ringkasan Pengaduan
            </h2>


            <div class="stats">


                {{-- TOTAL --}}

                <div class="stat-card">

                    <div class="stat-icon blue">
                        📋
                    </div>

                    <div class="stat-number">
                        {{ $totalPengaduan }}
                    </div>

                    <div class="stat-label">
                        Total Pengaduan
                    </div>

                </div>


                {{-- MENUNGGU --}}

                <div class="stat-card">

                    <div class="stat-icon yellow">
                        ⏳
                    </div>

                    <div class="stat-number">
                        {{ $menunggu }}
                    </div>

                    <div class="stat-label">
                        Menunggu
                    </div>

                </div>


                {{-- DIPROSES --}}

                <div class="stat-card">

                    <div class="stat-icon purple">
                        ⚙️
                    </div>

                    <div class="stat-number">
                        {{ $diproses }}
                    </div>

                    <div class="stat-label">
                        Diproses
                    </div>

                </div>


                {{-- SELESAI --}}

                <div class="stat-card">

                    <div class="stat-icon green">
                        ✓
                    </div>

                    <div class="stat-number">
                        {{ $selesai }}
                    </div>

                    <div class="stat-label">
                        Selesai
                    </div>

                </div>


                {{-- DITOLAK --}}

                <div class="stat-card">

                    <div class="stat-icon red">
                        ×
                    </div>

                    <div class="stat-number">
                        {{ $ditolak }}
                    </div>

                    <div class="stat-label">
                        Ditolak
                    </div>

                </div>

            </div>

        </section>


        {{-- =========================
             BUAT PENGADUAN
        ========================== --}}

        <section class="action-card">

            <div>

                <h2>
                    Ada aspirasi atau pengaduan?
                </h2>

                <p>
                    Sampaikan pengaduanmu kepada pihak sekolah
                    melalui SAPA.
                </p>

            </div>


            <a
                href="{{ route('pengaduan.create') }}"
                class="btn-primary"
            >
                + Buat Pengaduan
            </a>

        </section>


        {{-- =========================
             PENGADUAN TERBARU
        ========================== --}}

        <section>

            <div class="table-card">

                <div class="table-header">

                    <div>

                        <h2>
                            Pengaduan Terbaru
                        </h2>

                        <p>
                            Daftar pengaduan yang kamu kirim.
                        </p>

                    </div>


                    <div class="badge-total">

                        {{ $totalPengaduan }}
                        Pengaduan

                    </div>

                </div>


                @if ($pengaduanTerbaru->count() > 0)

                    <div class="table-wrapper">

                        <table>

                            <thead>

                                <tr>

                                    <th>
                                        Tiket
                                    </th>

                                    <th>
                                        Judul
                                    </th>

                                    <th>
                                        Kategori
                                    </th>

                                    <th>
                                        Tanggal
                                    </th>

                                    <th>
                                        Status
                                    </th>

                                    <th>
                                        Aksi
                                    </th>

                                </tr>

                            </thead>


                            <tbody>

                                @foreach ($pengaduanTerbaru as $item)

                                    <tr>

                                        <td>

                                            <div class="ticket">
                                                {{ $item->nomor_tiket }}
                                            </div>

                                        </td>


                                        <td>
                                            {{ $item->judul }}
                                        </td>


                                        <td>
                                            {{ $item->nama_kategori }}
                                        </td>


                                        <td>
                                            {{ date('d/m/Y', strtotime($item->tanggal_pengaduan)) }}
                                        </td>


                                        <td>

                                            @if ($item->nama_status === 'Menunggu')

                                                <span class="status status-menunggu">
                                                    Menunggu
                                                </span>

                                            @elseif ($item->nama_status === 'Diproses')

                                                <span class="status status-diproses">
                                                    Diproses
                                                </span>

                                            @elseif ($item->nama_status === 'Selesai')

                                                <span class="status status-selesai">
                                                    Selesai
                                                </span>

                                            @elseif ($item->nama_status === 'Ditolak')

                                                <span class="status status-ditolak">
                                                    Ditolak
                                                </span>

                                            @else

                                                <span class="status status-menunggu">
                                                    {{ $item->nama_status }}
                                                </span>

                                            @endif

                                        </td>


                                        <td>

                                            <a
                                                href="{{ route('pengaduan.detail', $item->id) }}"
                                                class="detail-button"
                                            >
                                                Lihat Detail
                                            </a>

                                        </td>

                                    </tr>

                                @endforeach

                            </tbody>

                        </table>

                    </div>

                @else

                    <div class="empty">

                        <div
                            style="
                                font-size: 30px;
                                margin-bottom: 10px;
                            "
                        >
                            📭
                        </div>

                        Belum ada pengaduan yang kamu kirim.

                    </div>

                @endif

            </div>

        </section>


    </main>


</body>

</html>
