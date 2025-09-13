<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ ($title ?? config('app.name', 'Laravel')) }}</title>

    <!-- Fonts -->
    {{-- <link rel="preconnect" href="https://fonts.bunny.net"> --}}
    <link href="https://fonts.bunny.net/css?family=montserrat:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        *{
            font-family: 'montserrat';
        }
        /* Optional custom styles for icons or specific elements */
        .sidebar {
            transition: transform 0.3s ease-in-out;
        }
    </style>
</head>

<body class="font-sans antialiased bg-gray-100 dark:bg-gray-900">
    <div id="app" class="relative min-h-screen flex">@include('layouts.sidebar')
        <div class="flex-1 md:ml-64 p-6 transition-all duration-300 ease-in-out">
            <div class="md:hidden flex items-center justify-between mb-6"><button id="sidebar-toggle"
                    class="p-2 rounded-md focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500"><svg
                        class="h-6 w-6 text-gray-800" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16m-7 6h7" />
                    </svg></button>
                <h1 class="text-xl font-semibold text-gray-800">Dashboard</h1>
            </div>
            @isset($header)
                <header class="bg-white dark:bg-gray-800 shadow rounded-lg p-6 mb-6">{{ $header }}
                </header>
            @endisset
                <main>{{ $slot }} </main>
        </div>
    </div>
</body>

</html>
