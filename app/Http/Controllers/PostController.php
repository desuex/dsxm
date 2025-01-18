<?php

namespace App\Http\Controllers;

use App\Models\Post;

class PostController extends Controller
{
    public function show($slug)
    {
        $post = Post::where('slug', $slug)->with('category', 'tags', 'chain')->firstOrFail();
        $post->incrementViews();

        return view('post.show', compact('post'));
    }
}
