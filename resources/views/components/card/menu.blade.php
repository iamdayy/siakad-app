@props(['data'])
@php
    // dd($data)
@endphp
<a href="{{ route($data->to) }}" class="w-full md:w-1/3 lg:w-1/4 xl:w-1/5">
    <div class="flex flex-row items-center justify-between gap-2 p-4 transition-all ease-in delay-75 shadow-sm cursor-pointer group bg-gradient-to-r from-accent to-accent-dark rounded-2xl shadow-black hover:shadow-md hover:scale-95 hover:sm:scale-105 hover:bg-gradient-to-l">
      <div>
        <div class="text-md text-emerald-300">{{ $data->description }}</div>
        <div class="text-4xl font-bold text-emerald-100">{{ $data->title }}</div>
      </div>
      <div class="p-2 text-white transition-all ease-in delay-75 rounded-full bg-gradient-to-l from-accent to-accent-dark group-hover:bg-gradient-to-r">
        <img src="{{ asset('/storage/icon/' . $data->icon) }}" alt="{{ $data->title }}" class="object-contain w-12 h-12">
        {{-- @svg($data->icon, 'h-12 w-12 fill-white') --}}
      </div>
    </div>
</a>
