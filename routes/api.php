<?php

use App\Http\Controllers\api\KlasifikasiController;
use App\Http\Controllers\API\ObatController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

 Route::get('/obat', [ObatController::class,'index']);
 Route::post('/obat/create',[ObatController::class,'store']);
 Route::get('/obat/{id}', [ObatController::class,'show']);
 Route::put('/obat/update/{id}',[ObatController::class,'update']);
 Route::delete('/obat/delete/{id}', [ObatController::class,'destroy']);

Route::get('/klasifikasi', [KlasifikasiController::class,'index']);
 Route::post('/klasifikasi/create',[KlasifikasiController::class,'store']);
 Route::get('/klasifikasi/{id}', [KlasifikasiController::class,'show']);
 Route::put('/klasifikasi/update/{id}',[KlasifikasiController::class,'update']);
 Route::delete('/klasifikasi/delete/{id}', [KlasifikasiController::class,'destroy']);