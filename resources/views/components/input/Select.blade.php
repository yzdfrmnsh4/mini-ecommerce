@props(['name', 'value' => null, 'multiple' => false])

@if ($multiple)
    <select id="{{ $name }}" name="{{ $name }}[]" multiple>
        {{ $slot }}
    </select>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const el = document.getElementById(@json($name));

            if (el) {
                const tom = new TomSelect(el, {
                    plugins: ["remove_button"],
                    maxItems: null
                });

                tom.setValue(@json($value)); // ← INI YANG BENER
            }
        });
    </script>
@else
    <select id="{{ $name }}" name="{{ $name }}"
        {{ $attributes->merge([
            'class' => 'w-full border border-gray-300 rounded-md px-3 py-2 focus:ring focus:ring-blue-200',
        ]) }}>
        {{ $slot }}
    </select>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const el = document.getElementById(@json($name));
            if (el && @json($value) !== null) {
                el.value = @json($value);
            }
        });
    </script>
@endif
