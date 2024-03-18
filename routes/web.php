<?php

use App\Models\Obat;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KlasifikasiController;
use App\Http\Controllers\KlasifikasiObatController;
use App\Http\Controllers\ObatController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [AuthController::class, 'index']);
Route::post('/login', [AuthController::class, 'login']);
Route::group(["middleware" => "cekLogin"], function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);


    Route::get('/obat', [ObatController::class, 'index']);
    Route::get('/form-obat', [ObatController::class, 'create']);
    Route::post('/create-obat', [ObatController::class, 'store']);
    Route::get('/edit-obat/{obat}', [ObatController::class, 'edit']);
    Route::post('/update-obat/{obat}', [ObatController::class, 'update']);
    Route::get('/delete-obat/{obat}', [ObatController::class, 'destroy']);
    Route::get('/detail-obat/{obat}', [ObatController::class, 'show']);


    Route::post('/tambah-stok/{obat}', [ObatController::class, 'tambah']);


    Route::get('/klasifikasi', [KlasifikasiController::class, 'index']);
    Route::get('/form-klasifikasi', [KlasifikasiController::class, 'create']);
    Route::post('/create-klasifikasi', [KlasifikasiController::class, 'store']);
    Route::get('/edit-klasifikasi/{klasifikasi}', [KlasifikasiController::class, 'edit']);
    Route::post('/update-klasifikasi/{klasifikasi}', [KlasifikasiController::class, 'update']);
    Route::get('/delete-klasifikasi/{klasifikasi}', [KlasifikasiController::class, 'destroy']);
    Route::get('/detail-klasifikasi/{klasifikasi}', [KlasifikasiController::class, 'show']);


    Route::get('/klasifikasi-obat', [KlasifikasiObatController::class, 'index']);
    Route::post('/create-klasifikasi-obat/{obat}', [KlasifikasiObatController::class, 'store']);
    Route::get('/delete-klasifikasi-obat/{klasifikasiobat}', [KlasifikasiObatController::class, 'destroy']);
    Route::get('/detail-klasifikasi-obat/{klasifikasiobat}', [KlasifikasiObatController::class, 'show']);

    Route::get('/logout', [DashboardController::class, 'logout']);
});
