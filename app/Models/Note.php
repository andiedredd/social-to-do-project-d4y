<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Note
 * @param int $id
 * @param boolean $checked Сделано ли
 * @param string $text Текст заметки
 * @param string $created_at
 * @param string $updated_at
 */
class Note extends Model
{
    protected $fillable = [
        'text',
        'checked'
    ];
}
