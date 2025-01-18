<?php

namespace App\Http\Controllers;

use App\Models\Category;

class CategoryController extends Controller
{
    public function show($slug)
    {
        $category = Category::where('slug', $slug)->with('posts')->firstOrFail();

        return view('category.show', compact('category'));
    }
}
