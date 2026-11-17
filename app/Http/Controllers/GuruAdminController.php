<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class GuruAdminController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | CEK AKSES GURU / ADMIN
    |--------------------------------------------------------------------------
    */

    private function cekAkses()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        if (Auth::user()->role !== 'guru_admin') {
            abort(403, 'Akses hanya untuk Guru/Admin.');
        }

        return null;
    }

    /*
    |--------------------------------------------------------------------------
    | DASHBOARD GURU / ADMIN
    |--------------------------------------------------------------------------
    */

    public function dashboard()
    {
        $akses = $this->cekAkses();

        if ($akses) {
            return $akses;
        }

        // DATA SELURUH PENGADUAN
        $pengaduan = DB::table('pengaduan')
            ->join('siswa', 'pengaduan.siswa_id', '=', 'siswa.id')
            ->join('users', 'siswa.user_id', '=', 'users.id')
            ->join('kategori', 'pengaduan.kategori_id', '=', 'kategori.id')
            ->join('status', 'pengaduan.status_id', '=', 'status.id')
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

        // TOTAL PENGADUAN
        $totalPengaduan = DB::table('pengaduan')->count();

        // STATUS MENUNGGU
        $menunggu = DB::table('pengaduan')
            ->join('status', 'pengaduan.status_id', '=', 'status.id')
            ->where('status.nama_status', 'Menunggu')
            ->count();

        // STATUS DIPROSES
        $diproses = DB::table('pengaduan')
            ->join('status', 'pengaduan.status_id', '=', 'status.id')
            ->where('status.nama_status', 'Diproses')
            ->count();

        // STATUS SELESAI
        $selesai = DB::table('pengaduan')
            ->join('status', 'pengaduan.status_id', '=', 'status.id')
            ->where('status.nama_status', 'Selesai')
            ->count();

        // STATUS DITOLAK
        $ditolak = DB::table('pengaduan')
            ->join('status', 'pengaduan.status_id', '=', 'status.id')
            ->where('status.nama_status', 'Ditolak')
            ->count();

        // =====================================
        // REKAP PENGADUAN BERDASARKAN KATEGORI
        // =====================================

        $rekapKategori = DB::table('pengaduan')
            ->join(
                'kategori',
                'pengaduan.kategori_id',
                '=',
                'kategori.id'
            )
            ->select(
                'kategori.nama_kategori',
                DB::raw('COUNT(pengaduan.id) as total_data')
            )
            ->groupBy(
                'kategori.id',
                'kategori.nama_kategori'
            )
            ->get();

        // =====================================
        // REKAP PENGADUAN BERDASARKAN STATUS
        // =====================================

        $rekapStatus = DB::table('pengaduan')
            ->join(
                'status',
                'pengaduan.status_id',
                '=',
                'status.id'
            )
            ->select(
                'status.nama_status',
                DB::raw('COUNT(pengaduan.id) as total_data')
            )
            ->groupBy(
                'status.id',
                'status.nama_status'
            )
            ->get();

        // =====================================
        // REKAP PENGADUAN BERDASARKAN KELAS
        // =====================================

        $rekapKelas = DB::table('pengaduan')
            ->join(
                'siswa',
                'pengaduan.siswa_id',
                '=',
                'siswa.id'
            )
            ->select(
                'siswa.kelas',
                DB::raw('COUNT(pengaduan.id) as total_data')
            )
            ->groupBy('siswa.kelas')
            ->get();

        // KIRIM DATA KE HALAMAN DASHBOARD
        return view(
            'guru_admin.dashboard',
            compact(
                'pengaduan',
                'totalPengaduan',
                'menunggu',
                'diproses',
                'selesai',
                'ditolak',
                'rekapKategori',
                'rekapStatus',
                'rekapKelas'
            )
        );
    }

    /*
    |--------------------------------------------------------------------------
    | A. TERIMA DAN PROSES PENGADUAN
    |--------------------------------------------------------------------------
    */

    public function proses($id)
    {
        $akses = $this->cekAkses();

        if ($akses) {
            return $akses;
        }

        $pengaduan = DB::table('pengaduan')
            ->where('id', $id)
            ->first();

        if (!$pengaduan) {
            abort(404, 'Pengaduan tidak ditemukan.');
        }

        $statusMenunggu = DB::table('status')
            ->where('nama_status', 'Menunggu')
            ->first();

        $statusDiproses = DB::table('status')
            ->where('nama_status', 'Diproses')
            ->first();

        if (!$statusDiproses) {
            return back()->with(
                'error',
                'Status Diproses belum tersedia di database.'
            );
        }

        if (
            !$statusMenunggu ||
            (int) $pengaduan->status_id !== (int) $statusMenunggu->id
        ) {
            return back()->with(
                'error',
                'Pengaduan ini tidak dapat diproses karena statusnya sudah berubah.'
            );
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
                'keterangan' => 'Pengaduan diterima dan mulai diproses oleh Guru/Admin.',
                'tanggal_perubahan' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        });

        return redirect()
            ->route('guru_admin.dashboard')
            ->with(
                'success',
                'Pengaduan berhasil diterima dan sedang diproses!'
            );
    }

    /*
    |--------------------------------------------------------------------------
    | B. TOLAK PENGADUAN
    |--------------------------------------------------------------------------
    */

    public function tolak(Request $request, $id)
    {
        $akses = $this->cekAkses();

        if ($akses) {
            return $akses;
        }

        $validated = $request->validate(
            [
                'keterangan' => [
                    'required',
                    'string',
                    'max:2000',
                ],
            ],
            [
                'keterangan.required' => 'Alasan penolakan wajib diisi.',
                'keterangan.max' => 'Alasan maksimal 2000 karakter.',
            ]
        );

        $pengaduan = DB::table('pengaduan')
            ->where('id', $id)
            ->first();

        if (!$pengaduan) {
            abort(404, 'Pengaduan tidak ditemukan.');
        }

        $statusDitolak = DB::table('status')
            ->where('nama_status', 'Ditolak')
            ->first();

        if (!$statusDitolak) {
            return back()->with(
                'error',
                'Status Ditolak belum tersedia di database.'
            );
        }

        if ((int) $pengaduan->status_id === (int) $statusDitolak->id) {
            return back()->with(
                'error',
                'Pengaduan ini sudah berstatus Ditolak.'
            );
        }

        DB::transaction(function () use (
            $id,
            $validated,
            $statusDitolak
        ) {

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
                'keterangan' => 'Pengaduan ditolak oleh Guru/Admin. Alasan: '
                    . $validated['keterangan'],
                'tanggal_perubahan' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        });

        return redirect()
            ->route('guru_admin.dashboard')
            ->with(
                'success',
                'Pengaduan berhasil ditolak.'
            );
    }

    /*
    |--------------------------------------------------------------------------
    | BERIKAN TANGGAPAN
    |--------------------------------------------------------------------------
    */

    public function tanggapan(Request $request, $id)
    {
        $akses = $this->cekAkses();

        if ($akses) {
            return $akses;
        }

        $validated = $request->validate(
            [
                'tanggapan' => [
                    'required',
                    'string',
                    'max:2000',
                ],
            ],
            [
                'tanggapan.required' => 'Tanggapan wajib diisi.',
                'tanggapan.max' => 'Tanggapan maksimal 2000 karakter.',
            ]
        );

        $pengaduan = DB::table('pengaduan')
            ->where('id', $id)
            ->first();

        if (!$pengaduan) {
            abort(404, 'Pengaduan tidak ditemukan.');
        }

        DB::table('tanggapan')->insert([
            'pengaduan_id' => $id,
            'user_id' => Auth::id(),
            'isi_tanggapan' => $validated['tanggapan'],
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return back()->with(
            'success',
            'Tanggapan berhasil dikirim.'
        );
    }

    /*
    |--------------------------------------------------------------------------
    | SELESAIKAN PENGADUAN
    |--------------------------------------------------------------------------
    */

    public function selesai(Request $request, $id)
    {
        $akses = $this->cekAkses();

        if ($akses) {
            return $akses;
        }

        $validated = $request->validate(
            [
                'tanggapan' => [
                    'required',
                    'string',
                    'max:2000',
                ],
            ],
            [
                'tanggapan.required' => 'Tanggapan akhir wajib diisi.',
                'tanggapan.max' => 'Tanggapan maksimal 2000 karakter.',
            ]
        );

        $pengaduan = DB::table('pengaduan')
            ->where('id', $id)
            ->first();

        if (!$pengaduan) {
            abort(404, 'Pengaduan tidak ditemukan.');
        }

        $statusSelesai = DB::table('status')
            ->where('nama_status', 'Selesai')
            ->first();

        if (!$statusSelesai) {
            return back()->with(
                'error',
                'Status Selesai belum tersedia di database.'
            );
        }

        if ((int) $pengaduan->status_id === (int) $statusSelesai->id) {
            return back()->with(
                'error',
                'Pengaduan ini sudah berstatus Selesai.'
            );
        }

        DB::transaction(function () use (
            $id,
            $validated,
            $statusSelesai
        ) {

            DB::table('tanggapan')->insert([
                'pengaduan_id' => $id,
                'user_id' => Auth::id(),
                'isi_tanggapan' => $validated['tanggapan'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);

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
                'keterangan' => 'Pengaduan diselesaikan oleh Guru/Admin. Tanggapan akhir: '
                    . $validated['tanggapan'],
                'tanggal_perubahan' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        });

        return redirect()
            ->route('guru_admin.dashboard')
            ->with(
                'success',
                'Pengaduan berhasil diselesaikan!'
            );
    }

    /*
    |--------------------------------------------------------------------------
    | DETAIL PENGADUAN GURU / ADMIN
    |--------------------------------------------------------------------------
    */

    public function detail($id)
    {
        $akses = $this->cekAkses();

        if ($akses) {
            return $akses;
        }

        $pengaduan = DB::table('pengaduan')
            ->join('siswa', 'pengaduan.siswa_id', '=', 'siswa.id')
            ->join('users', 'siswa.user_id', '=', 'users.id')
            ->join('kategori', 'pengaduan.kategori_id', '=', 'kategori.id')
            ->join('status', 'pengaduan.status_id', '=', 'status.id')
            ->where('pengaduan.id', $id)
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
            abort(404, 'Pengaduan tidak ditemukan.');
        }

        $lampiran = DB::table('lampiran')
            ->where('pengaduan_id', $id)
            ->get();

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
                'users.name as nama_user',
                'users.role'
            )
            ->orderBy('riwayat_pengaduan.tanggal_perubahan')
            ->get();

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
            'guru_admin.pengaduan.detail',
            compact(
                'pengaduan',
                'lampiran',
                'riwayat',
                'tanggapan'
            )
        );
    }
}
