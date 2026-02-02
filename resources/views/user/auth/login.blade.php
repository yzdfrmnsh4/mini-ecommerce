<x-template>
    <div class="w-full h-screen flex justify-center items-center">

        <form method="post" action="{{ route('login.post') }}"
            class="max-w-[50rem] w-full p-[6rem] flex flex-col items-center  justify-between  shadow-xl">

            @csrf
            <a class="text-4xl">Login</a>
            <div class="w-full mt-8 flex flex-col gap-8">
                <x-input.input name="email" :value="old('email')" placeholder="Email" />
                <x-input.input name="password" :value="old('password')" placeholder="Password" />
            </div>

            @error('errors')
                <div class="bg-red-100 mt-7 text-red-800 border border-red-800 w-full text-center">{{ $message }}</div>
            @enderror

            <button class="text-white mt-[4rem] bg-blue-600 p-2 w-full">Masuk</button>
            <a href="{{ route('register_view') }}"
                class="text-slate-700 flex justify-center bg-gray-200 mt-2 p-2 w-full">Daftar</a>
        </form>
    </div>

</x-template>
