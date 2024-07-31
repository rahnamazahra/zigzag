@props(['disabled' => false, 'options' => [], 'placeholder' => '','value' => null])

<select {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm']) !!}>
    @if ($placeholder)
        <option value="" disabled selected>{{ $placeholder }}</option>
    @endif
    @foreach ($options as $key => $label)
            <option value="{{ $key }}" {{ $value == $key ? 'selected' : '' }}>{{ $label }}</option>
    @endforeach
</select>