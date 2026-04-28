<x-layouts.admin title="Dashboard">
    <div class="harbor-card overflow-hidden bg-gradient-to-br from-harbor-cream to-harbor-paper p-8">
        <p class="text-xs font-semibold uppercase tracking-[0.2em] text-harbor-clay">Overview</p>
        <h2 class="mt-2 font-display text-2xl font-bold text-harbor-pine md:text-3xl">Run the store from one calm desk.</h2>
        <p class="mt-3 max-w-2xl text-sm text-harbor-muted">Tables load live data; use the rail to jump between inventory, orders, and people.</p>
    </div>
    <div class="mt-8 grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
        <a href="{{ route('admin.products') }}" class="harbor-card block p-5 font-semibold text-harbor-pine transition hover:border-harbor-clay/40">Manage products</a>
        <a href="{{ route('admin.orders') }}" class="harbor-card block p-5 font-semibold text-harbor-pine transition hover:border-harbor-clay/40">Manage orders</a>
        <a href="{{ route('admin.order-items') }}" class="harbor-card block p-5 font-semibold text-harbor-pine transition hover:border-harbor-clay/40">Order line items</a>
        <a href="{{ route('admin.customers') }}" class="harbor-card block p-5 font-semibold text-harbor-pine transition hover:border-harbor-clay/40">Customers with orders</a>
        <a href="{{ route('admin.admins') }}" class="harbor-card block p-5 font-semibold text-harbor-pine transition hover:border-harbor-clay/40">Administrator list</a>
    </div>
</x-layouts.admin>
