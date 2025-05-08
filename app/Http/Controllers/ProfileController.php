<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\User;

class ProfileController extends Controller
{
    // конструктор для аутентификации
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Метод для обновления аватара
    public function updateAvatar(Request $request)
    {
        // валидация загрузки
        $request->validate([
            'avatar' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048', // максимум 2MB
        ]);

        $user = Auth::user();

        if ($request->hasFile('avatar')) {
            // удаление старого аватара
            if ($user->avatar) {
                Storage::delete('public/' . $user->avatar);
            }

            // сохранение нового
            $path = $request->file('avatar')->store('avatars', 'public');
            $user->avatar = $path;
            $user->save();
        }

        return back()->with('success', 'Аватар обновлен!');
    }

    // метод для обновления статуса "Обо мне"
    public function updateInfo(Request $request)
    {
        // валидация статуса
        $request->validate([
            'info' => 'nullable|max:24|string',
        ]);

        $user = Auth::user();
        $user->info = $request->info;
        $user->save();

        return back()->with('success', 'Статус обновлен!');
    }

    // метод смены пароля
    public function updatePassword(Request $request)
    {
        // Валидация нового пароля
        $request->validate([
            'password' => 'required|string|min:8|confirmed', // минимум 8 символов и подтверждение
        ]);

        $user = Auth::user();

        // обновление пароля
        $user->password = Hash::make($request->password);
        $user->save();

        return back()->with('success', 'Пароль обновлен!');
    }
}
