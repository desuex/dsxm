@extends('layouts.dashboard')

@section('content')
    @include('dashboard.partials.post-form', [
        'action' => route('dashboard.posts.store'),
        'method' => 'POST',
        'post' => null,
        'categories' => $categories,
        'chains' => $chains,
        'submitLabel' => 'Create Post',
    ])
@endsection
