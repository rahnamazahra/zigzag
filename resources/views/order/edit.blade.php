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
                        {{ __('messages.Edit') }} {{ $order->id }} - {{ $order->customer->name }}
                    </div>
                    <form method="POST" action="{{ route('orders.update', ['order' => $order->id]) }}">
                        @csrf
                        @method('PUT')
                        <!-- cloth -->
                        <div>
                            <x-input-label for="cloth_id" :value="__('messages.Cloth')" :required="true"/>
                            <x-select-input :options="$clothes" name="cloth_id" class="block mt-1 w-full" placeholder="{{__('messages.Select Item')}}" required :value="$selectedClothId"/>
                            <x-input-error :messages="$errors->get('cloth_id')" class="mt-2"/>
                        </div>

                        <!-- category -->
                        <div>
                            <x-input-label for="category_id" :value="__('messages.Category')" :required="true"/>
                            <x-select-input :options="$categories" name="category_id" class="block mt-1 w-full" placeholder="{{__('messages.Select Item')}}" required :value="$selectedCategoryId"/>
                            <x-input-error :messages="$errors->get('category_id')" class="mt-2"/>
                        </div>

                        <!-- quantity -->
                        <div>
                            <x-input-label for="quantity" :value="__('messages.Quantity')"/>
                            <x-text-input id="quantity" class="block mt-1 w-full" type="text" name="quantity"
                                          :value="old('quantity', $order->quantity)"/>
                            <x-input-error :messages="$errors->get('quantity')" class="mt-2"/>
                        </div>

                        <!-- price -->
                        <div>
                            <x-input-label for="price" :value="__('messages.Price')"/>
                            <x-text-input id="price" class="block mt-1 w-full" type="text" name="price"
                                          :value="old('price', $order->price)" />
                            <x-input-error :messages="$errors->get('price')" class="mt-2"/>
                        </div>

                        <!-- description -->
                        <div>
                            <x-input-label for="description" :value="__('messages.Description')"/>
                            <x-text-area-input id="description" class="block mt-1 w-full" name="description">{{ old('description', $order->description) }}</x-text-area-input>
                            <x-input-error :messages="$errors->get('description')" class="mt-2"/>
                        </div>

                        <div class="mt-4">
                            <x-primary-button class="ms-4 w-full sm:w-auto btn btn-success">
                                {{ __('messages.Save') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
