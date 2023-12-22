<?php

use App\Models\User;
use App\Models\Admin;
use App\Models\Profile;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;
use App\Models\Level;

new #[Layout('layouts.guest')] class extends Component {
    public string $username = '';
    public string $email = '';
    public int $level_id;
    public $profile;
    public string $password = '';
    public string $password_confirmation = '';
    public $levels;

    public function mount()
    {
        $this->levels = Level::all();
    }

    /**
     * Handle an incoming registration request.
     */
    public function register(): void
    {
        $validated = $this->validate([
            'username' => ['required', 'string', 'max:255', 'unique:users,username'],
            'level_id' => ['required', 'exists:levels,id'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
        ]);
        $validated['password'] = Hash::make($validated['password']);

        $profile;

        switch ($this->level_id) {
            case 1:
                $profile = Admin::where(['token' => $this->profile])->first();
                break;

            default:
                break;
        }
        if (!$profile) {
            return;
        }
        // dd($profile);
        event(new Registered(($user = User::create($validated))));
        $profile->user()->save($user);
        Auth::login($user);

        $this->redirect(RouteServiceProvider::HOME, navigate: true);
    }
}; ?>

<div>
    <form wire:submit="register">
        <!-- Name -->
        <div>
            <x-input-label for="username" :value="__('Username')" />
            <x-text-input wire:model="username" id="username" class="block w-full mt-1" type="text" name="username" required
                autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('username')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input wire:model="email" id="email" class="block w-full mt-1" type="email" name="email"
                required autocomplete="email" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Level -->
        <div class="mt-4">
            <x-input-label for="level_id" :value="__('Level')" />
            <x-core.select wire:model="level_id" id="level_id"
                class="block w-full mt-1" name="level_id" required autocomplete="level_id">
                <option value="{{ null }}">
                    {{ __('Clear') }}
                </option>
                @forelse ($levels as $level)
                    <option value="{{ $level->id }}">
                        {{ $level->title }}
                    </option>
                @empty
                    {{ __('No items found. Try to broaden your search.') }}
                @endforelse
            </x-core.select>
            <x-input-error :messages="$errors->get('level_id')" class="mt-2" />
        </div>

        <!-- Level -->
        <div class="mt-4">
            <x-input-label for="profile" :value="__('NIM/NIDN/CODE')" />
            <x-text-input wire:model="profile" id="profile" class="block w-full mt-1" type="text" name="profile"
                required autocomplete="profile" />
            <x-input-error :messages="$errors->get('profile')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input wire:model="password" id="password" class="block w-full mt-1" type="password" name="password"
                required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input wire:model="password_confirmation" id="password_confirmation" class="block w-full mt-1"
                type="password" name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="text-sm text-gray-600 underline rounded-md dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                href="{{ route('login') }}" wire:navigate>
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</div>
