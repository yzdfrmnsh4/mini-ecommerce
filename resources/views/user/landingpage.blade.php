<x-template>

    <!-- Hero Section -->
    <section class="relative h-[85vh] md:h-screen flex items-center justify-center text-white overflow-hidden">
        <div class="absolute inset-0 bg-cover bg-center" 
             style="background-image: url('https://images.unsplash.com/photo-1552374196-1ab2a1c593e8?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80')">
            <div class="absolute inset-0 bg-gradient-to-b from-black/30 via-black/50 to-black/70"></div>
        </div>
        
        <div class="relative z-10 text-center px-6 max-w-5xl">
            <h1 class="text-5xl md:text-7xl font-extrabold tracking-tight mb-8 drop-shadow-2xl">
                Tingkatkan Gaya Anda<br>
                <span class="text-indigo-400">bersama Koleksi Terbaru</span>
            </h1>
            <p class="text-xl md:text-2xl text-gray-200 mb-12 max-w-3xl mx-auto drop-shadow-md">
                Temukan pakaian berkualitas tinggi dengan desain modern yang membuat Anda tampil percaya diri setiap hari
            </p>
            <div class="flex flex-col sm:flex-row justify-center gap-6">
                <a href="#produk" 
                   class="inline-flex items-center px-10 py-5 bg-indigo-600 text-white font-bold text-lg rounded-xl shadow-xl hover:bg-indigo-700 transition-all transform hover:scale-105">
                    Belanja Sekarang
                    <svg class="ml-3 w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                    </svg>
                </a>
                <a href="#" 
                   class="inline-flex items-center px-10 py-5 border-2 border-white/40 text-white font-bold text-lg rounded-xl hover:bg-white/10 transition-all backdrop-blur-sm">
                    Lihat Koleksi
                </a>
            </div>
        </div>
    </section>

    <!-- Brands Section -->
    <section class="py-20 bg-white border-b border-gray-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h3 class="text-center text-2xl font-bold text-gray-900 mb-12">Merek Terpercaya</h3>
            <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-7 gap-10 md:gap-16 items-center">
                <!-- Placeholder, ganti dengan logo asli jika ada -->
                <div class="flex justify-center opacity-70 hover:opacity-100 transition-opacity">
                    <span class="text-4xl font-bold text-gray-400">CHANEL</span>
                </div>
                <div class="flex justify-center opacity-70 hover:opacity-100 transition-opacity">
                    <span class="text-4xl font-bold text-gray-400">CK</span>
                </div>
                <div class="flex justify-center opacity-70 hover:opacity-100 transition-opacity">
                    <span class="text-4xl font-bold text-gray-400">GUCCI</span>
                </div>
                <div class="flex justify-center opacity-70 hover:opacity-100 transition-opacity">
                    <span class="text-4xl font-bold text-gray-400">D&G</span>
                </div>
                <div class="flex justify-center opacity-70 hover:opacity-100 transition-opacity">
                    <span class="text-4xl font-bold text-gray-400">ADIDAS</span>
                </div>
                <div class="flex justify-center opacity-70 hover:opacity-100 transition-opacity">
                    <span class="text-4xl font-bold text-gray-400">LEVI'S</span>
                </div>
                <div class="flex justify-center opacity-70 hover:opacity-100 transition-opacity">
                    <span class="text-4xl font-bold text-gray-400">ZARA</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Products -->
    <section id="produk" class="py-24 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row justify-between items-center mb-16">
                <h2 class="text-5xl font-extrabold text-gray-900">Produk</h2>
                <a href="#" class="mt-4 md:mt-0 text-indigo-600 hover:text-indigo-800 font-semibold text-lg flex items-center gap-2">
                    Lihat Semua Koleksi
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                    </svg>
                </a>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3 gap-8 ">
                @foreach ($produk as $item)
                    <div class="group bg-white rounded-2xl shadow-md overflow-hidden hover:shadow-2xl transition-all duration-300 border border-gray-100 hover:border-indigo-200 w-96">
                        <!-- Image -->
                        <div class="relative h-96 overflow-hidden">
                            <img class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700 ease-out"
                                 src="{{ asset('storage/produk/' . $item->foto) }}"
                                 alt="{{ $item->nama_prod }}">
                            <!-- Badge -->
                            <div class="absolute top-5 left-5 bg-gradient-to-r from-indigo-600 to-indigo-500 text-white text-sm font-bold px-4 py-1.5 rounded-full shadow-md">
                                Baru
                            </div>
                        </div>

                        <!-- Content -->
                        <div class="p-7">
                            <h3 class="text-xl font-bold text-gray-900 mb-3 group-hover:text-indigo-700 transition-colors">
                                {{ $item->nama_prod }}
                            </h3>
                            <p class="text-gray-600 mb-5 line-clamp-2 text-sm leading-relaxed">
                                {{ $item->deskripsi }}
                            </p>
                            <div class="flex items-center justify-between">
                                <span class="rupiah text-2xl font-extrabold text-indigo-600">
                                    Rp {{ $item->harga}}
                                </span>
                                <a href="{{ route('detail_produk', $item->id) }}"
                                   class="inline-flex items-center px-6 py-3 bg-indigo-600 text-white font-semibold rounded-xl hover:bg-indigo-700 transition-all transform hover:scale-105 shadow-md">
                                    Beli Sekarang
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Promo Banner -->
    <section class="relative py-32 bg-gradient-to-br from-indigo-900 to-indigo-700 text-white overflow-hidden">
        <div class="absolute inset-0 opacity-20" style="background-image: url('https://images.unsplash.com/photo-1551488831-00ddcb6c6bd3?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80'); background-size: cover;"></div>
        <div class="relative max-w-5xl mx-auto px-6 text-center">
            <h2 class="text-5xl md:text-6xl font-extrabold mb-8 drop-shadow-lg">
                Penawaran Terbatas!
            </h2>
            <p class="text-2xl md:text-3xl mb-12 font-light">
                Dapatkan <span class="font-bold text-yellow-300">35% OFF</span> hanya hari ini dan bonus hadiah spesial untuk setiap pembelian
            </p>
            <a href="#produk" class="inline-flex items-center px-12 py-6 bg-white text-indigo-900 font-bold text-xl rounded-2xl shadow-2xl hover:bg-gray-100 transition-all transform hover:scale-105">
                Ambil Sekarang →
            </a>
        </div>
    </section>

    <!-- Newsletter -->
    <section class="py-24 bg-gray-50">
        <div class="max-w-4xl mx-auto px-6 text-center">
            <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-8">
                Berlangganan Newsletter Kami
            </h2>
            <p class="text-xl text-gray-600 mb-12">
                Dapatkan info koleksi terbaru dan diskon eksklusif langsung ke email Anda
            </p>
            <form class="flex flex-col md:flex-row gap-4 max-w-2xl mx-auto">
                <input type="email" placeholder="Masukkan email Anda" 
                       class="flex-1 px-6 py-5 rounded-xl border border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 outline-none transition-all text-lg">
                <button type="submit" class="px-10 py-5 bg-indigo-600 text-white font-bold text-lg rounded-xl hover:bg-indigo-700 transition-all shadow-md">
                    Berlangganan
                </button>
            </form>
            <p class="mt-6 text-sm text-gray-500">
                Anda dapat berhenti berlangganan kapan saja. Kebijakan Privasi kami terbuka untuk Anda baca.
            </p>
        </div>
    </section>

</x-template>