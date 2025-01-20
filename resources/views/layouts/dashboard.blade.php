<!DOCTYPE html>
<html lang="en">
<head>
    @include('partials.meta')
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-terminal-bg text-terminal-fg font-sans antialiased">
<div class="min-h-screen flex flex-col">
    <x-navbar  />
    <main class="flex-grow container mx-auto p-4">
        @yield('content')
    </main>
    @include('partials.footer')
</div>
</body>
</html>
