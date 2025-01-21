@extends('layouts.dashboard')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Tags</h1>
    <a href="{{ route('dashboard.tags.create') }}" class="bg-amber-500 text-white px-4 py-2 rounded">Add Tag</a>

    <table class="table-auto w-full mt-4 bg-gray-900 rounded-lg">
        <thead>
        <tr class="bg-gray-800">
            <th class="px-4 py-2 text-left">Name</th>
            <th class="px-4 py-2 text-left">Slug</th>
            <th class="px-4 py-2 text-left">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($tags as $tag)
            <tr>
                <td class="px-4 py-2">{{ $tag->name }}</td>
                <td class="px-4 py-2">{{ $tag->slug }}</td>
                <td class="px-4 py-2">
                    <a href="{{ route('dashboard.tags.edit', $tag) }}" class="text-blue-500 hover:underline">Edit</a>
                    <form action="{{ route('dashboard.tags.destroy', $tag) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500 hover:underline">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <div class="mt-4">
        {{ $tags->links() }}
    </div>
@endsection
