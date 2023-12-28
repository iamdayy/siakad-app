@props(['value'])
<x-modal :value="'Create ' . $actName">
    <x-slot name="trigger">
        <span>
            <button
                class="p-1 py-3 mb-4 shadow-inner text-primary font-semibold text-lg bg-accent dark:bg-accent-dark hover:bg-primary dark:hover:bg-primary-dark hover:border-2 hover:border-accent hover:dark:border-accent-dark rounded-full w-full transition-colors ease-in-out">
                {{ __('Create') }}
            </button>
        </span>
    </x-slot>
    @livewire($actPath . '.create')
</x-modal>
