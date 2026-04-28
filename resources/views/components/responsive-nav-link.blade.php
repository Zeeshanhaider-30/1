@props(['active'])

@php
$classes = ($active ?? false)
            ? 'block w-full rounded-lg bg-harbor-pine/12 px-3 py-2 text-start text-base font-semibold text-harbor-pine transition duration-150 ease-in-out'
            : 'block w-full rounded-lg px-3 py-2 text-start text-base font-medium text-harbor-muted transition duration-150 ease-in-out hover:bg-harbor-paper hover:text-harbor-pine';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
