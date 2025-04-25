<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\KaryawanBaruController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/daftar', [KaryawanBaruController::class, 'create'])->name('karyawanbaru.create');
Route::post('/karyawanbaru', [KaryawanBaruController::class, 'store'])->name('karyawanbaru.store');
Route::get('/karyawanbaru/success', [KaryawanBaruController::class, 'success'])->name('karyawanbaru.success');

Route::middleware(['auth'])->group(function () {
    Route::get('/karyawanbaru', [KaryawanBaruController::class, 'index'])->name('karyawanbaru.index');
    Route::put('/karyawanbaru/{id}/status', [KaryawanBaruController::class, 'updateStatus'])->name('karyawanbaru.updateStatus');
});



// Karyawan
Route::middleware(['auth'])->group(function () {
    Route::get('/admin/karyawan', [KaryawanController::class, 'index'])->name('karyawan.index');
    Route::get('/admin/karyawan/tambah', [KaryawanController::class, 'create'])->name('karyawan.create');
    Route::post('/admin/karyawan', [KaryawanController::class, 'store'])->name('karyawan.store');
    Route::get('/admin/karyawan/{karyawan}/edit', [KaryawanController::class, 'edit'])->name('karyawan.edit');
    Route::put('/admin/karyawan/{karyawan}', [KaryawanController::class, 'update'])->name('karyawan.update');
});

require __DIR__.'/auth.php';
