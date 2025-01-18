<?php

namespace App\Http\Controllers;

use App\Models\Post;

class MainController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->paginate(10);
        return view('main', compact('posts'));
    }
}
