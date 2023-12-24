<?php
use App\Models\Route;
use Livewire\Volt\Component;
use App\Models\Menu;

new class extends Component
{
    public string $appName;
    public $routes;
    public string $title;
    /**
     * Log the current user out of the application.
     */
    public function mount()
    {
        $this->appName = env('APP_NAME');
        $route = strtok(Request::route()->getName(), '.');
        $this->title = $route;
        $this->routes = Menu::where('title', 'LIKE', $route)->first()->routes()->where(['parent_id' => null])->get();
    }
}; ?>
    <aside
        class="w-14 m-0 md:m-4 z-10 text-gray-800 rounded-none min-h-screen transition-transform duration-150 ease-in transform shadow-md md:w-64 md:rounded-xl md:translate-x-0 bg-secondary dark:bg-secondary-dark dark:text-gray-100">
        <div class="flex items-center justify-center py-4 sidebar-header">
            <div class="inline-flex">
                <a href="#" class="inline-flex flex-row items-center">
                    {{-- @if ($profile->logo)
                        <img src="{{ asset('storage/asset/' . $profile->logo) }}" class="object-contain w-12 h-12"
                            alt="">
                    @endif --}}
                    <span class="hidden ml-1 text-xl font-bold leading-10 uppercase md:flex">
                        {{ $appName }}
                    </span>
                </a>
            </div>
        </div>
        <hr
            class="w-full h-px mx-auto border-0 bg-gradient-to-r from-transparent via-accent dark:via-accent-dark to-transparent">
        <div class="px-4 py-6 sidebar-content">
            <ul class="flex flex-col w-full gap-y-2">
                @if (url()->previous())
                    <li class="my-px">
                        <x-link.sidebar-link :active="false" route="home"
                            icon="heroicon-s-chevron-left">Back</x-link.sidebar-link>
                    </li>
                @endif
                <li class="hidden my-px md:block">
                    <span class="flex px-4 my-4 text-sm font-medium uppercase">
                        {{ $title }}
                    </span>
                </li>
                @forelse ($routes as $route)
                    @if (!$route->childerns()->get()->isEmpty())
                        <x-link.dropdown-sidebar-link icon="{{ $route->icon }}" title="{{ $route->title }}"
                            route="{{ $route->route }}">
                            @forelse ($route->childerns()->get() as $child_route)
                                @if (!$child_route->childerns()->get()->isEmpty())
                                    <x-link.dropdown-sidebar-link icon="{{ $child_route->icon }}"
                                        title="{{ $child_route->title }}" route="{{ $child_route->route }}">
                                        @forelse ($child_route->childerns()->get() as $childern_route)
                                            <x-link.sidebar-link :active="request()->routeIs($childern_route->route)" route="{{ $childern_route->route }}"
                                                icon="{{ $childern_route->icon }}">{{ $childern_route->title }}</x-link.sidebar-link>
                                        @empty
                                        @endforelse
                                    </x-link.dropdown-sidebar-link>
                                @else
                                    <x-link.sidebar-link :active="request()->routeIs($child_route->route)" route="{{ $child_route->route }}"
                                        icon="{{ $child_route->icon }}">{{ $child_route->title }}</x-link.sidebar-link>
                                @endif
                            @empty
                            @endforelse
                        </x-link.dropdown-sidebar-link>
                    @else
                        <li class="my-px">
                            <x-link.sidebar-link :active="request()->routeIs($route->route)" route="{{ $route->route }}"
                                icon="{{ $route->icon }}">{{ $route->title }}</x-link.sidebar-link>
                        </li>
                    @endif

                @empty

                @endforelse
            </ul>
        </div>
    </aside>
