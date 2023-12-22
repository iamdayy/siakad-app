@props(['active', 'isStart' => false, 'isEnd' => false])

@php
    if ($isEnd) {
        $round = ' rounded-e-lg';
    }
@endphp

@php
    if ($isStart) {
        $round = ' rounded-s-lg';
    }
@endphp

@php
    $classes = $active ?? false ? 'bg-white border-gray-200 border-s-0 dark:border-gray-700 rounded-e-lg hover:text-gray-700 hover:bg-gray-50 focus:ring-blue-300 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700' : 'text-gray-900 bg-gray-100 border-r border-gray-200 dark:border-gray-700 dark:bg-gray-700 dark:text-white active focus:ring-blue-300';
@endphp
<a
    {{ $attributes->merge(['class' => 'inline-block w-full p-4 focus:ring-2 focus:outline-none ' . $classes . $round]) }}>
    {{ $slot }}
</a>
