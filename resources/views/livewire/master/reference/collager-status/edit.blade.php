<?php
use App\Livewire\Forms\CollagerStatusForm;
use Livewire\Volt\Component;

new class extends Component {

    public CollagerStatusForm $form;

    public int $id;

    public function update()
    {
        $this->form->edit();
    }

    public function mount() {
        $this->form->mountData($this->id);
    }
};
?>

<div>
    <form wire:submit='update'>
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

