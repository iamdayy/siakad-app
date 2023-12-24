<x-modal :value="$value->title ? $value->title : $value->username">
    <x-slot name="trigger">
        <span>
            <button
                class="p-1 text-secondary-dark dark:text-secondary hover:bg-white dark:hover:bg-slate-600 rounded-full">
                <x-mdi-pencil class="h-4 w-4" />
            </button>
        </span>
    </x-slot>
    <h1 class="text-2xl text-purple-700">{{ $value->title ? $value->title : $value->username }}</h1>
</x-modal>
