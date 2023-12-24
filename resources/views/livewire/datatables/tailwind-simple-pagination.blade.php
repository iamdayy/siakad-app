<div class="flex justify-between">
<!-- Previous Page Link -->
@if ($paginator->onFirstPage())
<div class="w-32 flex justify-between items-center relative px-4 py-2 border border-gray-300 text-sm leading-5 font-medium rounded-md text-primary-dark dark:text-primary bg-secondary dark:bg-secondary-dark">
    <x-icons.arrow-left />
    {{ __('Previous')}}
</div>
@else
<button wire:click="previousPage" id="pagination-mobile-page-previous" class="w-32 flex justify-between items-center relative px-4 py-2 border border-gray-300 text-sm leading-5 font-medium rounded-md text-primary-dark dark:text-primary bg-secondary dark:bg-secondary-dark hover:text-secondary-dark hover:dark:text-secondary focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:bg-accent active:dark:bg-accent-dark active:text-primary transition ease-in-out duration-150">
    <x-icons.arrow-left />
    {{ __('Previous')}}
</button>
@endif


<!-- Next Page pnk -->
@if ($paginator->hasMorePages())
<button wire:click="nextPage" id="pagination-mobile-page-next" class="w-32 flex justify-between items-center relative items-center px-4 py-2 border border-gray-300 text-sm leading-5 font-medium rounded-md text-primary-dark dark:text-primary bg-secondary dark:bg-secondary-dark hover:text-secondary-dark hover:dark:text-secondary focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:bg-accent active:dark:bg-accent-dark active:text-primary transition ease-in-out duration-150">
    {{ __('Next')}}
    <x-icons.arrow-right />
</button>
@else
<div class="w-32 flex justify-between items-center relative px-4 py-2 border border-gray-300 text-sm leading-5 font-medium rounded-md text-primary-dark dark:text-primary bg-secondary dark:bg-secondary-dark">
    {{ __('Next')}}
    <x-icons.arrow-right class="inline" />
</div>
@endif
</div>
