<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;

Route::get('/ping', function () {
    return response()->json(['message' => 'API is ready!']);
});

Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
  Route::get('/books', [BookController::class, 'index']);

    Route::middleware('role:admin,editor')->group(function () {
        Route::post('/books', [BookController::class, 'store']);
        Route::put('/books/{book}', [BookController::class, 'update']);
    });

    Route::middleware('role:admin')->group(function () {
        Route::delete('/books/{book}', [BookController::class, 'destroy']);
    });
});