<x-template>

    <div class="min-h-screen bg-gray-50 py-12">

        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Header Profile -->
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden mb-10 border border-gray-100">
                    <div class="h-48 bg-gradient-to-r from-indigo-600 to-indigo-800 relative">
                        <div class="h-48 bg-gradient-to-r from-indigo-600 to-indigo-800 relative">
                            <!-- Foto Profil (Inisial Nama) -->
                            <div class="absolute -bottom-16 left-8 w-32 h-32 rounded-full border-4 border-white overflow-hidden bg-gradient-to-br from-indigo-500 to-indigo-700 shadow-2xl flex items-center justify-center">
                                <span class="text-5xl font-bold text-white">
                                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                                </span>
                            </div>
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
                        <div class="grid grid-cols-2 md:grid-cols-3 gap-6 mt-12 mx-auto ">
                            <div class="text-center p-6 bg-gray-50 rounded-xl border border-gray-100">
                                <p class="text-3xl font-bold text-indigo-600">{{Auth::user()->pesanan->pluck("total_barang")->sum()}}</p>
                                <p class="text-sm text-gray-600 mt-1">Pesanan</p>
                            </div>
                            <div class="text-center p-6 bg-gray-50 rounded-xl border border-gray-100">
                                <p class="text-3xl font-bold text-indigo-600">{{Auth::user()->pesanan->where("status",4)->pluck("total_barang")->sum()}}</p>
                                <p class="text-sm text-gray-600 mt-1">Selesai</p>
                            </div>
                            <div class="text-center p-6 bg-gray-50 rounded-xl border border-gray-100">
                                <p class="text-3xl font-bold text-indigo-600">{{Auth::user()->pesanan->where("status",4)->pluck("total_harga")->sum()}}</p>
                                <p class="text-sm text-gray-600 mt-1">Total Belanja</p>
                            </div>

                        </div>
                    </div>
            </div>

  

        </div>
    </div>

</x-template>