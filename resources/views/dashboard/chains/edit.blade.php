@extends('layouts.dashboard')

@section('content')
    @include('dashboard.partials.chain-form', [
        'action' => route('dashboard.chains.store'),
        'method' => 'POST',
        'chain' => $chain,
        'submitLabel' => 'Create chain',
    ])
@endsection
