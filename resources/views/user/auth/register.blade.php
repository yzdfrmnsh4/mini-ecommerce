<x-template>
    <div class="min-h-screen flex flex-col lg:flex-row">

        <!-- Right side: Register Form -->
        <div class="flex-1 flex items-center justify-center bg-white p-6 lg:p-12 min-h-screen lg:min-h-0">

            <div class="w-full max-w-md">

                <!-- Brand / Title -->
                <div class="text-center mb-10">
                    <div class="inline-flex items-center gap-2">
                        <span class="text-4xl font-bold text-indigo-600">Caysie.today</span>
                    </div>
                    <p class="text-gray-500 mt-1">Join and start managing your shop today</p>
                </div>

                <form method="POST" action="{{ route('register.post') }}" class="space-y-5">
                    @csrf

                    <!-- Name -->
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
                        <input 
                            id="name" 
                            name="name" 
                            type="text" 
                            value="{{ old('name') }}" 
                            required 
                            autocomplete="name"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 bg-gray-50/50 transition"
                            placeholder="John Doe" 
                        />
                    </div>

                    <div class="grid grid-cols-2 gap-3">
                        <!-- Email -->
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                            <input 
                                id="email" 
                                name="email" 
                                type="email" 
                                value="{{ old('email') }}" 
                                required 
                                autocomplete="email"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 bg-gray-50/50 transition"
                                placeholder="you@example.com" 
                            />
                        </div>

                        <!-- No Telp -->
                        <div>
                            <label for="no_telp" class="block text-sm font-medium text-gray-700 mb-1">No Telp</label>
                            <input 
                                id="no_telp" 
                                name="no_telp" 
                                type="tel" 
                                value="{{ old('no_telp') }}" 
                                required 
                                autocomplete="tel"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 bg-gray-50/50 transition"
                                placeholder="+62 812 3456 7890" 
                            />
                        </div>

                        <!-- Password -->
                        <div class="relative" x-data="{ showPassword: false }">
                            <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                            <input 
                                :type="showPassword ? 'text' : 'password'" 
                                id="password" 
                                name="password" 
                                required 
                                autocomplete="new-password"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 bg-gray-50/50 transition pr-11"
                                placeholder="••••••••" 
                            />
                            <button 
                                type="button" 
                                @click="showPassword = !showPassword"
                                class="absolute right-3 top-9 text-gray-500 hover:text-gray-700 focus:outline-none transition"
                            >
                                <svg 
                                    x-show="!showPassword" 
                                    xmlns="http://www.w3.org/2000/svg" 
                                    width="20" 
                                    height="20" 
                                    viewBox="0 0 24 24" 
                                    fill="none" 
                                    stroke="currentColor" 
                                    stroke-width="2" 
                                    stroke-linecap="round" 
                                    stroke-linejoin="round" 
                                    class="lucide lucide-eye"
                                >
                                    <path d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z" />
                                    <circle cx="12" cy="12" r="3" />
                                </svg>

                                <svg 
                                    x-show="showPassword" 
                                    xmlns="http://www.w3.org/2000/svg" 
                                    width="20" 
                                    height="20" 
                                    viewBox="0 0 24 24" 
                                    fill="none" 
                                    stroke="currentColor" 
                                    stroke-width="2" 
                                    stroke-linecap="round" 
                                    stroke-linejoin="round" 
                                    class="lucide lucide-eye-off"
                                >
                                    <path d="M9.88 9.88a3 3 0 1 0 4.24 4.24" />
                                    <path d="M10.73 5.08A10.43 10.43 0 0 1 12 5c7 0 10 7 10 7a13.16 13.16 0 0 1-1.67 2.68" />
                                    <path d="M6.61 6.61A13.526 13.526 0 0 0 2 12s3 7 10 7a9.74 9.74 0 0 0 5.39-1.61" />
                                    <line x1="2" x2="22" y1="2" y2="22" />
                                </svg>
                            </button>
                        </div>

                        <!-- Password Confirmation -->
                        <div class="relative" x-data="{ showConfirmPassword: false }">
                            <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">Konfirmasi Password</label>
                            <input 
                                :type="showConfirmPassword ? 'text' : 'password'" 
                                id="password_confirmation" 
                                name="password_confirmation" 
                                required 
                                autocomplete="new-password"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 bg-gray-50/50 transition pr-11"
                                placeholder="••••••••" 
                            />
                            <button 
                                type="button" 
                                @click="showConfirmPassword = !showConfirmPassword"
                                class="absolute right-3 top-9 text-gray-500 hover:text-gray-700 focus:outline-none transition"
                            >
                                <svg 
                                    x-show="!showConfirmPassword" 
                                    xmlns="http://www.w3.org/2000/svg" 
                                    width="20" 
                                    height="20" 
                                    viewBox="0 0 24 24" 
                                    fill="none" 
                                    stroke="currentColor" 
                                    stroke-width="2" 
                                    stroke-linecap="round" 
                                    stroke-linejoin="round" 
                                    class="lucide lucide-eye"
                                >
                                    <path d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z" />
                                    <circle cx="12" cy="12" r="3" />
                                </svg>

                                <svg 
                                    x-show="showConfirmPassword" 
                                    xmlns="http://www.w3.org/2000/svg" 
                                    width="20" 
                                    height="20" 
                                    viewBox="0 0 24 24" 
                                    fill="none" 
                                    stroke="currentColor" 
                                    stroke-width="2" 
                                    stroke-linecap="round" 
                                    stroke-linejoin="round" 
                                    class="lucide lucide-eye-off"
                                >
                                    <path d="M9.88 9.88a3 3 0 1 0 4.24 4.24" />
                                    <path d="M10.73 5.08A10.43 10.43 0 0 1 12 5c7 0 10 7 10 7a13.16 13.16 0 0 1-1.67 2.68" />
                                    <path d="M6.61 6.61A13.526 13.526 0 0 0 2 12s3 7 10 7a9.74 9.74 0 0 0 5.39-1.61" />
                                    <line x1="2" x2="22" y1="2" y2="22" />
                                </svg>
                            </button>
                        </div>
                    </div>

                    <!-- Error -->
                    @error('errors')
                        <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg text-sm">
                            {{ $message }}
                        </div>
                    @enderror

                    @if ($errors->hasAny(['name','email','no_telp','password','password_confirmation']))
                        <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg text-sm">
                            Perbaiki kesalahan di atas.
                        </div>
                    @endif


                    <!-- Submit -->
                    <button 
                        type="submit"
                        class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-medium py-3 px-4 rounded-lg transition duration-200 shadow-md mt-2"
                    >
                        Daftar
                    </button>

                    <!-- Login link -->
                    <div class="text-center mt-6">
                        <p class="text-sm text-gray-600">
                            Sudah Punya Akun?
                            <a href="{{ route('login_view') }}"
                               class="text-indigo-600 hover:text-indigo-800 font-medium">
                                Login di sini
                            </a>
                        </p>
                    </div>

                </form>

                <!-- Footer -->
                <div class="mt-12 text-center text-xs text-gray-400 space-x-4">
                    <a href="#" class="hover:text-gray-600">Privacy Policy</a>
                    <span>•</span>
                    <a href="#" class="hover:text-gray-600">Terms</a>
                    <span>•</span>
                    <a href="#" class="hover:text-gray-600">FAQ</a>
                </div>

            </div>
        </div>

    </div>
</x-template>