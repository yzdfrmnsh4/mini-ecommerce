 @props(['judul' => '', 'action', 'method', 'button' => 'true', 'back' => ''])

 <div class="">
     <form action="{{ $action }}" method="{{ $method }}" enctype="multipart/form-data"
         class="flex flex-col items-center shadow-xl p-5 w-[60rem] justify-center">
         @csrf


         <h1 class="text-2xl font-semibold mb-8">{{ $judul }}</h1>
         <div class="flex flex-col gap-6 container ">

             {{ $slot }}
             {{-- <x-input.form-input name="nama" label="test"></x-input.form-input> --}}
         </div>


         @if ($button)
             <div class="flex gap-2 w-full items-center mt-[2rem]">
                 <a href="{{ $back ? $back : url()->previous() }}"
                     class="bg-slate-200 flex justify-center text-slate-800 border border-slate-800 w-full p-4 h-fit rounded-md ">Kembali</a>
                 <button class="bg-blue-800 text-white w-full p-4 rounded-md ">Tambah Data</button>


             </div>
         @endif
     </form>

 </div>
