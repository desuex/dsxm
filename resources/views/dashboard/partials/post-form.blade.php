<form method="POST" action="{{ $action }}">
    @csrf
    @if($method === 'PUT')
        @method('PUT')
    @endif

    <!-- Title -->
    <div class="mb-4">
        <label for="title" class="block text-sm font-medium">Title</label>
        <input type="text" name="title" id="title" value="{{ old('title', $post->title ?? '') }}"
               class="w-full px-4 py-2 bg-gray-700 text-white rounded" required>
    </div>

    <!-- Slug -->
    <div class="mb-4">
        <label for="slug" class="block text-sm font-medium">Slug</label>
        <input type="text" name="slug" id="slug" value="{{ old('slug', $post->slug ?? '') }}"
               class="w-full px-4 py-2 bg-gray-700 text-white rounded" required>
    </div>

    <!-- Publication Date -->
    <div class="mb-4">
        <label for="publication_date" class="block text-sm font-medium">Publication Date</label>
        <input type="datetime-local" name="publication_date" id="publication_date"
               value="{{ old('publication_date', isset($post->publication_date) ? $post->publication_date->format('Y-m-d\TH:i') : '') }}"
               class="w-full px-4 py-2 bg-gray-700 text-white rounded">
    </div>

    <!-- Preview -->
    <div class="mb-4">
        <label for="preview" class="block text-sm font-medium">Preview</label>
        <textarea name="preview" id="preview" rows="3"
                  class="w-full px-4 py-2 bg-gray-700 text-white rounded">{{ old('preview', $post->preview ?? '') }}</textarea>
    </div>

    <!-- Text -->
    <div class="mb-4">
        <label for="text" class="block text-sm font-medium">Content</label>
        <textarea name="text" id="text" rows="8"
                  class="w-full px-4 py-2 bg-gray-700 text-white rounded" required>{{ old('text', $post->text ?? '') }}</textarea>
    </div>

    <!-- Category -->
    <div class="mb-4">
        <label for="category_id" class="block text-sm font-medium">Category</label>
        <select name="category_id" id="category_id" class="w-full px-4 py-2 bg-gray-700 text-white rounded" required>
            <option value="">Select a Category</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ old('category_id', $post->category_id ?? '') == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
    </div>

    <!-- Chain -->
    <div class="mb-4">
        <label for="chain_id" class="block text-sm font-medium">Chain</label>
        <select name="chain_id" id="chain_id" class="w-full px-4 py-2 bg-gray-700 text-white rounded">
            <option value="">Select a Chain (Optional)</option>
            @foreach($chains as $chain)
                <option value="{{ $chain->id }}" {{ old('chain_id', $post->chain_id ?? '') == $chain->id ? 'selected' : '' }}>
                    {{ $chain->name }}
                </option>
            @endforeach
        </select>
    </div>

    <!-- Tags -->
    <div class="mb-4">
        <label for="tags" class="block text-sm font-medium">Tags (comma-separated)</label>
        <input type="text" name="tags" id="tags"
               value="{{ old('tags', isset($post) ? $post->tags->pluck('name')->implode(', ') : '') }}"
               class="w-full px-4 py-2 bg-gray-700 text-white rounded">
    </div>

    <!-- SEO Fields -->
    <div class="mb-4">
        <label for="meta_title" class="block text-sm font-medium">SEO Title</label>
        <input type="text" name="meta_title" id="meta_title" value="{{ old('meta_title', $post->meta_title ?? '') }}"
               class="w-full px-4 py-2 bg-gray-700 text-white rounded">
    </div>

    <div class="mb-4">
        <label for="meta_description" class="block text-sm font-medium">SEO Description</label>
        <textarea name="meta_description" id="meta_description" rows="3"
                  class="w-full px-4 py-2 bg-gray-700 text-white rounded">{{ old('meta_description', $post->meta_description ?? '') }}</textarea>
    </div>

    <div class="mb-4">
        <label for="meta_keywords" class="block text-sm font-medium">SEO Keywords</label>
        <textarea name="meta_keywords" id="meta_keywords" rows="3"
                  class="w-full px-4 py-2 bg-gray-700 text-white rounded">{{ old('meta_keywords', $post->meta_keywords ?? '') }}</textarea>
    </div>

    <div class="mb-4">
        <label for="canonical_url" class="block text-sm font-medium">Canonical URL</label>
        <input type="url" name="canonical_url" id="canonical_url" value="{{ old('canonical_url', $post->canonical_url ?? '') }}"
               class="w-full px-4 py-2 bg-gray-700 text-white rounded">
    </div>

    <!-- Is Published -->
    <div class="mb-4 flex items-center">
        <input type="checkbox" name="is_published" id="is_published" value="1"
               {{ old('is_published', $post->is_published ?? false) ? 'checked' : '' }}
               class="mr-2">
        <label for="is_published" class="text-sm font-medium">Publish</label>
    </div>

    <!-- Submit Button -->
    <div class="mt-4">
        <button type="submit" class="w-full bg-amber-500 text-terminal-bg py-2 px-4 rounded hover:bg-amber-600">
            {{ $submitLabel }}
        </button>
    </div>
</form>
