<?php

use App\Http\Controllers\Api\AuthApiController;
use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [AuthController::class, 'login']);

Route::post('/api/login', [AuthApiController::class, 'login']);
