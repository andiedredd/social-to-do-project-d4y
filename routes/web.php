<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/users/{id}', 'App\Http\Controllers\UserController@show');
Route::get('/users', 'App\Http\Controllers\UserController@index');
//Route::get('/', 'App\Http\Controllers\UserController@create');
Route::get('/note', 'App\Http\Controllers\NoteController@index');
Route::get('/check/{id}', 'App\Http\Controllers\NoteController@check');





// домашняя
// окно с чатом
// ту ду
// профиль - ниже блог (публикации)


Route::get('/', 'App\Http\Controllers\BlogController@hub'); // домашняя
Route::get('/user/{id}', 'App\Http\Controllers\BlogController@user'); // профиль
Route::get('/checklist/{id}', 'App\Http\Controllers\BlogController@list'); // ту ду
Route::get('/chat/{id}', 'App\Http\Controllers\BlogController@chat'); //



















//Route::get('/blog/post/{id}', 'App\Http\Controllers\BlogController@show'); // конкретный пост
//Route::get('/blog/{id}', 'App\Http\Controllers\BlogController@check'); // профиль

//Route::get('/blog/{id}/posts', 'App\Http\Controllers\BlogController2@show'); // все посты
//Route::get('/blog', 'App\Http\Controllers\BlogController2@index'); // бланковый (кнопки)
