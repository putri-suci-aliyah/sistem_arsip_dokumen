<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DivisiController;
use App\Http\Controllers\UsersController;


Route::resource('divisi', DivisiController::class);
Route::resource('users', UsersController::class);
