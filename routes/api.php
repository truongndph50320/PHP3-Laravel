<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CategoryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::apiResource('categories',CategoryController::class);

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

// Route::get('/',[UserController::class,'index']);
Route::get('/',[AuthController::class,'index']);

Route::post('/login',[AuthController::class,'login']);
Route::post('/register',[AuthController::class,'register']);
