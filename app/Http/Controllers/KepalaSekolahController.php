<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class KepalaSekolahController extends Controller
{
    private function cekAkses()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        if (Auth::user()->role !== 'kepala_sekolah') {
            abort(403, 'Akses dashboard hanya untuk Kepala Sekolah.');
        }

        return null;
    }


    // ==========================================
    // DASHBOARD KEPALA SEKOLAH
    // ==========================================

    public function dashboard()
    {
        $akses = $this->cekAkses();

        if ($akses) {
            return $akses;
        }

        // --------------------------------------
        // DAFTAR SEMUA PENGADUAN
        // --------------------------------------

        $pengaduan = DB::table('pengaduan')
            ->join(
                'siswa',
                'pengaduan.siswa_id',
                '=',
                'siswa.id'
            )
            ->join(
                'users',
                'siswa.user_id',
                '=',
                'users.id'
            )
            ->join(
                'kategori',
                'pengaduan.kategori_id',
                '=',
                'kategori.id'
            )
            ->join(
                'status',
                'pengaduan.status_id',
                '=',
                'status.id'
            )
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
                'status.nama_status'
            )
            ->orderByDesc('pengaduan.created_at')
            ->get();


        // --------------------------------------
        // STATISTIK TOTAL
        // --------------------------------------

        $totalPengaduan = DB::table('pengaduan')
            ->count();


        $menunggu = DB::table('pengaduan')
            ->join(
                'status',
                'pengaduan.status_id',
                '=',
                'status.id'
            )
            ->where(
                'status.nama_status',
                'Menunggu'
            )
            ->count();


        $diproses = DB::table('pengaduan')
            ->join(
                'status',
                'pengaduan.status_id',
                '=',
                'status.id'
            )
            ->where(
                'status.nama_status',
                'Diproses'
            )
            ->count();


        $selesai = DB::table('pengaduan')
            ->join(
                'status',
                'pengaduan.status_id',
                '=',
                'status.id'
            )
            ->where(
                'status.nama_status',
                'Selesai'
            )
            ->count();


        $ditolak = DB::table('pengaduan')
            ->join(
                'status',
                'pengaduan.status_id',
                '=',
                'status.id'
            )
            ->where(
                'status.nama_status',
                'Ditolak'
            )
            ->count();


        // --------------------------------------
        // REKAP BERDASARKAN KATEGORI
        // --------------------------------------

        $rekapKategori = DB::table('pengaduan')
            ->join(
                'kategori',
                'pengaduan.kategori_id',
                '=',
                'kategori.id'
            )
            ->select(
                'kategori.nama_kategori',
                DB::raw(
                    'COUNT(pengaduan.id) as jumlah'
                )
            )
            ->groupBy(
                'kategori.id',
                'kategori.nama_kategori'
            )
            ->orderByDesc('jumlah')
            ->get();


        // --------------------------------------
        // REKAP BERDASARKAN STATUS
        // --------------------------------------

        $rekapStatus = DB::table('pengaduan')
            ->join(
                'status',
                'pengaduan.status_id',
                '=',
                'status.id'
            )
            ->select(
                'status.nama_status',
                DB::raw(
                    'COUNT(pengaduan.id) as jumlah'
                )
            )
            ->groupBy(
                'status.id',
                'status.nama_status'
            )
            ->orderByDesc('jumlah')
            ->get();


        return view(
            'kepala_sekolah.dashboard',
            compact(
                'pengaduan',
                'totalPengaduan',
                'menunggu',
                'diproses',
                'selesai',
                'ditolak',
                'rekapKategori',
                'rekapStatus'
            )
        );
    }


    // ==========================================
    // DETAIL PENGADUAN
    // ==========================================

    public function detail($id)
    {
        $akses = $this->cekAkses();

        if ($akses) {
            return $akses;
        }


        // --------------------------------------
        // DATA PENGADUAN
        // --------------------------------------

        $pengaduan = DB::table('pengaduan')
            ->join(
                'siswa',
                'pengaduan.siswa_id',
                '=',
                'siswa.id'
            )
            ->join(
                'users',
                'siswa.user_id',
                '=',
                'users.id'
            )
            ->join(
                'kategori',
                'pengaduan.kategori_id',
                '=',
                'kategori.id'
            )
            ->join(
                'status',
                'pengaduan.status_id',
                '=',
                'status.id'
            )
            ->where(
                'pengaduan.id',
                $id
            )
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
                'Pengaduan tidak ditemukan.'
            );
        }


        // --------------------------------------
        // LAMPIRAN
        // --------------------------------------

        $lampiran = DB::table('lampiran')
            ->where(
                'pengaduan_id',
                $id
            )
            ->get();


        // --------------------------------------
        // RIWAYAT STATUS
        // --------------------------------------

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
            ->where(
                'riwayat_pengaduan.pengaduan_id',
                $id
            )
            ->select(
                'riwayat_pengaduan.id',
                'riwayat_pengaduan.keterangan',
                'riwayat_pengaduan.tanggal_perubahan',
                'status.nama_status',
                'users.name as nama_user'
            )
            ->orderBy(
                'riwayat_pengaduan.tanggal_perubahan'
            )
            ->get();


        // --------------------------------------
        // TANGGAPAN
        // --------------------------------------

        $tanggapan = DB::table('tanggapan')
            ->leftJoin(
                'users',
                'tanggapan.user_id',
                '=',
                'users.id'
            )
            ->where(
                'tanggapan.pengaduan_id',
                $id
            )
            ->select(
                'tanggapan.id',
                'tanggapan.isi_tanggapan',
                'tanggapan.created_at',
                'users.name as nama_user',
                'users.role'
            )
            ->orderBy(
                'tanggapan.created_at'
            )
            ->get();


        return view(
            'kepala_sekolah.pengaduan.detail',
            compact(
                'pengaduan',
                'lampiran',
                'riwayat',
                'tanggapan'
            )
        );
    }
}
