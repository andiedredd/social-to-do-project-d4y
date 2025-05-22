<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Note
 * @param int $id
 * @param int $user_id
 * @param boolean $checked Сделано ли
 * @param string $text Текст заметки
 * @param string $created_at
 * @param string $updated_at
 */
class Note extends Model

{
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    protected $fillable = [
        'text',
        'checked',
        'user_id'
    ];

    public function events()
    {
        return $this->hasMany(Event::class);
    }
}
