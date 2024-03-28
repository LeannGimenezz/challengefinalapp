<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\TareaController;
use App\Http\Controllers\EmpleadosController;
use App\Http\Controllers\AdminController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource("v1/empleados", EmpleadosController::class);
Route::apiResource("v1/usuarios", AdminController::class);
Route::apiResource("v1/tareas",TareaController::class);
