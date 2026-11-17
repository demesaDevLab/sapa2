<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Detail Pengaduan - SAPA</title>

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

        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: 245px;
            height: 100vh;
            padding: 25px 18px;
            background: #fff;
            border-right: 1px solid #eceef8;
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
            margin-top: 3px;
            font-size: 9px;
            color: #a3a6ba;
        }

        .menu-title {
            margin: 0 10px 10px;
            font-size: 10px;
            font-weight: bold;
            color: #b0b3c5;
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
            padding: 12px 13px;
            border-radius: 12px;
            color: #8589a3;
            font-size: 12px;
            text-decoration: none;
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
            right: 18px;
            bottom: 25px;
            left: 18px;
        }

        .logout-button {
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 12px;
            background: #fff0f2;
            color: #c87887;
            font-size: 12px;
            cursor: pointer;
        }

        .main {
            min-height: 100vh;
            margin-left: 245px;
            padding: 30px;
        }

        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            margin-bottom: 25px;
        }

        .welcome h1 {
            margin-bottom: 7px;
            color: #4d578f;
            font-size: 25px;
        }

        .welcome p {
            color: #989caf;
            font-size: 12px;
            line-height: 1.6;
        }

        .profile {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 9px 14px;
            border: 1px solid #eceef8;
            border-radius: 14px;
            background: #fff;
        }

        .profile-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 34px;
            height: 34px;
            border-radius: 50%;
            background: #e9edff;
            color: #6877c7;
            font-weight: bold;
        }

        .profile-name {
            color: #555a7e;
            font-size: 12px;
            font-weight: bold;
        }

        .profile-role {
            margin-top: 3px;
            color: #a3a6ba;
            font-size: 9px;
        }

        .back-button {
            display: inline-block;
            margin-bottom: 20px;
            padding: 10px 14px;
            border-radius: 10px;
            background: #e9edff;
            color: #6675ca;
            font-size: 11px;
            text-decoration: none;
        }

        .back-button:hover {
            background: #dfe4ff;
        }

        .info-box {
            margin-bottom: 22px;
            padding: 22px;
            border: 1px solid #e4e7fa;
            border-radius: 18px;
            background: linear-gradient(135deg, #e9edff, #f5f1ff);
        }

        .info-box h2 {
            margin-bottom: 7px;
            color: #5864a2;
            font-size: 17px;
        }

        .info-box p {
            color: #8589a3;
            font-size: 11px;
            line-height: 1.7;
        }

        .card {
            margin-bottom: 22px;
            overflow: hidden;
            border: 1px solid #eceef8;
            border-radius: 18px;
            background: #fff;
        }

        .card-header {
            padding: 18px 20px;
            border-bottom: 1px solid #eff0f7;
            background: #fafaff;
        }

        .card-header h2 {
            color: #555b8e;
            font-size: 15px;
        }

        .card-body {
            padding: 20px;
        }

        .detail-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 20px;
        }

        .field {
            min-width: 0;
        }

        .field.full {
            grid-column: 1 / -1;
        }

        .label {
            margin-bottom: 7px;
            color: #999db1;
            font-size: 10px;
            font-weight: bold;
            text-transform: uppercase;
        }

        .value {
            color: #5d6280;
            font-size: 12px;
            line-height: 1.8;
            overflow-wrap: anywhere;
            white-space: pre-line;
        }

        .ticket {
            color: #6877c7;
            font-weight: bold;
        }

        .status {
            display: inline-block;
            padding: 7px 11px;
            border-radius: 20px;
            font-size: 10px;
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

        .attachment-list,
        .history-list,
        .response-list {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .attachment-item,
        .history-item,
        .response-item {
            padding: 14px;
            border: 1px solid #eff0f7;
            border-radius: 12px;
            background: #fcfcff;
        }

        .attachment-item a {
            color: #6877c7;
            font-size: 12px;
            text-decoration: none;
            overflow-wrap: anywhere;
        }

        .attachment-item a:hover {
            text-decoration: underline;
        }

        .item-title {
            margin-bottom: 5px;
            color: #5d6280;
            font-size: 12px;
            font-weight: bold;
        }

        .item-text {
            color: #8589a3;
            font-size: 11px;
            line-height: 1.7;
            overflow-wrap: anywhere;
            white-space: pre-line;
        }

        .item-date {
            margin-top: 7px;
            color: #a3a6b8;
            font-size: 10px;
        }

        .empty {
            padding: 25px 15px;
            color: #a3a6b8;
            font-size: 12px;
            text-align: center;
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

            .logout-area {
                right: 10px;
                left: 10px;
            }

            .main {
                margin-left: 70px;
                padding: 20px;
            }

            .profile {
                display: none;
            }
        }

        @media (max-width: 500px) {
            .main {
                padding: 15px;
            }

            .welcome h1 {
                font-size: 21px;
            }

            .detail-grid {
                grid-template-columns: 1fr;
            }

            .field.full {
                grid-column: auto;
            }

            .info-box,
            .card-body {
                padding: 16px;
            }

            .card-header {
                padding: 16px;
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

        <div class="menu-title">Menu Utama</div>

        <nav class="menu">
            <a href="{{ route('guru_pemantau.dashboard') }}">
                <div class="menu-icon">🏠</div>
                <span>Dashboard</span>
            </a>

            <a href="{{ route('guru_pemantau.dashboard') }}#pengaduan" class="active">
                <div class="menu-icon">📋</div>
                <span>Pantau Pengaduan</span>
            </a>

            <a href="{{ route('guru_pemantau.dashboard') }}#statistik">
                <div class="menu-icon">📊</div>
                <span>Statistik</span>
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
                <h1>Detail Pengaduan</h1>
                <p>Informasi lengkap pengaduan siswa SAPA.</p>
            </div>

            <div class="profile">
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
            </div>
        </div>

        <a
            href="{{ route('guru_pemantau.dashboard') }}"
            class="back-button"
        >
            ← Kembali ke Dashboard
        </a>

        <section class="info-box">
            <h2>Informasi Pengaduan</h2>
            <p>
                Halaman ini hanya digunakan untuk melihat informasi,
                lampiran, riwayat, dan tanggapan pengaduan. Guru Pemantau
                tidak dapat mengubah atau mengelola pengaduan.
            </p>
        </section>

        <!-- DATA PENGADUAN -->

        <section class="card">

            <div class="card-header">
                <h2>Data Pengaduan</h2>
            </div>

            <div class="card-body">

                <div class="detail-grid">

                    <div class="field">
                        <div class="label">Nomor Tiket</div>
                        <div class="value ticket">
                            {{ $pengaduan->nomor_tiket ?? '-' }}
                        </div>
                    </div>

                    <div class="field">
                        <div class="label">Status Pengaduan</div>
                        <div class="value">

                            @php
                                $status = $pengaduan->nama_status ?? '';
                                $kelasStatus = match ($status) {
                                    'Menunggu' => 'status-menunggu',
                                    'Diproses' => 'status-diproses',
                                    'Selesai' => 'status-selesai',
                                    'Ditolak' => 'status-ditolak',
                                    default => 'status-menunggu',
                                };
                            @endphp

                            <span class="status {{ $kelasStatus }}">
                                {{ $status ?: 'Belum ada status' }}
                            </span>

                        </div>
                    </div>

                    <div class="field">
                        <div class="label">Judul Pengaduan</div>
                        <div class="value">
                            {{ $pengaduan->judul ?? '-' }}
                        </div>
                    </div>

                    <div class="field">
                        <div class="label">Kategori</div>
                        <div class="value">
                            {{ $pengaduan->nama_kategori ?? '-' }}
                        </div>
                    </div>

                    <div class="field full">
                        <div class="label">Isi Pengaduan</div>
                        <div class="value">{{ $pengaduan->isi_pengaduan ?? '-' }}</div>
                    </div>

                    <div class="field">
                        <div class="label">Tanggal Pengaduan</div>
                        <div class="value">
                            {{ $pengaduan->tanggal_pengaduan
                                ? date('d/m/Y', strtotime($pengaduan->tanggal_pengaduan))
                                : '-' }}
                        </div>
                    </div>

                    <div class="field">
                        <div class="label">Waktu Data Dibuat</div>
                        <div class="value">
                            {{ $pengaduan->created_at
                                ? date('d/m/Y H:i', strtotime($pengaduan->created_at))
                                : '-' }}
                        </div>
                    </div>

                </div>

            </div>

        </section>

        <!-- DATA SISWA -->

        <section class="card">

            <div class="card-header">
                <h2>Identitas Siswa</h2>
            </div>

            <div class="card-body">

                <div class="detail-grid">

                    <div class="field">
                        <div class="label">Nama Siswa</div>
                        <div class="value">
                            {{ $pengaduan->nama_siswa ?? '-' }}
                        </div>
                    </div>

                    <div class="field">
                        <div class="label">NIS</div>
                        <div class="value">
                            {{ $pengaduan->nis ?? '-' }}
                        </div>
                    </div>

                    <div class="field">
                        <div class="label">Kelas</div>
                        <div class="value">
                            {{ $pengaduan->kelas ?? '-' }}
                        </div>
                    </div>

                    <div class="field">
                        <div class="label">Jurusan</div>
                        <div class="value">
                            {{ $pengaduan->jurusan ?? '-' }}
                        </div>
                    </div>

                    <div class="field">
                        <div class="label">Email</div>
                        <div class="value">
                            {{ $pengaduan->email_siswa ?? '-' }}
                        </div>
                    </div>

                    <div class="field">
                        <div class="label">Nomor Telepon</div>
                        <div class="value">
                            {{ $pengaduan->phone_number ?? '-' }}
                        </div>
                    </div>

                </div>

            </div>

        </section>

        <!-- LAMPIRAN -->

        <section class="card">

            <div class="card-header">
                <h2>Lampiran Pengaduan</h2>
            </div>

            <div class="card-body">

                @if ($lampiran->isNotEmpty())

                    <div class="attachment-list">

                        @foreach ($lampiran as $item)

                            <div class="attachment-item">

                                <div class="item-title">
                                    {{ $item->nama_file ?? $item->nama_lampiran ?? $item->file ?? 'Lampiran pengaduan' }}
                                </div>

                                @if (!empty($item->path_file))
                                    <a
                                        href="{{ asset('storage/' . $item->path_file) }}"
                                        target="_blank"
                                        rel="noopener noreferrer"
                                    >
                                        Lihat atau unduh lampiran
                                    </a>
                                @elseif (!empty($item->file_path))
                                    <a
                                        href="{{ asset('storage/' . $item->file_path) }}"
                                        target="_blank"
                                        rel="noopener noreferrer"
                                    >
                                        Lihat atau unduh lampiran
                                    </a>
                                @elseif (!empty($item->nama_file))
                                    <span class="item-text">
                                        Nama file tersedia, tetapi lokasi file belum diketahui.
                                    </span>
                                @else
                                    <span class="item-text">
                                        Informasi file: {{ $item->nama_lampiran ?? $item->file ?? '-' }}
                                    </span>
                                @endif

                            </div>

                        @endforeach

                    </div>

                @else

                    <div class="empty">
                        Belum ada lampiran pada pengaduan ini.
                    </div>

                @endif

            </div>

        </section>

        <!-- RIWAYAT PENGADUAN -->

        <section class="card">

            <div class="card-header">
                <h2>Riwayat Pengaduan</h2>
            </div>

            <div class="card-body">

                @if ($riwayat->isNotEmpty())

                    <div class="history-list">

                        @foreach ($riwayat as $item)

                            <div class="history-item">

                                <div class="item-title">
                                    {{ $item->nama_status ?? 'Perubahan status' }}
                                </div>

                                <div class="item-text">
                                    {{ $item->keterangan ?? 'Tidak ada keterangan.' }}
                                </div>

                                <div class="item-text">
                                    Petugas:
                                    {{ $item->nama_user ?? 'Tidak diketahui' }}
                                </div>

                                <div class="item-date">
                                    {{ $item->tanggal_perubahan
                                        ? date('d/m/Y H:i', strtotime($item->tanggal_perubahan))
                                        : '-' }}
                                </div>

                            </div>

                        @endforeach

                    </div>

                @else

                    <div class="empty">
                        Belum ada riwayat perubahan pengaduan.
                    </div>

                @endif

            </div>

        </section>

        <!-- TANGGAPAN -->

        <section class="card">

            <div class="card-header">
                <h2>Tanggapan Petugas</h2>
            </div>

            <div class="card-body">

                @if ($tanggapan->isNotEmpty())

                    <div class="response-list">

                        @foreach ($tanggapan as $item)

                            <div class="response-item">

                                <div class="item-title">
                                    {{ $item->nama_user ?? 'Petugas SAPA' }}
                                </div>

                                <div class="item-text">
                                    {{ $item->isi_tanggapan ?? '-' }}
                                </div>

                                <div class="item-date">
                                    {{ $item->created_at
                                        ? date('d/m/Y H:i', strtotime($item->created_at))
                                        : '-' }}
                                </div>

                            </div>

                        @endforeach

                    </div>

                @else

                    <div class="empty">
                        Belum ada tanggapan untuk pengaduan ini.
                    </div>

                @endif

            </div>

        </section>

    </main>

</body>
</html>
