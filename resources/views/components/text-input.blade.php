@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'rounded-xl border border-harbor-sand bg-white text-harbor-ink placeholder:text-harbor-muted/70 shadow-sm focus:border-harbor-pine focus:ring-harbor-pine']) }}>
