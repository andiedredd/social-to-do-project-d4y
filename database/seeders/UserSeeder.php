<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Запрос данных у пользователя
        $name = $this->command->ask('Введите имя пользователя');
        $email = $this->command->ask('Введите email пользователя');
        $password = $this->command->secret('Введите пароль пользователя'); // Для скрытого ввода пароля

        // Проверка на существование пользователя
        if (!User::where('email', $email)->exists()) {
            User::create([
                'name' => $name,
                'email' => $email,
                'password' => Hash::make($password), // Хэшируем пароль
            ]);
        } else {
            $this->command->info('Пользователь с таким email уже существует.');
        }
    }
}
