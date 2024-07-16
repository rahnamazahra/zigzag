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
                        {{ __('messages.Create Order for') }} {{ $customer->name }}
                    </div>
                    <form method="POST" action="{{ route('orders.store') }}">
                        @csrf

                        <input type="hidden" name="customer_id" value="{{ $customer->id }}">

                        <!-- cloth -->
                        <div>
                            <x-input-label for="cloth_id" :value="__('messages.Cloth')"/>
                            <x-select-input :options="$clothes" name="cloth_id" placeholder="{{__('messages.Select Item')}}" />
                        </div>

                        <!-- category -->
                        <div>
                            <x-input-label for="category_id" :value="__('messages.Category')"/>
                            <x-select-input :options="$categories" name="category_id" placeholder="{{__('messages.Select Item')}}" />
                        </div>

                        <!-- quantity -->
                        <div>
                            <x-input-label for="quantity" :value="__('messages.Quantity')"/>
                            <x-text-input id="quantity" class="block mt-1 w-full" type="text" name="quantity"
                                          :value="old('quantity')"/>
                            <x-input-error :messages="$errors->get('quantity')" class="mt-2"/>
                        </div>

                        <!-- price -->
                        <div>
                            <x-input-label for="price" :value="__('messages.Price')"/>
                            <x-text-input id="price" class="block mt-1 w-full" type="text" name="price"
                                          :value="old('price')" required/>
                            <x-input-error :messages="$errors->get('price')" class="mt-2"/>
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
