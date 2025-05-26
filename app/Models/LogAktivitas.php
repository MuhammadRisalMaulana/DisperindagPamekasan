<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class LogAktivitas extends Model    
{
    protected $table = 'log_aktivitas'; // sesuaikan nama tabelmu

    protected $fillable = [
        'user_id',
        'status',
        'model',
        'model_id',
        'status',
        // kolom lain jika ada
    ];

    // Relasi ke User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
