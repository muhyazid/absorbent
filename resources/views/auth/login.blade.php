<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="max-w-md mx-auto bg-white p-8 rounded-lg shadow-lg">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
                autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4 relative">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full pr-10" type="password" name="password" required
                autocomplete="current-password" />
            <span toggle="#password"
                class="field-icon toggle-password absolute right-0 pr-3 flex items-center cursor-pointer">
                <svg id="eye-icon" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-600" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M2.458 12C3.732 7.943 7.522 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.478 0-8.268-2.943-9.542-7z" />
                </svg>
            </span>
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox"
                    class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-between mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ml-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>

        <!-- Google Login Button -->
        <div class="text-center mt-6">
            <a href="{{ route('auth.google') }}"
                class="w-full flex items-center justify-center px-4 py-2 mt-2 bg-blue-600 text-white rounded-md shadow-md hover:bg-blue-700">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 48 48">
                    <path fill="#4285F4"
                        d="M45.09 24.35c0-1.48-.12-2.9-.34-4.29H24v8.11h11.91a10.22 10.22 0 01-4.44 6.71v5.56h7.16c4.18-3.85 6.57-9.54 6.57-16.09z" />
                    <path fill="#34A853"
                        d="M24 48c6.03 0 11.08-1.99 14.77-5.37l-7.16-5.56c-2.01 1.36-4.58 2.17-7.61 2.17-5.86 0-10.83-3.96-12.61-9.28H2.14v5.83C5.84 43.59 14.15 48 24 48z" />
                    <path fill="#FBBC05"
                        d="M11.39 29.95A14.77 14.77 0 019.5 24c0-2.06.37-4.04 1.03-5.95V12.22H2.14A23.94 23.94 0 000 24c0 3.77.89 7.33 2.5 10.53l8.89-5.83z" />
                    <path fill="#EA4335"
                        d="M24 9.44c3.28 0 6.21 1.13 8.53 3.35l6.38-6.38C34.92 2.41 29.97 0 24 0 14.15 0 5.84 4.41 2.14 11.19l8.89 5.83c1.78-5.32 6.75-9.28 12.61-9.28z" />
                </svg>
                Log in with Google
            </a>
        </div>
    </form>

    <!-- Registration Link -->
    <div class="flex items-center justify-center mt-6">
        @if (Route::has('register'))
            <p class="text-sm text-gray-600">
                {{ __("Don't have an account?") }}
                <a class="text-yellow-600 hover:text-indigo-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    href="{{ route('register') }}">
                    {{ __('Register here') }}
                </a>
            </p>
        @endif
    </div>

    <link rel="stylesheet" href="{{ asset('frontend/css/loginregister.css') }}">
    <script src="{{ asset('frontend/js/loginregister.js') }}" defer></script>
</x-guest-layout>
