<x-template>

    <div class="min-h-screen bg-gray-50 py-12">

        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Header -->
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-6 mb-10">
                <div>
                    <h1 class="text-4xl font-bold text-gray-900">Pesanan Saya</h1>
                    <p class="text-lg text-gray-600 mt-2">Lihat riwayat dan status pesanan Anda</p>
                </div>
                <a href="#"
                    class="inline-flex items-center px-6 py-3 bg-indigo-600 text-white font-semibold rounded-xl hover:bg-indigo-700 transition-all shadow-md">
                    Lanjut Belanja
                </a>
            </div>

            <!-- Filter Status -->
            <div class="flex flex-wrap gap-3 mb-10">
                <button class="px-6 py-3 bg-indigo-600 text-white font-medium rounded-xl shadow-md">Semua</button>
                <button
                    class="px-6 py-3 bg-white border border-gray-300 text-gray-700 font-medium rounded-xl hover:bg-gray-50 transition-colors">Menunggu
                    Pembayaran</button>
                <button
                    class="px-6 py-3 bg-white border border-gray-300 text-gray-700 font-medium rounded-xl hover:bg-gray-50 transition-colors">Sedang
                    Dikirim</button>
                <button
                    class="px-6 py-3 bg-white border border-gray-300 text-gray-700 font-medium rounded-xl hover:bg-gray-50 transition-colors">Selesai</button>
            </div>

            <!-- Daftar Pesanan -->
            <div class="space-y-8">
                @foreach ($pesanan as $item)
                    <!-- Contoh pesanan (ganti dengan  dari data real) -->
                    <div
                        class="bg-white rounded-2xl shadow-lg overflow-hidden border border-gray-100 hover:shadow-xl transition-all duration-300">
                        <div
                            class="p-6 md:p-8 flex flex-col md:flex-row justify-between items-start md:items-center gap-6 border-b border-gray-100">
                            <div>
                                <p class="text-sm text-gray-500">Pesanan {{ $item->kode_transaksi }} •
                                    {{ \Carbon\Carbon::parse($item->created_at)->format('d F Y') }}</p>
                                <p class="text-xl font-bold text-gray-900 mt-1 rupiah">Rp {{ $item->total_harga }}</p>
                            </div>
                            <span class="px-6 py-2 bg-green-100 text-green-700 rounded-full font-medium">Selesai</span>
                        </div>

                        <div class="p-6 gap-4 flex flex-col md:p-8">
                            <!-- Item dalam pesanan -->

                            @foreach ($item->detail_transaksi as $data)
                                <div class="flex gap-6">
                                    <div class="w-24 h-24 rounded-lg overflow-hidden bg-gray-100 flex-shrink-0">
                                        <img src="https://placehold.co/100x100/png?text=Produk" alt="Produk"
                                            class="w-full h-full object-cover">
                                    </div>
                                    <div class="flex-1">
                                        <h3 class="font-semibold text-gray-900">Kaos Oversized Premium</h3>
                                        <p class="text-sm text-gray-600 mt-1">Ukuran: L • Qty: 2</p>
                                    </div>
                                    <div class="text-right">
                                        <p class="font-bold text-indigo-600">Rp 925.000</p>
                                    </div>
                                </div>
                            @endforeach
                            <!-- Tombol Aksi -->
                            <div class="mt-8 flex flex-col sm:flex-row gap-4">
                                <a href="#"
                                    class="flex-1 bg-indigo-600 text-white font-semibold py-3 rounded-xl hover:bg-indigo-700 transition-all text-center">
                                    Lihat Detail Pesanan
                                </a>
                                <a href="#"
                                    class="flex-1 bg-white border-2 border-gray-300 text-gray-700 font-semibold py-3 rounded-xl hover:bg-gray-50 transition-all text-center">
                                    Beli Lagi
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach

                <!-- Pesanan lain (placeholder) -->
                <div
                    class="bg-white rounded-2xl shadow-lg overflow-hidden border border-gray-100 hover:shadow-xl transition-all duration-300">
                    <div
                        class="p-6 md:p-8 flex flex-col md:flex-row justify-between items-start md:items-center gap-6 border-b border-gray-100">
                        <div>
                            <p class="text-sm text-gray-500">Pesanan #ORD-20251220-045 • 20 Des 2025</p>
                            <p class="text-xl font-bold text-gray-900 mt-1">Rp 780.000</p>
                        </div>
                        <span class="px-6 py-2 bg-blue-100 text-blue-700 rounded-full font-medium">Sedang Dikirim</span>
                    </div>
                    <div class="p-6 md:p-8 text-center text-gray-500">
                        <p>Detail pesanan akan muncul di sini setelah diproses lebih lanjut</p>
                    </div>
                </div>

                <!-- Jika belum ada pesanan -->
                <!--
                <div class="bg-white rounded-2xl shadow-lg p-12 text-center border border-gray-100">
                    <svg class="mx-auto w-20 h-20 text-gray-300 mb-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63 .63-.184 1.707 .707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                    </svg>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">Belum ada pesanan</h3>
                    <p class="text-gray-600 mb-8 max-w-md mx-auto">Mulai berbelanja sekarang dan lihat semua pesanan Anda di sini</p>
                    <a href="#" class="inline-flex items-center px-8 py-4 bg-indigo-600 text-white font-semibold rounded-xl hover:bg-indigo-700 transition-all shadow-md">
                        Mulai Belanja
                    </a>
                </div>
                -->

            </div>

        </div>
    </div>

</x-template>
