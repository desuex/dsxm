<?php

namespace App\Http\Controllers;

use App\Models\Tag;

class TagController extends Controller
{
    public function show($slug)
    {
        $tag = Tag::where('slug', $slug)->with('posts')->firstOrFail();

        return view('tag.show', compact('tag'));
    }
}
