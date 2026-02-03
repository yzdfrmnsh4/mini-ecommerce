<x-admin.template-admin>



    <div class="h-screen w-full flex justify-center items-center">
        <x-form back="{{ route('admin.kategori.view') }}" action="{{ route('admin.kategori.post') }}" method="post"
            judul="Tambah kategori">
            <div class="flex gap-2 ">
                <x-input.form-input name="nama_prod" type="text" label="Nama Produk"></x-input.form-input>
                <x-input.form-input name="ukuran" type="text" label="Ukuran Produk"></x-input.form-input>
            </div>
            <x-input.form-input name="deskripsi" type="area" label="Deskripsi kategori"></x-input.form-input>


            <x-input.form-input type="multiselect" name="test" label="test">
                <option value="aa">aa</option>
                <option value="bb">bb</option>
            </x-input.form-input>



        </x-form>
    </div>
</x-admin.template-admin>
