<x-admin.template-admin>
    <x-admin.table.table dataExist="2" :th="['Nama Pembeli', 'Kode Transaksi', 'Total Barang', 'Total Harga', 'bukti', 'status', 'aksi']">
        @foreach ($transaksi as $item)
            <x-admin.table.tr>
                <x-admin.table.td>{{ $item->user->name }}</x-admin.table.td>
                <x-admin.table.td>{{ $item->kode_transaksi }}</x-admin.table.td>
                <x-admin.table.td>{{ $item->total_barang }}</x-admin.table.td>
                <x-admin.table.td class="rupiah">{{ $item->total_harga }}</x-admin.table.td>
                <x-admin.table.td>
                    @if ($item->bukti == 0)
                        <a class="text-red-800 bg-red-100 border-red-800 rounded-md px-3 py-2">Belum Terlampir</a>
                    @else
                        <a href="{{ asset('storage/bukti/' . $item->bukti) }}" target="_blank"
                            class="text-blue-800 bg-blue-100 border-blue-800 rounded-md px-3 py-2">Lihat Bukti</a>
                    @endif
                </x-admin.table.td>
                <x-admin.table.td>
                    @if ($item->status == 1)
                        <a class="text-slate-800 bg-slate-100 border-slate-800 rounded-md px-3 py-2">Belum
                            Terkonfirmasi</a>
                    @elseif($item->status == 2)
                        <a class="text-yellow-800 bg-yellow-100 border-yellow-800 rounded-md px-3 py-2">Belum
                            Transfer</a>
                    @elseif($item->status == 3)
                        <a class="text-blue-800 bg-blue-100 border-blue-800 rounded-md px-3 py-2">Tahap Pengiriman</a>
                    @elseif($item->status == 4)
                        <a class="text-green-800 bg-green-100 border-green-800 rounded-md px-3 py-2">
                            Sukses</a>
                    @else
                        <a class="text-red-800 bg-red-100 border-red-800 rounded-md px-3 py-2">
                            Di tolak</a>
                    @endif
                </x-admin.table.td>

                <x-admin.table.td>
                    <div class="flex gap-2">
                        @if ($item->status === 1)
                            <button
                                onclick="confirmation('{{ route('ubah_transaksi', ['id' => $item->id, 'status' => 2]) }}','Apakah anda yakin akan melakukan aksi ini?','post')"
                                class="text-white bg-blue-700 p-2 rounded-md">Terima</button>
                            <button
                                onclick="confirmation('{{ route('ubah_transaksi', ['id' => $item->id, 'status' => 5]) }}','Apakah anda yakin akan melakukan aksi ini?','post')"
                                class="text-white bg-red-700 p-2 rounded-md">Tolak</button>
                        @elseif ($item->status === 2)
                            <button
                                onclick="confirmation('{{ route('ubah_transaksi', ['id' => $item->id, 'status' => 3]) }}','Apakah anda yakin akan melakukan aksi ini?','post')"
                                class="text-white bg-blue-700 p-2 rounded-md">Terima</button>
                            <button
                                onclick="confirmation('{{ route('ubah_transaksi', ['id' => $item->id, 'status' => 5]) }}','Apakah anda yakin akan melakukan aksi ini?','post')"
                                class="text-white bg-red-700 p-2 rounded-md">Tolak</button>
                        @else
                            <a>--</a>
                        @endif

                    </div>
                </x-admin.table.td>

            </x-admin.table.tr>
        @endforeach
    </x-admin.table.table>
</x-admin.template-admin>
