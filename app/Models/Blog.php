<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Blog
 * @param int $id id блога
 * @param string $name Название поста
 * @param string $post Текст/содержание поста
 * @param string $text Пост
 * @param string $created_at Момент создания
 */
class Blog extends Model
{
    protected $fillable = [
        'text',
        'name'
    ];
}
