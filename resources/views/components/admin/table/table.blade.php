@props(['th' => [], 'insert' => ''])

<div class="relative overflow-x-auto bg-white shadow-xs rounded-base border border-default">

    <div class="p-4 flex-col flex">
        <a class="text-2xl">Aksi</a>

        <div class="aksi mt-[2rem] flex gap-[1rem] justify-between">
            <a href="{{ $insert }}" class="bg-blue-600 text-white p-3 rounded-lg">Tambah data</a>

            <form action="" method="get">
                <div class="flex items-center px-4 gap-2">
                    <label>Search</label>
                    <x-input.input name="search" placeholder="Search..."></x-input.input>
                    <button class="border p-2 px-4 bg-slate-200">Cari</button>
                </div>
            </form>
        </div>
    </div>
    <table class="w-full text-sm text-left rtl:text-right text-body">
        <thead class="text-sm text-body bg-neutral-secondary-medium border-b border-default-medium">
            <tr>

                @foreach ($th as $item)
                    <th scope="col" class="px-6 py-3 font-medium">
                        {{ $item }}
                    </th>
                @endforeach
            </tr>
        </thead>
        <tbody>

            {{ $slot }}
        </tbody>
    </table>
</div>
