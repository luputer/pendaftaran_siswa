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
        Schema::create('pendaftarans', function (Blueprint $table) {
            $table->id();
            $table->string('nisn', 30);
            $table->unsignedBigInteger('id_pendaftaran')->nullable();
            $table->date('tgl_daftar');
            $table->string('status', 30)->default('pending');
            $table->unsignedBigInteger('id_pengumuman')->nullable();
            $table->timestamps();

            $table->foreign('nisn')
                ->references('nisn')
                ->on('siswas')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendaftarans');
    }
};
