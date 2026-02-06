<div class="">
    {{-- <th scope="row" class="px-6 py-4 font-medium text-heading whitespace-nowrap">
        Apple MacBook Pro 17"
    </th> --}}
    <td class="px-6 py-4 whitespace-nowrap">
        <div {{ $attributes->merge(['class' => 'text-sm text-gray-500']) }}>
            {{ $slot }}
        </div>
    </td>

</div>
