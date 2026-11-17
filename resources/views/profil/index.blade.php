<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Profil - SAPA</title>

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
        }

        /* DATA MASTER */

        .data-master-menu {
            display: flex;
            flex-direction: column;
            gap: 4px;
            margin-top: 2px;
        }

        .data-master-menu a {
            font-size: 11px;
            padding: 9px 10px 9px 48px;
            color: #9497ad;
        }

        .data-master-menu a:hover {
            background: #f4f3ff;
            color: #6675ca;
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
            margin-bottom: 28px;
            gap: 15px;
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

        .back-button {
            display: inline-block;
            text-decoration: none;
            background: #eef0ff;
            color: #6877c7;
            padding: 10px 15px;
            border-radius: 10px;
            font-size: 11px;
            font-weight: bold;
            white-space: nowrap;
            transition: 0.2s;
        }

        .back-button:hover {
            background: #dfe4ff;
        }

        /* PROFILE CARD */

        .profile-card {
            background: #ffffff;
            border: 1px solid #eceef8;
            border-radius: 22px;
            padding: 30px;
            max-width: 850px;
        }

        .profile-header {
            display: flex;
            align-items: center;
            gap: 18px;
            padding-bottom: 25px;
            border-bottom: 1px solid #eff0f7;
            margin-bottom: 25px;
        }

        .profile-big-icon {
            width: 70px;
            height: 70px;
            border-radius: 20px;
            background: #e9edff;
            color: #6877c7;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 28px;
            font-weight: bold;
            flex-shrink: 0;
        }

        .profile-header h2 {
            color: #555b8e;
            font-size: 20px;
            margin-bottom: 5px;
        }

        .profile-header p {
            color: #a0a3b5;
            font-size: 11px;
        }

        /* PROFILE INFORMATION */

        .profile-info {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
        }

        .info-item {
            background: #fafaff;
            border: 1px solid #eceef8;
            border-radius: 14px;
            padding: 16px;
        }

        .info-label {
            color: #a0a3b5;
            font-size: 10px;
            margin-bottom: 7px;
        }

        .info-value {
            color: #555a7e;
            font-size: 12px;
            font-weight: bold;
            word-break: break-word;
        }

        /* ROLE BADGE */

        .role-badge {
            display: inline-block;
            background: #eeeaff;
            color: #8168bd;
            padding: 6px 10px;
            border-radius: 20px;
            font-size: 10px;
        }

        /* LOGOUT */

        .logout-area {
            margin-top: 30px;
            padding-top: 25px;
            border-top: 1px solid #eff0f7;
        }

        .logout-title {
            color: #777b96;
            font-size: 11px;
            margin-bottom: 10px;
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
            font-weight: bold;
        }

        .logout-button:hover {
            background: #ffe5e8;
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
            .data-master-menu {
                display: none;
            }

            .menu a {
                justify-content: center;
                padding: 13px 5px;
            }

            .main {
                margin-left: 70px;
                padding: 20px;
            }

            .profile-info {
                grid-template-columns: 1fr;
            }

        }

        @media (max-width: 500px) {

            .main {
                padding: 15px;
            }

            .topbar {
                align-items: flex-start;
                flex-direction: column;
            }

            .welcome h1 {
                font-size: 21px;
            }

            .profile-card {
                padding: 20px;
            }

            .profile-header {
                align-items: flex-start;
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

            {{-- SISWA --}}

            @if ($user->role === 'siswa')

                <a href="{{ route('dashboard') }}">
                    <div class="menu-icon">🏠</div>
                    <span>Dashboard</span>
                </a>

                <a href="{{ route('dashboard') }}#pengaduan">
                    <div class="menu-icon">📋</div>
                    <span>Pengaduan</span>
                </a>

                <a href="{{ route('profil') }}" class="active">
                    <div class="menu-icon">👤</div>
                    <span>Profil</span>
                </a>

            {{-- GURU / ADMIN --}}

            @elseif ($user->role === 'guru_admin')

                <a href="{{ route('guru_admin.dashboard') }}">
                    <div class="menu-icon">🏠</div>
                    <span>Dashboard</span>
                </a>

                <a href="{{ route('guru_admin.dashboard') }}#pengaduan">
                    <div class="menu-icon">📋</div>
                    <span>Kelola Pengaduan</span>
                </a>

                <a href="{{ route('guru_admin.dashboard') }}#statistik">
                    <div class="menu-icon">📊</div>
                    <span>Statistik</span>
                </a>

                <a href="{{ route('kategori.index') }}">
                    <div class="menu-icon">🗂️</div>
                    <span>Data Master</span>
                </a>

                <div class="data-master-menu">

                    <a href="{{ route('kategori.index') }}">
                        🗂️ Data Kategori
                    </a>

                    <a href="{{ route('status.index') }}">
                        📌 Data Status
                    </a>

                    <a href="{{ route('pengguna.index') }}">
                        👥 Data Pengguna
                    </a>

                </div>

                <a href="{{ route('profil') }}" class="active">
                    <div class="menu-icon">👤</div>
                    <span>Profil</span>
                </a>

            {{-- GURU PEMANTAU --}}

            @elseif ($user->role === 'guru_pemantau')

                <a href="{{ route('guru_pemantau.dashboard') }}">
                    <div class="menu-icon">🏠</div>
                    <span>Dashboard</span>
                </a>

                <a href="{{ route('guru_pemantau.pengaduan') }}">
                    <div class="menu-icon">📋</div>
                    <span>Pantau Pengaduan</span>
                </a>

                <a href="{{ route('profil') }}" class="active">
                    <div class="menu-icon">👤</div>
                    <span>Profil</span>
                </a>

            {{-- WAKASEK --}}

            @elseif ($user->role === 'wakasek')

                <a href="{{ route('wakasek.dashboard') }}">
                    <div class="menu-icon">🏠</div>
                    <span>Dashboard</span>
                </a>

                <a href="{{ route('wakasek.dashboard') }}#pengaduan">
                    <div class="menu-icon">📋</div>
                    <span>Pengaduan</span>
                </a>

                <a href="{{ route('profil') }}" class="active">
                    <div class="menu-icon">👤</div>
                    <span>Profil</span>
                </a>

            {{-- KEPALA SEKOLAH --}}

            @elseif ($user->role === 'kepala_sekolah')

                <a href="{{ route('kepala_sekolah.dashboard') }}">
                    <div class="menu-icon">🏠</div>
                    <span>Dashboard</span>
                </a>

                <a href="{{ route('kepala_sekolah.dashboard') }}#pengaduan">
                    <div class="menu-icon">📋</div>
                    <span>Pengaduan</span>
                </a>

                <a href="{{ route('profil') }}" class="active">
                    <div class="menu-icon">👤</div>
                    <span>Profil</span>
                </a>

            @endif

        </nav>

    </aside>

    <!-- MAIN CONTENT -->

    <main class="main">

        <!-- TOPBAR -->

        <div class="topbar">

            <div class="welcome">

                <h1>

                    @if ($user->role === 'siswa')
                        Profil Siswa

                    @elseif ($user->role === 'guru_admin')
                        Profil Guru/Admin

                    @elseif ($user->role === 'guru_pemantau')
                        Profil Guru Pemantau

                    @elseif ($user->role === 'wakasek')
                        Profil Wakasek

                    @elseif ($user->role === 'kepala_sekolah')
                        Profil Kepala Sekolah

                    @else
                        Profil Pengguna
                    @endif

                </h1>

                <p>
                    Informasi akun pengguna SAPA.
                </p>

            </div>

            <!-- TOMBOL KEMBALI KE DASHBOARD -->

            @if ($user->role === 'siswa')

                <a href="{{ route('dashboard') }}" class="back-button">
                    ← Kembali ke Dashboard
                </a>

            @elseif ($user->role === 'guru_admin')

                <a href="{{ route('guru_admin.dashboard') }}" class="back-button">
                    ← Kembali ke Dashboard
                </a>

            @elseif ($user->role === 'guru_pemantau')

                <a href="{{ route('guru_pemantau.dashboard') }}" class="back-button">
                    ← Kembali ke Dashboard
                </a>

            @elseif ($user->role === 'wakasek')

                <a href="{{ route('wakasek.dashboard') }}" class="back-button">
                    ← Kembali ke Dashboard
                </a>

            @elseif ($user->role === 'kepala_sekolah')

                <a href="{{ route('kepala_sekolah.dashboard') }}" class="back-button">
                    ← Kembali ke Dashboard
                </a>

            @endif

        </div>

        <!-- PROFILE CARD -->

        <div class="profile-card">

            <!-- PROFILE HEADER -->

            <div class="profile-header">

                <div class="profile-big-icon">
                    {{ strtoupper(substr($user->name, 0, 1)) }}
                </div>

                <div>

                    <h2>
                        {{ $user->name }}
                    </h2>

                    <p>

                        @if ($user->role === 'siswa')
                            Akun Siswa SAPA

                        @elseif ($user->role === 'guru_admin')
                            Akun Guru / Admin SAPA

                        @elseif ($user->role === 'guru_pemantau')
                            Akun Guru Pemantau SAPA

                        @elseif ($user->role === 'wakasek')
                            Akun Wakasek SAPA

                        @elseif ($user->role === 'kepala_sekolah')
                            Akun Kepala Sekolah SAPA

                        @else
                            Akun Pengguna SAPA
                        @endif

                    </p>

                </div>

            </div>

            <!-- DATA PROFILE -->

<div class="profile-info">

    {{-- NAMA AKUN --}}
    <div class="info-item">
        <div class="info-label">Nama</div>
        <div class="info-value">
            {{ $user->name }}
        </div>
    </div>

    {{-- EMAIL --}}
    <div class="info-item">
        <div class="info-label">Email</div>
        <div class="info-value">
            {{ $user->email }}
        </div>
    </div>

    {{-- DATA SISWA --}}
    @if ($user->role === 'siswa')

        <div class="info-item">
            <div class="info-label">NIS</div>
            <div class="info-value">
                {{ $siswa->nis ?? '-' }}
            </div>
        </div>

        <div class="info-item">
            <div class="info-label">Kelas</div>
            <div class="info-value">
                {{ $siswa->kelas ?? '-' }}
            </div>
        </div>

        <div class="info-item">
            <div class="info-label">Jurusan</div>
            <div class="info-value">
                {{ $siswa->jurusan ?? '-' }}
            </div>
        </div>

        <div class="info-item">
            <div class="info-label">Nomor Telepon</div>
            <div class="info-value">
                {{ $user->phone_number ?? '-' }}
            </div>
        </div>

        <div class="info-item">
            <div class="info-label">Role</div>
            <div class="info-value">
                <span class="role-badge">Siswa</span>
            </div>
        </div>

    {{-- DATA GURU / ADMIN --}}
    @elseif ($user->role === 'guru_admin')

        <div class="info-item">
            <div class="info-label">NIP</div>
            <div class="info-value">
                {{ $guruAdmin->nip ?? '-' }}
            </div>
        </div>

        <div class="info-item">
            <div class="info-label">Jabatan</div>
            <div class="info-value">
                {{ $guruAdmin->jabatan ?? 'Guru / Admin' }}
            </div>
        </div>

        <div class="info-item">
            <div class="info-label">Nomor Telepon</div>
            <div class="info-value">
                {{ $user->phone_number ?? '-' }}
            </div>
        </div>

        <div class="info-item">
            <div class="info-label">Role</div>
            <div class="info-value">
                <span class="role-badge">Guru / Admin</span>
            </div>
        </div>

    {{-- DATA GURU PEMANTAU --}}
    @elseif ($user->role === 'guru_pemantau')

        <div class="info-item">
            <div class="info-label">NIP</div>
            <div class="info-value">
                {{ $guruPemantau->nip ?? '-' }}
            </div>
        </div>

        <div class="info-item">
            <div class="info-label">Jabatan</div>
            <div class="info-value">
                {{ $guruPemantau->jabatan ?? 'Guru Pemantau' }}
            </div>
        </div>

        <div class="info-item">
            <div class="info-label">Nomor Telepon</div>
            <div class="info-value">
                {{ $user->phone_number ?? '-' }}
            </div>
        </div>

        <div class="info-item">
            <div class="info-label">Role</div>
            <div class="info-value">
                <span class="role-badge">Guru Pemantau</span>
            </div>
        </div>

    {{-- DATA WAKASEK --}}
    @elseif ($user->role === 'wakasek')

        <div class="info-item">
            <div class="info-label">NIP</div>
            <div class="info-value">
                {{ $wakasek->nip ?? '-' }}
            </div>
        </div>

        <div class="info-item">
            <div class="info-label">Jabatan</div>
            <div class="info-value">
                {{ $wakasek->jabatan_wakasek ?? 'Wakasek' }}
            </div>
        </div>

        <div class="info-item">
            <div class="info-label">Nomor Telepon</div>
            <div class="info-value">
                {{ $user->phone_number ?? '-' }}
            </div>
        </div>

        <div class="info-item">
            <div class="info-label">Role</div>
            <div class="info-value">
                <span class="role-badge">Wakasek</span>
            </div>
        </div>

    {{-- DATA KEPALA SEKOLAH --}}
    @elseif ($user->role === 'kepala_sekolah')

        <div class="info-item">
            <div class="info-label">NIP</div>
            <div class="info-value">
                {{ $kepalaSekolah->nip ?? '-' }}
            </div>
        </div>

        <div class="info-item">
            <div class="info-label">Jabatan</div>
            <div class="info-value">
                Kepala Sekolah
            </div>
        </div>

        <div class="info-item">
            <div class="info-label">Nomor Telepon</div>
            <div class="info-value">
                {{ $user->phone_number ?? '-' }}
            </div>
        </div>

        <div class="info-item">
            <div class="info-label">Role</div>
            <div class="info-value">
                <span class="role-badge">Kepala Sekolah</span>
            </div>
        </div>

    @endif

</div>
            <!-- LOGOUT -->

            <div class="logout-area">

                <div class="logout-title">
                    Ingin keluar dari akun SAPA?
                </div>

                <form action="{{ route('logout') }}" method="POST">

                    @csrf

                    <button type="submit" class="logout-button">
                        Keluar dari Akun
                    </button>

                </form>

            </div>

        </div>

    </main>

</body>

</html>