<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pantau Pengaduan - SAPA</title>

    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: Arial, sans-serif; }
        body { background: #f6f7ff; color: #505474; }
        .sidebar { position: fixed; left: 0; top: 0; width: 245px; height: 100vh; background: #ffffff; border-right: 1px solid #eceef8; padding: 25px 18px; z-index: 100; }
        .logo-area { display: flex; align-items: center; gap: 12px; padding: 0 8px; margin-bottom: 35px; }
        .logo { width: 48px; height: 48px; object-fit: cover; border-radius: 14px; }
        .logo-text h2 { font-size: 18px; color: #555f9d; }
        .logo-text p { font-size: 9px; color: #a3a6ba; margin-top: 3px; }
        .menu-title { font-size: 10px; font-weight: bold; color: #b0b3c5; margin: 0 10px 10px; text-transform: uppercase; }
        .menu { display: flex; flex-direction: column; gap: 6px; }
        .menu a { display: flex; align-items: center; gap: 12px; text-decoration: none; color: #8589a3; padding: 12px 13px; border-radius: 12px; font-size: 12px; transition: 0.2s; }
        .menu a:hover, .menu a.active { background: #eef0ff; color: #6675ca; }
        .menu-icon { width: 24px; text-align: center; font-size: 15px; }
        .main { margin-left: 245px; min-height: 100vh; padding: 30px; }
        .topbar { display: flex; justify-content: space-between; align-items: center; margin-bottom: 28px; }
        .welcome h1 { font-size: 25px; color: #4d578f; margin-bottom: 7px; }
        .welcome p { font-size: 12px; color: #989caf; }

        /* TABEL STYLE */
        .table-card { background: #ffffff; border: 1px solid #eceef8; border-radius: 22px; padding: 25px; overflow-x: auto; }
        table { width: 100%; border-collapse: collapse; min-width: 600px; }
        th { text-align: left; padding: 15px; font-size: 11px; color: #a0a3b5; text-transform: uppercase; border-bottom: 2px solid #eff0f7; }
        td { padding: 15px; font-size: 12px; color: #555a7e; border-bottom: 1px solid #f4f5fa; }
        tr:hover { background: #fafaff; }
        .badge { padding: 5px 10px; border-radius: 20px; font-size: 10px; font-weight: bold; }
        .badge-pending { background: #fff4e5; color: #d97706; }
        .badge-proses { background: #eef0ff; color: #6675ca; }
        .badge-selesai { background: #e6fffa; color: #059669; }
        .btn-detail { display: inline-block; background: #6675ca; color: white; padding: 6px 12px; border-radius: 8px; text-decoration: none; font-size: 11px; }
        .btn-detail:hover { background: #5563b3; }
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
            @if ($user && $user->role === 'guru_pemantau')
                <a href="{{ route('guru_pemantau.dashboard') }}">
                    <div class="menu-icon">🏠</div>
                    <span>Dashboard</span>
                </a>

                <a href="{{ route('guru_pemantau.pengaduan') }}" class="active">
                    <div class="menu-icon">📋</div>
                    <span>Pantau Pengaduan</span>
                </a>

                <a href="{{ route('profil') }}">
                    <div class="menu-icon">👤</div>
                    <span>Profil</span>
                </a>
            @endif
        </nav>
    </aside>

    <!-- MAIN CONTENT -->
    <main class="main">

        <div class="topbar">
            <div class="welcome">
                <h1>Daftar Pengaduan</h1>
                <p>Pantau seluruh laporan pengaduan yang masuk.</p>
            </div>

            <a href="{{ route('guru_pemantau.dashboard') }}"
               class="btn-detail"
               style="background: #eef0ff; color: #6675ca;">
                ← Kembali
            </a>
        </div>

        <div class="table-card">
            <table>
                <thead>
                    <tr>
                        <th>Tanggal</th>
                        <th>Pelapor</th>
                        <th>Kategori</th>
                        <th>Isi Laporan</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($pengaduan as $item)

                        <tr>
                            <!-- TANGGAL -->
                            <td>
                                {{ $item->created_at
                                    ? \Carbon\Carbon::parse($item->created_at)->format('d M Y')
                                    : '-' }}
                            </td>

                            <!-- NAMA SISWA -->
                            <td>
                                {{ $item->nama_siswa ?? 'Anonim' }}
                            </td>

                            <!-- KATEGORI -->
                            <td>
                                {{ $item->nama_kategori ?? '-' }}
                            </td>

                            <!-- ISI LAPORAN -->
                            <td>
                                {{ \Illuminate\Support\Str::limit(
                                    $item->isi_laporan ?? '-',
                                    40
                                ) }}
                            </td>

                            <!-- STATUS -->
                            <td>
                                @php
                                    $statusNama = $item->nama_status ?? 'Pending';
                                @endphp

                                @if($statusNama == 'Selesai')
                                    <span class="badge badge-selesai">
                                        Selesai
                                    </span>

                                @elseif($statusNama == 'Diproses')
                                    <span class="badge badge-proses">
                                        Diproses
                                    </span>

                                @else
                                    <span class="badge badge-pending">
                                        {{ $statusNama }}
                                    </span>
                                @endif
                            </td>

                            <!-- TOMBOL DETAIL -->
                            <td>
                                <a href="{{ route('guru_pemantau.pengaduan.detail', $item->id) }}"
                                   class="btn-detail">
                                    Lihat Detail
                                </a>
                            </td>
                        </tr>

                    @empty

                        <tr>
                            <td colspan="6"
                                style="text-align: center; padding: 30px; color: #a0a3b5;">
                                Belum ada data pengaduan.
                            </td>
                        </tr>

                    @endforelse
                </tbody>
            </table>
        </div>

    </main>

</body>
</html>
