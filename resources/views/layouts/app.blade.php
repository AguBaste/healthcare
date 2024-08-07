<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900" id="barra">
        @switch(auth()->user()->role)
            @case('patient')
                @include('layouts.navigation')
            @break

            @case('secretary')
                @include('layouts.navigationSecretary')
            @break

            @case('provider')
                @include('layouts.navigationProvider')
            @break

            @case('director')
                @include('layouts.navigationDirector')
            @break

            @default
        @endswitch
        @if (session('status'))
            <div class="bg-green-500 text-center p-4 shadow text-white uppercase">
                {{ session('status') }}
            </div>
        @endif
        <!-- Page Heading -->
        @isset($header)
            <header class="bg-white dark:bg-gray-800 shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endisset

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>
</body>

</html>
