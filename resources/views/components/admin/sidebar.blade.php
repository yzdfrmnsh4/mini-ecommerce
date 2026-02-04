<div class="bg-slate-800 text-white w-[300px] h-screen">
    <div class="heading h-[100px] text-3xl font-semibold flex items-center justify-center">Panel Control
    </div>

    <x-admin.sidelink href="{{ route('admin.dashboard.view') }}">Dashboard</x-admin.sidelink>
    <x-admin.sidelink href="{{ route('admin.kategori.view') }}" :active="['admin.kategori.view', 'admin.add_kategori.view', 'admin.edit_kategori.view']">Kategori</x-admin.sidelink>
    <x-admin.sidelink href="{{ route('admin.produk.view') }}" :active="['admin.add_produk.view', 'admin.edit_produk.view']">produk</x-admin.sidelink>
    <x-admin.sidelink href="{{ route('user_management_view') }}" :active="['user_management_add_view', 'user_management_edit_view']">User Management</x-admin.sidelink>
</div>
