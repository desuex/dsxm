<?php

namespace App\Http\Middleware;

use App\Models\Post;
use Closure;

class IncrementPostViews
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        if ($request->route('slug')) {
            $post = Post::where('slug', $request->route('slug'))->first();
            if ($post) {
                $post->incrementViews();
            }
        }

        return $next($request);
    }
}
