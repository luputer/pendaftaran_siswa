<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\PembayaranController;

Route::get('/', function () {
    return view('page.welcome');
});

Route::get('/daftar', function () {
    return view('page.daftar');
});

Route::post('/daftar-siswa', [SiswaController::class, 'store'])->name('siswa.store');

Route::get('/pembayaran/{nisn}', [PembayaranController::class, 'show'])->name('pembayaran.show');

Route::post('/pembayaran/proses', [PembayaranController::class, 'processPayment'])->name('pembayaran.process');
