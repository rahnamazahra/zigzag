<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Khayat.ir') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="mb-6 text-gray-900">
                        {{ __('messages.Create New  Customer') }}
                    </div>
                    <form method="POST" action="{{ route('customers.update') }}">
                        @csrf

                        <!-- Name -->
                        <div>
                            <x-input-label for="name" :value="__('messages.Name')"/>
                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                                          :value="old('name')"
                                          required autofocus autocomplete="name"/>
                            <x-input-error :messages="$errors->get('name')" class="mt-2"/>
                        </div>

                        <!-- Mobile -->
                        <div>
                            <x-input-label for="mobile" :value="__('messages.Mobile')"/>
                            <x-text-input id="mobile" class="block mt-1 w-full" type="text" name="mobile"
                                          :value="old('mobile')" required/>
                            <x-input-error :messages="$errors->get('mobile')" class="mt-2"/>
                        </div>


                        <!-- Password -->
                        <div class="mt-4">
                            <x-input-label for="password" :value="__('messages.Password')"/>

                            <x-text-input id="password" class="block mt-1 w-full"
                                          type="password"
                                          name="password"
                                          required autocomplete="new-password"/>

                            <x-input-error :messages="$errors->get('password')" class="mt-2"/>
                        </div>

                        <!-- Confirm Password -->
                        <div class="mt-4">
                            <x-input-label for="password_confirmation" :value="__('messages.Confirm Password')"/>

                            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                          type="password"
                                          name="password_confirmation" required autocomplete="new-password"/>

                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2"/>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button class="ms-4">
                                {{ __('messages.Register') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
