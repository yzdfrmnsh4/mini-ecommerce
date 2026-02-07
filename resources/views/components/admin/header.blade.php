<header class="bg-white border-b border-gray-200 px-6 py-4 flex items-center justify-between shadow-sm">
    <div class="flex items-center gap-4">
        <h1 class="text-xl font-semibold text-gray-900">Dashboard</h1>
    </div>

    <div class="flex items-center gap-6">
        <!-- Date Picker / Filter -->
        <div class="flex items-center gap-2 text-sm text-gray-600">
            <span>{{ now()->format('d M Y') }}</span>
            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
            </svg>
        </div>



        <!-- User Menu -->
        <div class="flex items-center gap-3">
            <div class="w-8 h-8 rounded-full bg-indigo-100 text-indigo-600 flex items-center justify-center font-medium">
                M
            </div>
            <div>
                @auth
                    <p class="text-sm font-medium text-gray-900">{{ Auth::user()->name }}</p>
                @else
                    <p class="text-sm font-medium text-gray-900">User</p>

                @endauth

            </div>
        </div>
    </div>
</header>