<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    protected $fillable = [
        'nisn',
        'tgl_daftar',
        'status'
    ];


    protected $casts = [
        'tgl_daftar' => 'datetime'
    ];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'nisn', 'nisn');
    }

    public function pembayaran()
    {
        return $this->hasMany(Pembayaran::class, 'id_pendaftaran');
    }

    public function pengumuman()
    {
        return $this->hasOne(Pengumuman::class, 'id_pengumuman');
    }
}
