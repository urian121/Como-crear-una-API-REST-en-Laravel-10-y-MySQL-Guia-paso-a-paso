<?php

use App\Http\Controllers\EmpleadoController;
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


Route::get('/empleados', [EmpleadoController::class, 'index']); //Obtener todos los empleados
Route::post('/empleados', [EmpleadoController::class, 'store']); //Crear un nuevo empleado
Route::get('/empleados/{id}', [EmpleadoController::class, 'show']); //Obtener un solo empleado por su id
Route::put('/empleados/{id}', [EmpleadoController::class, 'update']); //Actualizar un empleado de acuerdo a su id
Route::delete('/empleados/{id}', [EmpleadoController::class, 'destroy']); //Eliminar un empleado de acuerdo a su id
