<div class="mt-8 flex lg:flex-shrink-0 lg:mt-0">
    @foreach (config('livewire-datatables')['default_buttons'] as $button)
    @include('datatables::buttons.'.$button, ['value' => $model])
    @endforeach
</div>
