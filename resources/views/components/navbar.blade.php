   @php
       if (Auth::check()) {
           $keranjang = \App\Models\keranjang::where('id_user', Auth::user()->id)
               ->pluck('qty')
               ->sum();
       }
   @endphp
   <nav class="sticky top-0 w-full bg-white shadow-md z-50">
       <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4 flex justify-between items-center">
           <a href="/" class="text-2xl font-bold text-indigo-600">Caysie.today</a>

           <!-- Desktop Menu -->
           {{-- <ul class="hidden md:flex gap-8 items-center text-sm font-medium text-gray-700">
               <li><a href="#" class="hover:text-indigo-600 transition-colors">Beranda</a></li>
               <li><a href="#" class="hover:text-indigo-600 transition-colors">Produk</a></li>
               <li><a href="#" class="hover:text-indigo-600 transition-colors">Tentang</a></li>
               <li><a href="#" class="hover:text-indigo-600 transition-colors">Kontak</a></li>
           </ul> --}}

           <!-- Right Section -->
           <div class="flex items-center gap-6">
               <!-- Search (desktop) -->
               {{-- <div class="hidden md:flex relative">
                   <input type="text" placeholder="Cari produk..."
                       class="pl-10 pr-4 py-2 rounded-lg border border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 outline-none transition-all w-64">
                   <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-5 h-5 text-gray-400" fill="none"
                       stroke="currentColor" viewBox="0 0 24 24">
                       <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                           d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                   </svg>
               </div> --}}

               @if (Auth::check())
                   <div class="flex gap-2">
                       <!-- Keranjang jika sudah login -->
                       <a href="{{ route('detail_keranjang') }}"
                           class="relative text-gray-600 hover:text-indigo-600 transition-colors">
                           <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                               xmlns="http://www.w3.org/2000/svg">
                               <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                   d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63 .63-.184 1.707 .707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z">
                               </path>
                           </svg>
                           <span
                               class="absolute -top-1 -right-1 bg-indigo-600 text-white text-xs rounded-full w-5 h-5 flex items-center justify-center">
                               {{ $keranjang ?? 0 }}
                           </span>
                       </a>

                       <div class="relative" id="profile-dropdown">
                           <button
                               class="flex items-center gap-2 text-gray-700 hover:text-indigo-600 transition-colors focus:outline-none">
                               <!-- Icon User -->
                               <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                   fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                   stroke-linejoin="round" class="lucide lucide-user">
                                   <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2" />
                                   <circle cx="12" cy="7" r="4" />
                               </svg>

                               <!-- Nama User -->
                               <span class="font-medium text-sm md:text-base">{{ Auth::user()->name }}</span>

                               <!-- Carrot Icon -->
                               <svg id="carrot-icon" class="w-4 h-4 transition-transform duration-200" fill="none"
                                   stroke="currentColor" viewBox="0 0 24 24">
                                   <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                       d="M19 9l-7 7-7-7" />
                               </svg>
                           </button>

                           <!-- Dropdown Menu -->
                           <div id="dropdown-menu"
                               class="absolute right-0 mt-2 w-48 bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden opacity-0 scale-95 translate-y-2 pointer-events-none transition-all duration-200">

                               <a href="profile_view"
                                   class="block px-5 py-3 text-gray-700 hover:bg-indigo-50 hover:text-indigo-600 transition-colors flex items-center gap-3">
                                   <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                       <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                           d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                   </svg>
                                   Profile Saya
                               </a>

                               <a href="pesanan_saya"
                                   class="block px-5 py-3 text-gray-700 hover:bg-indigo-50 hover:text-indigo-600 transition-colors flex items-center gap-3">
                                   <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                       <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                           d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                                   </svg>
                                   Pesanan Saya
                               </a>

                               <form method="POST" action="{{ route('logout') }}">
                                   @csrf
                                   <button type="submit"
                                       class="w-full text-left px-5 py-3 text-gray-700 hover:bg-indigo-50 hover:text-indigo-600 transition-colors flex items-center gap-3">
                                       <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                           <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                               d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                       </svg>
                                       Logout
                                   </button>
                               </form>
                           </div>
                       </div>

                   </div>
               @else
                   <!-- Login & Register jika belum login -->
                   <div class="hidden md:flex items-center gap-4">
                       <a href="{{ route('login_view') }}"
                           class="px-5 py-2.5 text-gray-700 font-medium rounded-lg border border-gray-300 hover:bg-gray-50 transition-colors">
                           Masuk
                       </a>
                       <a href="{{ route('register_view') }}"
                           class="px-5 py-2.5 bg-indigo-600 text-white font-medium rounded-lg shadow-sm hover:bg-indigo-700 transition-colors">
                           Daftar
                       </a>
                   </div>
               @endif

               <!-- Mobile menu button -->
               {{-- <button class="md:hidden text-gray-600 hover:text-indigo-600">
                   <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                       xmlns="http://www.w3.org/2000/svg">
                       <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                           d="M4 6h16M4 12h16M4 18h16"></path>
                   </svg>
               </button> --}}
           </div>
       </div>
   </nav>
