<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $table = 'siswas'; // Ensure this is the correct table name  
    protected $primaryKey = 'nisn'; // Specify your primary key here  
    public $incrementing = false; // Set to false if the primary key is not auto-incrementing  
    protected $keyType = 'string'; // If your primary key is a string type  

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
}
