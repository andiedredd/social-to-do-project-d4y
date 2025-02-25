<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller
{
     public function index()
    {
        $items = User::all();
        return view('users.index', [
            'items' => $items
        ]);
    }
    public function show($id)
    {
        $user = User::query()->where('id',$id)->first();
        return view('users.show', [
            'user' => $user
        ]);
    }

}
