<nav class="bg-amber-700 text-white p-4 shadow-md">
    <div class="container mx-auto flex justify-between items-center">
        <!-- Site Logo -->
        <a href="/" class="flex items-center text-white hover:text-gray-200">
            <img src="https://avatars.githubusercontent.com/u/5473786" alt="Site Logo" class="w-10 h-10 rounded-full mr-2">
            <span class="text-xl font-bold">dsxm</span>
        </a>
        <!-- Navigation Links -->
        <div class="flex space-x-6">
            @foreach($items as $item)
                @if($item['type'] === 'link')
                    <a href="{{ $item['url'] }}" class="text-white hover:text-gray-200">{{ $item['label'] }}</a>
                @elseif($item['type'] === 'form')
                    <form action="{{ $item['url'] }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="text-white hover:text-gray-200">{{ $item['label'] }}</button>
                    </form>
                @endif
            @endforeach
        </div>
    </div>
</nav>
