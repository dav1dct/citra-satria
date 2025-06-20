<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\KaryawanBaruController;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/daftar', [KaryawanBaruController::class, 'create'])->name('karyawanbaru.create');
Route::post('/karyawanbaru', [KaryawanBaruController::class, 'store'])->name('karyawanbaru.store');
Route::get('/karyawanbaru/success', [KaryawanBaruController::class, 'success'])->name('karyawanbaru.success');

/*
|--------------------------------------------------------------------------
| Authenticated Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->middleware(['verified'])
        ->name('dashboard');
    Route::post('/dashboard/uploadpdf', [DashboardController::class, 'uploadPDF'])
        ->name('dashboard.upload.pdf');

    // Karyawan Baru
    Route::get('/karyawanbaru', [KaryawanBaruController::class, 'index'])->name('karyawanbaru.index');
    Route::put('/karyawanbaru/{id}/status', [KaryawanBaruController::class, 'updateStatus'])->name('karyawanbaru.updateStatus');
    Route::get('/karyawanbaru/{id}/edit', [KaryawanBaruController::class, 'edit'])->name('karyawanbaru.edit');
    Route::get('/karyawanbaru/download/{id}/{file}', [KaryawanBaruController::class, 'download'])->name('karyawanbaru.download');
    Route::get('/karyawanbaru/image/{id}/{file}', [KaryawanBaruController::class, 'showImage'])->name('karyawanbaru.image');

    // Karyawan Admin
    Route::get('/admin/karyawan', [KaryawanController::class, 'index'])->name('karyawan.index');
    Route::get('/admin/karyawan/tambah', [KaryawanController::class, 'create'])->name('karyawan.create');
    Route::post('/admin/karyawan', [KaryawanController::class, 'store'])->name('karyawan.store');
    Route::get('/admin/karyawan/{karyawan}/edit', [KaryawanController::class, 'edit'])->name('karyawan.edit');
    Route::put('/admin/karyawan/{karyawan}', [KaryawanController::class, 'update'])->name('karyawan.update');
});

/*
|--------------------------------------------------------------------------
| Auth Routes (Login/Register/Forgot Password, dll)
|--------------------------------------------------------------------------
*/

require __DIR__.'/auth.php';
