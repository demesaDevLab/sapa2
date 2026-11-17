<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pengaduan', function (Blueprint $table) {
            $table->id();

            $table->foreignId('siswa_id')
                ->constrained('siswa')
                ->cascadeOnDelete();

            $table->foreignId('kategori_id')
                ->constrained('kategori')
                ->restrictOnDelete();

            $table->foreignId('status_id')
                ->constrained('status')
                ->restrictOnDelete();

            $table->string('nomor_tiket', 30)->unique();

            $table->string('judul', 255);

            $table->text('isi_pengaduan');

            $table->date('tanggal_pengaduan');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pengaduan');
    }
};
