<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [\App\Http\Controllers\PenggunaController::class,'masuk']);
Route::post('/', [\App\Http\Controllers\PenggunaController::class,'login']);
Route::post('/password', [\App\Http\Controllers\PenggunaController::class,'password']);
Route::get('/keluar', [\App\Http\Controllers\PenggunaController::class,'keluar']);
Route::post('/daftar', [\App\Http\Controllers\PenggunaController::class,'daftar']);
Route::get('/beranda', [\App\Http\Controllers\BerandaController::class,'index']);

Route::get('/kategori', [\App\Http\Controllers\KategoriController::class,'index']);
Route::put('/kategori', [\App\Http\Controllers\KategoriController::class,'tambah']);
Route::patch('/kategori', [\App\Http\Controllers\KategoriController::class,'edit']);
Route::delete('/kategori', [\App\Http\Controllers\KategoriController::class,'hapus']);

Route::get('/transaksi', [\App\Http\Controllers\TransaksiController::class,'index']);
Route::put('/transaksi', [\App\Http\Controllers\TransaksiController::class,'buat']);
Route::post('/transaksi/siap', [\App\Http\Controllers\TransaksiController::class,'siap']);
Route::post('/transaksi/selesai', [\App\Http\Controllers\TransaksiController::class,'selesai']);
Route::post('/transaksi/batal', [\App\Http\Controllers\TransaksiController::class,'batal']);

Route::get('/pelanggan', [\App\Http\Controllers\DataPelangganController::class,'index']);
Route::get('/pelanggan/{id}', [\App\Http\Controllers\DataPelangganController::class,'riwayat']);
Route::patch('/pelanggan', [\App\Http\Controllers\DataPelangganController::class,'edit']);

Route::get('/riwayat', [\App\Http\Controllers\PelangganController::class,'riwayat']);
Route::get('/profil', [\App\Http\Controllers\PelangganController::class,'profil']);
Route::patch('/profil', [\App\Http\Controllers\PelangganController::class,'edit']);
