<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

#Controllers
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

#Protected routes
Route::group(['middleware' => ['auth:sanctum']], function(){
    Route::get('user-profile', [UserController::class, 'userProfile']);
    Route::get('users', [UserController::class, 'allUsers']);
    Route::post('logout', [AuthController::class, 'logout']);
});