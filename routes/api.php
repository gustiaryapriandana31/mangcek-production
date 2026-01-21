<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WilayahController;

// Route::get('/kecamatan', [WilayahController::class, 'kecamatan']);
// Route::get('/desa/{kode_kecamatan}', [WilayahController::class, 'desa']);
// Route::get('/usaha/search', [WilayahController::class, 'searchUsaha']);
// Route::get('/usaha/{kode}', [WilayahController::class, 'detailUsaha']);
// Route::get('/usaha', [WilayahController::class, 'listUsaha']);

// Route::get('/usaha/by-desa/{kode_desa}', [WilayahController::class, 'listUsahaByDesa']);
// Route::get('/usaha/detail/{kode_usaha}', [WilayahController::class, 'detailUsaha']);

Route::get('/kecamatan', [WilayahController::class, 'kecamatan']);
Route::get('/desa/{kode_kecamatan}', [WilayahController::class, 'desa']);

/* SELECT2 */
Route::get('/usaha/by-desa/{kode_desa}', [WilayahController::class, 'listUsahaByDesa']);
Route::get('/usaha/detail/{kode_nama_usaha}', [WilayahController::class, 'detailUsaha']);



