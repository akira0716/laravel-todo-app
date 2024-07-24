<?php

use Illuminate\Support\Facades\Route;

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/', [App\Http\Controllers\TodoController::class, "index"]);
Route::post('/', [App\Http\Controllers\TodoController::class, "index"]);
Route::post('/edit', [App\Http\Controllers\TodoController::class, "editForm"]);
Route::get('/completeTasks', [App\Http\Controllers\TodoController::class, "completeTasks"]);
Route::post('/completeTasks', [App\Http\Controllers\TodoController::class, "completeTasks"]);
