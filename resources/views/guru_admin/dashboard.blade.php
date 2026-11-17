<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Dashboard Guru/Admin - SAPA</title>

<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: Arial, sans-serif;
}

html {
    scroll-behavior: smooth;
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
    padding: 25px 18px;
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

/* DATA MASTER */
.data-master-toggle {
    cursor: pointer;
}

.data-master-menu {
    display: flex;
    flex-direction: column;
    gap: 4px;
    margin-top: 2px;
    padding-left: 0;
}

/* Submenu mengikuti tampilan laptop */
.data-master-menu a {
    display: flex;
    align-items: center;
    gap: 8px;
    font-size: 11px;
    padding: 10px 8px 10px 25px;
    color: #9497ad;
    border-radius: 10px;
    overflow-wrap: anywhere;
}

.data-master-menu a:hover,
.data-master-menu a.active {
    background: #f4f3ff;
    color: #6675ca;
}

/* LOGOUT */
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

/* MAIN */
.main {
    margin-left: 245px;
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

.profile:active {
    background: #eef1ff;
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

.blue { background: #e9edff; color: #6978ca; }
.yellow { background: #fff5db; color: #c59a48; }
.purple { background: #f1eaff; color: #8b6ec7; }
.green { background: #e7f8ee; color: #62a97e; }
.red { background: #ffe9eb; color: #c87887; }

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

/* REKAP AGREGAT */
.rekap-grid {
    display: grid;
    grid-template-columns: repeat(3, minmax(0, 1fr));
    gap: 15px;
    margin-bottom: 30px;
}

.rekap-card {
    background: #fff;
    border: 1px solid #eceef8;
    border-radius: 17px;
    padding: 18px;
    min-width: 0;
}

.rekap-card h3 {
    font-size: 13px;
    color: #555b8e;
    margin-bottom: 13px;
}

.rekap-table {
    width: 100%;
    border-collapse: collapse;
    min-width: 0;
}

.rekap-table th,
.rekap-table td {
    padding: 11px 8px;
    border-bottom: 1px solid #f0f1f7;
    font-size: 10px;
    text-align: left;
}

.rekap-table th {
    background: #fafaff;
    color: #8589a3;
}

.rekap-table td:last-child,
.rekap-table th:last-child {
    text-align: center;
}

.rekap-empty {
    color: #a3a6b8;
    font-size: 10px;
    text-align: center;
    padding: 15px 5px;
}

@media (max-width: 1100px) {
    .rekap-grid {
        grid-template-columns: 1fr;
    }
}

/* TABEL */
.table-card {
    background: #fff;
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
    min-width: 1050px;
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
}

/* STATUS */
.status {
    display: inline-block;
    padding: 6px 10px;
    border-radius: 20px;
    font-size: 9px;
    font-weight: bold;
}

.status-menunggu { background: #fff5dc; color: #bd9449; }
.status-diproses { background: #eeeaff; color: #8168bd; }
.status-selesai { background: #e6f7ed; color: #5c9c76; }
.status-ditolak { background: #ffe8eb; color: #bd6e7d; }

/* AKSI */
.action-area {
    display: flex;
    flex-direction: column;
    gap: 6px;
    min-width: 145px;
}

.action-form {
    width: 100%;
}

.action-button {
    width: 100%;
    border: none;
    padding: 8px 10px;
    border-radius: 9px;
    font-size: 9px;
    font-weight: bold;
    cursor: pointer;
}

.btn-process { background: #e9edff; color: #6877c7; }
.btn-process:hover { background: #dfe4ff; }
.btn-reject { background: #ffe9eb; color: #bd6e7d; }
.btn-reject:hover { background: #ffdde1; }
.btn-finish { background: #e7f8ee; color: #5c9c76; }
.btn-finish:hover { background: #d9f2e3; }

/* TANGGAPAN */
.response-box {
    margin-top: 7px;
    padding: 10px;
    background: #fafaff;
    border-radius: 10px;
    border: 1px solid #eceef8;
}

.response-box textarea {
    width: 100%;
    min-height: 65px;
    resize: vertical;
    border: 1px solid #e0e2ef;
    border-radius: 8px;
    padding: 8px;
    font-size: 10px;
    color: #555a7e;
    outline: none;
}

.response-box textarea:focus {
    border-color: #8998df;
}

.response-box button {
    margin-top: 6px;
    width: 100%;
    border: none;
    background: #8998df;
    color: white;
    padding: 8px;
    border-radius: 8px;
    font-size: 9px;
    cursor: pointer;
}

.response-box button:hover {
    background: #7788d5;
}

/* KOSONG */
.empty {
    text-align: center;
    padding: 45px 20px;
    color: #a3a6b8;
    font-size: 12px;
}

/* RESPONSIVE LAPTOP */
@media (max-width: 1100px) {
    .stats {
        grid-template-columns: repeat(3, minmax(0, 1fr));
    }
}

/* RESPONSIVE HP */
@media (max-width: 800px) {
    .sidebar {
        width: 210px;
        padding: 20px 12px;
        padding-bottom: 100px;
    }

    .logo-area {
        justify-content: flex-start;
        padding: 0 4px;
        gap: 9px;
        margin-bottom: 25px;
    }

    .logo {
        width: 40px;
        height: 40px;
    }

    .logo-text {
        display: block;
        min-width: 0;
    }

    .logo-text h2 {
        font-size: 17px;
    }

    .logo-text p {
        font-size: 8px;
        line-height: 1.5;
    }

    .menu-title {
        display: block;
        font-size: 9px;
    }

    .menu {
        gap: 5px;
    }

    .menu a {
        justify-content: flex-start;
        padding: 11px 8px;
        gap: 8px;
        font-size: 11px;
    }

    .menu a span {
        display: block;
    }

    .menu-icon {
        font-size: 15px;
        width: 22px;
    }

    .data-master-menu {
        display: flex !important;
        flex-direction: column;
        padding-left: 0;
        width: 100%;
    }

    .data-master-menu a {
        display: flex;
        justify-content: flex-start;
        padding: 10px 5px 10px 25px;
        font-size: 10px;
        white-space: normal;
        overflow-wrap: anywhere;
    }

    .logout-area {
        position: fixed;
        left: 12px;
        right: auto;
        bottom: 15px;
        width: 186px;
    }

    .logout-button {
        display: block;
    }

    .main {
        margin-left: 210px;
        padding: 20px 15px;
        min-width: 0;
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
        display: flex;
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
        overflow-wrap: anywhere;
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

    .data-master-menu a {
        padding-left: 24px;
        font-size: 9px;
    }

    .logout-area {
        left: 9px;
        width: 172px;
    }

    .main {
        margin-left: 190px;
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

/* POSISI TUJUAN SCROLL */
#statistik {
    scroll-margin-top: 25px;
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

        <!-- DASHBOARD -->
        <a href="{{ route('guru_admin.dashboard') }}" class="active">
            <div class="menu-icon">🏠</div>
            <span>Dashboard</span>
        </a>

        <!-- PENGADUAN -->
        <a href="#pengaduan">
            <div class="menu-icon">📋</div>
            <span>Kelola Pengaduan</span>
        </a>

        <!-- STATISTIK -->
        <a href="#statistik"
           onclick="document.getElementById('statistik').scrollIntoView({ behavior: 'smooth', block: 'start' }); return false;">
            <div class="menu-icon">📊</div>
            <span>Statistik</span>
        </a>

        <!-- DATA MASTER -->
        <a href="#dataMasterSubmenu" class="data-master-toggle">
            <div class="menu-icon">🗂️</div>
            <span>Data Master</span>
        </a>

        <!-- TIGA SUBMENU SELALU TAMPIL -->
        <div class="data-master-menu" id="dataMasterSubmenu">

            <a href="{{ route('kategori.index') }}">
                🗂️ <span>Data Kategori</span>
            </a>

            <a href="{{ route('status.index') }}">
                📌 <span>Data Status</span>
            </a>

            <a href="{{ route('pengguna.index') }}">
                👥 <span>Data Pengguna</span>
            </a>

        </div>

    </nav>

    <!-- LOGOUT -->
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
            <h1>Dashboard Guru/Admin</h1>
            <p>Kelola dan berikan tanggapan terhadap pengaduan siswa sesuai kategori.</p>
        </div>

        <!-- PROFILE -->
        <a href="{{ route('profil') }}" class="profile" title="Buka Profil">

            <div class="profile-icon">
                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
            </div>

            <div>
                <div class="profile-name">{{ Auth::user()->name }}</div>
                <div class="profile-role">Guru / Admin</div>
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
        <h2>Panel Pengelolaan Pengaduan</h2>

        <p>
            Guru/Admin bertugas melihat pengaduan siswa dan memberikan
            tanggapan sesuai kategori yang menjadi tanggung jawabnya.
            Proses penerimaan, pemrosesan, dan penolakan pengaduan
            dilakukan oleh Wakasek.
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
                <div class="stat-number">{{ $menunggu }}</div>
                <div class="stat-label">Menunggu Tindakan</div>
            </div>

            <div class="stat-card">
                <div class="stat-top">
                    <div class="stat-icon purple">⚙️</div>
                </div>
                <div class="stat-number">{{ $diproses }}</div>
                <div class="stat-label">Sedang Diproses</div>
            </div>

            <div class="stat-card">
                <div class="stat-top">
                    <div class="stat-icon green">✓</div>
                </div>
                <div class="stat-number">{{ $selesai }}</div>
                <div class="stat-label">Selesai</div>
            </div>

            <div class="stat-card">
                <div class="stat-top">
                    <div class="stat-icon red">×</div>
                </div>
                <div class="stat-number">{{ $ditolak }}</div>
                <div class="stat-label">Ditolak</div>
            </div>

        </div>
    </section>


    

    <!-- DATA PENGADUAN -->
         <!-- REKAP AGREGAT -->
    <section id="rekap-agregat">

        <h2 class="section-title">Rekapitulasi Data Pengaduan</h2>

        <div class="rekap-grid">

            <!-- REKAP KATEGORI -->
            <div class="rekap-card">

                <h3>📂 Berdasarkan Kategori</h3>

                <table class="rekap-table">
                    <thead>
                        <tr>
                            <th>Kategori</th>
                            <th>Jumlah</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($rekapKategori as $item)
                            <tr>
                                <td>{{ $item->nama_kategori }}</td>
                                <td>{{ $item->total_data }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="2" class="rekap-empty">
                                    Belum ada data kategori.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

            </div>

            <!-- REKAP STATUS -->
            <div class="rekap-card">

                <h3>📌 Berdasarkan Status</h3>

                <table class="rekap-table">
                    <thead>
                        <tr>
                            <th>Status</th>
                            <th>Jumlah</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($rekapStatus as $item)
                            <tr>
                                <td>{{ $item->nama_status }}</td>
                                <td>{{ $item->total_data }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="2" class="rekap-empty">
                                    Belum ada data status.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

            </div>

            <!-- REKAP KELAS -->
            <div class="rekap-card">

                <h3>🎓 Berdasarkan Kelas</h3>

                <table class="rekap-table">
                    <thead>
                        <tr>
                            <th>Kelas</th>
                            <th>Jumlah</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($rekapKelas as $item)
                            <tr>
                                <td>{{ $item->kelas ?? 'Belum diisi' }}</td>
                                <td>{{ $item->total_data }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="2" class="rekap-empty">
                                    Belum ada data kelas.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

            </div>

        </div>

    </section>
    <section id="pengaduan">

        <div class="table-card">

            <div class="table-header">

                <div>
                    <h2>Kelola Pengaduan Siswa</h2>
                    <p>Berikan tanggapan terhadap pengaduan siswa sesuai kategori.</p>
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
                                <th>Tindakan</th>
                            </tr>
                        </thead>

                        <tbody>

                        @foreach ($pengaduan as $item)

                            <tr>

                                <!-- TIKET -->
                                <td>
                                    <div class="ticket">
                                        {{ $item->nomor_tiket }}
                                    </div>
                                </td>

                                <!-- SISWA -->
                                <td>
                                    <div class="student-name">
                                        {{ $item->nama_siswa }}
                                    </div>

                                    <div class="student-info">
                                        {{ $item->nis }} · {{ $item->kelas }}
                                    </div>
                                </td>

                                <!-- KATEGORI -->
                                <td>{{ $item->nama_kategori }}</td>

                                <!-- PENGADUAN -->
                                <td>
                                    <strong style="color:#5d6280;">
                                        {{ $item->judul }}
                                    </strong>

                                    <div style="color:#a1a4b5;font-size:9px;margin-top:5px;max-width:220px;">
                                        {{ \Illuminate\Support\Str::limit($item->isi_pengaduan, 70) }}
                                    </div>
                                </td>

                                <!-- TANGGAL -->
                                <td>
                                    {{ date('d/m/Y', strtotime($item->tanggal_pengaduan)) }}
                                </td>

                                <!-- STATUS -->
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

                                <!-- AKSI -->
                                <td>

                                    <div class="action-area">

                                        @if ($item->nama_status === 'Menunggu')

                                            <div style="background:#fff5dc;color:#bd9449;padding:8px;border-radius:9px;font-size:9px;text-align:center;">
                                                Menunggu keputusan Wakasek
                                            </div>

                                        @elseif ($item->nama_status === 'Diproses')

                                            <!-- KIRIM TANGGAPAN -->
                                            <div class="response-box">
                                                <form
                                                    action="{{ route('guru_admin.pengaduan.tanggapan', $item->id) }}"
                                                    method="POST"
                                                >
                                                    @csrf

                                                    <textarea
                                                        name="tanggapan"
                                                        placeholder="Tulis tanggapan untuk siswa..."
                                                        required
                                                    ></textarea>

                                                    <button type="submit">
                                                        💬 Kirim Tanggapan
                                                    </button>
                                                </form>
                                            </div>

                                        @elseif ($item->nama_status === 'Selesai')

                                            <div style="background:#e7f8ee;color:#5c9c76;padding:8px;border-radius:9px;font-size:9px;text-align:center;">
                                                ✓ Pengaduan telah selesai
                                            </div>

                                        @elseif ($item->nama_status === 'Ditolak')

                                            <div style="background:#ffe9eb;color:#bd6e7d;padding:8px;border-radius:9px;font-size:9px;text-align:center;">
                                                ✕ Pengaduan ditolak
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
                    Belum ada pengaduan siswa yang masuk.
                </div>

            @endif

        </div>

    </section>

</main>

</body>
</html>