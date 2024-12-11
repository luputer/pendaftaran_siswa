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
        Schema::create('pembayaran', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_pendaftaran');
            $table->float('jumlah_pembayaran', 10, 2);
            $table->date('tanggal_pembayaran');
            $table->string('metode_pembayaran', 30);
            $table->string('status', 30)->default('pending');
            $table->timestamps();

            $table->foreign('id_pendaftaran')
                ->references('id')
                ->on('pendaftarans')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembayaran');
    }
};
