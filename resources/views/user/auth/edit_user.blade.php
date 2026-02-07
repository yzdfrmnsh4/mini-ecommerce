<x-template>

    <div class="min-h-screen bg-gray-50 flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-6xl w-full space-y-8">

            <!-- Card Container -->
            <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden">

                <!-- Header -->
                <div class="bg-gradient-to-r from-indigo-600 to-indigo-700 px-8 py-10 text-white text-center">
                    <h1 class="text-3xl font-bold tracking-tight">Edit Profil</h1>
                    <p class="mt-3 text-indigo-100">
                        Perbarui informasi akun Anda dengan mudah
                    </p>
                </div>

                <!-- Form -->
                <form action="{{ route('edit.post', $data->id) }}" method="post" class="px-8 py-10 space-y-8">
                    @csrf

                    <!-- Error Global -->
                    @error('errors')
                        <div class="bg-red-50 border-l-4 border-red-500 text-red-700 p-4 rounded-lg">
                            {{ $message }}
                        </div>
                    @enderror

                    <!-- Nama -->

                    <h1 class="text-2xl font-semibold">Edit Data Diri
                        <br>
                        <span class="text-base font-normal">Form untuk mengubah data diri anda di toko kami!</span>
                    </h1>
                    <hr>


                    <div class="space-y-2">
                        <label for="name" class="block text-sm font-medium text-gray-700">
                            Nama Lengkap <span class="text-red-500">*</span>
                        </label>
                        <x-input.input id="name" placeholder="Nama Lengkap" :value="$data['name']" name="name"
                            type="text"
                            class="block w-full px-4 py-3 border border-gray-300 rounded-xl shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all text-gray-900 placeholder-gray-400"
                            required />
                    </div>

                    <!-- Email -->
                    <div class="space-y-2">
                        <label for="email" class="block text-sm font-medium text-gray-700">
                            Email <span class="text-red-500">*</span>
                        </label>
                        <x-input.input id="email" placeholder="contoh@email.com" name="email" :value="$data['email']"
                            type="email"
                            class="block w-full px-4 py-3 border border-gray-300 rounded-xl shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all text-gray-900 placeholder-gray-400"
                            required />
                    </div>

                    <!-- No. Telepon -->
                    <div class="space-y-2">
                        <label for="no_telp" class="block text-sm font-medium text-gray-700">
                            Nomor Telepon
                        </label>
                        <x-input.input id="no_telp" placeholder="0812-3456-7890" name="no_telp" :value="$data['no_telp']"
                            type="tel"
                            class="block w-full px-4 py-3 border border-gray-300 rounded-xl shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all text-gray-900 placeholder-gray-400" />
                    </div>


                    <h1 class="text-2xl font-semibold">Edit Password
                        <br>
                        <span class="text-base font-normal">Section untuk mengubah password anda</span>
                    </h1>
                    <hr>

                    <div class="space-y-2">
                        <label for="password_lama" class="block text-sm font-medium text-gray-700">
                            Password lama
                        </label>
                        <x-input.input id="password_lama" placeholder="Passwod lama anda" name="password_lama"
                            type="password"
                            class="block w-full px-4 py-3 border border-gray-300 rounded-xl shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all text-gray-900 placeholder-gray-400" />
                    </div>
                    <div class="space-y-2">
                        <label for="password" class="block text-sm font-medium text-gray-700">
                            Password baru
                        </label>
                        <x-input.input id="password" placeholder="Passwod baru anda" name="password" type="password"
                            class="block w-full px-4 py-3 border border-gray-300 rounded-xl shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all text-gray-900 placeholder-gray-400" />
                    </div>
                    <div class="space-y-2">
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-700">
                            Ulangi password baru
                        </label>
                        <x-input.input id="password_confirmation" placeholder="Ulangi passwod baru anda"
                            name="password_confirmation" type="password"
                            class="block w-full px-4 py-3 border border-gray-300 rounded-xl shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all text-gray-900 placeholder-gray-400" />
                    </div>



                    <!-- Tombol Submit -->
                    <div class="pt-6">
                        <button type="submit"
                            class="w-full bg-indigo-600 text-white font-semibold py-4 rounded-xl hover:bg-indigo-700 transition-all shadow-lg hover:shadow-xl transform hover:scale-[1.02] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Ubah Data
                        </button>
                    </div>

                    <!-- Tombol Kembali -->
                    <div class="text-center">
                        <a href="{{ route('profile_view') }}"
                            class="text-indigo-600 hover:text-indigo-800 font-medium transition-colors">
                            Kembali ke Profil
                        </a>
                    </div>
                </form>

            </div>

        </div>
    </div>

</x-template>
