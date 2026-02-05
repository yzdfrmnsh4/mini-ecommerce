<x-template>

    <div class="font-sans bg-gray-50">
        <!-- Navbar -->



        <!-- Detail Produk -->
        <section class="py-12 ">
            <div class="max-w-6xl mx-auto px-4">
                <div class="flex md:flex-row flex-col gap-12">

                    <!-- Gambar Produk -->
                    <div
                        class="lg:w-[50rem] md:flex-1 relative overflow-hidden md:w-[60rem] md:h-[40rem] w-full h-96 bg-slate-500">
                        <div class="bg-slate-500 rounded-lg  flex items-center justify-center mb-4  overflow-hidden">
                            <img class="w-full h-full inset-0 absolute"
                                src="{{ asset('storage/produk/' . $produk->foto) }}" alt="" srcset="">

                        </div>

                        aa
                    </div>

                    <!-- Info Produk -->
                    <form method="post" id="form_checkout" action="{{ route('checkout_normal_post', $produk->id) }}"
                        class="w-[50%]">
                        <!-- Kategori -->
                        @csrf
                        <input type="hidden" name="harga" value="{{ $produk->harga }}">
                        <div class="mb-4 flex gap-2">

                            @foreach ($produk->kategori as $item)
                                <span
                                    class="inline-block bg-blue-100 text-blue-600 px-3 py-1 rounded-full text-sm font-semibold">
                                    {{ $item->kategori }}
                                </span>
                            @endforeach
                        </div>

                        <!-- Nama Produk -->
                        <h1 class="text-4xl font-bold text-gray-900 mb-4">{{ $produk->nama_prod }}</h1>



                        <!-- Harga -->
                        <div class="mb-6 pb-6 border-b-2">
                            <div class="flex items-baseline gap-3">
                                <span class="text-4xl font-bold text-blue-600">Rp {{ $produk->harga }}</span>
                            </div>
                        </div>

                        <!-- Deskripsi -->
                        <div class="mb-6">
                            <h3 class="text-lg font-semibold text-gray-900 mb-3">Deskripsi Produk</h3>
                            <p class="text-gray-600 leading-relaxed mb-3">
                                {{ $produk->deskripsi }}
                            </p>

                        </div>



                        <!-- Pilihan Ukuran -->
                        <div class="mb-6">
                            <h3 class="text-lg font-semibold text-gray-900 mb-3">Pilih Ukuran</h3>
                            <div class="flex gap-3">
                                @foreach (json_decode($produk->ukuran) as $item)
                                    <div class="">

                                        <input type="radio" name="size" {{ old('size') == $item ? 'checked' : '' }}
                                            class="peer hidden" value="{{ $item }}" id="{{ $item }}">
                                        <label for="{{ $item }}"
                                            class="px-6 py-2 border-2 border-gray-300 rounded-lg peer-checked:border-blue-600 peer-checked:text-blue-600 text-gray-600 hover:border-blue-600 hover:text-blue-600 font-semibold transition">
                                            {{ $item }}
                                        </label>
                                    </div>
                                @endforeach


                            </div>
                        </div>

                        <!-- Stok -->
                        <div class="mb-6 pb-6 border-b-2">
                            <p class="text-green-600 font-semibold">✓ Stok Tersedia (127 unit)</p>
                        </div>

                        <!-- Kuantitas -->
                        <div class="mb-6">
                            <h3 class="text-lg font-semibold text-gray-900 mb-3">Jumlah</h3>
                            <div class="flex items-center gap-4 w-fit">
                                <a id="minus"
                                    class="bg-gray-200 flex items-center justify-center hover:bg-gray-300 text-gray-800 font-semibold w-10 h-10 rounded-lg transition">
                                    -
                                </a>
                                <input type="number" id="qty" value="1" name="qty"
                                    class="w-16 text-center border-2 border-gray-300 rounded-lg py-2 font-semibold focus:outline-none focus:border-blue-600">
                                <a id="plus"
                                    class="bg-gray-200 items-center justify-center flex hover:bg-gray-300 text-gray-800 font-semibold w-10 h-10 rounded-lg transition">
                                    +
                                </a>
                            </div>
                        </div>

                        <!-- Tombol Aksi -->
                        <div class="flex gap-4">
                            <a id="action_keranjang"
                                class="flex-1 bg-white border-2 border-blue-600 text-blue-600 font-semibold py-3 rounded-lg hover:bg-blue-50 transition flex items-center justify-center gap-2">
                                <span class="text-xl">🛒</span>
                                Tambah ke Keranjang
                            </a>
                            <button onclick="add_action()" type="button"
                                class="flex-1 bg-blue-600 text-white font-semibold py-3 rounded-lg hover:bg-blue-700 transition">
                                Beli Sekarang
                            </button>
                        </div>

                        <!-- Info Tambahan -->
                        <div class="mt-8 space-y-3 pt-6 border-t">
                            <div class="flex items-center gap-3">
                                <span class="text-2xl">🚚</span>
                                <div>
                                    <p class="font-semibold text-gray-900">Pengiriman Gratis</p>
                                    <p class="text-sm text-gray-600">Untuk pembelian di atas Rp 100.000</p>
                                </div>
                            </div>
                            <div class="flex items-center gap-3">
                                <span class="text-2xl">↩️</span>
                                <div>
                                    <p class="font-semibold text-gray-900">30 Hari Jaminan Uang Kembali</p>
                                    <p class="text-sm text-gray-600">Tidak puas? Uang kembali 100%</p>
                                </div>
                            </div>
                            <div class="flex items-center gap-3">
                                <span class="text-2xl">✔️</span>
                                <div>
                                    <p class="font-semibold text-gray-900">Produk Original Bergaransi</p>
                                    <p class="text-sm text-gray-600">Semua produk dijamin keasliannya</p>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>

        <!-- Review Section -->


        <!-- Produk Terkait -->
        <section class="py-12 bg-white">
            <div class="max-w-6xl mx-auto px-4">
                <h2 class="text-3xl font-bold text-gray-900 mb-8">Produk Terkait</h2>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    <!-- Product Card 1 -->
                    <div class="bg-gray-50 rounded-lg overflow-hidden shadow-sm hover:shadow-md transition">
                        <div class="bg-gray-300 h-40 flex items-center justify-center">
                            <span class="text-gray-500">Gambar</span>
                        </div>
                        <div class="p-4">
                            <p class="text-xs text-blue-600 font-semibold mb-1">Kaos & T-Shirt</p>
                            <h3 class="text-sm font-semibold text-gray-900 mb-2">Kaos Polos Slim Fit</h3>
                            <div class="flex justify-between items-center">
                                <span class="text-lg font-bold text-blue-600">Rp 59.000</span>
                                <button
                                    class="bg-blue-600 text-white px-3 py-1 rounded text-sm hover:bg-blue-700">Beli</button>
                            </div>
                        </div>
                    </div>

                    <!-- Product Card 2 -->
                    <div class="bg-gray-50 rounded-lg overflow-hidden shadow-sm hover:shadow-md transition">
                        <div class="bg-gray-300 h-40 flex items-center justify-center">
                            <span class="text-gray-500">Gambar</span>
                        </div>
                        <div class="p-4">
                            <p class="text-xs text-blue-600 font-semibold mb-1">Kaos & T-Shirt</p>
                            <h3 class="text-sm font-semibold text-gray-900 mb-2">Kaos Oversized Urban</h3>
                            <div class="flex justify-between items-center">
                                <span class="text-lg font-bold text-blue-600">Rp 89.000</span>
                                <button
                                    class="bg-blue-600 text-white px-3 py-1 rounded text-sm hover:bg-blue-700">Beli</button>
                            </div>
                        </div>
                    </div>

                    <!-- Product Card 3 -->
                    <div class="bg-gray-50 rounded-lg overflow-hidden shadow-sm hover:shadow-md transition">
                        <div class="bg-gray-300 h-40 flex items-center justify-center">
                            <span class="text-gray-500">Gambar</span>
                        </div>
                        <div class="p-4">
                            <p class="text-xs text-blue-600 font-semibold mb-1">Kaos & T-Shirt</p>
                            <h3 class="text-sm font-semibold text-gray-900 mb-2">Kaos Grafis Vintage</h3>
                            <div class="flex justify-between items-center">
                                <span class="text-lg font-bold text-blue-600">Rp 69.000</span>
                                <button
                                    class="bg-blue-600 text-white px-3 py-1 rounded text-sm hover:bg-blue-700">Beli</button>
                            </div>
                        </div>
                    </div>

                    <!-- Product Card 4 -->
                    <div class="bg-gray-50 rounded-lg overflow-hidden shadow-sm hover:shadow-md transition">
                        <div class="bg-gray-300 h-40 flex items-center justify-center">
                            <span class="text-gray-500">Gambar</span>
                        </div>
                        <div class="p-4">
                            <p class="text-xs text-blue-600 font-semibold mb-1">Kaos & T-Shirt</p>
                            <h3 class="text-sm font-semibold text-gray-900 mb-2">Kaos Stripe Casual</h3>
                            <div class="flex justify-between items-center">
                                <span class="text-lg font-bold text-blue-600">Rp 74.000</span>
                                <button
                                    class="bg-blue-600 text-white px-3 py-1 rounded text-sm hover:bg-blue-700">Beli</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Footer -->
        <footer class="bg-gray-900 text-white py-8 mt-12">
            <div class="max-w-6xl mx-auto px-4 text-center">
                <p class="mb-2">&copy; 2026 StyleHub. Semua hak dilindungi.</p>
                <p class="text-gray-400">Toko baju online terpercaya dengan koleksi fashion terkini</p>
            </div>
        </footer>
    </div>


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

            // Kalau user ketik manual
            qtyInput.addEventListener('input', () => {
                if (qtyInput.value < 1 || qtyInput.value === '') {
                    qtyInput.value = 1;
                }
            });



            document.getElementById("action_keranjang").addEventListener("click", function() {

                const form = document.createElement("form");
                form.method = "POST";
                form.action = "{{ route('add_cart_post', $produk->id) }}";
                const token = document
                    .querySelector('meta[name="csrf_token"]')
                    .getAttribute("content");
                form.innerHTML = `
        <input type="hidden" name="_token" value="${token}">
        <input type="hidden" name="_method" value="post">
        <input type="hidden" name="qty" value="${qtyInput.value}">
        <input type="hidden" name="ukuran" value="${document.querySelector("input[name='size']:checked")?.value}">
    `;

                document.body.appendChild(form);
                form.submit();
            })




            window.add_action = function() {
                confirmAction("Apakah anda yakin akan checkout produk ini?").then((result) => {
                    if (result.isConfirmed) {
                        checkoutFrom.submit();
                    }
                }).catch((err) => {
                    console.log(err);

                });
            }
        })
    </script>

</x-template>
