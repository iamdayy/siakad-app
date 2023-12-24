<?php

use Livewire\Volt\Component;
use App\Models\User;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

new class extends Component
{
    use WithPagination;

    public $users;
    public $usersCount;

    public $visible = false;
    public $visibleIcon = 'heroicon-s-eye';
    public function visiblity() {
        $this->visible = !$this->visible;
        if ($this->visible == false) {
            $this->visibleIcon = 'heroicon-s-eye';
        } else {
            $this->visibleIcon = 'heroicon-s-eye-slash';
        }
    }

    public function mount()
    {
        $this->usersCount = DB::table(config('session.table'))->count();
        $this->users = DB::table(config('session.table'))
        ->distinct()
        ->select(['users.id', 'users.username', 'users.email'])
        ->whereNotNull('user_id')
        ->leftJoin('users', config('session.table') . '.user_id', '=', 'users.id')
        ->get();
    }
}
?>

<div>
    <div class="flex justify-between w-full p-2 px-2 text-white bg-emerald-600">
        <div class="flex gap-2">
            <h1 class="text-base font-semibold">Online users</h1>
            <button wire:click="visiblity">
                @svg($visibleIcon, 'w-6 h-6 fill-white')
            </button>

        </label>
        </div>
        <div>
            <h1>
                {{ $usersCount }}
            </h1>
        </div>
    </div>
    @if ($visible)
    <table class="w-full text-sm text-left text-gray-500 transition-all rtl:text-right dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-600 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-2 py-1">
                    Username
                </th>
                <th scope="col" class="px-2 py-1">
                    Email
                </th>
                {{-- <th scope="col" class="px-2 py-1">
                    Role
                </th> --}}
                <th scope="col" class="px-2 py-1">
                </th>
            </tr>
        </thead>
        <tbody wire:poll.15s>
            @forelse ($users as $user)
            <tr
                class="odd:bg-gray-200 odd:dark:bg-gray-900 even:bg-gray-100 even:dark:bg-gray-800">
                <th scope="row"
                    class="px-2 py-1 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $user->username }}
                </th>
                <td class="px-2 py-1">
                    {{ $user->email }}
                </td>
                {{-- <td class="px-2 py-1">
                    {{ $user->level_id }}
                </td> --}}
                <td class="px-2 py-1">
                    <svg viewBox="0 0 200 200" class="w-2 h-2 fill-green-300 animate-ping">
                        <path
                              d="
                                 M 100, 100
                                 m -75, 0
                                 a 75,75 0 1,0 150,0
                                 a 75,75 0 1,0 -150,0
                                 "
                              />
                    </svg>
                </td>
            </tr>

            @empty

            @endforelse
        </tbody>
    </table>
    {{-- {{ $users->links() }} --}}
    @endif
</div>
