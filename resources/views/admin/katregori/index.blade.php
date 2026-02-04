<x-admin.template-admin>



    <x-admin.table.table insert="{{ route('admin.add_kategori.view') }}" :th="['Nama kategori', 'deskripsi', 'tanggal dibuat', 'aksi']">

        @foreach ($data as $item)
            <x-admin.table.tr>


                <x-admin.table.td>{{ $item->kategori }}</x-admin.table.td>
                <x-admin.table.td>{{ $item->deskripsi }}</x-admin.table.td>
                <x-admin.table.td>{{ \Carbon\Carbon::parse($item->created_at)->format('d F Y') }}</x-admin.table.td>
                <x-admin.table.td>
                    <div class="flex gap-4">
                        <a href="{{ route('admin.edit_kategori.view', $item->id) }}" class="text-blue-600">Edit</a>

                        @if ($item->produk->count() < 1)
                            <button
                                onclick="confirmation('{{ route('admin.delete_kategori.post', $item->id) }}','Anda yakin akan menghapus data ini?','post')"
                                class="text-red-600">Delete</button>
                        @endif
                    </div>
                </x-admin.table.td>
            </x-admin.table.tr>
        @endforeach
    </x-admin.table.table>



</x-admin.template-admin>
