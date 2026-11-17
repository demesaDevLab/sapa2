<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('lampiran', function (Blueprint $table) {
            $table->id();

            $table->foreignId('pengaduan_id')
                ->constrained('pengaduan')
                ->cascadeOnDelete();

            $table->string('nama_file', 255);
            $table->string('path_file', 500);
            $table->string('tipe_file', 100);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('lampiran');
    }
};
