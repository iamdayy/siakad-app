<div class="mx-2 mb-4">
    <ul
        class="flex text-sm font-medium text-center text-gray-500 rounded-lg shadow dark:divide-gray-700 dark:text-gray-400">
        <li class="w-full">
            <x-core.tab-link href="{{ url('/login') }}" active="{{ request()->routeIs('login') }}" isStart wire:navigate>Login</x-core.tab-link>
        </li>
        <li class="w-full">
            <x-core.tab-link href="{{ url('/register') }}" active="{{ request()->routeIs('register') }}" isEnd wire:navigate>Register</x-core.tab-link>
        </li>
    </ul>

</div>
