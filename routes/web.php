<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\NoteController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;

Route::get('/users/{id}', 'App\Http\Controllers\UserController@show');
Route::get('/users', 'App\Http\Controllers\UserController@index');

Route::resource('blog', \App\Http\Controllers\BlogController::class);



Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register'); // Показ формы регистрации
Route::post('/register', [AuthController::class, 'register'])->name('register.post'); // Обработка формы регистрации


Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post'); // обработка логина

Route::get('/home', [BlogController::class, 'home'])->name('home');


Route::middleware('auth')->group(function () {
    Route::get('/home', [BlogController::class, 'home'])->name('home');
    Route::get('/user/{id}', [BlogController::class, 'user']);
    Route::get('/event/{id}', [BlogController::class, 'event']);
    Route::resource('note', \App\Http\Controllers\NoteController::class);
    Route::get('/note/check-all', 'App\Http\Controllers\NoteController@checkAll');
    Route::get('/note/check/{id}', 'App\Http\Controllers\NoteController@check');
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/tasks/{id}', [BlogController::class, 'tasks'])->name('tasks');
Route::get('/calendar/{id}', [BlogController::class, 'tasks'])->name('calendar');
Route::get('/projects/{id}', [BlogController::class, 'tasks'])->name('projects');
Route::get('/chat/{id}', [BlogController::class, 'tasks'])->name('chat');


Route::middleware('auth')->group(function () {
    Route::put('/profile/avatar', [ProfileController::class, 'updateAvatar'])->name('profile.update.avatar');
    Route::put('/profile/info', [ProfileController::class, 'updateInfo'])->name('profile.update.info');
    Route::put('/profile/password', [ProfileController::class, 'updatePassword'])->name('profile.update.password');
});
