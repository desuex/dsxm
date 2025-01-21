<h1 class="text-2xl font-bold mb-4">{{ isset($chain) ? 'Edit' : 'Create' }} Tag</h1>
<form method="POST" action="{{ $action }}">
    @csrf
    @if($method === 'PUT')
        @method('PUT')
    @endif

    <!-- Name -->
    <div class="mb-4">
        <label for="name" class="block text-sm font-medium">Name</label>
        <input type="text" name="name" id="name" value="{{ old('name', $tag->name ?? '') }}"
               class="w-full px-4 py-2 bg-gray-700 text-white rounded" required>
    </div>

    <!-- Slug -->
    <div class="mb-4">
        <label for="slug" class="block text-sm font-medium">Slug</label>
        <input type="text" name="slug" id="slug" value="{{ old('slug', $tag->slug ?? '') }}"
               class="w-full px-4 py-2 bg-gray-700 text-white rounded">
    </div>

    <!-- Short Description -->
    <div class="mb-4">
        <label for="short_description" class="block text-sm font-medium">Short Description</label>
        <textarea name="short_description" id="short_description" rows="3"
                  class="w-full px-4 py-2 bg-gray-700 text-white rounded">{{ old('short_description', $tag->short_description ?? '') }}</textarea>
    </div>

    <!-- SEO Fields -->
    @include('dashboard.partials.seo-fields', ['model' => $tag ?? null])

    <!-- Submit Button -->
    <div class="mt-4">
        <button type="submit" class="w-full bg-amber-500 text-terminal-bg py-2 px-4 rounded hover:bg-amber-600">
            {{ $submitLabel }}
        </button>
    </div>
</form>
