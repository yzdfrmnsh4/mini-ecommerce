<x-template>
    <form class="w-full flex justify-center items-center h-screen gap-y-6" action="{{ route('register.post') }}"
        method="post">
        @csrf
        <div class="container">
            <h1 class="text-2xl ">Register</h1>

            @error('errors')
                <a class="text-red-600 ">
                    {{ $message }}
                </a>
            @enderror


            <x-input.input placeholder="name" :value="old('name')" name="name" class="border  border-b-4" type="text" />
            <x-input.input placeholder="email" name="email" :value="old('email')" class="border  border-b-4"
                type="email" />
            <x-input.input placeholder="no_telp" name="no_telp" :value="old('no_telp')" class="border  border-b-4"
                type="text" />
            <x-input.input placeholder="password" name="password" class="border  border-b-4" type="password" />
            <x-input.input placeholder="password_confirmation" name="password_confirmation" class="border  border-b-4"
                type="password" />

            <button class="bg-blue-800 text-white p-4">Daftar</button>
        </div>
    </form>
</x-template>
