<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Pengaduan Berhasil - SAPA</title>

    <style>

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        body {
            min-height: 100vh;
            background: #f5f7ff;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 25px;
        }

        .container {
            width: 100%;
            max-width: 600px;
        }

        .card {
            background: white;
            border-radius: 24px;
            padding: 35px;
            text-align: center;
            box-shadow:
                0 8px 30px
                rgba(100, 105, 150, 0.10);
        }

        .logo {
            width: 65px;
            height: 65px;
            object-fit: cover;
            border-radius: 18px;
            margin-bottom: 20px;
        }

        .success-icon {
            width: 70px;
            height: 70px;
            margin: 0 auto 20px;
            border-radius: 50%;
            background: #d9f7e5;
            color: #16804b;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 35px;
            font-weight: bold;
        }

        h1 {
            color: #34385f;
            font-size: 25px;
            margin-bottom: 8px;
        }

        .subtitle {
            color: #8589a2;
            font-size: 14px;
            line-height: 1.6;
            margin-bottom: 25px;
        }

        .ticket-box {
            background: #f6f7ff;
            border-radius: 18px;
            padding: 20px;
            margin-bottom: 20px;
        }

        .ticket-label {
            color: #8589a2;
            font-size: 12px;
            margin-bottom: 8px;
        }

        .ticket-number {
            color: #6878d1;
            font-size: 21px;
            font-weight: bold;
        }

        .detail-box {
            text-align: left;
            background: #fafaff;
            border-radius: 16px;
            padding: 20px;
            margin-bottom: 20px;
        }

        .detail-title {
            color: #44486b;
            font-size: 16px;
            font-weight: bold;
            margin-bottom: 15px;
        }

        .detail-row {
            display: flex;
            justify-content: space-between;
            gap: 20px;
            padding: 9px 0;
            border-bottom: 1px solid #eeeeF5;
        }

        .detail-row:last-child {
            border-bottom: none;
        }

        .label {
            color: #9295aa;
            font-size: 12px;
        }

        .value {
            color: #505474;
            font-size: 13px;
            font-weight: bold;
            text-align: right;
        }

        .status {
            display: inline-block;
            padding: 6px 11px;
            border-radius: 20px;
            background: #fff3cd;
            color: #856404;
            font-size: 11px;
        }

        .buttons {
            display: flex;
            gap: 10px;
            margin-top: 10px;
        }

        .button {
            flex: 1;
            text-decoration: none;
            padding: 12px 15px;
            border-radius: 12px;
            font-size: 13px;
            font-weight: bold;
        }

        .button-primary {
            background: #8d9ee8;
            color: white;
        }

        .button-secondary {
            background: #eef0ff;
            color: #6675ca;
        }

        @media (max-width: 600px) {

            body {
                padding: 15px;
            }

            .card {
                padding: 25px 20px;
            }

            h1 {
                font-size: 22px;
            }

            .buttons {
                flex-direction: column;
            }

            .detail-row {
                flex-direction: column;
                gap: 4px;
            }

            .value {
                text-align: left;
            }
        }

    </style>
</head>

<body>

    <div class="container">

        <div class="card">

            <img
                src="{{ asset('images/logo-sapa.jpeg') }}"
                alt="Logo SAPA"
                class="logo"
            >

            <div class="success-icon">
                ✓
            </div>

            <h1>
                Pengaduan Berhasil!
            </h1>

            <p class="subtitle">
                Pengaduan kamu telah berhasil dikirim.
                Simpan nomor tiket untuk memantau pengaduan.
            </p>


            {{-- NOMOR TIKET --}}
            <div class="ticket-box">

                <div class="ticket-label">
                    Nomor Tiket
                </div>

                <div class="ticket-number">
                    {{ $pengaduan->nomor_tiket }}
                </div>

            </div>


            {{-- DETAIL PENGADUAN --}}
            <div class="detail-box">

                <div class="detail-title">
                    Detail Pengaduan
                </div>


                <div class="detail-row">

                    <div class="label">
                        Judul
                    </div>

                    <div class="value">
                        {{ $pengaduan->judul }}
                    </div>

                </div>


                <div class="detail-row">

                    <div class="label">
                        Kategori
                    </div>

                    <div class="value">
                        {{ $pengaduan->nama_kategori }}
                    </div>

                </div>


                <div class="detail-row">

                    <div class="label">
                        Tanggal
                    </div>

                    <div class="value">
                        {{ \Carbon\Carbon::parse($pengaduan->tanggal_pengaduan)->format('d M Y') }}
                    </div>

                </div>


                <div class="detail-row">

                    <div class="label">
                        Status
                    </div>

                    <div class="value">

                        <span class="status">
                            {{ $pengaduan->nama_status }}
                        </span>

                    </div>

                </div>

            </div>


            {{-- BUTTON --}}
            <div class="buttons">

                <a
                    href="{{ route('pengaduan.riwayat') }}"
                    class="button button-secondary"
                >
                    Lihat Riwayat
                </a>

                <a
                    href="{{ route('dashboard') }}"
                    class="button button-primary"
                >
                    Kembali ke Dashboard
                </a>

            </div>

        </div>

    </div>

</body>

</html>
