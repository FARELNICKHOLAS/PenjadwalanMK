<?php

use App\Http\Controllers\DayController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/kurikulum', function () {
    return view('kurikulum');
});

Route::get('/hari', [DayController::class, 'tampil'])->name('hari.tampil');

Route::get('/hari/tambah', [DayController::class, 'tambah'])->name('hari.tambah');

Route::post('/hari/submit', [DayController::class, 'submit'])->name('hari.submit');

Route::get('/hari/edit/{kode}', [DayController::class, 'edit'])->name('hari.edit');

Route::post('/hari/update/{kode}', [DayController::class, 'update'])->name('hari.update');

Route::post('/hari/delete/{kode}', [DayController::class, 'delete'])->name('hari.delete');

