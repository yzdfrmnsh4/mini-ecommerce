<x-admin.template-admin>

    <div class="h-screen w-full flex justify-center items-center">
        <x-form back="{{ route('admin.kategori.view') }}" action="{{ route('admin.kategori.post') }}" method="post"
            judul="Tambah kategori">
            <x-input.form-input name="kategori" type="text" label="nama kategori"></x-input.form-input>
            <x-input.form-input name="deskripsi" type="area" label="Deskripsi kategori"></x-input.form-input>



        </x-form>
    </div>
</x-admin.template-admin>
