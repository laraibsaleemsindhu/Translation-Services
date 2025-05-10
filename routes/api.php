<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\TranslationController;
//
//Route::middleware('auth:sanctum')->group(function () {
//    Route::get('/translations', [TranslationController::class, 'index']);
//    Route::post('/translations', [TranslationController::class, 'store']);
//    Route::put('/translations/{id}', [TranslationController::class, 'update']);
//    Route::get('/translations/export', [TranslationController::class, 'export']);
//});
// Temporarily testing without auth
Route::post('/translations', [TranslationController::class, 'store']);
Route::put('/translations/{id}', [TranslationController::class, 'update']);
Route::get('/translations', [TranslationController::class, 'index']);
Route::get('/translations/export', [TranslationController::class, 'export']);



