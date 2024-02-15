<?php

use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\FeedbackController as ApiFeedbackController;
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

Route::prefix('auth')->group(function () {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
    Route::post('/register', [AuthController::class, 'register']);
});

Route::get('/feedbacks', [ApiFeedbackController::class, 'index']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/feedback/create', [ApiFeedbackController::class, 'store']);
});