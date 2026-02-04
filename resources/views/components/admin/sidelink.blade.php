@props([
    'href' => '',
    'icon' => '',
    'active' => false,
])

<a href="{{ $href }}"
   class="group flex items-center gap-3 px-4 py-3 text-sm font-medium rounded-lg transition-colors
          {{ $active ? 'bg-indigo-50 text-indigo-700' : 'text-gray-600 hover:bg-gray-100' }}">
    <!-- Icon (gunakan lucide-react icons atau heroicons) -->
    <svg class="w-5 h-5 {{ $active ? 'text-indigo-600' : 'text-gray-500 group-hover:text-gray-700' }}" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        @if($icon === 'home')
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
        @elseif($icon === 'package')
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
        @elseif($icon === 'category')
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chart-bar-stacked-icon lucide-chart-bar-stacked"><path d="M11 13v4"/><path d="M15 5v4"/><path d="M3 3v16a2 2 0 0 0 2 2h16"/><rect x="7" y="13" width="9" height="4" rx="1"/><rect x="7" y="5" width="12" height="4" rx="1"/></svg>        @elseif($icon === 'layers')
        @elseif($icon === 'user')
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-users-icon lucide-users"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><path d="M16 3.128a4 4 0 0 1 0 7.744"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><circle cx="9" cy="7" r="4"/></svg>
        @endif
    </svg>
    <span>{{ $slot }}</span>
</a>
