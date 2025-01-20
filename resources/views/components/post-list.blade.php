<div class="bg-gray-900 rounded-lg shadow-lg p-6">
    <h2 class="text-2xl font-bold mb-6">{{ $title }}</h2>

    @foreach($posts as $post)
        <!-- Individual Post -->
        <article class="mb-8">
            <!-- Post Title -->
            <h3 class="text-2xl font-bold mb-2">
                <a href="{{ route('post.show', $post->slug) }}" class="text-amber-500 hover:underline">
                    {{ $post->title }}
                </a>
            </h3>

            <!-- Publication Date -->
            <p class="text-sm text-gray-400 mb-2">
                Published on {{ $post->publication_date ? $post->publication_date->format('M d, Y') : 'Unpublished' }}
            </p>

            <!-- Category -->
            @if($post->category)
                <p class="text-sm text-gray-300 mb-2">
                    Category:
                    <a href="{{ route('category.show', $post->category->slug) }}" class="text-amber-500 hover:underline">
                        {{ $post->category->name }}
                    </a>
                </p>
            @endif

            <!-- Tags -->
            @if($post->tags->count())
                <p class="text-sm text-gray-300 mb-4">
                    Tags:
                    @foreach($post->tags as $tag)
                        <a href="{{ route('tag.show', $tag->slug) }}" class="text-amber-500 hover:underline">
                            {{ $tag->name }}
                        </a>@if(!$loop->last), @endif
                    @endforeach
                </p>
            @endif

            <!-- Markdown Preview -->
            <div class="text-gray-200 mb-4">
                {!! \Illuminate\Support\Str::markdown($post->preview ?? "") !!}
            </div>

            <!-- Read More Link -->
            <a href="{{ route('post.show', $post->slug) }}" class="text-amber-500 hover:underline font-bold">
                Read More →
            </a>
        </article>

        <!-- Separator -->
        @if(!$loop->last)
            <hr class="border-gray-700 my-6">
        @endif
    @endforeach

    <!-- Pagination -->
    <div class="mt-6">
        {{ $posts->links() }}
    </div>
</div>
