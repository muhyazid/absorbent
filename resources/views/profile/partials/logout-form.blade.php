<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Logout') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Logout from your account securely.') }}
        </p>
    </header>

    <form method="POST" action="{{ route('logout') }}">
        @csrf

        <div class="flex items-center gap-4">
            <x-danger-button>
                {{ __('Logout') }}
            </x-danger-button>
        </div>
    </form>
</section>
