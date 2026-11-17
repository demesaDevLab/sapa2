<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Detail Pengaduan - SAPA</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        body {
            background: #f7f5ff;
            color: #333;
        }

        .sidebar {
            position: fixed;
            left: 0;
            top: 0;
            width: 240px;
            height: 100vh;
            background: #ffffff;
            border-right: 1px solid #eee;
            padding: 25px 18px;
        }

        .logo {
            text-align: center;
            margin-bottom: 30px;
        }

        .logo img {
            width: 85px;
            height: 85px;
            object-fit: contain;
        }

        .logo h2 {
            color: #8174c8;
            font-size: 22px;
            margin-top: 8px;
        }

        .logo p {
            font-size: 13px;
            color: #999;
            margin-top: 4px;
        }

        .menu {
            margin-top: 25px;
        }

        .menu a {
            display: block;
            text-decoration: none;
            color: #666;
            padding: 13px 15px;
            border-radius: 12px;
            margin-bottom: 8px;
            font-size: 14px;
            transition: 0.2s;
        }

        .menu a:hover,
        .menu a.active {
            background: #eeeaff;
            color: #7568bd;
        }

        .content {
            margin-left: 240px;
            padding: 30px;
        }

        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            margin-bottom: 25px;
        }

        .topbar h1 {
            font-size: 25px;
            color: #4b4568;
        }

        .topbar p {
            color: #999;
            font-size: 14px;
            margin-top: 5px;
        }

        .back-btn {
            display: inline-block;
            text-decoration: none;
            background: #ffffff;
            color: #7568bd;
            padding: 11px 18px;
            border-radius: 12px;
            border: 1px solid #e5e0fa;
            font-size: 14px;
            white-space: nowrap;
        }

        .back-btn:hover {
            background: #eeeaff;
        }

        .note {
            background: #eeeaff;
            border: 1px solid #ded7ff;
            color: #655a9f;
            padding: 15px 18px;
            border-radius: 14px;
            margin-bottom: 22px;
            font-size: 14px;
        }

        .ticket-card {
            background: white;
            border-radius: 18px;
            padding: 22px;
            margin-bottom: 22px;
            box-shadow: 0 5px 18px rgba(80, 70, 120, 0.06);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .ticket-label {
            color: #999;
            font-size: 13px;
            margin-bottom: 5px;
        }

        .ticket-number {
            font-size: 22px;
            font-weight: bold;
            color: #7568bd;
        }

        .status {
            padding: 9px 16px;
            border-radius: 20px;
            font-size: 13px;
            font-weight: bold;
            display: inline-block;
        }

        .status-menunggu {
            background: #fff4d8;
            color: #b78300;
        }

        .status-diproses {
            background: #e4efff;
            color: #4b78b8;
        }

        .status-selesai {
            background: #e1f7e9;
            color: #3f8b5b;
        }

        .status-ditolak {
            background: #ffe4e4;
            color: #c55b5b;
        }

        .grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            margin-bottom: 20px;
        }

        .card {
            background: #ffffff;
            border-radius: 18px;
            padding: 22px;
            box-shadow: 0 5px 18px rgba(80, 70, 120, 0.06);
        }

        .card h3 {
            color: #554d78;
            font-size: 17px;
            margin-bottom: 18px;
        }

        .info {
            margin-bottom: 13px;
        }

        .info:last-child {
            margin-bottom: 0;
        }

        .info-label {
            color: #999;
            font-size: 12px;
            margin-bottom: 4px;
        }

        .info-value {
            color: #444;
            font-size: 14px;
            overflow-wrap: anywhere;
        }

        .complaint-text {
            background: #faf9ff;
            padding: 16px;
            border-radius: 12px;
            line-height: 1.7;
            font-size: 14px;
            color: #555;
            white-space: pre-line;
        }

        .full-card {
            margin-bottom: 20px;
        }

        .attachment {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 12px;
            background: #faf9ff;
            padding: 13px 15px;
            border-radius: 12px;
            margin-bottom: 10px;
        }

        .attachment:last-child {
            margin-bottom: 0;
        }

        .attachment-name {
            font-size: 14px;
            color: #555;
            overflow-wrap: anywhere;
        }

        .attachment a {
            text-decoration: none;
            background: #eeeaff;
            color: #7568bd;
            padding: 8px 13px;
            border-radius: 9px;
            font-size: 12px;
            white-space: nowrap;
        }

        .empty {
            color: #aaa;
            font-size: 13px;
        }

        .timeline {
            position: relative;
        }

        .timeline-item {
            border-left: 3px solid #dcd5ff;
            padding-left: 18px;
            margin-bottom: 20px;
            position: relative;
        }

        .timeline-item::before {
            content: "";
            position: absolute;
            left: -7px;
            top: 2px;
            width: 11px;
            height: 11px;
            border-radius: 50%;
            background: #9b91d8;
        }

        .timeline-status {
            font-weight: bold;
            color: #655a9f;
            font-size: 14px;
        }

        .timeline-date {
            color: #aaa;
            font-size: 12px;
            margin: 4px 0 7px;
        }

        .timeline-text {
            color: #555;
            font-size: 13px;
            line-height: 1.5;
        }

        .response {
            background: #faf9ff;
            padding: 15px;
            border-radius: 13px;
            margin-bottom: 12px;
        }

        .response:last-child {
            margin-bottom: 0;
        }

        .response-header {
            display: flex;
            justify-content: space-between;
            gap: 12px;
            margin-bottom: 8px;
        }

        .response-name {
            font-weight: bold;
            color: #5e5688;
            font-size: 14px;
        }

        .response-date {
            color: #aaa;
            font-size: 12px;
        }

        .response-role {
            color: #9a91c7;
            font-size: 11px;
            margin-bottom: 7px;
        }

        .response-text {
            color: #555;
            font-size: 14px;
            line-height: 1.6;
            white-space: pre-line;
        }

        @media (max-width: 800px) {
            .sidebar {
                width: 190px;
            }

            .content {
                margin-left: 190px;
                padding: 20px;
            }

            .grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 600px) {
            .sidebar {
                position: static;
                width: 100%;
                height: auto;
            }

            .logo img {
                width: 65px;
                height: 65px;
            }

            .menu {
                display: flex;
                flex-wrap: wrap;
                gap: 5px;
                margin-top: 15px;
            }

            .menu a {
                margin-bottom: 0;
            }

            .content {
                margin-left: 0;
                padding: 18px;
            }

            .topbar,
            .ticket-card {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }

            .topbar h1 {
                font-size: 22px;
            }

            .attachment {
                align-items: flex-start;
                flex-direction: column;
            }

            .response-header {
                flex-direction: column;
            }
        }
    </style>
