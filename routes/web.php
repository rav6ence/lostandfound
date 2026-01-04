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

Route::resource('found-items', FoundItemController::class);

Route::resource('locations', LocationController::class);

// CLAIM — MANUAL CREATE (PAKAI PARAMETER)
Route::get(
    '/claim-items/create/{foundItem}',
    [ClaimController::class, 'create']
)->name('claim-items.create');

// CLAIM — STORE SAJA VIA RESOURCE
Route::resource('claim-items', ClaimController::class)->only(['store']);
