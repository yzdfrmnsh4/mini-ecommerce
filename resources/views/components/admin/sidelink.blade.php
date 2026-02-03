@props([
    'href' => '',
    'active' => null,
])

@php

    $isActive = request()->fullUrlIs($active) || request()->fullUrlIs($href) ? true : false;
@endphp
<div class="flex flex-col">
    <a href="{{ $href }}"
        class="p-4 text-lg font-semibold hover:bg-slate-600
       {{ $isActive ? 'bg-slate-600 border-l-4 border-l-cyan-500' : '' }}">
        {{ $slot }}
    </a>
</div>
