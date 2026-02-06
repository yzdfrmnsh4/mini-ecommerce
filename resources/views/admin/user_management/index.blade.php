<x-admin.template-admin>
    <div class="space-y-6">

        <!-- Header Section -->
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div>
                <h1 class="text-2xl font-semibold text-gray-900">Manajemen User</h1>
                <p class="mt-1 text-sm text-gray-500">Kelola semua akun pengguna (admin, kasir, pembeli)</p>
            </div>

            <a href="{{ route('user_management_add_view') }}"
                class="inline-flex items-center px-5 py-2.5 bg-indigo-600 text-white font-medium rounded-lg shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition-colors">
                <svg class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Tambah User Baru
            </a>
        </div>

        <!-- Table Card -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">

            <div class="flex p-2 items-center justify-between gap-1">

                <div class="px-6 py-5 border-b border-gray-200">
                    <h2 class="text-lg font-medium text-gray-900">Daftar Produk</h2>
                </div>
                <form class="flex flex-1 justify-end gap-2 h-fit">

                    <x-input.select name="role" class="w-[20rem]" :value="request('kategori')" :multiple="true">
                        @foreach ($user->pluck('role') as $item => $val)
                            <option value="">{{ $val }}</option>
                        @endforeach

                    </x-input.select>
                    <div class=" w-[20rem] flex">
                        <x-input.input class="border-100 border" placeholder="search" value="{{ request('nama') }}"
                            name="nama"></x-input.input>
                        <button class="border-100 hover:bg-slate-100 border  px-4">Cari...</button>
                    </div>
                </form>
                <!-- Table Title -->

            </div>

            @if ($user->isNotEmpty())
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col"
                                    class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Nama User
                                </th>
                                <th scope="col"
                                    class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Email
                                </th>
                                <th scope="col"
                                    class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    No. Telepon
                                </th>
                                <th scope="col"
                                    class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Role
                                </th>
                                <th scope="col"
                                    class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Dibuat Pada
                                </th>
                                <th scope="col"
                                    class="px-6 py-4 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 bg-white">
                            @foreach ($user as $item)
                                <tr class="hover:bg-gray-50 transition-colors">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm font-medium text-gray-900">{{ $item->name }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-600">{{ $item->email }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-600">{{ $item->no_telp ?? '-' }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        @php
                                            $roleClass = match ($item->role) {
                                                'admin' => 'bg-purple-100 text-purple-800',
                                                'kasir' => 'bg-blue-100 text-blue-800',
                                                default => 'bg-green-100 text-green-800',
                                            };
                                        @endphp
                                        <span
                                            class="inline-flex px-2.5 py-0.5 rounded-full text-xs font-medium {{ $roleClass }}">
                                            {{ ucfirst($item->role) }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-500">
                                            {{ $item->created_at->format('d M Y') }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <div class="flex items-center justify-end gap-4">
                                            <a href="{{ route('user_management_edit_view', $item->id) }}"
                                                class="text-indigo-600 hover:text-indigo-800 transition-colors">
                                                Edit
                                            </a>
                                            <button
                                                onclick="confirmation('{{ route('user_management_delete', $item->id) }}', 'Anda yakin akan menghapus user ini?', 'post')"
                                                class="text-red-600 hover:text-red-800 transition-colors">
                                                Hapus
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                {{-- @if ($user->hasPages())
                <div class="px-6 py-4 border-t border-gray-200 flex items-center justify-between text-sm">
                    <div class="text-gray-600">
                        Menampilkan {{ $user->firstItem() }} - {{ $user->lastItem() }} dari {{ $user->total() }} user
                    </div>
                    {{ $user->links('pagination::tailwind') }}
                </div>
            @endif --}}
            @else
                <!-- Empty State -->
                <div class="px-6 py-20 text-center">
                    <svg class="mx-auto h-16 w-16 text-gray-400" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                    <h3 class="mt-4 text-lg font-medium text-gray-900">Belum ada user</h3>
                    <p class="mt-1 text-sm text-gray-500">Mulai dengan menambahkan user baru.</p>
                    <div class="mt-6">
                        <a href="{{ route('user_management_add_view') }}"
                            class="inline-flex items-center px-4 py-2 bg-indigo-600 text-white text-sm font-medium rounded-md hover:bg-indigo-700">
                            Tambah User
                        </a>
                    </div>
                </div>
            @endif
        </div>

    </div>
</x-admin.template-admin>
