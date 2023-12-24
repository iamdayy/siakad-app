<div class="flex overflow-hidden rounded-lg pagination">
    <!-- Previous Page Link -->
    @if ($paginator->onFirstPage())
        <button
            class="relative inline-flex items-center px-2 py-2 text-sm font-medium leading-5 text-primary-dark dark:text-primary bg-secondary dark:bg-secondary-dark"
            disabled>
            <span>&laquo;</span>
        </button>
    @else
        <button wire:click="previousPage" id="pagination-desktop-page-previous"
            class="relative inline-flex items-center px-2 py-2 text-sm font-medium leading-5 transition duration-150 ease-in-out text-primary-dark dark:text-primary bg-secondary dark:bg-secondary-dark hover:text-accent focus:z-10 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-accent active:dark:bg-accent-dark active:text-primary">
            <span>&laquo;</span>
        </button>
    @endif

    <div>
        @foreach ($elements as $element)
            @if (is_string($element))
                <button
                    class="relative inline-flex items-center px-2 py-2 -ml-px text-sm font-medium leading-5 text-primary-dark dark:text-primary bg-secondary dark:bg-secondary-dark"
                    disabled>
                    <span>{{ $element }}</span>
                </button>
            @endif

            <!-- Array Of Links -->

            @if (is_array($element))
                @foreach ($element as $page => $url)
                    <button wire:click="gotoPage({{ $page }})" id="pagination-desktop-page-{{ $page }}"
                        class="relative inline-flex items-center px-4 py-2 text-sm leading-5 font-medium hover:text-secondary-dark hover:dark:text-secondary focus:z-10 focus:outline-none  active:bg-accent active:dark:bg-accent-dark active:text-primary transition ease-in-out duration-150 {{ $page === $paginator->currentPage() ? 'bg-accent dark:bg-accent-dark text-primary' : 'bg-secondary dark:bg-secondary-dark text-primary-dark dark:text-primary' }}">
                        {{ $page }}
                    </button>
                @endforeach
            @endif
        @endforeach
    </div>

    <!-- Next Page Link -->
    @if ($paginator->hasMorePages())
        <button wire:click="nextPage" id="pagination-desktop-page-next"
            class="relative inline-flex items-center px-2 py-2 -ml-px text-sm font-medium leading-5 text-primary-dark dark:text-primary  transition duration-150 ease-in-out bg-red hover:text-secondary-dark hover:dark:text-secondary focus:z-10 focus:outline-none active:bg-accent active:text-primary">
            <span>&raquo;</span>
        </button>
    @else
        <button
            class="relative inline-flex items-center px-2 py-2 -ml-px text-sm font-medium leading-5 text-primary-dark dark:text-primary bg-secondary dark:bg-secondary-dark "
            disabled><span>&raquo;</span></button>
    @endif
</div>
