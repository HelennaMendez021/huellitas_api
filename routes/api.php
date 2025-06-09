<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CitasController;
use App\Http\Controllers\UsersController;
use App\Models\User;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/info', function () {
    return phpinfo();
});

Route::prefix('auth')->group(function () {
    Route::post('/login', [UsersController::class, 'login']);
    Route::post('/registrar-usuario', [UsersController::class, 'registrar_usuario']);
});

Route::group([], function () {
    Route::prefix('auth')->group(function () {
        Route::post('/logout', [UsersController::class, 'logout']);
    });
    Route::prefix('citas')->group(function () {
        Route::post('/gestionar-citas', [CitasController::class, 'gestionar_citas']);
        Route::get('/fechas-disponibles', [CitasController::class, 'fechas_disponibles']);
        Route::get('/obtener-citas', [CitasController::class, 'obtener_citas']);
        Route::get('/obtener-clientes', [CitasController::class, 'obtener_clientes']);
        Route::get('/obtener-mascotas', [CitasController::class, 'obtener_mascotas']);
        Route::get('/obtener-reporte-mascota', [CitasController::class, 'obtener_reporte_mascota']);
    });
});

// Ruta para registrar citas publicamente sin autenticación
Route::post('/citas/registrar-cita', [CitasController::class, 'registrar_cita']);

Route::get('/auth/confirmar-email', [UsersController::class, 'confirmar_email'])
    ->name('auth.confirmarEmail')
    ->middleware('signed');
