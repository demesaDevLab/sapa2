<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | HALAMAN LOGIN
    |--------------------------------------------------------------------------
    */

    public function showLogin()
    {
        return view('auth.login');
    }

    /*
    |--------------------------------------------------------------------------
    | PROSES LOGIN
    |--------------------------------------------------------------------------
    */

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        if (Auth::attempt($credentials)) {

            $request->session()->regenerate();

            $user = Auth::user();

            // ROLE SISWA
            if ($user->role === 'siswa') {
                return redirect()->route('dashboard');
            }

            // ROLE GURU / ADMIN
            if ($user->role === 'guru_admin') {
                return redirect()->route('guru_admin.dashboard');
            }

            // ROLE GURU PEMANTAU
            if ($user->role === 'guru_pemantau') {
                return redirect()->route('guru_pemantau.dashboard');
            }

            // ROLE WAKASEK
            if ($user->role === 'wakasek') {
                return redirect()->route('wakasek.dashboard');
            }

            // ROLE KEPALA SEKOLAH
            if ($user->role === 'kepala_sekolah') {
                return redirect()->route('kepala_sekolah.dashboard');
            }

            // ROLE TIDAK DIKENALI
            Auth::logout();

            return back()
                ->withErrors([
                    'email' => 'Role akun tidak dikenali.',
                ])
                ->withInput([
                    'email' => $request->email,
                ]);
        }

        // EMAIL ATAU PASSWORD SALAH
        return back()
            ->withErrors([
                'email' => 'Email atau password salah.',
            ])
            ->withInput([
                'email' => $request->email,
            ]);
    }

    /*
    |--------------------------------------------------------------------------
    | LOGOUT
    |--------------------------------------------------------------------------
    */

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('landing');
    }
}

