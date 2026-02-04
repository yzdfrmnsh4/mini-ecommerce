<x-admin.template-admin>



    <x-admin.table.table insert="{{ route('user_management_add_view') }}" :th="['Nama User', 'Email User', 'Nomor Telphone', 'Role', 'Tanggal Di Buat', 'Aksi']">

        @foreach ($user as $item)
            <x-admin.table.tr>
                <x-admin.table.td>{{ $item->name }}</x-admin.table.td>
                <x-admin.table.td>{{ $item->email }}</x-admin.table.td>
                <x-admin.table.td>{{ $item->no_telp }}</x-admin.table.td>
                <x-admin.table.td>{{ $item->role }}</x-admin.table.td>
                <x-admin.table.td>{{ $item->created_at }}</x-admin.table.td>
                <x-admin.table.td>
                    <div class="flex gap-4">
                        <a href="{{ route('user_management_edit_view', $item->id) }}" class="text-blue-600">Edit</a>
                        <button
                            onclick="confirmation('{{ route('user_management_delete', $item->id) }}','Anda yakin akan menghapus data ini?','post')"
                            class="text-red-600">Delete</button>
                    </div>
                </x-admin.table.td>
            </x-admin.table.tr>
        @endforeach
    </x-admin.table.table>



</x-admin.template-admin>
