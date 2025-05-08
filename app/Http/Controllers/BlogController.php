<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Note;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    protected $model = Blog::class;

    public function home()
    {
        return view('blogs.home');
    }

    public function user($id)
    {
        $blog = Blog::query()->where('id', $id)->first();
        return view('blogs.user', ['blog' => $blog]);
    }

    public function list($id)
    {
        $blog = Blog::query()->where('id', $id)->first();
        return view('blogs.checklist', ['blog' => $blog]);
    }


    public function event($id)
    {
        $blog = Blog::query()->where('id', $id)->first();
        return view('blogs.event', ['blog' => $blog]);
    }

    // ----> ниже все по ивенту

    public function calendar($id)
    {
        $blog = Blog::query()->where('id', $id)->first();
        return view('blogs.calendar', ['blog' => $blog]); // не хорошо, надо поправить
    }
    public function projects($id)
    {
        $blog = Blog::query()->where('id', $id)->first();
        return view('blogs.projects', ['blog' => $blog]); // не хорошо, надо поправить
    }
    public function tasks($id)
    {
        $blog = Blog::query()->where('id', $id)->first();
        return view('blogs.tasks', ['blog' => $blog]); // не хорошо, надо поправить
    }
    public function chat($id)
    {
        $blog = Blog::query()->where('id', $id)->first();
        return view('blogs.chat', ['blog' => $blog]); // не хорошо, надо поправить
    }
}

