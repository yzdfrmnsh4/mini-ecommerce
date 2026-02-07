<x-template>

    <div class="min-h-screen bg-gray-50 py-12">

        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Header -->
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-6 mb-10">
                <div>
                    <h1 class="text-4xl font-bold text-gray-900">Pesanan Saya</h1>
                    <p class="text-lg text-gray-600 mt-2">Lihat riwayat dan status pesanan Anda</p>
                </div>
                <a href="#"
                    class="inline-flex items-center px-6 py-3 bg-indigo-600 text-white font-semibold rounded-xl hover:bg-indigo-700 transition-all shadow-md">
                    Lanjut Belanja
                </a>
            </div>

            <!-- Filter Status -->
            <div class="flex flex-wrap gap-3 mb-10">
                <a href="{{ route('pesanan_saya_view', ['status' => '']) }}"
                    class="px-6 py-3 bg-indigo-600 text-white font-medium rounded-xl shadow-md">Semua</a>
                <a href="{{ route('pesanan_saya_view', ['status' => 2]) }}"
                    class="px-6 py-3 bg-white border border-gray-300 text-gray-700 font-medium rounded-xl hover:bg-gray-50 transition-colors">Menunggu
                    Pembayaran</a>
                <a href="{{ route('pesanan_saya_view', ['status' => 3]) }}"
                    class="px-6 py-3 bg-white border border-gray-300 text-gray-700 font-medium rounded-xl hover:bg-gray-50 transition-colors">Sedang
                    Dikirim</a>
                <a href="{{ route('pesanan_saya_view', ['status' => 4]) }}"
                    class="px-6 py-3 bg-white border border-gray-300 text-gray-700 font-medium rounded-xl hover:bg-gray-50 transition-colors">Selesai</a>
            </div>

            <!-- Daftar Pesanan -->
            <div class="space-y-8">
                <form id="formBukti" class="hidden" enctype="multipart/form-data" method="post">
                    @csrf
                    <input type="file" name="bukti" id="bukti">
                </form>
                @foreach ($pesanan as $item)
                    <!-- Contoh pesanan (ganti dengan  dari data real) -->


                    <div
                        class="bg-white rounded-2xl shadow-lg overflow-hidden border border-gray-100 hover:shadow-xl transition-all duration-300">
                        <div
                            class="p-6 md:p-8 flex flex-col md:flex-row justify-between items-start md:items-center gap-6 border-b border-gray-100">
                            <div>
                                <p class="text-sm text-gray-500">Pesanan {{ $item->kode_transaksi }} •
                                    {{ \Carbon\Carbon::parse($item->created_at)->format('d F Y') }}</p>
                                <p class="text-xl font-bold text-gray-900 mt-1 rupiah">Rp {{ $item->total_harga }}</p>
                            </div>

                            @if ($item->status == 1)
                                <a class="text-slate-800 bg-slate-100 border-slate-800 rounded-md px-3 py-2">Belum
                                    Terkonfirmasi</a>
                            @elseif($item->status == 2)
                                <a class="text-yellow-800 bg-yellow-100 border-yellow-800 rounded-md px-3 py-2">Belum
                                    Transfer</a>
                            @elseif($item->status == 3)
                                <a class="text-blue-800 bg-blue-100 border-blue-800 rounded-md px-3 py-2">Tahap
                                    Pengiriman</a>
                            @elseif($item->status == 4)
                                <a class="text-green-800 bg-green-100 border-green-800 rounded-md px-3 py-2">
                                    Sukses</a>
                            @else
                                <a class="text-red-800 bg-red-100 border-red-800 rounded-md px-3 py-2">
                                    Di Batalkan</a>
                            @endif
                            {{-- <span class="px-6 py-2 bg-green-100 text-green-700 rounded-full font-medium">Selesai</span> --}}
                        </div>

                        <div class="p-6 gap-4 flex flex-col md:p-8">
                            <!-- Item dalam pesanan -->

                            @foreach ($item->detail_transaksi as $data)
                                <div class="flex gap-6">
                                    <div class="w-24 h-24 rounded-lg overflow-hidden bg-gray-100 flex-shrink-0">
                                        <img src="{{ asset('storage/produk/' . $data->produk->foto) }}" alt="Produk"
                                            class="w-full h-full object-cover">
                                    </div>
                                    <div class="flex-1">
                                        <h3 class="font-semibold text-gray-900">{{ $data->produk->nama_prod }}</h3>
                                        <p class="text-sm text-gray-600 mt-1">Ukuran: {{ $data->ukuran }} • Qty:
                                            {{ $data->qty }}</p>
                                    </div>
                                    <div class="text-right">
                                        <p class="font-bold text-indigo-600 rupiah">{{ $data->harga }}</p>
                                    </div>
                                </div>
                            @endforeach
                            <!-- Tombol Aksi -->



                            <div class="mt-8 flex flex-col sm:flex-row gap-4">



                                @if ($item->status == '2' and $item->bukti !== '0')
                                    <a href="{{ asset('storage/bukti/' . $item->bukti) }}" target="_blank"
                                        class="flex-1 bg-slate-600 text-white font-semibold py-3 rounded-xl hover:bg-slate-700 transition-all text-center">
                                        Lihat Bukti
                                    </a>
                                    <button onclick="buktiFunc('{{ $item->id }}',1)" href="#"
                                        class="flex-1 bg-indigo-600 text-white font-semibold py-3 rounded-xl hover:bg-indigo-700 transition-all text-center">
                                        Ubah Bukti
                                    </button>
                                @elseif ($item->status == '2')
                                    <button
                                        onclick="confirmation('{{ route('ubah_transaksi', ['id' => $item->id, 'status' => 5]) }}','Apakah anda yakin membatalkan pesanan ini??','post')"
                                        href="#"
                                        class="flex-1 bg-red-600 text-white font-semibold py-3 rounded-xl hover:bg-red-700 transition-all text-center">
                                        Batalkan Pesanan
                                    </button>
                                    <button onclick="buktiFunc('{{ $item->id }}')" href="#"
                                        class="flex-1 bg-indigo-600 text-white font-semibold py-3 rounded-xl hover:bg-indigo-700 transition-all text-center">
                                        Upload bukti pesanan
                                    </button>
                                @elseif($item->status == '3')
                                    <a href="{{ asset('storage/bukti/' . $item->bukti) }}" target="_blank"
                                        class="flex-1 bg-slate-600 text-white font-semibold py-3 rounded-xl hover:bg-slate-700 transition-all text-center">
                                        Lihat Bukti
                                    </a>
                                    <button
                                        onclick="confirmation('{{ route('ubah_transaksi', ['id' => $item->id, 'status' => 4]) }}','Apakah anda yakin menyelesaikan pesanan ini??','post')"
                                        href="#"
                                        class="flex-1 bg-green-600 text-white font-semibold py-3 rounded-xl hover:bg-green-700 transition-all text-center">
                                        Selesaikan Pesanan
                                    </button>
                                @elseif ($item->status == '1')
                                    <button
                                        onclick="confirmation('{{ route('ubah_transaksi', ['id' => $item->id, 'status' => 5]) }}','Apakah anda yakin membatalkan pesanan ini??','post')"
                                        href="#"
                                        class="flex-1 bg-red-600 text-white font-semibold py-3 rounded-xl hover:bg-red-700 transition-all text-center">
                                        Batalkan Pesanan
                                    </button>
                                    <a href="{{ route('/') }}"
                                        class="flex-1 bg-indigo-600 text-white font-semibold py-3 rounded-xl hover:bg-indigo-700 transition-all text-center">
                                        Kembali Belanja lagi
                                    </a>
                                @else
                                    <a href="{{ route('/') }}"
                                        class="flex-1 bg-indigo-600 text-white font-semibold py-3 rounded-xl hover:bg-indigo-700 transition-all text-center">
                                        Kembali Belanja lagi
                                    </a>
                                @endif

                                {{-- <a href="#"
                                    class="flex-1 bg-white border-2 border-gray-300 text-gray-700 font-semibold py-3 rounded-xl hover:bg-gray-50 transition-all text-center">
                                    Beli Lagi
                                </a> --}}
                            </div>
                        </div>
                    </div>
                @endforeach

                <!-- Pesanan lain (placeholder) -->


                <!-- Jika belum ada pesanan -->
                <!--
                <div class="bg-white rounded-2xl shadow-lg p-12 text-center border border-gray-100">
                    <svg class="mx-auto w-20 h-20 text-gray-300 mb-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63 .63-.184 1.707 .707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                    </svg>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">Belum ada pesanan</h3>
                    <p class="text-gray-600 mb-8 max-w-md mx-auto">Mulai berbelanja sekarang dan lihat semua pesanan Anda di sini</p>
                    <a href="#" class="inline-flex items-center px-8 py-4 bg-indigo-600 text-white font-semibold rounded-xl hover:bg-indigo-700 transition-all shadow-md">
                        Mulai Belanja
                    </a>
                </div>
                -->

            </div>

        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {

            const bukti = document.getElementById("bukti");


            window.buktiFunc = function(id, aksi = 0) {

                bukti.click()

                bukti.addEventListener("change", function() {
                    confirmAction("Sudah yakin dengan file bukti anda?").then((result) => {
                        if (result.isConfirmed) {
                            const form = document.getElementById("formBukti");

                            if (aksi !== 0) {
                                form.action = `upload_bukti/${id}?ubah=true`;

                            } else {
                                form.action = `upload_bukti/${id}`;
                            }
                            form.submit();


                        }
                    }).catch((err) => {
                        console.log(err);

                    });;
                })
            }


        })
    </script>

</x-template>
