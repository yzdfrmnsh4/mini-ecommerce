<x-template>



    <!-- Featured Products -->
    <section id="produk" class="py-20 mt-12 bg-white">
        <div class="max-w-6xl mx-auto px-4">
            <h2 class="text-4xl font-bold text-center text-gray-900 mb-16">Produk Unggulan</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">


                @foreach ($produk as $item)
                    <div class="bg-gray-50 rounded-lg overflow-hidden shadow-md hover:shadow-lg transition">
                        <div class="bg-gray-300 h-64 flex items-center object-cover justify-center">
                            <img class="w-full h-full object-cover" src="{{ asset('storage/produk/' . $item->foto) }}"
                                alt="" srcset="">
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-semibold text-gray-900 mb-2">{{ $item->nama_prod }}</h3>
                            <p class="text-gray-600 mb-4">{{ $item->deskripsi }}</p>
                            <div class="flex justify-between items-center">
                                <span class="text-2xl font-bold text-blue-600">{{ $item->harga }}</span>
                                <div class="flex gap-2">

                                    <a href="{{ route('detail_produk', $item->id) }}"
                                        class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
                                        Beli
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach


            </div>
        </div>
    </section>




</x-template>
