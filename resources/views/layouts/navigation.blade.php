<nav x-data="{ open: false }" class="border-b border-harbor-sand/80 bg-harbor-cream/90 backdrop-blur">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 justify-between">
            <div class="flex">
                <div class="flex shrink-0 items-center">
                    <a href="{{ Auth::user()->is_admin ? route('admin.index') : route('dashboard') }}" class="font-display text-lg font-bold text-harbor-pine">
                        {{ config('app.name') }}
                    </a>
                </div>

                <div class="hidden space-x-2 sm:-my-px sm:ms-10 sm:flex sm:items-center">
                    @if (Auth::user()->is_admin)
                        <x-nav-link :href="route('admin.index')" :active="request()->routeIs('admin.*')">
                            {{ __('Admin panel') }}
                        </x-nav-link>
                    @else
                        <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                            {{ __('Dashboard') }}
                        </x-nav-link>
                    @endif
                </div>
            </div>

            <div class="hidden sm:ms-6 sm:flex sm:items-center">
                <x-dropdown align="right" width="48" contentClasses="py-1 bg-white border border-harbor-sand shadow-xl rounded-xl">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center rounded-xl border border-harbor-sand bg-white px-3 py-2 text-sm font-medium text-harbor-ink shadow-sm transition hover:border-harbor-pine/30 focus:outline-none">
                            <div>{{ Auth::user()->name }}</div>
                            <div class="ms-1">
                                <svg class="h-4 w-4 fill-current text-harbor-muted" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center rounded-lg p-2 text-harbor-muted transition hover:bg-harbor-paper hover:text-harbor-pine focus:outline-none">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="space-y-1 pb-3 pt-2">
            @if (Auth::user()->is_admin)
                <x-responsive-nav-link :href="route('admin.index')" :active="request()->routeIs('admin.*')">
                    {{ __('Admin panel') }}
                </x-responsive-nav-link>
            @else
                <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                    {{ __('Dashboard') }}
                </x-responsive-nav-link>
            @endif
        </div>

        <div class="border-t border-harbor-sand/80 pb-1 pt-4">
            <div class="px-4">
                <div class="text-base font-medium text-harbor-ink">{{ Auth::user()->name }}</div>
                <div class="text-sm font-medium text-harbor-muted">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
