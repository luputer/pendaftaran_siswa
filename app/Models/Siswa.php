<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        'ijazah',
    ];
    public function pendaftaran()
    {
        return $this->hasOne(Pendaftaran::class, 'nisn', 'nisn');
    }
}
