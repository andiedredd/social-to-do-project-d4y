<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/users/{id}', 'App\Http\Controllers\UserController@show');
Route::get('/users', 'App\Http\Controllers\UserController@index');
//Route::get('/', 'App\Http\Controllers\UserController@create');

//Route::get('/notes', 'App\Http\Controllers\NoteController@index');
//Route::delete('/notes/{id}', 'App\Http\Controllers\NoteController@destroy');
//Route::post('/notes', 'App\Http\Controllers\NoteController@store');

Route::prefix('note')->group(function () {
    Route::get('/check-all', 'App\Http\Controllers\NoteController@checkAll');
    Route::get('/check/{id}', 'App\Http\Controllers\NoteController@check');
});
Route::resource('note', \App\Http\Controllers\NoteController::class);

Route::resource('blog', \App\Http\Controllers\BlogController::class);

Route::get('/sign-in', 'App\Http\Controllers\UserController@login');

// домашняя
// окно с чатом
// ту ду
// профиль - ниже блог (публикации)


Route::get('/home', 'App\Http\Controllers\BlogController@hub'); // домашняя
Route::get('/user/{id}', 'App\Http\Controllers\BlogController@user'); // профиль
Route::get('/chat/{id}', 'App\Http\Controllers\BlogController@chat');



















//Route::get('/blog/post/{id}', 'App\Http\Controllers\BlogController@show'); // конкретный пост
//Route::get('/blog/{id}', 'App\Http\Controllers\BlogController@check'); // профиль

//Route::get('/blog/{id}/posts', 'App\Http\Controllers\BlogController2@show'); // все посты
//Route::get('/blog', 'App\Http\Controllers\BlogController2@index'); // бланковый (кнопки)
