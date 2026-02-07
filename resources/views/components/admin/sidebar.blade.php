<aside class="w-72 bg-white border-r border-gray-200 flex flex-col h-full shadow-sm">
    <!-- Logo / Brand -->
    <div class="p-6 border-b border-gray-200">
        <div class="flex items-center gap-3">
            <div
                class="bg-indigo-600 text-white w-10 h-10 rounded-xl flex items-center justify-center font-bold text-xl">
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
        <x-admin.sidelink href="{{ route('admin.dashboard.view') }}" icon="home" :active="request()->routeIs('admin.dashboard.view')">
            Dashboard
        </x-admin.sidelink>
        @if (Auth::user()->role === 'admin')
            <x-admin.sidelink href="{{ route('admin.produk.view') }}" icon="package" :active="request()->routeIs('admin.produk.view', 'admin.add_produk.view', 'admin.edit_produk.post')">
                Produk
            </x-admin.sidelink>

            <x-admin.sidelink href="{{ route('admin.kategori.view') }}" icon="category" :active="request()->routeIs('admin.kategori.view', 'admin.add_kategori.view', 'admin.edit_kategori.view')">
                Kategori
            </x-admin.sidelink>
            <x-admin.sidelink href="{{ route('user_management_view') }}" icon="user" :active="request()->routeIs(
                'user_management_view',
                'user_management_add_view',
                'user_management_edit_view',
            )">
                User Management
            </x-admin.sidelink>
        @endif
        <x-admin.sidelink href="{{ route('transaksi_index_view') }}" icon="transaksi" :active="request()->routeIs('transaksi_index_view', 'user_management_add_view', 'user_management_edit_view')">
            Penjualan
        </x-admin.sidelink>
    </nav>

    <!-- User Profile (Bottom) -->
    <div class="p-2 border-t border-gray-200 hover:bg-gray-100 hover:border-gray-300">
        <div class="flex items-center gap-3 hover:text-red-500 ">
            <div class="w-10 h-10 rounded-full  flex items-center justify-center  font-medium">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-log-out-icon lucide-log-out"><path d="m16 17 5-5-5-5"/><path d="M21 12H9"/><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/></svg>
            </div>
            <div class="flex-1 min-w-0">

                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <button class="w-full flex justify-start ">Log Out</button>
                </form>
                {{-- <p class="text-sm font-medium text-gray-900 truncate">Mateusz Woźniak</p>
                <p class="text-xs text-gray-500 truncate">mateusz@widlab.co</p> --}}
            </div>

        </div>
    </div>
</aside>
