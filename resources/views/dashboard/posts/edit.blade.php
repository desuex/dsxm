@extends('layouts.dashboard')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Edit Post</h1>

    @include('dashboard.partials.post-form', [
        'action' => route('posts.update', $post),
        'method' => 'PUT',
        'post' => $post,
        'categories' => $categories,
        'chains' => $chains,
        'submitLabel' => 'Update Post',
    ])
@endsection
