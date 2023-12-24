<div class="relative py-4 pt-1 overflow-x-auto text-sm text-left text-gray-900 shadow-sm rtl:text-right rounded-xl shadow-black bg-secondary dark:text-white dark:bg-secondary-dark">
    <table class="w-fit sm:w-full">
        <caption
            class="p-5 text-lg font-semibold text-left text-gray-900 rtl:text-right bg-secondary dark:text-white dark:bg-secondary-dark">
            {{ $header }}
        </caption>
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                {{ $head }}
            </tr>
        </thead>
        <tbody wire:poll>
            {{ $body }}
        </tbody>
    </table>

    @isset($paginate)
        {{ $paginate }}
    @endisset
</div>
