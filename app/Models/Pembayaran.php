<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;

    protected $table = 'pembayaran';  // Pastikan ini mengacu pada nama tabel yang benar
    protected $fillable = [
        'id_pendaftaran',
        'jumlah_pembayaran',
        'tanggal_pembayaran',
        'metode_pembayaran',
        'status',
    ];

    public function pendaftaran()
    {
        return $this->belongsTo(Pendaftaran::class, 'id_pendaftaran');
    }
}
