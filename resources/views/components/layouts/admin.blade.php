<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title ?? 'Admin Panel' }} | {{ config('app.name') }}</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=dm-sans:400,500,600,700|fraunces:500,600,700&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        .dt-harbor .dataTables_wrapper .dataTables_filter input,
        .dt-harbor .dataTables_wrapper .dataTables_length select {
            background: #faf6f0;
            color: #2c2620;
            border: 1px solid #d4c4b0;
            border-radius: 0.75rem;
            padding: 0.4rem 0.65rem;
        }
        .dt-harbor .dataTables_wrapper .dataTables_paginate .paginate_button {
            color: #2c2620 !important;
            border-radius: 0.5rem;
            border: 1px solid #d4c4b0 !important;
            margin: 0 2px;
            background: #fff !important;
        }
        .dt-harbor .dataTables_wrapper .dataTables_paginate .paginate_button.current {
            background: linear-gradient(135deg, #1b4332, #0f1f1a) !important;
            border-color: transparent !important;
            color: #faf6f0 !important;
        }
        table.dataTable thead th {
            background: #f0e8de;
            color: #1b4332;
            border-bottom: 1px solid #d4c4b0 !important;
            font-weight: 600;
        }
        table.dataTable tbody td {
            background: #faf6f0;
            color: #2c2620;
            border-bottom: 1px solid #e8ddd0 !important;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.8/css/jquery.dataTables.min.css">
</head>
<body class="min-h-screen bg-harbor-paper font-sans text-harbor-ink antialiased">
    <div class="flex min-h-screen flex-col md:flex-row">
        <aside class="border-b border-harbor-sand/80 bg-harbor-cream md:w-64 md:shrink-0 md:border-b-0 md:border-r md:border-harbor-sand/80">
            <div class="p-6">
                <p class="font-display text-lg font-bold text-harbor-pine">{{ config('app.name') }}</p>
                <p class="mt-1 text-xs font-medium uppercase tracking-wider text-harbor-muted">Operations</p>
            </div>
            <nav class="flex flex-row gap-1 overflow-x-auto px-3 pb-4 md:flex-col md:px-4 md:pb-8">
                <a href="{{ route('admin.products') }}" class="whitespace-nowrap rounded-xl px-4 py-2.5 text-sm font-medium text-harbor-muted transition hover:bg-harbor-paper hover:text-harbor-pine">Products</a>
                <a href="{{ route('admin.orders') }}" class="whitespace-nowrap rounded-xl px-4 py-2.5 text-sm font-medium text-harbor-muted transition hover:bg-harbor-paper hover:text-harbor-pine">Orders</a>
                <a href="{{ route('admin.order-items') }}" class="whitespace-nowrap rounded-xl px-4 py-2.5 text-sm font-medium text-harbor-muted transition hover:bg-harbor-paper hover:text-harbor-pine">Order items</a>
                <a href="{{ route('admin.customers') }}" class="whitespace-nowrap rounded-xl px-4 py-2.5 text-sm font-medium text-harbor-muted transition hover:bg-harbor-paper hover:text-harbor-pine">Customers</a>
                <a href="{{ route('admin.admins') }}" class="whitespace-nowrap rounded-xl px-4 py-2.5 text-sm font-medium text-harbor-muted transition hover:bg-harbor-paper hover:text-harbor-pine">Admins</a>
            </nav>
            <div class="hidden px-4 pb-6 md:block">
                <a href="{{ route('front') }}" class="harbor-btn-ghost w-full text-center text-sm">← Storefront</a>
            </div>
        </aside>
        <main class="min-w-0 flex-1 p-6 md:p-10">
            <h1 class="font-display text-3xl font-bold text-harbor-pine">{{ $title ?? 'Dashboard' }}</h1>
            <div class="mt-8">
                {{ $slot }}
            </div>
        </main>
    </div>
</body>
</html>
