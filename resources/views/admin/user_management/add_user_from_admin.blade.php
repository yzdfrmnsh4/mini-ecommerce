<x-admin.template-admin>
<div class="max-w-6xl mx-auto py-8">
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">

        <!-- Header -->
        <div class="px-6 py-5 border-b border-gray-200">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-xl font-semibold text-gray-900">Tambah User Baru</h1>
                    <p class="mt-1 text-sm text-gray-500">Buat akun baru untuk admin, kasir, atau pembeli</p>
                </div>

                <a href="{{ route('user_management_view') }}"
                   class="text-gray-600 hover:text-gray-900 text-sm font-medium flex items-center gap-1">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    Kembali
                </a>
            </div>
        </div>

        <!-- Form -->
        <form action="{{ route('user_management_add_update_post') }}" method="POST" class="p-6 space-y-6">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-1">
                        Nama User <span class="text-red-500">*</span>
                    </label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}"
                           class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm py-2.5 px-4"
                           placeholder="Nama lengkap user" required>
                    @error('name')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">
                        Email <span class="text-red-500">*</span>
                    </label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}"
                           class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm py-2.5 px-4"
                           placeholder="contoh@email.com" required>
                    @error('email')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="no_telp" class="block text-sm font-medium text-gray-700 mb-1">
                        Nomor Telepon
                    </label>
                    <input type="tel" name="no_telp" id="no_telp" value="{{ old('no_telp') }}"
                           class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm py-2.5 px-4"
                           placeholder="08123456789">
                    @error('no_telp')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="role" class="block text-sm font-medium text-gray-700 mb-1">
                        Role User <span class="text-red-500">*</span>
                    </label>
                    <select name="role" id="role" required
                            class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm py-2.5 px-4">
                        <option value="" disabled {{ old('role') ? '' : 'selected' }}>Pilih role</option>
                        <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                        <option value="kasir" {{ old('role') == 'kasir' ? 'selected' : '' }}>Kasir</option>
                        <option value="pembeli" {{ old('role') == 'pembeli' ? 'selected' : '' }}>Pembeli</option>
                    </select>
                    @error('role')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-1">
                        Password <span class="text-red-500">*</span>
                    </label>
                    <input type="password" name="password" id="password"
                           class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm py-2.5 px-4"
                           placeholder="Minimal 8 karakter" required>
                    @error('password')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">
                        Konfirmasi Password <span class="text-red-500">*</span>
                    </label>
                    <input type="password" name="password_confirmation" id="password_confirmation"
                           class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm py-2.5 px-4"
                           placeholder="Ulangi password" required>
                    @error('password_confirmation')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Buttons -->
            <div class="flex items-center justify-end gap-4 pt-6 border-t border-gray-200">
                <a href="{{ route('user_management_view') }}"
                   class="px-5 py-2.5 bg-white border border-gray-300 rounded-lg text-gray-700 font-medium hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Batal
                </a>

                <button type="submit"
                        class="px-6 py-2.5 bg-indigo-600 text-white font-medium rounded-lg shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-colors">
                    Tambah User
                </button>
            </div>
        </form>
    </div>
</div>
    {{-- <div class="h-screen w-full flex justify-center items-center">
        <x-form back="{{ route('user_management_view') }}" action="{{ route('user_management_add_update_post') }}"
            method="post" judul="Tambah User">
            <div class="flex gap-2">
                <x-input.form-input name="name" type="text" label="Nama user"></x-input.form-input>
                <x-input.form-input name="email" type="email" label="Email user"></x-input.form-input>

            </div>
            <x-input.form-input name="no_telp" type="number" label="Nomor Telp User"></x-input.form-input>
            <x-input.form-input name="role" type="select" label="Role User">
                <option selected>pilih user</option>
                <option value="admin">admin</option>
                <option value="pembeli">pembeli</option>
                <option value="kasir">kasir</option>
            </x-input.form-input>
            <x-input.form-input name="password" type="password" label="Password User"></x-input.form-input>
            <x-input.form-input name="password_confirmation" type="password" label="Password User"></x-input.form-input>



        </x-form>
    </div> --}}
</x-admin.template-admin>
