<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LostItemController;
use App\Http\Controllers\FoundItemController;
use App\Http\Controllers\LocationController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/lost-items', [LostItemController::class, 'index'])->name('lost-items.index');
Route::get('/lost-items/create', [LostItemController::class, 'create'])->name('lost-items.create');
Route::post('/lost-items', [LostItemController::class, 'store'])->name('lost-items.store');
Route::get('/lost-items/{id}', [LostItemController::class, 'show'])->name('lost-items.show');
Route::get('/lost-items/{id}/edit', [LostItemController::class, 'edit'])->name('lost-items.edit');
Route::post('/lost-items/{id}/update', [LostItemController::class, 'update'])->name('lost-items.update');
Route::post('/lost-items/{id}/delete', [LostItemController::class, 'destroy'])->name('lost-items.destroy');

Route::get('/found-items', [FoundItemController::class, 'index'])->name('found-items.index');
Route::get('/found-items/create', [FoundItemController::class, 'create'])->name('found-items.create');
Route::post('/found-items', [FoundItemController::class, 'store'])->name('found-items.store');
Route::get('/found-items/{id}', [FoundItemController::class, 'show'])->name('found-items.show');
Route::get('/found-items/{id}/edit', [FoundItemController::class, 'edit'])->name('found-items.edit');
Route::post('/found-items/{id}/update', [FoundItemController::class, 'update'])->name('found-items.update');
Route::post('/found-items/{id}/delete', [FoundItemController::class, 'destroy'])->name('found-items.destroy');

Route::get('/locations', [LocationController::class, 'index'])->name('locations.index');
Route::get('/locations/create', [LocationController::class, 'create'])->name('locations.create');
Route::post('/locations', [LocationController::class, 'store'])->name('locations.store');
Route::get('/locations/{id}/edit', [LocationController::class, 'edit'])->name('locations.edit');
Route::post('/locations/{id}/update', [LocationController::class, 'update'])->name('locations.update');
Route::post('/locations/{id}/delete', [LocationController::class, 'destroy'])->name('locations.destroy');