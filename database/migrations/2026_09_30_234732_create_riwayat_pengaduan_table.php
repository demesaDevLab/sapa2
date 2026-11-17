<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('riwayat_pengaduan', function (Blueprint $table) {
            $table->id();

            $table->foreignId('pengaduan_id')
                ->constrained('pengaduan')
                ->cascadeOnDelete();

            $table->foreignId('status_id')
                ->constrained('status')
                ->restrictOnDelete();

            $table->foreignId('user_id')
                ->constrained('users')
                ->cascadeOnDelete();

            $table->text('keterangan')->nullable();

            $table->dateTime('tanggal_perubahan');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('riwayat_pengaduan');
    }
};
