@extends('layouts.public')

@section('meta_title', 'dsxm - Recent Blog Posts')
@section('meta_description', 'Explore recent posts on dsxm covering web development, reverse engineering, and retro gaming.')
@section('meta_keywords', 'web development, PHP, Laravel, retro gaming, reverse engineering')

@section('content')
    <h1 class="text-3xl font-bold mb-4">Welcome to dsxm</h1>
    <div class="bg-gray-900 rounded-lg shadow-lg p-4">
        <h2 class="text-2xl font-bold mb-4">Recent Posts</h2>
        @foreach($posts as $post)
            <div class="mb-4">
                <a href="{{ route('post.show', $post->slug) }}" class="text-xl font-bold text-amber-500 hover:underline">
                    {{ $post->title }}
                </a>
                <p class="text-gray-200">{{ \Illuminate\Support\Str::limit($post->preview, 150) }}</p>
            </div>
        @endforeach
        {{ $posts->links() }}
    </div>
@endsection
