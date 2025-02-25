<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/users/{id}', 'App\Http\Controllers\UserController@show');
Route::get('/', 'App\Http\Controllers\UserController@index');

//Route::get('/user/{id}', [UserController::class, 'index']);
// Route::get('/users', [UserController::class, 'index']);
