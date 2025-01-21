<!-- SEO Title -->
<div class="mb-4">
    <label for="meta_title" class="block text-sm font-medium">SEO Title</label>
    <input type="text" name="meta_title" id="meta_title" value="{{ old('meta_title', $model->meta_title ?? '') }}"
           class="w-full px-4 py-2 bg-gray-700 text-white rounded">
</div>

<!-- SEO Description -->
<div class="mb-4">
    <label for="meta_description" class="block text-sm font-medium">SEO Description</label>
    <textarea name="meta_description" id="meta_description" rows="3"
              class="w-full px-4 py-2 bg-gray-700 text-white rounded">{{ old('meta_description', $model->meta_description ?? '') }}</textarea>
</div>

<!-- SEO Keywords -->
<div class="mb-4">
    <label for="meta_keywords" class="block text-sm font-medium">SEO Keywords</label>
    <textarea name="meta_keywords" id="meta_keywords" rows="3"
              class="w-full px-4 py-2 bg-gray-700 text-white rounded">{{ old('meta_keywords', $model->meta_keywords ?? '') }}</textarea>
</div>

<!-- Canonical URL -->
<div class="mb-4">
    <label for="canonical_url" class="block text-sm font-medium">Canonical URL</label>
    <input type="url" name="canonical_url" id="canonical_url" value="{{ old('canonical_url', $model->canonical_url ?? '') }}"
           class="w-full px-4 py-2 bg-gray-700 text-white rounded">
</div>
