<h1 class="text-2xl font-bold mb-4">{{ isset($chain) ? 'Edit' : 'Create' }} Chain</h1>
<form method="POST" action="{{ $action }}">
    @csrf
    @if($method === 'PUT')
        @method('PUT')
    @endif

    <!-- Name -->
    <div class="mb-4">
        <label for="name" class="block text-sm font-medium">Name</label>
        <input type="text" name="name" id="name" value="{{ old('name', $chain->name ?? '') }}"
               class="w-full px-4 py-2 bg-gray-700 text-white rounded" required>
    </div>

    <!-- Slug -->
    <div class="mb-4">
        <label for="slug" class="block text-sm font-medium">Slug</label>
        <input type="text" name="slug" id="slug" value="{{ old('slug', $chain->slug ?? '') }}"
               class="w-full px-4 py-2 bg-gray-700 text-white rounded">
    </div>

    <!-- Category -->
    <div class="mb-4">
        <label for="category_id" class="block text-sm font-medium">Category</label>
        <select name="category_id" id="category_id" class="w-full px-4 py-2 bg-gray-700 text-white rounded" required>
            <option value="">Select a Category</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ old('category_id', $chain->category_id ?? '') == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
    </div>

    <!-- Short Description -->
    <div class="mb-4">
        <label for="short_description" class="block text-sm font-medium">Short Description</label>
        <textarea name="short_description" id="short_description" rows="3"
                  class="w-full px-4 py-2 bg-gray-700 text-white rounded">{{ old('short_description', $chain->short_description ?? '') }}</textarea>
    </div>

    <!-- SEO Fields -->
    @include('dashboard.partials.seo-fields', ['model' => $chain ?? null])

    <!-- Submit Button -->
    <div class="mt-4">
        <button type="submit" class="w-full bg-amber-500 text-terminal-bg py-2 px-4 rounded hover:bg-amber-600">
            {{ $submitLabel }}
        </button>
    </div>
</form>
