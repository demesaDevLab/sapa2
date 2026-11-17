<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Riwayat Pengaduan - SAPA</title>

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

        /* =========================
           SIDEBAR
        ========================= */

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


        /* =========================
           MAIN
        ========================= */

        .main {
            margin-left: 245px;
            min-height: 100vh;
            padding: 30px;
        }


        /* =========================
           TOPBAR
        ========================= */

        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
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
        }


        /* =========================
           PROFILE KANAN ATAS
        ========================= */

        .profile {
            display: flex;
            align-items: center;
            gap: 10px;
            background: #ffffff;
            padding: 9px 14px;
            border-radius: 14px;
            border: 1px solid #eceef8;
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


        /* =========================
           CARD RIWAYAT
        ========================= */

        .page-card {
            background: #ffffff;
            border: 1px solid #eceef8;
            border-radius: 20px;
            overflow: hidden;
        }


        /* =========================
           HEADER CARD
        ========================= */

        .page-header {
            padding: 22px;
            border-bottom: 1px solid #eff0f7;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
        }

        .page-header h2 {
            font-size: 17px;
            color: #555b8e;
            margin-bottom: 5px;
        }

        .page-header p {
            font-size: 10px;
            color: #a0a3b5;
        }


        /* =========================
           SEARCH
        ========================= */

        .search-box {
            width: 220px;
            padding: 10px 13px;
            border: 1px solid #e3e5f2;
            border-radius: 10px;
            outline: none;
            color: #666b86;
            font-size: 10px;
        }

        .search-box:focus {
            border-color: #8998df;
        }


        /* =========================
           TABLE
        ========================= */

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


        /* =========================
           DATA
        ========================= */

        .ticket {
            color: #6877c7;
            font-weight: bold;
        }

        .judul {
            font-weight: bold;
            color: #5d6280;
        }

        .tanggal {
            color: #999db1;
            font-size: 10px;
        }


        /* =========================
           STATUS
        ========================= */

        .status {
            display: inline-block;
            padding: 6px 10px;
            border-radius: 20px;
            font-size: 9px;
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


        /* =========================
           DETAIL BUTTON
        ========================= */

        .detail-button {
            display: inline-block;
            text-decoration: none;
            background: #8998df;
            color: white;
            padding: 7px 11px;
            border-radius: 9px;
            font-size: 9px;
        }

        .detail-button:hover {
            background: #7788d5;
        }


        /* =========================
           EMPTY
        ========================= */

        .empty {
            text-align: center;
            padding: 55px 20px;
            color: #a3a6b8;
            font-size: 12px;
        }

        .empty-icon {
            font-size: 35px;
            margin-bottom: 10px;
        }


        /* =========================
           MOBILE
        ========================= */

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
            .menu a span {
                display: none;
            }

            .menu a {
                justify-content: center;
                padding: 13px 5px;
            }

            .menu-icon {
                font-size: 17px;
            }

            .main {
                margin-left: 70px;
                padding: 20px;
            }

            .profile {
                display: none;
            }

            .page-header {
                align-items: flex-start;
                flex-direction: column;
            }

            .search-box {
                width: 100%;
            }
        }


        @media (max-width: 500px) {

            .main {
                padding: 15px;
            }

            .welcome h1 {
                font-size: 21px;
            }

        }

    </style>

</head>


<body>


    <!-- =========================
         SIDEBAR
    ========================= -->

    <aside class="sidebar">

        <div class="logo-area">

            <img
                src="{{ asset('images/logo-sapa.jpeg') }}"
                alt="Logo SAPA"
                class="logo"
            >

            <div class="logo-text">

                <h2>
                    SAPA
                </h2>

                <p>
                    Sampaikan Aspirasi, Wujudkan Solusi
                </p>

            </div>

        </div>


        <div class="menu-title">
            Menu Utama
        </div>


        <nav class="menu">


            <!-- DASHBOARD -->

            <a href="{{ route('dashboard') }}">

                <div class="menu-icon">
                    🏠
                </div>

                <span>
                    Dashboard
                </span>

            </a>


            <!-- BUAT PENGADUAN -->

            <a href="{{ route('pengaduan.create') }}">

                <div class="menu-icon">
                    📝
                </div>

                <span>
                    Buat Pengaduan
                </span>

            </a>


            <!-- RIWAYAT -->

            <a
                href="{{ route('pengaduan.riwayat') }}"
                class="active"
            >

                <div class="menu-icon">
                    🕐
                </div>

                <span>
                    Riwayat Pengaduan
                </span>

            </a>


        </nav>

    </aside>



    <!-- =========================
         MAIN CONTENT
    ========================= -->

    <main class="main">


        <!-- TOPBAR -->

        <div class="topbar">


            <div class="welcome">

                <h1>
                    Riwayat Pengaduan
                </h1>

                <p>
                    Lihat seluruh riwayat aspirasi dan pengaduan yang telah kamu kirim.
                </p>

            </div>



            <!-- PROFILE KANAN ATAS -->

            <a
                href="{{ route('profil') }}"
                style="text-decoration: none;"
            >

                <div class="profile">

                    <div class="profile-icon">

                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}

                    </div>


                    <div>

                        <div class="profile-name">

                            {{ Auth::user()->name }}

                        </div>

                        <div class="profile-role">

                            Siswa

                        </div>

                    </div>

                </div>

            </a>


        </div>



        <!-- =========================
             RIWAYAT CARD
        ========================= -->

        <section class="page-card">


            <div class="page-header">


                <div>

                    <h2>
                        Daftar Pengaduan Saya
                    </h2>

                    <p>
                        Semua pengaduan yang pernah kamu sampaikan melalui SAPA.
                    </p>

                </div>


                <input
                    type="text"
                    id="searchInput"
                    class="search-box"
                    placeholder="Cari pengaduan..."
                >


            </div>



            @if ($pengaduan->count() > 0)


                <div class="table-wrapper">


                    <table id="riwayatTable">


                        <thead>

                            <tr>

                                <th>
                                    Tiket
                                </th>

                                <th>
                                    Judul Pengaduan
                                </th>

                                <th>
                                    Kategori
                                </th>

                                <th>
                                    Tanggal
                                </th>

                                <th>
                                    Status
                                </th>

                                <th>
                                    Aksi
                                </th>

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



                                    <!-- JUDUL -->

                                    <td>

                                        <div class="judul">

                                            {{ $item->judul }}

                                        </div>

                                    </td>



                                    <!-- KATEGORI -->

                                    <td>

                                        {{ $item->nama_kategori }}

                                    </td>



                                    <!-- TANGGAL -->

                                    <td>

                                        <div class="tanggal">

                                            {{ date('d/m/Y', strtotime($item->tanggal_pengaduan)) }}

                                        </div>

                                    </td>



                                    <!-- STATUS -->

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



                                    <!-- AKSI -->

                                    <td>

                                        <a
                                            href="{{ route('pengaduan.detail', $item->id) }}"
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


                    <div class="empty-icon">
                        📭
                    </div>


                    Belum ada pengaduan yang kamu kirim.


                </div>


            @endif


        </section>


    </main>



    <!-- =========================
         SEARCH
    ========================= -->

    <script>

        const searchInput =
            document.getElementById('searchInput');


        if (searchInput) {

            searchInput.addEventListener(
                'keyup',
                function () {

                    const keyword =
                        this.value.toLowerCase();


                    const rows =
                        document.querySelectorAll(
                            '#riwayatTable tbody tr'
                        );


                    rows.forEach(
                        function (row) {

                            const text =
                                row.innerText.toLowerCase();


                            row.style.display =
                                text.includes(keyword)
                                    ? ''
                                    : 'none';

                        }
                    );

                }
            );

        }

    </script>


</body>

</html>
