<button {{ $attributes->merge(['type' => 'button', 'class' => 'inline-flex items-center rounded-xl border border-harbor-sand bg-white px-4 py-2 text-sm font-semibold text-harbor-pine shadow-sm transition hover:bg-harbor-paper focus:outline-none focus:ring-2 focus:ring-harbor-pine/25 focus:ring-offset-2 focus:ring-offset-harbor-cream disabled:opacity-25']) }}>
    {{ $slot }}
</button>
