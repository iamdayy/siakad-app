
<x-modal :value="$value->title || $value->username">
    <x-slot name="trigger">
        <span>
            <button class="p-1 text-secondary-dark dark:text-secondary hover:bg-white dark:hover:bg-slate-600 rounded-full">
                <x-mdi-eye class="h-4 w-4" />
            </button>
        </span>
    </x-slot>
    @livewire($path . '.show')
</x-modal>
