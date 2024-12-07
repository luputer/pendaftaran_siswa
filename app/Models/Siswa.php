<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Siswa extends Model
{
    use HasFactory;

    protected $table = 'siswas';
    protected $primaryKey = 'nisn';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'nisn',
        'nama',
        'tgl_lahir',
        'jenis_kelamin',
        'alamat',
        'nama_orang_tua',
        'no_telp',
        'sekolah_asal',
        'nilai_ujian',
        'ijazah'
    ];

    protected $casts = [
        'tgl_lahir' => 'date',
        'nilai_ujian' => 'float',
    ];
}
