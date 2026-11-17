<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProfilController extends Controller
{
    public function index()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $user = Auth::user();

        // Inisialisasi data profil
        $siswa = null;
        $guruAdmin = null;
        $guruPemantau = null;
        $wakasek = null;
        $kepalaSekolah = null;

        // DATA SISWA
        if ($user->role === 'siswa') {
            $siswa = DB::table('siswa')
                ->where('user_id', $user->id)
                ->first();
        }

        // DATA GURU / ADMIN
        if ($user->role === 'guru_admin') {
            $guruAdmin = DB::table('guru_admin')
                ->where('user_id', $user->id)
                ->first();
        }

        // DATA GURU PEMANTAU
        // Sementara menggunakan data dari tabel users
        if ($user->role === 'guru_pemantau') {
    $guruPemantau = DB::table('guru_pemantau')
        ->where('user_id', $user->id)
        ->first();
        }

        // DATA WAKASEK
        if ($user->role === 'wakasek') {
            $wakasek = DB::table('wakasek')
                ->where('user_id', $user->id)
                ->first();
        }

        // DATA KEPALA SEKOLAH
        if ($user->role === 'kepala_sekolah') {
            $kepalaSekolah = DB::table('kepala_sekolah')
                ->where('user_id', $user->id)
                ->first();
        }

        return view('profil.index', compact(
            'user',
            'siswa',
            'guruAdmin',
            'guruPemantau',
            'wakasek',
            'kepalaSekolah'
        ));
    }
}
