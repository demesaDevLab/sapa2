<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Master Kategori - SAPA</title>

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
            transition: 0.2s;
            cursor: pointer;
        }

        .profile:hover {
            background: #f8f8ff;
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

        /* KARTU KONTEN */
        .page-card {
            width: 100%;
            background: #fff;
            border: 1px solid #eceef8;
            border-radius: 20px;
            overflow: hidden;
        }

        .page-header {
            padding: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 12px;
            border-bottom: 1px solid #eff0f7;
        }

        .page-header h2 {
            font-size: 16px;
            color: #555b8e;
        }

        .page-header p {
            font-size: 10px;
            color: #a0a3b5;
            margin-top: 4px;
            line-height: 1.5;
        }

        /* TOMBOL TAMBAH */
        .add-button {
            border: none;
            background: #8998df;
            color: white;
            padding: 11px 17px;
            border-radius: 11px;
            cursor: pointer;
            font-size: 11px;
            font-weight: bold;
            flex-shrink: 0;
        }

        .add-button:hover,
        .submit-button:hover {
            background: #7788d5;
        }

        /* NOTIFIKASI */
        .alert {
            margin: 0 0 18px;
            padding: 12px 15px;
            border-radius: 10px;
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

        /* TABEL */
        .table-wrapper {
            width: 100%;
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 700px;
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

        .number {
            color: #a1a4b5;
            width: 50px;
        }

        .category-name {
            font-weight: bold;
            color: #5d6280;
        }

        .description {
            color: #999db1;
            line-height: 1.5;
        }

        /* TOMBOL AKSI */
        .actions {
            display: flex;
            gap: 7px;
            align-items: center;
        }

        .btn {
            border: none;
            cursor: pointer;
            padding: 7px 10px;
            border-radius: 9px;
            font-size: 9px;
            white-space: nowrap;
        }

        .edit {
            background: #e9edff;
            color: #6877c7;
        }

        .edit:hover {
            background: #dde2ff;
        }

        .delete {
            background: #ffe9eb;
            color: #c87887;
        }

        .delete:hover {
            background: #ffdde1;
        }

        .empty {
            text-align: center;
            padding: 45px 20px;
            color: #a3a6b8;
            font-size: 12px;
        }

        .empty-icon {
            font-size: 30px;
            margin-bottom: 10px;
        }

        /* MODAL */
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            inset: 0;
            width: 100%;
            height: 100%;
            background: rgba(50, 55, 90, 0.30);
            justify-content: center;
            align-items: center;
            padding: 20px;
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
            font-size: 17px;
            color: #555b8e;
        }

        .close {
            border: none;
            background: transparent;
            font-size: 23px;
            color: #a3a6b8;
            cursor: pointer;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            font-size: 10px;
            font-weight: bold;
            color: #696d87;
            margin-bottom: 7px;
        }

        .form-group input,
        .form-group textarea {
            width: 100%;
            border: 1px solid #e3e5f2;
            border-radius: 10px;
            padding: 11px 12px;
            outline: none;
            font-size: 11px;
            color: #696d87;
            background: #fff;
        }

        .form-group input:focus,
        .form-group textarea:focus {
            border-color: #8998df;
        }

        .form-group textarea {
            height: 95px;
            resize: vertical;
        }

        .submit-button {
            width: 100%;
            border: none;
            background: #8998df;
            color: white;
            padding: 11px;
            border-radius: 10px;
            cursor: pointer;
            font-size: 11px;
            font-weight: bold;
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

            .menu > a span {
                display: block;
            }

            .menu-icon {
                width: 22px;
                font-size: 15px;
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
                align-items: center;
                gap: 8px;
                padding: 10px 5px 10px 25px;
                font-size: 10px;
                white-space: normal;
                overflow-wrap: anywhere;
            }

            .submenu a span {
                display: inline;
            }

            .submenu-icon {
                display: block;
                width: 18px;
                flex-shrink: 0;
            }

            .logout-area {
                position: fixed;
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
                font-size: 14px;
            }

            .page-header p {
                font-size: 10px;
            }

            .add-button {
                width: 100%;
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
            <img src="{{ asset('images/logo-sapa.jpeg') }}"
                 alt="Logo SAPA" class="logo">

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
                <a href="{{ route('kategori.index') }}" class="active">
                    <div class="submenu-icon">📂</div>
                    <span>Data Kategori</span>
                </a>

                <a href="{{ route('status.index') }}">
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
                <h1>Data Master Kategori</h1>
                <p>Kelola kategori pengaduan pada sistem SAPA.</p>
            </div>

            <a href="{{ route('profil') }}" class="profile-link">
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

        <!-- NOTIFIKASI -->
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
                {{ $errors->first() }}
            </div>
        @endif

        <!-- CONTENT -->
        <section class="page-card">
            <div class="page-header">
                <div>
                    <h2>Daftar Kategori Pengaduan</h2>
                    <p>Kelola kategori yang digunakan dalam pengaduan siswa.</p>
                </div>

                <button type="button"
                        class="add-button"
                        onclick="openAddModal()">
                    + Tambah Kategori
                </button>
            </div>

            <div class="table-wrapper">
                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Kategori</th>
                            <th>Deskripsi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($kategori as $item)
                            <tr>
                                <td class="number">{{ $loop->iteration }}</td>

                                <td class="category-name">
                                    {{ $item->nama_kategori }}
                                </td>

                                <td class="description">
                                    {{ $item->deskripsi ?: '-' }}
                                </td>

                                <td>
                                    <div class="actions">
                                        <button
                                            type="button"
                                            class="btn edit"
                                            data-id="{{ $item->id }}"
                                            data-nama="{{ $item->nama_kategori }}"
                                            data-deskripsi="{{ $item->deskripsi ?? '' }}"
                                            onclick="openEditModal(
                                                this.dataset.id,
                                                this.dataset.nama,
                                                this.dataset.deskripsi
                                            )">
                                            Edit
                                        </button>

                                        <form
                                            action="{{ route('kategori.destroy', $item->id) }}"
                                            method="POST"
                                            onsubmit="return confirm('Yakin ingin menghapus kategori ini?')">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn delete">
                                                Hapus
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="empty">
                                    <div class="empty-icon">📭</div>
                                    Belum ada data kategori.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </section>
    </main>

    <!-- MODAL TAMBAH -->
    <div class="modal" id="addModal">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Tambah Kategori</h2>
                <button type="button" class="close" onclick="closeAddModal()">×</button>
            </div>

            <form action="{{ route('kategori.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label>Nama Kategori</label>
                    <input
                        type="text"
                        name="nama_kategori"
                        placeholder="Contoh: Fasilitas"
                        required>
                </div>

                <div class="form-group">
                    <label>Deskripsi</label>
                    <textarea
                        name="deskripsi"
                        placeholder="Masukkan deskripsi kategori..."></textarea>
                </div>

                <button type="submit" class="submit-button">
                    Simpan Kategori
                </button>
            </form>
        </div>
    </div>

    <!-- MODAL EDIT -->
    <div class="modal" id="editModal">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Edit Kategori</h2>
                <button type="button" class="close" onclick="closeEditModal()">×</button>
            </div>

            <form id="editForm" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label>Nama Kategori</label>
                    <input type="text" name="nama_kategori" id="editNama" required>
                </div>

                <div class="form-group">
                    <label>Deskripsi</label>
                    <textarea name="deskripsi" id="editDeskripsi"></textarea>
                </div>

                <button type="submit" class="submit-button">
                    Simpan Perubahan
                </button>
            </form>
        </div>
    </div>

    <script>
        function openAddModal() {
            document.getElementById('addModal').style.display = 'flex';
        }

        function closeAddModal() {
            document.getElementById('addModal').style.display = 'none';
        }

        function openEditModal(id, nama, deskripsi) {
            document.getElementById('editModal').style.display = 'flex';
            document.getElementById('editNama').value = nama;
            document.getElementById('editDeskripsi').value = deskripsi || '';

            document.getElementById('editForm').action =
                "{{ url('/data-master/kategori') }}/" + encodeURIComponent(id);
        }

        function closeEditModal() {
            document.getElementById('editModal').style.display = 'none';
        }

        window.addEventListener('click', function(event) {
            const addModal = document.getElementById('addModal');
            const editModal = document.getElementById('editModal');

            if (event.target === addModal) {
                closeAddModal();
            }

            if (event.target === editModal) {
                closeEditModal();
            }
        });

        window.addEventListener('keydown', function(event) {
            if (event.key === 'Escape') {
                closeAddModal();
                closeEditModal();
            }
        });
    </script>

</body>
</html>
