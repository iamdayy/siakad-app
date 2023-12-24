@props(['active', 'route', 'icon'])

@php
$classes = ($active ?? true)
            ? 'bg-gradient-to-l from-accent-dark to-accent text-white'
            : 'bg-transparent hover:bg-secondary-dark hover:dark:bg-secondary hover:text-white hover:dark:text-secondary-dark hover:scale-105';
// dd($classes)
@endphp
<a href="{{ route($route) }}"
    class="{{ $classes . ' flex flex-row items-center h-10 px-px md:px-3 rounded-xl transition-all ease-out'}}">
    <span class="flex items-center justify-center w-full text-lg md:w-fit">
        @svg($icon, 'w-6 h-6')
    </span>
    <span class="hidden ml-3 md:flex">
        {{ $slot }}
    </span>
</a>
