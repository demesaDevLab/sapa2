<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Dashboard Wakasek - SAPA</title>

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
    background: #fff;
    border-right: 1px solid #eceef8;
    padding: 25px 18px 100px;
    z-index: 100;
    overflow-y: auto;
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
    flex-shrink: 0;
}

.logo-text h2 {
    font-size: 18px;
    color: #555f9d;
}

.logo-text p {
    font-size: 9px;
    color: #a3a6ba;
    margin-top: 3px;
    line-height: 1.5;
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
    transition: 0.2s;
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
    flex-shrink: 0;
}

/* LOGOUT */
.logout-area {
    position: fixed;
    left: 18px;
    bottom: 25px;
    width: 209px;
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

/* MAIN */
.main {
    margin-left: 245px;
    width: calc(100% - 245px);
    min-height: 100vh;
    padding: 30px;
    min-width: 0;
}

.topbar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 15px;
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

/* PROFILE */
.profile {
    display: flex;
    align-items: center;
    gap: 10px;
    background: #fff;
    padding: 9px 14px;
    border-radius: 14px;
    border: 1px solid #eceef8;
    text-decoration: none;
    cursor: pointer;
    transition: 0.2s;
    color: inherit;
    flex-shrink: 0;
}

.profile:hover {
    background: #f7f8ff;
    border-color: #dfe3f7;
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
    overflow-wrap: anywhere;
}

.profile-role {
    font-size: 9px;
    color: #a3a6ba;
    margin-top: 2px;
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

/* ALERT */
.alert {
    padding: 13px 16px;
    border-radius: 12px;
    margin-bottom: 20px;
    font-size: 11px;
}

.alert-success {
    background: #e7f8ee;
    color: #57966f;
    border: 1px solid #d4efdf;
}

.alert-error {
    background: #ffe9eb;
    color: #b96776;
    border: 1px solid #f5d4d9;
}

/* STATISTIK */
.section-title {
    font-size: 16px;
    color: #555b8e;
    margin-bottom: 15px;
}

.stats {
    display: grid;
    grid-template-columns: repeat(5, minmax(0, 1fr));
    gap: 14px;
    margin-bottom: 30px;
}

.stat-card {
    background: #fff;
    border: 1px solid #eceef8;
    border-radius: 17px;
    padding: 18px;
    min-width: 0;
}

.stat-top {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 13px;
}

.stat-icon {
    width: 37px;
    height: 37px;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 16px;
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
    line-height: 1.5;
}

/* TABEL */
.table-card {
    background: #fff;
    border: 1px solid #eceef8;
    border-radius: 20px;
    overflow: hidden;
    margin-bottom: 25px;
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
    line-height: 1.5;
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
    vertical-align: middle;
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
    line-height: 1.5;
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

/* TOMBOL DETAIL */
.detail-button {
    display: inline-block;
    text-decoration: none;
    text-align: center;
    background: #e9edff;
    color: #6877c7;
    padding: 8px 12px;
    border-radius: 9px;
    font-size: 10px;
    font-weight: bold;
    white-space: nowrap;
    transition: 0.2s;
}

.detail-button:hover {
    background: #dfe4ff;
}

/* KOSONG */
.empty {
    text-align: center;
    padding: 45px 20px;
    color: #a3a6b8;
    font-size: 12px;
    line-height: 1.7;
}

/* RESPONSIVE LAPTOP */
@media (max-width: 1100px) {
    .stats {
        grid-template-columns: repeat(3, minmax(0, 1fr));
    }
}

/* RESPONSIVE TABLET DAN HP */
@media (max-width: 800px) {
    .sidebar {
        width: 210px;
        padding: 20px 12px 100px;
    }

    .logo-area {
        padding: 0 4px;
        gap: 9px;
        margin-bottom: 25px;
    }

    .logo {
        width: 40px;
        height: 40px;
    }

    .logo-text h2 {
        font-size: 17px;
    }

    .logo-text p {
        font-size: 8px;
    }

    .menu-title {
        font-size: 9px;
    }

    .menu {
        gap: 5px;
    }

    .menu a {
        padding: 11px 8px;
        gap: 8px;
        font-size: 11px;
    }

    .menu-icon {
        font-size: 15px;
        width: 22px;
    }

    .logout-area {
        left: 12px;
        width: 186px;
        bottom: 15px;
    }

    .main {
        margin-left: 210px;
        width: calc(100% - 210px);
        padding: 20px 15px;
    }

    .topbar {
        align-items: flex-start;
        flex-wrap: wrap;
        gap: 12px;
    }

    .welcome h1 {
        font-size: 21px;
    }

    .welcome p {
        font-size: 11px;
    }

    .profile {
        max-width: 100%;
        padding: 7px 9px;
        gap: 7px;
    }

    .profile-icon {
        width: 30px;
        height: 30px;
    }

    .profile-name {
        font-size: 10px;
    }

    .profile-role {
        font-size: 8px;
    }

    .stats {
        grid-template-columns: repeat(2, minmax(0, 1fr));
    }

    .stat-card {
        padding: 14px;
    }

    .stat-number {
        font-size: 22px;
    }

    .info-box {
        padding: 18px;
    }

    .table-header {
        align-items: flex-start;
        flex-wrap: wrap;
    }
}

/* HP KECIL */
@media (max-width: 500px) {
    .sidebar {
        width: 190px;
        padding: 18px 9px 95px;
    }

    .logo-area {
        gap: 7px;
    }

    .logo {
        width: 36px;
        height: 36px;
    }

    .logo-text h2 {
        font-size: 16px;
    }

    .logo-text p {
        font-size: 7px;
    }

    .menu a {
        gap: 6px;
        padding: 10px 5px;
        font-size: 10px;
    }

    .menu-icon {
        width: 20px;
        font-size: 14px;
    }

    .logout-area {
        left: 9px;
        width: 172px;
    }

    .main {
        margin-left: 190px;
        width: calc(100% - 190px);
        padding: 15px 10px;
    }

    .welcome h1 {
        font-size: 18px;
    }

    .welcome p {
        font-size: 10px;
    }

    .profile {
        max-width: 100%;
        padding: 6px;
        gap: 5px;
    }

    .profile-icon {
        width: 26px;
        height: 26px;
        font-size: 11px;
    }

    .profile-name {
        font-size: 9px;
    }

    .profile-role {
        font-size: 7px;
    }

    .stats {
        grid-template-columns: 1fr;
    }

    .info-box h2 {
        font-size: 15px;
    }

    .info-box p {
        font-size: 10px;
    }

    .section-title {
        font-size: 14px;
    }

    .table-header {
        padding: 15px;
    }

    .table-header h2 {
        font-size: 14px;
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

        <a href="{{ route('wakasek.dashboard') }}" class="active">
            <div class="menu-icon">🏠</div>
            <span>Dashboard</span>
        </a>

        <a href="{{ route('wakasek.dashboard') }}#pengaduan">
            <div class="menu-icon">📋</div>
            <span>Data Pengaduan</span>
        </a>

    </nav>

    <div class="logout-area">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="logout-button">Keluar</button>
        </form>
    </div>

</aside>

<!-- MAIN -->
<main class="main">

    <!-- TOPBAR -->
    <div class="topbar">

        <div class="welcome">
            <h1>Dashboard Wakasek</h1>
            <p>Pantau pengaduan siswa sesuai bidang Anda.</p>
        </div>

        <a href="{{ route('profil') }}" class="profile" title="Buka Profil">
            <div class="profile-icon">
                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
            </div>

            <div>
                <div class="profile-name">{{ Auth::user()->name }}</div>
                <div class="profile-role">Wakasek</div>
            </div>
        </a>

    </div>

    <!-- ALERT -->
    @if (session('success'))
        <div class="alert alert-success">
            ✓ {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-error">
            ✕ {{ session('error') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-error">
            {{ $errors->first() }}
        </div>
    @endif

    <!-- INFO -->
    <section class="info-box">
        <h2>Panel Pemantauan Pengaduan</h2>
        <p>
            Wakasek dapat memantau pengaduan siswa, memeriksa informasi
            pengaduan, serta menerima dan menolak pengaduan yang masih
            berstatus menunggu sesuai bidangnya. Pengaduan yang diterima
            dapat ditindaklanjuti oleh Guru/Admin.
        </p>
    </section>

    <!-- STATISTIK -->
    <section id="statistik">

        <h2 class="section-title">Ringkasan Pengaduan</h2>

        <div class="stats">

            <div class="stat-card">
                <div class="stat-top">
                    <div class="stat-icon blue">📋</div>
                </div>
                <div class="stat-number">{{ $totalPengaduan }}</div>
                <div class="stat-label">Total Pengaduan</div>
            </div>

            <div class="stat-card">
                <div class="stat-top">
                    <div class="stat-icon yellow">⏳</div>
                </div>
                <div class="stat-number">
                    {{ $pengaduan->where('nama_status', 'Menunggu')->count() }}
                </div>
                <div class="stat-label">Menunggu Tindakan</div>
            </div>

            <div class="stat-card">
                <div class="stat-top">
                    <div class="stat-icon purple">⚙️</div>
                </div>
                <div class="stat-number">
                    {{ $pengaduan->where('nama_status', 'Diproses')->count() }}
                </div>
                <div class="stat-label">Sedang Diproses</div>
            </div>

            <div class="stat-card">
                <div class="stat-top">
                    <div class="stat-icon green">✓</div>
                </div>
                <div class="stat-number">
                    {{ $pengaduan->where('nama_status', 'Selesai')->count() }}
                </div>
                <div class="stat-label">Selesai</div>
            </div>

            <div class="stat-card">
                <div class="stat-top">
                    <div class="stat-icon red">×</div>
                </div>
                <div class="stat-number">
                    {{ $pengaduan->where('nama_status', 'Ditolak')->count() }}
                </div>
                <div class="stat-label">Ditolak</div>
            </div>

        </div>

        <!-- CATATAN TUGAS WAKASEK -->
        <section id="tugas-wakasek">

            <h2 class="section-title">Catatan Tugas Wakasek</h2>

            <div class="info-box">
                <h2>📌 Tugas dan Tanggung Jawab Wakasek</h2>

                <p>
                    Berikut catatan tugas Wakil Kepala Sekolah dalam menggunakan
                    sistem SAPA:
                </p>

                <ul style="margin: 12px 0 0 18px; color: #8589a3;
                           font-size: 11px; line-height: 2;">

                    <li>
                        Memantau pengaduan siswa yang masuk sesuai bidangnya.
                    </li>

                    <li>
                        Memeriksa isi dan informasi pengaduan sebelum ditindaklanjuti.
                    </li>

                    <li>
                        Menerima pengaduan yang sesuai untuk diproses lebih lanjut.
                    </li>

                    <li>
                        Menolak pengaduan yang tidak sesuai dengan ketentuan.
                    </li>

                    <li>
                        Memastikan pengaduan yang diterima ditindaklanjuti oleh
                        pihak terkait.
                    </li>

                </ul>

                <p style="margin-top: 12px;">
                    <strong>Catatan:</strong> Periksa pengaduan dengan teliti
                    sebelum menentukan tindakan agar penanganannya sesuai
                    dengan ketentuan sekolah.
                </p>
            </div>

        </section>

    </section>

    <!-- DATA PENGADUAN -->
    <section id="pengaduan">

        <div class="table-card">

            <div class="table-header">
                <div>
                    <h2>Data Pengaduan Siswa</h2>
                    <p>Periksa detail dan status pengaduan siswa.</p>
                </div>

                <div class="badge-total">
                    {{ $totalPengaduan }} Pengaduan
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
                                <th>Pengaduan</th>
                                <th>Tanggal</th>
                                <th>Status</th>
                                <th>Detail / Aksi</th>
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

                                <td>{{ $item->nama_kategori }}</td>

                                <td>
                                    <strong style="color:#5d6280;">
                                        {{ $item->judul }}
                                    </strong>

                                    <div style="color:#a1a4b5;font-size:9px;margin-top:5px;max-width:220px;line-height:1.6;">
                                        {{ \Illuminate\Support\Str::limit($item->isi_pengaduan, 70) }}
                                    </div>
                                </td>

                                <td>
                                    {{ date('d/m/Y', strtotime($item->tanggal_pengaduan)) }}
                                </td>

                                <td>
                                    @if ($item->nama_status === 'Menunggu')
                                        <span class="status status-menunggu">Menunggu</span>
                                    @elseif ($item->nama_status === 'Diproses')
                                        <span class="status status-diproses">Diproses</span>
                                    @elseif ($item->nama_status === 'Selesai')
                                        <span class="status status-selesai">Selesai</span>
                                    @elseif ($item->nama_status === 'Ditolak')
                                        <span class="status status-ditolak">Ditolak</span>
                                    @else
                                        <span class="status status-menunggu">
                                            {{ $item->nama_status }}
                                        </span>
                                    @endif
                                </td>

                                <!-- DETAIL DAN AKSI WAKASEK -->
                                <td>
                                    <div style="display:flex; flex-direction:column; gap:9px; min-width:160px;">

                                        <!-- TOMBOL DETAIL -->
                                        <a
                                            href="{{ route('wakasek.pengaduan.detail', $item->id) }}"
                                            class="detail-button"
                                        >
                                            Lihat Detail
                                        </a>

                                        @if ($item->nama_status === 'Menunggu')

                                            <!-- FORM TERIMA DAN PROSES -->
                                            <form
                                                action="{{ route('wakasek.pengaduan.proses', $item->id) }}"
                                                method="POST"
                                                onsubmit="return confirm('Apakah kamu yakin ingin menerima dan memproses pengaduan ini?')"
                                            >
                                                @csrf

                                                <button
                                                    type="submit"
                                                    style="
                                                        width:100%;
                                                        border:none;
                                                        background:#e7f8ee;
                                                        color:#57966f;
                                                        padding:9px;
                                                        border-radius:9px;
                                                        font-size:10px;
                                                        font-weight:bold;
                                                        cursor:pointer;
                                                    "
                                                >
                                                    ✓ Terima &amp; Proses
                                                </button>
                                            </form>

                                            <!-- FORM TOLAK -->
                                            <form
                                                action="{{ route('wakasek.pengaduan.tolak', $item->id) }}"
                                                method="POST"
                                                onsubmit="return confirm('Apakah kamu yakin ingin menolak pengaduan ini?')"
                                            >
                                                @csrf

                                                <input
                                                    type="text"
                                                    name="keterangan"
                                                    placeholder="Alasan penolakan..."
                                                    required
                                                    maxlength="1000"
                                                    style="
                                                        width:100%;
                                                        padding:9px;
                                                        border:1px solid #eceef8;
                                                        border-radius:8px;
                                                        font-size:10px;
                                                        margin-bottom:6px;
                                                        outline:none;
                                                    "
                                                >

                                                <button
                                                    type="submit"
                                                    style="
                                                        width:100%;
                                                        border:none;
                                                        background:#ffe9eb;
                                                        color:#bd6e7d;
                                                        padding:9px;
                                                        border-radius:9px;
                                                        font-size:10px;
                                                        font-weight:bold;
                                                        cursor:pointer;
                                                    "
                                                >
                                                    ✕ Tolak Pengaduan
                                                </button>
                                            </form>

                                        @elseif ($item->nama_status === 'Diproses')

                                            @if ($item->jumlah_tanggapan > 0)

                                                <!-- FORM SELESAIKAN PENGADUAN -->
                                                <form
                                                    action="{{ route('wakasek.pengaduan.selesai', $item->id) }}"
                                                    method="POST"
                                                    onsubmit="return confirm('Apakah kamu yakin ingin menyelesaikan pengaduan ini?')"
                                                >
                                                    @csrf

                                                    <button
                                                        type="submit"
                                                        style="
                                                            width:100%;
                                                            border:none;
                                                            background:#e6f7ed;
                                                            color:#5c9c76;
                                                            padding:9px;
                                                            border-radius:9px;
                                                            font-size:10px;
                                                            font-weight:bold;
                                                            cursor:pointer;
                                                        "
                                                    >
                                                        ✓ Selesaikan Pengaduan
                                                    </button>
                                                </form>

                                            @else

                                                <div style="
                                                    background:#eeeaff;
                                                    color:#8168bd;
                                                    padding:9px;
                                                    border-radius:9px;
                                                    font-size:10px;
                                                    text-align:center;
                                                ">
                                                    Menunggu Tanggapan Guru/Admin
                                                </div>

                                            @endif

                                        @elseif ($item->nama_status === 'Selesai')

                                            <div style="
                                                background:#e6f7ed;
                                                color:#5c9c76;
                                                padding:9px;
                                                border-radius:9px;
                                                font-size:10px;
                                                text-align:center;
                                            ">
                                                ✓ Pengaduan Selesai
                                            </div>

                                        @elseif ($item->nama_status === 'Ditolak')

                                            <div style="
                                                background:#ffe8eb;
                                                color:#bd6e7d;
                                                padding:9px;
                                                border-radius:9px;
                                                font-size:10px;
                                                text-align:center;
                                            ">
                                                ✕ Pengaduan Ditolak
                                            </div>

                                        @endif

                                    </div>
                                </td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

            @else

                <div class="empty">
                    <div style="font-size:30px;margin-bottom:10px;">📭</div>
                    Belum ada pengaduan yang tersedia untuk dipantau.
                </div>

            @endif

        </div>

    </section>

</main>

</body>
</html>
