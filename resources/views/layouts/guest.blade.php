<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Aurelia Living</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=plus-jakarta-sans:400,500,600,700,800|sora:500,600,700&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-harbor-paper font-sans text-harbor-ink antialiased">
    <div class="grid min-h-screen lg:grid-cols-2">
        <div class="relative hidden min-h-[320px] lg:block">
            <img
                src="https://images.unsplash.com/photo-1616594039964-3f5d8f0fb2f9?auto=format&amp;fit=crop&amp;w=1400&amp;q=80"
                alt=""
                class="absolute inset-0 h-full w-full object-cover"
            >
            <div class="absolute inset-0 bg-gradient-to-tr from-harbor-night/80 via-harbor-pine/55 to-transparent"></div>
            <div class="relative flex h-full flex-col justify-end p-12 text-white">
                <p class="text-xs font-semibold uppercase tracking-[0.25em] text-harbor-sage">Account</p>
                <h1 class="mt-4 font-display text-4xl font-bold leading-tight">Welcome back to Aurelia Living.</h1>
                <p class="mt-4 max-w-md text-sm leading-relaxed text-white/85">
                    Sign in to track orders, manage your profile, and continue shopping your curated favorites.
                </p>
            </div>
        </div>
        <div class="flex flex-col justify-center px-6 py-12 sm:px-10 lg:px-16">
            <a href="{{ route('front') }}" class="mb-10 inline-flex items-center gap-2 text-sm font-semibold text-harbor-pine hover:text-harbor-clay">
                <span class="font-display text-xl font-bold">AURELIA LIVING</span>
            </a>
            <div class="harbor-card p-8 shadow-[0_8px_40px_-12px_rgba(27,67,50,0.15)]">
                {{ $slot }}
            </div>
        </div>
    </div>
</body>
</html>
