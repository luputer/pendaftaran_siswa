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
        Schema::create('pengumuman', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_pendaftaran');
            $table->string('nisn', 30);
            $table->string('nama', 50);
            $table->string('judul', 100);
            $table->string('hasil', 100);
            $table->timestamps();

            $table->foreign('id_pendaftaran')
                ->references('id')
                ->on('pendaftarans')
                ->onDelete('cascade');

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
        Schema::dropIfExists('pengumuman');
    }
};
