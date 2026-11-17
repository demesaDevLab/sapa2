<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pengaduan - SAPA</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f4f7fc;
            color: #344054;
            padding: 30px 16px;
        }

        .container {
            max-width: 900px;
            margin: auto;
        }

        .page-header {
            margin-bottom: 25px;
        }

        .page-header h2 {
            color: #344b75;
            font-size: 25px;
            margin-bottom: 8px;
        }

        .page-header p {
            color: #7b8497;
            font-size: 14px;
        }

        .card {
            background: #ffffff;
            border-radius: 14px;
            padding: 25px;
            margin-bottom: 22px;
            box-shadow: 0 4px 15px rgba(70, 90, 130, 0.07);
            border: 1px solid #e8edf6;
        }

        .card-title {
            font-size: 18px;
            color: #344b75;
            margin-bottom: 20px;
            font-weight: 600;
        }

        .detail-row {
            margin-bottom: 18px;
        }

        .detail-label {
            font-size: 13px;
            color: #7b8497;
            margin-bottom: 7px;
        }

        .detail-value {
            font-size: 15px;
            color: #344054;
            line-height: 1.7;
            overflow-wrap: anywhere;
        }

        .status {
            display: inline-block;
            padding: 7px 14px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            background: #e8f0ff;
            color: #4774b8;
        }

        .empty-text {
            padding: 20px;
            background: #f7f9fd;
            border-radius: 10px;
            text-align: center;
            color: #8993a5;
            font-size: 14px;
        }

        .response {
            padding: 18px;
            background: #f7f9fd;
            border: 1px solid #e8edf6;
            border-radius: 11px;
            margin-bottom: 15px;
        }

        .response-header {
            display: flex;
            justify-content: space-between;
            gap: 12px;
            flex-wrap: wrap;
            margin-bottom: 12px;
        }

        .response-name {
            font-weight: 600;
            color: #344b75;
            font-size: 14px;
        }

        .response-date {
            color: #8993a5;
            font-size: 12px;
        }

        .response-text {
            font-size: 14px;
            line-height: 1.7;
            color: #526078;
            overflow-wrap: anywhere;
        }

        .bottom-buttons {
            display: flex;
            justify-content: space-between;
            gap: 12px;
            flex-wrap: wrap;
            margin-top: 25px;
        }

        .button {
            display: inline-block;
            padding: 12px 19px;
            border-radius: 9px;
            text-decoration: none;
            font-size: 13px;
            font-weight: 600;
            text-align: center;
            transition: 0.2s;
        }

        .button-secondary {
            background: #e9eef8;
            color: #526b96;
        }

        .button-primary {
            background: #6688bd;
            color: #ffffff;
        }

        .button:hover {
            opacity: 0.85;
        }

        .evidence-link {
            display: inline-block;
            margin-top: 5px;
            color: #527bb6;
            text-decoration: none;
        }

        @media (max-width: 600px) {
            body {
                padding: 20px 12px;
            }

            .card {
                padding: 18px;
            }

            .page-header h2 {
                font-size: 21px;
            }

            .bottom-buttons {
                flex-direction: column;
            }

            .button {
                width: 100%;
            }
        }
    </style>
</head>

<body>

<main class="container">

    <!-- HEADER -->
    <div class="page-header">
        <h2>Detail Pengaduan</h2>
        <p>Informasi lengkap mengenai pengaduan yang telah kamu kirimkan.</p>
    </div>

    <!-- INFORMASI PENGADUAN -->
    <div class="card">

        <h3 class="card-title">Informasi Pengaduan</h3>

        <div class="detail-row">
            <div class="detail-label">Judul Pengaduan</div>
            <div class="detail-value">
                {{ data_get($pengaduan, 'judul_pengaduan')
                    ?? data_get($pengaduan, 'judul')
                    ?? 'Tidak tersedia' }}
            </div>
        </div>

        <div class="detail-row">
            <div class="detail-label">Kategori</div>
            <div class="detail-value">
                {{ $pengaduan->nama_kategori ?? 'Tidak tersedia' }}
            </div>
        </div>

        <div class="detail-row">
            <div class="detail-label">Isi Pengaduan</div>
            <div class="detail-value">
                {{ data_get($pengaduan, 'isi_pengaduan')
                    ?? data_get($pengaduan, 'deskripsi')
                    ?? 'Tidak tersedia' }}
            </div>
        </div>

        <div class="detail-row">
            <div class="detail-label">Tanggal Pengaduan</div>
            <div class="detail-value">
                @if (data_get($pengaduan, 'created_at'))
                    {{ \Carbon\Carbon::parse(data_get($pengaduan, 'created_at'))->format('d M Y, H:i') }}
                @else
                    Tidak tersedia
                @endif
            </div>
        </div>

        <div class="detail-row">
            <div class="detail-label">Status Pengaduan</div>
            <div class="detail-value">
                <span class="status">
                    {{ data_get($pengaduan, 'status.nama_status')
                        ?? data_get($pengaduan, 'status_pengaduan')
                        ?? $pengaduan->nama_status
                        ?? 'Menunggu' }}
                </span>
            </div>
        </div>

        @if (data_get($pengaduan, 'bukti'))
            <div class="detail-row">
                <div class="detail-label">Bukti Pengaduan</div>
                <div class="detail-value">
                    <a class="evidence-link"
                       href="{{ asset('storage/' . data_get($pengaduan, 'bukti')) }}"
                       target="_blank">
                        Lihat Bukti Pengaduan
                    </a>
                </div>
            </div>
        @endif

    </div>

    <!-- TANGGAPAN -->
    <div class="card">

        <h3 class="card-title">Tanggapan Guru / Admin</h3>

        @if ($tanggapan->isEmpty())

            <div class="empty-text">
                Belum ada tanggapan dari Guru/Admin.
            </div>

        @else

            @foreach ($tanggapan as $item)

                <div class="response">

                    <div class="response-header">

                        <div class="response-name">
                            {{ $item->nama_user ?? 'Guru/Admin' }}
                        </div>

                        <div class="response-date">
                            {{ \Carbon\Carbon::parse($item->created_at)->format('d M Y, H:i') }}
                        </div>

                    </div>

                    <div class="response-text">
                        {{ $item->isi_tanggapan }}
                    </div>

                </div>

            @endforeach

        @endif

    </div>

    <!-- TOMBOL NAVIGASI -->
    <div class="bottom-buttons">

        <a href="{{ route('pengaduan.riwayat') }}"
           class="button button-secondary">
            ← Riwayat Pengaduan
        </a>

        <a href="{{ route('pengaduan.create') }}"
           class="button button-primary">
            + Buat Pengaduan Baru
        </a>

    </div>

</main>

</body>
</html>