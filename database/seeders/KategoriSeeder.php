<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriSeeder extends Seeder
{
    public function run(): void
    {
        $kategori = [
            [
                'nama_kategori' => 'Pembelajaran',
                'deskripsi' => 'Aspirasi atau pengaduan terkait proses pembelajaran.',
            ],
            [
                'nama_kategori' => 'Fasilitas',
                'deskripsi' => 'Aspirasi atau pengaduan terkait fasilitas sekolah.',
            ],
            [
                'nama_kategori' => 'Pelayanan Sekolah',
                'deskripsi' => 'Aspirasi atau pengaduan terkait pelayanan sekolah.',
            ],
            [
                'nama_kategori' => 'Lainnya',
                'deskripsi' => 'Aspirasi atau pengaduan lainnya.',
            ],
        ];

        foreach ($kategori as $item) {
            DB::table('kategori')->updateOrInsert(
                [
                    'nama_kategori' => $item['nama_kategori'],
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
