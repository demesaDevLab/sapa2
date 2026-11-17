<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class RegisterController extends Controller
{
    public function showRegister()
    {
        // Pengguna yang sudah login tidak perlu daftar lagi.
        if (Auth::check()) {
            return redirect()->route('dashboard');
        }

        return view('auth.register');
    }

    public function register(Request $request)
    {
        // Hanya pengguna yang belum login yang boleh mendaftar.
        if (Auth::check()) {
            return redirect()->route('dashboard');
        }

        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
            ],

            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                'unique:users,email',
            ],

            //comment SKKNI 3 AJAH
            'phone_number' => [
                'required',
                'string',
                'regex:/^([0-9\s\-\+\(\)]*)$/',
                'min:10',
                'max:15',
                'unique:users,phone_number',
            ],

            'nis' => [
                'required',
                'string',
                'max:20',
                'unique:siswa,nis',
            ],

            'tingkat_kelas' => [
                'required',
                'in:10,11,12',
            ],

            'jurusan' => [
                'required',
                'in:BRP,DKV,RPL',
            ],

            'nomor_kelas' => [
                'required',
                'integer',
                'min:1',
                'max:99',
            ],

            'password' => [
                'required',
                'string',
                'confirmed',
                Password::min(8)
                    ->letters()
                    ->numbers()
                    ->mixedCase(),
            ],

            //comment
        ], [
            'nis.unique' => 'NIS tersebut sudah terdaftar.',
            'tingkat_kelas.in' => 'Pilih tingkat kelas 10, 11, atau 12.',
            'jurusan.in' => 'Pilih jurusan BRP, DKV, atau RPL.',
            'nomor_kelas.integer' => 'Nomor kelas harus berupa angka.',
            'phone_number.unique' => 'Nomor HP tersebut sudah terdaftar.',
            'email.unique' => 'Email tersebut sudah terdaftar.',
        ]);

        $kelas = $validated['tingkat_kelas']
            . ' '
            . $validated['jurusan']
            . ' '
            . $validated['nomor_kelas'];

        $user = DB::transaction(function () use ($validated, $kelas) {
            $user = User::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'password' => Hash::make($validated['password']),
                'role' => 'siswa',
                'phone_number' => $validated['phone_number'],
            ]);

            DB::table('siswa')->insert([
                'user_id' => $user->id,
                'nis' => $validated['nis'],
                'kelas' => $kelas,
                'jurusan' => $validated['jurusan'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            return $user;
        });

        Auth::login($user);
        $request->session()->regenerate();

        return redirect()->route('dashboard');
    }
}
