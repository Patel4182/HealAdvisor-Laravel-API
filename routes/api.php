<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\PractitionerProfileController;

// Public routes
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Protected routes for practitioners
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/practitioner/profile', [PractitionerProfileController::class, 'show']);
    Route::post('/practitioner/profile', [PractitionerProfileController::class, 'store']);
    Route::put('/practitioner/profile', [PractitionerProfileController::class, 'update']);
    Route::post('/logout', [AuthController::class, 'logout']);
});
