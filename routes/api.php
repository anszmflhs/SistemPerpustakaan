<?php

use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\PeminjamanDetailController;
use App\Http\Controllers\PenerbitController;
use App\Http\Controllers\PengarangController;
use App\Http\Controllers\PengembalianController;
use App\Http\Controllers\PengembalianDetailController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\RakController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/create_pengarang', [PengarangController::class, 'createPengarang']);
Route::get('/get_pengarang', [PengarangController::class, 'index']);
Route::post('/create_penerbit', [PenerbitController::class, 'createPenerbit']);
Route::get('/get_penerbit', [PenerbitController::class, 'index']);
Route::post('/create_rak', [RakController::class, 'createRak']);
Route::get('/get_rak', [RakController::class, 'index']);
Route::post('/create_petugas', [PetugasController::class, 'createPetugas']);
Route::get('/get_petugas', [PetugasController::class, 'index']);
Route::post('/create_anggota', [AnggotaController::class, 'createAnggota']);
Route::get('/get_anggota', [AnggotaController::class, 'index']);
Route::post('/create_buku', [BukuController::class, 'createBuku']);
Route::post('/create_peminjaman', [PeminjamanController::class, 'createPeminjaman']);
Route::post('/create_pengembalian', [PengembalianController::class, 'createPengembalian']);
Route::post('/create_peminjamandetail', [PeminjamanDetailController::class, 'createPeminjamanDetail']);
Route::post('/create_pengembaliandetail', [PengembalianDetailController::class, 'createPengembalianDetail']);
