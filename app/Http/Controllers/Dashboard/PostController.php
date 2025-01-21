<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostStoreRequest;
use App\Http\Requests\PostUpdateRequest;
use App\Models\Category;
use App\Models\Chain;
use App\Models\Post;
use App\Models\Tag;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::with('category', 'chain')->paginate(10);

        return view('dashboard.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $chains = Chain::all();

        return view('dashboard.posts.create', compact('categories', 'chains'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostStoreRequest $request)
    {
        $data = $request->validated();
        $post = Post::create($data);

        if (!empty($data['tags'])) {
            $tags = collect(explode(',', $data['tags']))->map(function ($tag) {
                return Tag::getOrCreateByName(trim($tag))->id;
            });

            $post->tags()->sync($tags);
        }

        return redirect()->route('dashboard.dashboard')->with('success', 'Post created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        $chains = Chain::all();

        return view('dashboard.posts.edit', compact('post', 'categories', 'chains'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostUpdateRequest $request, Post $post)
    {
        $data = $request->validated();
        $post->update($data);

        if (!empty($data['tags'])) {
            $tags = collect(explode(',', $data['tags']))->map(function ($tag) {
                return Tag::getOrCreateByName(trim($tag))->id;
            });

            $post->tags()->sync($tags);
        }

        return redirect()->route('dashboard.dashboard')->with('success', 'Post updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('dashboard.dashboard')->with('success', 'Post deleted successfully.');
    }
}
