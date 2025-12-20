<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LostItemController;
use App\Http\Controllers\FoundItemController;
use App\Http\Controllers\LocationController;

Route::get('/', function () {
    return redirect()->route('lost-items.index');
});

Route::resource('lost-items', LostItemController::class);
Route::resource('found-items', FoundItemController::class);
Route::resource('locations', LocationController::class);
