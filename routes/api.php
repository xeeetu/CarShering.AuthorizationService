<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::post('/store', [UserController::class, 'store']);
Route::post('/login', [LoginController::class, 'login']);
