@extends('layouts.public')

@section('meta_title', $category->meta_title ?? $category->name)
@section('meta_description', $category->meta_description ?? "Posts in the {$category->name} category.")
@section('meta_keywords', $category->meta_keywords ?? $category->name)

@section('content')
    <h1 class="text-3xl font-bold mb-4">{{ $category->name }}</h1>
    <p class="mb-4">{!! \Illuminate\Support\Str::markdown(e($category->description)) !!}</p>

    @include('components.post-list', [
        'title' => "Posts in '{$category->name}'",
        'posts' => $category->posts()->paginate(10)
    ])
@endsection
