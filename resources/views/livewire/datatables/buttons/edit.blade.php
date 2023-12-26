<x-modal :value="'Edit ' . $value->title ? $value->title : $value->username">
    <x-slot name="trigger">
        <span>
            <button
                class="p-1 text-secondary-dark dark:text-secondary hover:bg-white dark:hover:bg-slate-600 rounded-full">
                <x-mdi-pencil class="h-4 w-4" />
            </button>
        </span>
    </x-slot>
    @livewire( $path . '.edit', ['id' => $value->id])
</x-modal>
