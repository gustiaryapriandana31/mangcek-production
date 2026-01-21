<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WilayahController;
use App\Http\Controllers\PencatatanUsahaController;
use App\Http\Middleware\BasicAuthMiddleware;


Route::get('/', function () {
    return view('home');
});

Route::middleware([BasicAuthMiddleware::class])->group(function () {
    Route::get('/admin', [PencatatanUsahaController::class, 'index'])->name('pencatatan.index');
    Route::post('/pencatatan-usaha', [PencatatanUsahaController::class, 'store'])->name('pencatatan.store');
    Route::get('/pencatatan-usaha/{id}/edit', [PencatatanUsahaController::class, 'edit'])->name('pencatatan.edit');
    Route::put('/pencatatan-usaha/{id}', [PencatatanUsahaController::class, 'update'])->name('pencatatan.update');
    Route::delete('/pencatatan-usaha/{id}', [PencatatanUsahaController::class, 'destroy'])->name('pencatatan.destroy');
});


// // untuk halaman crud
// Route::get('/admin', [PencatatanUsahaController::class, 'index'])->name('pencatatan.index');
// Route::post('/pencatatan-usaha', [PencatatanUsahaController::class, 'store'])->name('pencatatan.store');
// Route::get('/pencatatan-usaha/{id}/edit', [PencatatanUsahaController::class, 'edit'])->name('pencatatan.edit');
// Route::put('/pencatatan-usaha/{id}', [PencatatanUsahaController::class, 'update'])->name('pencatatan.update');
// Route::delete('/pencatatan-usaha/{id}', [PencatatanUsahaController::class, 'destroy'])->name('pencatatan.destroy');
