@extends('layouts.dashboard')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Categories</h1>
    <a href="{{ route('dashboard.categories.create') }}" class="bg-amber-500 text-white px-4 py-2 rounded">Add Category</a>

    <table class="table-auto w-full mt-4 bg-gray-900 rounded-lg">
        <thead>
        <tr class="bg-gray-800">
            <th class="px-4 py-2 text-left">Name</th>
            <th class="px-4 py-2 text-left">Slug</th>
            <th class="px-4 py-2 text-left">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($categories as $category)
            <tr>
                <td class="px-4 py-2">{{ $category->name }}</td>
                <td class="px-4 py-2">{{ $category->slug }}</td>
                <td class="px-4 py-2">
                    <a href="{{ route('dashboard.categories.edit', $category) }}" class="text-blue-500 hover:underline">Edit</a>
                    <form action="{{ route('dashboard.categories.destroy', $category) }}" method="POST" class="inline">
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
        {{ $categories->links() }}
    </div>
@endsection
