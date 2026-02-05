   @php
       if (Auth::check()) {
           $keranjang = \App\Models\keranjang::where('id_user', Auth::user()->id)
               ->pluck('qty')
               ->sum();
       }
   @endphp
   <nav class="sticky top-0 w-full bg-white shadow-md z-50">
       <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4 flex justify-between items-center">
           <div class="text-2xl font-bold text-indigo-600">Caysie.today</div>

           <!-- Desktop Menu -->
           <ul class="hidden md:flex gap-8 items-center text-sm font-medium text-gray-700">
               <li><a href="#" class="hover:text-indigo-600 transition-colors">Beranda</a></li>
               <li><a href="#" class="hover:text-indigo-600 transition-colors">Produk</a></li>
               <li><a href="#" class="hover:text-indigo-600 transition-colors">Tentang</a></li>
               <li><a href="#" class="hover:text-indigo-600 transition-colors">Kontak</a></li>
           </ul>

           <!-- Right Section -->
           <div class="flex items-center gap-6">
               <!-- Search (desktop) -->
               <div class="hidden md:flex relative">
                   <input type="text" placeholder="Cari produk..."
                       class="pl-10 pr-4 py-2 rounded-lg border border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 outline-none transition-all w-64">
                   <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-5 h-5 text-gray-400" fill="none"
                       stroke="currentColor" viewBox="0 0 24 24">
                       <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                           d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                   </svg>
               </div>

               @if (Auth::check())
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
               <button class="md:hidden text-gray-600 hover:text-indigo-600">
                   <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                       xmlns="http://www.w3.org/2000/svg">
                       <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                           d="M4 6h16M4 12h16M4 18h16"></path>
                   </svg>
               </button>
           </div>
       </div>
   </nav>
