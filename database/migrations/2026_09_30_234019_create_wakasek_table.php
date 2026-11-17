<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('wakasek', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')
                ->unique()
                ->constrained('users')
                ->cascadeOnDelete();

            $table->string('nama_wakasek', 255);
            $table->string('jabatan_wakasek', 100);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('wakasek');
    }
};
