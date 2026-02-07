
<x-admin.template-admin>
    <div class="max-w-6xl mx-auto py-8">
        <x-container>
        <x-form back="{{ route('admin.kategori.view') }}" action="{{ route('admin.kategori.post', $id) }}" method="post"
            judul="Edit kategori">

            <div >

                <x-input.form-input value="{{ $kategori->kategori }}" name="kategori" type="text"
                    label="Nama kategori"></x-input.form-input>
               
            </div>

            <div>
                 <x-input.form-input value="{{ $kategori->deskripsi }}" name="deskripsi" type="area"
                    label="Deskripsi kategori"></x-input.form-input>
            </div>

                <div class="flex items-center justify-end gap-4 pt-6 border-t border-gray-200">
                    <a href="{{ route('admin.kategori.view') }}"
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
