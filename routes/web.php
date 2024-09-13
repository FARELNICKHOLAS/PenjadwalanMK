<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MKController;
use App\Http\Controllers\DayController;
use App\Http\Controllers\GenetikaController;
use App\Http\Controllers\JamController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\LectureController;
use App\Http\Controllers\PengajarController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\TeachController;

Route::get('/', [GenetikaController::class, 'tampil'])->name('kurikulum.tampil');

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

// Dosen

Route::get('/dosen', [LectureController::class, 'index'])->name('dosen.tampil');

Route::get('/dosen/tambah', [LectureController::class, 'create'])->name('dosen.tambah');

Route::post('/dosen/submit', [LectureController::class, 'store'])->name('dosen.submit');

Route::get('/dosen/edit/{id}', [LectureController::class, 'edit'])->name('dosen.edit');

Route::post('/dosen/update/{id}', [LectureController::class, 'update'])->name('dosen.update');

Route::post('/dosen/delete/{id}', [LectureController::class, 'delete'])->name('dosen.delete');

// Ruangan

Route::get('/ruangan', [RoomController::class, 'index'])->name('ruangan.tampil');

Route::get('/ruangan/tambah', [RoomController::class, 'create'])->name('ruangan.tambah');

Route::post('/ruangan/submit', [RoomController::class, 'store'])->name('ruangan.submit');

Route::get('/ruangan/edit/{id}', [RoomController::class, 'edit'])->name('ruangan.edit');

Route::post('/ruangan/update/{id}', [RoomController::class, 'update'])->name('ruangan.update');

Route::post('/ruangan/delete/{id}', [RoomController::class, 'delete'])->name('ruangan.delete');

// Pengampu

Route::get('/pengampu', [TeachController::class, 'index'])->name('pengampu.tampil');

Route::get('/pengampu/tambah', [TeachController::class, 'create'])->name('pengampu.tambah');

Route::post('/pengampu/submit', [TeachController::class, 'store'])->name('pengampu.submit');

Route::get('/pengampu/edit/{id}', [TeachController::class, 'edit'])->name('pengampu.edit');

Route::post('/pengampu/update/{id}', [TeachController::class, 'update'])->name('pengampu.update');

Route::post('/pengampu/delete/{id}', [TeachController::class, 'delete'])->name('pengampu.delete');

// Pengajar

Route::get('/kurikulum', [PengajarController::class, 'tampil'])->name('kurikulum');

Route::post('/importexcel', [PengajarController::class, 'importexcel'])->name('importexcel');

Route::post('/deletedata', [PengajarController::class, 'delete'])->name('deletedata');

Route::get('/kurikulum/generate', [GenetikaController::class, 'submit'])->name('kurikulum.generate');

Route::get('/kurikulum/generate/result/{$id}', [GenetikaController::class, 'result'])->name('kurikulum.result');

Route::get('/coba', [GenetikaController::class, 'tampil'])->name('coba.tampil');

Route::get('/coba/generate', [GenetikaController::class, 'submit'])->name('coba.generate');