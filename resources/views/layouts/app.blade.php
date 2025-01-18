<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('meta_title', 'dsxm - Blog on Web Development, Reverse Engineering & Retro Gaming')</title>
    <meta name="description" content="@yield('meta_description', 'Explore dsxm: A blog about cutting-edge web development techniques, reverse engineering insights, retro gaming nostalgia, and tech tutorials.')">
    <meta name="keywords" content="@yield('meta_keywords', 'web development, PHP, Laravel, reverse engineering, binary analysis, retro gaming, space rangers, technology blog')">

    <!-- Open Graph / Facebook -->
    <meta property="og:title" content="@yield('meta_title', 'dsxm - Blog on Web Development, Reverse Engineering & Retro Gaming')">
    <meta property="og:description" content="@yield('meta_description', 'Explore dsxm: A blog about cutting-edge web development techniques, reverse engineering insights, retro gaming nostalgia, and tech tutorials.')">
    <meta property="og:url" content="@yield('canonical_url', url()->current())">
    <meta property="og:type" content="website">

    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('meta_title', 'dsxm - Blog on Web Development, Reverse Engineering & Retro Gaming')">
    <meta name="twitter:description" content="@yield('meta_description', 'Explore dsxm: A blog about cutting-edge web development techniques, reverse engineering insights, retro gaming nostalgia, and tech tutorials.')">
    <link rel="icon" type="image/png" sizes="16x16" href="/images/favicons/favicon-16x16.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/images/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="48x48" href="/images/favicons/favicon-48x48.png">
    <link rel="icon" type="image/png" sizes="64x64" href="/images/favicons/favicon-64x64.png">
    <link rel="icon" type="image/png" sizes="128x128" href="/images/favicons/favicon-128x128.png">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-terminal-bg text-terminal-fg font-sans antialiased">
<div class="min-h-screen flex flex-col">
    <!-- Navbar -->
    <nav class="bg-amber-700 text-white p-4 shadow-md">
        <div class="container mx-auto flex justify-between items-center">
            <!-- Site Logo -->
            <a href="/" class="flex items-center">
                <img src="https://avatars.githubusercontent.com/u/5473786" alt="Site Logo" class="w-10 h-10 rounded-full mr-2">
                <span class="text-xl font-bold">dsxm</span>
            </a>
            <!-- Logout Button -->
{{--            <a href="{{ route('logout') }}" class="px-4 py-2 bg-amber-500 rounded-lg hover:bg-amber-600">--}}
{{--                Logout--}}
{{--            </a>--}}
        </div>
    </nav>

    <!-- Content -->
    <main class="flex-grow container mx-auto p-4 flex">
        <!-- Main Content -->
        <div class="w-full lg:w-3/4 pr-4">
            @yield('content')
        </div>

        <!-- Right Sidebar -->
        <aside class="hidden lg:block w-1/4">
            <div class="bg-white rounded-lg shadow-lg p-4 mb-6">
                <h3 class="text-xl font-bold mb-3">Latest Posts</h3>
                @foreach($latestPosts as $post)
                    <a href="{{ route('post.show', $post->slug) }}" class="block text-amber-500 hover:underline">
                        {{ $post->title }}
                    </a>
                @endforeach
            </div>

            <div class="bg-white rounded-lg shadow-lg p-4 mb-6">
                <h3 class="text-xl font-bold mb-3">Tags</h3>
                @foreach($tags as $tag)
                    <a href="{{ route('tag.show', $tag->slug) }}" class="inline-block bg-gray-200 text-gray-700 px-2 py-1 rounded-full text-sm mr-2 mb-2">
                        {{ $tag->name }} ({{ $tag->posts_count }})
                    </a>
                @endforeach
            </div>

            <div class="bg-white rounded-lg shadow-lg p-4">
                <h3 class="text-xl font-bold mb-3">Contact</h3>
                <p>Email: <a href="mailto:hire@dsxm.com" class="text-amber-500 hover:underline">hire@dsxm.com</a></p>
                <p>GitHub: <a href="https://github.com/desuex" target="_blank" class="text-amber-500 hover:underline">github.com/desuex</a></p>
            </div>
        </aside>
    </main>

    <!-- Footer -->
    <footer class="bg-terminal-bg text-terminal-fg p-4 text-center">
        © {{ date('Y') }} <a href="https://github.com/desuex/dsxm" target="_blank">dsxm</a>, Open Source blog
    </footer>
</div>
</body>
</html>
