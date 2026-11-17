<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusSeeder extends Seeder
{
    public function run(): void
    {
        $status = [
            [
                'nama_status' => 'Menunggu',
                'deskripsi' => 'Pengaduan sudah dikirim dan menunggu diproses.',
            ],
            [
                'nama_status' => 'Diproses',
                'deskripsi' => 'Pengaduan sedang diproses oleh Guru/Admin.',
            ],
            [
                'nama_status' => 'Selesai',
                'deskripsi' => 'Pengaduan sudah selesai ditangani.',
            ],
            [
                'nama_status' => 'Ditolak',
                'deskripsi' => 'Pengaduan ditolak setelah dilakukan pemeriksaan.',
            ],
        ];

        foreach ($status as $item) {
            DB::table('status')->updateOrInsert(
                [
                    'nama_status' => $item['nama_status'],
                ],
                [
                    'deskripsi' => $item['deskripsi'],
                    'updated_at' => now(),
                    'created_at' => now(),
                ]
            );
        }
    }
}
