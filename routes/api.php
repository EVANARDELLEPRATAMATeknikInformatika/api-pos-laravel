<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\TransaksiController;
use App\Http\Controllers\Api\StatistikController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

// Route bawaan Laravel untuk mengecek user (biarkan saja)
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// ------------------------------------------------------------------------
// ROUTE API PENJUALAN POS KITA
// ------------------------------------------------------------------------

// URL untuk mengambil data transaksi (localhost:8000/api/transaksi)
Route::get('/transaksi', [TransaksiController::class, 'index']);

// URL untuk mengambil data statistik (localhost:8000/api/statistik)
Route::get('/statistik', [StatistikController::class, 'index']);