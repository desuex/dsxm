@extends('layouts.app')

@section('meta_title', $chain->meta_title ?? $chain->name)
@section('meta_description', $chain->meta_description ?? "Explore posts in the chain: {$chain->name}.")
@section('meta_keywords', $chain->meta_keywords ?? $chain->name)

@section('content')
    <h1 class="text-3xl font-bold mb-4">{{ $chain->name }}</h1>
    <p class="mb-4">{!! \Illuminate\Support\Str::markdown(e($chain->short_description)) !!}</p>


    @include('components.post-list', [
        'title' => "Posts in '{$chain->name}' Chain",
        'posts' => $chain->posts()->paginate(10)
    ])
@endsection