</head>

<body>

    <!-- SIDEBAR -->

    <aside class="sidebar">

        <div class="logo">

            <img
                src="{{ asset('images/logo-sapa.jpeg') }}"
                alt="Logo SAPA"
            >

            <h2>SAPA</h2>

            <p>Guru Pemantau</p>

        </div>

        <nav class="menu">

            <a href="{{ route('guru_pemantau.dashboard') }}">
                🏠 Dashboard
            </a>

            <a
                href="{{ route('guru_pemantau.dashboard') }}#pengaduan"
                class="active"
            >
                📋 Pantau Pengaduan
            </a>

            <a href="{{ route('profil') }}">
                👤 Profil
            </a>

        </nav>

    </aside>

    <!-- MAIN CONTENT -->

    <main class="content">

        <div class="topbar">

            <div>
                <h1>Detail Pengaduan</h1>
                <p>Monitoring pengaduan oleh Guru Pemantau</p>
            </div>

            <a
                href="{{ route('guru_pemantau.dashboard') }}"
                class="back-btn"
            >
                ← Kembali ke Dashboard
            </a>

        </div>

        <div class="note">
            👁️ Halaman ini digunakan untuk memantau detail pengaduan siswa,
            riwayat proses, dan tanggapan yang telah diberikan oleh Guru/Admin.
        </div>

        <!-- TIKET -->

        <div class="ticket-card">

            <div>
                <div class="ticket-label">
                    Nomor Tiket
                </div>

                <div class="ticket-number">
                    {{ $pengaduan->nomor_tiket }}
                </div>
            </div>

            <div>

                @php
                    $statusClass = match($pengaduan->nama_status) {
                        'Menunggu' => 'status-menunggu',
                        'Diproses' => 'status-diproses',
                        'Selesai' => 'status-selesai',
                        'Ditolak' => 'status-ditolak',
                        default => '',
                    };
                @endphp

                <span class="status {{ $statusClass }}">
                    {{ $pengaduan->nama_status }}
                </span>

            </div>

        </div>

        <!-- INFORMASI SISWA & PENGADUAN -->

        <div class="grid">

            <div class="card">

                <h3>👤 Informasi Siswa</h3>

                <div class="info">
                    <div class="info-label">Nama</div>
                    <div class="info-value">
                        {{ $pengaduan->nama_siswa }}
                    </div>
                </div>

                <div class="info">
                    <div class="info-label">NIS</div>
                    <div class="info-value">
                        {{ $pengaduan->nis }}
                    </div>
                </div>

                <div class="info">
                    <div class="info-label">Kelas</div>
                    <div class="info-value">
                        {{ $pengaduan->kelas }}
                    </div>
                </div>

                <div class="info">
                    <div class="info-label">Jurusan</div>
                    <div class="info-value">
                        {{ $pengaduan->jurusan }}
                    </div>
                </div>

                <div class="info">
                    <div class="info-label">Email</div>
                    <div class="info-value">
                        {{ $pengaduan->email_siswa }}
                    </div>
                </div>

            </div>

            <div class="card">

                <h3>📋 Informasi Pengaduan</h3>

                <div class="info">
                    <div class="info-label">Judul</div>
                    <div class="info-value">
                        {{ $pengaduan->judul }}
                    </div>
                </div>

                <div class="info">
                    <div class="info-label">Kategori</div>
                    <div class="info-value">
                        {{ $pengaduan->nama_kategori }}
                    </div>
                </div>

                <div class="info">
                    <div class="info-label">Tanggal Pengaduan</div>
                    <div class="info-value">
                        {{ \Carbon\Carbon::parse($pengaduan->tanggal_pengaduan)->format('d/m/Y') }}
                    </div>
                </div>

                <div class="info">
                    <div class="info-label">Dibuat</div>
                    <div class="info-value">
                        {{ \Carbon\Carbon::parse($pengaduan->created_at)->format('d/m/Y H:i') }}
                    </div>
                </div>

            </div>

        </div>

        <!-- ISI PENGADUAN -->

        <div class="card full-card">

            <h3>📝 Isi Pengaduan</h3>

            <div class="complaint-text">
                {{ $pengaduan->isi_pengaduan }}
            </div>

        </div>

        <!-- LAMPIRAN -->

        <div class="card full-card">

            <h3>📎 Lampiran / Bukti</h3>

            @if($lampiran->count() > 0)

                @foreach($lampiran as $file)

                    <div class="attachment">

                        <div class="attachment-name">
                            📄 {{ $file->nama_file }}
                        </div>

                        <a
                            href="{{ asset('storage/' . $file->path_file) }}"
                            target="_blank"
                            rel="noopener noreferrer"
                        >
                            Lihat File
                        </a>

                    </div>

                @endforeach

            @else

                <div class="empty">
                    Tidak ada lampiran yang dilampirkan.
                </div>

            @endif

        </div>

        <!-- RIWAYAT -->

        <div class="card full-card">

            <h3>🔄 Riwayat Pengaduan</h3>

            @if($riwayat->count() > 0)

                <div class="timeline">

                    @foreach($riwayat as $item)

                        <div class="timeline-item">

                            <div class="timeline-status">
                                {{ $item->nama_status }}
                            </div>

                            <div class="timeline-date">

                                {{ \Carbon\Carbon::parse($item->tanggal_perubahan)->format('d/m/Y H:i') }}

                                @if($item->nama_user)
                                    • {{ $item->nama_user }}
                                @endif

                            </div>

                            <div class="timeline-text">
                                {{ $item->keterangan ?: 'Tidak ada keterangan.' }}
                            </div>

                        </div>

                    @endforeach

                </div>

            @else

                <div class="empty">
                    Belum ada riwayat pengaduan.
                </div>

            @endif

        </div>

        <!-- TANGGAPAN -->

        <div class="card full-card">

            <h3>💬 Tanggapan</h3>

            @if($tanggapan->count() > 0)

                @foreach($tanggapan as $response)

                    <div class="response">

                        <div class="response-header">

                            <div class="response-name">
                                {{ $response->nama_user ?? 'Pengguna' }}
                            </div>

                            <div class="response-date">
                                {{ \Carbon\Carbon::parse($response->created_at)->format('d/m/Y H:i') }}
                            </div>

                        </div>

                        <div class="response-role">
                            {{ $response->role ?? '-' }}
                        </div>

                        <div class="response-text">
                            {{ $response->isi_tanggapan }}
                        </div>

                    </div>

                @endforeach

            @else

                <div class="empty">
                    Belum ada tanggapan.
                </div>

            @endif

        </div>

    </main>

</body>
</html>
