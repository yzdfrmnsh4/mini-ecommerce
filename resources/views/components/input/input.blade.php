@props(['name', 'value' => '', 'placeholder' => '', 'type' => 'text'])

@if ($type === 'file')
    <input type="{{ $type }}" name="{{ $name }}" placeholder="{{ $placeholder }}"
        {{ $attributes->merge([
            'class' => 'block w-full text-sm text-gray-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-medium file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100',
        ]) }}>
@else
    <input type="{{ $type }}" name="{{ $name }}" value="{{ old($name, $value) }}"
        placeholder="{{ $placeholder }}"
        {{ $attributes->merge([
            'class' => 'block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm py-2.5 px-4',
        ]) }}>
@endif

@error($name)
    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
@enderror
