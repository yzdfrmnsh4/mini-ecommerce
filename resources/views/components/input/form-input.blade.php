@props(['name' => '', 'label' => '', 'type' => 'text', 'value' => null, 'placeholder' => ''])

<div>
    <label for="{{ $name }}" class="block text-sm font-medium text-gray-700 mb-1">{{ $label }}</label>

    @if ($type === 'area')
        <x-input.textarea class="h-[8rem] " type="{{ $type }}" placeholder="{{ $placeholder }}"
            name="{{ $name }}">

            {{ old($name, $value) }}</x-input.textarea>
    @elseif ($type === 'select')
        <x-input.select :value="old($name, $value)" name="{{ $name }}">
            {{ $slot }}

        </x-input.select>
    @elseif ($type === 'multiselect')
        <x-input.select :value="old($name, $value)" :multiple="true" name="{{ $name }}">
            {{ $slot }}
        </x-input.select>
    @else
        <x-input.input class="" value="{{ $value }}" type="{{ $type }}"
            placeholder="{{ $name }}" name="{{ $name }}"></x-input.input>
    @endif
</div>
