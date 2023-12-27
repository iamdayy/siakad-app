<?php

use Livewire\Volt\Component;
use App\Livewire\Forms\CampussProfileForm;

new class extends Component {
    public CampussProfileForm $form;

    public function save()
    {
        $this->form->save();
    }

    public function mount()
    {
        $this->form->mountData();
    }
}; ?>

<section class="bg-white dark:bg-gray-900">
    <div class="px-4 py-8 lg:py-16">
        <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">
            {{ __('Campus Profile') }}
        </h2>
        <form wire:submit='save'>
            <div class="grid gap-4 mb-4 sm:grid-cols-2 sm:gap-6 sm:mb-5">
                <div class="sm:col-span-2">
                    <x-input-label for="code" value="{{ __('Code') }}" />
                    <x-text-input id="code"
                        class="block w-full mt-1"
                        type="text" name="code" :value="old('code')" wire:model='form.app_code' />
                    <x-input-error for="code" class="mt-2" />
                </div>
                <div class="sm:col-span-2">
                    <x-input-label for="title" value="{{ __('Title') }}" />
                    <x-text-input id="title" class="block w-full mt-1" type="text" name="title" :value="old('title')"
                        wire:model='form.app_title' />
                    <x-input-error for="title" class="mt-2" />
                </div>
                <div class="sm:col-span-2">
                    <x-input-label for="name" value="{{ __('Name') }}" />
                    <x-text-input id="name" class="block w-full mt-1" type="text" name="name" :value="old('name')"
                        wire:model='form.app_name' />
                    <x-input-error for="name" class="mt-2" />
                </div>
                <div class="sm:col-span-2">
                    <x-input-label for="no_sk" value="{{ __('No. SK') }}" />
                    <x-text-input id="no_sk" class="block w-full mt-1" type="text" name="no_sk" :value="old('no_sk')"
                        wire:model='form.no_sk' />
                    <x-input-error for="no_sk" class="mt-2" />
                </div>
                <div class="sm:col-span-2">
                    <x-input-label for="address" value="{{ __('Address') }}" />
                    <x-core.textarea-input id="address" class="block w-full mt-1" type="text" name="address" :value="old('address')"
                        wire:model='form.address' />
                    <x-input-error for="address" class="mt-2" />
                </div>
                <div class="w-full">
                    <x-input-label for="phone" value="{{ __('Phone') }}" />
                    <x-text-input id="phone"
                        class="block w-full mt-1 [appearance:textfield] [&::-webkit-outer-spin-button]:appearance-none [&::-webkit-inner-spin-button]:appearance-none"
                        type="number" name="phone" :value="old('phone')" wire:model='form.phone' />
                    <x-input-error for="phone" class="mt-2" />
                </div>
                <div class="w-full">
                    <x-input-label for="city" value="{{ __('City') }}" />
                    <x-core.select id="city" class="block w-full mt-1" name="city" :value="old('city')"
                        wire:model='form.city'>

                        <option value="{{ null }}">
                            No data
                        </option>
                        {{-- @forelse ($prodies as $prody)
                        <option value="{{ $prody->id }}">
                            {{ $prody->title }}
                        </option>

                        @empty
                        <option disabled>
                            No data
                        </option>
                        @endforelse --}}
                    </x-core.select>
                    <x-input-error for="city" class="mt-2" />
                </div>
                <div class="w-full">
                    <x-input-label for="email" value="{{ __('Email') }}" />
                    <x-text-input id="email" class="block w-full mt-1" type="email" name="email" :value="old('email')"
                        wire:model='form.email' />
                    <x-input-error for="email" class="mt-2" />
                </div>
                <div class="w-full">
                    <x-input-label for="website" value="{{ __('Website') }}" />
                    <x-text-input id="website" class="block w-full mt-1" type="url" name="website" :value="old('website')"
                        wire:model='form.app_url' />
                    <x-input-error for="website" class="mt-2" />
                </div>
                <div class="w-full">
                    <x-input-label for="rector_nidn" value="{{ __('Rector NIDN') }}" />
                    <x-text-input id="rector_nidn"
                        class="block w-full mt-1 [appearance:textfield] [&::-webkit-outer-spin-button]:appearance-none [&::-webkit-inner-spin-button]:appearance-none"
                        type="number" name="rector_nidn" :value="old('rector_nidn')" wire:model='form.rector_nidn' />
                    <x-input-error for="rector_nidn" class="mt-2" />
                </div>
                <div class="w-full">
                    <x-input-label for="rector_name" value="{{ __('Rector Name') }}" />
                    <x-text-input id="rector_name" class="block w-full mt-1" type="text" name="rector_name"
                        :value="old('rector_name')" wire:model='form.rector_name' />
                    <x-input-error for="rector_name" class="mt-2" />
                </div>
                <div class="sm:col-span-2">
                    <x-input-label for="logo" value="{{ __('Logo') }}" />
                    <div x-data="{ logoName: null, logoPreview: null }" class="flex items-center justify-between">
                        <!-- Profile logo File Input -->
                        <input type="file" id="logo" class="hidden" wire:model.live="form.logo" x-ref="logo"
                            x-on:change="
                                            iconName = $refs.logo.files[0].name;
                                            const reader = new FileReader();
                                            reader.onload = (e) => {
                                                logoPreview = e.target.result;
                                            };
                                            reader.readAsDataURL($refs.logo.files[0]);
                                    " />
                        <!-- New logo -->
                        <x-secondary-button class="mt-2" type="button" x-on:click.prevent="$refs.logo.click()">
                            {{ __('Select A logo file') }}
                        </x-secondary-button>
                        <!-- Current  logo -->
                        <div class="mt-2" x-show="! logoPreview">
                            <img src="{{ asset('storage/asset/' . $form->logo) }}" alt="Logo"
                                class="object-cover w-20 h-20">
                        </div>
                        <div class="mt-2" x-show="logoPreview" style="display: none;">
                            <span class="block w-20 h-20 bg-center bg-no-repeat bg-cover rounded-full"
                                x-bind:style="'background-image: url(\'' + logoPreview + '\');'">
                            </span>
                        </div>
                        <x-input-error for="logo" class="mt-2" />
                    </div>
                </div>
                <div class="sm:col-span-2">
                    <x-input-label for="favicon" value="{{ __('Favicon') }}" />
                    <div x-data="{ faviconName: null, faviconPreview: null }" class="flex items-center justify-between">
                        <!-- Profile favicon File Input -->
                        <input type="file" id="favicon" class="hidden" wire:model.live="form.favicon"
                            x-ref="favicon"
                            x-on:change="
                                            iconName = $refs.favicon.files[0].name;
                                            const reader = new FileReader();
                                            reader.onload = (e) => {
                                                faviconPreview = e.target.result;
                                            };
                                            reader.readAsDataURL($refs.favicon.files[0]);
                                    " />
                        <!-- New favicon Preview -->
                        <x-secondary-button class="mt-2" type="button" x-on:click.prevent="$refs.favicon.click()">
                            {{ __('Select A favicon file') }}
                        </x-secondary-button>
                        <!-- Current  favicon -->
                        <div class="mt-2" x-show="! faviconPreview">
                            <img src="{{ asset('storage/asset/' . $form->favicon) }}" alt="favicon"
                                class="object-cover w-20 h-20">
                        </div>
                        <div class="mt-2" x-show="faviconPreview" style="display: none;">
                            <span class="block w-20 h-20 bg-center bg-no-repeat bg-cover rounded-full"
                                x-bind:style="'background-image: url(\'' + faviconPreview + '\');'">
                            </span>
                        </div>
                        <x-input-error for="favicon" class="mt-2" />
                    </div>
                </div>
                <div class="sm:col-span-2">
                    <x-input-label for="loginBackground" value="{{ __('Login Background') }}" />
                    <div x-data="{ loginBackgroundName: null, loginBackgroundPreview: null }" class="flex items-center justify-between">
                        <!-- Profile login background File Input -->
                        <input type="file" id="loginBackground" class="hidden" wire:model.live="form.login_background"
                            x-ref="loginBackground"
                            x-on:change="
                                            iconName = $refs.loginBackground.files[0].name;
                                            const reader = new FileReader();
                                            reader.onload = (e) => {
                                                loginBackgroundPreview = e.target.result;
                                            };
                                            reader.readAsDataURL($refs.loginBackground.files[0]);
                                    " />
                        <!-- New login background Preview -->
                        <x-secondary-button class="mt-2" type="button"
                            x-on:click.prevent="$refs.loginBackground.click()">
                            {{ __('Select A login background file') }}
                        </x-secondary-button>
                        <!-- Current  login background -->
                        <div class="mt-2" x-show="! loginBackgroundPreview">
                            <img src="{{ asset('storage/asset/' . $form->login_background) }}" alt="login background"
                                class="object-cover w-20 h-20">
                        </div>
                        <div class="mt-2" x-show="loginBackgroundPreview" style="display: none;">
                            <span class="block w-20 h-20 bg-center bg-no-repeat bg-cover rounded-full"
                                x-bind:style="'background-image: url(\'' + loginBackgroundPreview + '\');'">
                            </span>
                        </div>
                        <x-input-error for="loginBackground" class="mt-2" />
                    </div>
                </div>
            </div>
            <div class="flex items-center space-x-4">
                <x-primary-button class="ms-3" wire:loading.attr="disabled">
                    @svg('heroicon-o-bookmark', 'h-4 w-4 text-secondary dark:text-secondary-dark mr-2')
                    {{ __('Save') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</section>
