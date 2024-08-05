<x-guest-layout>
    <form method="POST" action="{{ route('register') }}" class="max-w-md mx-auto px-4 sm:px-6 lg:px-8">
        @csrf

        <!-- Name -->
        <div class="mb-4">
            <x-input-label for="name" :value="__('messages.Name')" class="block text-right"/>
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name"/>
            <x-input-error :messages="$errors->get('name')" class="mt-2"/>
        </div>

        <!-- Mobile -->
        <div class="mb-4">
            <x-input-label for="mobile" :value="__('messages.Mobile')" class="block text-right"/>
            <x-text-input id="mobile" class="block mt-1 w-full" type="text" name="mobile" :value="old('mobile')" required/>
            <x-input-error :messages="$errors->get('mobile')" class="mt-2"/>
        </div>

        <!-- Password -->
        <div class="mb-4">
            <x-input-label for="password" :value="__('messages.Password')" class="block text-right"/>
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password"/>
            <x-input-error :messages="$errors->get('password')" class="mt-2"/>
        </div>

        <!-- Confirm Password -->
        <div class="mb-4">
            <x-input-label for="password_confirmation" :value="__('messages.Confirm Password')" class="block text-right"/>
            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password"/>
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2"/>
        </div>

        <div class="flex items-center justify-end mb-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('messages.Already registered?') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('messages.Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
