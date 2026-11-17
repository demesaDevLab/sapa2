<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KepalaSekolah extends Model
{
    protected $table = 'kepala_sekolah';

    protected $fillable = [
        'user_id',
        'nama_kepala_sekolah',
        'nip',
    ];
}
