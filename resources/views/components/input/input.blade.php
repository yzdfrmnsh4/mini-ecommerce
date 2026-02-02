@props(['name', 'value' => '', 'placeholder' => '', 'type' => 'text'])

<input type="{{ $type }}" name="{{ $name }}" value="{{ old($name, $value) }}"
    placeholder="{{ $placeholder }}"
    {{ $attributes->merge([
        'class' => 'w-full border border-gray-300 rounded-md px-3 py-2 focus:ring focus:ring-blue-200',
    ]) }}>

@error($name)
    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
@enderror
