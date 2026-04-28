<x-layouts.store title="Aurelia Living">
    <section class="grid gap-8 lg:grid-cols-[1.2fr_0.8fr]">
        <div class="relative overflow-hidden rounded-[2rem] border border-harbor-sand/70">
            <img src="https://images.unsplash.com/photo-1600210492486-724fe5c67fb3?auto=format&amp;fit=crop&amp;w=1800&amp;q=80" alt="Modern living room design" class="h-[24rem] w-full object-cover sm:h-[30rem]">
            <div class="absolute inset-0 bg-gradient-to-r from-harbor-night/85 via-harbor-night/40 to-transparent"></div>
            <div class="absolute inset-0 flex flex-col justify-end p-7 sm:p-10">
                <span class="harbor-badge w-fit border-white/40 bg-white/10 text-white">NEW SEASON CURATION</span>
                <h1 class="mt-4 max-w-2xl font-display text-4xl font-bold leading-tight text-white sm:text-5xl">
                    Timeless pieces designed to make every room feel intentional.
                </h1>
                <p class="mt-4 max-w-xl text-sm text-white/85 sm:text-base">
                    Shop decor, lighting, and home accents selected for clean aesthetics, practical comfort, and modern functionality.
                </p>
                <div class="mt-8 flex flex-wrap gap-3">
                    <a href="{{ route('products.index') }}" class="harbor-btn-primary">Explore products</a>
                    <a href="{{ route('contact.create') }}" class="rounded-2xl border border-white/35 bg-white/10 px-5 py-3 text-sm font-semibold text-white backdrop-blur-sm transition hover:bg-white/20">Book a style consult</a>
                </div>
            </div>
        </div>
        <div class="space-y-6">
            <article class="harbor-card p-6 sm:p-8">
                <span class="harbor-badge">Why Aurelia</span>
                <h2 class="mt-4 font-display text-2xl font-bold text-harbor-night">A premium shopping experience</h2>
                <ul class="mt-4 space-y-3 text-sm leading-relaxed text-harbor-muted">
                    <li>Curated collections with a clear visual hierarchy.</li>
                    <li>Balanced typography and breathing space for readability.</li>
                    <li>Consistent styling across every page and interaction.</li>
                </ul>
            </article>
            <article class="overflow-hidden rounded-[2rem] border border-harbor-sand/80 bg-white">
                <img src="https://images.unsplash.com/photo-1616486029423-aaa4789e8c9a?auto=format&amp;fit=crop&amp;w=1200&amp;q=80" alt="Curated modern furniture and decor" class="h-56 w-full object-cover">
                <div class="px-6 py-5">
                    <p class="font-display text-xl font-semibold text-harbor-night">Styled for modern homes</p>
                    <p class="mt-1 text-sm text-harbor-muted">Bring together clean silhouettes, warm textures, and practical comfort.</p>
                </div>
            </article>
        </div>
    </section>

    <section class="mt-16">
        <div class="mb-7 flex items-end justify-between gap-3 border-b border-harbor-sand/80 pb-5">
            <div>
                <span class="harbor-badge">Featured Picks</span>
                <h2 class="mt-3 harbor-section-title">Trending now</h2>
            </div>
            <a href="{{ route('products.index') }}" class="text-sm font-semibold text-harbor-pine hover:text-harbor-clay">View complete catalog</a>
        </div>
        <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
            @foreach ($featuredProducts as $product)
                <article class="harbor-card overflow-hidden p-0">
                    <div class="h-52 bg-harbor-sand/30">
                        @if ($product->image_url)
                            <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="h-full w-full object-cover">
                        @else
                            <div class="flex h-full items-center justify-center font-display text-4xl font-bold text-harbor-pine/35">{{ strtoupper(substr($product->name, 0, 1)) }}</div>
                        @endif
                    </div>
                    <div class="p-5">
                        <h3 class="font-display text-xl font-semibold text-harbor-night">{{ $product->name }}</h3>
                        <p class="mt-2 text-sm leading-relaxed text-harbor-muted">{{ \Illuminate\Support\Str::limit($product->description, 85) }}</p>
                        <div class="mt-4 flex items-center justify-between">
                            <p class="font-display text-xl font-bold text-harbor-clay">PKR {{ number_format($product->price, 2) }}</p>
                            <a href="{{ route('products.show', $product) }}" class="text-sm font-semibold text-harbor-pine hover:text-harbor-clay">View details</a>
                        </div>
                    </div>
                </article>
            @endforeach
        </div>
    </section>
</x-layouts.store>
