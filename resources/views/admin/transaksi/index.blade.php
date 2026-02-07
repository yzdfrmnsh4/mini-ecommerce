<x-admin.template-admin>
    <x-admin.table.table label="Data Transaksi" :periode="['tanggal1', 'tanggal2']" FilterByselect="status" FilterBytext="name"
        idButtonPrint="print_button" idForm="formPrint" dataExist="2" :th="[
            'Nama Pembeli',
            'Kode Transaksi',
            'Total Barang',
            'Total Harga',
            'bukti',
            'status',
            'Tanggal Pembelian',
            'aksi',
        ]">


        <x-slot:option>
            @foreach ($transaksi->pluck('status')->flatten() as $item)
                <option value="{{ $item }}">
                    @if ($item == 1)
                        Terkonfirmasi
                    @elseif($item == 2)
                        Belum Transfer
                    @elseif($item == 3)
                        Tahap Pengiriman
                    @elseif($item == 4)
                        Sukses
                    @else
                        Di tolak
                    @endif
                </option>
            @endforeach
        </x-slot:option>

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
                    {{ \Carbon\Carbon::parse($item->created_at)->format('d F Y') }}
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
    <script>
        document.addEventListener('DOMContentLoaded', function() {



            const buttonPrint = document.getElementById("print_button");

            buttonPrint.addEventListener("click", function() {
                const values = Array.from(
                    document.querySelectorAll('[name="status[]"] option:checked')
                ).map(opt => opt.value);

                console.log(values);
                const form = document.createElement("form");
                form.method = "post";

                const token = document
                    .querySelector('meta[name="csrf-token"]')
                    .getAttribute("content");
                form.innerHTML = `
        <input type="hidden" name="_token" value="${token}">
        <input type="hidden" name="_method" value="post">
        <input type="hidden" name="name" value="${document.querySelector(`input[name="name"]`)?.value??''}">
        <input type="hidden" name="status" value="${document.querySelector(`[name="status"]`)?.value??''}">
        <input type="hidden" name="tanggal1" value="${document.querySelector(`input[name="tanggal1"]`)?.value??''}">
        <input type="hidden" name="tanggal2" value="${document.querySelector(`input[name="tanggal2"]`)?.value??''}">
        
        `
                values.forEach(val => {
                    const input = document.createElement("input");
                    input.type = "hidden";
                    input.name = "status[]";
                    input.value = val;
                    form.appendChild(input);
                });
                document.body.appendChild(form);
                form.action = '{{ route('printOutPenjualan') }}'
                form.target = "_blank";
                form.submit();

            })
        })
    </script>
</x-admin.template-admin>
