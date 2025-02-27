<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/users/{id}', 'App\Http\Controllers\UserController@show');
Route::get('/users', 'App\Http\Controllers\UserController@index');
//Route::get('/', 'App\Http\Controllers\UserController@create');

Route::get('/', 'App\Http\Controllers\NoteController@index');
Route::get('/check/{id}', 'App\Http\Controllers\NoteController@check');
