<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Master Pengguna - SAPA</title>

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

        .menu > a {
            display: flex;
            align-items: center;
            gap: 12px;
            text-decoration: none;
            color: #8589a3;
            padding: 12px 13px;
            border-radius: 12px;
            font-size: 12px;
            transition: .2s;
        }

        .menu > a:hover,
        .menu > a.active,
        .submenu a:hover,
        .submenu a.active {
            background: #eef0ff;
            color: #6675ca;
        }

        .menu-icon {
            width: 24px;
            min-width: 24px;
            text-align: center;
            font-size: 15px;
            flex-shrink: 0;
        }

        /* SUBMENU */
        .submenu {
            display: flex;
            flex-direction: column;
            gap: 4px;
            margin: 2px 0 3px;
            padding-left: 24px;
        }

        .submenu a {
            display: flex;
            align-items: center;
            gap: 8px;
            text-decoration: none;
            color: #9497ad;
            font-size: 11px;
            padding: 10px 8px;
            border-radius: 10px;
            transition: .2s;
        }

        .submenu a.active {
            font-weight: bold;
        }

        .submenu-icon {
            width: 18px;
            text-align: center;
            font-size: 12px;
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
            background: #ffe7eb;
        }

        /* MAIN */
        .main {
            margin-left: 245px;
            width: calc(100% - 245px);
            min-height: 100vh;
            padding: 30px;
            min-width: 0;
        }

        /* TOPBAR */
        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            margin-bottom: 28px;
        }

        .welcome {
            min-width: 0;
        }

        .welcome h1 {
            font-size: 25px;
            color: #4d578f;
            margin-bottom: 7px;
            overflow-wrap: anywhere;
        }

        .welcome p {
            font-size: 12px;
            color: #989caf;
            line-height: 1.6;
        }

        /* PROFILE */
        .profile-link {
            text-decoration: none;
            color: inherit;
            display: block;
            flex-shrink: 0;
        }

        .profile {
            display: flex;
            align-items: center;
            gap: 10px;
            background: #fff;
            padding: 9px 14px;
            border-radius: 14px;
            border: 1px solid #eceef8;
            cursor: pointer;
            transition: .2s;
        }

        .profile:hover {
            background: #f8f9ff;
            border-color: #dfe3fa;
            transform: translateY(-1px);
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

        /* HEADER */
        .page-header {
            width: 100%;
            background: linear-gradient(135deg, #e9edff, #f5f1ff);
            border-radius: 20px;
            padding: 23px;
            margin-bottom: 25px;
            border: 1px solid #e4e7fa;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 18px;
        }

        .page-header h2 {
            color: #5864a2;
            font-size: 17px;
            margin-bottom: 7px;
        }

        .page-header p {
            color: #8589a3;
            font-size: 11px;
            line-height: 1.7;
        }

        /* BUTTON */
        .add-button {
            border: none;
            background: #8998df;
            color: #fff;
            padding: 11px 17px;
            border-radius: 11px;
            cursor: pointer;
            font-size: 11px;
            font-weight: bold;
            transition: .2s;
            white-space: nowrap;
            flex-shrink: 0;
        }

        .add-button:hover {
            background: #7788d5;
            transform: translateY(-1px);
        }

        /* ALERT */
        .alert {
            padding: 12px 15px;
            border-radius: 10px;
            margin-bottom: 18px;
            font-size: 12px;
            line-height: 1.5;
        }

        .alert-success {
            background: #e6f7ed;
            color: #5c9c76;
        }

        .alert-error {
            background: #ffe8eb;
            color: #bd6e7d;
        }

        /* TABLE */
        .table-card {
            width: 100%;
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

        .table-wrapper {
            width: 100%;
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
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
            white-space: nowrap;
        }

        td {
            padding: 15px 17px;
            border-top: 1px solid #f0f1f7;
            color: #696d87;
            font-size: 11px;
            vertical-align: middle;
        }

        .number {
            width: 45px;
            color: #a1a4b5;
        }

        .user-name {
            margin-bottom: 3px;
            color: #5d6280;
            font-weight: bold;
        }

        .user-email {
            color: #a1a4b5;
            font-size: 9px;
            overflow-wrap: anywhere;
        }

        /* ROLE */
        .role {
            display: inline-block;
            padding: 6px 10px;
            border-radius: 20px;
            font-size: 9px;
            font-weight: bold;
            white-space: nowrap;
        }

        .role-siswa {
            background: #e9edff;
            color: #6877c7;
        }

        .role-guru {
            background: #f1eaff;
            color: #8168bd;
        }

        .role-wakasek {
            background: #fff5dc;
            color: #bd9449;
        }

        .role-kepala {
            background: #e6f7ed;
            color: #5c9c76;
        }

        /* AKSI */
        .aksi,
        .aksi form {
            display: flex;
            align-items: center;
            gap: 7px;
            margin: 0;
        }

        .btn {
            border: none;
            padding: 7px 11px;
            border-radius: 9px;
            font-size: 9px;
            cursor: pointer;
            white-space: nowrap;
        }

        .btn-edit {
            background: #e9edff;
            color: #6877c7;
        }

        .btn-edit:hover {
            background: #dde2ff;
        }

        .btn-hapus {
            background: #ffe9eb;
            color: #c87887;
        }

        .btn-hapus:hover {
            background: #ffdde1;
        }

        .empty {
            text-align: center;
            padding: 45px 20px;
            color: #a3a6b8;
            font-size: 12px;
        }

        .empty-icon {
            margin-bottom: 10px;
            font-size: 30px;
        }

        /* MODAL */
        .modal {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(50, 55, 90, .30);
            justify-content: center;
            align-items: center;
            z-index: 1000;
            padding: 20px;
        }

        .modal-box {
            width: 100%;
            max-width: 450px;
            max-height: 90vh;
            overflow-y: auto;
            background: #fff;
            border-radius: 20px;
            padding: 22px;
            border: 1px solid #eceef8;
        }

        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 12px;
            margin-bottom: 20px;
        }

        .modal-header h2 {
            color: #555b8e;
            font-size: 17px;
        }

        .close {
            border: none;
            background: #ffe9eb;
            color: #c87887;
            width: 30px;
            height: 30px;
            border-radius: 50%;
            cursor: pointer;
            font-size: 18px;
            flex-shrink: 0;
        }

        .form-group {
            margin-bottom: 17px;
        }

        .form-group label {
            display: block;
            font-size: 10px;
            font-weight: bold;
            color: #696d87;
            margin-bottom: 7px;
        }

        .form-group input,
        .form-group select {
            width: 100%;
            border: 1px solid #e3e5f2;
            border-radius: 10px;
            padding: 11px 12px;
            font-size: 11px;
            color: #555a7e;
            outline: none;
            background: #fff;
        }

        .form-group input:focus,
        .form-group select:focus {
            border-color: #8998df;
        }

        .form-group input:disabled {
            background: #f2f3f9;
            cursor: not-allowed;
        }

        .profile-fields {
            display: none;
            padding: 15px;
            margin-bottom: 15px;
            background: #fafaff;
            border: 1px solid #eceef8;
            border-radius: 13px;
        }

        .profile-fields h3 {
            margin-bottom: 14px;
            color: #5864a2;
            font-size: 12px;
        }

        .modal-actions {
            display: flex;
            justify-content: flex-end;
            flex-wrap: wrap;
            gap: 8px;
            margin-top: 20px;
        }

        .btn-batal,
        .btn-simpan {
            border: none;
            padding: 11px 15px;
            border-radius: 10px;
            cursor: pointer;
            font-size: 11px;
            font-weight: bold;
        }

        .btn-batal {
            background: #f0f1f7;
            color: #777b96;
        }

        .btn-simpan {
            background: #8998df;
            color: #fff;
        }

        .btn-simpan:hover {
            background: #7788d5;
        }

        /* RESPONSIVE TABLET */
        @media (max-width: 900px) {
            .sidebar {
                width: 210px;
                padding: 20px 12px 100px;
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
            }

            .menu-title {
                display: block;
                font-size: 9px;
            }

            .menu {
                gap: 5px;
            }

            .menu > a {
                justify-content: flex-start;
                padding: 11px 8px;
                gap: 8px;
                font-size: 11px;
            }

            .menu-icon {
                width: 22px;
                min-width: 22px;
                font-size: 14px;
            }

            .submenu {
                display: flex;
                flex-direction: column;
                gap: 4px;
                margin: 2px 0 3px;
                padding-left: 0;
                width: 100%;
            }

            .submenu a {
                display: flex;
                justify-content: flex-start;
                gap: 8px;
                padding: 10px 5px 10px 25px;
                font-size: 10px;
                white-space: normal;
                overflow-wrap: anywhere;
            }

            .submenu-icon {
                display: block;
                width: 18px;
                flex-shrink: 0;
            }

            .logout-area {
                left: 12px;
                bottom: 15px;
                width: 186px;
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

            .page-header {
                align-items: flex-start;
                flex-wrap: wrap;
            }
        }

        /* RESPONSIVE HP */
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

            .menu > a {
                gap: 6px;
                padding: 10px 5px;
                font-size: 10px;
            }

            .menu-icon {
                width: 20px;
                min-width: 20px;
                font-size: 14px;
            }

            .submenu a {
                padding: 10px 3px 10px 20px;
                font-size: 9px;
                gap: 5px;
            }

            .submenu-icon {
                width: 16px;
                font-size: 11px;
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

            .topbar {
                align-items: flex-start;
                flex-wrap: wrap;
                gap: 12px;
            }

            .welcome h1 {
                font-size: 18px;
                overflow-wrap: anywhere;
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

            .page-header {
                padding: 15px;
            }

            .page-header h2 {
                font-size: 15px;
            }

            .page-header p {
                font-size: 10px;
            }

            .add-button {
                width: 100%;
                white-space: normal;
            }

            .table-header {
                padding: 15px;
            }

            .table-header h2 {
                font-size: 14px;
            }

            .table-header p {
                font-size: 9px;
            }

            .modal {
                padding: 12px;
            }

            .modal-box {
                padding: 18px;
            }
        }
    </style>
</head>

<body>

    <!-- SIDEBAR -->
    <aside class="sidebar">
        <div class="logo-area">
            <img src="{{ asset('images/logo-sapa.jpeg') }}" alt="Logo SAPA" class="logo">

            <div class="logo-text">
                <h2>SAPA</h2>
                <p>Sampaikan Aspirasi, Wujudkan Solusi</p>
            </div>
        </div>

        <div class="menu-title">Menu Utama</div>

        <nav class="menu">
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

            <a href="{{ route('kategori.index') }}" class="active">
                <div class="menu-icon">📁</div>
                <span>Data Master</span>
            </a>

            <div class="submenu">
                <a href="{{ route('kategori.index') }}">
                    <div class="submenu-icon">📂</div>
                    <span>Data Kategori</span>
                </a>

                <a href="{{ route('status.index') }}">
                    <div class="submenu-icon">📌</div>
                    <span>Data Status</span>
                </a>

                <a href="{{ route('pengguna.index') }}" class="active">
                    <div class="submenu-icon">👥</div>
                    <span>Data Pengguna</span>
                </a>
            </div>
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
        <div class="topbar">
            <div class="welcome">
                <h1>Data Master Pengguna</h1>
                <p>Kelola akun pengguna yang dapat mengakses sistem SAPA.</p>
            </div>

            <a href="{{ route('profil') }}" class="profile-link" title="Buka Profil">
                <div class="profile">
                    <div class="profile-icon">
                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                    </div>

                    <div>
                        <div class="profile-name">{{ Auth::user()->name }}</div>
                        <div class="profile-role">Guru / Admin</div>
                    </div>
                </div>
            </a>
        </div>

        <!-- HEADER -->
        <section class="page-header">
            <div>
                <h2>Kelola Data Pengguna</h2>
                <p>
                    Tambahkan, ubah, dan kelola akun siswa, guru/admin,
                    wakasek, serta kepala sekolah.
                </p>
            </div>

            <button type="button" class="add-button" onclick="bukaTambah()">
                + Tambah Pengguna
            </button>
        </section>

        <!-- ALERT -->
        @if (session('success'))
            <div class="alert alert-success">
                ✓ {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-error">
                ⚠ {{ session('error') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-error">
                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif

        <!-- TABEL PENGGUNA -->
        <section class="table-card">
            <div class="table-header">
                <div>
                    <h2>👥 Daftar Pengguna</h2>
                    <p>Kelola akun pengguna sistem SAPA.</p>
                </div>
            </div>

            @if ($pengguna->count() > 0)
                <div class="table-wrapper">
                    <table>
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Pengguna</th>
                                <th>Role</th>
                                <th>No. Telepon</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($pengguna as $item)
                                <tr>
                                    <td class="number">{{ $loop->iteration }}</td>

                                    <td>
                                        <div class="user-name">{{ $item->name }}</div>
                                        <div class="user-email">{{ $item->email }}</div>
                                    </td>

                                    <td>
                                        @if ($item->role === 'siswa')
                                            <span class="role role-siswa">Siswa</span>
                                        @elseif ($item->role === 'guru_admin')
                                            <span class="role role-guru">Guru/Admin</span>
                                        @elseif ($item->role === 'wakasek')
                                            <span class="role role-wakasek">Wakasek</span>
                                        @elseif ($item->role === 'kepala_sekolah')
                                            <span class="role role-kepala">Kepala Sekolah</span>
                                        @else
                                            <span class="role role-siswa">{{ ucfirst($item->role) }}</span>
                                        @endif
                                    </td>

                                    <td>{{ $item->phone_number ?? '-' }}</td>

                                    <td>
                                        <div class="aksi">
                                            <button
                                                type="button"
                                                class="btn btn-edit"
                                                data-id="{{ $item->id }}"
                                                data-nama="{{ $item->name }}"
                                                data-email="{{ $item->email }}"
                                                data-role="{{ $item->role }}"
                                                data-phone="{{ $item->phone_number ?? '' }}"
                                                data-nis="{{ $item->nis ?? '' }}"
                                                data-kelas="{{ $item->kelas ?? '' }}"
                                                data-jurusan="{{ $item->jurusan ?? '' }}"
                                                data-nip="{{ $item->nip ?? '' }}"
                                                data-jabatan="{{ $item->jabatan ?? '' }}"
                                                data-jabatan-wakasek="{{ $item->jabatan_wakasek ?? '' }}"
                                                onclick="bukaEditDariTombol(this)">
                                                Edit
                                            </button>

                                            <form
                                                action="{{ route('pengguna.destroy', $item->id) }}"
                                                method="POST"
                                                onsubmit="return confirm('Yakin ingin menghapus pengguna ini?')">
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit" class="btn btn-hapus">
                                                    Hapus
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="empty">
                    <div class="empty-icon">👥</div>
                    Belum ada data pengguna.
                </div>
            @endif
        </section>
    </main>

    <!-- MODAL TAMBAH -->
    <div class="modal" id="modalTambah">
        <div class="modal-box">
            <div class="modal-header">
                <h2>➕ Tambah Pengguna</h2>
                <button type="button" class="close" onclick="tutupModal('modalTambah')">×</button>
            </div>

            <form action="{{ route('pengguna.store') }}" method="POST" id="formTambah" autocomplete="off">
                @csrf

                <div class="form-group">
                    <label for="tambahNama">Nama</label>
                    <input type="text" name="name" id="tambahNama"
                        placeholder="Masukkan nama pengguna" required>
                </div>

                <div class="form-group">
                    <label for="tambahEmail">Email</label>
                    <input type="email" name="email" id="tambahEmail"
                        placeholder="contoh@email.com" required>
                </div>

                <div class="form-group">
                    <label for="tambahPassword">Password</label>
                    <input type="password" name="password" id="tambahPassword"
                        placeholder="Minimal 8 karakter" required>
                </div>

                <div class="form-group">
                    <label for="tambahRole">Role</label>
                    <select name="role" id="tambahRole" onchange="ubahFieldTambah()" required>
                        <option value="">-- Pilih Role --</option>
                        <option value="siswa">Siswa</option>
                        <option value="guru_admin">Guru/Admin</option>
                        <option value="wakasek">Wakasek</option>
                        <option value="kepala_sekolah">Kepala Sekolah</option>
                    </select>
                </div>

                <div class="profile-fields" id="fieldTambahSiswa">
                    <h3>Data Siswa</h3>

                    <div class="form-group">
                        <label for="tambahNis">NIS</label>
                        <input type="text" name="nis" id="tambahNis"
                            placeholder="Masukkan NIS" disabled>
                    </div>

                    <div class="form-group">
                        <label for="tambahKelas">Kelas</label>
                        <input type="text" name="kelas" id="tambahKelas"
                            placeholder="Contoh: XII RPL 04" disabled>
                    </div>

                    <div class="form-group">
                        <label for="tambahJurusan">Jurusan</label>
                        <input type="text" name="jurusan" id="tambahJurusan"
                            placeholder="Contoh: PPLG" disabled>
                    </div>
                </div>

                <div class="profile-fields" id="fieldTambahGuru">
                    <h3>Data Guru / Admin</h3>

                    <div class="form-group">
                        <label for="tambahNipGuru">NIP</label>
                        <input type="text" name="nip" id="tambahNipGuru"
                            placeholder="Masukkan NIP (opsional)" disabled>
                    </div>

                    <div class="form-group">
                        <label for="tambahJabatan">Jabatan</label>
                        <input type="text" name="jabatan" id="tambahJabatan"
                            placeholder="Contoh: Guru / Admin" disabled>
                    </div>
                </div>

                <div class="profile-fields" id="fieldTambahWakasek">
                    <h3>Data Wakasek</h3>

                    <div class="form-group">
                        <label for="tambahJabatanWakasek">Jabatan Wakasek</label>
                        <input type="text" name="jabatan_wakasek" id="tambahJabatanWakasek"
                            placeholder="Contoh: Wakil Kepala Sekolah" disabled>
                    </div>
                </div>

                <div class="profile-fields" id="fieldTambahKepala">
                    <h3>Data Kepala Sekolah</h3>

                    <div class="form-group">
                        <label for="tambahNipKepala">NIP</label>
                        <input type="text" name="nip" id="tambahNipKepala"
                            placeholder="Masukkan NIP (opsional)" disabled>
                    </div>
                </div>

                <div class="form-group">
                    <label for="tambahPhone">No. Telepon</label>
                    <input type="text" name="phone_number" id="tambahPhone"
                        placeholder="08xxxxxxxxxx">
                </div>

                <div class="modal-actions">
                    <button type="button" class="btn-batal"
                        onclick="tutupModal('modalTambah')">Batal</button>
                    <button type="submit" class="btn-simpan">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    <!-- MODAL EDIT -->
    <div class="modal" id="modalEdit">
        <div class="modal-box">
            <div class="modal-header">
                <h2>✏️ Edit Pengguna</h2>
                <button type="button" class="close" onclick="tutupModal('modalEdit')">×</button>
            </div>

            <form id="formEdit" method="POST" autocomplete="off">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="editNama">Nama</label>
                    <input type="text" name="name" id="editNama" required>
                </div>

                <div class="form-group">
                    <label for="editEmail">Email</label>
                    <input type="email" name="email" id="editEmail" required>
                </div>

                <div class="form-group">
                    <label for="editPassword">Password Baru</label>
                    <input type="password" name="password" id="editPassword"
                        placeholder="Kosongkan jika tidak ingin mengubah">
                </div>

                <div class="form-group">
                    <label for="editRole">Role</label>
                    <select name="role" id="editRole" onchange="ubahFieldEdit()" required>
                        <option value="siswa">Siswa</option>
                        <option value="guru_admin">Guru/Admin</option>
                        <option value="wakasek">Wakasek</option>
                        <option value="kepala_sekolah">Kepala Sekolah</option>
                    </select>
                </div>

                <div class="profile-fields" id="fieldEditSiswa">
                    <h3>Data Siswa</h3>

                    <div class="form-group">
                        <label for="editNis">NIS</label>
                        <input type="text" name="nis" id="editNis" disabled>
                    </div>

                    <div class="form-group">
                        <label for="editKelas">Kelas</label>
                        <input type="text" name="kelas" id="editKelas" disabled>
                    </div>

                    <div class="form-group">
                        <label for="editJurusan">Jurusan</label>
                        <input type="text" name="jurusan" id="editJurusan" disabled>
                    </div>
                </div>

                <div class="profile-fields" id="fieldEditGuru">
                    <h3>Data Guru / Admin</h3>

                    <div class="form-group">
                        <label for="editNipGuru">NIP</label>
                        <input type="text" name="nip" id="editNipGuru" disabled>
                    </div>

                    <div class="form-group">
                        <label for="editJabatan">Jabatan</label>
                        <input type="text" name="jabatan" id="editJabatan" disabled>
                    </div>
                </div>

                <div class="profile-fields" id="fieldEditWakasek">
                    <h3>Data Wakasek</h3>

                    <div class="form-group">
                        <label for="editJabatanWakasek">Jabatan Wakasek</label>
                        <input type="text" name="jabatan_wakasek"
                            id="editJabatanWakasek" disabled>
                    </div>
                </div>

                <div class="profile-fields" id="fieldEditKepala">
                    <h3>Data Kepala Sekolah</h3>

                    <div class="form-group">
                        <label for="editNipKepala">NIP</label>
                        <input type="text" name="nip" id="editNipKepala" disabled>
                    </div>
                </div>

                <div class="form-group">
                    <label for="editPhone">No. Telepon</label>
                    <input type="text" name="phone_number" id="editPhone">
                </div>

                <div class="modal-actions">
                    <button type="button" class="btn-batal"
                        onclick="tutupModal('modalEdit')">Batal</button>
                    <button type="submit" class="btn-simpan">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>

    <!-- JAVASCRIPT -->
    <script>
        function tampilkanField(ids, idAktif) {
            ids.forEach(function(id) {
                document.getElementById(id).style.display = 'none';
            });

            if (idAktif) {
                document.getElementById(idAktif).style.display = 'block';
            }
        }

        function setDisabled(ids, disabled) {
            ids.forEach(function(id) {
                document.getElementById(id).disabled = disabled;
            });
        }

        function bukaTambah() {
            document.getElementById('formTambah').reset();

            tampilkanField([
                'fieldTambahSiswa',
                'fieldTambahGuru',
                'fieldTambahWakasek',
                'fieldTambahKepala'
            ], null);

            setDisabled([
                'tambahNis',
                'tambahKelas',
                'tambahJurusan',
                'tambahNipGuru',
                'tambahJabatan',
                'tambahJabatanWakasek',
                'tambahNipKepala'
            ], true);

            document.getElementById('modalTambah').style.display = 'flex';
        }

        function ubahFieldTambah() {
            const role = document.getElementById('tambahRole').value;

            const fieldMap = {
                siswa: 'fieldTambahSiswa',
                guru_admin: 'fieldTambahGuru',
                wakasek: 'fieldTambahWakasek',
                kepala_sekolah: 'fieldTambahKepala'
            };

            tampilkanField([
                'fieldTambahSiswa',
                'fieldTambahGuru',
                'fieldTambahWakasek',
                'fieldTambahKepala'
            ], fieldMap[role] || null);

            setDisabled(
                ['tambahNis', 'tambahKelas', 'tambahJurusan'],
                role !== 'siswa'
            );

            setDisabled(
                ['tambahNipGuru', 'tambahJabatan'],
                role !== 'guru_admin'
            );

            setDisabled(
                ['tambahJabatanWakasek'],
                role !== 'wakasek'
            );

            setDisabled(
                ['tambahNipKepala'],
                role !== 'kepala_sekolah'
            );
        }

        function ubahFieldEdit() {
            const role = document.getElementById('editRole').value;

            const fieldMap = {
                siswa: 'fieldEditSiswa',
                guru_admin: 'fieldEditGuru',
                wakasek: 'fieldEditWakasek',
                kepala_sekolah: 'fieldEditKepala'
            };

            tampilkanField([
                'fieldEditSiswa',
                'fieldEditGuru',
                'fieldEditWakasek',
                'fieldEditKepala'
            ], fieldMap[role] || null);

            setDisabled(
                ['editNis', 'editKelas', 'editJurusan'],
                role !== 'siswa'
            );

            setDisabled(
                ['editNipGuru', 'editJabatan'],
                role !== 'guru_admin'
            );

            setDisabled(
                ['editJabatanWakasek'],
                role !== 'wakasek'
            );

            setDisabled(
                ['editNipKepala'],
                role !== 'kepala_sekolah'
            );
        }

        function bukaEditDariTombol(tombol) {
            const data = tombol.dataset;

            const baseUrlPengguna = "{{ url('/pengguna') }}";

document.getElementById('formEdit').action =
    baseUrlPengguna + '/' + encodeURIComponent(data.id);
            document.getElementById('editNama').value = data.nama || '';
            document.getElementById('editEmail').value = data.email || '';
            document.getElementById('editPassword').value = '';
            document.getElementById('editRole').value = data.role || 'siswa';
            document.getElementById('editPhone').value = data.phone || '';

            document.getElementById('editNis').value = data.nis || '';
            document.getElementById('editKelas').value = data.kelas || '';
            document.getElementById('editJurusan').value = data.jurusan || '';

            document.getElementById('editNipGuru').value = data.nip || '';
            document.getElementById('editNipKepala').value = data.nip || '';

            document.getElementById('editJabatan').value = data.jabatan || '';
            document.getElementById('editJabatanWakasek').value =
                data.jabatanWakasek || '';

            ubahFieldEdit();

            document.getElementById('modalEdit').style.display = 'flex';
        }

        function tutupModal(id) {
            document.getElementById(id).style.display = 'none';
        }

        window.addEventListener('click', function(event) {
            if (event.target.classList.contains('modal')) {
                event.target.style.display = 'none';
            }
        });

        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape') {
                document.querySelectorAll('.modal').forEach(function(modal) {
                    modal.style.display = 'none';
                });
            }
        });
    </script>

</body>
</html>
