<x-template>

    <div class="font-sans bg-gray-50">
        <!-- Navbar -->


        <!-- Breadcrumb -->
        {{-- <div class="pt-24 pb-4 bg-white">
            <div class="max-w-7xl mx-auto px-4">
                <div class="text-sm text-gray-600">
                    <a href="#" class="hover:text-blue-600">Home</a> /
                    <span class="text-gray-900">Keranjang Belanja</span>
                </div>
            </div>
        </div> --}}

        <!-- Main Content -->
        <section class="py-12 bg-white">
            <div class="max-w-7xl mx-auto px-4">
                <h1 class="text-3xl font-bold text-gray-900 mb-8">Keranjang Belanja</h1>

                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                    <!-- Tabel Produk -->
                    <div class="lg:col-span-2">
                        <!-- Desktop View -->
                        <form id="saveperubahan" action="{{ route('saveQty') }}" method="post"
                            class=" md:block bg-white rounded-lg shadow-sm overflow-hidden">
                            <!-- Header Tabel -->
                            <div
                                class="grid grid-cols-12 gap-4 bg-gray-100 px-6 py-4 font-semibold text-gray-800 text-sm">
                                <div class="col-span-5">Produk</div>
                                <div class="col-span-2 text-center">Ukuran</div>
                                <div class="col-span-2 text-center">Qty</div>
                                <div class="col-span-2 text-right">Harga</div>
                                <div class="col-span-1 text-center">Aksi</div>
                            </div>

                            @php
                                $grandtotal = 0;
                            @endphp

                            @foreach ($keranjang as $item)
                                <!-- Row 1 -->

                                <input name="id_produk[{{ $item->pivot->id }}]" value="{{ $item->id }}"
                                    type="hidden">

                                <input name="ukuran[{{ $item->pivot->id }}]" value="{{ $item->pivot->ukuran }}"
                                    type="hidden">

                                <input name="harga[{{ $item->pivot->id }}]" value="{{ $item->harga }}" type="hidden">

                                @php
                                    $total = (int) $item->pivot->qty * (int) $item->harga;
                                    $grandtotal += $total;
                                @endphp

                                <div data-harga="{{ $item->harga }}"
                                    class="grid data-row grid-cols-12 gap-4 px-6 py-6 border-b items-center">
                                    <div class="col-span-5">
                                        <div class="flex gap-4">
                                            <div
                                                class="bg-gray-300 overflow-hidden relative w-20 h-20 rounded-lg flex items-center justify-center flex-shrink-0">
                                                <img src="{{ asset('storage/produk/' . $item->foto) }}" alt=""
                                                    srcset="">
                                            </div>
                                            <div class="flex flex-col justify-center">
                                                <h3 class="font-semibold text-gray-900">{{ $item->nama_prod }}</h3>
                                                <p class="text-sm text-gray-500 mt-1">{{ $item->deskripsi }}</p>
                                                <p class="text-blue-600 rupiah font-semibold mt-2">
                                                    {{ $item->harga }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-span-2 text-center">
                                        <span class="text-gray-900">{{ $item->pivot->ukuran }}</span>
                                    </div>
                                    @csrf
                                    <div id="saveperubahan" action="{{ route('saveQty') }}" method="post"
                                        class="col-span-2">
                                        <x-input.counter value="{{ $item->pivot->qty }}"
                                            name="qty[{{ $item->pivot->id }}]"></x-input.counter>
                                    </div>
                                    <div class="col-span-2 rupiah text-right text-gray-900 font-semibold">
                                        {{ $item->harga }}
                                    </div>
                                    <div class="col-span-1 text-center">
                                        <button type="button"
                                            onclick="confirmation('{{ route('deleteQty', $item->pivot->id) }}','Apakah anda yakin akan menghapus list keranjang ini?','post')"
                                            class="text-red-600 hover:text-red-800 font-semibold text-sm">
                                            ✕
                                        </button>
                                    </div>
                                </div>
                            @endforeach




                        </form>

                        <!-- Lanjut Belanja -->
                        <div class="mt-6">
                            <a href="#" class="text-blue-600 hover:text-blue-800 font-semibold text-sm">
                                ← Lanjut Belanja
                            </a>
                        </div>
                    </div>

                    <!-- Ringkasan Pesanan -->
                    <div class="lg:col-span-1">
                        <div class="bg-white rounded-lg shadow-sm p-6 sticky top-28">
                            <h2 class="text-xl font-bold text-gray-900 mb-6">Ringkasan Pesanan</h2>

                            <div class="space-y-4 mb-6 pb-6 border-b">
                                {{-- <div class="flex justify-between text-gray-600">
                                    <span>Subtotal</span>
                                    <span class="font-semibold text-gray-900">Rp 576.000</span>
                                </div> --}}

                                <div class="flex justify-between text-gray-600">
                                    <span>Ongkos Kirim</span>
                                    <span class="font-semibold text-green-600">GRATIS</span>
                                </div>
                            </div>

                            <div class="mb-6 pb-6 border-b">
                                <div class="flex justify-between">
                                    <span class="text-lg font-bold text-gray-900">Total</span>
                                    <span
                                        class="text-2xl rupiah grandtotal font-bold text-blue-600">{{ $grandtotal }}</span>
                                </div>
                            </div>



                            <!-- Buttons -->
                            <div class="space-y-3">
                                <button onclick="checkout()"
                                    class="w-full bg-blue-600 text-white font-semibold py-3 rounded-lg hover:bg-blue-700 transition">
                                    Lanjut ke Checkout
                                </button>
                                <button onclick="saveData()"
                                    class="w-full bg-white border-2 border-blue-600 text-blue-600 font-semibold py-3 rounded-lg hover:bg-blue-50 transition">
                                    Save Perubahan
                                </button>
                            </div>

                            <!-- Info -->
                            <div class="mt-6 pt-6 border-t space-y-3 text-sm">
                                <div class="flex items-start gap-2">
                                    <span class="text-lg">🚚</span>
                                    <div>
                                        <p class="font-semibold text-gray-900">Gratis Ongkos Kirim</p>
                                        <p class="text-gray-600 text-xs">Untuk pembelian di atas Rp 100.000</p>
                                    </div>
                                </div>
                                <div class="flex items-start gap-2">
                                    <span class="text-lg">✔️</span>
                                    <div>
                                        <p class="font-semibold text-gray-900">Produk Original</p>
                                        <p class="text-gray-600 text-xs">Semua produk dijamin keasliannya</p>
                                    </div>
                                </div>
                                <div class="flex items-start gap-2">
                                    <span class="text-lg">↩️</span>
                                    <div>
                                        <p class="font-semibold text-gray-900">Kembalikan dalam 30 Hari</p>
                                        <p class="text-gray-600 text-xs">Uang kembali 100% jika tidak puas</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Footer -->
        <footer class="bg-gray-900 text-white py-8 mt-12">
            <div class="max-w-7xl mx-auto px-4 text-center">
                <p class="mb-2">&copy; 2026 StyleHub. Semua hak dilindungi.</p>
                <p class="text-gray-400">Toko baju online terpercaya dengan koleksi fashion terkini</p>
            </div>
        </footer>
    </div>


    <script>
        document.addEventListener("DOMContentLoaded", function() {


            const form = document.getElementById("saveperubahan");
            window.checkout = function(params) {

                confirmAction("apakah anda yakin akan mengcheckout semua produk ini?").then((result) => {
                    if (result.isConfirmed) {
                        form.action = "{{ route('checkout_from_cart') }}"
                        form.submit();
                    }

                }).catch((err) => {
                    console.log(err);

                });
            }

            window.saveData = function() {
                document.getElementById("saveperubahan").submit();
            }



            function updateqty() {
                let grandtotal = 0;
                document.querySelectorAll(".data-row").forEach(element => {
                    const price = parseInt(element.dataset.harga);
                    const qty = parseInt(element.querySelector(".qty-input").value)
                    // Subtotal = ;
                    const Subtotal = price * qty;
                    console.log(Subtotal);
                    grandtotal += Subtotal;
                });
                document.querySelector(".grandtotal").innerText = formatRupiah(grandtotal)
            }
            document.addEventListener('click', function(e) {





                if (e.target.classList.contains('plus') || e.target.classList.contains('minus')) {
                    const counter = e.target.closest('.counter');
                    const input = counter.querySelector('.qty-input');

                    if (e.target.classList.contains('plus')) {
                        input.value = parseInt(input.value) + 1;
                    }

                    if (e.target.classList.contains('minus') && input.value > 1) {
                        input.value = parseInt(input.value) - 1;
                    }

                }


                updateqty()
            });

        })
    </script>
</x-template>
