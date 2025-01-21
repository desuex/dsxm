@extends('layouts.dashboard')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Posts</h1>

    <a href="{{ route('dashboard.posts.create') }}" class="text-white bg-amber-500 px-4 py-2 rounded hover:bg-amber-600 mb-4 inline-block">
        Create New Article
    </a>

    <table class="min-w-full bg-gray-800 text-white rounded-lg">
        <thead>
        <tr>
            <th class="p-4 text-left">Title</th>
            <th class="p-4 text-left">Slug</th>
            <th class="p-4 text-left">Category</th>
            <th class="p-4 text-left">Chain</th>
            <th class="p-4 text-left">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($posts as $post)
            <tr class="border-t border-gray-700">
                <td class="p-4">{{ $post->title }}</td>
                <td class="p-4">{{ $post->slug }}</td>
                <td class="p-4">{{ $post->category->name ?? 'N/A' }}</td>
                <td class="p-4">{{ $post->chain->name ?? 'N/A' }}</td>
                <td class="p-4 flex space-x-4">
                    <a href="{{ route('dashboard.posts.edit', $post) }}" class="text-amber-500 hover:underline">Edit</a>
                    <form action="{{ route('dashboard.posts.destroy', $post) }}" method="POST" onsubmit="return confirm('Are you sure?');">
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
        {{ $posts->links() }}
    </div>
@endsection
