@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center px-1 pt-1 border-r-2 tracking-tight border-pink-400 text-lg uppercase text-pink-300 focus:outline-none focus:border-indigo-700 transition-all'
            : 'inline-flex font-light items-center px-1 pt-1 border-r-2 tracking-tight border-transparent text-lg uppercase text-gray-300 hover:text-gray-100 hover:border-pink-300 focus:outline-none focus:text-gray-100 focus:border-gray-300 transition';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
