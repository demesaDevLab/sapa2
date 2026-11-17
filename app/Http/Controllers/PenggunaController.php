<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PenggunaController extends Controller
{
    // ==========================================
    // MENAMPILKAN DATA PENGGUNA
    // ==========================================
    public function index()
    {
        $pengguna = DB::table('users')
            ->orderBy('id', 'asc')
            ->get();

        return view('data_master.pengguna.index', compact('pengguna'));
    }

    // ==========================================
    // MENAMBAHKAN PENGGUNA
    // ==========================================
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|string|min:8',
            'role' => 'required|in:siswa,guru_admin,wakasek,kepala_sekolah',
            'phone_number' => 'nullable|string|max:15',

            // Profil siswa
            'nis' => 'nullable|string|max:30',
            'kelas' => 'nullable|string|max:50',
            'jurusan' => 'nullable|string|max:100',

            // Profil guru/admin
            'nip' => 'nullable|string|max:30',
            'jabatan' => 'nullable|string|max:100',

            // Profil wakasek
            'jabatan_wakasek' => 'nullable|string|max:100',
        ], [
            'name.required' => 'Nama pengguna wajib diisi.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email sudah digunakan.',
            'password.required' => 'Password wajib diisi.',
            'password.min' => 'Password minimal 8 karakter.',
            'role.required' => 'Role wajib dipilih.',
            'role.in' => 'Role tidak valid.',
        ]);

        DB::transaction(function () use ($request) {
            // Membuat akun pengguna
            $userId = DB::table('users')->insertGetId([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => $request->role,
                'phone_number' => $request->phone_number,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // Profil siswa
            if ($request->role === 'siswa') {
                DB::table('siswa')->insert([
                    'user_id' => $userId,
                    'nis' => $request->nis,
                    'kelas' => $request->kelas,
                    'jurusan' => $request->jurusan,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }

            // Profil guru/admin
            if ($request->role === 'guru_admin') {
                DB::table('guru_admin')->insert([
                    'user_id' => $userId,
                    'nip' => $request->nip,
                    'nama_guru' => $request->name,
                    'jabatan' => $request->jabatan,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }

            // Profil wakasek
            if ($request->role === 'wakasek') {
                DB::table('wakasek')->insert([
                    'user_id' => $userId,
                    'nama_wakasek' => $request->name,
                    'jabatan_wakasek' => $request->jabatan_wakasek,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }

            // Profil kepala sekolah
            if ($request->role === 'kepala_sekolah') {
                DB::table('kepala_sekolah')->insert([
                    'user_id' => $userId,
                    'nama_kepala_sekolah' => $request->name,
                    'nip' => $request->nip,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        });

        return back()->with('success', 'Pengguna berhasil ditambahkan.');
    }

    // ==========================================
    // MEMPERBARUI DATA PENGGUNA
    // ==========================================
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $id,
            'role' => 'required|in:siswa,guru_admin,wakasek,kepala_sekolah',
            'phone_number' => 'nullable|string|max:15',
            'password' => 'nullable|string|min:8',

            // Data profil
            'nis' => 'nullable|string|max:30',
            'kelas' => 'nullable|string|max:50',
            'jurusan' => 'nullable|string|max:100',
            'nip' => 'nullable|string|max:30',
            'jabatan' => 'nullable|string|max:100',
            'jabatan_wakasek' => 'nullable|string|max:100',
        ], [
            'name.required' => 'Nama pengguna wajib diisi.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email sudah digunakan.',
            'role.required' => 'Role wajib dipilih.',
            'password.min' => 'Password minimal 8 karakter.',
        ]);

        // Pastikan pengguna ditemukan sebelum diperbarui
        $pengguna = DB::table('users')
            ->where('id', $id)
            ->first();

        if (!$pengguna) {
            return back()->with('error', 'Pengguna tidak ditemukan.');
        }

        DB::transaction(function () use ($request, $id) {
            // Data utama pengguna
            $data = [
                'name' => $request->name,
                'email' => $request->email,
                'role' => $request->role,
                'phone_number' => $request->phone_number,
                'updated_at' => now(),
            ];

            if ($request->filled('password')) {
                $data['password'] = Hash::make($request->password);
            }

            DB::table('users')
                ->where('id', $id)
                ->update($data);

            // Update atau buat profil siswa
            if ($request->role === 'siswa') {
                DB::table('siswa')->updateOrInsert(
                    ['user_id' => $id],
                    [
                        'nis' => $request->nis,
                        'kelas' => $request->kelas,
                        'jurusan' => $request->jurusan,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]
                );

                DB::table('guru_admin')->where('user_id', $id)->delete();
                DB::table('wakasek')->where('user_id', $id)->delete();
                DB::table('kepala_sekolah')->where('user_id', $id)->delete();
            }

            // Update atau buat profil guru/admin
            elseif ($request->role === 'guru_admin') {
                DB::table('guru_admin')->updateOrInsert(
                    ['user_id' => $id],
                    [
                        'nip' => $request->nip,
                        'nama_guru' => $request->name,
                        'jabatan' => $request->jabatan,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]
                );

                DB::table('siswa')->where('user_id', $id)->delete();
                DB::table('wakasek')->where('user_id', $id)->delete();
                DB::table('kepala_sekolah')->where('user_id', $id)->delete();
            }

            // Update atau buat profil wakasek
            elseif ($request->role === 'wakasek') {
                DB::table('wakasek')->updateOrInsert(
                    ['user_id' => $id],
                    [
                        'nama_wakasek' => $request->name,
                        'jabatan_wakasek' => $request->jabatan_wakasek,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]
                );

                DB::table('siswa')->where('user_id', $id)->delete();
                DB::table('guru_admin')->where('user_id', $id)->delete();
                DB::table('kepala_sekolah')->where('user_id', $id)->delete();
            }

            // Update atau buat profil kepala sekolah
            elseif ($request->role === 'kepala_sekolah') {
                DB::table('kepala_sekolah')->updateOrInsert(
                    ['user_id' => $id],
                    [
                        'nama_kepala_sekolah' => $request->name,
                        'nip' => $request->nip,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]
                );

                DB::table('siswa')->where('user_id', $id)->delete();
                DB::table('guru_admin')->where('user_id', $id)->delete();
                DB::table('wakasek')->where('user_id', $id)->delete();
            }
        });

        return back()->with('success', 'Data pengguna berhasil diperbarui.');
    }

    // ==========================================
    // MENGHAPUS PENGGUNA
    // ==========================================
    public function destroy(int $id): \Illuminate\Http\RedirectResponse
{
    // Cegah pengguna menghapus akun sendiri
    if ((int) \Illuminate\Support\Facades\Auth::id() === (int) $id) {
        return back()->with(
            'error',
            'Akun yang sedang digunakan tidak dapat dihapus.'
        );
    }

    // Lanjutkan kode destroy() yang sudah ada di bawah sini
        // Periksa apakah pengguna tersedia
        $pengguna = DB::table('users')
            ->where('id', $id)
            ->first();

        if (!$pengguna) {
            return back()->with(
                'error',
                'Pengguna tidak ditemukan.'
            );
        }

        // Periksa apakah siswa sudah memiliki pengaduan
        if ($pengguna->role === 'siswa') {
            $siswa = DB::table('siswa')
                ->where('user_id', $id)
                ->first();

            if ($siswa) {
                $dipakai = DB::table('pengaduan')
                    ->where('siswa_id', $siswa->id)
                    ->exists();

                if ($dipakai) {
                    return back()->with(
                        'error',
                        'Pengguna tidak dapat dihapus karena sudah memiliki pengaduan.'
                    );
                }
            }
        }

        // Hapus profil dan akun dalam satu transaksi
        DB::transaction(function () use ($id) {
            DB::table('siswa')->where('user_id', $id)->delete();
            DB::table('guru_admin')->where('user_id', $id)->delete();
            DB::table('wakasek')->where('user_id', $id)->delete();
            DB::table('kepala_sekolah')->where('user_id', $id)->delete();

            DB::table('users')->where('id', $id)->delete();
        });

        return back()->with(
            'success',
            'Pengguna berhasil dihapus.'
        );
    }
}
