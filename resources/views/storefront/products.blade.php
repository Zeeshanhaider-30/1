<x-layouts.store title="Shop">
    <header class="mb-10 flex flex-col gap-4 rounded-[2rem] border border-harbor-sand/80 bg-white/80 p-6 sm:flex-row sm:items-end sm:justify-between">
        <div>
            <span class="harbor-badge">Aurelia Collection</span>
            <h1 class="mt-3 harbor-section-title">Shop all products</h1>
        </div>
        <p class="text-sm font-medium text-harbor-muted">{{ $products->total() }} curated items</p>
    </header>

    <div class="grid gap-6 md:grid-cols-2 xl:grid-cols-3">
        @foreach ($products as $product)
            <article class="harbor-card flex flex-col overflow-hidden p-0 transition hover:-translate-y-1 hover:shadow-[0_22px_42px_-16px_rgba(27,58,138,0.3)]">
                <div class="relative h-56 bg-harbor-sand/35">
                    @if ($product->image_url)
                        <img src="{{ $product->image_url }}" alt="" class="h-full w-full object-cover">
                    @else
                        <div class="flex h-full items-center justify-center font-display text-3xl font-bold text-harbor-pine/35">{{ strtoupper(substr($product->name, 0, 1)) }}</div>
                    @endif
                </div>
                <div class="flex flex-1 flex-col p-6">
                    <h2 class="font-display text-xl font-semibold text-harbor-night">{{ $product->name }}</h2>
                    <p class="mt-3 flex-1 text-sm leading-relaxed text-harbor-muted">{{ \Illuminate\Support\Str::limit($product->description, 100) }}</p>
                    <div class="mt-4 flex items-center justify-between gap-3">
                        <span class="font-display text-lg font-bold text-harbor-clay">PKR {{ number_format($product->price, 2) }}</span>
                        <a href="{{ route('products.show', $product) }}" class="harbor-btn-ghost px-4 py-2">View</a>
                    </div>
                </div>
            </article>
        @endforeach
    </div>

    <div class="mt-10 text-harbor-muted [&_a]:font-medium [&_a]:text-harbor-pine [&_a:hover]:text-harbor-clay">
        {{ $products->links() }}
    </div>
</x-layouts.store>
