<?php

use App\Http\Controllers\CommercialController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// COMMERCIAUX 
Route::get('/commerciaux',[CommercialController::class,'index']);
Route::get('/commerciaux/{id}',[CommercialController::class,'find']);
Route::post('/commerciaux',[CommercialController::class,'store']);
Route::put('/commerciaux/{id}',[CommercialController::class,'put']);
Route::delete('/commerciaux/{id}',[CommercialController::class,'delete']);

// FACTURE
Route::get('/factures',[CommercialController::class,'index']);
Route::get('/factures/{id}',[CommercialController::class,'find']);
Route::post('/factures',[CommercialController::class,'store']);
Route::put('/factures/{id}',[CommercialController::class,'update']);
Route::delete('/factures/{id}',[CommercialController::class,'delete']);
