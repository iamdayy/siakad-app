@props(['actions', 'model', 'path'])
<div class="mt-8 flex justify-end lg:flex-shrink-0 lg:mt-0">
    @foreach ($actions as $button)
    @include('components.buttons.'.$button, ['value' => $model, 'path' =>  $path])
    @endforeach
</div>
