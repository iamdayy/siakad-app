@props(['classes'])


<footer
    class=" px-4 w-full min-h-1/8 bg-primary dark:bg-primary-dark @isset($classes)
    {{ $classes }}
@endisset">
    <div class="overflow-x-auto bg-accent dark:bg-accent-dark rounded-t-xl">
        @livewire('table.online-user')
    </div>
    <div class="flex items-center justify-center w-full max-w-screen-xl px-4 py-1 mx-auto">
        <span class="text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2023 Siakad™. Support by
            <a href="https://iamdayy.web.app" target="_blank" class="hover:underline">Iamdayy™</a>
        </span>
    </div>
</footer>
