<header class="bg-white border-b border-gray-200 px-6 py-4 flex items-center justify-between shadow-sm">
    <div class="flex items-center gap-4">
        <h1 class="text-xl font-semibold text-gray-900">Dashboard</h1>
    </div>

    <div class="flex items-center gap-6">
        <!-- Date Picker / Filter -->
        <div class="flex items-center gap-2 text-sm text-gray-600">
            <span>{{ \Carbon\Carbon::now() }}</span>
            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
            </svg>
        </div>

        <!-- Notifications -->
        <button class="relative text-gray-500 hover:text-gray-700">
            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
            </svg>
            <span
                class="absolute -top-1 -right-1 bg-red-500 text-white text-xs rounded-full w-5 h-5 flex items-center justify-center">
                2
            </span>
        </button>

        <!-- User Menu -->
        <div class="flex items-center gap-3">
            <div
                class="w-8 h-8 rounded-full bg-indigo-100 text-indigo-600 flex items-center justify-center font-medium">
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
