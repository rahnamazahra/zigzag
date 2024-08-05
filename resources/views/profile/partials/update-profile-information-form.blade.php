<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-900">
            {{ __('messages.Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-800 dark:text-gray-800">
            {{ __("messages.Update your account's profile information.") }}
        </p>
    </header>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="name" :value="__('messages.Name')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="mobile" :value="__('messages.Mobile')" />
            <x-text-input id="mobile" name="mobile" type="text" class="mt-1 block w-full" :value="old('mobile', $user->mobile)" required autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('mobile')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('messages.Save') }}</x-primary-button>
        </div>
    </form>
</section>
