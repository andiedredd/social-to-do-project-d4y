<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    // конструктор тк здесь вызывается middleware
    public function __construct()
    {
        $this->middleware('auth');
    }

    // метод отображения профиля
    public function show()
    {
        $user = Auth::user();
        return view('blogs.user', compact('user'));
    }

    // Обновление аватара
    public function updateAvatar(Request $request)
    {
        $request->validate([
            'avatar' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        $user = Auth::user();

        if ($request->hasFile('avatar')) {
            if ($user->avatar) {
                Storage::delete('public/' . $user->avatar);
            }

            $path = $request->file('avatar')->store('avatars', 'public');
            $user->avatar = $path;
            $user->save();
        }

        return back()->with('success', 'Аватар обновлен!');
    }

    // Обновление статуса
    public function updateInfo(Request $request)
    {
        $request->validate([
            'info' => 'nullable|max:24|string',
        ]);

        $user = Auth::user();
        $user->info = $request->info;
        $user->save();

        return back()->with('success', 'Статус обновлен!');
    }

    // Обновление пароля
    public function updatePassword(Request $request)
    {
        $request->validate([
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = Auth::user();
        $user->password = Hash::make($request->password);
        $user->save();

        return back()->with('success', 'Пароль обновлен!');
    }

    public function deleteAvatar(Request $request)
    {
        $user = Auth::user();

        if ($user->avatar) {
            Storage::delete('public/' . $user->avatar);
            $user->avatar = null;
            $user->save();
        }

        return back()->with('success', 'Аватар удален!');
    }
    public function updateName(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        auth()->user()->update([
            'name' => $request->name,
        ]);

        return back()->with('success', 'Имя обновлено.');
    }

}
