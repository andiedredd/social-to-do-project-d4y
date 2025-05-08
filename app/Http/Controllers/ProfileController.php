<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\User;

class ProfileController extends Controller
{
    // Конструктор для аутентификации
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Метод для обновления аватара
    public function updateAvatar(Request $request)
    {
        // Валидация загрузки файла
        $request->validate([
            'avatar' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048', // Максимум 2MB
        ]);

        $user = Auth::user();

        if ($request->hasFile('avatar')) {
            // Удаление старого аватара, если он есть
            if ($user->avatar) {
                Storage::delete('public/' . $user->avatar);
            }

            // Сохранение нового аватара
            $path = $request->file('avatar')->store('avatars', 'public');
            $user->avatar = $path;
            $user->save();
        }

        return back()->with('success', 'Аватар обновлен!');
    }

    // Метод для обновления статуса "Обо мне"
    public function updateInfo(Request $request)
    {
        // Валидация текста статуса
        $request->validate([
            'info' => 'nullable|max:24|string',
        ]);

        $user = Auth::user();
        $user->info = $request->info;
        $user->save();

        return back()->with('success', 'Статус обновлен!');
    }

    // Метод для смены пароля
    public function updatePassword(Request $request)
    {
        // Валидация нового пароля
        $request->validate([
            'password' => 'required|string|min:8|confirmed', // Минимум 8 символов и подтверждение
        ]);

        $user = Auth::user();

        // Обновление пароля
        $user->password = Hash::make($request->password);
        $user->save();

        return back()->with('success', 'Пароль обновлен!');
    }
}
