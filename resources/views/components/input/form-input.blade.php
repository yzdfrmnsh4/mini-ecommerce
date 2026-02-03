@props(['name' => '', 'label' => '', 'type' => 'text', 'value' => ''])

<div class="flex flex-col  flex-1 gap-2">
    <label for="">{{ $label }}</label>

    @if ($type === 'area')
        <x-input.textarea class="border h-[8rem] border-slate-600 " type="{{ $type }}"
            placeholder="{{ $name }}" name="{{ $name }}">

            {{ old($name, $value) }}</x-input.textarea>
    @elseif ($type === 'select')
        <x-input.select value="{{ $value }}" name="{{ $name }}">
            {{ $slot }}

        </x-input.select>
    @elseif ($type === 'multiselect')
        <x-input.select value="{{ $value }}" :multiple="true" name="{{ $name }}">
            {{ $slot }}
        </x-input.select>
    @else
        <x-input.input class="border border-slate-600" value="{{ $value }}" type="{{ $type }}"
            placeholder="{{ $name }}" name="{{ $name }}"></x-input.input>
    @endif
</div>
