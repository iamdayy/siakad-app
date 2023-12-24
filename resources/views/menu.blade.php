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

    <!-- Styles -->
    @livewireStyles
</head>

<body class="font-sans antialiased">


    <div class="bg-gray-100 dark:bg-gray-900">
        <div class="relative w-full min-h-screen py-12 overflow-hidden shadow-sm rounded-3xl md:py-24 bg-primary dark:bg-primary-dark shadow-black">
            <div class="absolute top-0 w-full p-2 h-1/8 bg-accent dark:bg-accent-dark">
                <div class="flex justify-center w-full">
                    <h1 class="text-3xl font-bold tracking-widest text-center text-white md:text-4xl">Selamat Datang Di {{ config('app.name') }}
                    </h1>
                </div>
                {{-- @livewire('navigation-menu') --}}
            </div>

            <div class="flex flex-wrap w-full p-2 gap-x-2 sm:p-4">
                @forelse ($menus as $menu)
                <x-card.menu :data="$menu" />
                @empty
                @endforelse
            </div>
            <x-core.footer classes="absolute bottom-0" />
        </div>
    </div>
    {{-- @stack('modals') --}}

    @livewireScripts
</body>

</html>

