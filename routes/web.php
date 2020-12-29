<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Auth\AuthController;

Route::post('/register', [AuthController::class, 'store'])->name('register.user');
