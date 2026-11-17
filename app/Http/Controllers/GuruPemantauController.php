<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class GuruPemantauController extends Controller
{
    // Mengambil data pengguna yang sedang login
    private function getUser()
    {
        return auth()->user();
    }


    // 1. Dashboard Guru Pemantau
    public function dashboard()
    {
        $user = $this->getUser();

        $pengaduan = DB::table('pengaduan')
            ->join('siswa', 'pengaduan.siswa_id', '=', 'siswa.id')
            ->join('users', 'siswa.user_id', '=', 'users.id')
            ->join('kategori', 'pengaduan.kategori_id', '=', 'kategori.id')
            ->join('status', 'pengaduan.status_id', '=', 'status.id')
            ->select(
                'pengaduan.*',
                'users.name as nama_siswa',
                'siswa.nis',
                'siswa.kelas',
                'kategori.nama_kategori as nama_kategori',
                'status.nama_status as nama_status'
            )
            ->orderBy('pengaduan.created_at', 'desc')
            ->get();

        return view(
            'guru_pemantau.dashboard',
            compact('pengaduan', 'user')
        );
    }


    // 2. Halaman Daftar Pengaduan
    public function pengaduan()
    {
        $user = $this->getUser();

        $pengaduan = DB::table('pengaduan')
            ->join('siswa', 'pengaduan.siswa_id', '=', 'siswa.id')
            ->join('users', 'siswa.user_id', '=', 'users.id')
            ->join('kategori', 'pengaduan.kategori_id', '=', 'kategori.id')
            ->join('status', 'pengaduan.status_id', '=', 'status.id')
            ->select(
                'pengaduan.*',
                'users.name as nama_siswa',
                'siswa.nis',
                'siswa.kelas',
                'kategori.nama_kategori as nama_kategori',
                'status.nama_status as nama_status'
            )
            ->orderBy('pengaduan.created_at', 'desc')
            ->get();

        return view(
            'guru_pemantau.pengaduan',
            compact('pengaduan', 'user')
        );
    }


    // 3. Halaman Detail Pengaduan
    public function detail($id)
    {
        $user = $this->getUser();

        // Mengambil data utama pengaduan
        $pengaduan = DB::table('pengaduan')
            ->join('siswa', 'pengaduan.siswa_id', '=', 'siswa.id')
            ->join('users', 'siswa.user_id', '=', 'users.id')
            ->join('kategori', 'pengaduan.kategori_id', '=', 'kategori.id')
            ->join('status', 'pengaduan.status_id', '=', 'status.id')
            ->select(
                'pengaduan.*',
                'users.name as nama_siswa',
                'siswa.nis',
                'siswa.kelas',
                'kategori.nama_kategori as nama_kategori',
                'status.nama_status as nama_status'
            )
            ->where('pengaduan.id', $id)
            ->first();

        // Jika pengaduan tidak ditemukan
        if (!$pengaduan) {
            abort(404, 'Data pengaduan tidak ditemukan.');
        }


        // Mengambil data lampiran
        $lampiran = DB::table('lampiran')
            ->where('pengaduan_id', $id)
            ->get();


        // Mengambil riwayat pengaduan
        $riwayat = DB::table('riwayat_pengaduan')
            ->leftJoin(
                'status',
                'riwayat_pengaduan.status_id',
                '=',
                'status.id'
            )
            ->select(
                'riwayat_pengaduan.*',
                'status.nama_status as nama_status'
            )
            ->where('riwayat_pengaduan.pengaduan_id', $id)
            ->orderBy(
                'riwayat_pengaduan.tanggal_perubahan',
                'desc'
            )
            ->get();


        // Mengambil tanggapan petugas
        $tanggapan = DB::table('tanggapan')
            ->leftJoin(
                'users',
                'tanggapan.user_id',
                '=',
                'users.id'
            )
            ->select(
                'tanggapan.*',
                'users.name as nama_user'
            )
            ->where('tanggapan.pengaduan_id', $id)
            ->orderBy('tanggapan.created_at', 'desc')
            ->get();


        // Mengirim seluruh data ke halaman detail
        return view(
            'guru_pemantau.pengaduan.detail',
            compact(
                'pengaduan',
                'lampiran',
                'riwayat',
                'tanggapan',
                'user'
            )
        );
    }
}
