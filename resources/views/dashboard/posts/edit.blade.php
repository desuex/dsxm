@extends('layouts.dashboard')

@section('content')
    @include('dashboard.partials.post-form', [
        'action' => route('dashboard.posts.update', $post),
        'method' => 'PUT',
        'post' => $post,
        'categories' => $categories,
        'chains' => $chains,
        'submitLabel' => 'Update Post',
    ])
@endsection
