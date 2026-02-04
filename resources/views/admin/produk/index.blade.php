<x-admin.template-admin>



    <x-admin.table.table insert="{{ route('admin.add_produk.view') }}" :th="[
        'Nama produk',
        'deskripsi',
        'Harga',
        'Ukuran tersedia',
        'kategori',
        'Foto produk',
        'tanggal di buat',
        'aksi',
    ]">
        @foreach ($produk as $item)
            {{-- http://127.0.0.1:8000/storage/produk/1770170083_free-photo-of-laut-pemandangan-lanskap-lansekap.jpeg --}}
            <x-admin.table.tr>
                <x-admin.table.td> {{ $item->nama_prod }}
                </x-admin.table.td>
                <x-admin.table.td>{{ $item->deskripsi }}</x-admin.table.td>
                <x-admin.table.td>{{ $item->harga }}</x-admin.table.td>
                <x-admin.table.td>
                    <div class="flex gap-2">
                        @foreach (json_decode($item->ukuran) as $data)
                            <a
                                class="w-[2rem] text-xs text-center bg-gray-600 text-white p-2 rounded-md">{{ $data }}</a>
                        @endforeach
                    </div>
                </x-admin.table.td>
                <x-admin.table.td>
                    <div class="flex gap-2 flex-wrap">
                        @foreach ($item->kategori as $data)
                            <a class="text-white rounded-lg p-2 bg-blue-600">
                                {{ $data->kategori }} </a>
                        @endforeach
                    </div>

                </x-admin.table.td>
                <x-admin.table.td>
                    <img class="w-[4rem]" src="{{ asset('storage/produk/' . $item->foto) }}" alt="">
                </x-admin.table.td>
                <x-admin.table.td>{{ $item->created_at }}</x-admin.table.td>
                <x-admin.table.td>
                    <div class="flex gap-4">
                        <a href="{{ route('admin.edit_produk.view', $item->id) }}" class="text-blue-600">Edit</a>
                        <button
                            onclick="confirmation('{{ route('admin.delete_produk.post', $item->id) }}','Anda yakin akan menghapus data ini?','post')"
                            class="text-red-600">Delete</button>
                    </div>
                </x-admin.table.td>
            </x-admin.table.tr>
        @endforeach

    </x-admin.table.table>



</x-admin.template-admin>
