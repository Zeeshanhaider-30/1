<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-harbor-sand text-harbor-pine shadow-sm focus:ring-harbor-pine" name="remember">
                <span class="ms-2 text-sm text-harbor-muted">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="mt-6 flex items-center justify-between gap-3">
            @if (Route::has('register'))
                <a class="text-sm font-medium text-harbor-clay underline underline-offset-4 hover:text-harbor-pine" href="{{ route('register') }}">
                    {{ __('Create account') }}
                </a>
            @endif

            <div class="flex items-center gap-3">
            @if (Route::has('password.request'))
                <a class="text-sm text-harbor-muted underline underline-offset-4 hover:text-harbor-pine focus:outline-none focus:ring-2 focus:ring-harbor-pine/30 focus:ring-offset-2 rounded-md" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
            </div>
        </div>
    </form>
</x-guest-layout>
