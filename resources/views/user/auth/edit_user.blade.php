<x-template>
    <form class="w-full flex justify-center items-center h-screen gap-y-6" action="{{ route('edit.post', $data->id) }}"
        method="post">
        @csrf
        <div class="container">
            <h1 class="text-2xl ">Register</h1>

            @error('errors')
                <a class="text-red-600 ">
                    {{ $message }}
                </a>
            @enderror


            <x-input.input placeholder="name" :value="$data['name']" name="name" class="border  border-b-4" type="text" />
            <x-input.input placeholder="email" name="email" :value="$data['email']" class="border  border-b-4"
                type="email" />
            <x-input.input placeholder="no_telp" name="no_telp" :value="$data['no_telp']" class="border  border-b-4"
                type="text" />


            <button class="bg-blue-800 text-white p-4">Ubah Data</button>
        </div>
    </form>
</x-template>
