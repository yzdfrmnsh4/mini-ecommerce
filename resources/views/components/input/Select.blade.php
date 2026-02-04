@props(['name', 'value' => null, 'multiple' => false, 'class' => ''])

@if ($multiple)
    <select id="ts-{{ $name }}" name="{{ $name }}[]" multiple
        class="w-full border border-gray-300 rounded-lg shadow-sm focus:border-indigo-500 focus:ring-indigo-500 {{ $class }}">
        {{ $slot }}
    </select>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const selectEl = document.getElementById('ts-{{ $name }}');
            if (!selectEl) {
                console.warn("TomSelect: Element #ts-{{ $name }} not found");
                return;
            }

            if (typeof TomSelect === 'undefined') {
                console.error("TomSelect library not loaded! Pastikan CSS & JS sudah include.");
                return;
            }

            const tom = new TomSelect(selectEl, {
                plugins: ['remove_button', 'dropdown_input'],
                maxItems: null,
                placeholder: 'Pilih satu atau lebih...',
                hidePlaceholder: true,
                dropdownParent: 'body',           // ← Kunci utama: pindah ke body
                controlInput: null,               // agar searchable
                // Agar dropdown tetap di posisi benar
                dropdownContentClass: 'ts-dropdown-content',
                // Custom render biar match tema
                render: {
                    item: function (data, escape) {
                        return `<div class="inline-flex items-center px-2.5 py-1 rounded-md text-sm font-medium bg-indigo-100 text-indigo-800 mr-1.5 mb-1">
                            ${escape(data.text)}
                            <button type="button" class="ml-1.5 text-indigo-600 hover:text-indigo-900">×</button>
                        </div>`;
                    },
                    option: function (data, escape) {
                        return `<div class="px-3 py-2 hover:bg-indigo-50 cursor-pointer">${escape(data.text)}</div>`;
                    }
                }
            });

            // Set nilai awal (old atau dari database)
            const initial = @json($value ?? old($name));
            if (initial) {
                if (Array.isArray(initial)) {
                    tom.addItems(initial);
                } else {
                    tom.addItem(initial);
                }
            }
        });
    </script>
@else
<!-- select single biasa -->
<select id="ts-{{ $name }}" name="{{ $name }}"
    class="w-full border border-gray-300 rounded-lg shadow-sm focus:border-indigo-500 focus:ring-indigo-500 py-2.5 px-4 cursor-pointer {{ $class }}">
    {{ $slot }}
</select>
@endif