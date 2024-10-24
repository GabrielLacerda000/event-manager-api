<?php

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/events', [Event::class, 'index']);
Route::post('/events/create', [Event::class, 'store']);
Route::get('/events/{event}', [Event::class, 'show']);
Route::post('/events/{event}', [Event::class, 'update']);
Route::post('/events/{event}', [Event::class, 'destroy']);