@extends('layouts.dashboard')

@section('content')
    @include('dashboard.partials.category-form', [
        'action' => route('dashboard.categories.update', ['category'=>$category]),
        'method' => 'PUT',
        'category' => $category,
        'submitLabel' => 'Update Category',
    ])
@endsection
