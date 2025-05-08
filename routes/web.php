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
    Route::get('/home', [BlogController::class, 'home'])->name('home'); // домашняя
    Route::get('/user/{id}', [BlogController::class, 'user']); // пользователь (я)
    Route::get('/event/{id}', [BlogController::class, 'event']); // события (переход к соо)

    Route::resource('note', \App\Http\Controllers\NoteController::class); //

    Route::get('/note/check-all', 'App\Http\Controllers\NoteController@checkAll'); // проверка заметок
    Route::get('/note/check/{id}', 'App\Http\Controllers\NoteController@check'); // то же
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout'); // выход

Route::get('/tasks/{id}', [BlogController::class, 'tasks'])->name('tasks'); // задачи соо
Route::get('/calendar/{id}', [BlogController::class, 'tasks'])->name('calendar'); // календарь соо
Route::get('/projects/{id}', [BlogController::class, 'tasks'])->name('projects'); // проекты соо
Route::get('/chat/{id}', [BlogController::class, 'tasks'])->name('chat'); // чат соо


Route::middleware('auth')->group(function () {
    Route::put('/profile/avatar', [\App\Http\Controllers\ProfileController::class, 'updateAvatar'])->name('profile.update.avatar'); // нужен допил
    Route::put('/profile/info', [\App\Http\Controllers\ProfileController::class, 'updateInfo'])->name('profile.update.info'); // то же
    Route::put('/profile/password', [\App\Http\Controllers\ProfileController::class, 'updatePassword'])->name('profile.update.password');
});
