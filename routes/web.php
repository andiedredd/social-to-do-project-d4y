<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/users/{id}', 'App\Http\Controllers\UserController@show');
Route::get('/users', 'App\Http\Controllers\UserController@index');
//Route::get('/', 'App\Http\Controllers\UserController@create');

Route::get('/note', 'App\Http\Controllers\NoteController@index');
Route::get('/check/{id}', 'App\Http\Controllers\NoteController@check');




Route::get('/blog/post/{id}', 'App\Http\Controllers\BlogController@show'); // конкретный пост
Route::get('/blog/{id}', 'App\Http\Controllers\BlogController@check'); // профиль





Route::get('/blog/{id}/posts', 'App\Http\Controllers\BlogController2@show'); // все посты
Route::get('/blog', 'App\Http\Controllers\BlogController2@index'); // бланковый (кнопки)
