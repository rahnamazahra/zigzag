@props(['name', 'checked' => false, 'disabled' => false])

<input type="hidden" name="{{ $name }}" value="0">
<input type="checkbox" id="{{ $name }}" name="{{ $name }}" value="1" {{ $checked ? 'checked' : '' }} {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'form-checkbox h-4 w-4 text-indigo-600 transition duration-150 ease-in-out']) !!}>