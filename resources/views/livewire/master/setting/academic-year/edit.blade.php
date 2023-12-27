<?php

use App\Livewire\Forms\AcademicYearForm;
use Livewire\Volt\Component;

new class extends Component {
    public AcademicYearForm $form;

    public function save()
    {
        $this->form->edit();
    }
    public function mount()
    {
        $this->form->mountData();
    }
}; ?>

<div>
    <form wire:submit='save'>
        <div class="mt-4">
            <x-input-label for="code" value="{{ __('Code') }}" />
            <x-text-input id="code" class="block w-full mt-1" type="text" name="code" :value="old('code')"
                wire:model='form.code' />
            <x-input-error for="code" class="mt-2" />
        </div>
        <div class="mt-4">
            <x-input-label for="title" value="{{ __('Title') }}" />
            <x-text-input id="title" class="block w-full mt-1" type="text" name="title" :value="old('title')"
                wire:model='form.title' />
            <x-input-error for="title" class="mt-2" />
        </div>
        <div class="mt-4">
            <x-input-label for="semester" value="{{ __('Semester') }}" />
            <x-text-input id="semester" class="block w-full mt-1 [appearance:textfield] [&::-webkit-outer-spin-button]:appearance-none [&::-webkit-inner-spin-button]:appearance-none" type="text" name="semester" :value="old('semester')"
                wire:model='form.semester' />
            <x-input-error for="semester" class="mt-2" />
        </div>
        <div class="mt-4">
            <label class="relative inline-flex items-center mb-5 cursor-pointer">
                <input type="checkbox" class="sr-only peer" wire:model='status'>
                <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:w-5 after:h-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                <span class="text-sm font-medium text-gray-900 ms-3 dark:text-gray-300">Active</span>
              </label>
        </div>
        <div class="mt-4 flex items-center justify-center w-full text-center">
            <x-secondary-button wire:click="$set('modal', false)" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-secondary-button>

            <x-primary-button class="ms-3" wire:loading.attr="disabled">
                {{ __('Save') }}
            </x-primary-button>
        </div>
    </form>
</div>
