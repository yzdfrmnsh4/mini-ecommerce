<x-admin.template-admin>
    <div class="max-w-4xl mx-auto py-8">
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">

            <!-- Header -->
            <div class="px-6 py-5 border-b border-gray-200">
                <div class="flex items-center justify-between">
                    <div>
                        <h1 class="text-xl font-semibold text-gray-900">Tambah Produk Baru</h1>
                        <p class="mt-1 text-sm text-gray-500">Tambahkan produk baru ke katalog toko Anda</p>
                    </div>

                    <a href="{{ route('admin.produk.view') }}"
                        class="text-gray-600 hover:text-gray-900 text-sm font-medium flex items-center gap-1">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>
                        Kembali
                    </a>
                </div>
            </div>

            <!-- Form -->
            <form action="{{ route('admin.add_produk.post') }}" method="POST" enctype="multipart/form-data"
                class="p-6 space-y-6">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Nama Produk -->
                    <div>
                        <label for="nama_prod" class="block text-sm font-medium text-gray-700 mb-1">
                            Nama Produk <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="nama_prod" id="nama_prod" value="{{ old('nama_prod') }}"
                            class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm py-2.5 px-4"
                            placeholder="Contoh: Kaos Polos Oversize" required>
                        @error('nama_prod')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Harga -->
                    <div>
                        <label for="harga" class="block text-sm font-medium text-gray-700 mb-1">
                            Harga <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-gray-500">Rp</span>
                            <input type="text" name="harga" id="harga" value="{{ old('harga') }}"
                                class="block w-full pl-12 rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm py-2.5 px-4"
                                placeholder="150000" required>
                        </div>
                        @error('harga')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Deskripsi -->
                <div>
                    <label for="deskripsi" class="block text-sm font-medium text-gray-700 mb-1">
                        Deskripsi Produk
                    </label>
                    <textarea name="deskripsi" id="deskripsi" rows="5"
                        class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm py-2.5 px-4"
                        placeholder="Jelaskan detail produk, bahan, keunggulan, dll...">{{ old('deskripsi') }}</textarea>
                    @error('deskripsi')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Ukuran -->
            <x-input.form-input  type="multiselect" name="ukuran" label="Ukuran Tersedia">
                <option value="S">S</option>
                <option value="M">M</option>
                <option value="L">L</option>
                <option value="XL">XL</option>
                <option value="XXL">XXL</option>
            </x-input.form-input>

                    <!-- Kategori -->
            <x-input.form-input type="multiselect"  name="kategori" label="Kategori">
                @foreach ($kategori as $item)
                    <option value="{{ $item->id }}">{{ $item->kategori }}</option>
                @endforeach
            </x-input.form-input>

                <!-- Foto -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Foto Produk <span class="text-red-500">*</span>
                    </label>
                    <input type="file" name="foto" accept="image/*"
                        class="block w-full text-sm text-gray-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-medium file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">
                    @error('foto')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Buttons -->
                <div class="flex items-center justify-end gap-4 pt-6 border-t border-gray-200">
                    <a href="{{ route('admin.produk.view') }}"
                        class="px-5 py-2.5 bg-white border border-gray-300 rounded-lg text-gray-700 font-medium hover:bg-gray-50">
                        Batal
                    </a>

                    <button type="submit"
                        class="px-6 py-2.5 bg-indigo-600 text-white font-medium rounded-lg shadow-sm hover:bg-indigo-700 transition-colors">
                        Tambah Produk
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-admin.template-admin>
