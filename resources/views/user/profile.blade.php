<x-template>

    <div class="min-h-screen bg-gray-50 py-12">

        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Header Profile -->
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden mb-10 border border-gray-100">
                <div class="h-48 bg-gradient-to-r from-indigo-600 to-indigo-800 relative">
                    <div class="absolute -bottom-16 left-7 w-32 h-32 rounded-full border-4 border-white overflow-hidden bg-gray-200 shadow-xl">
                        <!-- Foto profil (placeholder, ganti dengan Auth::user()->foto jika ada) -->
                        <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-4.0.3&auto=format&fit=crop&w=300&q=80" 
                             alt="Foto Profil" 
                             class="w-full h-full object-cover">
                    </div>
                </div>

                <div class="pt-20 pb-10 px-8 md:px-12">
                    <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-6">
                        <div>
                            <h1 class="text-4xl font-bold text-gray-900">{{ Auth::user()->name }}</h1>
                            <p class="text-lg text-gray-600 mt-1">{{ Auth::user()->email }}</p>
                            <p class="text-sm text-gray-500 mt-2">Bergabung sejak {{ Auth::user()->created_at->format('d F Y') }}</p>
                        </div>
                        <a href="{{ route('edit_view') }}" 
                           class="inline-flex items-center px-6 py-3 bg-indigo-600 text-white font-semibold rounded-xl hover:bg-indigo-700 transition-all shadow-md hover:shadow-lg transform hover:scale-[1.02]">
                            Edit Profil
                        </a>
                    </div>

                    <!-- Stats -->
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-6 mt-12">
                        <div class="text-center p-6 bg-gray-50 rounded-xl border border-gray-100">
                            <p class="text-3xl font-bold text-indigo-600">12</p>
                            <p class="text-sm text-gray-600 mt-1">Pesanan</p>
                        </div>
                        <div class="text-center p-6 bg-gray-50 rounded-xl border border-gray-100">
                            <p class="text-3xl font-bold text-indigo-600">8</p>
                            <p class="text-sm text-gray-600 mt-1">Selesai</p>
                        </div>
                        <div class="text-center p-6 bg-gray-50 rounded-xl border border-gray-100">
                            <p class="text-3xl font-bold text-indigo-600">Rp 2.850.000</p>
                            <p class="text-sm text-gray-600 mt-1">Total Belanja</p>
                        </div>
                        <div class="text-center p-6 bg-gray-50 rounded-xl border border-gray-100">
                            <p class="text-3xl font-bold text-indigo-600">4</p>
                            <p class="text-sm text-gray-600 mt-1">Wishlist</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Menu Tabs -->
            <div class="flex flex-wrap gap-4 mb-8 border-b border-gray-200 pb-4">
                <button class="px-6 py-3 font-semibold text-lg rounded-xl bg-indigo-600 text-white shadow-md">
                    Pesanan Saya
                </button>
                <button class="px-6 py-3 font-semibold text-lg rounded-xl text-gray-700 hover:bg-gray-100 transition-colors">
                    Wishlist
                </button>
                <button class="px-6 py-3 font-semibold text-lg rounded-xl text-gray-700 hover:bg-gray-100 transition-colors">
                    Pengaturan Akun
                </button>
            </div>

            <!-- Konten Pesanan (contoh placeholder, sesuaikan dengan data real) -->
            <div class="bg-white rounded-2xl shadow-lg p-8 border border-gray-100">
                <h2 class="text-2xl font-bold text-gray-900 mb-8">Pesanan Saya</h2>

                <!-- Jika belum ada pesanan -->
                <div class="text-center py-16">
                    <svg class="mx-auto w-20 h-20 text-gray-300 mb-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63 .63-.184 1.707 .707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                    </svg>
                    <h3 class="text-xl font-semibold text-gray-900 mb-3">Belum ada pesanan</h3>
                    <p class="text-gray-600 mb-8">Mulai belanja sekarang dan lacak pesanan Anda di sini</p>
                    <a href="#" class="inline-flex items-center px-8 py-4 bg-indigo-600 text-white font-semibold rounded-xl hover:bg-indigo-700 transition-all shadow-md">
                        Mulai Belanja
                    </a>
                </div>

                <!-- Jika ada pesanan (contoh placeholder) -->
                <!-- 
                <div class="space-y-6">
                    <div class="border border-gray-200 rounded-xl p-6 hover:shadow-md transition-shadow">
                        <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-6">
                            <div>
                                <p class="text-sm text-gray-500">Pesanan #12345678 • 15 Jan 2026</p>
                                <p class="text-lg font-semibold text-gray-900 mt-1">Rp 1.250.000</p>
                            </div>
                            <span class="px-5 py-2 bg-green-100 text-green-700 rounded-full text-sm font-medium">Selesai</span>
                        </div>
                        <div class="mt-6 pt-6 border-t border-gray-100">
                            <a href="#" class="text-indigo-600 hover:text-indigo-800 font-medium flex items-center gap-2">
                                Lihat Detail Pesanan
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                    ... (card pesanan lainnya)
                </div>
                -->
            </div>

        </div>
    </div>

</x-template>