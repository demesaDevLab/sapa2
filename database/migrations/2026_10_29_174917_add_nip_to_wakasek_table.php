<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
{
    Schema::table('wakasek', function (Blueprint $table) {
        $table->string('nip', 30)->nullable()->after('user_id');
    });
}

public function down(): void
{
    Schema::table('wakasek', function (Blueprint $table) {
        $table->dropColumn('nip');
    });
}
};
