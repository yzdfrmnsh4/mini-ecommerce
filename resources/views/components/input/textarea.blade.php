@props(['name', 'value' => '', 'placeholder' => '', 'type' => 'text'])

<textarea class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm py-2.5 px-4" type="{{ $type }}" name="{{ $name }}"
    value="{{ old($name, $value) }}" placeholder="{{ $placeholder }}"
    {{ $attributes->merge([
        'class' =>
            'w-full  p-1 leading-tight indent-0 resize-none border border-gray-300 rounded-md px-3 py-2 focus:ring focus:ring-blue-200',
    ]) }}>{{ $slot }}</textarea>




@error($name)
    <p class="text-red-500 text-sm mt-1 ">{{ $message }}</p>
@enderror
