<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\DepartamentoController;
use App\Http\Controllers\MunicipioController;

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

Route::resource('/cliente',ClienteController::class);
Route::resource('/departamento', DepartamentoController::class);
Route::get('/municipio/{id}', [MunicipioController::class,'filtro']);
Route::get('/clientes/export',[ClienteController::class,'exportarClientes']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
