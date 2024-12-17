<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ViewSiswaSekolah extends Model
{

    protected $table = 'view_siswa_sekolah'; // Nama tabel view SQL
    protected $primaryKey = 'nisn'; // Ganti primary key default
    public $incrementing = false; // Jika primary key bukan auto-increment
    protected $keyType = 'string'; // Sesuaikan tipe data primary key
    public $timestamps = false; // Nonaktifkan timestamps jika tidak diperlukan
}
