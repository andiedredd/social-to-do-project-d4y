<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController2 extends Controller {


public function show($id)
{
    $blog = Blog::query()->where('id',$id)->first();
    return view('blogs.posts',[
        'blog' => $blog
    ]);


}
    public function index()
{
    $id = Blog::query()->get();
    return view('blogs.blogs', [
        'id' => $id
    ]);

}
}






