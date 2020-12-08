<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\DentistaController;
use App\Http\Controllers\CitaController;
use App\Http\Controllers\UserController;


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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Registro de usuarios
Route::post('registro', [UserController::class, 'store']);
//Login de usuarios
Route::post('login', [UserController::class, 'login']);

Route::apiResource('clientes', ClienteController::class);
Route::apiResource('dentistas', DentistaController::class);
Route::apiResource('citas', CitaController::class);
