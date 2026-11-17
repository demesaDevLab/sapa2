<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wakasek extends Model
{
    protected $table = 'wakasek';

    protected $fillable = [
        'user_id',
        'nip',
        'nama_wakasek',
        'jabatan_wakasek',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
