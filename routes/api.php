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
//Logout de usuarios
Route::get('logout', [UserController::class, 'logout'])->middleware('auth:api');
//Ver todos los usuarios
Route::get('index', [UserController::class, 'index'])->middleware('auth:api');


Route::apiResource('clientes', ClienteController::class);
Route::apiResource('dentistas', DentistaController::class)->middleware('auth:api');
Route::get('indexAll', [CitaController::class, 'indexAll']);
Route::apiResource('user.citas', CitaController::class)->only(['index']);
Route::apiResource('citas', CitaController::class);
