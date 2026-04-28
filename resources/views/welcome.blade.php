<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'OrbitLane') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-slate-950 text-slate-100 antialiased">
    <div class="flex min-h-screen items-center justify-center bg-[radial-gradient(circle_at_top,_rgba(34,211,238,0.15),_transparent_45%),radial-gradient(circle_at_bottom_right,_rgba(168,85,247,0.14),_transparent_40%)] px-4">
        <div class="w-full max-w-2xl rounded-3xl border border-white/10 bg-slate-900/70 p-10 text-center shadow-2xl backdrop-blur">
            <p class="text-xs font-semibold uppercase tracking-[0.2em] text-cyan-300">OrbitLane Platform</p>
            <h1 class="mt-4 text-4xl font-extrabold text-white">Modern ecommerce starts here.</h1>
            <p class="mt-4 text-slate-300">Browse products, place orders, and manage everything from a fresh redesigned interface.</p>
            <div class="mt-8 flex flex-wrap items-center justify-center gap-3">
                <a href="{{ route('front') }}" class="rounded-xl bg-cyan-500 px-5 py-2.5 text-sm font-bold text-slate-900 hover:bg-cyan-400">Open Store</a>
                @if (Route::has('login'))
                    <a href="{{ route('login') }}" class="rounded-xl border border-white/20 px-5 py-2.5 text-sm font-semibold text-slate-200 hover:bg-white/10">Sign In</a>
                @endif
            </div>
        </div>
    </div>
</body>
</html>
