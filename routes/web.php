<?php

use App\Http\Controllers\DayController;
use App\Http\Controllers\JamController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\MKController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/kurikulum', function () {
    return view('kurikulum');
});

// hari
Route::get('/hari', [DayController::class, 'tampil'])->name('hari.tampil');

Route::get('/hari/tambah', [DayController::class, 'tambah'])->name('hari.tambah');

Route::post('/hari/submit', [DayController::class, 'submit'])->name('hari.submit');

Route::get('/hari/edit/{kode}', [DayController::class, 'edit'])->name('hari.edit');

Route::post('/hari/update/{kode}', [DayController::class, 'update'])->name('hari.update');

Route::post('/hari/delete/{kode}', [DayController::class, 'delete'])->name('hari.delete');

// jam
Route::get('/jam', [JamController::class, 'tampil'])->name('jam.tampil');

Route::get('/jam/tambah', [JamController::class, 'tambah'])->name('jam.tambah');

Route::post('/jam/submit', [JamController::class, 'submit'])->name('jam.submit');

Route::get('/jam/edit/{id}', [JamController::class, 'edit'])->name('jam.edit');

Route::post('/jam/update/{id}', [JamController::class, 'update'])->name('jam.update');

Route::post('/jam/delete/{id}', [JamController::class, 'delete'])->name('jam.delete');

// matakuliah
Route::get('/matakuliah', [MKController::class, 'tampil'])->name('matakuliah.tampil');

Route::get('/matakuliah/tambah', [MKController::class, 'tambah'])->name('matakuliah.tambah');

Route::post('/matakuliah/submit', [MKController::class, 'submit'])->name('matakuliah.submit');

Route::get('/matakuliah/edit/{id}', [MKController::class, 'edit'])->name('matakuliah.edit');

Route::post('/matakuliah/update/{id}', [MKController::class, 'update'])->name('matakuliah.update');

Route::post('/matakuliah/delete/{id}', [MKController::class, 'delete'])->name('matakuliah.delete');

// kelas

Route::get('/kelas', [KelasController::class, 'tampil'])->name('kelas.tampil');

Route::get('/kelas/tambah', [KelasController::class, 'tambah'])->name('kelas.tambah');

Route::post('/kelas/submit', [KelasController::class, 'submit'])->name('kelas.submit');

Route::get('/kelas/edit/{id}', [KelasController::class, 'edit'])->name('kelas.edit');

Route::post('/kelas/update/{id}', [KelasController::class, 'update'])->name('kelas.update');

Route::post('/kelas/delete/{id}', [KelasController::class, 'delete'])->name('kelas.delete');