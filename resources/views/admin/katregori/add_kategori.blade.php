<x-admin.template-admin>
<div class="max-w-3xl mx-auto py-8">
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">

        <!-- Header -->
        <div class="px-6 py-5 border-b border-gray-200">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-xl font-semibold text-gray-900">Tambah Kategori Baru</h1>
                    <p class="mt-1 text-sm text-gray-500">Buat kategori baru untuk mengelompokkan produk Anda</p>
                </div>

                <a href="{{ route('admin.kategori.view') }}"
                   class="text-gray-600 hover:text-gray-900 text-sm font-medium flex items-center gap-1">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    Kembali
                </a>
            </div>
        </div>

        <!-- Form -->
        <form action="{{ route('admin.kategori.post') }}" method="POST" class="p-6 space-y-6">
            @csrf

            <!-- Nama Kategori -->
            <div>
                <label for="kategori" class="block text-sm font-medium text-gray-700 mb-1">
                    Nama Kategori <span class="text-red-500">*</span>
                </label>
                <input type="text" name="kategori" id="kategori" value="{{ old('kategori') }}"
                       class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm py-2.5 px-4"
                       placeholder="Contoh: Kaos, Kemeja, Celana" required>
                @error('kategori')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Deskripsi -->
            <div>
                <label for="deskripsi" class="block text-sm font-medium text-gray-700 mb-1">
                    Deskripsi Kategori
                </label>
                <textarea name="deskripsi" id="deskripsi" rows="4" class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm py-2.5 px-4"
                          placeholder="Jelaskan kategori ini...">{{ old('deskripsi') }}</textarea>
                @error('deskripsi')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Buttons -->
            <div class="flex items-center justify-end gap-4 pt-6 border-t border-gray-200">
                <a href="{{ route('admin.kategori.view') }}"
                   class="px-5 py-2.5 bg-white border border-gray-300 rounded-lg text-gray-700 font-medium hover:bg-gray-50">
                    Batal
                </a>

                <button type="submit"
                        class="px-6 py-2.5 bg-indigo-600 text-white font-medium rounded-lg shadow-sm hover:bg-indigo-700 transition-colors">
                    Tambah Kategori
                </button>
            </div>
        </form>
    </div>
</div>
</x-admin.template-admin>
