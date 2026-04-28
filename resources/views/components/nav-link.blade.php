@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center rounded-lg bg-harbor-pine/12 px-3 py-2 text-sm font-semibold leading-5 text-harbor-pine transition duration-150 ease-in-out'
            : 'inline-flex items-center rounded-lg px-3 py-2 text-sm font-medium leading-5 text-harbor-muted transition duration-150 ease-in-out hover:bg-harbor-paper hover:text-harbor-pine';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
