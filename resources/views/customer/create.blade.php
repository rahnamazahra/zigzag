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
                        {{__('Create New  Customer')}}
                    </div>

                    <form method="POST" action="{{ route('customers.store') }}">
                        @csrf
                        <!-- Domain Name -->
                        <div>
                            <x-input-label for="domain" :value="__('Domain Name')"/>
                            <x-text-input id="domain" class="block mt-1 w-full" type="text" name="domain"
                                          :value="old('domain')" required/>
                            <x-input-error :messages="$errors->get('domain')" class="mt-2"/>
                        </div>

                        <!-- Brand -->
                        <div>
                            <x-input-label for="brand" :value="__('Brand')"/>
                            <x-text-input id="brand" class="block mt-1 w-full" type="text" name="brand"
                                          :value="old('brand')"/>
                            <x-input-error :messages="$errors->get('brand')" class="mt-2"/>
                        </div>

                        <!-- Customer_data -->
                        <div>
                            <x-input-label for="data" :value="__('Extra Data')"/>
                            <x-text-input id="data" class="block mt-1 w-full" type="text" name="data"
                                          :value="old('data')"/>
                            <x-input-error :messages="$errors->get('data')" class="mt-2"/>
                        </div>

                        <!-- Customer Status -->
                        <div>
                            <x-input-label for="status" :value="__('Active')" />
                            <x-checkBox-button name="status" :checked="true" />
                            <x-input-error :messages="$errors->get('status')" class="mt-2"/>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button class="ms-4">
                                {{ __('Save') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
