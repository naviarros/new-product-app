<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('auth')->group(function () {
    Route::post('/login', [App\Http\Controllers\LoginController::class, 'login']);
    Route::post('/logout', [App\Http\Controllers\LoginController::class, 'logout'])->middleware('auth:sanctum');
});

Route::middleware('auth:sanctum')->group(function () {
    Route::prefix('products')->group(function () {
        Route::get('/', [App\Http\Controllers\ProductsController::class, 'index']);
        Route::get('/show', [App\Http\Controllers\ProductsController::class, 'show']);
        Route::post('/create', [App\Http\Controllers\ProductsController::class, 'store']);
        Route::get('/edit/{id}', [App\Http\Controllers\ProductsController::class, 'edit']);
        Route::put('/update/{id}', [App\Http\Controllers\ProductsController::class, 'update']);
        Route::delete('/delete/{id}', [App\Http\Controllers\ProductsController::class, 'destroy']);
    });
});
