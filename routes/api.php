<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\TransaksiController;
use App\Http\Controllers\Api\StatistikController;
use App\Http\Controllers\Api\BarangController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\DetailController;

// 5 ENDPOINT TUGAS API
Route::get('/transaksi', [TransaksiController::class, 'index']);
Route::get('/statistik', [StatistikController::class, 'index']);
Route::get('/barang', [BarangController::class, 'index']);
Route::get('/user', [UserController::class, 'index']);
Route::get('/detail', [DetailController::class, 'index']);