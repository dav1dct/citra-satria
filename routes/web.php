<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\KaryawanBaruController;
use App\Http\Controllers\DashboardController;

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->middleware(['auth', 'verified'])
        ->name('dashboard');
    Route::post('/dashboard/uploadpdf', [DashboardController::class, 'uploadPDF'])->name('dashboard.upload.pdf');
});

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/daftar', [KaryawanBaruController::class, 'create'])->name('karyawanbaru.create');
Route::post('/karyawanbaru', [KaryawanBaruController::class, 'store'])->name('karyawanbaru.store');
Route::get('/karyawanbaru/success', [KaryawanBaruController::class, 'success'])->name('karyawanbaru.success');

Route::middleware(['auth'])->group(function () {
    Route::get('/karyawanbaru', [KaryawanBaruController::class, 'index'])->name('karyawanbaru.index');
    Route::put('/karyawanbaru/{id}/status', [KaryawanBaruController::class, 'updateStatus'])->name('karyawanbaru.updateStatus');
    Route::get('/karyawanbaru/{id}/edit', [KaryawanBaruController::class, 'edit'])->name('karyawanbaru.edit');
    Route::get('/karyawanbaru/download/{id}/{file}', [KaryawanBaruController::class, 'download'])->name('karyawanbaru.download');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/admin/karyawan', [KaryawanController::class, 'index'])->name('karyawan.index');
    Route::get('/admin/karyawan/tambah', [KaryawanController::class, 'create'])->name('karyawan.create');
    Route::post('/admin/karyawan', [KaryawanController::class, 'store'])->name('karyawan.store');
    Route::get('/admin/karyawan/{karyawan}/edit', [KaryawanController::class, 'edit'])->name('karyawan.edit');
    Route::put('/admin/karyawan/{karyawan}', [KaryawanController::class, 'update'])->name('karyawan.update');
});

require __DIR__.'/auth.php';
