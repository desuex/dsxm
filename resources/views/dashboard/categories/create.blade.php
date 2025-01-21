@extends('layouts.dashboard')

@section('content')
    @include('dashboard.partials.category-form', [
        'action' => route('dashboard.categories.store'),
        'method' => 'POST',
        'category' => null,
        'submitLabel' => 'Create Category',
    ])
@endsection
