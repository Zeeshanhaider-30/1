<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center justify-center rounded-xl bg-harbor-clay px-4 py-2 text-sm font-semibold text-white shadow-sm transition hover:bg-harbor-clay/90 focus:outline-none focus:ring-2 focus:ring-harbor-clay/35 focus:ring-offset-2 focus:ring-offset-harbor-cream']) }}>
    {{ $slot }}
</button>
