<div class="bg-gray-900 rounded-lg shadow-lg p-6">
    <h2 class="text-2xl font-bold mb-4">{{ $title }}</h2>
    @foreach($posts as $post)
        <div class="mb-4">
            <a href="{{ route('post.show', $post->slug) }}" class="text-xl font-bold text-amber-500 hover:underline">
                {{ $post->title }}
            </a>
            <p class="text-gray-200">{{ \Illuminate\Support\Str::limit($post->preview, 150) }}</p>
        </div>
    @endforeach

    <!-- Pagination -->
    <div class="mt-6">
        {{ $posts->links() }}
    </div>
</div>
