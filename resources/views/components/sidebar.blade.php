<aside class="hidden lg:block w-1/4">
    <div class="bg-gray-900 rounded-lg shadow-lg p-4 mb-6">
        <h3 class="text-xl font-bold mb-3">Latest Posts</h3>
        @foreach($latestPosts as $post)
            <a href="{{ route('post.show', $post->slug) }}" class="block text-amber-500 hover:underline">
                {{ $post->title }}
            </a>
        @endforeach
    </div>

    <div class="bg-gray-900 rounded-lg shadow-lg p-4 mb-6">
        <h3 class="text-xl font-bold mb-3">Tags</h3>
        @foreach($tags as $tag)
            <a href="{{ route('tag.show', $tag->slug) }}"
               class="inline-block bg-gray-700 text-gray-200 px-2 py-1 rounded-full text-sm mr-2 mb-2">
                {{ $tag->name }} ({{ $tag->posts_count }})
            </a>
        @endforeach
    </div>

    <div class="bg-gray-900 rounded-lg shadow-lg p-4">
        <h3 class="text-xl font-bold mb-3">Contact</h3>
        <p>Email: <a href="mailto:hire@dsxm.com" class="text-amber-500 hover:underline">hire@dsxm.com</a></p>
        <p>GitHub: <a href="https://github.com/desuex" target="_blank" class="text-amber-500 hover:underline">github.com/desuex</a></p>
    </div>
</aside>
