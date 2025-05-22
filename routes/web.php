<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\NoteController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ProfileController;


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

    Route::get('/note/check-all/{id}', 'App\Http\Controllers\NoteController@checkAll'); // проверка заметок
    Route::get('/note/check/{id}', 'App\Http\Controllers\NoteController@check'); // то же

    Route::get('/users/{id}', 'App\Http\Controllers\UserController@show');
    Route::get('/users/{id}', 'App\Http\Controllers\UserController@index');

    Route::resource('blog', \App\Http\Controllers\BlogController::class);


Route::post('/logout', [AuthController::class, 'logout'])->name('logout'); // выход


        Route::get('/events/calendar/{slug}/{id}', [EventController::class, 'showCalendar'])->name('events.calendar');
        Route::get('/events/chat/{slug}/{id}', [EventController::class, 'showChat'])->name('events.chat');
        Route::get('/events/tasks/{slug}/{id}', [EventController::class, 'showTasks'])->name('events.tasks');
        Route::get('/events/projects/{slug}/{id}', [EventController::class, 'showProjects'])->name('events.projects');


    Route::get('/events', [EventController::class, 'index'])->name('events.index');
    Route::get('/events/create', [EventController::class, 'create'])->name('events.create'); // форма создания
    Route::post('/events', [EventController::class, 'store'])->name('events.store'); // сохранить

    Route::get('/events/{event}', [EventController::class, 'show'])->name('events.show'); // одно событие
    Route::get('/events/{event}/edit', [EventController::class, 'edit'])->name('events.edit'); // редактировать
    Route::put('/events/{event}', [EventController::class, 'update'])->name('events.update'); // обновить
    Route::delete('/events/{event}', [EventController::class, 'destroy'])->name('events.destroy'); // удалить
    Route::post('/events', [EventController::class, 'store'])->name('events.store');
    Route::get('/note', [NoteController::class, 'index'])->name('note.index');


    // Профиль
    Route::put('/profile/avatar', [ProfileController::class, 'updateAvatar'])->name('profile.update.avatar');
    Route::put('/profile/info', [ProfileController::class, 'updateInfo'])->name('profile.update.info');
    Route::put('/profile/password', [ProfileController::class, 'updatePassword'])->name('profile.update.password');
});
