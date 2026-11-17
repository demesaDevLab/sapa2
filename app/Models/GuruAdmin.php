<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GuruAdmin extends Model
{
    protected $table = 'guru_admin';

    protected $fillable = [
        'user_id',
        'nip',
        'nama_guru',
        'jabatan',
    ];
}
