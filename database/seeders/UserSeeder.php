<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // AKUN SISWA
        $siswa = User::updateOrCreate(
            ['email' => 'melisa@sapa.test'],
            [
                'name' => 'Melisa',
                'password' => Hash::make('Password123'),
                'role' => 'siswa',
                'phone_number' => '081234567890',
            ]
        );

        // WAKASEK KURIKULUM
        $wakasekKurikulum = User::updateOrCreate(
            ['email' => 'wakasek.kurikulum@sapa.test'],
            [
                'name' => 'Wakasek Kurikulum',
                'password' => Hash::make('Password123'),
                'role' => 'wakasek',
                'phone_number' => '081234567891',
            ]
        );

        DB::table('wakasek')->updateOrInsert(
            ['user_id' => $wakasekKurikulum->id],
            [
                'nama_wakasek' => 'Wakasek Kurikulum',
                'jabatan_wakasek' => 'Wakasek Kurikulum',
                'updated_at' => now(),
                'created_at' => now(),
            ]
        );

        // WAKASEK SARANA & PRASARANA
        $wakasekSarpras = User::updateOrCreate(
            ['email' => 'wakasek.sarpras@sapa.test'],
            [
                'name' => 'Wakasek Sarana & Prasarana',
                'password' => Hash::make('Password123'),
                'role' => 'wakasek',
                'phone_number' => '081234567892',
            ]
        );

        DB::table('wakasek')->updateOrInsert(
            ['user_id' => $wakasekSarpras->id],
            [
                'nama_wakasek' => 'Wakasek Sarana & Prasarana',
                'jabatan_wakasek' => 'Wakasek Sarana & Prasarana',
                'updated_at' => now(),
                'created_at' => now(),
            ]
        );

        // WAKASEK HUMAS
        $wakasekHumas = User::updateOrCreate(
            ['email' => 'wakasek.humas@sapa.test'],
            [
                'name' => 'Wakasek Humas',
                'password' => Hash::make('Password123'),
                'role' => 'wakasek',
                'phone_number' => '081234567893',
            ]
        );

        DB::table('wakasek')->updateOrInsert(
            ['user_id' => $wakasekHumas->id],
            [
                'nama_wakasek' => 'Wakasek Humas',
                'jabatan_wakasek' => 'Wakasek Humas',
                'updated_at' => now(),
                'created_at' => now(),
            ]
        );

        // WAKASEK KESISWAAN
        $wakasekKesiswaan = User::updateOrCreate(
            ['email' => 'wakasek.kesiswaan@sapa.test'],
            [
                'name' => 'Wakasek Kesiswaan',
                'password' => Hash::make('Password123'),
                'role' => 'wakasek',
                'phone_number' => '081234567894',
            ]
        );

        DB::table('wakasek')->updateOrInsert(
            ['user_id' => $wakasekKesiswaan->id],
            [
                'nama_wakasek' => 'Wakasek Kesiswaan',
                'jabatan_wakasek' => 'Wakasek Kesiswaan',
                'updated_at' => now(),
                'created_at' => now(),
            ]
        );

        // AKUN KEPALA SEKOLAH
        $kepalaSekolah = User::updateOrCreate(
            ['email' => 'kepsek@sapa.test'],
            [
                'name' => 'Kepala Sekolah',
                'password' => Hash::make('Password123'),
                'role' => 'kepala_sekolah',
                'phone_number' => null,
            ]
        );

        DB::table('kepala_sekolah')->updateOrInsert(
            ['user_id' => $kepalaSekolah->id],
            [
                'nama_kepala_sekolah' => 'Kepala Sekolah',
                'nip' => null,
                'updated_at' => now(),
                'created_at' => now(),
            ]
        );
    }
}
