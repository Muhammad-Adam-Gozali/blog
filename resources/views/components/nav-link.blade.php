@props(['href', 'current' => false, 'ariaCurrent' => false])

{{-- If aria-current is not set, use the current prop to determine if the link is active --}}

@php
    // $classess = $current ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white';
    if ($current) {
        $classes = 'bg-gray-900 text-white';
        $ariaCurrent = 'page';
    } else {
        $classes = 'text-gray-300 hover:bg-gray-700 hover:text-white';
    }
@endphp

{{-- If the link is active, apply the active styles --}}
<a href="{{ $href }}"
    {{ $attributes->merge(['class' => 'rounded-md px-3 py-2 text-sm font-medium ' . $classes, 'aria-current' => $ariaCurrent]) }}>{{ $slot }}</a>
