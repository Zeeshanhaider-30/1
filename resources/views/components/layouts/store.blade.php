<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title ?? 'Store' }} | Aurelia Living</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=plus-jakarta-sans:400,500,600,700,800|sora:500,600,700&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen font-sans text-harbor-ink antialiased">
    <div class="min-h-screen bg-[radial-gradient(circle_at_top_left,_rgba(37,99,235,0.2),_transparent_35%),radial-gradient(circle_at_85%_10%,_rgba(249,115,22,0.16),_transparent_35%),linear-gradient(to_bottom,_#f8fbff,_#f2f6ff_35%,_#eef4ff)]">
        <header class="sticky top-0 z-40 border-b border-harbor-sand/70 bg-white/70 backdrop-blur-xl">
            <div class="mx-auto flex max-w-7xl items-center justify-between px-4 py-4 sm:px-6 lg:px-8">
                <a href="{{ route('front') }}" class="font-display text-xl font-bold tracking-tight text-harbor-night">
                    AURELIA LIVING
                </a>
                <nav class="hidden items-center gap-2 md:flex">
                    <a href="{{ route('front') }}" class="rounded-xl px-3 py-2 text-sm font-medium text-harbor-muted transition hover:bg-white hover:text-harbor-pine">Home</a>
                    <a href="{{ route('products.index') }}" class="rounded-xl px-3 py-2 text-sm font-medium text-harbor-muted transition hover:bg-white hover:text-harbor-pine">Shop</a>
                    <a href="{{ route('checkout.create') }}" class="rounded-xl px-3 py-2 text-sm font-medium text-harbor-muted transition hover:bg-white hover:text-harbor-pine">Checkout</a>
                    <a href="{{ route('contact.create') }}" class="rounded-xl px-3 py-2 text-sm font-medium text-harbor-muted transition hover:bg-white hover:text-harbor-pine">Contact</a>
                </nav>
                <div class="flex items-center gap-2">
                    @auth
                        @if (auth()->user()->is_admin)
                            <a href="{{ route('admin.index') }}" class="harbor-btn-primary text-sm">Admin</a>
                        @else
                            <a href="{{ route('dashboard') }}" class="harbor-btn-primary text-sm">Dashboard</a>
                        @endif
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="rounded-xl border border-harbor-sand bg-white px-3 py-2 text-sm font-semibold text-harbor-pine transition hover:bg-harbor-paper">Log out</button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="harbor-btn-primary text-sm">Sign in</a>
                    @endauth
                </div>
            </div>
        </header>

        <main class="mx-auto w-full max-w-7xl px-4 py-8 sm:px-6 lg:px-8 lg:py-12">
            @if (session('success'))
                <div class="mb-6 rounded-2xl border border-harbor-sage/40 bg-harbor-sage/15 px-4 py-3 text-sm font-medium text-harbor-pine">{{ session('success') }}</div>
            @endif
            @if ($errors->any())
                <div class="mb-6 rounded-2xl border border-red-200 bg-red-50 px-4 py-3 text-sm font-medium text-red-800">{{ $errors->first() }}</div>
            @endif
            {{ $slot }}
        </main>

        <footer class="border-t border-harbor-sand/70 bg-white/55 backdrop-blur-md">
            <div class="mx-auto flex max-w-7xl flex-col gap-2 px-4 py-7 text-sm text-harbor-muted sm:flex-row sm:items-center sm:justify-between sm:px-6 lg:px-8">
                <p class="font-display font-semibold text-harbor-night">AURELIA LIVING STUDIO</p>
                <p>Elevated essentials for modern homes and mindful routines.</p>
            </div>
        </footer>
    </div>
</body>
</html>
