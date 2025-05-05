<?php

namespace App\Models;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pengaduan extends Model
{
    use HasFactory;

    protected $table = 'pengaduans';

    protected $fillable = [
        'user_id',
        'name',
        'user_alamat',
        'phone',
        'description',
        'lokasi_kejadian',
        'keterangan_tambahan',
        'image',
        'token',
    ];

    // Relasi dengan user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function details() {
        return $this->hasMany(Pengaduan::class, 'id', 'id');
    }

    public function phones() {
        return $this->belongsTo(User::class);
    }

    public function tanggapans() {
    return $this->belongsTo(Pengaduan::class, 'id', 'id');
    }

    public function tanggapan() {
    return $this->hasOne(Tanggapan::class);
    }

    public function status() {
    return $this->belongsTo(Tanggapan::class, 'status_id','status');
    }

    protected static function booted()
    {
        Carbon::setLocale('id');
    }
    
}