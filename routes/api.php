<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AttendeesController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/attendees', [AttendeesController::class, 'index']);
Route::get('/attendees/{id}', [AttendeesController::class, 'show']);
Route::post('/attendees', [AttendeesController::class, 'store']);
Route::patch('/attendees/{id}', [AttendeesController::class, 'update']);