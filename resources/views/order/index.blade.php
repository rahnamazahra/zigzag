<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Khayat.ir') }}
            </h2>
            <x-btn-link class="ml-4" :href="route('payments.index')">{{ __('messages.Payments') }}</x-btn-link>
        </div>
    </x-slot>

    <div class="py-12 my-12">
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
                                <td class="grid grid-cols-3 gap-2">
                                    <a href="{{ route('orders.destroy', ['order' => $order->id]) }}" class="btn btn-success" data-bs-toggle="tooltip" data-bs-placement="top" title="Details">
                                        <i class="bi bi-info-circle"></i>
                                    </a>
                                    <a href="{{ route('orders.edit', ['order' => $order->id]) }}" class="btn btn-success" data-bs-toggle="tooltip" data-bs-placement="top" title="Editing">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <a href="{{ route('payments.show', ['order' => $order->id]) }}" class="btn btn-success" data-bs-toggle="tooltip" data-bs-placement="top" title="Financial Affairs">
                                        <i class="bi bi-cart"></i>
                                    </a>
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
