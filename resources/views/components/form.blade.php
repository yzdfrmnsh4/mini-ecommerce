 @props(['judul' => '','deskripsi' => '', 'action', 'method', 'button' => 'true', 'back' => ''])

 <div class="px-6 py-5 border-b border-gray-200">
     <div class="flex items-center justify-between">
         <div>
             <h1 class="text-xl font-semibold text-gray-900">{{ $judul }}</h1>
                 <p class="mt-1 text-sm text-gray-500">{{ $deskripsi }}</p>
         </div>

         @if ($button)
             <a href="{{ $back ? $back : url()->previous() }}"
                 class="text-gray-600 hover:text-gray-900 text-sm font-medium flex items-center gap-1">
                 <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                         d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                 </svg>
                 Kembali
             </a>
         @endif


     </div>
 </div>

 <form action="{{ $action }}" method="{{ $method }}" enctype="multipart/form-data" class="p-6 space-y-6">
     @csrf

    {{ $slot }}
 </form>
