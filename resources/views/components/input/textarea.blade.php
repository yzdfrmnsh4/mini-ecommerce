@props(['name', 'value' => '', 'placeholder' => '', 'type' => 'text'])

<textarea style="  
    line-height: 1;   vertical-align: top;" type="{{ $type }}" name="{{ $name }}"
    value="{{ old($name, $value) }}" placeholder="{{ $placeholder }}"
    {{ $attributes->merge([
        'class' =>
            'w-full  p-1 leading-tight indent-0 resize-none border border-gray-300 rounded-md px-3 py-2 focus:ring focus:ring-blue-200',
    ]) }}>{{ $slot }}</textarea>




@error($name)
    <p class="text-red-500 text-sm mt-1 ">{{ $message }}</p>
@enderror
