<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'user_id',
        'url',
        'members', // можно хранить как JSON
    ];

    protected $casts = [
        'members' => 'array',
    ];


    public function participants()
    {
        return $this->belongsToMany(User::class, 'event_user');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

