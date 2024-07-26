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
                        <h2 class="font-semibold text-xl text-gray-800 leading-tight"> {{ __('messages.Create Payment for order') }} {{ $order->id }} </h2>
                    </div>
                    <form method="POST" action="{{ route('payments.store') }}" class="mt-8">
                        @csrf

                        <input type="hidden" name="order_id" value="{{ $order->id }}">

                        <!-- Amount -->
                        <div>
                            <x-input-label for="amount" :value="__('messages.Amount')"/>
                            <x-text-input id="amount" class="block mt-1 w-full" type="text" name="amount"
                                          :value="old('amount')"
                                          required autofocus autocomplete="amount"/>
                            <x-input-error :messages="$errors->get('amount')" class="mt-2"/>
                        </div>

                        <!-- Transaction Type -->
                        <div>
                            <x-input-label for="transaction_type" :value="__('messages.Transaction Type')"/>
                            <x-select-input :options="$transactionTypes" name="transaction_type" class="block mt-1 w-full" placeholder="{{__('messages.Select Item')}}" />
                        </div>

                        <!-- Payment Type -->
                        <div>
                            <x-input-label for="payment_type" :value="__('messages.Payment Type')"/>
                            <x-select-input :options="$paymentTypes" name="payment_type" class="block mt-1 w-full" placeholder="{{__('messages.Select Item')}}" />
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
