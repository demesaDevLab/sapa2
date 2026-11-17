<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class WakasekController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | CEK AKSES WAKASEK
    |--------------------------------------------------------------------------
    */

    private function cekAkses()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        if (Auth::user()->role !== 'wakasek') {
            abort(403, 'Akses dashboard hanya untuk Wakasek.');
        }

        return null;
    }

    /*
    |--------------------------------------------------------------------------
    | MENDAPATKAN KATEGORI SESUAI JABATAN WAKASEK
    |--------------------------------------------------------------------------
    */

    private function getKategoriWakasek()
    {
        $wakasek = DB::table('wakasek')
            ->where('user_id', Auth::id())
            ->first();

        if (!$wakasek) {
            abort(403, 'Data Wakasek tidak ditemukan.');
        }

        $jabatan = strtolower(trim($wakasek->jabatan_wakasek));

        $mappingKategori = [
            'wakasek kurikulum' => 'Pembelajaran',

            'wakasek sarpras' => 'Fasilitas',
            'wakasek sarana & prasarana' => 'Fasilitas',
            'wakasek sarana dan prasarana' => 'Fasilitas',

            'wakasek humas' => 'Pelayanan Sekolah',

            'wakasek kesiswaan' => 'Lainnya',
        ];

        $kategoriWakasek = $mappingKategori[$jabatan] ?? null;

        if (!$kategoriWakasek) {
            abort(403, 'Jabatan Wakasek tidak memiliki kategori yang sesuai.');
        }

        return $kategoriWakasek;
    }

    /*
    |--------------------------------------------------------------------------
    | DASHBOARD WAKASEK
    |--------------------------------------------------------------------------
    */

    public function dashboard()
    {
        $akses = $this->cekAkses();

        if ($akses) {
            return $akses;
        }

        $kategoriWakasek = $this->getKategoriWakasek();

        // DAFTAR PENGADUAN
        $pengaduan = DB::table('pengaduan')
            ->join('siswa', 'pengaduan.siswa_id', '=', 'siswa.id')
            ->join('users', 'siswa.user_id', '=', 'users.id')
            ->join('kategori', 'pengaduan.kategori_id', '=', 'kategori.id')
            ->join('status', 'pengaduan.status_id', '=', 'status.id')
            ->where('kategori.nama_kategori', $kategoriWakasek)
            ->select(
                'pengaduan.id',
                'pengaduan.nomor_tiket',
                'pengaduan.judul',
                'pengaduan.isi_pengaduan',
                'pengaduan.tanggal_pengaduan',
                'pengaduan.created_at',
                'users.name as nama_siswa',
                'siswa.nis',
                'siswa.kelas',
                'siswa.jurusan',
                'kategori.nama_kategori',
                'status.nama_status',
                DB::raw('(
                    SELECT COUNT(*)
                    FROM tanggapan
                    WHERE tanggapan.pengaduan_id = pengaduan.id
                ) as jumlah_tanggapan')
            )
            // MENGHITUNG JUMLAH TANGGAPAN GURU/ADMIN
            ->selectSub(function ($query) {
                $query->from('tanggapan')
                    ->selectRaw('COUNT(*)')
                    ->whereColumn(
                        'tanggapan.pengaduan_id',
                        'pengaduan.id'
                    );
            }, 'jumlah_tanggapan')
            ->orderByDesc('pengaduan.created_at')
            ->get();

        // TOTAL PENGADUAN
        $totalPengaduan = DB::table('pengaduan')
            ->join('kategori', 'pengaduan.kategori_id', '=', 'kategori.id')
            ->where('kategori.nama_kategori', $kategoriWakasek)
            ->count();

        // STATISTIK MENUNGGU
        $menunggu = DB::table('pengaduan')
            ->join('kategori', 'pengaduan.kategori_id', '=', 'kategori.id')
            ->join('status', 'pengaduan.status_id', '=', 'status.id')
            ->where('kategori.nama_kategori', $kategoriWakasek)
            ->where('status.nama_status', 'Menunggu')
            ->count();

        // STATISTIK DIPROSES
        $diproses = DB::table('pengaduan')
            ->join('kategori', 'pengaduan.kategori_id', '=', 'kategori.id')
            ->join('status', 'pengaduan.status_id', '=', 'status.id')
            ->where('kategori.nama_kategori', $kategoriWakasek)
            ->where('status.nama_status', 'Diproses')
            ->count();

        // STATISTIK SELESAI
        $selesai = DB::table('pengaduan')
            ->join('kategori', 'pengaduan.kategori_id', '=', 'kategori.id')
            ->join('status', 'pengaduan.status_id', '=', 'status.id')
            ->where('kategori.nama_kategori', $kategoriWakasek)
            ->where('status.nama_status', 'Selesai')
            ->count();

        // STATISTIK DITOLAK
        $ditolak = DB::table('pengaduan')
            ->join('kategori', 'pengaduan.kategori_id', '=', 'kategori.id')
            ->join('status', 'pengaduan.status_id', '=', 'status.id')
            ->where('kategori.nama_kategori', $kategoriWakasek)
            ->where('status.nama_status', 'Ditolak')
            ->count();

        // REKAP KATEGORI
        $rekapKategori = DB::table('pengaduan')
            ->join('kategori', 'pengaduan.kategori_id', '=', 'kategori.id')
            ->where('kategori.nama_kategori', $kategoriWakasek)
            ->select(
                'kategori.nama_kategori',
                DB::raw('COUNT(pengaduan.id) as jumlah')
            )
            ->groupBy('kategori.id', 'kategori.nama_kategori')
            ->orderByDesc('jumlah')
            ->get();

        // REKAP STATUS
        $rekapStatus = DB::table('pengaduan')
            ->join('kategori', 'pengaduan.kategori_id', '=', 'kategori.id')
            ->join('status', 'pengaduan.status_id', '=', 'status.id')
            ->where('kategori.nama_kategori', $kategoriWakasek)
            ->select(
                'status.nama_status',
                DB::raw('COUNT(pengaduan.id) as jumlah')
            )
            ->groupBy('status.id', 'status.nama_status')
            ->orderByDesc('jumlah')
            ->get();

        return view(
            'wakasek.dashboard',
            compact(
                'pengaduan',
                'totalPengaduan',
                'menunggu',
                'diproses',
                'selesai',
                'ditolak',
                'rekapKategori',
                'rekapStatus',
                'kategoriWakasek'
            )
        );
    }

    /*
    |--------------------------------------------------------------------------
    | DETAIL PENGADUAN
    |--------------------------------------------------------------------------
    */

    public function detail($id)
    {
        $akses = $this->cekAkses();

        if ($akses) {
            return $akses;
        }

        $kategoriWakasek = $this->getKategoriWakasek();

        // DATA PENGADUAN
        $pengaduan = DB::table('pengaduan')
            ->join('siswa', 'pengaduan.siswa_id', '=', 'siswa.id')
            ->join('users', 'siswa.user_id', '=', 'users.id')
            ->join('kategori', 'pengaduan.kategori_id', '=', 'kategori.id')
            ->join('status', 'pengaduan.status_id', '=', 'status.id')
            ->where('pengaduan.id', $id)
            ->where('kategori.nama_kategori', $kategoriWakasek)
            ->select(
                'pengaduan.*',
                'users.name as nama_siswa',
                'users.email as email_siswa',
                'users.phone_number',
                'siswa.nis',
                'siswa.kelas',
                'siswa.jurusan',
                'kategori.nama_kategori',
                'kategori.deskripsi as deskripsi_kategori',
                'status.nama_status',
                'status.deskripsi as deskripsi_status'
            )
            ->first();

        if (!$pengaduan) {
            abort(
                404,
                'Pengaduan tidak ditemukan atau bukan bagian dari kategori Anda.'
            );
        }

        // LAMPIRAN
        $lampiran = DB::table('lampiran')
            ->where('pengaduan_id', $id)
            ->get();

        // RIWAYAT STATUS
        $riwayat = DB::table('riwayat_pengaduan')
            ->join(
                'status',
                'riwayat_pengaduan.status_id',
                '=',
                'status.id'
            )
            ->leftJoin(
                'users',
                'riwayat_pengaduan.user_id',
                '=',
                'users.id'
            )
            ->where('riwayat_pengaduan.pengaduan_id', $id)
            ->select(
                'riwayat_pengaduan.id',
                'riwayat_pengaduan.keterangan',
                'riwayat_pengaduan.tanggal_perubahan',
                'status.nama_status',
                'users.name as nama_user'
            )
            ->orderBy('riwayat_pengaduan.tanggal_perubahan')
            ->get();

        // TANGGAPAN
        $tanggapan = DB::table('tanggapan')
            ->leftJoin(
                'users',
                'tanggapan.user_id',
                '=',
                'users.id'
            )
            ->where('tanggapan.pengaduan_id', $id)
            ->select(
                'tanggapan.id',
                'tanggapan.isi_tanggapan',
                'tanggapan.created_at',
                'users.name as nama_user',
                'users.role'
            )
            ->orderBy('tanggapan.created_at')
            ->get();

        return view(
            'wakasek.pengaduan.detail',
            compact(
                'pengaduan',
                'lampiran',
                'riwayat',
                'tanggapan'
            )
        );
    }

    /*
    |--------------------------------------------------------------------------
    | TERIMA / PROSES PENGADUAN
    |--------------------------------------------------------------------------
    */

    public function proses($id)
    {
        $akses = $this->cekAkses();

        if ($akses) {
            return $akses;
        }

        $kategoriWakasek = $this->getKategoriWakasek();

        $pengaduan = DB::table('pengaduan')
            ->join('kategori', 'pengaduan.kategori_id', '=', 'kategori.id')
            ->where('pengaduan.id', $id)
            ->where('kategori.nama_kategori', $kategoriWakasek)
            ->select('pengaduan.id', 'pengaduan.status_id')
            ->first();

        if (!$pengaduan) {
            abort(
                404,
                'Pengaduan tidak ditemukan atau bukan bagian dari kategori Anda.'
            );
        }

        // PASTIKAN STATUS MASIH MENUNGGU
        $statusMenunggu = DB::table('status')
            ->where('nama_status', 'Menunggu')
            ->first();

        if (!$statusMenunggu) {
            abort(500, 'Status Menunggu tidak ditemukan.');
        }

        if ($pengaduan->status_id != $statusMenunggu->id) {
            return back()->with('error', 'Pengaduan ini sudah tidak dapat diproses.');
        }

        $statusDiproses = DB::table('status')
            ->where('nama_status', 'Diproses')
            ->first();

        if (!$statusDiproses) {
            abort(500, 'Status Diproses tidak ditemukan.');
        }

        DB::transaction(function () use ($id, $statusDiproses) {
            DB::table('pengaduan')
                ->where('id', $id)
                ->update([
                    'status_id' => $statusDiproses->id,
                    'updated_at' => now(),
                ]);

            DB::table('riwayat_pengaduan')->insert([
                'pengaduan_id' => $id,
                'status_id' => $statusDiproses->id,
                'user_id' => Auth::id(),
                'keterangan' => 'Pengaduan diterima dan diproses oleh Wakasek.',
                'tanggal_perubahan' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        });

        return redirect()
            ->route('wakasek.pengaduan.detail', $id)
            ->with('success', 'Pengaduan berhasil diterima dan diproses.');
    }

    /*
    |--------------------------------------------------------------------------
    | TOLAK PENGADUAN
    |--------------------------------------------------------------------------
    */

    public function tolak(Request $request, $id)
    {
        $akses = $this->cekAkses();

        if ($akses) {
            return $akses;
        }

        $request->validate([
            'keterangan' => 'required|string|max:1000',
        ]);

        $kategoriWakasek = $this->getKategoriWakasek();

        $pengaduan = DB::table('pengaduan')
            ->join('kategori', 'pengaduan.kategori_id', '=', 'kategori.id')
            ->where('pengaduan.id', $id)
            ->where('kategori.nama_kategori', $kategoriWakasek)
            ->select('pengaduan.id', 'pengaduan.status_id')
            ->first();

        if (!$pengaduan) {
            abort(
                404,
                'Pengaduan tidak ditemukan atau bukan bagian dari kategori Anda.'
            );
        }

        $statusMenunggu = DB::table('status')
            ->where('nama_status', 'Menunggu')
            ->first();

        if (!$statusMenunggu) {
            abort(500, 'Status Menunggu tidak ditemukan.');
        }

        if ($pengaduan->status_id != $statusMenunggu->id) {
            return back()->with('error', 'Pengaduan ini sudah tidak dapat ditolak.');
        }

        $statusDitolak = DB::table('status')
            ->where('nama_status', 'Ditolak')
            ->first();

        if (!$statusDitolak) {
            abort(500, 'Status Ditolak tidak ditemukan.');
        }

        DB::transaction(function () use ($id, $statusDitolak, $request) {
            DB::table('pengaduan')
                ->where('id', $id)
                ->update([
                    'status_id' => $statusDitolak->id,
                    'updated_at' => now(),
                ]);

            DB::table('riwayat_pengaduan')->insert([
                'pengaduan_id' => $id,
                'status_id' => $statusDitolak->id,
                'user_id' => Auth::id(),
                'keterangan' => $request->keterangan,
                'tanggal_perubahan' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        });

        return redirect()
            ->route('wakasek.pengaduan.detail', $id)
            ->with('success', 'Pengaduan berhasil ditolak.');
    }

    /*
    |--------------------------------------------------------------------------
    | SELESAIKAN PENGADUAN
    |--------------------------------------------------------------------------
    */

    public function selesai($id)
    {
        $akses = $this->cekAkses();

        if ($akses) {
            return $akses;
        }

        $kategoriWakasek = $this->getKategoriWakasek();

        $pengaduan = DB::table('pengaduan')
            ->join('kategori', 'pengaduan.kategori_id', '=', 'kategori.id')
            ->where('pengaduan.id', $id)
            ->where('kategori.nama_kategori', $kategoriWakasek)
            ->select('pengaduan.id', 'pengaduan.status_id')
            ->first();

        if (!$pengaduan) {
            abort(
                404,
                'Pengaduan tidak ditemukan atau bukan bagian dari kategori Anda.'
            );
        }

        // PASTIKAN STATUS SAAT INI DIPROSES
        $statusDiproses = DB::table('status')
            ->where('nama_status', 'Diproses')
            ->first();

        if (!$statusDiproses) {
            abort(500, 'Status Diproses tidak ditemukan.');
        }

        if ($pengaduan->status_id != $statusDiproses->id) {
            return back()->with(
                'error',
                'Hanya pengaduan yang sedang diproses yang dapat diselesaikan.'
            );
        }

        $statusSelesai = DB::table('status')
            ->where('nama_status', 'Selesai')
            ->first();

        if (!$statusSelesai) {
            abort(500, 'Status Selesai tidak ditemukan.');
        }

        DB::transaction(function () use ($id, $statusSelesai) {
            DB::table('pengaduan')
                ->where('id', $id)
                ->update([
                    'status_id' => $statusSelesai->id,
                    'updated_at' => now(),
                ]);

            DB::table('riwayat_pengaduan')->insert([
                'pengaduan_id' => $id,
                'status_id' => $statusSelesai->id,
                'user_id' => Auth::id(),
                'keterangan' => 'Pengaduan telah selesai ditangani oleh Wakasek.',
                'tanggal_perubahan' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        });

        return redirect()
            ->route('wakasek.pengaduan.detail', $id)
            ->with('success', 'Pengaduan berhasil diselesaikan.');
    }
}