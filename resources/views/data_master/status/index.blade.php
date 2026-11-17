<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Master Status - SAPA</title>

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
            transition: 0.2s;
        }

        .menu > a:hover,
        .menu > a.active {
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

        /* SUBMENU DATA MASTER */
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
            transition: 0.2s;
        }

        .submenu a:hover,
        .submenu a.active {
            background: #eef0ff;
            color: #6675ca;
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

        /* MAIN CONTENT */
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
            transition: 0.2s;
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

        /* HEADER STATUS */
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

        /* TOMBOL TAMBAH */
        .add-button {
            border: none;
            background: #8998df;
            color: #fff;
            padding: 11px 17px;
            border-radius: 11px;
            cursor: pointer;
            font-size: 11px;
            font-weight: bold;
            transition: 0.2s;
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

        /* KARTU TABEL */
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

        .badge-total {
            background: #eef0ff;
            color: #6877c7;
            padding: 7px 12px;
            border-radius: 20px;
            font-size: 10px;
            font-weight: bold;
            white-space: nowrap;
        }

        /* TABEL */
        .table-wrapper {
            width: 100%;
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 600px;
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

        .status-number {
            color: #6877c7;
            font-weight: bold;
        }

        .status-name {
            font-weight: bold;
            color: #5d6280;
        }

        /* BADGE STATUS */
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

        .status-default {
            background: #eef0ff;
            color: #6877c7;
        }

        /* AKSI */
        .action-buttons {
            display: flex;
            align-items: center;
            gap: 7px;
        }

        .edit-button,
        .delete-button {
            border: none;
            padding: 7px 11px;
            border-radius: 9px;
            font-size: 9px;
            cursor: pointer;
            white-space: nowrap;
        }

        .edit-button {
            background: #e9edff;
            color: #6877c7;
        }

        .edit-button:hover {
            background: #dde2ff;
        }

        .delete-button {
            background: #ffe9eb;
            color: #c87887;
        }

        .delete-button:hover {
            background: #ffdde1;
        }

        .empty {
            text-align: center;
            padding: 45px 20px;
            color: #a3a6b8;
            font-size: 12px;
        }

        /* MODAL */
        .modal {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(50, 55, 90, 0.30);
            justify-content: center;
            align-items: center;
            z-index: 1000;
            padding: 20px;
        }

        .modal.show {
            display: flex;
        }

        .modal-content {
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
            margin-bottom: 20px;
        }

        .modal-header h2 {
            color: #555b8e;
            font-size: 17px;
        }

        .close-button {
            border: none;
            background: #ffe9eb;
            color: #c87887;
            width: 30px;
            height: 30px;
            border-radius: 50%;
            cursor: pointer;
            font-size: 18px;
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

        .form-group input {
            width: 100%;
            border: 1px solid #e3e5f2;
            border-radius: 10px;
            padding: 11px 12px;
            font-size: 11px;
            color: #555a7e;
            outline: none;
            background: #fff;
        }

        .form-group input:focus {
            border-color: #8998df;
        }

        .modal-actions {
            display: flex;
            justify-content: flex-end;
            flex-wrap: wrap;
            gap: 8px;
            margin-top: 20px;
        }

        .cancel-button,
        .save-button {
            border: none;
            padding: 11px 15px;
            border-radius: 10px;
            cursor: pointer;
            font-size: 11px;
            font-weight: bold;
        }

        .cancel-button {
            background: #f0f1f7;
            color: #777b96;
        }

        .save-button {
            background: #8998df;
            color: #fff;
        }

        .save-button:hover {
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

            .badge-total {
                padding: 6px 8px;
                font-size: 9px;
            }

            .modal-content {
                padding: 18px;
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

                <a href="{{ route('status.index') }}" class="active">
                    <div class="submenu-icon">📌</div>
                    <span>Data Status</span>
                </a>

                <a href="{{ route('pengguna.index') }}">
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
                <h1>Data Master Status</h1>
                <p>Kelola status pengaduan yang digunakan dalam sistem SAPA.</p>
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

        <!-- HEADER STATUS -->
        <section class="page-header">
            <div>
                <h2>Kelola Status Pengaduan</h2>
                <p>
                    Tambahkan, ubah, atau hapus status yang digunakan
                    untuk proses pengaduan siswa.
                </p>
            </div>

            <button
                type="button"
                class="add-button"
                onclick="bukaTambah()"
            >
                + Tambah Status
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

        <!-- TABEL STATUS -->
        <section class="table-card">
            <div class="table-header">
                <div>
                    <h2>📋 Daftar Status</h2>
                    <p>Status yang tersedia untuk pengaduan siswa.</p>
                </div>

                <div class="badge-total">
                    {{ $status->count() }} Status
                </div>
            </div>

            @if ($status->count() > 0)
                <div class="table-wrapper">
                    <table>
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Status</th>
                                <th>Tampilan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($status as $index => $item)
                                <tr>
                                    <td>
                                        <div class="status-number">
                                            {{ $index + 1 }}
                                        </div>
                                    </td>

                                    <td>
                                        <div class="status-name">
                                            {{ $item->nama_status }}
                                        </div>
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
                                            <span class="status status-default">
                                                {{ $item->nama_status }}
                                            </span>
                                        @endif
                                    </td>

                                    <td>
                                        <div class="action-buttons">
                                            <button
                                                type="button"
                                                class="edit-button"
                                                data-id="{{ $item->id }}"
                                                data-nama="{{ $item->nama_status }}"
                                                onclick="bukaEdit(
                                                    this.dataset.id,
                                                    this.dataset.nama
                                                )"
                                            >
                                                Edit
                                            </button>

                                            <form
                                                action="{{ route('status.destroy', $item->id) }}"
                                                method="POST"
                                                onsubmit="return confirm('Apakah Anda yakin ingin menghapus status ini?')"
                                            >
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit" class="delete-button">
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
                    <div class="empty-icon">📭</div>
                    Belum ada data status.
                </div>
            @endif
        </section>
    </main>

    <!-- MODAL TAMBAH -->
    <div class="modal" id="modalTambah">
        <div class="modal-content">
            <div class="modal-header">
                <h2>+ Tambah Status</h2>

                <button
                    type="button"
                    class="close-button"
                    onclick="tutupModal('modalTambah')"
                >×</button>
            </div>

            <form action="{{ route('status.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="nama_status_tambah">Nama Status</label>

                    <input
                        type="text"
                        id="nama_status_tambah"
                        name="nama_status"
                        placeholder="Contoh: Menunggu"
                        required
                    >
                </div>

                <div class="modal-actions">
                    <button
                        type="button"
                        class="cancel-button"
                        onclick="tutupModal('modalTambah')"
                    >Batal</button>

                    <button type="submit" class="save-button">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- MODAL EDIT -->
    <div class="modal" id="modalEdit">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Edit Status</h2>

                <button
                    type="button"
                    class="close-button"
                    onclick="tutupModal('modalEdit')"
                >×</button>
            </div>

            <form id="formEdit" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="nama_status_edit">Nama Status</label>

                    <input
                        type="text"
                        id="nama_status_edit"
                        name="nama_status"
                        required
                    >
                </div>

                <div class="modal-actions">
                    <button
                        type="button"
                        class="cancel-button"
                        onclick="tutupModal('modalEdit')"
                    >Batal</button>

                    <button type="submit" class="save-button">
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- JAVASCRIPT -->
    <script>
        function bukaTambah() {
            const modal = document.getElementById('modalTambah');
            const input = document.getElementById('nama_status_tambah');

            modal.classList.add('show');
            input.value = '';

            setTimeout(function () {
                input.focus();
            }, 100);
        }

        function bukaEdit(id, namaStatus) {
            const modal = document.getElementById('modalEdit');
            const form = document.getElementById('formEdit');
            const input = document.getElementById('nama_status_edit');

            form.action =
                "{{ url('/data-master/status') }}/" + encodeURIComponent(id);

            input.value = namaStatus || '';
            modal.classList.add('show');

            setTimeout(function () {
                input.focus();
            }, 100);
        }

        function tutupModal(idModal) {
            document.getElementById(idModal).classList.remove('show');
        }

        window.addEventListener('click', function (event) {
            const modalTambah = document.getElementById('modalTambah');
            const modalEdit = document.getElementById('modalEdit');

            if (event.target === modalTambah) {
                tutupModal('modalTambah');
            }

            if (event.target === modalEdit) {
                tutupModal('modalEdit');
            }
        });

        document.addEventListener('keydown', function (event) {
            if (event.key === 'Escape') {
                document.querySelectorAll('.modal').forEach(function (modal) {
                    modal.classList.remove('show');
                });
            }
        });
    </script>

</body>
</html>
