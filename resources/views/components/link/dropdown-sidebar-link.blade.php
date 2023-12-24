@props(['icon', 'title', 'route'])
@php
    $routeCurrent = Route::current()->getPrefix();
    $routeReplaced = str_replace('.','/', $route);
    $classes = ($routeCurrent === $routeReplaced) ? 'block' : 'hidden';
@endphp
<button type="button" class="flex flex-row items-center justify-between w-full h-10 px-px transition-all ease-out bg-transparent md:px-3 rounded-xl hover:bg-secondary-dark hover:dark:bg-secondary hover:text-white hover:dark:text-secondary-dark hover:scale-105" aria-controls="{{ $title . 'Dropdown' }}" data-collapse-toggle="{{ $title . 'Dropdown' }}">
    <div class="flex">
        @svg($icon, 'flex-shrink-0 w-6 h-6')
        <span class="hidden text-left ms-3 rtl:text-right whitespace-nowrap md:block md:flex-1">
            {{ $title }}
        </span>
    </div>
    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
       <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
    </svg>
</button>
<ul id="{{ $title . 'Dropdown' }}" class="{{'py-2 ml-1 md:ml-4 space-y-2 ' . $classes }}">
    {{ $slot }}
</ul>
