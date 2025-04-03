<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Blog
 * @param int $id id блога
 * @param int $user_id id пользователя который добавил сообщение
 * @param int $message_id Порядковый номер сообщения
 * @param int $chat_id id чата
 * @param string $content Содержимое сообщения
 * @param string $created_at Момент создания
 */
class Chat extends Model
{
    protected $fillable = [
        'text',
        'name'
    ];
}
