@props(['disabled' => false, 'options' => [], 'placeholder' => ''])

<select {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm']) !!}>
    @if ($placeholder)
        <option value="" disabled selected>{{ $placeholder }}</option>
    @endif

    @foreach ($options as $value => $label)
        <option value="{{ $value }}">{{ $label }}</option>
    @endforeach
</select>