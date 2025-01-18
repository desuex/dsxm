<nav class="text-sm text-gray-400 mb-4">
    <ul class="flex items-center space-x-2">
        <li>
            <a href="{{ route('main') }}" class="text-amber hover:underline">Home</a>
        </li>
        @if ($post->chain)
            <li>/</li>
            <li>
                <a href="{{ route('chain.show', $post->chain->slug) }}" class="text-amber hover:underline">
                    {{ $post->chain->name }}
                </a>
            </li>
        @elseif ($post->category)
            <li>/</li>
            <li>
                <a href="{{ route('category.show', $post->category->slug) }}" class="text-amber hover:underline">
                    {{ $post->category->name }}
                </a>
            </li>
        @endif
        <li>/</li>
        <li class="text-gray-500">{{ $post->title }}</li>
    </ul>
</nav>
