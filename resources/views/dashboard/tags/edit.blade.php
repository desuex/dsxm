@extends('layouts.dashboard')

@section('content')
    @include('dashboard.partials.tag-form', [
        'action' => route('dashboard.tags.update', $tag),
        'method' => 'PUT',
        'tag' => $tag,
        'submitLabel' => 'Update Tag',
    ])
@endsection
