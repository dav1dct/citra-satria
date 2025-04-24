<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KaryawanController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/admin/karyawan', [KaryawanController::class, 'index'])->name('karyawan.index');
    Route::get('/admin/karyawan/tambah', [KaryawanController::class, 'create'])->name('karyawan.create');
    Route::post('/admin/karyawan', [KaryawanController::class, 'store'])->name('karyawan.store');
    Route::get('/admin/karyawan/{karyawan}/edit', [KaryawanController::class, 'edit'])->name('karyawan.edit');
    Route::put('/admin/karyawan/{karyawan}', [KaryawanController::class, 'update'])->name('karyawan.update');
});

require __DIR__.'/auth.php';
