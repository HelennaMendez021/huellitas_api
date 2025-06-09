<?php

use Illuminate\Support\Facades\Route;

Route::get('/test', function () {
    return 'Ruta funcionando';
});
Route::get('/info', function () {
    return phpinfo();
});
Route::get('/login', function () {
    return response()->json(['error' => 'dsfg.'], 401);
})->name('login');
