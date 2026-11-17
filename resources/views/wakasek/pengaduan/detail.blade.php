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
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
            gap: 12px;
        }

        .page-header h1 {
            color: #344b75;
            font-size: 25px;
        }

        .btn-back {
            display: inline-block;
            background: #e9eef8;
            color: #526b96;
            padding: 12px 19px;
            border-radius: 9px;
            text-decoration: none;
            font-size: 13px;
            font-weight: 600;
            transition: 0.2s;
        }

        .btn-back:hover {
            opacity: 0.85;
        }

        .detail-card {
            background: #ffffff;
            padding: 25px;
            border-radius: 14px;
            margin-bottom: 22px;
            box-shadow: 0 4px 15px rgba(70, 90, 130, 0.07);
            border: 1px solid #e8edf6;
        }

        .detail-card h2 {
            font-size: 18px;
            color: #344b75;
            margin-bottom: 20px;
            padding-bottom: 12px;
            border-bottom: 1px solid #e8edf6;
            font-weight: 600;
        }

        .detail-item {
            margin-bottom: 18px;
        }

        .detail-item strong {
            display: block;
            font-size: 13px;
            color: #7b8497;
            margin-bottom: 7px;
            font-weight: 600;
        }

        .detail-item span,
        .detail-item p {
            display: block;
            font-size: 15px;
            color: #344054;
            line-height: 1.7;
            overflow-wrap: anywhere;
        }

        .attachment-item {
            background: #f7f9fd;
            border: 1px solid #e8edf6;
            padding: 15px;
            border-radius: 10px;
            margin-bottom: 12px;
        }

        .attachment-item a {
            color: #527bb6;
            text-decoration: none;
            font-size: 14px;
            font-weight: 600;
            overflow-wrap: anywhere;
        }

        .attachment-item a:hover {
            text-decoration: underline;
        }

        .history-item,
        .response-item {
            background: #f7f9fd;
            border: 1px solid #e8edf6;
            padding: 18px;
            border-radius: 11px;
            margin-bottom: 15px;
        }

        .history-item p,
        .response-item p {
            font-size: 14px;
            color: #526078;
            margin-bottom: 9px;
            line-height: 1.7;
            overflow-wrap: anywhere;
        }

        .history-item p:last-child,
        .response-item p:last-child {
            margin-bottom: 0;
        }

        .history-item strong {
            color: #344b75;
        }

        .response-item small {
            display: block;
            color: #8993a5;
            font-size: 12px;
            margin-top: 8px;
        }

        .empty-text {
            padding: 20px;
            background: #f7f9fd;
            border-radius: 10px;
            text-align: center;
            color: #8993a5;
            font-size: 14px;
        }

        @media (max-width: 600px) {
            body {
                padding: 20px 12px;
            }

            .container {
                width: 100%;
            }

            .page-header {
                flex-direction: column;
                align-items: flex-start;
            }

            .page-header h1 {
                font-size: 21px;
            }

            .detail-card {
                padding: 18px;
            }

            .detail-card h2 {
                font-size: 17px;
            }

            .btn-back {
                padding: 10px 16px;
            }
        }
    </style>
</head>

<body>

<div class="container">

    <!-- HEADER -->
    <div class="page-header">
        <h1>Detail Pengaduan</h1>

        <a href="{{ url()->previous() }}" class="btn-back">
            ← Kembali
        </a>
    </div>

    <!-- INFORMASI PENGADUAN -->
    <div class="detail-card">

        <h2>Informasi Pengaduan</h2>

        <div class="detail-item">
            <strong>Nama Siswa</strong>
            <span>{{ $pengaduan->nama_siswa }}</span>
        </div>

        <div class="detail-item">
            <strong>Email</strong>
            <span>{{ $pengaduan->email_siswa }}</span>
        </div>

        <div class="detail-item">
            <strong>NIS</strong>
            <span>{{ $pengaduan->nis }}</span>
        </div>

        <div class="detail-item">
            <strong>Kelas</strong>
            <span>{{ $pengaduan->kelas }}</span>
        </div>

        <div class="detail-item">
            <strong>Jurusan</strong>
            <span>{{ $pengaduan->jurusan }}</span>
        </div>

        <div class="detail-item">
            <strong>Kategori</strong>
            <span>{{ $pengaduan->nama_kategori }}</span>
        </div>

        <div class="detail-item">
            <strong>Status</strong>
            <span>{{ $pengaduan->nama_status }}</span>
        </div>

        <div class="detail-item">
            <strong>Tanggal Pengaduan</strong>
            <span>
                {{ $pengaduan->created_at
                    ? \Carbon\Carbon::parse($pengaduan->created_at)->format('d M Y, H:i')
                    : '-' }}
            </span>
        </div>

        <div class="detail-item">
            <strong>Judul Pengaduan</strong>
            <span>{{ $pengaduan->judul ?? '-' }}</span>
        </div>

        <div class="detail-item">
            <strong>Isi Pengaduan</strong>
            <p>{{ $pengaduan->isi_pengaduan ?? $pengaduan->deskripsi ?? '-' }}</p>
        </div>

    </div>

    <!-- LAMPIRAN -->
    <div class="detail-card">

        <h2>Lampiran</h2>

        @if ($lampiran->isEmpty())

            <div class="empty-text">
                Tidak ada lampiran pada pengaduan ini.
            </div>

        @else

            @foreach ($lampiran as $item)

                <div class="attachment-item">

                    <a
                        href="{{ asset('storage/' . ltrim($item->path_file, '/')) }}"
                        target="_blank"
                        rel="noopener noreferrer"
                    >
                        📎 {{ $item->nama_file }}
                    </a>

                </div>

            @endforeach

        @endif

    </div>

    <!-- RIWAYAT STATUS -->
    <div class="detail-card">

        <h2>Riwayat Pengaduan</h2>

        @if (isset($riwayat) && $riwayat->count() > 0)

            @foreach ($riwayat as $item)

                <div class="history-item">

                    <p>
                        <strong>Status:</strong>
                        {{ $item->nama_status ?? '-' }}
                    </p>

                    <p>
                        <strong>Keterangan:</strong>
                        {{ $item->keterangan ?? '-' }}
                    </p>

                    <p>
                        <strong>Tanggal:</strong>
                        {{ $item->tanggal_perubahan ?? '-' }}
                    </p>

                    <p>
                        <strong>Oleh:</strong>
                        {{ $item->nama_user ?? '-' }}
                    </p>

                </div>

            @endforeach

        @else

            <div class="empty-text">
                Belum ada riwayat pengaduan.
            </div>

        @endif

    </div>

    <!-- TANGGAPAN -->
    <div class="detail-card">

        <h2>Tanggapan</h2>

        @if (isset($tanggapan) && $tanggapan->count() > 0)

            @foreach ($tanggapan as $item)

                <div class="response-item">

                    <p>
                        {{ $item->isi_tanggapan ?? '-' }}
                    </p>

                    <small>
                        {{ $item->created_at
                            ? \Carbon\Carbon::parse($item->created_at)->format('d M Y, H:i')
                            : '' }}
                    </small>

                </div>

            @endforeach

        @else

            <div class="empty-text">
                Belum ada tanggapan.
            </div>

        @endif

    </div>

</div>

</body>
</html>