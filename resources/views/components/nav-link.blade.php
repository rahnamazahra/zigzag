@props(['active'])

@php
    $isRTL = in_array(app()->getLocale(), ['ar', 'fa']);

    $baseClasses = 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-900 dark:text-gray-900 hover:text-gray-700 dark:hover:text-gray-800 hover:border-gray-700 dark:hover:border-gray-700 focus:outline-none focus:text-gray-700 dark:focus:text-gray-600 focus:border-gray-300 dark:focus:border-gray-700 transition duration-150 ease-in-out';

    $activeClasses = 'border-indigo-400 dark:border-indigo-600';

    $marginStyle = $isRTL ? 'margin-left: 8px;' : 'margin-right: 8px;';

    $classes = ($active ?? false)
                ? "$baseClasses $activeClasses"
                : "$baseClasses";
@endphp

<a {{ $attributes->merge(['class' => $classes, 'style' => $marginStyle]) }}>
    {{ $slot }}
</a>
