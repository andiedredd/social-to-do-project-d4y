<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{

    public function hub()
    {
        return view('blogs.hub');
    }

    public function user($id)
    {
        $blog = Blog::query()->where('id',$id)->first();
        return view('blogs.user',['blog' => $blog]);
    }

    public function list($id)
    {
        $blog = Blog::query()->where('id',$id)->first();
        return view('blogs.checklist',['blog' => $blog]);
    }

    public function chat($id)
    {
        $blog = Blog::query()->where('id',$id)->first();
        return view('blogs.chat',['blog' => $blog]);
    }
}

