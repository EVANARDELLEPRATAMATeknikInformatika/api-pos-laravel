<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\TransaksiController;
use App\Http\Controllers\Api\StatistikController;
use App\Http\Controllers\Api\BarangController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\DetailController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Middleware\ApiTokenMiddleware;

// Endpoint khusus Login (Tidak perlu token untuk mengakses ini)
Route::post('/login', [AuthController::class, 'login']);

// Kelompok Endpoint yang DILINDUNGI (Wajib pakai token)
Route::middleware([ApiTokenMiddleware::class])->group(function () {
    Route::get('/transaksi', [TransaksiController::class, 'index']);
    Route::get('/statistik', [StatistikController::class, 'index']);
    Route::get('/barang', [BarangController::class, 'index']);
    Route::get('/user', [UserController::class, 'index']);
    Route::get('/detail', [DetailController::class, 'index']);
});