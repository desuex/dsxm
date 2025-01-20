@extends('layouts.dashboard')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Create Post</h1>

    @include('dashboard.partials.post-form', [
        'action' => route('posts.store'),
        'method' => 'POST',
        'post' => null,
        'categories' => $categories,
        'chains' => $chains,
        'submitLabel' => 'Create Post',
    ])
@endsection
