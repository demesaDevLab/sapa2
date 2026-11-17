<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PengaduanController extends Controller
{
    // ==============================
    // FORM BUAT PENGADUAN
    // ==============================

    public function create()
    {
        if (!Auth::check() || Auth::user()->role !== 'siswa') {
            abort(403, 'Akses hanya untuk siswa.');
        }

        $siswa = DB::table('siswa')
            ->where('user_id', Auth::id())
            ->first();

        if (!$siswa) {
            return redirect()
                ->route('dashboard')
                ->with('error', 'Data siswa belum ditemukan.');
        }

        $kategori = DB::table('kategori')
            ->orderBy('nama_kategori')
            ->get();

        return view('pengaduan.create', [
            'siswa' => $siswa,
            'kategori' => $kategori,
        ]);
    }


    // ==============================
    // SIMPAN PENGADUAN
    // ==============================

    public function store(Request $request)
    {
        if (!Auth::check() || Auth::user()->role !== 'siswa') {
            abort(403, 'Akses hanya untuk siswa.');
        }

        $validated = $request->validate([
            'kategori_id' => [
                'required',
                'integer',
                'exists:kategori,id',
            ],

            'judul' => [
                'required',
                'string',
                'max:255',
            ],

            'isi_pengaduan' => [
                'required',
                'string',
            ],

            'lampiran' => [
                'nullable',
                'file',
                'mimes:jpg,jpeg,png,pdf',
                'max:2048',
            ],
        ], [
            'kategori_id.required' =>
                'Kategori pengaduan wajib dipilih.',

            'kategori_id.exists' =>
                'Kategori pengaduan tidak valid.',

            'judul.required' =>
                'Judul pengaduan wajib diisi.',

            'judul.max' =>
                'Judul pengaduan maksimal 255 karakter.',

            'isi_pengaduan.required' =>
                'Isi pengaduan wajib diisi.',

            'lampiran.mimes' =>
                'Bukti harus berupa JPG, JPEG, PNG, atau PDF.',

            'lampiran.max' =>
                'Ukuran bukti maksimal 2 MB.',
        ]);

        $siswa = DB::table('siswa')
            ->where('user_id', Auth::id())
            ->first();

        if (!$siswa) {
            return back()
                ->with('error', 'Data siswa belum ditemukan.')
                ->withInput();
        }

        $statusMenunggu = DB::table('status')
            ->where('nama_status', 'Menunggu')
            ->first();

        if (!$statusMenunggu) {
            return back()
                ->with('error', 'Status Menunggu belum tersedia.')
                ->withInput();
        }

        // ==============================
        // BUAT NOMOR TIKET
        // ==============================

        do {
            $nomorTiket =
                'SAPA-' .
                date('Ymd') .
                '-' .
                strtoupper(substr(uniqid(), -6));

            $cekTiket = DB::table('pengaduan')
                ->where('nomor_tiket', $nomorTiket)
                ->exists();

        } while ($cekTiket);


        // ==============================
        // SIMPAN PENGADUAN
        // ==============================

        $pengaduanId = DB::table('pengaduan')->insertGetId([
            'siswa_id' => $siswa->id,
            'kategori_id' => $validated['kategori_id'],
            'status_id' => $statusMenunggu->id,
            'nomor_tiket' => $nomorTiket,
            'judul' => $validated['judul'],
            'isi_pengaduan' => $validated['isi_pengaduan'],
            'tanggal_pengaduan' => now()->toDateString(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);


        // ==============================
        // SIMPAN LAMPIRAN
        // ==============================

        if ($request->hasFile('lampiran')) {

            $file = $request->file('lampiran');

            $namaFile =
                time() . '_' .
                $file->getClientOriginalName();

            $path = $file->store(
                'lampiran',
                'public'
            );

            DB::table('lampiran')->insert([
                'pengaduan_id' => $pengaduanId,
                'nama_file' => $namaFile,
                'path_file' => $path,
                'tipe_file' => $file->getClientMimeType(),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }


        // ==============================
        // RIWAYAT PERTAMA
        // ==============================

        DB::table('riwayat_pengaduan')->insert([
            'pengaduan_id' => $pengaduanId,
            'status_id' => $statusMenunggu->id,
            'user_id' => Auth::id(),
            'keterangan' =>
                'Pengaduan berhasil dikirim dan menunggu diproses.',
            'tanggal_perubahan' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);


        // ==============================
        // HALAMAN SUKSES
        // ==============================

        return redirect()
            ->route('pengaduan.success', $pengaduanId);
    }


    // ==============================
    // RIWAYAT PENGADUAN
    // ==============================

    public function riwayat()
    {
        if (!Auth::check() || Auth::user()->role !== 'siswa') {
            abort(403, 'Akses hanya untuk siswa.');
        }

        $siswa = DB::table('siswa')
            ->where('user_id', Auth::id())
            ->first();

        if (!$siswa) {
            return redirect()
                ->route('dashboard')
                ->with(
                    'error',
                    'Data siswa belum ditemukan.'
                );
        }

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
            ->where(
                'pengaduan.siswa_id',
                $siswa->id
            )
            ->select(
                'pengaduan.id',
                'pengaduan.nomor_tiket',
                'pengaduan.judul',
                'pengaduan.tanggal_pengaduan',
                'kategori.nama_kategori',
                'status.nama_status'
            )
            ->orderByDesc('pengaduan.created_at')
            ->get();

        return view('pengaduan.riwayat', [
            'pengaduan' => $pengaduan,
        ]);
    }


    // ==============================
    // DETAIL PENGADUAN
    // ==============================

    public function detail($id)
    {
        if (!Auth::check() || Auth::user()->role !== 'siswa') {
            abort(403, 'Akses hanya untuk siswa.');
        }

        $siswa = DB::table('siswa')
            ->where('user_id', Auth::id())
            ->first();

        if (!$siswa) {
            abort(404, 'Data siswa tidak ditemukan.');
        }

        // Mengambil detail pengaduan beserta kategori dan status
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
            ->where(
                'pengaduan.id',
                $id
            )
            ->where(
                'pengaduan.siswa_id',
                $siswa->id
            )
            ->select(
                'pengaduan.*',
                'kategori.nama_kategori',
                'kategori.deskripsi as deskripsi_kategori',
                'status.nama_status',
                'status.deskripsi as deskripsi_status'
            )
            ->first();

        if (!$pengaduan) {
            abort(404, 'Pengaduan tidak ditemukan.');
        }

        // Mengambil lampiran
        $lampiran = DB::table('lampiran')
            ->where(
                'pengaduan_id',
                $pengaduan->id
            )
            ->get();

        // Mengambil riwayat perubahan status
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
                $pengaduan->id
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

        // Mengambil tanggapan Guru/Admin
        $tanggapan = DB::table('tanggapan')
            ->leftJoin(
                'users',
                'tanggapan.user_id',
                '=',
                'users.id'
            )
            ->where(
                'tanggapan.pengaduan_id',
                $pengaduan->id
            )
            ->select(
                'tanggapan.id',
                'tanggapan.isi_tanggapan',
                'tanggapan.created_at',
                'users.name as nama_user',
                'users.role'
            )
            ->orderBy('tanggapan.created_at')
            ->get();

        return view('pengaduan.detail', [
            'pengaduan' => $pengaduan,
            'lampiran' => $lampiran,
            'riwayat' => $riwayat,
            'tanggapan' => $tanggapan,
        ]);
    }


    // ==============================
    // HALAMAN SUKSES
    // ==============================

    public function success($id)
    {
        if (!Auth::check() || Auth::user()->role !== 'siswa') {
            abort(403, 'Akses hanya untuk siswa.');
        }

        $siswa = DB::table('siswa')
            ->where('user_id', Auth::id())
            ->first();

        if (!$siswa) {
            abort(404, 'Data siswa tidak ditemukan.');
        }

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
            ->where(
                'pengaduan.id',
                $id
            )
            ->where(
                'pengaduan.siswa_id',
                $siswa->id
            )
            ->select(
                'pengaduan.*',
                'kategori.nama_kategori',
                'status.nama_status'
            )
            ->first();

        if (!$pengaduan) {
            abort(404, 'Pengaduan tidak ditemukan.');
        }

        return view('pengaduan.success', [
            'pengaduan' => $pengaduan,
        ]);
    }
}