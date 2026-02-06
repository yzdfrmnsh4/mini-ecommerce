@props(['th' => [''], 'insert' => '', 'label' => 'label', 'sublabel' => 'this is ?????', 'dataExist' => 0])
@php
    $th = is_array($th) ? $th : [];
@endphp
<div class="space-y-6">

    <!-- Header Section -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-2xl font-semibold text-gray-900">{{ $label }}</h1>
            <p class="mt-1 text-sm text-gray-500">{{ $sublabel }}</p>
        </div>

        <a href="{{ $insert }}"
            class="inline-flex items-center px-5 py-2.5 bg-indigo-600 text-white font-medium rounded-lg shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition-colors">
            <svg class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
            </svg>
            Tambah Produk Baru
        </a>
    </div>

    <!-- Products Table Card -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">

        <!-- Table Title -->
        <div class="px-6 py-5 border-b border-gray-200">
            <h2 class="text-lg font-medium text-gray-900">Daftar Data Yang tersedia</h2>
        </div>

        @if ($dataExist > 1)
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            @foreach ($th as $item)
                                <th scope="col"
                                    class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    {{ $item }}
                                </th>
                            @endforeach

                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        {{ $slot }}
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
                        <a href="{{ $insert }}"
                            class="inline-flex items-center px-4 py-2 bg-indigo-600 text-white text-sm font-medium rounded-md hover:bg-indigo-700">
                            Tambah Produk Pertama
                        </a>
                    </div>
                </div>
            </div>
        @endif

    </div>

</div>
