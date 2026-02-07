<x-admin.template-admin>
    <div class="space-y-8">


        <!-- Top Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Available to payout -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                <h3 class="text-sm font-medium text-gray-500 uppercase tracking-wide">Jumlah Produk</h3>
                <p class="text-3xl font-bold text-gray-900 mt-2">{{ $total_produk }}</p>
                <p class="text-sm text-gray-500 mt-1">
                    Payout • $2.6K will be available soon
                </p>
            </div>

            <!-- Today revenue -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                <h3 class="text-sm font-medium text-gray-500 uppercase tracking-wide">Jumlah User</h3>
                <div class="flex items-baseline gap-3 mt-2">
                    <p class="text-3xl font-bold text-indigo-600">{{ $total_user }}</p>
                </div>
                <p class="text-sm text-gray-500 mt-1">{{ $total_user }} • {{ $total_transaksi }} orders</p>
            </div>

            <!-- Today sessions -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                <h3 class="text-sm font-medium text-gray-500 uppercase tracking-wide">Total Transaksi</h3>
                <div class="flex items-baseline gap-3 mt-2">
                    <p class="text-3xl font-bold text-gray-900">{{ $total_transaksi }}</p>
                </div>
                <p class="text-sm text-gray-500 mt-1">2 visitors right now</p>
            </div>
        </div>

        <!-- Sales Funnel -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
            <div class="p-6 border-b border-gray-200">
                <h2 class="text-lg font-semibold text-gray-900">Sales Funnel</h2>
            </div>

            <div class="p-6">
                <div class="flex flex-col md:flex-row gap-8 items-center justify-between">
                    <!-- Funnel Visualization -->
                    <div class="w-full md:w-1/2">
                        <div class="relative h-80 flex items-center justify-center">
                            <div class="w-full max-w-md">
                                <!-- Simplified funnel bars -->
                                <div class="space-y-4 ">


                                    {{-- @dd($data) --}}

                                    @foreach ($data as $item)
                                        <div class="space-y-2">
                                            <div class="flex justify-between text-sm font-medium text-indigo-900">
                                                <span>{{ $item['nama'] }}</span>
                                                <span>{{ $item['persentase'] }}% ({{ $item['total'] }} Terjual)</span>
                                            </div>

                                            <div class="w-full bg-indigo-100 rounded-full h-4 overflow-hidden">
                                                <div class="h-4 bg-indigo-600 transition-all duration-500"
                                                    style="width: {{ $item['persentase'] }}%">
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    {{-- <div class="bg-indigo-200 rounded-lg p-4 text-indigo-800 font-medium ml-6">
                                        Product View <span class="float-right">4.7K</span>
                                    </div>
                                    <div class="bg-indigo-300 rounded-lg p-4 text-indigo-900 font-semibold ml-12">
                                        Add to Cart <span class="float-right">914</span>
                                    </div>
                                    <div class="bg-indigo-400 rounded-lg p-4 text-white font-semibold ml-20">
                                        Initiate Checkout <span class="float-right">872</span>
                                    </div>
                                    <div class="bg-indigo-600 rounded-lg p-4 text-white font-bold ml-28">
                                        Purchase <span class="float-right">463</span>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Funnel Stats -->
                    <div class="w-full md:w-1/2 space-y-6">
                        <div class="grid grid-cols-2 gap-6">
                            <div>
                                <p class="text-sm text-gray-500">Jumlah Transaksi </p>
                                <p class="text-2xl font-bold text-gray-900 mt-1">{{ $sukses }}%</p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500">Jumlah Transaksi yang gagal</p>
                                <p class="text-2xl font-bold text-red-600 mt-1">{{ $gagal }}%</p>
                            </div>
                        </div>

                        <div>
                            <p class="text-sm text-gray-500 mb-2">Kesimpulan</p>
                            <div
                                class=" {{ $sukses > $gagal ? 'bg-green-50 border border-green-200' : 'bg-red-50 border border-red-200' }} rounded-lg p-4">
                                <p class="text-sm text-green-800">
                                    <strong>Add to Cart</strong>
                                    {{ $sukses > $gagal ? 'jumlah transaksi yang berhasil lebih banyak maka tingkatkan lah!' : 'Perlu ada nya evaluasi secara berkala dikarena kan jumlah transaksi gagal lebih banyak' }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- <!-- Device & Audience -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- Device Breakdown -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
            <h3 class="text-lg font-semibold text-gray-900 mb-4">Device</h3>
            
            <div class="flex items-center justify-center h-64">
                <!-- Simple pie chart placeholder -->
                <div class="relative w-48 h-48">
                    <div class="absolute inset-0 rounded-full bg-indigo-500 flex items-center justify-center text-white font-bold">
                        Mobile
                    </div>
                    <div class="absolute inset-4 rounded-full bg-cyan-400 flex items-center justify-center text-white text-sm font-medium">
                        62%
                    </div>
                    <div class="absolute -bottom-2 left-1/2 -translate-x-1/2 bg-gray-200 px-3 py-1 rounded-full text-xs">
                        Desktop 35%
                    </div>
                    <div class="absolute -top-2 left-1/2 -translate-x-1/2 bg-gray-300 px-3 py-1 rounded-full text-xs">
                        Other 3%
                    </div>
                </div>
            </div>

            <div class="mt-6 grid grid-cols-3 gap-4 text-center text-sm">
                <div>
                    <p class="font-medium text-indigo-600">62%</p>
                    <p class="text-gray-500">Mobile</p>
                </div>
                <div>
                    <p class="font-medium text-cyan-600">35%</p>
                    <p class="text-gray-500">Desktop</p>
                </div>
                <div>
                    <p class="font-medium text-gray-500">3%</p>
                    <p class="text-gray-500">Other</p>
                </div>
            </div>
        </div>

        <!-- Audience Demographics -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
            <h3 class="text-lg font-semibold text-gray-900 mb-4">Audience</h3>

            <div class="space-y-5 mt-4">
                <div>
                    <div class="flex justify-between text-sm mb-1">
                        <span class="text-gray-600">18-24</span>
                        <span class="text-gray-500">10.3%</span>
                    </div>
                    <div class="h-2 bg-gray-200 rounded-full overflow-hidden">
                        <div class="h-full bg-indigo-500 rounded-full" style="width: 10.3%"></div>
                    </div>
                </div>

                <div>
                    <div class="flex justify-between text-sm mb-1">
                        <span class="text-gray-600">25-34</span>
                        <span class="text-gray-500">24.3%</span>
                    </div>
                    <div class="h-2 bg-gray-200 rounded-full overflow-hidden">
                        <div class="h-full bg-indigo-600 rounded-full" style="width: 24.3%"></div>
                    </div>
                </div>

                <div>
                    <div class="flex justify-between text-sm mb-1">
                        <span class="text-gray-600">35-44</span>
                        <span class="text-gray-500">19.9%</span>
                    </div>
                    <div class="h-2 bg-gray-200 rounded-full overflow-hidden">
                        <div class="h-full bg-indigo-500 rounded-full" style="width: 19.9%"></div>
                    </div>
                </div>

                <div>
                    <div class="flex justify-between text-sm mb-1">
                        <span class="text-gray-600">45-64</span>
                        <span class="text-gray-500">18.4%</span>
                    </div>
                    <div class="h-2 bg-gray-200 rounded-full overflow-hidden">
                        <div class="h-full bg-indigo-400 rounded-full" style="width: 18.4%"></div>
                    </div>
                </div>

                <div>
                    <div class="flex justify-between text-sm mb-1">
                        <span class="text-gray-600">65+</span>
                        <span class="text-gray-500">7.5%</span>
                    </div>
                    <div class="h-2 bg-gray-200 rounded-full overflow-hidden">
                        <div class="h-full bg-indigo-300 rounded-full" style="width: 7.5%"></div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    </div>
</x-admin.template-admin>
