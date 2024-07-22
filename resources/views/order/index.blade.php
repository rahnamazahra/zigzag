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
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight"> {{ __('messages.Orders') }} </h2>

                    <table class="mt-6 table">
                        <thead>
                        <tr>
                            <th>{{ __('messages.Id') }}</th>
                            <th>{{ __('messages.Name') }}</th>
                            <th>{{ __('messages.Mobile') }}</th>
                            <th>{{ __('messages.Actions') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($orders as $order)
                            <tr>
                                <td>{{ $order->id }}</td>
                                <td>{{ $order->customer->name }}</td>
                                <td>{{ $order->customer->mobile }}</td>
                                <td colspan="3" class="grid grid-cols-3 gap-2">
                                    <a href="{{ route('orders.destroy', ['order' => $order->id]) }}"
                                       class="btn btn-success">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                             fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                            <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM8 3a5 5 0 0 1 4.546 2.916C11.363 7.304 9.761 8 8 8s-3.363-.696-4.546-2.084A5 5 0 0 1 8 3zm0 1a4 4 0 0 0-3.663 2.18C5.69 7.293 6.8 8 8 8s2.31-.707 3.663-1.82A4 4 0 0 0 8 4zm0 1a3 3 0 0 1 2.5 1.318C9.563 7.216 8.837 8 8 8s-1.563-.784-2.5-1.682A3 3 0 0 1 8 5z"/>
                                        </svg>
                                    </a>
                                    <a href="{{ route('orders.edit', ['order' => $order->id]) }}"
                                       class="btn btn-success">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                             fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                            <path d="M12.146.854a.5.5 0 0 1 .708 0l1.292 1.292a.5.5 0 0 1 0 .708l-1.293 1.293-2-2L12.146.854zM11.207 2.207l2 2L4.5 13.914l-2-2L11.207 2.207zM1 13.5V15h1.5l2-2H3.5l-2 2z"/>
                                        </svg>
                                    </a>
                                    <a href="{{ route('orders.destroy', ['order' => $order->id]) }}"
                                       class="btn btn-danger">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#dc3545"
                                             class="bi bi-trash" viewBox="0 0 16 16">
                                            <path d="M5.5 5.5A.5.5 0 0 1 6 5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5zm3-2.5A1.5 1.5 0 0 0 7 4h2a1.5 1.5 0 0 0 1.5-1.5V2h-5v.5z"/>
                                            <path fill-rule="evenodd"
                                                  d="M4.5 3.5V3h7v.5a1.5 1.5 0 0 0 1 1.415V14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4.915a1.5 1.5 0 0 0 1-1.415zM5 4v10h6V4H5zm2.5-2h1V2h-1v.5z"/>
                                        </svg>
                                    </a>
                                    <x-btn-link class="ml-4" :href="route('payments.index',['order' => $order->id])">{{ __('messages.Payments') }}</x-btn-link>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
