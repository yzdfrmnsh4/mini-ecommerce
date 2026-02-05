<x-admin.template-admin>
    <div class="max-w-6xl mx-auto py-8">
        <x-container>
            <x-form back="{{ route('admin.produk.view') }}" action="{{ route('admin.edit_produk.post', $produk->id) }}"
                method="post" judul="Edit Produk">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <x-input.form-input name="nama_prod" type="text" value="{{ $produk->nama_prod }}"
                        label="Nama Produk"></x-input.form-input>
                    <x-input.form-input name="harga" type="text" label="Harga baju"
                        value="{{ $produk->harga }}"></x-input.form-input>
                </div>
                <x-input.form-input name="deskripsi" type="area" value="{{ $produk->deskripsi }}"
                    label="Deskripsi kategori"></x-input.form-input>
                {{-- @dd(json_decode($produk->ukuran, true)) --}}

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    <x-input.form-input :value="json_decode($produk->ukuran, true)" type="multiselect" name="ukuran" label="Ukuran Tersedia">
                        <option value="S">S</option>
                        <option value="M">M</option>
                        <option value="L">L</option>
                        <option value="XL">XL</option>
                        <option value="XXL">XXL</option>
                    </x-input.form-input>
    
                    <x-input.form-input type="multiselect" :value="$produk->kategori->pluck('id')->toArray()" name="kategori" label="Kategori">
                        @foreach ($kategori as $item)
                            <option value="{{ $item->id }}">{{ $item->kategori }}</option>
                        @endforeach
                    </x-input.form-input>
                </div>
                <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Foto Produk
                </label>
                <input type="file" name="foto" accept="image/*"
                       class="block w-full text-sm text-gray-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-medium file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">
                @if ($produk->foto)
                    <div class="mt-3">
                        <p class="text-sm text-gray-500">Foto saat ini:</p>
                        <img src="{{ asset('storage/produk/' . $produk->foto) }}" alt="{{ $produk->nama_prod }}"
                             class="mt-2 h-32 w-32 object-cover rounded-lg border border-gray-200">
                    </div>
                @endif
                @error('foto')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
                {{-- <x-input.form-input name="foto" type="file" label="Foto Produk"></x-input.form-input> --}}

                <div class="flex items-center justify-end gap-4 pt-6 border-t border-gray-200">
                    <a href="{{ route('admin.produk.view') }}"
                        class="px-5 py-2.5 bg-white border border-gray-300 rounded-lg text-gray-700 font-medium hover:bg-gray-50">
                        Batal
                    </a>

                    <button type="submit"
                        class="px-6 py-2.5 bg-indigo-600 text-white font-medium rounded-lg shadow-sm hover:bg-indigo-700 transition-colors">
                        Edit Produk
                    </button>
                </div>
            </x-form>
        </x-container>
    </div>



</x-admin.template-admin>
