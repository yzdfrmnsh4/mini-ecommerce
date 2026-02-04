 {{-- @props(['name', 'size', 'value' => null])
 <div class="flex items-center gap-4 w-fit">
     <a id="minus-{{ $name }}"
         class="bg-gray-200 flex items-center justify-center hover:bg-gray-300 cursor-pointer text-gray-800 font-semibold w-{{ $size ?? 8 }} h-{{ $size ?? 8 }} rounded-lg transition">
         -
     </a>
     <input type="number" name="{{ $name }}" id="qty" value="{{ $value ? $value : 1 }}"
         class="w-{{ 10 }} text-center border-2 border-gray-300 rounded-lg py-1 font-semibold focus:outline-none focus:border-blue-600">
     <a id="plus-{{ $name }}"
         class="bg-gray-200 items-center justify-center flex hover:bg-gray-300 cursor-pointer text-gray-800 font-semibold w-{{ $size ?? 8 }} h-{{ $size ?? 8 }} rounded-lg transition">
         +
     </a>
 </div>

 <script>
     const minusBtn = document.getElementById('minus-' + @json($name));
     const plusBtn = document.getElementById('plus-' + @json($name));
     const qtyInput = document.getElementById('qty');

     plusBtn.addEventListener('click', () => {
         qtyInput.value = parseInt(qtyInput.value) + 1;
     });

     minusBtn.addEventListener('click', () => {
         if (qtyInput.value > 1) {
             qtyInput.value = parseInt(qtyInput.value) - 1;
         }
     });

     // Kalau user ketik manual
     qtyInput.addEventListener('input', () => {
         if (qtyInput.value < 1 || qtyInput.value === '') {
             qtyInput.value = 1;
         }
     });
 </script> --}}
 @props(['name', 'size' => 8, 'value' => 1])

 <div class="flex items-center gap-4 w-fit counter">
     <button type="button"
         class="minus bg-gray-200 flex items-center justify-center hover:bg-gray-300 cursor-pointer text-gray-800 font-semibold w-{{ $size }} h-{{ $size }} rounded-lg transition">
         -
     </button>

     <input type="number" name="{{ $name }}" value="{{ $value }}" min="1"
         class="qty-input w-10 text-center border-2 border-gray-300 rounded-lg py-1 font-semibold focus:outline-none focus:border-blue-600">

     <button type="button"
         class="plus bg-gray-200 items-center justify-center flex hover:bg-gray-300 cursor-pointer text-gray-800 font-semibold w-{{ $size }} h-{{ $size }} rounded-lg transition">
         +
     </button>
 </div>
