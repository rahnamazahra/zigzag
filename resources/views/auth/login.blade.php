<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')"/>

    <form method="POST" action="{{ route('login') }}" class="max-w-md mx-auto p-4 sm:p-6 lg:p-8">
        @csrf

        <!-- Mobile -->
        <div class="mb-4">
            <x-input-label for="mobile" :value="__('messages.Mobile')" class="block text-right"/>
            <x-text-input id="mobile" class="block mt-1 w-full" type="text" name="mobile" :value="old('mobile')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('mobile')" class="mt-2"/>
        </div>

        <!-- Password -->
        <div class="mb-4">
            <x-input-label for="password" :value="__('messages.Password')" class="block text-right"/>
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2"/>
        </div>

        <!-- Remember Me (commented out) -->
        {{--
        <div class="flex items-center mb-4">
            <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
            <label for="remember_me" class="ml-2 text-sm text-gray-600">@lang('messages.Remember me')</label>
        </div>
        --}}

        <div class="flex items-center justify-between mb-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                    @lang('messages.Forgot your password?')
                </a>
            @endif

            <x-primary-button>
                @lang('messages.Log in')
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
