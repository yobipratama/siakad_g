<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;


Route::resource('mahasiswa', MahasiswaController::class);
// Route::get('/mahasiswa', 'MahasiswaController@index');
Route::get('mahasiswa/nilai/{nim}', [MahasiswaController::class, 'khs']);
Route::get('mahasiswa/nilai/{nim}/pdf', [MahasiswaController::class, 'cetak_pdf']);