<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WilayahController;
use App\Http\Controllers\PencatatanUsahaController;
use App\Http\Middleware\AdminBasicAuthMiddleware;
use App\Http\Middleware\UserBasicAuthMiddleware;



Route::middleware([UserBasicAuthMiddleware::class])->group(function () {
    Route::get('/', function () {
        return view('home');
    });
});
Route::post('/pencatatan-usaha', [PencatatanUsahaController::class, 'store'])->name('pencatatan.store');

Route::middleware([AdminBasicAuthMiddleware::class])->group(function () {
    Route::get('/admin', [PencatatanUsahaController::class, 'index'])->name('pencatatan.index');
    Route::get('/pencatatan-usaha/{id}/edit', [PencatatanUsahaController::class, 'edit'])->name('pencatatan.edit');
    Route::put('/pencatatan-usaha/{id}', [PencatatanUsahaController::class, 'update'])->name('pencatatan.update');
    Route::delete('/pencatatan-usaha/{id}', [PencatatanUsahaController::class, 'destroy'])->name('pencatatan.destroy');
    Route::get('/dashboard/groundcheck', [PencatatanUsahaController::class, 'dashboardStats']);
    Route::get('/dashboard/rekap-kecamatan', [PencatatanUsahaController::class, 'rekapKecamatan']);
    Route::get('/dashboard/rekap-desa',  [PencatatanUsahaController::class, 'rekapDesa']);
});


