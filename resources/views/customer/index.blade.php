<x-app-layout>
        <x-slot name="header">
            <div class="flex justify-between items-center">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Khayat.ir') }}
                </h2>
                <x-btn-link class="ml-4" :href="route('customers.create')">
                    {{ __('messages.New Customer') }}
                </x-btn-link>
            </div>
        </x-slot>

    <div class="py-12 my-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight"> {{ __('messages.Customers') }} </h2>

                    <table class="mt-6 w-full table-auto">
                            <thead>
                                <tr>
                                    <th>{{ __('messages.Id') }}</th>
                                    <th>{{ __('messages.Name') }}</th>
                                    <th>{{ __('messages.Mobile') }}</th>
                                    <th></th>
                                </tr>
                            </thead>

                            <tbody>
                                 @foreach ($customers as $customer)
                                    <tr>
                                        <td> {{ $customer->id }} </td>
                                        <td> {{ $customer->name }} </td>
                                        <td> {{ $customer->mobile }} </td>

                                        <td class="border px-4 py-2 relative">
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
                                                        <x-dropdown-link :href="route('orders.create', ['customer' => $customer->id])">
                                                            {{ __('messages.New Order') }}
                                                        </x-dropdown-link>

                                                        <x-dropdown-link :href="route('customers.edit', ['customer' => $customer->id])">
                                                            {{ __('messages.Edit') }}
                                                        </x-dropdown-link>
                                                    </x-slot>
                                                </x-dropdown>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    <!-- Pagination Links -->
                    <div class="mt-4">
                        {{ $customers->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
