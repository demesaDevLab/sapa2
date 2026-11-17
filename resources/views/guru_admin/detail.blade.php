
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
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #f7f8fc;
            color: #333;
        }

        /* SIDEBAR */
        .sidebar {
            position: fixed;
            left: 0;
            top: 0;
            width: 250px;
            height: 100vh;
            background: #ffffff;
            border-right: 1px solid #eeeaf8;
            padding: 25px 18px;
        }

        .logo-area {
            text-align: center;
            margin-bottom: 35px;
        }

        .logo-area img {
            width: 70px;
            height: 70px;
            object-fit: cover;
            border-radius: 18px;
            margin-bottom: 10px;
        }

        .logo-area h2 {
            color: #7357a8;
            font-size: 20px;
        }

        .logo-area p {
            color: #999;
            font-size: 12px;
            margin-top: 4px;
        }

        .menu-title {
            font-size: 11px;
            color: #aaa;
            margin: 0 12px 10px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .menu {
            display: flex;
            flex-direction: column;
            gap: 7px;
        }

        .menu a {
            text-decoration: none;
            color: #666;
            padding: 12px 14px;
            border-radius: 12px;
            font-size: 14px;
        }

        .menu a:hover,
        .menu a.active {
            background: #eee5ff;
            color: #7357a8;
        }

        /* MAIN */
        .main {
            margin-left: 250px;
            padding: 30px;
            min-height: 100vh;
        }

        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        .topbar h1 {
            color: #4c4c5c;
            font-size: 25px;
        }

        .topbar p {
            color: #999;
            font-size: 13px;
            margin-top: 5px;
        }

        .back-btn {
            text-decoration: none;
            background: #ffffff;
            color: #7357a8;
            border: 1px solid #e6dcf7;
            padding: 10px 16px;
            border-radius: 11px;
            font-size: 13px;
            font-weight: 600;
        }

        /* ALERT */
        .alert {
            padding: 13px 16px;
            border-radius: 12px;
            margin-bottom: 18px;
            font-size: 13px;
        }

        .alert-success {
            background: #e7f8ed;
            color: #287a45;
            border: 1px solid #ccebd6;
        }

        .alert-error {
            background: #ffeaea;
            color: #b33a3a;
            border: 1px solid #f3cccc;
        }

        /* TICKET */
        .ticket-card {
            background: linear-gradient(135deg, #eee5ff, #f7f3ff);
            border: 1px solid #e5d9fa;
            border-radius: 18px;
            padding: 22px;
            margin-bottom: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .ticket-label {
            color: #8c78a9;
            font-size: 12px;
            margin-bottom: 5px;
        }

        .ticket-number {
            color: #654a91;
            font-size: 22px;
            font-weight: 700;
        }

        .ticket-date {
            color: #777;
            font-size: 13px;
            margin-top: 7px;
        }

        /* STATUS */
        .status {
            padding: 9px 15px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 700;
        }

        .menunggu {
            background: #fff2d8;
            color: #a56b00;
        }

        .diproses {
            background: #e4efff;
            color: #3c69a8;
        }

        .selesai {
            background: #e5f7eb;
            color: #287a45;
        }

        .ditolak {
            background: #ffe6e6;
            color: #b33a3a;
        }

        /* GRID */
        .grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .card {
            background: #ffffff;
            border: 1px solid #eeeaf5;
            border-radius: 17px;
            padding: 22px;
            box-shadow: 0 3px 12px rgba(100, 80, 140, 0.04);
        }

        .full {
            grid-column: 1 / -1;
        }

        .card-title {
            color: #5f4b7d;
            font-size: 17px;
            font-weight: 700;
            margin-bottom: 18px;
        }

        /* DATA SISWA */
        .data-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 12px;
        }

        .data-item {
            background: #faf9fd;
            padding: 12px 14px;
            border-radius: 11px;
        }

        .data-item label {
            display: block;
            color: #999;
            font-size: 11px;
            margin-bottom: 5px;
        }

        .data-item span {
            color: #444;
            font-size: 13px;
            font-weight: 600;
            word-break: break-word;
        }

        /* KATEGORI */
        .category {
            background: #f4efff;
            border-radius: 12px;
            padding: 14px;
        }

        .category strong {
            display: block;
            color: #684c92;
            font-size: 14px;
            margin-bottom: 6px;
        }

        .category p {
            color: #8b8197;
            font-size: 12px;
            line-height: 1.5;
        }

        /* PENGADUAN */
        .complaint-title {
            color: #444;
            font-size: 20px;
            margin-bottom: 12px;
        }

        .complaint-content {
            color: #666;
            font-size: 14px;
            line-height: 1.8;
            white-space: pre-line;
        }

        /* LAMPIRAN */
        .attachment {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: #faf9fd;
            border: 1px solid #eeeaf5;
            padding: 12px;
            border-radius: 10px;
            margin-bottom: 8px;
            gap: 10px;
        }

        .attachment-name {
            font-size: 13px;
            color: #555;
            word-break: break-word;
        }

        .attachment a {
            text-decoration: none;
            background: #eee5ff;
            color: #7357a8;
            padding: 7px 11px;
            border-radius: 8px;
            font-size: 11px;
            font-weight: 600;
            white-space: nowrap;
        }

        /* ACTION */
        .action-box {
            background: #faf9fd;
            padding: 16px;
            border-radius: 13px;
        }

        .action-form {
            margin-bottom: 13px;
        }

        .action-form:last-child {
            margin-bottom: 0;
        }

        input[type="text"],
        textarea {
            width: 100%;
            padding: 11px;
            border: 1px solid #ded8e8;
            border-radius: 10px;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 13px;
            outline: none;
            margin-bottom: 9px;
            background: #ffffff;
        }

        textarea {
            min-height: 100px;
            resize: vertical;
        }

        input[type="text"]:focus,
        textarea:focus {
            border-color: #a98dd1;
            box-shadow: 0 0 0 2px #f0eaff;
        }

        .btn {
            width: 100%;
            border: none;
            border-radius: 10px;
            padding: 11px;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
        }

        .btn-process {
            background: #dff5e5;
            color: #287a45;
        }

        .btn-process:hover {
            background: #cdeed7;
        }

        .btn-reject {
            background: #ffdede;
            color: #b33a3a;
        }

        .btn-reject:hover {
            background: #ffcaca;
        }

        .btn-response {
            background: #e8defb;
            color: #6741a5;
        }

        .btn-response:hover {
            background: #dccdf7;
        }

        .btn-finish {
            background: #d8f3df;
            color: #287a45;
        }

        .btn-finish:hover {
            background: #c7ebd0;
        }

        .info-success {
            padding: 13px;
            border-radius: 10px;
            background: #e8f8ed;
            color: #287a45;
            text-align: center;
            font-size: 13px;
            font-weight: 600;
        }

        .info-rejected {
            padding: 13px;
            border-radius: 10px;
            background: #ffeaea;
            color: #b33a3a;
            text-align: center;
            font-size: 13px;
            font-weight: 600;
        }

        /* TANGGAPAN */
        .response-item {
            background: #faf9fd;
            border-left: 4px solid #c9b5e8;
            border-radius: 10px;
            padding: 14px;
            margin-bottom: 10px;
        }

        .response-head {
            display: flex;
            justify-content: space-between;
            margin-bottom: 8px;
            gap: 10px;
        }

        .response-user {
            color: #654a91;
            font-size: 13px;
            font-weight: 700;
        }

        .response-date {
            color: #aaa;
            font-size: 11px;
        }

        .response-text {
            color: #666;
            font-size: 13px;
            line-height: 1.6;
            white-space: pre-line;
        }

        /* TIMELINE */
        .timeline {
            position: relative;
            padding-left: 25px;
        }

        .timeline::before {
            content: "";
            position: absolute;
            left: 7px;
            top: 4px;
            bottom: 4px;
            width: 2px;
            background: #e7def5;
        }

        .timeline-item {
            position: relative;
            padding-bottom: 20px;
        }

        .timeline-item:last-child {
            padding-bottom: 0;
        }

        .timeline-dot {
            position: absolute;
            left: -23px;
            top: 2px;
            width: 15px;
            height: 15px;
            background: #bda5df;
            border: 3px solid #ffffff;
            border-radius: 50%;
        }

        .timeline-status {
            color: #654a91;
            font-size: 13px;
            font-weight: 700;
        }

        .timeline-date {
            color: #aaa;
            font-size: 11px;
            margin: 4px 0;
        }

        .timeline-text {
            color: #666;
            font-size: 12px;
            line-height: 1.5;
        }

        .empty {
            text-align: center;
            color: #aaa;
            font-size: 13px;
            padding: 20px;
        }

        /* RESPONSIVE */
        @media (max-width: 900px) {

            .sidebar {
                width: 210px;
            }

            .main {
                margin-left: 210px;
            }

            .grid {
                grid-template-columns: 1fr;
            }

            .full {
                grid-column: auto;
            }
        }

        @media (max-width: 700px) {

            .sidebar {
                position: static;
                width: 100%;
                height: auto;
                border-right: none;
                border-bottom: 1px solid #eeeaf8;
            }

            .main {
                margin-left: 0;
                padding: 18px;
            }

            .topbar,
            .ticket-card {
                flex-direction: column;
                align-items: flex-start;
                gap: 12px;
            }

            .data-grid {
                grid-template-columns: 1fr;
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
            >

            <h2>SAPA</h2>

            <p>Guru / Admin</p>

        </div>

        <div class="menu-title">
            MENU
        </div>

        <nav class="menu">

            <a href="{{ route('guru_admin.dashboard') }}">
                🏠 Dashboard
            </a>

            <a href="{{ route('guru_admin.dashboard') }}" class="active">
                📋 Pengaduan
            </a>

        </nav>

    </aside>


    <!-- MAIN -->
    <main class="main">

        <!-- HEADER -->
        <div class="topbar">

            <div>

                <h1>
                    Detail Pengaduan
                </h1>

                <p>
                    Informasi lengkap pengaduan siswa
                </p>

            </div>

            <a
                href="{{ route('guru_admin.dashboard') }}"
                class="back-btn"
            >
                ← Kembali ke Dashboard
            </a>

        </div>


        <!-- SUCCESS -->
        @if (session('success'))

            <div class="alert alert-success">
                ✓ {{ session('success') }}
            </div>

        @endif


        <!-- ERROR -->
        @if (session('error'))

            <div class="alert alert-error">
                {{ session('error') }}
            </div>

        @endif


        <!-- VALIDATION ERROR -->
        @if ($errors->any())

            <div class="alert alert-error">

                <strong>Terjadi kesalahan:</strong>

                <ul style="margin-top: 6px; padding-left: 18px;">

                    @foreach ($errors->all() as $error)

                        <li>
                            {{ $error }}
                        </li>

                    @endforeach

                </ul>

            </div>

        @endif


        <!-- TICKET -->
        <div class="ticket-card">

            <div>

                <div class="ticket-label">
                    NOMOR TIKET
                </div>

                <div class="ticket-number">
                    {{ $pengaduan->nomor_tiket }}
                </div>

                <div class="ticket-date">

                    Diajukan:
                    {{ \Carbon\Carbon::parse($pengaduan->tanggal_pengaduan)->format('d/m/Y') }}

                </div>

            </div>


            @if ($pengaduan->nama_status === 'Menunggu')

                <span class="status menunggu">
                    Menunggu
                </span>

            @elseif ($pengaduan->nama_status === 'Diproses')

                <span class="status diproses">
                    Diproses
                </span>

            @elseif ($pengaduan->nama_status === 'Selesai')

                <span class="status selesai">
                    Selesai
                </span>

            @elseif ($pengaduan->nama_status === 'Ditolak')

                <span class="status ditolak">
                    Ditolak
                </span>

            @endif

        </div>


        <div class="grid">


            <!-- DATA SISWA -->
            <div class="card">

                <div class="card-title">
                    👤 Data Siswa
                </div>

                <div class="data-grid">

                    <div class="data-item">
                        <label>Nama</label>
                        <span>{{ $pengaduan->nama_siswa }}</span>
                    </div>

                    <div class="data-item">
                        <label>NIS</label>
                        <span>{{ $pengaduan->nis }}</span>
                    </div>

                    <div class="data-item">
                        <label>Kelas</label>
                        <span>{{ $pengaduan->kelas }}</span>
                    </div>

                    <div class="data-item">
                        <label>Jurusan</label>
                        <span>{{ $pengaduan->jurusan }}</span>
                    </div>

                    <div class="data-item">
                        <label>Email</label>
                        <span>{{ $pengaduan->email_siswa }}</span>
                    </div>

                    <div class="data-item">
                        <label>No. HP</label>
                        <span>
                            {{ $pengaduan->phone_number ?? '-' }}
                        </span>
                    </div>

                </div>

            </div>


            <!-- KATEGORI -->
            <div class="card">

                <div class="card-title">
                    📁 Kategori Pengaduan
                </div>

                <div class="category">

                    <strong>
                        {{ $pengaduan->nama_kategori }}
                    </strong>

                    <p>
                        {{ $pengaduan->deskripsi_kategori ?? 'Tidak ada deskripsi kategori.' }}
                    </p>

                </div>

            </div>


            <!-- ISI PENGADUAN -->
            <div class="card full">

                <div class="card-title">
                    📝 Isi Pengaduan
                </div>

                <h2 class="complaint-title">
                    {{ $pengaduan->judul }}
                </h2>

                <div class="complaint-content">
                    {{ $pengaduan->isi_pengaduan }}
                </div>

            </div>


            <!-- LAMPIRAN -->
            <div class="card">

                <div class="card-title">
                    📎 Lampiran / Bukti
                </div>

                @if ($lampiran->count() > 0)

                    @foreach ($lampiran as $file)

                        <div class="attachment">

                            <div class="attachment-name">
                                📄 {{ $file->nama_file }}
                            </div>

                            <a
                                href="{{ asset('storage/' . $file->path_file) }}"
                                target="_blank"
                            >
                                Lihat
                            </a>

                        </div>

                    @endforeach

                @else

                    <div class="empty">
                        Tidak ada lampiran.
                    </div>

                @endif

            </div>


            <!-- AKSI GURU ADMIN -->
            <div class="card">

                <div class="card-title">
                    💬 Tanggapan Guru / Admin
                </div>

                <div class="action-box">

                    <p style="font-size:13px; color:#777; margin-bottom:15px; line-height:1.6;">
                        Berikan tanggapan atau informasi kepada siswa terkait pengaduannya.
                        Guru/Admin hanya bertugas memberikan tanggapan dan tidak memiliki
                        kewenangan untuk mengubah status pengaduan.
                    </p>

                    <form
                        action="{{ route('guru_admin.pengaduan.tanggapan', ['id' => $pengaduan->id]) }}"
                        method="POST"
                        class="action-form"
                    >

                        @csrf

                        <textarea
                            name="tanggapan"
                            placeholder="Tulis tanggapan untuk siswa..."
                            maxlength="2000"
                            required
                        >{{ old('tanggapan') }}</textarea>

                        <button
                            type="submit"
                            class="btn btn-response"
                        >
                            💬 Kirim Tanggapan
                        </button>

                    </form>

                </div>

            </div>


            <!-- RIWAYAT TANGGAPAN -->
            <div class="card full">

                <div class="card-title">
                    💬 Riwayat Tanggapan
                </div>

                @if ($tanggapan->count() > 0)

                    @foreach ($tanggapan as $item)

                        <div class="response-item">

                            <div class="response-head">

                                <span class="response-user">
                                    {{ $item->nama_user ?? 'Guru / Admin' }}
                                </span>

                                <span class="response-date">
                                    {{ \Carbon\Carbon::parse($item->created_at)->format('d/m/Y H:i') }}
                                </span>

                            </div>

                            <div class="response-text">
                                {{ $item->isi_tanggapan }}
                            </div>

                        </div>

                    @endforeach

                @else

                    <div class="empty">
                        Belum ada tanggapan.
                    </div>

                @endif

            </div>


            <!-- RIWAYAT STATUS -->
            <div class="card full">

                <div class="card-title">
                    🕒 Riwayat Status Pengaduan
                </div>

                @if ($riwayat->count() > 0)

                    <div class="timeline">

                        @foreach ($riwayat as $item)

                            <div class="timeline-item">

                                <div class="timeline-dot"></div>

                                <div class="timeline-status">
                                    {{ $item->nama_status }}
                                </div>

                                <div class="timeline-date">

                                    {{ \Carbon\Carbon::parse($item->tanggal_perubahan)->format('d/m/Y H:i') }}

                                    @if ($item->nama_user)
                                        · {{ $item->nama_user }}
                                    @endif

                                </div>

                                <div class="timeline-text">
                                    {{ $item->keterangan ?? 'Tidak ada keterangan.' }}
                                </div>

                            </div>

                        @endforeach

                    </div>

                @else

                    <div class="empty">
                        Belum ada riwayat status.
                    </div>

                @endif

            </div>

        </div>

    </main>

</body>
</html>
