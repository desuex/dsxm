@extends('layouts.dashboard')

@section('content')
    @include('dashboard.partials.tag-form', [
        'action' => route('dashboard.tags.store'),
        'method' => 'POST',
        'post' => null,
        'submitLabel' => 'Create Tag',
    ])
@endsection
