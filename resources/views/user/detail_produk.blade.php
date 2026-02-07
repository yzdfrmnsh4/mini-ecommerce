<x-template>

    <div class="font-sans bg-gray-50 min-h-screen">

        <!-- Detail Produk -->
        <section class="py-10">
            <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-10">

                    <!-- Gambar Produk -->
                    <div class="relative rounded-xl overflow-hidden shadow-lg bg-white border border-gray-100">
                        <div class="aspect-[3/4] relative">
                            <img 
                                class="absolute inset-0 w-full h-full  transition-transform duration-500 hover:scale-105"
                                src="{{ asset('storage/produk/' . $produk->foto) }}" 
                                alt="{{ $produk->nama_prod }}"
                                loading="lazy"
                            >
                            <!-- Badge kecil -->
                            <div class="absolute top-3 left-3 bg-indigo-600 text-white text-xs font-bold px-3 py-1 rounded-full shadow">
                                Baru
                            </div>
                        </div>
                    </div>

                    <!-- Info Produk -->
                    <div class="flex flex-col">
                        <form method="post" id="form_checkout" action="{{ route('checkout_normal_post', $produk->id) }}" class="space-y-6">
                            @csrf
                            <input type="hidden" name="harga" value="{{ $produk->harga }}">

                            <!-- Kategori -->
                            <div class="flex flex-wrap gap-2">
                                @foreach ($produk->kategori as $item)
                                    <span class="inline-block bg-indigo-50 text-indigo-700 px-3 py-1 rounded-full text-xs font-medium border border-indigo-100">
                                        {{ $item->kategori }}
                                    </span>
                                @endforeach
                            </div>

                            <!-- Nama Produk -->
                            <h1 class="text-3xl md:text-4xl font-bold text-gray-900 tracking-tight">
                                {{ $produk->nama_prod }}
                            </h1>

                            <!-- Harga -->
                            <div class="flex items-baseline gap-3 pb-5 border-b border-gray-200">
                                <span class="text-4xl font-bold text-indigo-700">
                                    Rp {{ number_format($produk->harga, 0, ',', '.') }}
                                </span>
                                <span class="text-lg text-gray-400 line-through">
                                    Rp {{ number_format($produk->harga * 1.25, 0, ',', '.') }}
                                </span>
                            </div>

                            <!-- Deskripsi -->
                            <div>
                                <h3 class="text-lg font-semibold text-gray-900 mb-3">Deskripsi Produk</h3>
                                <p class="text-gray-600 leading-relaxed">
                                    {{ $produk->deskripsi }}
                                </p>
                            </div>

                            <!-- Pilihan Ukuran -->
                            <div class="space-y-3">
                                <h3 class="text-lg font-semibold text-gray-900">Pilih Ukuran</h3>
                                <div class="flex flex-wrap gap-2">
                                    @foreach (json_decode($produk->ukuran) as $item)
                                        <div>
                                            <input type="radio" 
                                                   name="size" 
                                                   {{ old('size') == $item ? 'checked' : '' }}
                                                   class="peer hidden" 
                                                   value="{{ $item }}" 
                                                   id="size-{{ $item }}">
                                            <label for="size-{{ $item }}"
                                                   class="px-5 py-2 border-2 border-gray-300 rounded-lg text-gray-700 font-medium cursor-pointer transition-all hover:border-indigo-500 hover:text-indigo-600 peer-checked:border-indigo-600 peer-checked:text-indigo-600 peer-checked:bg-indigo-50">
                                                {{ $item }}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <!-- Stok -->
                            <div class="flex items-center gap-2 text-base font-medium">
                                <span class="text-green-600 text-xl">✓</span>
                                <span class="text-gray-800">Stok Tersedia (127 unit)</span>
                            </div>

                            <!-- Kuantitas -->
                            <div class="space-y-3">
                                <h3 class="text-lg font-semibold text-gray-900">Jumlah</h3>
                                <div class="flex items-center gap-3 w-fit border border-gray-200 rounded-lg p-1.5 bg-white">
                                    <button type="button" id="minus"
                                            class="w-10 h-10 flex items-center justify-center text-gray-600 hover:text-indigo-600 text-xl font-bold transition-colors">
                                        −
                                    </button>
                                    <input type="number" id="qty" value="1" name="qty"
                                           class="w-14 text-center text-lg font-semibold border-none focus:outline-none bg-transparent">
                                    <button type="button" id="plus"
                                            class="w-10 h-10 flex items-center justify-center text-gray-600 hover:text-indigo-600 text-xl font-bold transition-colors">
                                        +
                                    </button>
                                </div>
                            </div>

                            <!-- Tombol Aksi -->
                            <div class="flex flex-col sm:flex-row gap-4 pt-4">
                                <button type="button" id="action_keranjang"
                                        class="flex-1 flex items-center justify-center gap-2 bg-white border-2 border-indigo-600 text-indigo-600 font-semibold py-3 rounded-xl hover:bg-indigo-50 transition-all">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63 .63-.184 1.707 .707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                    </svg>
                                    Tambah ke Keranjang
                                </button>
                                <button onclick="add_action()" type="button"
                                        class="flex-1 bg-indigo-600 text-white font-semibold py-3 rounded-xl hover:bg-indigo-700 transition-all shadow-md hover:shadow-lg">
                                    Beli Sekarang
                                </button>
                            </div>

                            <!-- Info Tambahan -->
                            <div class="mt-8 grid grid-cols-1 md:grid-cols-3 gap-6 pt-6 border-t border-gray-200">
                                <div class="flex items-start gap-3">
                                    <svg class="w-7 h-7 text-indigo-600 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                                    </svg>
                                    <div>
                                        <p class="font-semibold text-gray-900 text-sm">Pengiriman Gratis</p>
                                        <p class="text-xs text-gray-600">Untuk pembelian > Rp 100.000</p>
                                    </div>
                                </div>
                                <div class="flex items-start gap-3">
                                    <svg class="w-7 h-7 text-indigo-600 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H4m0 0v5m15.356-2a8.001 8.001 0 01-15.356 2m15.356-2H20" />
                                    </svg>
                                    <div>
                                        <p class="font-semibold text-gray-900 text-sm">30 Hari Jaminan Uang Kembali</p>
                                        <p class="text-xs text-gray-600">Tidak puas? Uang kembali 100%</p>
                                    </div>
                                </div>
                                <div class="flex items-start gap-3">
                                    <svg class="w-7 h-7 text-indigo-600 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                    </svg>
                                    <div>
                                        <p class="font-semibold text-gray-900 text-sm">Produk Original Bergaransi</p>
                                        <p class="text-xs text-gray-600">Semua produk dijamin keasliannya</p>
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </section>


        <!-- Footer -->
        <footer class="bg-gray-900 text-white py-8 mt-12">
            <div class="max-w-6xl mx-auto px-4 text-center">
                <p class="mb-2">&copy; {{ date('Y') }} Caysie.today. Semua hak dilindungi.</p>
                <p class="text-gray-400">Toko fashion online terpercaya dengan koleksi terkini</p>
            </div>
        </footer>
    </div>

    <!-- Script tetap sama persis -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {

            const minusBtn = document.getElementById('minus');
            const plusBtn = document.getElementById('plus');
            const qtyInput = document.getElementById('qty');
            const checkoutFrom = document.getElementById('form_checkout');

            plusBtn.addEventListener('click', () => {
                qtyInput.value = parseInt(qtyInput.value) + 1;
            });

            minusBtn.addEventListener('click', () => {
                if (qtyInput.value > 1) {
                    qtyInput.value = parseInt(qtyInput.value) - 1;
                }
            });

            qtyInput.addEventListener('input', () => {
                if (qtyInput.value < 1 || qtyInput.value === '') {
                    qtyInput.value = 1;
                }
            });

            document.getElementById("action_keranjang").addEventListener("click", function() {
                const form = document.createElement("form");
                form.method = "POST";
                form.action = "{{ route('add_cart_post', $produk->id) }}";
                const token = document.querySelector('meta[name="csrf-token"]').getAttribute("content");
                form.innerHTML = `
                    <input type="hidden" name="_token" value="${token}">
                    <input type="hidden" name="_method" value="post">
                    <input type="hidden" name="qty" value="${qtyInput.value}">
                    <input type="hidden" name="ukuran" value="${document.querySelector("input[name='size']:checked")?.value}">
                `;
                document.body.appendChild(form);
                form.submit();
            });

            window.add_action = function() {
                confirmAction("Apakah anda yakin akan checkout produk ini?").then((result) => {
                    if (result.isConfirmed) {
                        checkoutFrom.submit();
                    }
                }).catch((err) => {
                    console.log(err);
                });
            }
        });
    </script>

</x-template>