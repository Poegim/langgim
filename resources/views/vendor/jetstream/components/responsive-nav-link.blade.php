@props(['active'])

@php
$classes = ($active ?? false)
            ? 'block pl-3 pr-4 py-2 border-l-4 border-fuchsia-400 text-md font-medium text-fuchsia-400 bg-slate-800 focus:outline-none focus:text-indigo-800 focus:bg-indigo-100 focus:border-fuchsia-700 transition-all duration-300'
            : 'block pl-3 pr-4 py-2 border-l-4 border-transparent text-md font-light text-gray-200 hover:bg-fuchsia-800 hover:border-fuchsia-400 focus:outline-none focus: focus:bg-fuchsia-700 focus:border-fuchsia-500 transition-all duration-300';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
