@extends('layouts.app')

@section('meta_title', "Tag: {$tag->name}")
@section('meta_description', $tag->meta_description ?? "Explore posts tagged with {$tag->name}.")
@section('meta_keywords', $tag->meta_keywords ?? $tag->name)

@section('content')
    <h1 class="text-3xl font-bold mb-4">Tag: {{ $tag->name }}</h1>
    <p class="mb-4">{!! \Illuminate\Support\Str::markdown(e($tag->short_description)) !!}</p>

    @include('components.post-list', [
        'title' => "Posts Tagged '{$tag->name}'",
        'posts' => $tag->posts()->paginate(10)
    ])
@endsection
