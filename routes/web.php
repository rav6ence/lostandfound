<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LostItemController;
use App\Http\Controllers\FoundItemController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\ClaimController;

Route::get('/', function () {
    return redirect()->route('lost-items.index');
});

Route::resource('lost-items', LostItemController::class);

Route::get('/lost-items', [LostItemController::class, 'index'])->name('lost-items.index');
Route::get('/lost-items/create', [LostItemController::class, 'create'])->name('lost-items.create');
Route::post('/lost-items', [LostItemController::class, 'store'])->name('lost-items.store');
Route::get('/lost-items/{id}', [LostItemController::class, 'show'])->name('lost-items.show');

Route::get('/claim/{foundItemId}', [ClaimController::class, 'create'])->name('claim.create');
Route::post('/claim', [ClaimController::class, 'store'])->name('claim.store');

Route::resource('found-items', FoundItemController::class);
Route::resource('locations', LocationController::class);