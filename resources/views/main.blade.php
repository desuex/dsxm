@extends('layouts.public')

@section('meta_title', 'dsxm - Recent Blog Posts')
@section('meta_description', 'Explore recent posts on dsxm covering web development, reverse engineering, and retro gaming.')
@section('meta_keywords', 'web development, PHP, Laravel, retro gaming, reverse engineering')

@section('content')
    <h1 class="text-3xl font-bold mb-4">Welcome to dsxm</h1>
    <div class="bg-gray-900 rounded-lg shadow-lg p-4">
        @include('components.post-list', [
        'title' => "Recent Posts",
        'posts' => $posts
    ])
    </div>
@endsection
