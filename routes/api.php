<?php

use App\Http\Controllers\Api\AuthController;
use Illuminate\Support\Facades\Route;

// Route yang bisa diakses tanpa login
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Contoh route yang harus login dulu (pakai middleware sanctum)
Route::middleware('auth:sanctum')->get('/user-profile', function (Request $request) {
    return $request->user();
});