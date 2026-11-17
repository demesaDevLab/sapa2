<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard Guru Pemantau - SAPA</title>

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

        /* SIDEBAR */

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
            position: relative;
            z-index: 101;
            cursor: pointer;
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

        .logout-button:hover {
            background: #ffe3e8;
        }

        /* MAIN */

        .main {
            margin-left: 245px;
            min-height: 100vh;
            padding: 30px;
        }

        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
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
            line-height: 1.6;
        }

        /* PROFIL */

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
            transition: background 0.2s, border-color 0.2s;
        }

        .profile:hover {
            background: #f5f6ff;
            border-color: #cfd4f5;
        }

        .profile:focus-visible {
            outline: 2px solid #6877c7;
            outline-offset: 3px;
        }

        .profile-icon {
            width: 34px;
            height: 34px;
            flex-shrink: 0;
            border-radius: 50%;
            background: #e9edff;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #6877c7;
            font-weight: bold;
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

        .profile-arrow {
            color: #929acb;
            font-size: 16px;
            margin-left: 5px;
        }

        /* INFO */

        .info-box {
            background: linear-gradient(135deg, #e9edff, #f5f1ff);
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

        /* TABEL PENGADUAN */

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
            gap: 12px;
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
            line-height: 1.6;
        }

        .badge-total {
            background: #eef0ff;
            color: #6877c7;
            padding: 7px 12px;
            border-radius: 20px;
            font-size: 10px;
            font-weight: bold;
            white-space: nowrap;
        }

        .table-wrapper {
            width: 100%;
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 850px;
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

        .student-name {
            font-weight: bold;
            color: #5d6280;
            margin-bottom: 3px;
        }

        .student-info {
            color: #a1a4b5;
            font-size: 9px;
        }

        /* STATUS */

        .status {
            display: inline-block;
            padding: 6px 10px;
            border-radius: 20px;
            font-size: 9px;
            font-weight: bold;
            white-space: nowrap;
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

        /* DETAIL */

        .detail-button {
            display: inline-block;
            text-decoration: none;
            background: #8998df;
            color: white;
            padding: 8px 12px;
            border-radius: 9px;
            font-size: 10px;
            text-align: center;
            white-space: nowrap;
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

        /* RESPONSIVE */

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
                align-items: center;
                gap: 10px;
            }

            .profile {
                display: flex;
                align-items: center;
                gap: 8px;
                padding: 8px 10px;
                flex-shrink: 0;
            }

            .profile-icon {
                width: 30px;
                height: 30px;
            }

            .profile-name {
                font-size: 11px;
            }

            .profile-role {
                font-size: 9px;
            }

            .profile-arrow {
                margin-left: 0;
            }
        }

        @media (max-width: 500px) {

            .main {
                padding: 15px;
            }

            .welcome h1 {
                font-size: 21px;
            }

            .info-box {
                padding: 18px;
            }

            .table-header {
                align-items: flex-start;
                flex-direction: column;
            }

            .topbar {
                flex-wrap: wrap;
                align-items: flex-start;
            }

            .profile {
                max-width: 100%;
                margin-left: auto;
            }
        }
    </style>
</head>

<body>

    <!-- SIDEBAR -->

    <aside class="sidebar">

        <div class="logo-area">

            <img
                src="{{ asset('images/logo-sapa.jpeg') }}"
                alt="Logo SAPA"
                class="logo"
            >

            <div class="logo-text">
                <h2>SAPA</h2>
                <p>Sampaikan Aspirasi, Wujudkan Solusi</p>
            </div>

        </div>

        <div class="menu-title">
            Menu Utama
        </div>

        <nav class="menu">

            <a href="{{ route('guru_pemantau.dashboard') }}" class="active">
                <div class="menu-icon">🏠</div>
                <span>Dashboard</span>
            </a>

            <a href="{{ route('guru_pemantau.pengaduan') }}">
                <div class="menu-icon">📋</div>
                <span>Pantau Pengaduan</span>
            </a>

        </nav>

        <div class="logout-area">

            <form action="{{ route('logout') }}" method="POST">
                @csrf

                <button type="submit" class="logout-button">
                    Keluar
                </button>
            </form>

        </div>

    </aside>

    <!-- MAIN CONTENT -->

    <main class="main">

        <div class="topbar">

            <div class="welcome">

                <h1>Dashboard Guru Pemantau</h1>

                <p>
                    Pantau perkembangan aspirasi dan pengaduan siswa di sekolah.
                </p>

            </div>

            <a href="{{ route('profil') }}" class="profile">

                <div class="profile-icon">
                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                </div>

                <div>
                    <div class="profile-name">
                        {{ Auth::user()->name }}
                    </div>

                    <div class="profile-role">
                        Guru Pemantau
                    </div>
                </div>

                <span class="profile-arrow">›</span>

            </a>

        </div>

        <!-- INFO -->

        <section class="info-box">

            <h2>Selamat Datang di SAPA</h2>

            <p>
                Halo, Guru Pemantau! Selamat datang di dashboard SAPA.
                Melalui halaman ini, Anda dapat memantau seluruh aspirasi
                dan pengaduan siswa, melihat perkembangan status penanganan,
                serta membaca detail, riwayat, dan tanggapan pengaduan.
                Terima kasih telah membantu memastikan setiap aspirasi
                siswa mendapatkan perhatian yang semestinya.
            </p>

        </section>

        <!-- DATA PENGADUAN -->

        <section id="pengaduan">

            <div class="table-card">

                <div class="table-header">

                    <div>
                        <h2>Pengaduan Siswa</h2>

                        <p>
                            Daftar aspirasi dan pengaduan siswa yang masuk
                            ke sistem SAPA.
                        </p>
                    </div>

                    <div class="badge-total">
                        {{ $pengaduan->count() }} Pengaduan
                    </div>

                </div>

                @if ($pengaduan->count() > 0)

                    <div class="table-wrapper">

                        <table>

                            <thead>
                                <tr>
                                    <th>Tiket</th>
                                    <th>Siswa</th>
                                    <th>Kategori</th>
                                    <th>Judul Pengaduan</th>
                                    <th>Tanggal</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>

                            <tbody>

                                @foreach ($pengaduan as $item)

                                    <tr>

                                        <td>
                                            <div class="ticket">
                                                {{ $item->nomor_tiket }}
                                            </div>
                                        </td>

                                        <td>
                                            <div class="student-name">
                                                {{ $item->nama_siswa }}
                                            </div>

                                            <div class="student-info">
                                                {{ $item->nis }} · {{ $item->kelas }}
                                            </div>
                                        </td>

                                        <td>
                                            {{ $item->nama_kategori }}
                                        </td>

                                        <td>
                                            {{ $item->judul }}
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
                                                href="{{ route('guru_pemantau.pengaduan.detail', $item->id) }}"
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

                        <div style="font-size: 30px; margin-bottom: 10px;">
                            📭
                        </div>

                        Belum ada pengaduan siswa yang masuk.

                    </div>

                @endif

            </div>

        </section>

    </main>

</body>
</html>