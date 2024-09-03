<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\ShowController;
use Illuminate\Support\Facades\Route;

Route::prefix('shows')->group(function () {
    Route::get('/', [ShowController::class, 'index']);
    Route::get('{showId}/events', [ShowController::class, 'events']);
});

Route::prefix('events')->group(function () {
    Route::get('{eventId}/places', [EventController::class, 'places']);
    Route::post('{eventId}/reserve', [EventController::class, 'reserve']);
});
