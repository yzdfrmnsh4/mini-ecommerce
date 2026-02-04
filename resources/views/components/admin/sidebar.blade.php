<div class="bg-slate-800 text-white w-[300px] h-screen">
    <div class="heading h-[100px] text-3xl font-semibold flex items-center justify-center">Panel Control
    </div>

    <x-admin.sidelink href="{{ route('admin.dashboard.view') }}">Dashboard</x-admin.sidelink>
    <x-admin.sidelink href="{{ route('admin.kategori.view') }}" :active="[route('admin.add_kategori.view')]">Kategori</x-admin.sidelink>
    <x-admin.sidelink href="{{ route('admin.produk.view') }}">produk</x-admin.sidelink>
    <x-admin.sidelink href="{{ route('user_management_view') }}">User Management</x-admin.sidelink>
</div>
