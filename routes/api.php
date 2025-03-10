<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\backend\ApiPendidikanController;



//acara 21
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
// Rute API untuk Pendidikan
Route::get('api_pendidikan', [ApiPendidikanController::class, 'getAll']);
Route::get('api_pendidikan/{id}', [ApiPendidikanController::class, 'getPen']);
Route::post('api_pendidikan', [ApiPendidikanController::class, 'createPen']);
Route::put('api_pendidikan/{id}', [ApiPendidikanController::class, 'updatePen']);
Route::delete('api_pendidikan/{id}', [ApiPendidikanController::class, 'deletePen']);
