<x-admin.template-admin>
    <div class="space-y-6">

        <!-- Header Section -->
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div>
                <h1 class="text-2xl font-semibold text-gray-900">Manajemen Produk</h1>
                <p class="mt-1 text-sm text-gray-500">Kelola semua produk yang tersedia di toko</p>
            </div>

            <a href="{{ route('admin.add_produk.view') }}"
                class="inline-flex items-center px-5 py-2.5 bg-indigo-600 text-white font-medium rounded-lg shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition-colors">
                <svg class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                </svg>
                Tambah Produk Baru
            </a>
        </div>

        <!-- Products Table Card -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">

            <!-- Table Title -->
            <div class="px-6 py-5 border-b border-gray-200">
                <h2 class="text-lg font-medium text-gray-900">Daftar Produk</h2>
            </div>

            @if ($produk->isNotEmpty())
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col"
                                    class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Nama Produk
                                </th>
                                <th scope="col"
                                    class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Deskripsi
                                </th>
                                <th scope="col"
                                    class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Harga
                                </th>
                                <th scope="col"
                                    class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Ukuran
                                </th>
                                <th scope="col"
                                    class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Kategori
                                </th>
                                <th scope="col"
                                    class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Foto
                                </th>
                                <th scope="col"
                                    class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Dibuat
                                </th>
                                <th scope="col"
                                    class="px-6 py-4 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($produk as $item)
                                <tr class="hover:bg-gray-50 transition-colors">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm font-medium text-gray-900">{{ $item->nama_prod }}</div>
                                    </td>

                                    <td class="px-6 py-4 max-w-xs">
                                        <div class="text-sm text-gray-600 line-clamp-2">
                                            {{ Str::limit($item->deskripsi, 80) ?: '-' }}
                                        </div>
                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm font-medium text-emerald-600">
                                            Rp {{ number_format($item->harga, 0, ',', '.') }}
                                        </div>
                                    </td>

                                    <td class="px-6 py-4">
                                        <div class="flex flex-wrap gap-1.5">
                                            @if ($item->ukuran && json_decode($item->ukuran))
                                                @foreach (json_decode($item->ukuran) as $ukuran)
                                                    <span
                                                        class="inline-flex items-center px-2.5 py-0.5 rounded text-xs font-medium bg-gray-100 text-gray-800">
                                                        {{ $ukuran }}
                                                    </span>
                                                @endforeach
                                            @else
                                                <span class="text-gray-400 text-sm">-</span>
                                            @endif
                                        </div>
                                    </td>

                                    <td class="px-6 py-4">
                                        <div class="flex flex-wrap gap-1.5">
                                            @forelse ($item->kategori as $kat)
                                                <span
                                                    class="inline-flex items-center px-2.5 py-0.5 rounded text-xs font-medium bg-indigo-100 text-indigo-800">
                                                    {{ $kat->kategori }}
                                                </span>
                                            @empty
                                                <span class="text-gray-400 text-sm">-</span>
                                            @endforelse
                                        </div>
                                    </td>

                                    <td class="px-6 py-4">
                                        @if ($item->foto)
                                            <img class="h-16 w-16 object-cover rounded-md border border-gray-200 shadow-sm"
                                                src="{{ asset('storage/produk/' . $item->foto) }}"
                                                alt="{{ $item->nama_prod }}" loading="lazy" />
                                        @else
                                            <div
                                                class="h-16 w-16 bg-gray-100 rounded-md flex items-center justify-center text-gray-400 text-xs">
                                                No Image
                                            </div>
                                        @endif
                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-500">
                                            {{ $item->created_at->format('d M Y') }}
                                        </div>
                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <div class="flex items-center justify-end gap-4">
                                            <a href="{{ route('admin.edit_produk.view', $item->id) }}"
                                                class="text-indigo-600 hover:text-indigo-800 transition-colors">
                                                Edit
                                            </a>

                                            @if ($item->detailTransaksi->count() < 1)
                                                <button
                                                    onclick="confirmation('{{ route('admin.delete_produk.post', $item->id) }}', 'Anda yakin akan menghapus produk ini?', 'post')"
                                                    class="text-red-600 hover:text-red-800 transition-colors">
                                                    Hapus
                                                </button>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                {{-- @if ($produk->hasPages())
                <div class="px-6 py-4 border-t border-gray-200 flex items-center justify-between text-sm">
                    <div class="text-gray-600">
                        Menampilkan {{ $produk->firstItem() }} - {{ $produk->lastItem() }} dari {{ $produk->total() }} produk
                    </div>
                    {{ $produk->links('pagination::tailwind') }}
                </div>
            @endif --}}
            @else
                <!-- Empty State -->
                <div class="px-6 py-20 text-center">
                    <div class="mx-auto max-w-md">
                        <svg class="mx-auto h-16 w-16 text-gray-400" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                        </svg>
                        <h3 class="mt-4 text-lg font-medium text-gray-900">Belum ada produk</h3>
                        <p class="mt-1 text-sm text-gray-500">Mulai dengan menambahkan produk baru ke katalog Anda.</p>
                        <div class="mt-6">
                            <a href="{{ route('admin.add_produk.view') }}"
                                class="inline-flex items-center px-4 py-2 bg-indigo-600 text-white text-sm font-medium rounded-md hover:bg-indigo-700">
                                Tambah Produk Pertama
                            </a>
                        </div>
                    </div>
                </div>
            @endif

        </div>

    </div>
</x-admin.template-admin>
