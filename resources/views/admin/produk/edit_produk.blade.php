<x-admin.template-admin>



    <div class="h-screen w-full flex justify-center items-center">
        <x-form back="{{ route('admin.produk.view') }}" action="{{ route('admin.edit_produk.post', $produk->id) }}"
            method="post" judul="Tambah kategori">
            <div class="flex gap-2 ">
                <x-input.form-input name="nama_prod" type="text" value="{{ $produk->nama_prod }}"
                    label="Nama Produk"></x-input.form-input>
                <x-input.form-input name="harga" type="text" label="Harga baju"
                    value="{{ $produk->harga }}"></x-input.form-input>
            </div>
            <x-input.form-input name="deskripsi" type="area" value="{{ $produk->deskripsi }}"
                label="Deskripsi kategori"></x-input.form-input>
            {{-- @dd(json_decode($produk->ukuran, true)) --}}
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

            <x-input.form-input name="foto" type="file" label="Foto Produk"></x-input.form-input>


        </x-form>
    </div>
</x-admin.template-admin>
