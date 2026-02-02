<x-template>
    <div class="min-h-screen flex flex-col lg:flex-row ">

        {{-- <div class="hidden lg:flex lg:w-1/2 bg-gradient-to-br from-purple-50 via-indigo-50 to-blue-50 items-center justify-center p-8 relative overflow-hidden">

            <!-- Background subtle elements -->
            <div class="absolute inset-0 opacity-20 pointer-events-none">
                <div class="absolute -top-20 -left-20 w-96 h-96 bg-purple-300 rounded-full blur-3xl"></div>
                <div class="absolute -bottom-20 -right-20 w-96 h-96 bg-blue-300 rounded-full blur-3xl"></div>
            </div>

            <div class="w-full max-w-4xl relative z-10">

                <!-- Header text -->
                <div class="text-center mb-10">
                    <h1 class="text-5xl font-bold text-indigo-700">Empower</h1>
                    <p class="text-xl text-indigo-600/80 mt-2">your shop management</p>
                </div>

                <!-- Cards & Chart container -->
                <div class="space-y-6">

                    <!-- Top metrics cards -->
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">

                        <div class="bg-white/80 backdrop-blur-md rounded-2xl p-5 shadow-lg border border-white/50">
                            <p class="text-sm text-gray-600">Customer Retention</p>
                            <p class="text-3xl font-bold text-green-600 mt-1">24,9%</p>
                        </div>

                        <div class="bg-white/80 backdrop-blur-md rounded-2xl p-5 shadow-lg border border-white/50">
                            <p class="text-sm text-gray-600">Needs Attention</p>
                            <p class="text-3xl font-bold text-orange-500 mt-1">12</p>
                            <p class="text-xs text-gray-500 mt-1">Products</p>
                        </div>

                        <div class="bg-white/80 backdrop-blur-md rounded-2xl p-5 shadow-lg border border-white/50">
                            <p class="text-sm text-gray-600">Average Sales</p>
                            <p class="text-3xl font-bold text-indigo-600 mt-1">$21,845</p>
                        </div>

                    </div>

                    <!-- Chart area (simulasi sederhana dengan Tailwind + pseudo element) -->
                    <div
                        class="bg-white/80 backdrop-blur-md rounded-2xl p-6 shadow-lg border border-white/50 h-64 relative">

                        <div class="absolute inset-0 flex items-center justify-center opacity-40 pointer-events-none">
                            <div
                                class="w-full h-40 bg-gradient-to-r from-indigo-400 via-purple-400 to-blue-400 rounded-full blur-3xl">
                            </div>
                        </div>

                        <div class="relative z-10">
                            <p class="text-sm text-gray-500 mb-2">Average sales · Jul 1, 2025 – Jul 30, 2025</p>

                            <!-- Fake line chart visualization -->
                            <div class="h-40 flex items-end gap-1 pb-4">
                                <div class="w-full h-20 bg-indigo-500/40 rounded-t-md"></div>
                                <div class="w-full h-28 bg-indigo-500/50 rounded-t-md"></div>
                                <div class="w-full h-36 bg-indigo-500/60 rounded-t-md"></div>
                                <div class="w-full h-32 bg-indigo-500/70 rounded-t-md relative">
                                    <div
                                        class="absolute -top-6 left-1/2 -translate-x-1/2 bg-white text-xs px-2 py-1 rounded shadow text-indigo-700 font-medium">
                                        $21,845
                                    </div>
                                </div>
                                <div class="w-full h-40 bg-indigo-600 rounded-t-md"></div>
                                <div class="w-full h-24 bg-indigo-500/50 rounded-t-md"></div>
                            </div>

                            <div class="flex justify-between text-xs text-gray-500 mt-2">
                                <span>6</span><span>7</span><span>8</span><span>9</span><span>10</span><span>11</span><span>12</span><span>13</span><span>14</span><span>15</span>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div> --}}

        <div class="flex-1 flex items-center justify-center bg-white p-6 lg:p-12 min-h-screen lg:min-h-0">

            <div class="w-full max-w-md">

                <!-- Logo / Brand -->
                <div class="text-center mb-10">
                    <div class="inline-flex items-center gap-2">
                        <span class="text-4xl font-bold text-indigo-600">Caysie.today</span>
                    </div>
                    {{-- <p class="text-gray-500 mt-1">Login</p> --}}
                    <p class="text-sm text-gray-400 mt-1">Please login to continue</p>
                </div>

                <form method="POST" action="{{ route('login.post') }}" class="space-y-6">
                    @csrf

                    <!-- Email -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                        <input id="email" name="email" type="email" value="{{ old('email') }}" required
                            autocomplete="email"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 bg-gray-50/50 transition"
                            placeholder="you@example.com" />
                    </div>

                    <!-- Password -->
<div class="relative" x-data="{ showPassword: false }">
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                        <input 
                            :type="showPassword ? 'text' : 'password'" 
                            id="password" 
                            name="password" 
                            required 
                            autocomplete="current-password"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 bg-gray-50/50 transition pr-11"
                            placeholder="••••••••" 
                        />

                        <!-- Toggle icon menggunakan Lucide SVG inline -->
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

                    <!-- Error message -->
                    @error('errors')
                        <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg text-sm">
                            {{ $message }}
                        </div>
                    @enderror

                    <!-- Submit -->
                    <button type="submit"
                        class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-medium py-3 px-4 rounded-lg transition duration-200 shadow-md">
                        Login
                    </button>

                    <!-- Register link -->
                    <div class="text-center mt-4 text-sm">
                         Belum Punya Akun?
                        <a href="{{ route('register_view') }}"
                            class="text-indigo-600 hover:text-indigo-800 text-sm font-medium">
                            Daftar Sekarang
                        </a>
                    </div>

                </form>

                <!-- Footer links -->
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
