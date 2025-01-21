@extends('layouts.dashboard')

@section('content')
    @include('dashboard.partials.chain-form', [
        'action' => route('dashboard.chains.store'),
        'method' => 'POST',
        'chain' => null,
        'submitLabel' => 'Create Chain',
    ])
@endsection
