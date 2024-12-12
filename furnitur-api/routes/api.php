<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

//post
Route::apiResource('/furniture', App\Http\Controllers\Api\FurnitureController::class);
Route::apiResource('/categories', App\Http\Controllers\Api\CategoryController::class);


