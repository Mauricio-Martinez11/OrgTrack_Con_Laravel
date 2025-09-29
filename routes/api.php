<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\VehiculoController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\EnvioController;
use App\Http\Controllers\Api\UbicacionController;
use App\Http\Controllers\Api\TipotransporteController;

Route::middleware([])->group(function () {

    // Routes Auth
    Route::post('/auth/register', [AuthController::class, 'register']);
    Route::post('/auth/login', [AuthController::class, 'login']);

    // Routes Vehiculos
    Route::get('/vehiculos', [VehiculoController::class, 'index']);
    Route::get('/vehiculos/{id}', [VehiculoController::class, 'show']);
    Route::post('/vehiculos', [VehiculoController::class, 'store']);
    Route::put('/vehiculos/{id}', [VehiculoController::class, 'update']);
    Route::delete('/vehiculos/{id}', [VehiculoController::class, 'destroy']);

    Route::middleware('jwt')->post('/envios/completo', [EnvioController::class, 'crearEnvioCompleto']);

    Route::middleware('jwt')->prefix('ubicaciones')->group(function () {
        Route::get('/', [UbicacionController::class, 'index']);
        Route::get('/{id}', [UbicacionController::class, 'show']);
        Route::post('/', [UbicacionController::class, 'store']);
        Route::put('/{id}', [UbicacionController::class, 'update']);
        Route::delete('/{id}', [UbicacionController::class, 'destroy']);
    });

    Route::get('/tipotransporte', [TipotransporteController::class, 'index']);
});


