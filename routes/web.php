<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiswaController;

Route::get('/', function () {
    return view('page.welcome');
});

Route::get('/daftar', function () {
    return view('page.daftar');
});

Route::post('/daftar-siswa', [SiswaController::class, 'store']);

Route::get('/pembayaran', function () {
    return view('page.pembayaran');
});
