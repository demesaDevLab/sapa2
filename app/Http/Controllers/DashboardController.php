<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function siswa()
    {
        // Pastikan user sudah login
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        // Pastikan role adalah siswa
        if (Auth::user()->role !== 'siswa') {
            abort(403, 'Akses dashboard siswa tidak diizinkan.');
        }

        $user = Auth::user();

        // Cari data siswa berdasarkan user_id
        $siswa = DB::table('siswa')
            ->where('user_id', $user->id)
            ->first();

        // Nilai default
        $totalPengaduan = 0;
        $menunggu = 0;
        $diproses = 0;
        $selesai = 0;
        $ditolak = 0;

        $pengaduanTerbaru = collect();

        // Variabel untuk detail pengaduan
        $pengaduan = null;

        // Jika data siswa tersedia
        if ($siswa) {

            // =========================
            // TOTAL PENGADUAN
            // =========================

            $totalPengaduan = DB::table('pengaduan')
                ->where('siswa_id', $siswa->id)
                ->count();


            // =========================
            // STATUS MENUNGGU
            // =========================

            $menunggu = DB::table('pengaduan')
                ->join(
                    'status',
                    'pengaduan.status_id',
                    '=',
                    'status.id'
                )
                ->where('pengaduan.siswa_id', $siswa->id)
                ->where('status.nama_status', 'Menunggu')
                ->count();


            // =========================
            // STATUS DIPROSES
            // =========================

            $diproses = DB::table('pengaduan')
                ->join(
                    'status',
                    'pengaduan.status_id',
                    '=',
                    'status.id'
                )
                ->where('pengaduan.siswa_id', $siswa->id)
                ->where('status.nama_status', 'Diproses')
                ->count();


            // =========================
            // STATUS SELESAI
            // =========================

            $selesai = DB::table('pengaduan')
                ->join(
                    'status',
                    'pengaduan.status_id',
                    '=',
                    'status.id'
                )
                ->where('pengaduan.siswa_id', $siswa->id)
                ->where('status.nama_status', 'Selesai')
                ->count();


            // =========================
            // STATUS DITOLAK
            // =========================

            $ditolak = DB::table('pengaduan')
                ->join(
                    'status',
                    'pengaduan.status_id',
                    '=',
                    'status.id'
                )
                ->where('pengaduan.siswa_id', $siswa->id)
                ->where('status.nama_status', 'Ditolak')
                ->count();


            // =========================
            // PENGADUAN TERBARU
            // =========================

            $pengaduanTerbaru = DB::table('pengaduan')
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
                ->where('pengaduan.siswa_id', $siswa->id)
                ->select(
                    'pengaduan.id',
                    'pengaduan.nomor_tiket',
                    'pengaduan.judul',
                    'pengaduan.tanggal_pengaduan',
                    'kategori.nama_kategori',
                    'status.nama_status'
                )
                ->orderByDesc('pengaduan.created_at')
                ->limit(5)
                ->get();


            // =========================
            // DETAIL PENGADUAN TERBARU
            // =========================
            //
            // Blade dashboard menggunakan
            // variabel $pengaduan.
            //
            // Kita ambil 1 pengaduan terbaru
            // milik siswa yang sedang login.

            $pengaduan = DB::table('pengaduan')
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
                ->where('pengaduan.siswa_id', $siswa->id)
                ->select(
                    'pengaduan.*',
                    'kategori.nama_kategori',
                    'kategori.deskripsi as deskripsi_kategori',
                    'status.nama_status'
                )
                ->orderByDesc('pengaduan.created_at')
                ->first();
        }

        return view('dashboard.siswa', compact(
            'user',
            'siswa',
            'totalPengaduan',
            'menunggu',
            'diproses',
            'selesai',
            'ditolak',
            'pengaduanTerbaru',
            'pengaduan'
        ));
    }
}
