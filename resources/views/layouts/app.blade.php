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


    {{-- <x-banner /> --}}

    <div class="relative flex flex-row min-h-screen bg-primary dark:bg-primary-dark">
        <!-- component -->
        @livewire('layout.sidebar')
        <main class="flex flex-col w-full overflow-hidden transition-all duration-150 ease-in">

            @livewire('layout.navigation')

            <div class="w-full h-full px-2 py-4">
                {{ $slot }}
            </div>

            <x-core.footer/>
        </main>
    </div>
</body>

</html>
