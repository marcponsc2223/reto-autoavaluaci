<?php

use App\Http\Controllers\Api\CiclesController;
use App\Http\Controllers\Api\Criteris_autoavalacioController;
use App\Http\Controllers\Api\Criteris_avaluacioController;
use App\Http\Controllers\Api\ModulController;
use App\Http\Controllers\Api\Resultats_aprenentatgeController;
use App\Http\Controllers\Api\RubriquaController;
use App\Http\Controllers\Api\UsuariController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\CiclesController;

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

Route::apiResource('cicle', CiclesController::class);
Route::apiResource('criterisAval', Criteris_avaluacioController::class);
Route::apiResource('resultApren', Resultats_aprenentatgeController::class);
Route::apiResource('moduls', ModulController::class);
Route::apiResource('alumnes', UsuariController::class);
Route::apiResource('rubriques', RubriquaController::class);

Route::apiResource('avaluacio', ModulController::class);

Route::get('avaluacio/{id}', 'ModulController@show');

Route::get('criterisAval/{id}', [Criteris_avaluacioController::class, 'show']);
// Route::get('moduls/{id}', [ModulController::class, 'show']);

// Route::apiResource('autoavaluacio', Criteris_autoavalacioController::class);



