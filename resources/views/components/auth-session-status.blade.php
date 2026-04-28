@props(['status'])

@if ($status)
    <div {{ $attributes->merge(['class' => 'font-medium text-sm text-harbor-pine']) }}>
        {{ $status }}
    </div>
@endif
