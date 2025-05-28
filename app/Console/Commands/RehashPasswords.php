<?php


namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RehashPasswords extends Command
{
    protected $signature = 'users:rehash-passwords';
    protected $description = 'Rehash passwords for users who do not have bcrypt hashes';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        // Получаем всех пользователей
        $users = User::all();

        foreach ($users as $user) {
            // проверяем, если пароль не хэширован с использованием bcrypt
            if (!Hash::check($user->password, $user->password)) {
                // обновляем пароль, хэшируя его с помощью bcrypt
                $user->password = Hash::make($user->password);
                $user->save();
                $this->info("Пароль для пользователя {$user->email} был перехэширован.");
            }
        }
    }
}
