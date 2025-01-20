@extends('layouts.public')

@section('title', 'Login')

@section('content')
    <div class="flex justify-center items-center h-screen">
        <div class="bg-terminal-bg p-8 rounded-lg shadow-lg w-full max-w-md">
            <h1 class="text-2xl font-bold text-center text-terminal-fg mb-4">Login</h1>

            <!-- Google Login -->
            <a href="{{ route('google.redirect') }}" class="w-full bg-amber-500 text-terminal-bg py-2 px-4 rounded-lg flex items-center justify-center mb-4 hover:bg-amber-600">
                <svg class="w-5 h-5 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48">
                    <path fill="#EA4335" d="M24 9.5c3.26 0 6.17 1.17 8.47 3.09l6.37-6.36C34.88 3.36 29.84 1 24 1 14.85 1 6.94 6.59 3.18 14.06l7.43 5.82C12.4 14.07 17.72 9.5 24 9.5z"/>
                    <path fill="#34A853" d="M24 43c5.84 0 10.77-1.89 14.3-5.12l-6.86-5.43C28.91 34.67 26.53 35.5 24 35.5c-6.46 0-11.95-4.14-13.9-10H2.47v6.25C5.78 37.59 14.24 43 24 43z"/>
                    <path fill="#4A90E2" d="M46.5 24c0-1.6-.14-3.15-.4-4.65H24v9.15h12.85c-.55 2.85-2.17 5.29-4.65 6.95v5.43h7.43c4.35-4.01 6.87-9.93 6.87-16.88z"/>
                    <path fill="#FBBC05" d="M10.1 27.5c-.54-1.57-.85-3.24-.85-5s.31-3.43.85-5.01v-6.25H2.47C1.19 14.33 0.5 19.07 0.5 24s.69 9.67 1.97 14.01l7.63-6.51z"/>
                </svg>
                Login with Google
            </a>

            <!-- Local Login Form (Development Only) -->
            @if(app()->environment('local'))
                <form method="POST" action="{{ route('login') }}" class="mt-4">
                    @csrf
                    <div class="mb-4">
                        <label for="email" class="block text-sm font-medium">Email</label>
                        <input type="email" name="email" id="email" required
                               class="w-full px-4 py-2 bg-gray-700 text-white rounded">
                    </div>

                    <div class="mb-4">
                        <label for="password" class="block text-sm font-medium">Password</label>
                        <input type="password" name="password" id="password" required
                               class="w-full px-4 py-2 bg-gray-700 text-white rounded">
                    </div>

                    <button type="submit" class="w-full bg-amber-500 text-terminal-bg py-2 px-4 rounded-lg hover:bg-amber-600">
                        Login
                    </button>
                </form>
            @endif

            <a href="{{ route('main') }}" class="block text-center text-amber-500 hover:underline mt-4">Go to Main Page</a>
        </div>
    </div>
@endsection
