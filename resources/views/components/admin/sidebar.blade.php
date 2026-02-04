<aside class="w-72 bg-white border-r border-gray-200 flex flex-col h-full shadow-sm">
    <!-- Logo / Brand -->
    <div class="p-6 border-b border-gray-200">
        <div class="flex items-center gap-3">
            <div class="bg-indigo-600 text-white w-10 h-10 rounded-xl flex items-center justify-center font-bold text-xl">
                C
            </div>
            <div>
                <h1 class="text-xl font-bold text-gray-900">Caysie.today</h1>
                <p class="text-xs text-gray-500">Premium</p>
            </div>
        </div>
    </div>

    <!-- Navigation -->
    <nav class="flex-1 px-3 py-6 space-y-1">
        <x-admin.sidelink 
            href="{{ route('admin.dashboard.view') }}" 
            icon="home"
            :active="request()->routeIs('admin.dashboard.view')">
            Dashboard
        </x-admin.sidelink>

        <x-admin.sidelink 
            href="{{ route('admin.produk.view') }}" 
            icon="package"
            :active="request()->routeIs('admin.produk.view', 'admin.add_produk.view','admin.edit_produk.post' )">
            Produk
        </x-admin.sidelink>

        <x-admin.sidelink 
            href="{{ route('admin.kategori.view') }}" 
            icon="category"
            :active="request()->routeIs('admin.kategori.view', 'admin.add_kategori.view', 'admin.edit_kategori.view')">
            Kategori
        </x-admin.sidelink>
        <x-admin.sidelink 
            href="{{ route('user_management_view') }}" 
            icon="user"
            :active="request()->routeIs('user_management_view','user_management_add_view', 'user_management_edit_view')">
            User Management
        </x-admin.sidelink>
    </nav>

    <!-- User Profile (Bottom) -->
    <div class="p-4 border-t border-gray-200">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 rounded-full bg-gray-200 flex items-center justify-center text-gray-600 font-medium">
                M
            </div>
            <div class="flex-1 min-w-0">
                           @auth
                    <p class="text-sm font-medium text-gray-900 truncate">{{ Auth::user()->name ?? 'user' }}</p>
                    <p class="text-xs font-medium text-gray-500 truncate">{{ Auth::user()->email ?? 'user@gmail.com' }}</p>
                @else
                    <p class="text-sm font-medium text-gray-900 truncate">{{ Auth::user()->name ?? 'user' }}</p>
                @endauth
                {{-- <p class="text-sm font-medium text-gray-900 truncate">Mateusz Woźniak</p>
                <p class="text-xs text-gray-500 truncate">mateusz@widlab.co</p> --}}
            </div>
            <button class="text-gray-400 hover:text-gray-600">
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
            </button>
        </div>
    </div>
</aside>