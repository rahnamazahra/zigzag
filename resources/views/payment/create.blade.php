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
                    <div class="mb-8">
                        <h2 class="font-semibold text-xl text-gray-800 leading-tight"> {{ __('messages.Create New Customer') }}</h2>
                    </div>
                    <form method="POST" action="{{ route('customers.store') }}" class="mt-8">
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

                        <!-- National_code -->
                        <div>
                            <x-input-label for="national_code" :value="__('messages.National_code')"/>
                            <x-text-input id="national_code" class="block mt-1 w-full" type="text" name="national_code"
                                          :value="old('national_code')"/>
                            <x-input-error :messages="$errors->get('national_code')" class="mt-2"/>
                        </div>

                        <!-- Postal_code -->
                        <div>
                            <x-input-label for="postal_code" :value="__('messages.Postal_code')"/>
                            <x-text-input id="postal_code" class="block mt-1 w-full" type="text" name="postal_code"
                                          :value="old('postal_code')"/>
                            <x-input-error :messages="$errors->get('postal_code')" class="mt-2"/>
                        </div>

                        <!-- Address -->
                        <div>
                            <x-input-label for="address" :value="__('messages.Address')"/>
                            <x-text-area-input id="address" class="block mt-1 w-full" name="address">{{ old('address') }}</x-text-area-input>
                            <x-input-error :messages="$errors->get('address')" class="mt-2"/>
                        </div>


                        <!-- Location -->
                        <div>
                            <x-input-label for="location" :value="__('messages.Location')"/>
                            <x-text-input id="location" class="block mt-1 w-full" type="text" name="location"
                                          :value="old('location')"/>
                            <x-input-error :messages="$errors->get('location')" class="mt-2"/>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button class="ms-4">
                                {{ __('messages.Save') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
