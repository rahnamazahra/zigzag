<?php

use Carbon\Carbon;
use Morilog\Jalali\Jalalian;

?>
<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Khayat.ir') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12 my-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <div class="card-body">
                        <div class="mb-8">
                            <div class="flex items-center justify-start">
                                <h2 class="font-semibold text-xl text-gray-800 leading-tight ml-4">
                                    {{ __('messages.Order ID') }}: {{ $order->id }} - {{ $order->cloth->name }}
                                </h2>
                                <div class="sm:ml-6 mr-4">
                                    <x-dropdown align="right" width="48">
                                        <x-slot name="trigger">
                                            <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                                <div>{{ __('messages.Actions') }}</div>

                                                <div class="ml-1">
                                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                                         viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd"
                                                              d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                              clip-rule="evenodd"/>
                                                    </svg>
                                                </div>
                                            </button>
                                        </x-slot>

                                        <x-slot name="content">
                                            <x-dropdown-link :href="route('payments.show', ['order' => $order->id])">
                                                {{ __('messages.Detail') }} {{ __('messages.Payments') }}
                                            </x-dropdown-link>

                                            <x-dropdown-link :href="route('sizes.edit', ['order' => $order->id])">
                                                {{ __('messages.Edit') }} {{ __('messages.Sizes') }}
                                            </x-dropdown-link>

                                            <x-dropdown-link
                                                    :href="route('customers.edit', ['customer' => $order->customer->id])">
                                                {{ __('messages.Edit') }} {{ __('messages.Customer') }}
                                            </x-dropdown-link>

                                            <x-dropdown-link :href="route('orders.edit', ['order' => $order->id])">
                                                {{ __('messages.Edit') }} {{ __('messages.Order') }}
                                            </x-dropdown-link>
                                        </x-slot>
                                    </x-dropdown>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div>
                        <p class="card-text rtl pl-4 mt-8">
                            <span><strong> {{ $order->customer->name }} </strong></span><br>
                            <span><strong> {{__('messages.Mobile')}}: </strong> {{ $order->customer->mobile }} </span><br>
                            <span><strong> {{__('messages.National_code')}}: </strong> {{ $order->customer->national_code ?? '-' }} </span><br>
                            <span><strong> {{__('messages.Postal_code')}}: </strong> {{ $order->customer->postal_code ?? '-' }} </span><br>
                            <span><strong> {{__('messages.Address')}}: </strong> {{ $order->customer->address ?? '-' }} </span><br>
                            <?php
                            $carbonDate = Carbon::parse($order->created_at);
                            $jalaliDate = Jalalian::fromCarbon($carbonDate);
                            ?>
                            <span><strong> {{__('messages.Created_at')}}: </strong> {{ $jalaliDate->format('Y/m/d H:i:s') }} </span><br>
                        </p>
                    </div>

                <table class="mt-6 w-full table-auto">
                    <thead>
                        <tr>
                            <th> {{ __('messages.Id') }} </th>
                            <th> {{ __('messages.Cloth') }} </th>
                            <th> {{ __('messages.Value') }} </th>
                        </tr>
                    </thead>
                    <tbody>
                    @forelse ($sizes as $size)
                        <tr>
                            <td> {{ $size->id }} </td>
                            <td> {{ $size->measurement->title }} </td>
                            <td> {{ $size->value }} </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
