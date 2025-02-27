<?php

namespace App\Http\Controllers;
use App\Models\User;
class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users.index', [
            'users' => $users
        ]);
    }
    public function show($id)
    {
        $user = User::query()->where('id',$id)->first();
        return view('users.show', [
            'user' => $user
        ]);
    }
    
    public function create()
    {
        User::query()->get();
        return view('users.create');

        }
}
