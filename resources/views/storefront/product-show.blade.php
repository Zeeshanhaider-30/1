<x-layouts.store :title="$product->name">
    <div class="grid gap-10 lg:grid-cols-2 lg:gap-14">
        <div class="harbor-card overflow-hidden p-4">
            @if ($product->image_url)
                <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="aspect-[4/5] w-full rounded-2xl object-cover sm:aspect-[1/1] lg:aspect-[4/5]">
            @else
                <div class="flex aspect-[4/5] items-center justify-center rounded-2xl bg-gradient-to-br from-harbor-pine to-harbor-night sm:aspect-square lg:aspect-[4/5]">
                    <span class="font-display text-7xl font-bold text-white/90">{{ strtoupper(substr($product->name, 0, 1)) }}</span>
                </div>
            @endif
        </div>
        <div>
            <span class="harbor-badge">Aurelia Spotlight</span>
            <h1 class="mt-4 harbor-section-title">{{ $product->name }}</h1>
            <p class="mt-5 text-base leading-relaxed text-harbor-muted">{{ $product->description }}</p>
            <dl class="mt-8 space-y-2 rounded-3xl border border-harbor-sand/80 bg-white/85 p-6 text-sm">
                <div class="flex justify-between gap-4">
                    <dt class="text-harbor-muted">Availability</dt>
                    <dd class="font-medium text-harbor-ink">{{ $product->stock }} units</dd>
                </div>
            </dl>
            <p class="mt-7 font-display text-3xl font-bold text-harbor-clay">PKR {{ number_format($product->price, 2) }}</p>
            <div class="mt-8 flex flex-wrap items-center gap-3">
                <a href="{{ route('checkout.create') }}" class="harbor-btn-primary inline-flex">Proceed to checkout</a>
                <a href="{{ route('products.index') }}" class="harbor-btn-ghost">Continue shopping</a>
            </div>
        </div>
    </div>
</x-layouts.store>
