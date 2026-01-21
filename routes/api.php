<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WilayahController;

Route::get('/kecamatan', [WilayahController::class, 'kecamatan']);
Route::get('/desa/{kode_kecamatan}', [WilayahController::class, 'desa']);
Route::get('/usaha/search', [WilayahController::class, 'searchUsaha']);
Route::get('/usaha/{kode}', [WilayahController::class, 'detailUsaha']);
