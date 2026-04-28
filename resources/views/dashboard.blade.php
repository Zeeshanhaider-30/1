<x-app-layout>
    <x-slot name="header">
        <h2 class="font-display text-xl font-semibold text-harbor-pine">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="mx-auto max-w-7xl space-y-6 px-4 sm:px-6 lg:px-8">
            <div class="harbor-card overflow-hidden">
                <div class="border-b border-harbor-sand/60 bg-gradient-to-r from-harbor-pine/10 to-transparent px-6 py-4">
                    <p class="text-xs font-semibold uppercase tracking-wider text-harbor-clay">Session</p>
                    <p class="mt-1 font-display text-lg font-semibold text-harbor-pine">You are signed in</p>
                </div>
                <div class="p-6 text-harbor-muted">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
