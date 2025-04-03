<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Blog
 * @param int $id id блога
 * @param string $name Название поста
 * @param string $text Текст/содержание поста
 * @param string $created_at Момент создания
 */
class Post extends Model
{
    protected $fillable = [
        'text',
        'name',
        'id',
        'created_at'
    ];
}
