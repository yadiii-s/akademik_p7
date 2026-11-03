<?php

use App\Http\Controllers\AkademikController;
use App\Http\Controllers\KantinController;
use App\Http\Controllers\LabController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\UjiBladeController;
use App\Http\Controllers\UkmController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/uji-blade', [UjiBladeController::class, 'index']);
Route::get('/beranda', [AkademikController::class, 'beranda']);
Route::get('/prodi', [AkademikController::class, 'prodi']);
Route::get('/dosen', [AkademikController::class, 'dosen']);
Route::get('/mahasiswa', [AkademikController::class, 'mahasiswa']);
Route::get('/mahasiswa/{mahasiswa}', [AkademikController::class, 'mahasiswaShow']);
Route::get('/matkul', [AkademikController::class, 'matkul']);
Route::get('/matkul/{matkul}', [AkademikController::class, 'matkulShow']);
Route::get('/peringkat', [AkademikController::class, 'peringkat']);
Route::get('/mahasiswa/tambah', [MahasiswaController::class, 'create']);
Route::post('/mahasiswa', [MahasiswaController::class, 'store']);




Route::get('/kantin', [KantinController::class, 'index']);
Route::get('/kantin/kosong', [KantinController::class, 'kosong']);
Route::get('/kantin/tentang', [KantinController::class, 'tentang']);

Route::get('/lab', [LabController::class, 'index']);
Route::get('/lab/{alat}', [LabController::class, 'show']);



Route::get('/ukm', [UkmController::class, 'index']);
Route::get('/ukm/{ukm}', [UkmController::class, 'show']);
