<?php

namespace App\View\Components;

use App\Models\Post;
use App\Models\Tag;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Sidebar extends Component
{
    public $latestPosts;
    public $tags;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->latestPosts = Post::latest()->take(5)->get();
        $this->tags = Tag::withCount('posts')
            ->orderBy('posts_count', 'desc')
            ->get()
            ->filter(function ($tag) {
                return $tag->posts_count > 0;
            });
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.sidebar');
    }
}
