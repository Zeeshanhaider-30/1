@props(['value'])

<label {{ $attributes->merge(['class' => 'block text-sm font-semibold text-harbor-ink']) }}>
    {{ $value ?? $slot }}
</label>
