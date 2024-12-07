<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('siswas', function (Blueprint $table) {
            $table->string('nisn', 30)->primary();
            $table->string('nama', 30);
            $table->date('tgl_lahir');
            $table->string('jenis_kelamin', 20);
            $table->string('alamat', 50);
            $table->string('nama_orang_tua', 50);
            $table->integer('no_telp');
            $table->string('sekolah_asal', 40);
            $table->float('nilai_ujian', 10, 2);
            $table->string('ijazah')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('siswas');
    }
};
