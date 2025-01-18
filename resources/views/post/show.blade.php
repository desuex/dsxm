@extends('layouts.app')

@section('meta_title', $post->meta_title ?? $post->title)
@section('meta_description', $post->meta_description ?? Str::limit(strip_tags($post->text), 160))
@section('meta_keywords', $post->meta_keywords ?? 'web development, PHP, Laravel')

@section('content')
    <div class="bg-gray-900 rounded-lg shadow-lg p-6">
        @include('components.breadcrumbs', ['post' => $post])

        <h1 class="text-3xl font-bold mb-4">{{ $post->title }}</h1>
        <p class="text-gray-500 mb-4">Published on {{ $post->formattedPublicationDate() }}</p>
        <div class="mb-4">
            @if ($post->chain)
                <a href="{{ route('chain.show', $post->chain->slug) }}" class="text-amber hover:underline">
                    Chain: {{ $post->chain->name }}
                </a>
            @elseif ($post->category)
                <a href="{{ route('category.show', $post->category->slug) }}" class="text-amber hover:underline">
                    Category: {{ $post->category->name }}
                </a>
            @endif
        </div>
        <div class="mb-4">
            Tags:
            @foreach ($post->tags as $tag)
                <a href="{{ route('tag.show', $tag->slug) }}" class="text-amber hover:underline mr-2">
                    {{ $tag->name }}
                </a>
            @endforeach
        </div>
        <div class="prose">
            {!! \Illuminate\Support\Str::markdown($post->text) !!}
        </div>
    </div>

@endsection
