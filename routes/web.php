<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WilayahController;
use App\Http\Controllers\PencatatanUsahaController;



Route::get('/', function () {
    return view('home');
});

Route::get('/api/kecamatan', [WilayahController::class, 'kecamatan']);
Route::get('/api/desa/{kode_kecamatan}', [WilayahController::class, 'desa']);
Route::get('/api/usaha/search', [WilayahController::class, 'searchUsaha']);
Route::get('/api/usaha/{kode}', [WilayahController::class, 'detailUsaha']);


Route::post('/pencatatan-usaha', [PencatatanUsahaController::class, 'store'])
    ->name('pencatatan.store');
