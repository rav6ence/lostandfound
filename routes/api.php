<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\LostFoundController;

// ==========================================
// 1. PUBLIC ROUTES (Tanpa Login)
// ==========================================

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// LIST FOUND ITEM (GET) - Ini yang tadi error 405
Route::get('/found-items', [LostFoundController::class, 'indexFoundItems']);


// ==========================================
// 2. PROTECTED ROUTES (Wajib Pakai Token)
// ==========================================
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    // Lost Items
    Route::post('/lost-items', [LostFoundController::class, 'storeLostItem']);
    
    // Found Items (Lapor)
    Route::post('/found-items', [LostFoundController::class, 'storeFoundItem']);
    
    // Claim
    Route::post('/found-items/{id}/claim', [LostFoundController::class, 'claimItem']);
    
    // History
    Route::get('/history', [LostFoundController::class, 'history']);
});